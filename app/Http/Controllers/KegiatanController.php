<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Lokasi;
use App\Models\Program;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::with('program')->orderBy('created_at', 'desc')->get();
        $lokasi = Lokasi::get();
        return view('backend.pages.kegiatan.index', compact('kegiatan', 'lokasi'));
    }


    public function create()
    {
        $lokasi = Lokasi::get();
        return view('backend.pages.kegiatan.create', compact('lokasi'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $latest_kegiatan = Kegiatan::latest('kode_kegiatan')->first();
        if ($latest_kegiatan) {
            $angkaData = intval(preg_replace('/[^0-9]/', '', $latest_kegiatan->kode_kegiatan));
            $kode_kegiatan = 'KEGIAT' . str_pad($angkaData + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $kode_kegiatan = 'KEGIAT001';
        }
        $data['kode_kegiatan'] = $kode_kegiatan;

        Kegiatan::create($data);

        Alert::success('berhasil', 'menambah data');

        if (Auth::user()->roles == 'admin') {
            return redirect()->route('admin.kegiatan.index');
        } elseif (Auth::user()->roles == 'pegawai') {
            return redirect()->route('pegawai.kegiatan.index');
        }
    }

    public function show($id)
    {
        $auth = Auth::user();
        $kegiatan = Kegiatan::find($id);
        if ($auth->roles == 'mitra') {
            $program = Program::where('mitra_id', $auth->mitra->id)->get();
        } else {
            $program = Program::where('kegiatan_id', $kegiatan->id)->orderBy('created_at', 'desc')->get();
        }
        $mitra = Mitra::orderBy('nama', 'asc')->get();
        return view('backend.pages.kegiatan.show', compact('kegiatan', 'program', 'mitra'));
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        $lokasi = Lokasi::get();
        return view('backend.pages.kegiatan.edit', compact('kegiatan', 'lokasi'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $data = $request->all();
        $kegiatan->update($data);

        Alert::success('berhasil', 'memperbarui data');

        if (Auth::user()->roles == 'admin') {
            return redirect()->route('admin.kegiatan.index');
        } elseif (Auth::user()->roles == 'pegawai') {
            return redirect()->route('pegawai.kegiatan.index');
        }
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        Alert::success('berhasil', 'menghapus data');

        if (Auth::user()->roles == 'admin') {
            return redirect()->route('admin.kegiatan.index');
        } elseif (Auth::user()->roles == 'pegawai') {
            return redirect()->route('pegawai.kegiatan.index');
        }
    }
}
