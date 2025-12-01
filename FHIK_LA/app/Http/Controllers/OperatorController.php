<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Pengajuan;
use App\Models\LogPengguna;
use App\Models\PimpinanDetail;
use Illuminate\Http\Request;



class OperatorController extends Controller
{
    public function verifikasiSKMA()
    {
        return(view('operator.verifikasiSKMA'))
            ->with('pengajuans', Pengajuan::all());
    }

    public function verifikasiSSKP()
    {
        return(view('operator.verifikasiSSKP'))
            ->with('pengajuans', Pengajuan::all());
    }
    
    public function verifikasiSSPTA()
    {
        return(view('operator.verifikasiSSPTA'))
            ->with('pengajuans', Pengajuan::all());
    }
    
    public function arsip()
    {
        return(view('operator.arsip'))
            ->with('pengajuans', Pengajuan::all());
    }

    public function verifikasiSurat($pengajuan)
    {
        DB::transaction(function () use ($pengajuan) {

            $data = Pengajuan::with('pengguna')->findOrFail($pengajuan);
            $userId = Auth::id();


            $data->update([
                'status_id' => 2,
            ]);

            LogPengguna::create([
                'aktivitas' => 'Memverifikasi pengajuan surat (id=' . $data->id . ')',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'pengguna_id' => $userId,
            ]);
            
            if ($data->jenisSurat_id == 1) {
                $template = 'surat.verifikasi.verifikasi-skma';
                $pimpinan1 = PimpinanDetail::where('jabatan', 'Dekan')->first();
                $pimpinan2 = null;

                $filename = sprintf('Surat Keterangan Mahasiswa Aktif_%d_%s.pdf', $data->pengguna->id, $data->id);
                $relativePath = "surat/SKMA/{$filename}";
            
            } elseif ($data->jenisSurat_id == 2) {
                if($data->pengguna->programStudi == '63 - Desain Interior'){
                    $template = 'surat.verifikasi.verifikasi-sskp-63';
                    $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Interior')->first();
                    $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator KP - D.Interior')->first();
                } else{
                    $template = 'surat.verifikasi.verifikasi-sskp-64';
                    $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Komunikasi Visual')->first();
                    $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator KP - DKV')->first();
                }
                $filename = sprintf('Surat Survei Kerja Praktik_%d_%s.pdf', $data->pengguna->id, $data->id);
                $relativePath = "surat/SSKP/{$filename}";

            } elseif ($data->jenisSurat_id == 3) {
                if($data->pengguna->programStudi == '63 - Desain Interior'){
                    $template = 'surat.verifikasi.verifikasi-sspta-63';
                    $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Interior')->first();
                    $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator TA - D.Interior')->first();
                } else{
                    $template = 'surat.verifikasi.verifikasi-sspta-64';
                    $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Komunikasi Visual')->first();
                    $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator TA - DKV')->first();
                }
                $filename = sprintf('Surat Survei Penelitian Tugas Akhir_%d_%s.pdf', $data->pengguna->id, $data->id);
                $relativePath = "surat/SSPTA/{$filename}";

            }

            $pdfData = [
                'pengajuan' => $data,
                'nomorSurat' => '',
                'pengguna' => $data->pengguna,
                'mahasiswaDetail' => $data->pengguna->mahasiswaDetail,
                'pimpinan1' => $pimpinan1,
                'pimpinan2' => $pimpinan2,
                'suratKMA' => $data->suratKMA,
                'suratSKP' => $data->suratSKP,
                'suratSPTA' => $data->suratSPTA,
            ];

            $pdf = Pdf::loadView($template, $pdfData);

            $disk = 'public';
            Storage::disk($disk)->put($relativePath, $pdf->output());

            $data->dokumenPath = "storage/{$relativePath}";
            $data->save();
        });

        return back();
    }

    public function tolakSurat(Request $request, $pengajuan)
    {
        $validated = $request->validate([
            'alasanPenolakan' => 'required|string|max:100',
        ]);

        DB::transaction(function () use ($pengajuan, $validated) {

            $data = Pengajuan::find($pengajuan);

            $data->update([
                'alasanPenolakan' => $validated['alasanPenolakan'],
                'status_id' => 4,
            ]);

            LogPengguna::create([
                'aktivitas' => 'Menolak pengajuan surat (id surat = '. $data->id . ')',
                'pengguna_id' => Auth::id(),
                'created_at' => Carbon::now('Asia/Jakarta'),
            ]);
        });

        return back();
    }

}
