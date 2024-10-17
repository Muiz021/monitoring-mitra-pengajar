<?php


use App\Models\Kriteria;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelajarController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KusionerController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\KinerjaMitraController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * auth
 */
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'login_action'])->name('login_action');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi', [AuthController::class, 'registrasi_action'])->name('registrasi_action');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('konfirmasi/{id}',[AuthController::class,'konfirmasi'])->name('konfirmasi');

/**
 * landing page
 */
// Route::get('/',function(){
//     return view('frontend.landing-page');
// });

/**
 * Admin
 */
Route::name('admin.')->prefix('admin')->middleware(['auth', 'OnlyAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');

    // mitra
    Route::resource('mitra', MitraController::class);
    Route::get('mitra/konfirmasi/{id}',[MitraController::class,'konfirmasi'])->name('mitra.konfirmasi');

    // kegiatan
    Route::resource('kegiatan', KegiatanController::class);

    // program
    Route::resource('program', ProgramController::class);

    // pegawai
    Route::resource('pegawai', PegawaiController::class);

    // pelajar
    Route::resource('pelajar', PelajarController::class);

    // Lokasi
    Route::resource('lokasi', LokasiController::class);

    // presensi
    Route::resource('presensi', PresensiController::class);

    // kinerja mitra
    Route::resource('kinerja-mitra', KinerjaMitraController::class);

    // kriteria
    Route::resource('kriteria',KriteriaController::class);

    // pertanyaan
    Route::resource('pertanyaan', PertanyaanController::class);
});

/**
 * Pegawai
 */
// Route::name('pegawai.')->prefix('pegawai')->middleware(['auth', 'OnlyPegawai'])->group(function () {
//     // dashboard
//     Route::get('dashboard', [DashboardController::class, 'pegawai'])->name('dashboard');

//     // profil update
//     Route::put('profil/{id}',[PegawaiController::class,'update_profil'])->name('update_profil');

//     // mitra
//     Route::resource('mitra', MitraController::class);
//     Route::get('mitra/konfirmasi/{id}',[MitraController::class,'konfirmasi'])->name('mitra.konfirmasi');

//     // kegiatan
//     Route::resource('kegiatan', KegiatanController::class);

//     // program
//     Route::resource('program', ProgramController::class);

//     // Lokasi
//     Route::resource('lokasi', LokasiController::class);

//     // presensi
//     Route::resource('presensi', PresensiController::class);

//      // kinerja mitra
//      Route::resource('kinerja-mitra', KinerjaMitraController::class);
// });


/**
 * Mitra Pengajar
 */
Route::name('mitra.')->prefix('mitra')->middleware(['auth', 'OnlyMitra'])->group(function () {

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'mitra'])->name('dashboard');
    Route::put('profil/{id}',[MitraController::class,'update_profil'])->name('update.profil');

    // kegiatan
    Route::resource('kegiatan', KegiatanController::class);

    // program
    Route::put('menerima/{id}', [ProgramController::class, 'update_menerima_kehadiran'])->name('program.update.menerima.kehadiran');
    Route::put('menolak/{id}', [ProgramController::class, 'update_menolak_kehadiran'])->name('program.update.menolak.kehadiran');

    // presensi
    Route::resource('presensi', PresensiController::class);
});

/**
 * Pelajar
 */
Route::name('pelajar.')->prefix('pelajar')->middleware(['OnlyPelajar','auth'])->group(function(){
    Route::resource('kusioner',KusionerController::class)->except('create');
    Route::get('kusioner/create/{id}',[KusionerController::class,'create'])->name('kusioner.create');
    Route::get('program/{id}/kusioner', [KusionerController::class,'program'])->name('kusioner.program');
});
