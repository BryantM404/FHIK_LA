<?php

namespace App\Http\Controllers;


use App\Models\LogPengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function formUbahPassword()
    {
        return(view('ubahPassword'));
    }
    
    public function ubahPassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|string|min:6|max:100',
            'confirm' => 'required|string|min:6|max:100',
        ]);

        if ($validated['password'] !== $validated['confirm']) {
            return back()->withErrors([
                'confirm' => 'Password dan konfirmasi tidak cocok.'
            ]);
        }

        DB::transaction(function () use ($validated) {
            $userId = Auth::id();

            Pengguna::where('id', $userId)->update([
                'password' => Hash::make($validated['password']),
            ]);

            LogPengguna::create([
                'aktivitas' => 'Mengubah Password Akun',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'pengguna_id' => $userId,
            ]);
        });
        notify()->success('Password berhasil diubah!','Sukses!');

        return redirect()->route('dashboard');
    }
}
