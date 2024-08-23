<?php

namespace App\Http\Controllers;

use App\Models\Skor;
use App\Models\Mitra;
use App\Models\Lokasi;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KusionerController extends Controller
{
    public function index(){

        $kegiatan = Kegiatan::get();
        $lokasi = Lokasi::get();
        $mitra = Mitra::get();

        return view('backend.pages.kusioner.index',compact('mitra','lokasi','kegiatan'));
    }

    public function program($id){
        $program = Program::where('kegiatan_id', $id)->get();
        return view('backend.pages.kusioner.program',compact('program'));
    }

    public function create($id){
        $program = Program::where('id',$id)->first();
        $pertanyaan = Pertanyaan::get();

        return view('backend.pages.kusioner.create',compact('pertanyaan','program'));
    }

    public function store(Request $request){
        $data = $request->all();

        foreach ($data['skor'] as $index => $skor) {

           $skor = Skor::create([
                'question_id' => $data['question_id'][$index],
                'skor' => $skor,
                'mitra_id' => $data['mitra_id'],
                'program_id' => $data['program_id'],
                'pelajar_id' => $data['pelajar_id'],
            ]);
        }

        Alert::success('terima kasih', 'telah mengisi kusioner');

        return redirect()->route('pelajar.kusioner.index');
    }

}
