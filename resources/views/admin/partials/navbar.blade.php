<div class="main-header">
    <div class="logo-header">
        <a href="{{ route('dashboard.index') }}" class="logo">
            <span style="font-size: 22px; margin-right: 6px;">🍩</span>
            <span>DoughHeaven</span>
            <span class="brand-badge">Admin</span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" aria-label="Toggle navigation">
            <i class="bi bi-list" style="font-size: 24px; color: #475569;"></i>
        </button>
        <button class="topbar-toggler more d-lg-none" type="button" aria-label="Toggle user menu">
            <i class="bi bi-three-dots-vertical" style="font-size: 20px; color: #475569;"></i>
        </button>
    </div>

    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between p-0">
            <!-- Search Bar -->
            <div class="d-none d-md-block">
                <div class="admin-search-wrapper">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" placeholder="Cari data, produk, kategori..." class="form-control">
                </div>
            </div>

            <!-- Right Actions & User Menu -->
            <div class="d-flex align-items-center ml-auto">
                <!-- Tombol Lihat Toko / Storefront -->
                <a href="{{ route('home') }}" target="_blank" class="btn-storefront mr-3" title="Buka website DoughHeaven di tab baru">
                    <i class="bi bi-shop"></i>
                    <span class="d-none d-sm-inline">Lihat Website</span>
                </a>

                <!-- User Profile Dropdown -->
                <div class="dropdown admin-user-nav">
                    <a class="dropdown-toggle" href="#" id="adminUserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="admin-user-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="d-none d-md-block text-left" style="line-height: 1.2;">
                            <div style="font-size: 13.5px; font-weight: 700; color: #1e293b;">
                                {{ Auth::user()->name ?? 'Admin DoughHeaven' }}
                            </div>
                            <div style="font-size: 11.5px; color: {{ Auth::user()->isSuperAdmin() ? '#be185d' : '#e75b7a' }}; font-weight: 700;">
                                {{ Auth::user()->isSuperAdmin() ? 'Super Administrator' : 'Staff Admin Toko' }}
                            </div>
                        </div>
                        <i class="bi bi-chevron-down ml-1" style="font-size: 12px; color: #94a3b8;"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-admin" aria-labelledby="adminUserDropdown">
                        <div class="px-3 py-2 border-bottom mb-1">
                            <p class="mb-0 font-weight-bold text-dark" style="font-size: 13px;">{{ Auth::user()->name }}</p>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                            <div class="mt-1">
                                @if (Auth::user()->isSuperAdmin())
                                    <span class="badge-pill-custom" style="background: #fdf2f8; color: #be185d; font-size: 10.5px; padding: 2px 8px;">
                                        Super Admin
                                    </span>
                                @else
                                    <span class="badge-pill-custom badge-info-soft" style="font-size: 10.5px; padding: 2px 8px;">
                                        Staff Admin
                                    </span>
                                @endif
                            </div>
                        </div>

                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person text-primary"></i>
                            <span>Pengaturan Profil</span>
                        </a>

                        @if (Auth::user()->isSuperAdmin())
                            <a class="dropdown-item" href="{{ route('users.index') }}">
                                <i class="bi bi-people-fill" style="color: #be185d;"></i>
                                <span>Kelola Pengguna</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('subscribers.index') }}">
                                <i class="bi bi-envelope-heart-fill" style="color: #be185d;"></i>
                                <span>Kelola Pelanggan</span>
                            </a>
                        @endif

                        <a class="dropdown-item" href="{{ route('home') }}" target="_blank">
                            <i class="bi bi-box-arrow-up-right text-info"></i>
                            <span>Halaman Pengunjung</span>
                        </a>

                        <div class="dropdown-divider my-1"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger border-0 bg-transparent w-100 text-left">
                                <i class="bi bi-box-arrow-right text-danger"></i>
                                <span>Keluar (Logout)</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
