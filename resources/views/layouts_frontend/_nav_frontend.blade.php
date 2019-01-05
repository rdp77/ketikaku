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
                                        <input type="text" name="q" class="form-control" placeholder="Type something here">                                 
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="ion-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="help-block">
                                    <div>Popular:</div>
                                    <ul>
                                        <li><a href="#">HTML5</a></li>
                                        <li><a href="#">CSS3</a></li>
                                        <li><a href="#">Bootstrap 3</a></li>
                                        <li><a href="#">jQuery</a></li>
                                        <li><a href="#">AnguarJS</a></li>
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
                    <div id="menu-list">
                        <ul class="nav-list">
                            <li class="for-tablet nav-title"><a>Menu</a></li>
                            <li class="for-tablet"><a href="login.html">Login</a></li>
                            <li class="for-tablet"><a href="register.html">Register</a></li>
                            <li><a href="{{ url('/') }}">Home</a></li>

                            <li><a href="{{ route('write_novel_create') }}">Tulis</a></li>
                                <li class="dropdown magz-dropdown">
                                    @if (Auth::User() != null) 
                                        <a href="#">hy ,{{ Auth::user()->name }} <i class="ion-ios-arrow-right"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('profile_backend',['id'=>Auth::user()->id]) }}"><i class="icon ion-person"></i> My Account</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" ><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </ul>
                                    @else
                                    @endif
                                </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End nav -->
        </header>