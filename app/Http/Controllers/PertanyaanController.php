<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PertanyaanController extends Controller
{
    public function index(){
        $pertanyaan = Pertanyaan::orderBy('kriteria_id','asc')->get();
        return view('backend.pages.pertanyaan.index',compact('pertanyaan'));
    }

    public function create(){
        $kriteria = Kriteria::get();
        return view('backend.pages.pertanyaan.create',compact('kriteria'));
    }

    public function store(Request $request){
        $data = $request->all();

        Pertanyaan::create($data);

        Alert::success('berhasil', 'menambah data');

        return redirect()->route('admin.pertanyaan.index');
    }

    public function edit($id){
        $pertanyaan = Pertanyaan::find($id);
        $kriteria = Kriteria::get();
        return view('backend.pages.pertanyaan.edit',compact('pertanyaan','kriteria'));
    }

    public function update(Request $request,$id){
        $pertanyaan = Pertanyaan::find($id);
        $data = $request->all();

        $pertanyaan->update($data);

        Alert::success('berhasil', 'memperbarui data');

        return redirect()->route('admin.pertanyaan.index');
    }

    public function destroy($id){
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();

        Alert::success('berhasil', 'menghapus data');

        return redirect()->back();
    }
}
