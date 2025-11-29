<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/mahasiswa/pengajuan', [MahasiswaController::class, 'pengajuan'])->name('mahasiswaPengajuan');
Route::get('/mahasiswa/pengajuan/form-SKMA', [MahasiswaController::class, 'formSKMA'])->name('formSKMA');
Route::post('/mahasiswa/pengajuan/form-SKMA/store', [MahasiswaController::class, 'storeSKMA'])->name('storeSKMA');
Route::get('/mahasiswa/pengajuan/form-SSKP', [MahasiswaController::class, 'formSSKP'])->name('formSSKP');
Route::post('/mahasiswa/pengajuan/form-SSKP/store', [MahasiswaController::class, 'storeSSKP'])->name('storeSSKP');
Route::get('/mahasiswa/pengajuan/form-SSPTA', [MahasiswaController::class, 'formSSPTA'])->name('formSSPTA');
Route::post('/mahasiswa/pengajuan/form-SSPTA/store', [MahasiswaController::class, 'storeSSPTA'])->name('storeSSPTA');
Route::get('/mahasiswa/histori', [MahasiswaController::class, 'histori'])->name('mahasiswaHistori');

Route::get('/operator/verifikasi-SKMA', [OperatorController::class, 'verifikasiSKMA'])->name('verifikasiSKMA');
Route::get('/operator/verifikasi-SSKP', [OperatorController::class, 'verifikasiSSKP'])->name('verifikasiSSKP');
Route::get('/operator/verifikasi-SSPTA', [OperatorController::class, 'verifikasiSSPTA'])->name('verifikasiSSPTA');
Route::get('/operator/verifikasi-surat/{pengajuan}', [OperatorController::class, 'verifikasiSurat'])->name('verifikasiSurat');
Route::get('/operator/tolak-surat/{pengajuan}', [OperatorController::class, 'tolakSurat'])->name('tolakSurat');
Route::get('/operator/arsip', [OperatorController::class, 'arsip'])->name('arsip');

Route::get('/pimpinan/validasi-SKMA', [PimpinanController::class, 'validasiSKMA'])->name('validasiSKMA');
Route::get('/pimpinan/validasi-SSKP', [PimpinanController::class, 'validasiSSKP'])->name('validasiSSKP');
Route::get('/pimpinan/validasi-SSPTA', [PimpinanController::class, 'validasiSSPTA'])->name('validasiSSPTA');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
