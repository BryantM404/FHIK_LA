@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <p class="card-title">Arsip Surat</p>
                <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                    <table id="" class="display expandable-table" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Jenis Surat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @php($ada = false)
                            @foreach($pengajuans as $pengajuan)
                                @if($pengajuan->pengguna->programStudi == Auth::user()->programStudi && $pengajuan->status_id == 3)
                                    @php($ada = true)
                                    <tr>
                                        <td>
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            {{ $pengajuan->pengguna->id }}
                                        </td>
                                        <td>
                                            {{ $pengajuan->pengguna->nama }}
                                        </td>
                                        <td>
                                            {{ $pengajuan->jenisSurat->nama }}
                                        </td>
                                        <td>
                                            <!-- Button Surat -->
                                                <a class="btn btn-success btn-icon-text" data-bs-toggle="modal" data-bs-target="#surat{{ $pengajuan->id }}">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Lihat Surat
                                                </a>
                                                <!-- Modal Surat -->
                                                <div class="modal fade" id="surat{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Surat</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin memverifikasi surat ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            @if($ada == false)
                                <tr>
                                    <td>Tidak ada data yang ditampilkan</td>
                                </tr>
                            @endif
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