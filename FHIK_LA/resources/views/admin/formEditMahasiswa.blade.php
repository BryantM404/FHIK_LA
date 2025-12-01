@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Data Mahasiswa</h4>

                    <form class="forms-sample" method="POST" action="{{ route('updateMahasiswa', $pengguna->id) }}">
                        @csrf

                        <p class="card-description">Data Mahasiswa</p>

                        <div class="form-group">
                            <label>NRP</label>
                            <input type="text" class="form-control" value="{{ $pengguna->id }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pengguna->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label>Program Studi</label>
                            <select class="form-control" name="programStudi" required>
                                <option value="63 - Desain Interior" {{ $pengguna->programStudi == '63 - Desain Interior' ? 'selected' : '' }}>63 - Desain Interior</option>
                                <option value="64 - Desain Komunikasi Visual" {{ $pengguna->programStudi == '64 - Desain Komunikasi Visual' ? 'selected' : '' }}>64 - Desain Komunikasi Visual</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tempat / Tanggal Lahir</label>
                            <input type="text" name="tempatTanggalLahir" class="form-control" value="{{ $detail->tempatTanggalLahir }}" required>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ $detail->alamat }}" required>
                        </div>

                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" name="kota" class="form-control" value="{{ $detail->kota }}" required>
                        </div>

                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" value="{{ $detail->provinsi }}" required>
                        </div>

                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" name="kodePos" class="form-control" value="{{ $detail->kodePos }}" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $detail->email }}" required>
                        </div>

                        <div class="form-group">
                            <label>No Handphone</label>
                            <input type="text" name="noHandphone" class="form-control" value="{{ $detail->noHandphone }}" required>
                        </div>

                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="{{ $detail->telepon }}" required>
                        </div>

                        <p class="card-description pt-3">Data Orang Tua / Wali</p>

                        <div class="form-group">
                            <label>Nama Wali</label>
                            <input type="text" name="namaWali" class="form-control" value="{{ $detail->namaWali }}" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Ibu Kandung</label>
                            <input type="text" name="namaIbuKandung" class="form-control" value="{{ $detail->namaIbuKandung }}" required>
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan Orang Tua</label>
                            <input type="text" name="pekerjaanOrangTua" class="form-control" value="{{ $detail->pekerjaanOrangTua }}" required>
                        </div>

                        <div class="form-group">
                            <label>Alamat Orang Tua</label>
                            <input type="text" name="alamatOrangTua" class="form-control" value="{{ $detail->alamatOrangTua }}" required>
                        </div>

                        <div class="form-group">
                            <label>Kota Orang Tua</label>
                            <input type="text" name="kotaOrangTua" class="form-control" value="{{ $detail->kotaOrangTua }}" required>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Update</button>
                        <a href="{{ route('viewMahasiswa') }}" class="btn btn-danger">Cancel</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
