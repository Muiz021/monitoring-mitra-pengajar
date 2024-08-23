<?php

namespace App\Http\Controllers;

use App\Models\AnalisiKinerja;
use GuzzleHttp\Client;
use App\Models\Program;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $latest_program = Program::latest('kode_program')->first();
        if ($latest_program) {
            $angkaData = intval(preg_replace('/[^0-9]/', '', $latest_program->kode_program));
            $kode_program = 'PROG' . str_pad($angkaData + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $kode_program = 'PROG001';
        }
        $data['kode_program'] = $kode_program;
        $data['status'] = 'proses';

        $program = Program::create($data);

        // ##NOTIFIKASI WHASTAPPS UNTUK VERIVIKASI KESIAPAN UNTUK MENGAJAR##
        // $client = new Client();
        // $url = "http://47.250.13.56/message";

        // $wa = $program->mitra->nomor_ponsel;
        // $message = "Silahkan konfimasi kehadiran dalam kegiatan " . $program->kegiatan->nama .
        //     " untuk mengajarkan " . $program->nama . " Silahkan klik link berikut : http://127.0.0.1:8000/mitra/kegiatan/" . $program->kegiatan_id;

        // $body = [
        //     'phoneNumber' => $wa,
        //     'message' => $message,
        // ];

        // $client->request('POST', $url, [
        //     'form_params' => $body,
        //     'verify'  => false,
        // ]);

        Alert::success('berhasil', 'menambah data');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);

        $data = $request->all();
        $program->update($data);

        Alert::success('berhasil', 'memperbarui data');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();

        Alert::success('berhasil', 'menghapus data');
        return redirect()->back();
    }

    public function update_menerima_kehadiran($id)
    {
        $user = Auth::user();

        $program = Program::find($id);

        $data['user_id'] = $user->id;
        $data['program_id'] = $program->id;

        Presensi::create($data);

        $program->update([
            'status' => 'setuju'
        ]);

        $data['mitra_id'] = $program->mitra_id;
        $data['program_id'] = $program->id;

        ##KINERJA MITRA##
        AnalisiKinerja::create($data);

        Alert::success('berhasil', 'mengambil program');
        return redirect()->back();
    }

    public function update_menolak_kehadiran($id)
    {
        $program = Program::find($id);
        $program->update([
            'status' => 'tidak setuju'
        ]);

        Alert::success('berhasil', 'menolak program');
        return redirect()->back();
    }
}
