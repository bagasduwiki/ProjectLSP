<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;


Route::get('/',[SuratController::class,'home'])->name('home'); //Route ke home/dashboard
Route::get('home',[SuratController::class,'home'])->name('home'); //Route ke home/dashboard
Route::get('/about',[SuratController::class,'about'])->name('about'); //Route ke halaman about
Route::get('/tambah',[SuratController::class,'tambahSurat'])->name('tambah'); //Route ke halaman tambah
Route::post('/storeSurat',[SuratController::class,'storeSurat'])->name('storeSurat'); //Route untuk menyimpan data
Route::get('/lihat/{id}', [SuratController::class,'lihatSurat'])->name('lihat'); //Route untuk melihat data by id
Route::get('edit/{id}', [SuratController::class,'editSurat'])->name('edit'); //Route untuk ke halaman edit
Route::patch('/{id}', [SuratController::class,'updateSurat'])->name('updateSurat'); //Route untuk mengubah data
Route::delete('/hapus/{id}', [SuratController::class,'hapusSurat'])->name('hapus'); //Route untuk menghapus data
Route::get('download/{file}', [SuratController::class,'downloadSurat'])->name('download'); //Route untuk mendowload data
