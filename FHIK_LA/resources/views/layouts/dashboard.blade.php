@extends('layouts.index')

@section('content')

<div class="content-wrapper">
    <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Selamat Datang, {{ Auth::user()->nama }}</h3>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
        @if(Auth::user()->role_id == 1)
            @php($mhs = 0)
            @php($mhs41 = 0)
            @php($mhs42 = 0)
            @php($mhs44 = 0)
            @php($mhs46 = 0)
            @php($mhs61 = 0)
            @php($mhs62 = 0)
            @php($mhs63 = 0)
            @php($mhs64 = 0)
            @php($mhs65 = 0)
            @php($mhs66 = 0)
            @foreach($mahasiswas as $mahasiswa)
                @if($mahasiswa->role_id == 4)
                    @if($mahasiswa->programStudi == '41 - Sastra Inggris')
                        @php($mhs41++)
                    @elseif($mahasiswa->programStudi == '42 - Sastra Jepang')
                        @php($mhs42++)
                    @elseif($mahasiswa->programStudi == '44 - Bahasa Mandarin')
                        @php($mhs44++)
                    @elseif($mahasiswa->programStudi == '46 - Sastra Cina')
                        @php($mhs46++)
                    @elseif($mahasiswa->programStudi == '61 - Program Diploma 3 Seni Rupa Dan Desain')
                        @php($mhs61++)
                    @elseif($mahasiswa->programStudi == '62 - Seni Rupa Murni')
                        @php($mhs62++)
                    @elseif($mahasiswa->programStudi == '63 - Desain Interior')
                        @php($mhs63++)
                    @elseif($mahasiswa->programStudi == '64 - Desain Komunikasi Visual')
                        @php($mhs64++)
                    @elseif($mahasiswa->programStudi == '65 - Arsitektur')
                        @php($mhs65++)
                    @elseif($mahasiswa->programStudi == '66 - Desain Mode')
                        @php($mhs66++)
                    @endif
                    @php($mhs++)
                @endif
            @endforeach
            @php($total = $mhs > 0 ? $mhs : 1)
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <p class="card-title">Jumlah Mahasiswa Aktif</p>
                    <div class="charts-data">
                        <div class="mt-3">
                            <p class="mb-0">41 - Sastra Inggris</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                        style="width: {{ ($mhs41 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs41 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs41 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">42 - Sastra Jepang</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-info" role="progressbar" 
                                        style="width: {{ ($mhs42 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs42 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs42 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">44 - Bahasa Mandarin</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-danger" role="progressbar" 
                                        style="width: {{ ($mhs44 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs44 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs44 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">46 - Sastra Cina</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-warning" role="progressbar" 
                                        style="width: {{ ($mhs46 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs46 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs46 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">61 - Program Diploma 3 Seni Rupa Dan Desain</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-success" role="progressbar" 
                                        style="width: {{ ($mhs61 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs61 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs61 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">62 - Seni Rupa Murni</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                        style="width: {{ ($mhs62 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs62 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs62 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">63 - Desain Interior</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-info" role="progressbar" 
                                        style="width: {{ ($mhs63 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs63 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs63 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">64 - Desain Komunikasi Visual</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-danger" role="progressbar" 
                                        style="width: {{ ($mhs64 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs64 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs64 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">65 - Arsitektur</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-warning" role="progressbar" 
                                        style="width: {{ ($mhs65 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs65 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs65 }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0">66 - Desain Mode</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-success" role="progressbar" 
                                        style="width: {{ ($mhs66 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $mhs66 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $mhs66 }}</p>
                            </div>
                        </div>
                    </div>  
                </div>
                </div>
            </div>
        @elseif(Auth::user()->role_id == 2)
            @php($pengajuanTotal = 0)
            @php($pengajuanJenis1 = 0)
            @php($pengajuanJenis2 = 0)
            @php($pengajuanJenis3 = 0)
            @php($pengajuanStatus1 = 0)
            @php($pengajuanStatus2 = 0)
            @php($pengajuanStatus3 = 0)
            @php($pengajuanStatus4 = 0)
            @foreach($pengajuans as $pengajuan)
                @if($pengajuan->jenisSurat_id == 1)
                    @php($pengajuanJenis1++)
                @elseif($pengajuan->jenisSurat_id == 2 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi)
                    @php($pengajuanJenis2++)
                @elseif($pengajuan->jenisSurat_id == 3 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi)
                    @php($pengajuanJenis3++)
                @endif

                @if($pengajuan->status_id == 1 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi)
                    @php($pengajuanStatus1++)
                @elseif($pengajuan->status_id == 2 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi)
                    @php($pengajuanStatus2++)
                @elseif($pengajuan->status_id == 3 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi)
                    @php($pengajuanStatus3++)
                @elseif($pengajuan->status_id == 4 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi)
                    @php($pengajuanStatus4++)
                @endif
                @php($pengajuanTotal++)
            @endforeach
            @php($total = $pengajuanTotal > 0 ? $pengajuanTotal : 1)
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <p class="card-title">Jumlah Pengajuan Surat Akademik</p>
                    <p style="font-size:15px; margin-top:-20px; font-weight:bold">berdasarkan jenis surat</p>
                    <div class="charts-data">
                        @if(Auth::user()->programStudi == NULL)
                            <div class="mt-3">
                                <p class="mb-0">Surat Keterangan Mahasiswa Aktif</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="progress progress-md flex-grow-1 mr-4">
                                        <div class="progress-bar bg-primary" role="progressbar" 
                                            style="width: {{ ($pengajuanJenis1 / $total) * 100 }}%" 
                                            aria-valuenow="{{ $pengajuanJenis1 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">{{ $pengajuanJenis1 }}</p>
                                </div>
                            </div>
                        @else
                            <div class="mt-3">
                                <p class="mb-0">Surat Survei Kerja Praktik</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="progress progress-md flex-grow-1 mr-4">
                                        <div class="progress-bar bg-primary" role="progressbar" 
                                            style="width: {{ ($pengajuanJenis2 / $total) * 100 }}%" 
                                            aria-valuenow="{{ $pengajuanJenis2 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">{{ $pengajuanJenis2 }}</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="mb-0">Surat Survei Penelitian Tugas Akhir</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="progress progress-md flex-grow-1 mr-4">
                                        <div class="progress-bar bg-primary" role="progressbar" 
                                            style="width: {{ ($pengajuanJenis3 / $total) * 100 }}%" 
                                            aria-valuenow="{{ $pengajuanJenis3 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">{{ $pengajuanJenis3 }}</p>
                                </div>
                            </div>
                        @endif
                    </div>  
                </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <p class="card-title">Jumlah Pengajuan Surat Akademik</p>
                    <p style="font-size:15px; margin-top:-20px; font-weight:bold">berdasarkan status surat</p>
                    <div class="charts-data">
                        <div class="mt-3">
                            <p class="mb-0">Diproses</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                        style="width: {{ ($pengajuanStatus1 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $pengajuanStatus1 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $pengajuanStatus1 }}</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0">Terverifikasi</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                        style="width: {{ ($pengajuanStatus2 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $pengajuanStatus2 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $pengajuanStatus2 }}</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0">Tervalidasi </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                        style="width: {{ ($pengajuanStatus3 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $pengajuanStatus3 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $pengajuanStatus3 }}</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0">Ditolak </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                        style="width: {{ ($pengajuanStatus4 / $total) * 100 }}%" 
                                        aria-valuenow="{{ $pengajuanStatus4 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{ $pengajuanStatus4 }}</p>
                            </div>
                        </div>
                    </div>  
                </div>
                </div>
            </div>
        @elseif(Auth::user()->role_id == 3)
            @php($pengajuanTotal = 0)
            @php($pengajuanJenis1 = 0)
            @php($pengajuanJenis2 = 0)
            @php($pengajuanJenis2koor = 0)
            @php($pengajuanJenis3 = 0)
            @php($pengajuanJenis3koor = 0)
            @foreach($pengajuans as $pengajuan)
                @if($pengajuan->jenisSurat_id == 1 && $pengajuan->status_id == 2)
                    @php($pengajuanJenis1++)
                @elseif($pengajuan->jenisSurat_id == 2 && $pengajuan->status_id == 2 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi && $pengajuan->koordinator_id != NULL)
                    @php($pengajuanJenis2++)
                @elseif($pengajuan->jenisSurat_id == 3 && $pengajuan->status_id == 2 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi && $pengajuan->koordinator_id != NULL)
                    @php($pengajuanJenis3++)
                @elseif($pengajuan->jenisSurat_id == 2 && $pengajuan->status_id == 2 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi && $pengajuan->koordinator_id == NULL)
                    @php($pengajuanJenis2koor++)
                @elseif($pengajuan->jenisSurat_id == 3 && $pengajuan->status_id == 2 && $pengajuan->pengguna->programStudi == Auth::user()->programStudi && $pengajuan->koordinator_id == NULL)
                    @php($pengajuanJenis3koor++)
                @endif
                @php($pengajuanTotal++)
            @endforeach
            @php($total = $pengajuanTotal > 0 ? $pengajuanTotal : 1)
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <p class="card-title">Surat yang Belum Disetujui</p>
                    <div class="charts-data">
                         @if(Auth::user()->pimpinanDetail->jabatan == "Dekan")
                            <div class="mt-3">
                                <p class="mb-0">Surat Keterangan Mahasiswa Aktif</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="progress progress-md flex-grow-1 mr-4">
                                        <div class="progress-bar bg-primary" role="progressbar" 
                                            style="width: {{ ($pengajuanJenis1 / $total) * 100 }}%" 
                                            aria-valuenow="{{ $pengajuanJenis1 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">{{ $pengajuanJenis1 }}</p>
                                </div>
                            </div>
                        @endif
                        @if(strpos(Auth::user()->pimpinanDetail->jabatan, 'Kaprodi') === 0)
                            <div class="mt-3">
                                <p class="mb-0">Surat Survei Kerja Praktik</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="progress progress-md flex-grow-1 mr-4">
                                        <div class="progress-bar bg-primary" role="progressbar" 
                                            style="width: {{ ($pengajuanJenis2 / $total) * 100 }}%" 
                                            aria-valuenow="{{ $pengajuanJenis2 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">{{ $pengajuanJenis2 }}</p>
                                </div>
                            </div>
                        @endif
                        @if(strpos(Auth::user()->pimpinanDetail->jabatan, 'Koordinator KP') === 0)
                            <div class="mt-3">
                                <p class="mb-0">Surat Survei Kerja Praktik</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="progress progress-md flex-grow-1 mr-4">
                                        <div class="progress-bar bg-primary" role="progressbar" 
                                            style="width: {{ ($pengajuanJenis2koor / $total) * 100 }}%" 
                                            aria-valuenow="{{ $pengajuanJenis2koor }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">{{ $pengajuanJenis2koor }}</p>
                                </div>
                            </div>
                        @endif
                        @if(strpos(Auth::user()->pimpinanDetail->jabatan, 'Kaprodi') === 0)
                            <div class="mt-3">
                                <p class="mb-0">Surat Survei Penelitian Tugas Akhir</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="progress progress-md flex-grow-1 mr-4">
                                        <div class="progress-bar bg-primary" role="progressbar" 
                                            style="width: {{ ($pengajuanJenis3 / $total) * 100 }}%" 
                                            aria-valuenow="{{ $pengajuanJenis3 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">{{ $pengajuanJenis3 }}</p>
                                </div>
                            </div>
                        @endif
                        @if(strpos(Auth::user()->pimpinanDetail->jabatan, 'Koordinator TA') === 0)
                            <div class="mt-3">
                                <p class="mb-0">Surat Survei Penelitian Tugas Akhir</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="progress progress-md flex-grow-1 mr-4">
                                        <div class="progress-bar bg-primary" role="progressbar" 
                                            style="width: {{ ($pengajuanJenis3koor / $total) * 100 }}%" 
                                            aria-valuenow="{{ $pengajuanJenis3koor }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0">{{ $pengajuanJenis3koor }}</p>
                                </div>
                            </div>
                        @endif
                    </div>  
                </div>
                </div>
            </div>
        @elseif(Auth::user()->role_id == 4)
            <div width="50px">
                <a class="btn btn-primary btn-icon-text" href="{{ route('mahasiswaPengajuan') }}" style="background-color: #f05a1f; color:white; padding:25px; font-size:20px">
                    Ajukan Surat
                    <i class="ti-angle-right btn-icon-prepend"></i>
                </a>
                <br>
                <br>
                <a class="btn btn-primary btn-icon-text" href="{{ route('mahasiswaHistori') }}" style="background-color: #f05a1f; color:white; padding:25px; font-size:20px">
                    Lihat Histori
                    <i class="ti-angle-right btn-icon-prepend"></i>
                </a>
            </div>
        @endif


    </div>
</div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection