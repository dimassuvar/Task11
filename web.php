<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\santriController;
use App\Http\Controllers\mahasantriController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AnggotaController;

use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;

use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasantriiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function () {
    return " Assalamualaikum, Selamat Belajar Laravel PeTIK Jombang Angkatan III";
});

//routing parameter
Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) {
    return 'Nama Pegawai : '.$nama.'<br/>Departemen : '.$divisi;
});

//routing view kondisi
Route::get('/kabar', function () {
    return view('kondisi');
});

//routing view Data Santri
Route::get('/santri', [SantriController::class, 'dataSantri']
);

//routing view Data mahaSantri
Route::get('/mahasantri', [mahasantriController::class, 'dataMahasantri']
);

//routing view hello
Route::get('/hello', function () {
    return view('hello', ['name' =>'Inaya']);
});

//routing view nilai
Route::get('/nilai', function () {
    return view('nilai');
});

//routing view daftar_nilai
Route::get('/daftar_nilai', function () {
    return view('daftar_nilai');
});

//routing view app
Route::get('/phpframework', function () {
    return view('layouts.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//routing data pegawai
Route::get('/pegawai',[PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create',[PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai',[PegawaiController::class, 'store'])->name('pegawai.store');

//routing data anggota
Route::get('/anggota',[AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create',[AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota',[AnggotaController::class, 'store'])->name('anggota.store');  
    
//routing pengarang, penerbit, kategori, buku
Route::resource('pengarang', PengarangController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('buku', BukuController::class);

//routing Matakuliah, Jurusan, Dosen, Mahasantrii
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('dosen', DosenController::class);
Route::resource('mahasantrii', MahasantriiController::class);

Route::get('bukupdf', [BukuController::class, 'bukuPDF']);

