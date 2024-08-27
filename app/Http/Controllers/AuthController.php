<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use GuzzleHttp\Client;
use App\Models\Pelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.pages.login');
    }

    function login_action(Request $request)
    {
        $kredensial = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($kredensial)) {
            if (Auth::user()->roles === 'admin') {
                return redirect()->route('admin.dashboard');
            } else
            if (Auth::user()->roles === 'pegawai') {
                return redirect()->route('pegawai.dashboard');
            } else
            if (Auth::user()->roles === 'mitra') {
                return redirect()->route('mitra.dashboard');
            } else
            if(Auth::user()->roles === 'pelajar'){
                return redirect()->route('pelajar.kusioner.index');
            }else{
                Alert::info("Info", "silahkan tunggu konfirmasi dari admin");
                return redirect()->back();
            }
        } else {
            Alert::error("Gagal", "username atau password kamu salah");
            return redirect()->back();
        }
    }

    function registrasi()
    {
        return view('auth.pages.register');
    }

    function registrasi_action(Request $request)
    {
        $data = $request->all();

        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'roles' => 'pelajar',
        ]);

        $pelajar = Pelajar::create([
            'user_id' => $user->id,
            'nama' => $data['nama'],
            'nomor_ponsel' => $data['nomor_ponsel'],
            'status' => false
        ]);

        // Buat URL konfirmasi
        $confirmationUrl = route('konfirmasi', ['id' => $pelajar->id]);

        // Kirim notifikasi WhatsApp untuk verifikasi kesiapan untuk mengajar
        $client = new Client();
        $url = "http://simonev-mitra-pengajar.my.id:8080/message";

        $wa = $pelajar->nomor_ponsel;
        $message = "Silahkan klik untuk konfirmasi akun anda " . $confirmationUrl;

        $body = [
            'phoneNumber' => $wa,
            'message' => $message,
        ];

        $client->request('POST', $url, [
            'form_params' => $body,
            'verify'  => false,
        ]);

        Alert::success('berhasil', 'silahkan klik link yang dikirim admin lewat wa untuk konfirmasi');
        return redirect()->route('login');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function konfirmasi($id)
    {
        $pelajar = Pelajar::find($id);
        $pelajar->update([
            'status' => true
        ]);

        Alert::success('berhasil', 'silahkan login');

        return redirect()->route('login');
    }
}
