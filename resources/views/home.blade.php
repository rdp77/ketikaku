@extends('layouts_backend._main_backend')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/normalize.css') }}" /> --}}
@section('extra_styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/demo.css') }}" /> --}}

{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/component.css') }}" /> --}}

@endsection

@section('content')
    <div class="container-fluid">
        @if(session()->has('succes'))
            <div class="bg-light no-card-border">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                        <h3 class="text-success"><i class="fa fa-info-circle"></i> Pemberitahuan</h3> Selamat Akun anda sudah terverifikasi
                </div>
            </div>
        @endif
        @if (Auth::user()->m_isactive == 'N')
            <div class="bg-light no-card-border">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                        <h3 class="text-warning"><i class="fa fa-info-circle"></i> Peringatan</h3> Verifikasi email     diperlukan agar mendapatkan akses untuk menulis. email verifikasi akan membutuhkan beberapa waktu. <a href="#" onclick="verify()"> <b><strong> Verify</strong></b></a>
                        <br>
                        {{-- <b>Setting email untuk mendapatkan Verifikasi Email  <strong>( IMAP access -> Enable IMAP )</strong>. <a  href="https://mail.google.com/mail/u/0/#settings/fwdandpop" target="_blank"> <strong>Klik Disini</strong></a> Untuk Membuka Setting dari Gmail </b> --}}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card  bg-light no-card-border">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                @if (Auth::user()->u_image == null)
                                    <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" alt="user" width="60" class="rounded-circle"{{-- width="150" --}} />
                                @else
                                    <img src="{{ asset('assets_backend/images/user/5.jpg') }}?{{ time() }}" alt="user" width="60" class="rounded-circle"{{-- width="150" --}} />
                                @endif
                            </div>
                            <div>
                                <h3 class="m-b-0">Selamat Datang!</h3>
                                <span>{{ date('F ,d Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Comments</h4>
                            </div>
                            <div class="comment-widgets scrollable" style="height:560px;">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2">
                                        <img src="../../assets/images/users/2.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">Michael Jorden</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">April 14, 2016</span>
                                            <span class="label label-success label-rounded">Approved</span>
                                            <span class="action-icons active">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="icon-close"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart text-danger"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                   <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Rating</h4>
                            </div>
                            <div class="comment-widgets scrollable" style="height:560px;">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                        <img src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">James Anderson</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">April 14, 2016</span>
                                            <span class="label label-rounded label-primary">Pending</span>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-check"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2">
                                        <img src="../../assets/images/users/6.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">James Anderson</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">April 14, 2016</span>
                                            <span class="label label-rounded label-primary">Pending</span>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-check"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2">
                                        <img src="../../assets/images/users/2.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">Michael Jorden</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">April 14, 2016</span>
                                            <span class="label label-success label-rounded">Approved</span>
                                            <span class="action-icons active">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="icon-close"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart text-danger"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                            </div>
                        </div>
                    </div>
                </div>

    
    </div>
        </div> --}}
</div>

        @endsection

@section('extra_scripts')
<script type="text/javascript">


    function verify() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                type: "get",
                url:baseUrl+'/verify/'+'{{ Auth::user()->m_token }}'+'/'+'{{ Auth::user()->m_code }}',
                processData: false,
                contentType: false,
              success:function(data){

              },error:function(){
                iziToast.error({
                    icon: 'fa fa-info',
                    position:'topRight',
                    title: 'Error!',
                    message: 'Try Again Later!',
                });
              }
            });
    }


</script>

@endsection
