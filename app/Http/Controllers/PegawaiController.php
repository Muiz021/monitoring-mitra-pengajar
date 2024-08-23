<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = User::with('pegawai')->where('roles', 'pegawai')->orderBy('created_at', 'desc')->get();
        return view('backend.pages.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('backend.pages.pegawai.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['roles'] = 'pegawai';
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        $data['user_id'] = $user->id;

        if ($request->gambar) {
            $baseURL = url('/');

            $gambar = $request->file('gambar');
            $destinationPath = 'images/profil';
            $namaGambar = $baseURL . '/images/profil/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        if ($data['jenis_kelamin'] == '') {
            Alert::info('Pemberitahuan', 'data tidak boleh kosong');
            return redirect()->back();
        }

        Pegawai::create($data);

        Alert::success('Berhasil', 'menambah pegawai');
        return redirect()->route('admin.pegawai.index');
    }

    public function edit($id)
    {
        $pegawai = User::find($id);
        return view('backend.pages.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Hapus password dari data jika form password kosong
        }

        if ($request->gambar) {
            $baseURL = url('/');

            $file_path = Str::replace($baseURL . '/images/profil/', '', public_path() . '/images/profil/' . $pegawai->gambar);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $gambar = $request->file('gambar');
            $destinationPath = 'images/profil';
            $namaGambar = $baseURL . '/images/profil/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $user->update($data);
        $pegawai->update($data);

        Alert::success('Berhasil', 'memperbarui pegawai');
        return redirect()->route('admin.pegawai.index');
    }

    public function destroy($id)
    {
        $pegawai = User::find($id);
        $pegawai->delete();

        Alert::success('Berhasil', 'menghapus pegawai');
        return redirect()->route('admin.pegawai.index');
    }

    public function update_profil(Request $request, $id)
    {
        $user = User::find($id);
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Hapus password dari data jika form password kosong
        }

        if ($request->gambar) {
            $baseURL = url('/');

            $file_path = Str::replace($baseURL . '/images/profil/', '', public_path() . '/images/profil/' . $pegawai->gambar);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $gambar = $request->file('gambar');
            $destinationPath = 'images/profil';
            $namaGambar = $baseURL . '/images/profil/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $user->update($data);
        $pegawai->update($data);

        Alert::success('Berhasil', 'memperbarui profil');
        return redirect()->back();
    }
}
