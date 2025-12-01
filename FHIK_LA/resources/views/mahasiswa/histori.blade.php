@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <p class="card-title">Histori Pengajuan Surat</p>
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
                            @php($ada = false)
                            @foreach($pengajuans as $pengajuan)
                                @if($pengajuan->pengguna->id == Auth::user()->id)
                                    @php($ada = true)
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
                                                <!-- Button Lihat -->
                                                <a class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#lihat{{ $pengajuan->id }}">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Lihat Data
                                                </a>
                                                <!-- Modal Lihat -->
                                                <div class="modal fade" id="lihat{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Surat</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nama: {{ $pengajuan->pengguna->nama }}</p>
                                                        <p>NRP: {{ $pengajuan->pengguna->id }}</p>
                                                        @if($pengajuan->jenisSurat_id == 1)
                                                            <p>Tempat / Tanggal Lahir: {{$pengajuan->pengguna->mahasiswaDetail->tempatTanggalLahir }}</p>
                                                            <p>Alamat: {{$pengajuan->pengguna->mahasiswaDetail->alamat }}</p>
                                                            <p>Program Studi: {{$pengajuan->pengguna->programStudi }}</p>
                                                            <p>Tahun Akademik: {{ $pengajuan->suratKMA->tahunAkademik }}</p>
                                                            <p>Nama Orang Tua / Wali: {{$pengajuan->pengguna->mahasiswaDetail->namaWali }}</p>
                                                            <p>Alamat Orang Tua: {{$pengajuan->pengguna->mahasiswaDetail->alamatOrangTua }}</p>
                                                            <p>Pekerjaan Orang Tua: {{$pengajuan->pengguna->mahasiswaDetail->pekerjaanOrangTua }}</p>
                                                            <p>Instansi: {{ $pengajuan->suratKMA->instansi ?: '-'}}</p>
                                                            <p>Pangkat / Golongan: {{ $pengajuan->suratKMA->pangkatGolongan ?: '- / -' }}</p>
                                                            <p>Jabatan: {{ $pengajuan->suratKMA->jabatan ?: '-' }}</p>
                                                        @elseif($pengajuan->jenisSurat_id == 2)
                                                            <p>Email: {{$pengajuan->pengguna->mahasiswaDetail->email }}</p>
                                                            <p>Tempat Kerja Praktik: {{ $pengajuan->suratSKP->tempatKP }}</p>
                                                            <p>Alamat Kerja Praktik: {{ $pengajuan->suratSKP->alamatKP }}</p>
                                                        @elseif($pengajuan->jenisSurat_id == 3)
                                                            <p>Email: {{$pengajuan->pengguna->mahasiswaDetail->email }}</p>
                                                            <p>Judul Tugas Akhir: {{ $pengajuan->suratSPTA->judulTugas }}</p>
                                                            <p>Tempat Penelitian: {{ $pengajuan->suratSPTA->tempatPenelitian }}</p>
                                                            <p>Alamat Penelitian: {{ $pengajuan->suratSPTA->alamatPenelitian }}</p>
                                                            <p>Mata Kuliah: {{ $pengajuan->suratSPTA->mataKuliah }}</p>
                                                            <p>Dosen Mata Kuliah: {{ $pengajuan->suratSPTA->dosenMataKuliah }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            @elseif($pengajuan->status_id == 2)
                                                Tidak ada aksi yang bisa dilakukan
                                            @elseif($pengajuan->status_id == 3)
                                                <!-- Button Surat -->
                                                <a class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#surat{{ $pengajuan->id }}">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Lihat Surat
                                                </a>
                                                <!-- Modal Surat -->
                                                <div class="modal fade" id="surat{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl w-100">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Surat</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <h5 class="fw-semibold mb-3">File Dokumen: </h5>
                                                            @if ($pengajuan->dokumenPath)
                                                                <div class="mb-3">
                                                                    <embed src="{{ asset($pengajuan->dokumenPath) }}" type="application/pdf" width="100%" height="450px"/>
                                                                </div>
                                                                <div class="mb-3 text-center">
                                                                    <a href="{{ asset($pengajuan->dokumenPath) }}" class="btn btn-outline-primary" download>
                                                                        <i class="bi bi-download"></i> Download Dokumen
                                                                    </a>
                                                                </div>
                                                            @else
                                                            <p class="text-muted fst-italic">Tidak ada dokumen yang dilampirkan.</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            @elseif($pengajuan->status_id == 4)
                                                <!-- Button Alasan -->
                                                <a class="btn btn-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#alasan{{ $pengajuan->id }}">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Alasan Penolakan
                                                </a>
                                                <!-- Modal Alasan -->
                                                <div class="modal fade" id="alasan{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Alasan Penolakan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $pengajuan->alasanPenolakan }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            @endif
                                        </td>
                                    
                                    </tr>
                                @endif
                            @endforeach
                            @if($ada == false)
                                <tr>
                                    <td colspan="4" class="text-center"><b>Tidak ada data yang ditampilkan</b></td>
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
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection