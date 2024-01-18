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
                        class="fa-solid fa-comments-dollar"></i></i><span>SP2D
                    </span></a>
            </li>
            @if (auth()->user()->roles == 'ppk')
            @endif
            @if (auth()->user()->roles == 'bendahara')
            @endif
        </ul>
    </aside>
</div>
