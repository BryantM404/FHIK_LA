@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Insert Data Mahasiswa</h4>
                    <form class="forms-sample" method="POST" action="{{ route('storeMahasiswa') }}">
                        @csrf
                        <p class="card-description">Data Mahasiswa</p>
                        <div class="form-group">
                            <label for="id">NRP</label>
                            <input type="number" class="form-control" id="id" placeholder="NRP" name="id" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="programStudi">Program Studi</label>
                            <select class="form-control" name="programStudi" required>
                                <option value="41 - Sastra Inggris">41 - Sastra Inggris</option>
                                <option value="42 - Sastra Jepang">42 - Sastra Jepang</option>
                                <option value="44 - Bahasa Mandarin">44 - Bahasa Mandarin</option>
                                <option value="46 - Sastra Cina">46 - Sastra Cina</option>
                                <option value="61 - Program Diploma 3 Seni Rupa Dan Desain">61 - Program Diploma 3 Seni Rupa Dan Desain</option>
                                <option value="62 - Seni Rupa Murni">62 - Seni Rupa Murni</option>
                                <option value="63 - Desain Interior">63 - Desain Interior</option>
                                <option value="64 - Desain Komunikasi Visual">64 - Desain Komunikasi Visual</option>
                                <option value="65 - Arsitektur">65 - Arsitektur</option>
                                <option value="66 - Desain Mode">66 - Desain Mode</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="tempatTanggalLahir">Tempat / Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tempatTanggalLahir" placeholder="Tempat / Tanggal Lahir" name="tempatTanggalLahir" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input type="text" class="form-control" id="kota" placeholder="Kota" name="kota" required>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" placeholder="Provinsi" name="provinsi" required>
                        </div>
                        <div class="form-group">
                            <label for="kodePos">Kode Pos</label>
                            <input type="text" class="form-control" id="kodePos" placeholder="Kode Pos" name="kodePos" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="noHandphone">No Handphone</label>
                            <input type="text" class="form-control" id="noHandphone" placeholder="No Handphone" name="noHandphone" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" required>
                        </div>
                        
                        <p class="card-description pt-3">Data Orang Tua / Wali</p>

                        <div class="form-group">
                            <label for="namaWali">Nama Wali</label>
                            <input type="text" class="form-control" id="namaWali" placeholder="Nama Wali" name="namaWali" required>
                        </div>
                        <div class="form-group">
                            <label for="namaIbuKandung">Nama Ibu Kandung</label>
                            <input type="text" class="form-control" id="namaIbuKandung" placeholder="Nama Ibu Kandung" name="namaIbuKandung" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaanOrangTua">Pekerjaan Orang Tua</label>
                            <input type="text" class="form-control" id="pekerjaanOrangTua" placeholder="Pekerjaan Orang Tua" name="pekerjaanOrangTua" required>
                        </div>
                        <div class="form-group">
                            <label for="alamatOrangTua">Alamat Orang Tua</label>
                            <input type="text" class="form-control" id="alamatOrangTua" placeholder="Alamat Orang Tua" name="alamatOrangTua" required>
                        </div>
                        <div class="form-group">
                            <label for="kotaOrangTua">Kota Orang Tua</label>
                            <input type="text" class="form-control" id="kotaOrangTua" placeholder="Kota Orang Tua" name="kotaOrangTua" required>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-primary mr-2">Reset</button>
                        <a class="btn btn-danger" href="{{ route('dashboard') }}">Cancel</a>
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