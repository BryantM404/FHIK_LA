<?php

namespace App\Http\Controllers;
use App\Models\Pengajuan;
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
}
