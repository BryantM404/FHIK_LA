@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <p class="card-title">Surat Survei Penelitian Tugas Akhir</p>
                <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                    <table id="" class="display expandable-table" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Status Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @php($ada = false)
                            @foreach($pengajuans as $pengajuan)
                                @if($pengajuan->pengguna->programStudi == Auth::user()->programStudi && $pengajuan->jenisSurat_id == 3 && $pengajuan->status_id == 2 && $pengajuan->koordinator_id)
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
                                            {{ $pengajuan->status->nama }}
                                        </td>
                                        <td>
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
                                                        @else
                                                        <p class="text-muted fst-italic">Tidak ada dokumen yang ditampilkan.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                            <!-- Button Validasi -->
                                            <a class="btn btn-success btn-icon-text" data-bs-toggle="modal" data-bs-target="#validasi{{ $pengajuan->id }}">
                                                <i class="ti-check btn-icon-prepend"></i>
                                                Validasi
                                            </a>
                                            <!-- Modal Validasi -->
                                            <div class="modal fade" id="validasi{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Validasi Surat</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin memvalidasi surat ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                                    <a class="btn btn-success" href="{{ route('validasiSurat', ['pengajuan' => $pengajuan->id]) }}">Yakin</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                            <!-- Button Tolak -->
                                            <a class="btn btn-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#tolak{{ $pengajuan->id }}">
                                                <i class="ti-trash btn-icon-prepend"></i>
                                                Tolak
                                            </a>
                                            <!-- Modal Tolak -->
                                            <div class="modal fade" id="tolak{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak Surat</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menolak surat ini?
                                                    <form method="GET" action="{{ route('tolakSuratPimpinan', ['pengajuan' => $pengajuan->id]) }}">
                                                        @csrf
                                                        <textarea name="alasanPenolakan" id="alasanPenolakan" cols="47" rows="8" style="border: 1px solid grey;" placeholder="Kesalahan input data" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Yakin</button>
                                                    </form>
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