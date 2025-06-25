<div class="main-header">
    <div class="logo-header" data-background-color="blue">
        <a href="{{ route('dashboard.index') }}" class="logo text-black">
            DoughHeaven
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="#sidebar"
            aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
    </div>

    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        <div class="container-fluid">
            <!-- Search -->
            <form class="navbar-left navbar-form nav-search mr-md-3 py-3" action="#">
                <div class="input-group">
                    <input type="text" placeholder="Search ..." class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-search search-icon"></i>
                        </span>
                    </div>
                </div>
            </form>

            <!-- User Dropdown -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                        <i class="la la-angle-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="la la-user mr-2"></i> {{ __('Profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="la la-sign-out mr-2"></i> {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
