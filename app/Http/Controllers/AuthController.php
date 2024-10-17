<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use GuzzleHttp\Client;
use App\Models\Pelajar;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            if(Auth::user()->roles === 'pelajar' && Auth::user()->pelajar->status == true){
                return redirect()->route('pelajar.kusioner.index');
            }else{
                Alert::info("Info", "silahkan verifikasi terlebih dahulu");
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
            'email' => $data['email'],
            'status' => false
        ]);

        // Konfirmasi email
        $subject = "Konfirmasi Akun";
        Mail::send('auth.pages.email', ['id' => $pelajar->id], function ($message) use($pelajar, $subject) {
            $message->to($pelajar->email)
                ->subject($subject);
        });

        Alert::success('berhasil', 'silahkan verifikasi melalui email');
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
