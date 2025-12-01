<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Pengajuan;
use App\Models\LogPengguna;
use App\Models\Pengguna;
use App\Models\PimpinanDetail;
use Illuminate\Http\Request;


class PimpinanController extends Controller
{
    public function validasiSKMA()
    {
        return(view('pimpinan.validasiSKMA'))
            ->with('pengajuans', Pengajuan::all());
    }

    public function validasiSSKPKoor()
    {
        return(view('pimpinan.validasiSSKP-koor'))
            ->with('pengajuans', Pengajuan::all());
    }
    
    public function validasiSSPTAKoor()
    {
        return(view('pimpinan.validasiSSPTA-koor'))
            ->with('pengajuans', Pengajuan::all());
    }

    public function validasiSSKPKaprodi()
    {
        return(view('pimpinan.validasiSSKP-kaprodi'))
            ->with('pengajuans', Pengajuan::all());
    }
    
    public function validasiSSPTAKaprodi()
    {
        return(view('pimpinan.validasiSSPTA-kaprodi'))
            ->with('pengajuans', Pengajuan::all());
    }

    private function generateNomorSurat(Pengajuan $pengajuan)
    {
        $kodeProdi = [
            '63 - Desain Interior' => 'DI',
            '64 - Desain Komunikasi Visual' => 'DKV',
        ];

        $bulanRomawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII',
        ];

        $tahun = now()->year;
        $bulan = $bulanRomawi[now()->month];
        $prodi = $kodeProdi[$pengajuan->pengguna->programStudi] ?? 'XX';

        $counter = Pengajuan::whereYear('tanggalPengajuan', $tahun)
            ->where('jenisSurat_id', $pengajuan->jenisSurat_id)
            ->whereHas('pengguna', function ($q) use ($pengajuan) {
                $q->where('programStudi', $pengajuan->pengguna->programStudi);
            })
            ->count() + 1;

        $counterFormatted = str_pad($counter, 3, '0', STR_PAD_LEFT);


        if ($pengajuan->jenisSurat_id == 1) {
            return "{$counterFormatted}/SKM/FHIK/UKM/{$bulan}/{$tahun}";
        }
        if ($pengajuan->pengguna->programStudi == "63 - Desain Interior") {

            if ($pengajuan->jenisSurat_id == 2) {
                return "{$counterFormatted}/Srt.KP/{$prodi}/FHIK/UKM/{$bulan}/{$tahun}";
            }
            return "{$counterFormatted}/AKD/{$prodi}/FHIK/UKM/{$bulan}/{$tahun}";
        }
        if ($pengajuan->pengguna->programStudi == "64 - Desain Komunikasi Visual") {
            if ($pengajuan->jenisSurat_id == 2) {
                return "{$counterFormatted}/AKD/TKP/{$prodi}/FHIK/UKM/{$bulan}/{$tahun}";
            }
            return "{$counterFormatted}/AKD/TA/{$prodi}/FHIK/UKM/{$bulan}/{$tahun}";
        }
    }

    public function validasiSurat($pengajuan)
    {
        DB::transaction(function () use ($pengajuan) {

            $data = Pengajuan::with('pengguna')->findOrFail($pengajuan);
            $userId = Auth::id();

            $KaprodiDI = PimpinanDetail::where('jabatan', 'Kaprodi Desain Interior')->first();
            $KaprodiDKV = PimpinanDetail::where('jabatan', 'Kaprodi Desain Komunikasi Visual')->first();
            $nomorSurat = '';
            if (
                Auth::user()->pimpinanDetail->jabatan == $KaprodiDI->jabatan ||
                Auth::user()->pimpinanDetail->jabatan == $KaprodiDKV->jabatan
            ) {
                $nomorSurat = $this->generateNomorSurat($data);
            };

            $data->update([
                'tanggalDisetujui' => Carbon::now('Asia/Jakarta'),
                'noSurat' => $nomorSurat
            ]);

            $tanggalFormatted = Carbon::parse($data->tanggalDisetujui)->translatedFormat('d F Y');

            LogPengguna::create([
                'aktivitas' => 'Validasi pengajuan surat (id=' . $data->id . ')',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'pengguna_id' => $userId,
            ]);
            
            if ($data->jenisSurat_id == 1) {
                $template = 'surat.validasi.validasi-skma';
                $pimpinan1 = PimpinanDetail::where('jabatan', 'Dekan')->first();
                $pimpinan2 = null;

                $filename = sprintf('Surat Keterangan Mahasiswa Aktif_%d_%s.pdf', $data->pengguna->id, $data->id);
                $relativePath = "surat/SKMA/{$filename}";
                $data->update([
                    'status_id' => 3,
                ]);
            
            } elseif ($data->jenisSurat_id == 2) {
                if($data->koordinator_id == NULL){
                    if($data->pengguna->programStudi == '63 - Desain Interior'){
                        $template = 'surat.validasi.validasi-koor-sskp-63';
                        $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Interior')->first();
                        $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator KP - D.Interior')->first();
                    } else{
                        $template = 'surat.validasi.validasi-koor-sskp-64';
                        $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Komunikasi Visual')->first();
                        $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator KP - DKV')->first();
                    }
                    $data->update([
                        'koordinator_id' => $userId,
                    ]);

                } else{
                    if($data->pengguna->programStudi == '63 - Desain Interior'){
                        $template = 'surat.validasi.validasi-kaprodi-sskp-63';
                        $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Interior')->first();
                        $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator KP - D.Interior')->first();
                    } else{
                        $template = 'surat.validasi.validasi-kaprodi-sskp-64';
                        $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Komunikasi Visual')->first();
                        $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator KP - DKV')->first();
                    }
                    $data->update([
                        'status_id' => 3,
                    ]);
                }
                
                $filename = sprintf('Surat Survei Kerja Praktik_%d_%s.pdf', $data->pengguna->id, $data->id);
                $relativePath = "surat/SSKP/{$filename}";

            } elseif ($data->jenisSurat_id == 3) {
                if($data->koordinator_id == NULL){
                    if($data->pengguna->programStudi == '63 - Desain Interior'){
                        $template = 'surat.validasi.validasi-koor-sspta-63';
                        $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Interior')->first();
                        $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator TA - D.Interior')->first();
                    } else{
                        $template = 'surat.validasi.validasi-koor-sspta-64';
                        $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Komunikasi Visual')->first();
                        $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator TA - DKV')->first();
                    }
                    $data->update([
                        'koordinator_id' => $userId,
                    ]);
                    
                } else{
                    if($data->pengguna->programStudi == '63 - Desain Interior'){
                        $template = 'surat.validasi.validasi-kaprodi-sspta-63';
                        $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Interior')->first();
                        $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator TA - D.Interior')->first();
                    } else{
                        $template = 'surat.validasi.validasi-kaprodi-sspta-64';
                        $pimpinan1 = PimpinanDetail::where('jabatan', 'Kaprodi Desain Komunikasi Visual')->first();
                        $pimpinan2 = PimpinanDetail::where('jabatan', 'Koordinator TA - DKV')->first();
                    }
                    $data->update([
                        'status_id' => 3,
                    ]);
                }

                $filename = sprintf('Surat Survei Penelitian Tugas Akhir_%d_%s.pdf', $data->pengguna->id, $data->id);
                $relativePath = "surat/SSPTA/{$filename}";
            }


            $disk = 'public';
            if (Storage::disk($disk)->exists($relativePath)) {
                Storage::disk($disk)->delete($relativePath);
            }

            $pdfData = [
                'pengajuan' => $data,
                'pengguna' => $data->pengguna,
                'mahasiswaDetail' => $data->pengguna->mahasiswaDetail,
                'pimpinan1' => $pimpinan1,
                'pimpinan2' => $pimpinan2,
                'suratKMA' => $data->suratKMA,
                'suratSKP' => $data->suratSKP,
                'suratSPTA' => $data->suratSPTA,
                'tanggalDisetujui' => $tanggalFormatted,
            ];

            $pdf = Pdf::loadView($template, $pdfData);

            Storage::disk($disk)->put($relativePath, $pdf->output());

            $data->update([
                'dokumenPath' => "storage/$relativePath",
            ]);
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
