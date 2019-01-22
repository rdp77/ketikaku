@extends('layouts_backend._main_backend')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/normalize.css') }}" /> --}}
@section('extra_styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/demo.css') }}" /> --}}

{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/component.css') }}" /> --}}

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
                                <center class="m-t-30"> 
                                <div class="form-group preview_div">
                                    {{-- <label class="col-md-12">Photo </label> --}}
                                        <div class="col-md-12">

                                        @if (Auth::user()->u_image == null)
                                        <div class="preview_td">
                                            <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" class="
                                            output rounded-circle" width="150" height="145" />
                                        </div>
                                        @else
                                        <div class="preview_td">
                                            <img src="{{ asset('assets_backend/images/user/5.jpg') }}?{{ time() }}" class="output rounded-circle" width="150" height="145" />
                                        </div>
                                        @endif
                                        
                                            <br>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <div class="file-upload upl_1" {{-- style="width: 100%;" --}}>
                                                    <div class="file-select">
                                                        <div class="file-select-button fileName" >chooseFile</div>
                                                        <div class="file-select-name noFile tag_image_1" >Image</div> 
                                                        <input type="file" class="chooseFile" name="dn_cover">
                                                    </div>
                                                    {{-- <button class="btn btn-secondary">Save</button> --}}
                                                </div>
                                                {{-- <div class="col-sm-2">                                              --}}
                                                    {{-- <button class="btn btn-secondary">Save</button> --}}
                                                {{-- </div> --}}
                                            </div>
                                            
                                           
                                        </div>
                                    </div>
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
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#change_password" role="tab" aria-controls="pills-setting" aria-selected="false">Change Password</a>
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
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" id="form_save">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->m_fullname }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Name Alias <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->m_name }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="email" value="{{ Auth::user()->m_email }}" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Desc Short</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->m_desc_short }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Desc Full</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ Auth::user()->m_desc_short }}" class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="button" onclick="save()" class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

@section('extra_scripts')

{{-- <script type="text/javascript" src="{{ asset('design_frontend/input_file/js/custom-file-input.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('design_frontend/input_file/js/jquery.custom-file-input.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('design_frontend/input_file/js/jquery-v1.min.js') }}"></script> --}}

<script type="text/javascript">
    

    function readmore(argument) {
        alert(argument);
    }

        $('.chooseFile').bind('change', function () {
            var filename = $(this).val();
            var fsize = $(this)[0].files[0].size;
            if(fsize>1048576) //do something if file size more than 1 mb (1048576)
            {
              iziToast.warning({
                icon: 'fa fa-times',
                message: 'File Is To Big!',
              });
              return false;
            }
            var parent = $(this).parents(".preview_div");
            if (/^\s*$/.test(filename)) {
                $(parent).find('.file-upload').removeClass('active');
                $(parent).find(".noFile").text("No file chosen..."); 
            }
            else {
                $(parent).find('.file-upload').addClass('active');
                $(parent).find(".noFile").text(filename.replace("C:\\fakepath\\", "")); 
            }
            load(parent,this);
        });

        function load(parent,file) {
            var fsize = $(file)[0].files[0].size;
            if(fsize>2048576) //do something if file size more than 1 mb (1048576)
            {
              iziToast.warning({
                icon: 'fa fa-times',
                message: 'File Is To Big!',
              });
              return false;
            }
            var reader = new FileReader();
            reader.onload = function(e){
                $(parent).find('.output').attr('src',e.target.result);
            };
            reader.readAsDataURL(file.files[0]);
        }

        // $(document).ready(function() {

            if ($("#mymce").length > 0) {
                tinymce.init({
                    selector: "textarea#mymce",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }
        // });

        function save() {
           iziToast.show({
            overlay: true,
            close: false,
            timeout: 20000, 
            color: 'dark',
            icon: 'fas fa-question-circle',
            title: 'Save Data!',
            message: 'Apakah Anda Yakin ?!',
            position: 'center',
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
            [
                '<button style="background-color:#17a991;color:white;">Save</button>',
                function (instance, toast) {
                  tinyMCE.triggerSave();
                  var comment = $("#mytextarea").val();

                  $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var form = $('#form_save');

                    $.ajax({
                        type: "POST",
                        url:'{{ route('master_user_update') }}',
                        data: form.serialize(),
                        processData: false,
                        contentType: false,
                      success:function(data){
                        if (data.status == 'sukses') {
                            iziToast.success({
                                icon: 'fa fa-save',
                                position:'topRight',
                                title: 'Success!',
                                message: 'Data Berhasil Disimpan!',
                            });

                        location.reload();
                        }
                      },error:function(){
                        iziToast.error({
                            icon: 'fa fa-info',
                            position:'topRight',
                            title: 'Error!',
                            message: data.message,
                        });
                      }
                    });
                    instance.hide({
                        transitionOut: 'fadeOutUp'
                    }, toast);
                }
            ],
            [
                '<button style="background-color:#d83939;color:white;">Cancel</button>',
                function (instance, toast) {
                  instance.hide({
                    transitionOut: 'fadeOutUp'
                  }, toast);
                }
              ]
            ]
        });
        }

</script>

@endsection
