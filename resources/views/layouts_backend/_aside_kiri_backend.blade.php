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
                                    <img src="{{ asset('assets_backend/images/users/1.jpg') }}" alt="users" class="rounded-circle img-fluid" />
                                </div>
                                <div class="user-content hide-menu m-t-5">
                                    <h5 class="m-b-5 user-name font-medium">{{ Auth::user()->name }}</h5>
                                    <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </a>
                                    <a href="{{ route('login') }}"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                    <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('login') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" ><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('login') }}" method="POST" style="display: none;">
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
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
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
                                <li class="sidebar-item">
                                    <a href="{{ route('write_chapter') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> Chapter</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                    </nav>
            </div>
            <!-- End Sidebar scroll-->
        </aside>