

<style type="text/css">

.info{    
    font-size: 22px;
    color: #1abc9c;
    margin-top: 10px;
    border: none !important;
    background-color: white !important;
}
.info_icon{
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
                        <ul class="nav-list" style="margin-left: 40px;width: 90%">
                            <li class="for-tablet nav-title"><a>Menu</a></li>
                            {{-- <li style="width: 50%;"><i class="fas fa-book-open info_icon"></i> &nbsp;&nbsp;<input type="text" disabled="" style="width: 90%;" class="info"></li> --}}
                            <li class="pull-right dropdown magz-dropdown">
                                @if (Auth::User() != null) 
                                    <a href="#">hy ,{{ Auth::user()->m_username }} <i class="ion-ios-arrow-right"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('profile_backend',['id'=>Auth::user()->m_id]) }}"> My Profile</a></li>
                                        <li><a href="{{ route('profile_backend',['id'=>Auth::user()->m_id]) }}">My Account</a></li>
                                        <li><a href="{{ url('/home') }}"><i class="icon-ID-3"></i> Dashboard</a></li>
                                        <li><a href="{{ route('logout') }}"                                            
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();" ></i> Logout</a></li>
                                    </ul>
                                @else
                                    <li class="for-tablet"><a href="{{ url('/login') }}"><i class="ion-person-add"></i> Login</a></li>
                                    <li class="for-tablet"><a href="{{ url('/register') }}"><i class="ion-person"></i> Register</a></li>
                                    <li class="pull-right"><a href="{{ url('/register') }}"><i class="ion-person"></i> Register</a></li>
                                    <li class="pull-right"><a href="{{ url('/login') }}"><i class="ion-person-add"></i> Login</a></li>
                                @endif
                            </li>
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
                $('.menu .mobile-toggle').css('padding','0px');
            });

            if ($(window).width() < 427) {
               $('.nav-icons').css('display','block');
            }
            else {
               $('.nav-icons').css('display','block');
            }

        </script>