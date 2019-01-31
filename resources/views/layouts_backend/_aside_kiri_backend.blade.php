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
                                    @if (Auth::user()->m_image == null)
                                        <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" class="rounded-circle img-fluid" {{-- style="width: 60px !important;height: 60px !important" --}} />
                                    @else
                                        <img src="{{ asset('/storage/app/'.Auth::user()->m_image) }}?{{ time() }}" class="rounded-circle img-fluid" {{-- style="width: 60px !important;height: 60px !important" --}} />
                                    @endif
                                </div>
                                <div class="user-content hide-menu m-t-5">
                                    <h5 class="m-b-5 user-name font-medium">@if (Auth::user() != null ) {{ Auth::user()->m_username }} @else @endif</h5>
                                    <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </a>
                                    <a href="{{ route('login') }}"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                    <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="{{ route('profile_backend',['id'=>Auth::user()->m_id]) }}" >
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
                    
                        <!-- User Profile-->
                        @if (Auth::user()->m_isactive == 'Y')
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
                                </ul>
                            </li>
                        @endif
                        @if (Auth::user()->m_role == 1 || Auth::user()->m_role == 2)
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="icon-Pen"></i>
                                    <span class="hide-menu"> Control User</span>
                                </a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item">
                                        <a href="{{-- {{ route('master_user') }} --}}" class="sidebar-link">
                                            <i class="icon-Record"></i>
                                            <span class="hide-menu"> Writer Data</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (Auth::user()->m_role == 1 || Auth::user()->m_role == 2)
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="icon-Pen"></i>

                                    <span class="hide-menu"> Control Story</span>
                                </a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item">
                                        <a href="{{ route('approve_novel') }}" class="sidebar-link">
                                            <i class="icon-Record"></i>
                                            <span class="hide-menu"> Story Data</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('approve_chapter') }}" class="sidebar-link">
                                            <i class="icon-Record"></i>
                                            <span class="hide-menu"> Chapter Data</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </nav>
            </div>
            <!-- End Sidebar scroll-->
        </aside>