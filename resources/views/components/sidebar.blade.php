<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">APK 2024</a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->roles == 'admin')
                <li class="menu-header">Otentikasi</li>
                <li class="{{ str_contains(Route::currentRouteName(), 'user') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}"><i class="fa-solid fa-users"></i>
                        <span>Pengguna</span></a>
                </li>
            @endif
            @if (auth()->user()->roles == 'user')
                <li class="menu-header">Anggaran</li>
                <li class="{{ str_contains(Route::currentRouteName(), 'program') ? 'active' : '' }}">
                    <a href="{{ route('program.index') }}"><i
                            class="fa-regular fa-note-sticky"></i><span>Program</span></a>
                </li>
                <li class="{{ str_contains(Route::currentRouteName(), 'kegiatan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kegiatan.index') }}"><i
                            class="fa-solid fa-book"></i><span>Kegiatan</span></a>
                </li>
                <li class="{{ str_contains(Route::currentRouteName(), 'sub') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('sub.index') }}"><i class="fa-solid fa-file-pen"></i><span>Sub
                            Kegiatan</span></a>
                </li>
                <li class="{{ str_contains(Route::currentRouteName(), 'rekening') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rekening.index') }}"><i
                            class="fa-solid fa-database"></i><span>Kode
                            Rekening</span></a>
                </li>
                <li class="{{ str_contains(Route::currentRouteName(), 'anggaran') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('anggaran.index') }}"><i
                            class="fa-solid fa-money-check-dollar"></i><span>Anggaran
                        </span></a>
                </li>
            @endif
            <li class="menu-header">Perbendaharaan</li>
            <li class="{{ str_contains(Route::currentRouteName(), 'spd') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('spd.index') }}"><i
                        class="fa-solid fa-comments-dollar"></i><span>SP2D
                    </span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'kwitansi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kwitansi.index') }}"><i
                        class="fa-solid fa-cart-shopping"></i></i><span>Kwitansi
                    </span></a>
            </li>
            <li class="menu-header">Data Pajak</li>
            <li class="{{ str_contains(Route::currentRouteName(), 'pajakdaerah') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pajakdaerah.index') }}"><i
                        class="fa-solid fa-file-invoice-dollar"></i><span>Pajak Daerah
                    </span></a>
            </li>
            <li class="menu-header">Data Umum</li>
            <li class="{{ str_contains(Route::currentRouteName(), 'pptk') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pptk.index') }}"><i class="fa-solid fa-user-check"></i><span>PPTK
                    </span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'pengelola') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengelola.index') }}"><i
                        class="fa-solid fa-user-pen"></i></i><span>Pengelola
                    </span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'penerima') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('penerima.index') }}"><i
                        class="fa-solid fa-users-gear"></i><span>Rekanan
                    </span></a>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="{{ str_contains(Route::currentRouteName(), 'laporan.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('laporan.index') }}"><i
                        class="fa-regular fa-file-pdf"></i><span>Perbendaharaan
                    </span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'laporan.realisasi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('laporan.realisasi') }}"><i
                        class="fa-regular fa-file-pdf"></i><span>Renja
                    </span></a>
            </li>
            @if (auth()->user()->roles == 'ppk')
            @endif
            @if (auth()->user()->roles == 'bendahara')
            @endif
        </ul>
    </aside>
</div>
