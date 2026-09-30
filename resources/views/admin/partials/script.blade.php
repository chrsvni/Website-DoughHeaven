<!-- Core JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<!-- Ready Theme Plugins -->
<script src="{{ asset('style/tema1/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('style/tema1/assets/js/ready.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi scrollbar jika ada
        if ($.fn.scrollbar) {
            $('.scrollbar-inner').scrollbar();
        }

        // Sidebar Toggler untuk Mobile & Desktop
        $('.sidenav-toggler').on('click', function(e) {
            e.preventDefault();
            $('html').toggleClass('nav_open');
            $(this).toggleClass('toggled');
        });

        // Topbar Toggler
        $('.topbar-toggler').on('click', function(e) {
            e.preventDefault();
            $('html').toggleClass('topbar_open');
            $(this).toggleClass('toggled');
        });

        // Tutup sidebar saat klik di luar (pada mobile)
        $(document).on('click', function(e) {
            if ($(window).width() < 992) {
                if (!$(e.target).closest('.sidebar, .sidenav-toggler').length) {
                    if ($('html').hasClass('nav_open')) {
                        $('html').removeClass('nav_open');
                        $('.sidenav-toggler').removeClass('toggled');
                    }
                }
            }
        });
    });
</script>
