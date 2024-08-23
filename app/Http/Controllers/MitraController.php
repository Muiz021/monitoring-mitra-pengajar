<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = User::with('mitra')->where('roles', 'mitra')->orderBy('created_at', 'desc')->get();
        return view('backend.pages.mitra.index', compact('mitra'));
    }

    public function create(){
        return view('backend.pages.mitra.create');
    }

    public function store(Request $request){
        $data = $request->all();

        $data['roles'] = 'mitra';
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        $data['user_id'] = $user->id;

        Mitra::create($data);

        Alert::success('berhasil', 'menambah data');

        return redirect()->route('admin.mitra.index');
    }

    public function show($id)
    {
        $mitra = User::find($id);
        return view('backend.pages.mitra.show', compact('mitra'));
    }

    public function edit($id)
    {
        $mitra = User::find($id);
        return view('backend.pages.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $mitra = Mitra::where('user_id', $user->id)->first();

        $data = $request->all();

        $dataUser = [
            'username' => $data['username'],
        ];
        if ($request->filled('password')) {
            $dataUser['password'] = Hash::make($data['password']);
        }

        // if ($request->gambar) {
        //     $baseURL = url('/');

        //     $file_path = Str::replace($baseURL . '/images/profil/', '', public_path() . '/images/profil/' . $mitra->gambar);
        //     if (file_exists($file_path || $mitra->gambar != null)) {
        //         unlink($file_path);
        //     }

        //     $gambar = $request->file('gambar');
        //     $destinationPath = 'images/profil';
        //     $baseURL = url('/');
        //     $namaGambar = $baseURL . '/images/profil/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
        //     $gambar->move($destinationPath, $namaGambar);
        //     $data['gambar'] = $namaGambar;
        // }

        // if ($data['jenis_kelamin'] == '' || $data['status'] == '') {
        //     Alert::info('Pemberitahuan', 'data tidak boleh kosong');
        //     return redirect()->back();
        // }

        $user->update($dataUser);
        $mitra->update($data);

        Alert::success('berhasil', 'memperbarui data');
        if (Auth::user()->roles == 'admin') {
            return redirect()->route('admin.mitra.index');
        } elseif (Auth::user()->roles == 'pegawai') {
            return redirect()->route('pegawai.mitra.index');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $mitra = Mitra::where('user_id', $user->id)->first();

        if ($mitra->gambar) {
            $baseURL = url('/');

            $file_path = Str::replace($baseURL . '/images/profil/', '', public_path() . '/images/profil/' . $mitra->gambar);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $user->delete();

        Alert::success('berhasil', 'menghapus data');

        if (Auth::user()->roles == 'admin') {
            return redirect()->route('admin.mitra.index');
        } elseif (Auth::user()->roles == 'pegawai') {
            return redirect()->route('pegawai.mitra.index');
        }
    }

    public function update_profil(Request $request, $id)
    {
        $user = User::find($id);
        $mitra = Mitra::where('user_id', $user->id)->first();
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Hapus password dari data jika form password kosong
        }

        if ($request->gambar) {
            $baseURL = url('/');

            $file_path = Str::replace($baseURL . '/images/profil/', '', public_path() . '/images/profil/' . $mitra->gambar);
            if (file_exists($file_path || $mitra->gambar != null)) {
                unlink($file_path);
            }

            $gambar = $request->file('gambar');
            $destinationPath = 'images/profil';
            $baseURL = url('/');
            $namaGambar = $baseURL . '/images/profil/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        if ($data['jenis_kelamin'] == '') {
            Alert::info('Pemberitahuan', 'data tidak boleh kosong');
            return redirect()->back();
        }

        $user->update($data);
        $mitra->update($data);

        Alert::success('berhasil', 'memperbarui profil');
        return redirect()->back();
    }

    public function konfirmasi($id)
    {
        $user = User::find($id);
        $mitra = Mitra::where('user_id', $user->id)->first();

        $mitra->update([
            'status' => true
        ]);

        Alert::success('berhasil', 'konfirmasi mitra');
        return redirect()->back();
    }
}
