<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('assets_backend/images/Favicon.jpg') }}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            {{-- <img src="{{ asset('assets_backend/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" /> --}}
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('assets_backend/images/Favicon.jpg') }}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{ asset('assets_backend/images/Logo_Putih.png') }}" style="width: 130px;margin-left: 0%;" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" onclick="check_bell()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-bell font-20"></i>

                            </a>
                            <div class="dropdown-menu mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <div class="drop_header">
                                                {{-- <sh4 class="m-b-0 m-t-5">4 New</h4>
                                                <span class="font-light">Notifications</span> --}}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="drop_notif">
{{--                                             <div class="message-center notifications">
                                                <a href="javascript:void(0)" class="message-item">
                                                    <span class="btn btn-danger btn-circle">
                                                        <i class="fa fa-link"></i>
                                                    </span>
                                                    <div class="mail-contnet">
                                                        <h5 class="message-title">Luanch Admin</h5>
                                                        <span class="mail-desc">Just see the my new admin!</span>
                                                        <span class="time">9:30 AM</span>
                                                    </div>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center m-b-5 check_all" href="javascript:void(0);">
                                            <strong style="color: black">Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-20 ti-email"></i>

                            </a>
                            <div class="dropdown-menu mailbox animated bounceInDown" aria-labelledby="2">
                                <span class="with-arrow">
                                    <span class="bg-danger"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-danger text-white">
                                            <h4 class="m-b-0 m-t-5">5 New</h4>
                                            <span class="font-light">Messages</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center message-body">
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img">
                                                    <img src="{{ asset('assets_backend/images/users/1.jpg') }}" alt="user" class="rounded-circle">
                                                    <span class="profile-status online pull-right"></span>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Pavan kumar</h5>
                                                    <span class="mail-desc">Just see the my admin!</span>
                                                    <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img">
                                                    <img src="{{ asset('assets_backend/images/users/2.jpg') }}" alt="user" class="rounded-circle">
                                                    <span class="profile-status busy pull-right"></span>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Sonu Nigam</h5>
                                                    <span class="mail-desc">I've sung a song! See you at</span>
                                                    <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img">
                                                    <img src="{{ asset('assets_backend/images/users/3.jpg') }}" alt="user" class="rounded-circle">
                                                    <span class="profile-status away pull-right"></span>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Arijit Sinh</h5>
                                                    <span class="mail-desc">I am a singer!</span>
                                                    <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img">
                                                    <img src="{{ asset('assets_backend/images/users/4.jpg') }}" alt="user" class="rounded-circle">
                                                    <span class="profile-status offline pull-right"></span>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Pavan kumar</h5>
                                                    <span class="mail-desc">Just see the my admin!</span>
                                                    <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);">
                                            <b style="color: black">See all e-Mails</b>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->


                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                @if (Auth::user()->m_image == null)
                                    <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" class="rounded-circle" width="31" height="31" />
                                @else
                                    <img src="{{ asset('storage/app/'.Auth::user()->m_image) }}?{{ time() }}" class="rounded-circle" width="31" height="31" />
                                @endif
                                {{-- <img src="{{ asset('assets_backend/images/users/1.jpg') }}" alt="user" class="" width="31"> --}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        @if (Auth::user()->m_image == null)
                                            <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" class="img-circle" width="60" height="60"/>
                                        @else
                                            <img src="{{ asset('storage/app/'.Auth::user()->m_image) }}?{{ time() }}" class="img-circle" width="60" height="60"/>
                                        @endif
                                        {{-- <img src="{{ asset('assets_backend/images/users/1.jpg') }}" alt="user" class="" width="60"> --}}
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ Auth::user()->m_username }}</h4>
                                        <p class=" m-b-0">{{ Auth::user()->m_email }}</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{ route('profile_backend',['id'=>Auth::user()->m_id]) }}">
                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    {{-- <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a> --}}
                                {{-- <a class="dropdown-item" href="javascript:void(0)"> --}}
                                    {{-- <i class="ti-email m-r-5 m-l-5"></i> Inbox</a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" ><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                {{-- <a class="dropdown-item" href="javascript:void(0)"> --}}
                                    {{-- <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a> --}}
                                <div class="dropdown-divider"></div>
                                {{-- <div class="p-l-30 p-10"> --}}
                                    {{-- <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a> --}}
                                {{-- </div> --}}
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
<script type="text/javascript">
    

    function check_bell() {
        $('.drop_notif').empty();
        $.ajax({
            type: "get",
            url:'{{ route('notif_bell') }}',
            success:function(data){
                if (data.status == 'sukses') {
                    $('.check_all').css('display','block');
                    $('.drop_header').html(data.header);
                    var key = 1;
                    Object.keys(data.notif).forEach(function(){
                        $('.drop_notif').append(

                            '<div class="message-center notifications">'+
                                '<a href="javascript:void(0)" class="message-item">'+
                                    '<span class="btn btn-danger btn-circle">'+
                                        '<i class="fa fa-link"></i>'+
                                    '</span>'+
                                    '<div class="mail-contnet">'+
                                        '<h5 class="message-title">'+data.notif[key-1].m_username+' Has Subsribed</h5>'+
                                        '<span class="mail-desc">Subsribed this '+data.notif[key-1].dn_title+'</span>'+
                                        '<span class="time"></span>'+
                                    '</div>'+
                                '</a>'+
                            '</div>'

                        );
                    key++;
                    });

                }else if(data.status == 'kosong'){
                    $('.check_all').css('display','none');
                    // $('.drop_header').ht ml(data.header);
                    $('.drop_notif').html('<div class="drop-title bg-primary text-white">'+data.notif+'</div>');
                }

            },error:function(){
              iziToast.error({
                 icon: 'fa fa-info',
                 position:'topRight',
                 title: 'Error!',
                 message: 'Call Admin To resolve!',
              });
          }
        });
    }


</script>
