<!DOCTYPE html>
<html>
    @include('layouts_frontend._head_frontend')
    @include('layouts_frontend._css_frontend')
    @yield('extra_style')
    <body class="skin-orange">
        @include('layouts_frontend._nav_frontend')
            @yield('content')
        {{-- </div> --}}
        <style type="text/css">
            *{padding:0;margin:0;}
            .float{
                position:fixed;
                width:60px;
                height:60px;
                bottom:40px;
                right:40px;
                background-color:#0C9;
                color:#FFF !important;
                font-size: 25px !important;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }
            .my-float{
                margin-top:19px;
            }
        </style>
        <a href="https://wa.me/628214044679?text=hai%20admin," target="_blank" class="float">
            <i class="fa fa-comment-dots my-float"></i>
        </a>
    </body>
    @include('layouts_frontend._footer_frontend')
    @include('layouts_frontend._scripts_frontend')
    @yield('extra_scripts')
</html>