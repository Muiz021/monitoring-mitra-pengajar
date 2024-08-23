<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lokasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{

    public function index()
    {
        $lokasi = Lokasi::orderBy('created_at', 'desc')->get();
        return view('backend.pages.lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        return view('backend.pages.lokasi.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'image'
        ]);

        $data = $request->all();
        $gambar = $request->file('foto');

        $destinationPath = 'images/lokasi';
        $baseURL = url('/');
        $namaGambar = $baseURL . '/images/lokasi/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
        $gambar->move($destinationPath, $namaGambar);
        $data['foto'] = $namaGambar;

        Lokasi::create($data);

        Alert::success('berhasil', 'menambah data');

        if (Auth::user()->roles == 'admin') {
            return redirect()->route('admin.lokasi.index');
        } elseif (Auth::user()->roles == 'pegawai') {
            return redirect()->route('pegawai.lokasi.index');
        }
    }


    public function show($id)
    {
        $lokasi = Lokasi::find($id);
        return view('backend.pages.lokasi.show', compact('lokasi'));
    }


    public function edit($id)
    {
        $lokasi = Lokasi::find($id);
        return view('backend.pages.lokasi.edit', compact('lokasi'));
    }


    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::find($id);
        $data = $request->all();

        if ($request->foto) {
            $baseURL = url('/');

            $file_path = Str::replace($baseURL . '/images/lokasi/', '', public_path() . '/images/lokasi/' . $lokasi->foto);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $gambar = $request->file('foto');

            $destinationPath = 'images/lokasi';
            $baseURL = url('/');
            $namaGambar = $baseURL . '/images/lokasi/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $data['foto'] = $namaGambar;
        }

        $lokasi->update($data);

        Alert::success('berhasil', 'memperbarui data');
        if (Auth::user()->roles == 'admin') {
            return redirect()->route('admin.lokasi.index');
        } elseif (Auth::user()->roles == 'pegawai') {
            return redirect()->route('pegawai.lokasi.index');
        }
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);

        $baseURL = url('/');

        $file_path = Str::replace($baseURL . '/images/lokasi/', '', public_path() . '/images/lokasi/' . $lokasi->foto);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $lokasi->delete();

        Alert::success('berhasil', 'menghapus data');

        if (Auth::user()->roles == 'admin') {
            return redirect()->route('admin.lokasi.index');
        } elseif (Auth::user()->roles == 'pegawai') {
            return redirect()->route('pegawai.lokasi.index');
        }
    }
}
