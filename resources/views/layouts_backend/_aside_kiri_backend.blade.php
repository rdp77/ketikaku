<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile dropdown m-t-5">
                                <div class="user-pic">
                                    @if (Auth::user()->u_image == null)
                                        <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" class="rounded-circle img-fluid" {{-- width="150" --}} />
                                    @else
                                        <img src="{{ asset('assets_backend/images/user/5.jpg') }}?{{ time() }}" class="rounded-circle img-fluid" {{-- width="150" --}} />
                                    @endif
                                    {{-- <img src="{{ asset('assets_backend/images/users/1.jpg') }}" alt="users" class="" /> --}}
                                </div>
                                <div class="user-content hide-menu m-t-5">
                                    <h5 class="m-b-5 user-name font-medium">@if (Auth::user() != null ) {{ Auth::user()->name }} @else @endif</h5>
                                    <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </a>
                                    <a href="{{ route('login') }}"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                    <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                        <a class="dropdown-item" @if (Auth::user() != null )  href="{{ route('profile_backend',[Auth::user()->id]) }}" @else @endif >
                                            <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" ><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}
                                   " aria-expanded="false">
                                <i class="mdi mdi-directions"></i>
                                <span class="hide-menu">Homepage</span>
                            </a>
                        </li>
                      {{--   <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home') }}
                                   " aria-expanded="false">
                                <i class="mdi mdi-directions"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li> --}}
                        <!-- User Profile-->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="icon-Pen"></i>

                                <span class="hide-menu"> Write</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('write_novel') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> Novel</span>
                                    </a>
                                </li>
                               {{--  <li class="sidebar-item">
                                    <a href="{{ route('write_chapter') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> Chapter</span>
                                    </a>
                                </li> --}}
                               
                            </ul>
                        </li>
                    </nav>
            </div>
            <!-- End Sidebar scroll-->
        </aside>