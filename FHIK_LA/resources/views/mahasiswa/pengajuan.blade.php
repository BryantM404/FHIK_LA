@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="top">
        <h3>Silahkan pilih jenis surat yang ingin anda ajukan</h3> 
        <br>
        <h4>Catatan :</h4>
        <p>* Surat Keterangan Mahasiswa Aktif bisa diajukan oleh mahasiswa aktif semua Prodi</p> 
        <p>* Surat Kerja Praktik dan Surat Survey Penelitian TA hanya bisa diajukan oleh mahasiswa aktif Prodi Desain Interior dan DKV </p>      
    </div>
    <div class="h-50 d-flex align-items-center">
        <div class="row d-flex justify-content-evenly w-100">
        <div class="card my-4" style="width: 23rem; background-color:#f05a1f">
            <a href="{{ route('formSKMA') }}" style="text-decoration: none">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; color:white">Surat Keterangan Mahasiswa Aktif</h5>
                </div>
            </a>
        </div>
        <div class="card my-4" style="width: 23rem; background-color:#03cafc">
            <a href="{{ route('formSSKP') }}" style="text-decoration: none">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; color:white">Surat Survey Kerja Praktek</h5>
                </div>
            </a>
        </div>
        <div class="card my-4" style="width: 23rem; background-color:#73c206;">
            <a href="{{ route('formSSPTA') }}" style="text-decoration: none">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; color:white">Surat Survey Penelitian Tugas Akhir</h5>
                </div>
            </a>
        </div>
    </div>
    </div>
</div>
@endsection

@section('ExtraCSS')
    
@endsection

@section('ExtraJS')

@endsection