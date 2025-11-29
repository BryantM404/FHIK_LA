<nav class="sidebar sidebar-offcanvas" id="sidebar">
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
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Data Mahasiswa</span>
            </a>
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
                <li class="nav-item"> <a class="nav-link" href="{{ route('verifikasiSKMA') }}">SKMA</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('verifikasiSSKP') }}">SSKP</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('verifikasiSSPTA') }}">SSPTA</a></li>
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
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">SKMA</a></li>
                    @endif
                    {{-- Kaprodi & Koordinator KP --}}
                    @if(Auth::user()->pimpinanDetail->jabatan == "Kaprodi" || Auth::user()->pimpinanDetail->jabatan == "Koordinator KP")
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">SSKP</a></li>
                    @endif
                    {{-- Kaprodi & Koordinator TA --}}
                    @if(Auth::user()->pimpinanDetail->jabatan == "Kaprodi" || Auth::user()->pimpinanDetail->jabatan == "Koordinator TA")
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">SSPTA</a></li>
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