<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    @include('layouts_backend._head_backend')
    @include('layouts_backend._css_backend')
    @yield('extra_styles')
    
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
    @include('layouts_backend._nav_backend')
    @include('layouts_backend._aside_kiri_backend')
        <div class="page-wrapper">
            @yield('content')
            <footer class="footer text-center">
                @include('layouts_backend._footer_backend')
            </footer>
        </div>
    </div>
    @include('layouts_backend._aside_kanan_backend')
    @include('layouts_backend._scripts_backend')
    @yield('extra_scripts')
</body>
</html>