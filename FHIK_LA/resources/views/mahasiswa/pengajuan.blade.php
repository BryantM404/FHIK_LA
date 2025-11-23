@extends('layouts.index')

@section('content')

<div class="content-wrapper h-100 d-flex align-items-center">
    <div class="row d-flex justify-content-evenly w-100">
        <div class="card my-4" style="width: 23rem;">
            <a href="{{ route('formSKMA') }}" style="text-decoration: none">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">Surat Keterangan Mahasiswa Aktif</h5>
                </div>
            </a>
        </div>
        <div class="card my-4" style="width: 23rem;">
            <a href="{{ route('formSSKP') }}" style="text-decoration: none">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">Surat Survey Kerja Praktek</h5>
                </div>
            </a>
        </div>
        <div class="card my-4" style="width: 23rem;">
            <a href="{{ route('formSSPTA') }}" style="text-decoration: none">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">Surat Survey Penelitian Tugas Akhir</h5>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection