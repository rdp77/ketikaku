<style type="text/css">
    .mailbox .message-center{
        height: auto;
    }
     .drop-title {
        padding: 8px !important;
     }

     .badge_notif {
         position: absolute;
         top: 10px;
         font-size: 12px;
         right: 4px;
         display: inline-block;
         width: 20px;
         height: 20px;
         border-radius: 50%;
         background-color: #ff7171;
     }
</style>
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
                                <i class="ti-bell font-20"><span class='badge badge_notif badge-secondary'></span></i>

                            </a>
                            <div class="dropdown-menu mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <div class="drop_header">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="drop_notif">
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <a class="nav-link text-center m-b-5 check_all" href="javascript:void(0);">
                                            <strong style="color: black">Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>

                       {{--  <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" onclick="check_like()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-heart font-20"> <span class='badge badge_notif badge-secondary'>21</span></i>

                            </a>
                            <div class="dropdown-menu mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <div class="drop_header_like">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="drop_notif_like">
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
                        </li> --}}

                       {{--  <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" onclick="check_like()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-heart font-20"> <span class='badge badge_notif badge-secondary'>21</span></i>

                            </a>
                            <div class="dropdown-menu mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <div class="drop_header_like">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="drop_notif_like">
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                       {{--  <li class="nav-item dropdown">
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
                        </li> --}}
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
<script src="{{ asset('assets_backend/libs/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript">

    $( document ).ready(function() {
        $.ajax({
            type: "get",
            url:'{{ route('sum_notif_bell') }}',
            success:function(data){
                $('.badge_notif').text(data.total);  
            }
       });
   });


    function check_bell() {
        $('.drop_notif').empty();
        $.ajax({
            type: "get",
            url:'{{ route('notif_bell') }}',
            success:function(data){
                if (data.status == 'sukses') {
                    $('.check_all').css('display','block');
                    var key = 1;
                    Object.keys(data.notif).forEach(function(){
                        $('.drop_header').html(data.header);
                        if (data.notif[key-1].flag == 'upload') {
                                $a = ' Has Upload</h5>'
                                $b = ' Upload <b>'+data.notif[key-1].tittles+'</b>'
                        }
                        if(data.notif[key-1].flag == 'update'){
                                $a = ' Has Update</h5>'
                                $b = ' Update <b>'+data.notif[key-1].tittles+'</b>'
                        }
                        if(data.notif[key-1].flag == 'subs'){
                                $a = ' Has Subsribed</h5>'
                                $b = ' Subsribed <b>'+data.notif[key-1].tittles+'</b>'
                        }
                        if(data.notif[key-1].flag == 'follow'){
                                $a = ' Has Follow</h5>'
                                $b = ' Follows You'
                        }
                        $img = data.notif[key-1].image;
                        if (data.notif[key-1].image != null) {
                            $c = "{{ url('/') }}"+"/storage/app/"+data.notif[key-1].image
                            {{-- $c = '{{ asset('storage/app/'.$img) }}?{{ time() }}' --}}
                        }else{
                            $c = '{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}'
                        }
                        $('.drop_notif').append(
                            '<div class="message-center notifications">'+
                                '<a href="javascript:void(0)" class="message-item">'+
                                    '<span class="user-img">"'+
                                        '<img src="'+$c+'" alt="user" style="height:38px" class="rounded-circle">'+
                                    '</span>'+
                                    '<div class="mail-contnet">'+
                                        '<h5 class="message-title">'+data.notif[key-1].user+$a+'</h5>'+ 
                                        '<span class="mail-desc">'+$b+' </span>'+
                                        '<span class="time"></span>'+
                                    '</div>'+
                                '</a>'+
                            '</div>'
                        );
                    key++;
                    });
                }else if(data.status == 'kosong'){
                    $('.check_all').css('display','none');
                    // $('.drop_header').html(data.header);
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
