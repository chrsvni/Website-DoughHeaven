<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <a href="{{ route('kategori.index') }}">
                    <i class="la la-table"></i>
                    <p>Kategori Produk</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                <a href="{{ route('produk.index') }}">
                    <i class="la la-keyboard-o"></i>
                    <p>Produk</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('promosi.*') ? 'active' : '' }}">
                <a href="{{ route('promosi.index') }}">
                    <i class="la la-th"></i>
                    <p>Promosi</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                <a href="{{ route('blog.index') }}">
                    <i class="la la-bell"></i>
                    <p>Blog</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('ulasan.*') ? 'active' : '' }}">
                <a href="{{ route('ulasan.index') }}">
                    <i class="la la-font"></i>
                    <p>Ulasan</p>
                </a>
            </li>
        </ul>
    </div>
</div>
