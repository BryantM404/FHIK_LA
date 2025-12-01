@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="card-title mb-0">Data Mahasiswa</p>
                    <a class="btn btn-primary btn-icon-text" href="{{ route('formMahasiswa') }}" style="background-color: #f05a1f; color:white">
                        <i class="ti-file btn-icon-prepend"></i>
                        Tambah
                    </a>
                </div>
                <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                    <table id="" class="display expandable-table" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @php($ada = false)
                            @foreach($mahasiswas as $mahasiswa)
                                @if($mahasiswa->role_id == 4 && $mahasiswa->programStudi == '64 - Desain Komunikasi Visual')
                                    @php($ada = true)
                                    <tr>
                                        <td>
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            {{ $mahasiswa->id }}
                                        </td>
                                        <td>
                                            {{ $mahasiswa->nama }}
                                        </td>
                                        <td>
                                            {{ $mahasiswa->programStudi }}
                                        </td>
                                        <td>
                                            <!-- Button Detail -->
                                            <a class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#detail{{ $mahasiswa->id }}">
                                                <i class="ti-file btn-icon-prepend"></i>
                                                Detail
                                            </a>
                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="detail{{ $mahasiswa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Mahasiswa</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Nama: {{ $mahasiswa->nama ?: '-' }}</p>
                                                    <p>NRP: {{ $mahasiswa->id ?: '-' }}</p>
                                                    <p>Program Studi: {{$mahasiswa->programStudi }}</p>
                                                    <p>Tempat / Tanggal Lahir: {{$mahasiswa->mahasiswaDetail->tempatTanggalLahir ?: '-' }}</p>
                                                    <p>Alamat: {{$mahasiswa->mahasiswaDetail->alamat ?: '-' }}</p>
                                                    <p>Kota: {{$mahasiswa->mahasiswaDetail->kota ?: '-' }}</p>
                                                    <p>Provinsi: {{$mahasiswa->mahasiswaDetail->provinsi ?: '-' }}</p>
                                                    <p>Kode Pos: {{$mahasiswa->mahasiswaDetail->kodePos ?: '-' }}</p>
                                                    <p>Email: {{$mahasiswa->mahasiswaDetail->email ?: '-' }}</p>
                                                    <p>No Handphone: {{$mahasiswa->mahasiswaDetail->noHandphone ?: '-' }}</p>
                                                    <p>Telepon: {{$mahasiswa->mahasiswaDetail->telepon ?: '-' }}</p>
                                                    <p>Nama Wali: {{$mahasiswa->mahasiswaDetail->namaWali ?: '-' }}</p>
                                                    <p>Nama Ibu Kandung: {{$mahasiswa->mahasiswaDetail->namaIbuKandung ?: '-' }}</p>
                                                    <p>Pekerjaan Orang Tua: {{$mahasiswa->mahasiswaDetail->pekerjaanOrangTua ?: '-' }}</p>
                                                    <p>Alamat Orang Tua: {{$mahasiswa->mahasiswaDetail->alamatOrangTua ?: '-' }}</p>
                                                    <p>Kota Orang Tua: {{$mahasiswa->mahasiswaDetail->kotaOrangTua ?: '-' }}</p>
                                                    <p>Status: {{$mahasiswa->mahasiswaDetail->status ?: '-' }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            {{-- Button Edit --}}
                                            <a class="btn btn-warning btn-icon-text" href="{{ route('editMahasiswa', [$mahasiswa->id]) }}">
                                                <i class="ti-pencil btn-icon-prepend"></i>
                                                Edit
                                            </a>
                                            <!-- Button Delete -->
                                            <a class="btn btn-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#delete{{ $mahasiswa->id }}">
                                                <i class="ti-trash btn-icon-prepend"></i>
                                                Hapus
                                            </a>
                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="delete{{ $mahasiswa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Mahasiswa</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus mahasiswa ini?
                                                    <form method="POST" action="{{ route('deleteMahasiswa', $mahasiswa->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Yakin</button>
                                                    
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