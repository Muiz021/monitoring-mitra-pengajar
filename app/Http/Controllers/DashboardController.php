<?php

namespace App\Http\Controllers;

use App\Charts\AnalisisKinerja;
use App\Models\Lokasi;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Charts\MitraDanPegawai;
use App\Charts\MitraDanProgram;
use App\Charts\ProgramPadaKegiatan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin(MitraDanPegawai $mitraDanPegawai,MitraDanProgram $mitraDanProgram, AnalisisKinerja $analisisKinerja)
    {
        $countKegiatan = Kegiatan::count();
        $countProgram = Program::count();
        $countLokasi = Lokasi::count();

        return view('backend.pages.dashboard.admin',['kegiatan' => $countKegiatan,'program' => $countProgram,'lokasi' => $countLokasi,'userChart' => $mitraDanPegawai->build(),'programChart' => $mitraDanProgram->build(),'kinerjaMitraChart' => $analisisKinerja->build()]);
    }

    public function pegawai(MitraDanPegawai $mitraDanPegawai,MitraDanProgram $mitraDanProgram, AnalisisKinerja $analisisKinerja)
    {
        $countKegiatan = Kegiatan::count();
        $countProgram = Program::count();
        $countLokasi = Lokasi::count();

        return view('backend.pages.dashboard.pegawai',['kegiatan' => $countKegiatan,'program' => $countProgram,'lokasi' => $countLokasi,'userChart' => $mitraDanPegawai->build(),'programChart' => $mitraDanProgram->build(), 'kinerjaMitraChart' => $analisisKinerja->build()]);
    }

    public function mitra(ProgramPadaKegiatan $chart)
    {
        $user = Auth::user();
        $kegiatan = Kegiatan::get();
        $program = Program::where('mitra_id',$user->mitra->id)->orderBy('created_at','desc')->get();
        $presensi = Presensi::where('user_id',$user->id)->orderBy('created_at','desc')->get();

        return view('backend.pages.dashboard.mitra',['kegiatan' => $kegiatan,'program' => $program,'presensi' => $presensi,'chart' => $chart->build()]);
    }
}
