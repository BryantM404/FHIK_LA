@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Surat Survey Kerja Praktik</h4>
                    <form class="forms-sample" method="POST" action="{{ route('storeSSKP') }}">
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
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->mahasiswaDetail->email ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tempatPenelitian">Tempat Penelitian</label>
                            <input type="text" class="form-control" id="tempatPenelitian" name="tempatPenelitian" required>
                        </div>
                        <div class="form-group">
                            <label for="alamatPenelitian">Alamat Penelitian</label>
                            <input type="text" class="form-control" id="alamatPenelitian" name="alamatPenelitian" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-primary mr-2">Reset</button>
                        <button class="btn btn-light">Cancel</button>
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