@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Surat Survey Penelitian Tugas Akhir</h4>
                    <form class="forms-sample" method="POST" action="{{ route('storeSSPTA') }}">
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
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->mahasiswaDetail->email ?? '' }}" required placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="judulTugas">Judul Tugas Akhir</label>
                            <input type="text" class="form-control" id="judulTugas" name="judulTugas" required placeholder="Judul Tugas Akhir">
                        </div>
                        <div class="form-group">
                            <label for="tempatPenelitian">Tempat Penelitian</label>
                            <input type="text" class="form-control" id="tempatPenelitian" name="tempatPenelitian" required placeholder="Tempat Penelitian">
                        </div>
                        <div class="form-group">
                            <label for="alamatPenelitian">Alamat Penelitian</label>
                            <input type="text" class="form-control" id="alamatPenelitian" name="alamatPenelitian" required placeholder="Alamat Penelitian">
                        </div>
                        <div class="form-group">
                            <label for="mataKuliah">Mata Kuliah</label>
                            <input type="text" class="form-control" id="mataKuliah" name="mataKuliah" required placeholder="Mata Kuliah">
                        </div>
                        <div class="form-group">
                            <label for="dosenMataKuliah">Dosen Mata Kuliah</label>
                            <input type="text" class="form-control" id="dosenMataKuliah" name="dosenMataKuliah" required placeholder="Dosen Mata Kuliah">
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