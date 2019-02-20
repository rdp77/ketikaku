

<style type="text/css">

.info{    
    font-size: 22px;
    color: #1abc9c;
    margin-top: 10px;
}
.menu_chapter{
    height: 65px;
    border-bottom: 1px solid #a8a8a8;
    padding-top: 12px;
}
/*.container_margin {
    margin-top: 54px;
}*/
</style>

<header class="primary">
            <nav class="menu menu_chapter">
                <div class="container-fluid container_margin">
                    <div class="brand">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/logo.png') }}">
                        </a>
                    </div>
                    <div class="mobile-toggle">
                        <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
                    </div>
                    <div class="mobile-toggle">
                        <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <div id="menu-list">
                        <ul class="nav-list" style="margin-left: 40px;">
                            <li class="for-tablet nav-title"><a>Menu</a></li>
                            <li class="for-tablet"><a href="{{ url('/login') }}">Login</a></li>
                            <li class="for-tablet"><a href="{{ url('/register') }}">Register</a></li>
                            <li><p class="info">ditulis oleh</p></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End nav -->
        </header>
        @include('layouts_frontend._scripts_frontend')

        <script type="text/javascript">
            $( document ).ready(function() {
                $('.brand').css('display','block');
            });

            if ($(window).width() < 427) {
               $('.nav-icons').css('display','block');
            }
            else {
               $('.nav-icons').css('display','block');
            }

        </script>