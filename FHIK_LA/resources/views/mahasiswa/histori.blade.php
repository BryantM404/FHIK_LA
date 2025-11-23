@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <p class="card-title">Advanced Table</p>
                <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                    <table id="" class="display expandable-table" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Jenis Surat</th>
                            <th>Status Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @foreach($pengajuans as $pengajuan)
                                @if($pengajuan->pengguna->id == Auth::user()->id)
                                    <tr>
                                        <td>
                                            {{ $no++ }}
                                        </td>
                                        
                                        <td>
                                            {{ $pengajuan->jenisSurat->nama }}
                                        </td>
                                        <td>
                                            {{ $pengajuan->status->nama }}
                                        </td>
                                        <td>
                                            @if($pengajuan->status_id == 1)
                                                <a class="btn btn-primary btn-icon-text" href="{{ route('dashboard') }}">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Lihat Data
                                                </a>
                                            @elseif($pengajuan->status_id == 2)
                                                Tidak ada aksi yang bisa dilakukan
                                            @elseif($pengajuan->status_id == 3)
                                                <a class="btn btn-success btn-icon-text" href="{{ route('dashboard') }}">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Lihat Surat
                                                </a>
                                            @elseif($pengajuan->status_id == 4)
                                                <a class="btn btn-danger btn-icon-text" href="{{ route('dashboard') }}">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Lihat Alasan Penolakan
                                                </a>
                                            @endif
                                        </td>
                                    
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                </div>
            </div>

            
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection