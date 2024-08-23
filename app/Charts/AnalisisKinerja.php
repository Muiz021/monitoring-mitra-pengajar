<?php

namespace App\Charts;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AnalisisKinerja
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        // Ambil data dari database
        $spk = DB::table('mitra')
            ->join('program', 'mitra.id', '=', 'program.mitra_id')
            ->join('skors', 'program.id', '=', 'skors.program_id')
            ->join('pertanyaans', 'pertanyaans.id', '=', 'skors.question_id')
            ->join('kriterias', 'kriterias.id', '=', 'pertanyaans.kriteria_id')
            ->select('mitra.*', 'program.*', 'skors.*', 'pertanyaans.kriteria_id', 'kriterias.is_benefit', 'kriterias.weight')
            ->get();

        // Ambil nilai maksimal dan minimal untuk setiap kriteria
        $maxValues = [];
        $minValues = [];

        foreach ($spk as $data) {
            $kriteriaId = $data->kriteria_id;
            $skor = $data->skor;

            if (!isset($maxValues[$kriteriaId])) {
                $maxValues[$kriteriaId] = $skor;
                $minValues[$kriteriaId] = $skor;
            } else {
                if ($skor > $maxValues[$kriteriaId]) {
                    $maxValues[$kriteriaId] = $skor;
                }
                if ($skor < $minValues[$kriteriaId]) {
                    $minValues[$kriteriaId] = $skor;
                }
            }
        }

        // Lakukan normalisasi berdasarkan tipe kriteria (benefit/cost)
        $normalizedData = [];

        foreach ($spk as $data) {
            $kriteriaId = $data->kriteria_id;
            $skor = $data->skor;
            $tipe = $data->is_benefit; // benefit atau cost

            if ($tipe) {
                $normalizedSkor = $skor / $maxValues[$kriteriaId];
            } else {
                $normalizedSkor = $minValues[$kriteriaId] / $skor;
            }

            $normalizedData[$data->mitra_id][$kriteriaId] = $normalizedSkor;
        }

        // Ambil bobot kriteria dari tabel kriterias
        $bobotKriteria = DB::table('kriterias')
            ->pluck('weight', 'id')
            ->toArray();

        // Hitung skor akhir dengan pembobotan
        $finalScores = [];

        foreach ($normalizedData as $mitraId => $kriteriaValues) {
            $totalSkor = 0;

            foreach ($kriteriaValues as $kriteriaId => $normalizedSkor) {
                $totalSkor += $normalizedSkor * $bobotKriteria[$kriteriaId];
            }

            $finalScores[$mitraId] = $totalSkor;
        }

        // Urutkan berdasarkan skor tertinggi
        arsort($finalScores);

        // Ambil data mitra dan gabungkan dengan skor akhir
        $mitraData = DB::table('mitra')->get();
        $mitraWithScores = $mitraData->map(function ($mitra) use ($finalScores) {
            return [
                'id' => $mitra->id,
                'nama' => $mitra->nama,
                'skor_akhir' => $finalScores[$mitra->id] ?? 0,
            ];
        });

        // Urutkan berdasarkan skor tertinggi
        $sortedMitraWithScores = $mitraWithScores->sortByDesc('skor_akhir');

        // Siapkan data untuk chart
        $labels = $sortedMitraWithScores->pluck('nama')->toArray();
        $dataValues = $sortedMitraWithScores->pluck('skor_akhir')->toArray();

        // Buat chart
        return $this->chart->barChart()
            ->setTitle('Kinerja Mitra')
            ->addData('Total Nilai', $dataValues) // Menambahkan data total nilai
            ->setXAxis($labels); // Mengatur sumbu X dengan label mitra
    }
}
