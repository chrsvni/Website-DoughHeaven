<!DOCTYPE html>
<html lang="id">

@include('admin.partials.head')

<body>
    <div class="wrapper">
        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')
        
        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>

            @include('admin.partials.footer')
        </div>
    </div>

    @include('admin.partials.script')
</body>
</html>
