<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Vote 2024</a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->roles == 'admin')
                <li class="menu-header">Otentikasi</li>
                <li class="{{ str_contains(Route::currentRouteName(), 'user') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}"><i class="fa-solid fa-users"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="menu-header">Master Data</li>
                <li class="{{ str_contains(Route::currentRouteName(), 'desa') ? 'active' : '' }}">
                    <a href="{{ route('desa.index') }}"><i class="fa-solid fa-house"></i>
                        <span>Desa/Kelurahan</span>
                    </a>
                </li>
                <li class="{{ str_contains(Route::currentRouteName(), 'dpt') ? 'active' : '' }}">
                    <a href="{{ route('dpt.index') }}"><i class="fa-solid fa-database"></i>
                        <span>DPT</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->roles == 'kpps')
                <li class="menu-header">Master Data</li>
                <li class="{{ str_contains(Route::currentRouteName(), 'dpttps') ? 'active' : '' }}">
                    <a href="{{ route('dpttps.index') }}"><i class="fa-solid fa-database"></i>
                        <span>DPT</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>
