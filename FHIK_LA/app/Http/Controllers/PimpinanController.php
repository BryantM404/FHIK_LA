<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;


class PimpinanController extends Controller
{
    public function validasiSKMA()
    {
        return(view('pimpinan.validasiSKMA'))
            ->with('pengajuans', Pengajuan::all());
    }

    public function validasiSSKP()
    {
        return(view('pimpinan.validasiSSKP'))
            ->with('pengajuans', Pengajuan::all());
    }
    
    public function validasiSSPTA()
    {
        return(view('pimpinan.validasiSSPTA'))
            ->with('pengajuans', Pengajuan::all());
    }
}
