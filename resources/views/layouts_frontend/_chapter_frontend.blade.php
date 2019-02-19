<!DOCTYPE html>
<html>
    @include('layouts_frontend._head_frontend')
    @include('layouts_frontend._css_frontend')
    @yield('extra_style')
    <body class="skin-orange">
        @include('layouts_frontend._chapter_nav_frontend')
    @yield('content')
    </body>
    @include('layouts_frontend._footer_frontend')
    @include('layouts_frontend._scripts_frontend')
    @yield('extra_scripts')
</html>