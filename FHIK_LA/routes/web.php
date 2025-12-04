<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Pengajuan;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.choice');
});

Route::get('/login-choice', function () {
    return view('auth.choice');
})->name('choice');

Route::get('/login/mahasiswa', function () {
    return view('auth.loginMahasiswa');
})->name('loginMahasiswa');

Route::get('/login/pegawai', function () {
    return view('auth.loginPegawai');
})->name('loginPegawai');


Route::get('/dashboard', function () {
    return view('layouts.dashboard')
    ->with('mahasiswas', Pengguna::all())
    ->with('pengajuans', Pengajuan::all());
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pengguna/form-ubah-password', [UserController::class, 'formUbahPassword'])->name('formUbahPassword');
    Route::post('/pengguna/ubah-password', [UserController::class, 'ubahPassword'])->name('ubahPassword');

    Route::middleware(['role:1'])->group(function (){
        Route::get('/admin/mahasiswa/sastra-inggris', [AdminController::class, 'mahasiswa41'])->name('viewMahasiswa41');
        Route::get('/admin/mahasiswa/sastra-jepang', [AdminController::class, 'mahasiswa42'])->name('viewMahasiswa42');
        Route::get('/admin/mahasiswa/sastra-mandarin', [AdminController::class, 'mahasiswa44'])->name('viewMahasiswa44');
        Route::get('/admin/mahasiswa/sastra-cina', [AdminController::class, 'mahasiswa46'])->name('viewMahasiswa46');
        Route::get('/admin/mahasiswa/D3-seni-rupa-dan-desain', [AdminController::class, 'mahasiswa61'])->name('viewMahasiswa61');
        Route::get('/admin/mahasiswa/seni-rupa-murni', [AdminController::class, 'mahasiswa62'])->name('viewMahasiswa62');
        Route::get('/admin/mahasiswa/desain-interior', [AdminController::class, 'mahasiswa63'])->name('viewMahasiswa63');
        Route::get('/admin/mahasiswa/desain-komunikasi-visual', [AdminController::class, 'mahasiswa64'])->name('viewMahasiswa64');
        Route::get('/admin/mahasiswa/arsitektur', [AdminController::class, 'mahasiswa65'])->name('viewMahasiswa65');
        Route::get('/admin/mahasiswa/desain-mode', [AdminController::class, 'mahasiswa66'])->name('viewMahasiswa66');
        Route::get('/admin/mahasiswa/insert', [AdminController::class, 'formMahasiswa'])->name('formMahasiswa');
        Route::post('/admin/mahasiswa/store', [AdminController::class, 'storeMahasiswa'])->name('storeMahasiswa');
        Route::get('/admin/mahasiswa/{id}/edit', [AdminController::class, 'editMahasiswa'])->name('editMahasiswa');
        Route::post('/admin/mahasiswa/{id}/update', [AdminController::class, 'updateMahasiswa'])->name('updateMahasiswa');
        Route::delete('/admin/mahasiswa/{id}/delete', [AdminController::class, 'deleteMahasiswa'])->name('deleteMahasiswa');
    });

    Route::middleware(['role:2'])->group(function (){
        Route::get('/operator/verifikasi-SKMA', [OperatorController::class, 'verifikasiSKMA'])->name('verifikasiSKMA');
        Route::get('/operator/verifikasi-SSKP', [OperatorController::class, 'verifikasiSSKP'])->name('verifikasiSSKP');
        Route::get('/operator/verifikasi-SSPTA', [OperatorController::class, 'verifikasiSSPTA'])->name('verifikasiSSPTA');
        Route::get('/operator/verifikasi-surat/{pengajuan}', [OperatorController::class, 'verifikasiSurat'])->name('verifikasiSurat');
        Route::get('/operator/tolak-surat/{pengajuan}', [OperatorController::class, 'tolakSurat'])->name('tolakSurat');
        Route::get('/operator/arsip', [OperatorController::class, 'arsip'])->name('arsip');
    });

    Route::middleware(['role:3'])->group(function (){
        Route::get('/pimpinan/validasi-SKMA', [PimpinanController::class, 'validasiSKMA'])->name('validasiSKMA');
        Route::get('/pimpinan/validasi-SSKP-Koordinator', [PimpinanController::class, 'validasiSSKPKoor'])->name('validasiSSKPKoor');
        Route::get('/pimpinan/validasi-SSPTA-Koordinator', [PimpinanController::class, 'validasiSSPTAKoor'])->name('validasiSSPTAKoor');
        Route::get('/pimpinan/validasi-SSKP-Kaprodi', [PimpinanController::class, 'validasiSSKPKaprodi'])->name('validasiSSKPKaprodi');
        Route::get('/pimpinan/validasi-SSPTA-Kaprodi', [PimpinanController::class, 'validasiSSPTAKaprodi'])->name('validasiSSPTAKaprodi');
        Route::get('/pimpinan/validasi-surat/{pengajuan}', [PimpinanController::class, 'validasiSurat'])->name('validasiSurat');
        Route::get('/pimpinan/tolak-surat/{pengajuan}', [PimpinanController::class, 'tolakSurat'])->name('tolakSuratPimpinan');
    });

    Route::middleware(['role:4'])->group(function (){
        Route::get('/mahasiswa/pengajuan', [MahasiswaController::class, 'pengajuan'])->name('mahasiswaPengajuan');
        Route::get('/mahasiswa/pengajuan/form-SKMA', [MahasiswaController::class, 'formSKMA'])->name('formSKMA');
        Route::post('/mahasiswa/pengajuan/form-SKMA/store', [MahasiswaController::class, 'storeSKMA'])->name('storeSKMA');
        Route::get('/mahasiswa/pengajuan/form-SSKP', [MahasiswaController::class, 'formSSKP'])->name('formSSKP');
        Route::post('/mahasiswa/pengajuan/form-SSKP/store', [MahasiswaController::class, 'storeSSKP'])->name('storeSSKP');
        Route::get('/mahasiswa/pengajuan/form-SSPTA', [MahasiswaController::class, 'formSSPTA'])->name('formSSPTA');
        Route::post('/mahasiswa/pengajuan/form-SSPTA/store', [MahasiswaController::class, 'storeSSPTA'])->name('storeSSPTA');
        Route::get('/mahasiswa/histori', [MahasiswaController::class, 'histori'])->name('mahasiswaHistori');
    });
});

require __DIR__.'/auth.php';
