<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Program;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Models\AnalisiKinerja;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KinerjaMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $analisis_kinerja = AnalisiKinerja::with('mitra')->get();

           // Ambil data dari database
           $spk = DB::table('mitra')
           ->join('program', 'mitra.id', '=', 'program.mitra_id')
           ->join('skors', 'program.id', '=', 'skors.program_id')
           ->join('pertanyaans', 'pertanyaans.id', '=', 'skors.question_id')
           ->join('kriterias', 'kriterias.id', '=', 'pertanyaans.kriteria_id')
           ->select('mitra.*', 'program.*', 'skors.*', 'pertanyaans.kriteria_id', 'kriterias.*')
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

           if ($tipe == true) {
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

    //    // Urutkan berdasarkan skor tertinggi
    //    arsort($finalScores);

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

        return view('backend.pages.kinerja_mitra.index', compact('sortedMitraWithScores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kinerja = AnalisiKinerja::find($id);
        $data = $request->all();
        $data['total_nilai'] = (array_sum($data) / 25);
        $kinerja->update($data);

        Alert::success('berhasil', 'memperbarui data');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
