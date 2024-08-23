<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PresensiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user == 'mitra') {
            $presensi = Presensi::where('user_id',$user->id)->orderBy('created_at','desc')->get();
        }else{
            $presensi = Presensi::orderBy('created_at','desc')->get();
        }
        return view('backend.pages.presensi.index',compact('presensi'));
    }

    public function update(Request $request,$id)
    {
        $presensi = Presensi::find($id);
        $data = $request->all();

         // reformat gambar dari webcam
         $image_parts = explode(";base64,", $data['image']);
         $image_type_aux = explode("image/", $image_parts[0]);
         $image_type = $image_type_aux[1];
         $image_base64 = base64_decode($image_parts[1]);

         // penentuan folder path , nama file dan public url
         $folderPath = '/images/presensi/';
         $fileName = $folderPath . uniqid() . '.' . $image_type;
         $publicURL = url($fileName);

         // Menyimpan gambar ke direktori penyimpanan
         file_put_contents(public_path() .  $fileName, $image_base64);


        // mengkategorikan data
        $data['gambar'] = $publicURL;
        $data['status'] = 'hadir';

        $presensi->update($data);

        Alert::success('berhasil', 'melakukan presensi');
        return redirect()->back();

    }
}
