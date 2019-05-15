<header class="primary">
            <div class="firstbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="brand">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/images/logo.png')}}">
                                </a>
                            </div>                      
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <form class="search" autocomplete="off">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control search_val" placeholder="Type something here">                                 
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-primary search_data"><i class="ion-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="help-block">
                                    <div>Genre Popular:</div>
                                    <ul>
                                        <li><a href="#">#Romance</a></li>
                                        <li><a href="#">#Horror</a></li>
                                        <li><a href="#">#Slice Of Life</a></li>
                                        <li><a href="#">#Action</a></li>
                                        <li><a href="#">#Comedy</a></li>
                                    </ul>
                                </div>
                            </form>                             
                        </div>
                        <div class="col-md-3 col-sm-12 text-right">
                            @if(Auth::user() != null)
                                    {{-- <li><a href="{{ url('login') }}"><i class="ion-person-add"></i><div>hy ,{{ Auth::user()->name }}</div></a></li> --}}
                            @else
                                <ul class="nav-icons">
                                    <li><a href="{{ url('register') }}"><i class="ion-person-add"></i><div>Register</div></a></li>
                                    <li><a href="{{ url('login') }}"><i class="ion-person"></i><div>Login</div></a></li>
                                </ul>
                            @endauth
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start nav -->
            <nav class="menu">
                <div class="container">
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
                        <ul class="nav-list">
                            <li class="for-tablet nav-title"><a>Menu</a></li>
                            <li class="for-tablet"><a href="{{ url('/login') }}">Login</a></li>
                            <li class="for-tablet"><a href="{{ url('/register') }}">Register</a></li>
                            <li><a href="{{ url('/') }}">Home</a></li>

                            <li><a href="{{ route('write_novel_create') }}">Tulis</a></li>
                                <li class="dropdown magz-dropdown">
                                    @if (Auth::User() != null) 
                                        <a href="#">hy ,{{ Auth::user()->m_username }} <i class="ion-ios-arrow-right"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('profile_backend',['id'=>Auth::user()->m_id]) }}"> My Profile</a></li>
                                            <li><a href="{{ route('profile_backend',['id'=>Auth::user()->m_id]) }}">{{-- <i class="icon ion-person"></i> --}} My Account</a></li>
                                            <li><a href="{{ url('/home') }}"><i class="icon-ID-3"></i> Dashboard</a></li>
                                            <li><a href="{{ route('logout') }}"                                            
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                                            {{-- <i class="icon ion-log-out"> --}}</i> Logout</a></li>
                                            
                                        </ul>
                                    @else
                                    {{-- <ul class="nav-icons" style="display: none;">
                                        <li><a href="{{ url('register') }}"><div>Register</div></a></li>
                                        <li><a href="{{ url('login') }}"><div>Login</div></a></li>
                                    </ul> --}}
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
            
            if ($(window).width() < 427) {
               $('.nav-icons').css('display','block');
            }
            else {
               $('.nav-icons').css('display','block');
            }
            
            $('.search_data').click(function(){
                // window
                var val = $('.search_val').val();
                $.ajax({
                    type: "get",
                    url:'{{ route('search_user') }}',
                    data: '&search='+val,
                    success:function(data){
                       $('.home').html(data);
                    }
                });
            })
                


        </script>