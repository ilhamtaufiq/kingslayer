<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\KoordinatController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DropdownController;







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

Route::get('/', [WebController::class, 'index'])->name('v_web');
Route::get('/kec/{id_kecamatan}', [WebController::class, 'kecamatan'])->name('v_kecamatan');
Route::get('/detail/{id_sekolah}', [WebController::class, 'detail'])->name('detail');
Route::get('/detailpekerjaan/{id_pekerjaan}', [WebController::class, 'detailSan'])->name('detailSan');



Auth::routes();

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::get('/kecamatan/add', [KecamatanController::class, 'add']);
Route::post('/kecamatan/insert', [KecamatanController::class, 'insert']);
Route::get('/kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit']);
Route::get('/kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete']);
Route::post('/kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);

//Jenjang
Route::get('/jenjang', [JenjangController::class, 'index'])->name('jenjang');
Route::get('/jenjang/add', [JenjangController::class, 'add']);
Route::post('/jenjang/insert', [JenjangController::class, 'insert']);
Route::get('/jenjang/edit/{id_jenjang}', [JenjangController::class, 'edit']);
Route::post('/jenjang/update/{id_jenjang}', [JenjangController::class, 'update']);
Route::get('/jenjang/delete/{id_jenjang}', [JenjangController::class, 'delete']);


//Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');

//Pekerjaan
Route::get('/pekerjaan', [PekerjaanController::class, 'index'])->name('pekerjaan');
Route::get('/pekerjaan/add', [PekerjaanController::class, 'add']);
Route::post('/pekerjaan/insert', [PekerjaanController::class, 'insert']);
Route::get('/pekerjaan/edit/{id_pekerjaan}', [PekerjaanController::class, 'edit']);
Route::post('/pekerjaan/update/{id_pekerjaan}', [PekerjaanController::class, 'update']);
Route::get('/pekerjaan/delete/{id_pekerjaan}', [PekerjaanController::class, 'delete']);
Route::get('getDesa',[PekerjaanController::class, 'getDesa'])->name('getState');

//Kegiatan
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');

//Koordinat
Route::get('/koordinat', [KoordinatController::class, 'index'])->name('koordinat');


//Sekolah

Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah');
Route::get('/sekolah/add', [SekolahController::class, 'add']);
Route::post('/sekolah/insert', [SekolahController::class, 'insert']);
Route::get('/sekolah/edit/{id_sekolah}', [SekolahController::class, 'edit']);
Route::post('/sekolah/update/{id_sekolah}', [SekolahController::class, 'update']);
Route::get('/sekolah/delete/{id_sekolah}', [SekolahController::class, 'delete']);

Route::get('dropdown',[DropdownController::class, 'index']);
Route::get('getState',[DropdownController::class, 'getState'])->name('getState');

