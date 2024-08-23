<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    public function index(){
        $kriteria = Kriteria::get();
        return view('backend.pages.kriteria.index',compact('kriteria'));
    }

    public function create(){
        return view('backend.pages.kriteria.create');
    }

    public function store(Request $request){
        $data = $request->all();

        Kriteria::create($data);

        Alert::success('berhasil', 'menambah data');

        return redirect()->route('admin.kriteria.index');
    }

    public function edit($id){
        $kriteria = Kriteria::find($id);
        return view('backend.pages.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request,$id){
        $kriteria = Kriteria::find($id);
        $data = $request->all();

        $kriteria->update($data);
        Alert::success('berhasil', 'memperbarui data');

        return redirect()->route('admin.kriteria.index');
    }

    public function destroy($id){
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        Alert::success('berhasil', 'menghapus data');
        return redirect()->back();
        }
}
