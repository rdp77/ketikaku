@extends('layouts_backend._main_backend')

@section('extra_styles')
@endsection

@section('content')
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Profile Page</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div >
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{ asset('assets_backend/images/users/5.jpg') }}" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                                    <h6 class="card-subtitle">{{ Auth::user()->u_desc_short }}</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fas fa-user"></i> <font class="font-medium">{{ Auth::user()->u_follower }}</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fas fa-book"></i> <font class="font-medium">{{ $total_book }}</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                <small class="text-muted">Email address </small>
                                <h6>{{ Auth::user()->email }}</h6> 
                                <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{ Auth::user()->u_phone }}</h6> 
                                <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{ Auth::user()->u_address }}</h6>
                                <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>   
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                    <div class="card-body">
                                        <div class="profiletimeline m-t-0">
                                           @foreach ($novel as $element)
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="{{ asset('assets_backend/images/users/2.jpg') }}" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div> <a href="javascript:void(0)" class="link">{{ Auth::user()->u_fullname }} <small>aka {{ Auth::user()->name }}</small></a> <span class="sl-date">{{ date('d F Y h:i:s',strtotime($element->dn_created_at)) }}</span>
                                                        <div class="m-t-20 row">
                                                            <div class="col-md-3 col-xs-12"><img src="{{ asset('/storage/app/'.$element->dn_cover) }}" width="100px" height="400px" alt="user" class="img-fluid rounded" /></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                {!! substr(strip_tags($element->dn_description),0,150) !!}
                                                                {!! strlen($element->dn_description) > 50 ?  ".....  <button href='' class='btn btn-secondary btn-xs' onclick='readmore(".$element->dn_id.")'> Readmore </button>" : "" !!}  
                                                                <br><br>
                                                                
                                                                 <a href="{{ route('frontend_book',['id'=>str_replace(" ","-",$element->dn_title)]) }}" class="btn-sm btn btn-success"><i class="fas fa-eye"></i> View </a>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="like-comm m-t-20"> 
                                                            {{-- <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 2 comment</a>  --}}

                                                            {{-- <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Like</a> --}}

                                                            {{-- <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Vote</a>  --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @if (count($novel) > 5)
                                                <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a>
                                            @endif
                                           @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->u_fullname }}</p>
                                            </div>
                                            <div class="col-md-6 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->u_phone }}</p>
                                            </div>
                                            <div class="col-md-6 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                            </div>
                                            <div class="col-md-6 col-xs-6"> <strong>Adress</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->u_address }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30">{!! Auth::user()->u_desc_full !!}
                                      {{--   <h4 class="font-medium m-t-30">Skill Set</h4>
                                        <hr>
                                        <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->u_fullname }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Name Alias <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->u_name }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="email" value="{{ Auth::user()->email }}" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->u_phone }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->u_address }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Desc Short</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->u_desc_short }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

@section('extra_scripts')


<script type="text/javascript">
    

    function readmore(argument) {
        alert(argument);
    }

</script>

@endsection
