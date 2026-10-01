<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <!-- Sidebar User Profile Pill -->
        <div class="sidebar-user-card">
            <div class="avatar">
                🍩
            </div>
            <div class="info">
                <div class="name" title="{{ Auth::user()->name }}">{{ Auth::user()->name ?? 'Cheria Sevani' }}</div>
                <div class="role d-flex align-items-center">
                    <span style="display:inline-block; width: 7px; height: 7px; border-radius: 50%; background: #10b981; margin-right: 5px;"></span>
                    {{ Auth::user()->isSuperAdmin() ? 'Super Administrator' : 'Staff Admin Toko' }}
                </div>
            </div>
        </div>

        <!-- Menu Group 1: Ringkasan -->
        <div class="sidebar-heading">Menu Utama</div>
        <ul class="nav">
            <li class="nav-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <p>Dashboard</p>
                </a>
            </li>
        </ul>

        <!-- Menu Group 2: Katalog & Produk -->
        <div class="sidebar-heading mt-3">Katalog Toko</div>
        <ul class="nav">
            <li class="nav-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <a href="{{ route('kategori.index') }}">
                    <i class="bi bi-tags-fill"></i>
                    <p>Kategori Produk</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                <a href="{{ route('produk.index') }}">
                    <i class="bi bi-box-seam-fill"></i>
                    <p>Koleksi Produk</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('promosi.*') ? 'active' : '' }}">
                <a href="{{ route('promosi.index') }}">
                    <i class="bi bi-percent"></i>
                    <p>Promo & Diskon</p>
                </a>
            </li>
        </ul>

        <!-- Menu Group 3: Interaksi & Komunitas -->
        <div class="sidebar-heading mt-3">Konten & Ulasan</div>
        <ul class="nav">
            <li class="nav-item {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                <a href="{{ route('blog.index') }}">
                    <i class="bi bi-newspaper"></i>
                    <p>Artikel Blog</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('ulasan.*') ? 'active' : '' }}">
                <a href="{{ route('ulasan.index') }}">
                    <i class="bi bi-chat-heart-fill"></i>
                    <p>Ulasan Pelanggan</p>
                </a>
            </li>
        </ul>

        @if (Auth::user()->isSuperAdmin())
            <!-- Menu Group 4: Khusus Super Admin -->
            <div class="sidebar-heading mt-3" style="color: #be185d;">Super Admin</div>
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="bi bi-people-fill"></i>
                        <p>Kelola Pengguna</p>
                    </a>
                </li>
            </ul>
        @endif

        <!-- Menu Group 5: Pengaturan -->
        <div class="sidebar-heading mt-3">Pengaturan</div>
        <ul class="nav">
            <li class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    <i class="bi bi-person-gear"></i>
                    <p>Profil Saya</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" target="_blank">
                    <i class="bi bi-arrow-up-right-circle"></i>
                    <p>Lihat Website</p>
                </a>
            </li>
        </ul>
    </div>
</div>
