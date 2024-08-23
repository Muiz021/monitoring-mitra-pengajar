<?php

namespace App\Charts;

use App\Models\Mitra;
use App\Models\Program;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProgramPadaKegiatan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $user = Auth::user();
        $mitra = Mitra::where('user_id',$user->id)->first();
        $kegiatan = Kegiatan::get();

        foreach ($kegiatan as $item) {
            $program = Program::where('mitra_id',$mitra->id)->where('kegiatan_id',$item->id)->count();
            $countProgram[] = number_format($program,0);
        }

        $namaKegiatan = $kegiatan->pluck('nama')->toArray();

        return $this->chart->lineChart()
            ->setTitle('Chart Kegiatan')
            ->setSubtitle('Banyak program yang dilakukan pada setiap kegiatan')
            ->addData('Program', $countProgram) // Menggunakan $mergedProgramNames sebagai data
            ->setHeight(300)
            ->setXAxis($namaKegiatan); // Menggunakan $kegiatanNames sebagai sumbu X
    }
}
