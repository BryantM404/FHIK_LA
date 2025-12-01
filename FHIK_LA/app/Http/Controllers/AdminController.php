<?php

namespace App\Http\Controllers;

use App\Models\LogPengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\MahasiswaDetail;
use App\Models\Pengguna;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function mahasiswa41()
    {
        return(view('admin.mahasiswa-41'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa42()
    {
        return(view('admin.mahasiswa-42'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa44()
    {
        return(view('admin.mahasiswa-44'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa46()
    {
        return(view('admin.mahasiswa-46'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa61()
    {
        return(view('admin.mahasiswa-61'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa62()
    {
        return(view('admin.mahasiswa-62'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa63()
    {
        return(view('admin.mahasiswa-63'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa64()
    {
        return(view('admin.mahasiswa-64'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa65()
    {
        return(view('admin.mahasiswa-65'))
            ->with('mahasiswas', Pengguna::all());
    }
    public function mahasiswa66()
    {
        return(view('admin.mahasiswa-66'))
            ->with('mahasiswas', Pengguna::all());
    }
    
    public function formMahasiswa()
    {
        return(view('admin.formMahasiswa'));
    }

    public function storeMahasiswa(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|unique:pengguna,id',
            'nama' => 'required|string|max:100',
            'programStudi' => 'required|string|max:40',
            'tempatTanggalLahir' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'kota' => 'required|string|max:50',
            'provinsi' => 'required|string|max:50',
            'kodePos' => 'required|string|max:5',
            'email' => 'required|string|max:150|unique:mahasiswa_detail,email',
            'noHandphone' => 'required|string|max:20',
            'telepon' => 'required|string|max:20',
            'namaWali' => 'required|string|max:60',
            'namaIbuKandung' => 'required|string|max:60',
            'pekerjaanOrangTua' => 'required|string|max:45',
            'alamatOrangTua' => 'required|string|max:100',
            'kotaOrangTua' => 'required|string|max:50',
        ]);

        DB::transaction(function () use ($validated) {

            $userId = Auth::id();

            Pengguna::create([
                'id' => $validated['id'],
                'nama' => $validated['nama'],
                'password' => Hash::make($validated['id']),
                'programStudi' => $validated['programStudi'],
                'role_id' => 4,
            ]);

            MahasiswaDetail::create([
                    'tempatTanggalLahir' => $validated['tempatTanggalLahir'],
                    'alamat' => $validated['alamat'],
                    'kota' => $validated['kota'],
                    'provinsi' => $validated['provinsi'],
                    'kodePos' => $validated['kodePos'],
                    'email' => $validated['email'],
                    'noHandphone' => $validated['noHandphone'],
                    'telepon' => $validated['telepon'],
                    'namaWali' => $validated['namaWali'],
                    'namaIbuKandung' => $validated['namaIbuKandung'],
                    'pekerjaanOrangTua' => $validated['pekerjaanOrangTua'],
                    'alamatOrangTua' => $validated['alamatOrangTua'],
                    'kotaOrangTua' => $validated['kotaOrangTua'],
                    'status' => 'A',
                    'pengguna_id' => $validated['id']
                ]
            ); 
            
            LogPengguna::create([
                'aktivitas' => 'Memasukkan Data Mahasiswa Baru',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'pengguna_id' => $userId,
            ]);
        });

        return redirect()->route('dashboard');
    }

    public function editMahasiswa($id)
    {
        return view('admin.formEditMahasiswa')
            ->with('pengguna', Pengguna::findOrFail($id))
            ->with('detail', MahasiswaDetail::where('pengguna_id', $id)->firstOrFail());
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'programStudi' => 'required|string|max:40',
            'tempatTanggalLahir' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'kota' => 'required|string|max:50',
            'provinsi' => 'required|string|max:50',
            'kodePos' => 'required|string|max:5',
            'email' => 'required|string|max:150',
            'noHandphone' => 'required|string|max:20',
            'telepon' => 'required|string|max:20',
            'namaWali' => 'required|string|max:60',
            'namaIbuKandung' => 'required|string|max:60',
            'pekerjaanOrangTua' => 'required|string|max:45',
            'alamatOrangTua' => 'required|string|max:100',
            'kotaOrangTua' => 'required|string|max:50',
        ]);

        DB::transaction(function () use ($validated, $id) {

            Pengguna::where('id', $id)->update([
                'nama' => $validated['nama'],
                'programStudi' => $validated['programStudi'],
            ]);

            MahasiswaDetail::where('pengguna_id', $id)->update([
                'tempatTanggalLahir' => $validated['tempatTanggalLahir'],
                'alamat' => $validated['alamat'],
                'kota' => $validated['kota'],
                'provinsi' => $validated['provinsi'],
                'kodePos' => $validated['kodePos'],
                'email' => $validated['email'],
                'noHandphone' => $validated['noHandphone'],
                'telepon' => $validated['telepon'],  // FIX UTAMA
                'namaWali' => $validated['namaWali'],
                'namaIbuKandung' => $validated['namaIbuKandung'],
                'pekerjaanOrangTua' => $validated['pekerjaanOrangTua'],
                'alamatOrangTua' => $validated['alamatOrangTua'],
                'kotaOrangTua' => $validated['kotaOrangTua'],
            ]);

            LogPengguna::create([
                'aktivitas' => 'Mengubah Data Mahasiswa',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'pengguna_id' => Auth::id(),
            ]);
        });

        return redirect()->route('viewMahasiswa');
    }

    public function deleteMahasiswa($id)
    {
        DB::transaction(function () use ($id) {

            $mahasiswa = Pengguna::findOrFail($id);

            if ($mahasiswa->mahasiswaDetail) {
                $mahasiswa->mahasiswaDetail->delete();
            }

            $mahasiswa->delete();
        });

        return redirect()->back();
    }



}

