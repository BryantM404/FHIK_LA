<?php

namespace App\Http\Controllers;

use App\Models\LogPengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\MahasiswaDetail;
use App\Models\Pengajuan;
use App\Models\Pengguna;
use App\Models\SuratKMA;
use App\Models\SuratSKP;
use App\Models\SuratSPTA;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function pengajuan()
    {
        return(view('mahasiswa.pengajuan'));
    }

    public function histori()
    {
        return(view('mahasiswa.histori'))
            ->with('pengajuans', Pengajuan::all());
    }

    public function formSKMA()
    {
        return(view('mahasiswa.formSKMA'));
    }

    public function formSSKP()
    {
        return(view('mahasiswa.formSSKP'));
    }

    public function formSSPTA()
    {
        return(view('mahasiswa.formSSPTA'));
    }

    public function storeSKMA(Request $request)
    {
        $validated = $request->validate([
            'tempatTanggalLahir' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'programStudi' => 'required|string|max:45',
            'tahunAkademik' => 'required|string|max:20',
            'namaWali' => 'required|string|max:60',
            'alamatOrangTua' => 'required|string|max:100',
            'pekerjaanOrangTua' => 'required|string|max:45',
            'instansi' => 'nullable|string|max:50',
            'pangkatGolongan' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:30',
        ]);

        DB::transaction(function () use ($validated) {

            $userId = Auth::id();

            $pengajuan = Pengajuan::create([
                'pengguna_id' => $userId,
                'tanggalPengajuan' => Carbon::now('Asia/Jakarta'),
                'jenisSurat_id' => 1,
                'status_id' => 1,
            ]);

            Pengguna::updateOrCreate(
                ['id' => $userId],
                [
                'programStudi' => $validated['programStudi'],
                ]
            );

            MahasiswaDetail::updateOrCreate(
                ['pengguna_id' => $userId],
                [
                    'tempatTanggalLahir' => $validated['tempatTanggalLahir'],
                    'alamat' => $validated['alamat'],
                    'namaWali' => $validated['namaWali'],
                    'alamatOrangTua' => $validated['alamatOrangTua'],
                    'pekerjaanOrangTua' => $validated['pekerjaanOrangTua'],
                    'status' => 'A'
                ]
            );

            SuratKMA::create([
                'tahunAkademik' => $validated['tahunAkademik'],
                'instansi' => $validated['instansi'] ?? '',
                'pangkatGolongan' => $validated['pangkatGolongan'] ?? '',
                'jabatan' => $validated['jabatan'] ?? '',
                'pengajuan_id' => $pengajuan->id,
            ]);

            LogPengguna::create([
                'aktivitas' => 'Mengajukan Surat Keterangan Mahasiswa Aktif',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'pengguna_id' => $userId,
            ]);
        });

        return redirect()->route('mahasiswaHistori');
    }


    public function storeSSKP(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:150',
            'tempatKP' => 'required|string|max:50',
            'alamatKP' => 'required|string|max:100',
        ]);

        DB::transaction(function () use ($validated) {

            $userId = Auth::id();

            $pengajuan = Pengajuan::create([
                'pengguna_id' => $userId,
                'tanggalPengajuan' => Carbon::now('Asia/Jakarta'),
                'jenisSurat_id' => 2,
                'status_id' => 1,
            ]);

            MahasiswaDetail::updateOrCreate(
                ['pengguna_id' => $userId],
                [
                    'email' => $validated['email'],
                ]
            );

            SuratSKP::create([
                'tempatKP' => $validated['tempatKP'],
                'alamatKP' => $validated['alamatKP'],
                'pengajuan_id' => $pengajuan->id,
            ]);

            LogPengguna::create([
                'aktivitas' => 'Mengajukan Surat Survey Kerja Praktik',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'pengguna_id' => $userId,
            ]);
        });

        return redirect()->route('mahasiswaHistori');
    }

    public function storeSSPTA(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:150',
            'judulTugas' => 'required|string|max:200',
            'tempatPenelitian' => 'required|string|max:50',
            'alamatPenelitian' => 'required|string|max:100',
            'mataKuliah' => 'required|string|max:45',
            'dosenMataKuliah' => 'required|string|max:100',
        ]);

        DB::transaction(function () use ($validated) {

            $userId = Auth::id();

            $pengajuan = Pengajuan::create([
                'pengguna_id' => $userId,
                'tanggalPengajuan' => Carbon::now('Asia/Jakarta'),
                'jenisSurat_id' => 3,
                'status_id' => 1,
            ]);

            MahasiswaDetail::updateOrCreate(
                ['pengguna_id' => $userId],
                [
                    'email' => $validated['email'],
                ]
            );

            SuratSPTA::create([
                'judulTugas' => $validated['judulTugas'],
                'tempatPenelitian' => $validated['tempatPenelitian'],
                'alamatPenelitian' => $validated['alamatPenelitian'],
                'mataKuliah' => $validated['mataKuliah'],
                'dosenMataKuliah' => $validated['dosenMataKuliah'],
                'pengajuan_id' => $pengajuan->id,
            ]);

            LogPengguna::create([
                'aktivitas' => 'Mengajukan Surat Survey Penelitian Tugas Akhir',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'pengguna_id' => $userId,
            ]);
        });

        return redirect()->route('mahasiswaHistori');
    }


}
