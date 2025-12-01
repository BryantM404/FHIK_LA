<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div style="padding-top:20px; padding-left:20px">
        <p style="color: black; font-weight: 500; font-size: 18px; margin: 0;">
            {{ Auth::user()->id }} / {{ Auth::user()->nama }} 
        </p>
        <p style="padding-top:5px; color: black; font-size: 16px;">{{ Auth::user()->role->nama }}</p>
    </div>

    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>

        
        {{-- Sidebar Admin --}}
        @if(Auth::user()->role_id == 1)
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Data Mahasiswa</span>
                    <i class="menu-arrow"></i>
                </a>

                <div class="collapse" id="ui-basic" style="overflow: visible;">
                    <ul class="nav flex-column sub-menu" style="padding-left: 10px;">
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa41') }}">Sastra Inggris</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa42') }}">Sastra Jepang</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa44') }}">Bahasa Mandarin</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa46') }}">Sastra Cina</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa61') }}">D3 Seni Rupa Dan Desain</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa62') }}">Seni Rupa Murni</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa63') }}">Desain Interior</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa64') }}">Desain Komunikasi Visual</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa65') }}">Arsitektur</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('viewMahasiswa66') }}">Desain Mode</a></li>
                    </ul>
                </div>
            </li>
        

        {{-- Sidebar Operator --}}
        @elseif(Auth::user()->role_id == 2)
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Verifikasi Surat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    @if(Auth::user()->programStudi == NULL)
                        <li class="nav-item"> <a class="nav-link" href="{{ route('verifikasiSKMA') }}">SKMA</a></li>
                    @else
                        <li class="nav-item"> <a class="nav-link" href="{{ route('verifikasiSSKP') }}">SSKP</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('verifikasiSSPTA') }}">SSPTA</a></li>
                    @endif
                </ul>
            </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('arsip') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Arsip</span>
            </a>
            </li>
        

        {{-- Sidebar Pimpinan --}}
        @elseif(Auth::user()->role_id == 3)
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Validasi Surat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    {{-- Dekan --}}
                    @if(Auth::user()->pimpinanDetail->jabatan == "Dekan")
                        <li class="nav-item"> <a class="nav-link" href="{{ route('validasiSKMA') }}">SKMA</a></li>
                    @endif
                    {{-- Kaprodi & Koordinator KP --}}
                    @if(strpos(Auth::user()->pimpinanDetail->jabatan, 'Kaprodi') === 0)
                        <li class="nav-item"> <a class="nav-link" href="{{ route('validasiSSKPKaprodi') }}">SSKP</a></li>
                    @elseif(strpos(Auth::user()->pimpinanDetail->jabatan, 'Koordinator KP') === 0)
                        <li class="nav-item"> <a class="nav-link" href="{{ route('validasiSSKPKoor') }}">SSKP</a></li>
                    @endif
                    {{-- Kaprodi & Koordinator TA --}}
                    @if(strpos(Auth::user()->pimpinanDetail->jabatan, 'Kaprodi') === 0)
                        <li class="nav-item"> <a class="nav-link" href="{{ route('validasiSSPTAKaprodi') }}">SSPTA</a></li>
                    @elseif(strpos(Auth::user()->pimpinanDetail->jabatan, 'Koordinator TA') === 0)
                        <li class="nav-item"> <a class="nav-link" href="{{ route('validasiSSPTAKoor') }}">SSPTA</a></li>
                    @endif
                </ul>
            </div>
            </li>
        

        {{-- Sidebar Mahasiswa --}}
        @elseif(Auth::user()->role_id == 4)
            <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswaPengajuan') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Pengajuan Surat</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswaHistori') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Histori Pengajuan</span>
            </a>
            </li>
        @endif

{{-- 
        
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Form elements</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">Charts</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">Tables</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Icons</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
            <i class="icon-ban menu-icon"></i>
            <span class="menu-title">Error pages</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
            </ul>
        </div>
        </li> --}}

    </ul>
</nav>