@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Surat Ketrangan Mahasiswa Aktif</h4>
                    <form class="forms-sample" method="POST" action="{{ route('storeSKMA') }}">
                        @csrf
                        <p class="card-description">Data Mahasiswa</p>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{ Auth::user()->nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="id">NRP</label>
                            <input type="number" class="form-control" id="id" placeholder="NRP" name="id" value="{{ Auth::user()->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="programStudi">Program Studi</label>
                            <input type="text" class="form-control" id="programStudi" name="programStudi" value="{{ Auth::user()->programStudi }}" placeholder="{{ Auth::user()->programStudi }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="tempatTanggalLahir">Tempat / Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tempatTanggalLahir" name="tempatTanggalLahir" value="{{ Auth::user()->mahasiswaDetail->tempatTanggalLahir ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ Auth::user()->mahasiswaDetail->alamat ?? '' }}" required placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="tahunAkademik">Tahun Akademik</label>
                            <input type="text" class="form-control" id="tahunAkademik" name="tahunAkademik" placeholder="Tahun Akademik (Ganjil 2025/2026)" required>
                        </div>

                        <br>
                        <p class="card-description pt-3">Data Orang Tua / Wali</p>

                        <div class="form-group">
                            <label for="namaWali">Nama Orang Tua / Wali</label>
                            <input type="text" class="form-control" id="namaWali" name="namaWali" value="{{ Auth::user()->mahasiswaDetail->namaWali ?? '' }}" required placeholder="Nama Orang Tua / Wali">
                        </div>
                        <div class="form-group">
                            <label for="alamatOrangTua">Alamat Orang Tua</label>
                            <input type="text" class="form-control" id="alamatOrangTua" name="alamatOrangTua" value="{{ Auth::user()->mahasiswaDetail->alamatOrangTua ?? '' }}" required placeholder="Alamat Orang Tua">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaanOrangTua">Pekerjaan Orang Tua</label>
                            <input type="text" class="form-control" id="pekerjaanOrangTua" name="pekerjaanOrangTua" value="{{ Auth::user()->mahasiswaDetail->pekerjaanOrangTua ?? '' }}" required placeholder="Pekerjaan Orang Tua">
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi</label>
                            <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi">
                        </div>
                        <div class="form-group">
                            <label for="pangkatGolongan">Pangkat / Golongan</label>
                            <input type="text" class="form-control" id="pangkatGolongan" name="pangkatGolongan" placeholder="Pangkat / Golongan">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-primary mr-2">Reset</button>
                        <a class="btn btn-danger" href="{{ route('mahasiswaPengajuan') }}">Cancel</a>
                    </form>
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