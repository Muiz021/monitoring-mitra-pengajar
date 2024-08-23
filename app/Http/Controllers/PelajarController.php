<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajar = User::where('roles', 'pelajar')->get();
        return view('backend.pages.pelajar.index', compact('pelajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelajar  $pelajar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelajar = User::find($id);
        return view('backend.pages.pelajar.show', compact('pelajar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelajar  $pelajar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelajar = User::find($id);
        return view('backend.pages.pelajar.edit', compact('pelajar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelajar  $pelajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $pelajar = Pelajar::where('user_id', $user->id)->first();
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Hapus password dari data jika form password kosong
        }
        $user->update($data);
        $pelajar->update($data);

        Alert::success('Berhasil', 'memperbarui pelajar');
        return redirect()->route('admin.pelajar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelajar  $pelajar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $pelajar = Pelajar::where('user_id',$user->id)->first();

        $pelajar->delete();
        $user->delete();

        Alert::success('Berhasil', 'menghapus pelajar');
        return redirect()->route('admin.pelajar.index');
    }
}
