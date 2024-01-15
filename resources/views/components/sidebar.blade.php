<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">APK 2024</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown  ">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Pengguna</span></a>
            </li>
            <li class="nav-item dropdown  ">
                <a href="{{ route('program.index') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Program</span></a>
            </li>
            <li class="nav-item dropdown  ">
                <a href="{{ route('kegiatan.index') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Kegiatan</span></a>
            </li>
    </aside>
</div>
