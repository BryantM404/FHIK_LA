@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah Password</h4>
                    <form class="forms-sample" method="POST" action="{{ route('ubahPassword') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" placeholder="Password (Min: 6 karakter)" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm" placeholder="Konfirmasi Password" name="confirm" required>
                        </div>
                        @error('confirm')
                            <span class="text-danger">{{ $message }}</span>
                            <br>
                            <br>
                        @enderror

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
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