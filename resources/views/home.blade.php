@extends('layouts_backend._main_backend')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/normalize.css') }}" /> --}}
@section('extra_styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/demo.css') }}" /> --}}
<style type="text/css">
    .kuning{
      color: #ffd119;
      font-size: 14px;
    }
    .comment-widgets .comment-row{
        margin: 0px;
        padding-top: 3px;
        padding-bottom: 3px;

    }
</style>
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
                        <h3 class="text-warning"><i class="fa fa-info-circle"></i> Peringatan</h3> Verifikasi ke email  {{ Auth::user()->m_email }}   diperlukan agar mendapatkan akses untuk menulis. email verifikasi akan membutuhkan beberapa waktu. Mohon cek folder SPAM apabila email tidak di temukan di kotak masuk (UTAMA) <a href="#" onclick="verify()" class="btn btn-primary btn-sm"> <b><strong> Verifikasi </strong></b></a>
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
                                    <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" alt="user"  width="50" height="50" class="rounded-circle"{{-- width="150" --}} />
                                @else
                                    <img src="{{ asset('assets_backend/images/user/5.jpg') }}?{{ time() }}" alt="user"  width="50" height="50" class="rounded-circle"{{-- width="150" --}} />
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

        <div class="row">
            @if (count($comment_chapter) == 0)
            @else
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body" style="padding-bottom: 5px;border-bottom: 1px solid #e6e5e5;">
                                <h4 class="card-title">Recent Comments</h4>
                            </div>
                            <div class="comment-widgets scrollable" style="height:560px;">
                                <!-- Comment Row -->
                                @foreach ($comment_chapter as $element)
                                <div class="d-flex flex-row comment-row" style="border-bottom: 1px solid #e6e5e5;">
                                    <div class="p-2">
                                        <img src="{{ asset('storage/app/'.$element->m_image) }}" style="overflow: hidden;" alt="user" width="50" height="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">{{ $element->m_username }} mengomentari "{{ strtoupper($element->dn_title) }}"</h6>
                                        <span class="m-b-0 d-block" style="margin-bottom: -10px;">{!! $element->dncc_message !!}</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">{{ date('d M,Y h:i a',strtotime($element->dncc_created_at)) }}</span>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                <!-- Comment Row -->
                            </div>
                        </div>
                    </div>
                    <!-- column -->
            @endif
            @if (count($rating_novel) == 0)
            @else
                   <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body" style="padding-bottom: 5px;border-bottom: 1px solid #e6e5e5;">
                                <h4 class="card-title">Recent Rating</h4>
                            </div>
                            <div class="comment-widgets scrollable" style="height:560px;">
                                <!-- Comment Row -->
                                @foreach ($rating_novel as $element)
                                <div class="d-flex flex-row comment-row" style="border-bottom: 1px solid #e6e5e5;">
                                    <div class="p-2">
                                        <img src="{{ asset('storage/app/'.$element->m_image) }}" alt="user"  width="50" height="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">{{ $element->m_username }} menilai "{{ strtoupper($element->dn_title) }}"</h6>
                                        <span class="m-b-0 d-block">{!! $element->dr_message !!}</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">{{ date('d M,Y h:i a',strtotime($element->dr_created_at)) }}</span>
                                            <span>
                                                {{-- <p> --}}
                                                        @if ($element->dr_rate == 1)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 2)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 3)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 4)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 5)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                        @endif
                                                    {{-- </p> --}}
                                            </span>
                                            {{-- <span class="action-icons active">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="icon-close"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart text-danger"></i>
                                                </a>
                                            </span> --}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                </div>

    
    </div>
        </div>
</div>

        @endsection

@section('extra_scripts')
<script type="text/javascript">


    function verify() {
        $('.preloader').show();
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
                if (data.status == 'sukses') {
                            iziToast.success({
                                icon: 'fa fa-save',
                                position:'topRight',
                                title: 'Success!',
                                message: 'Email Telah Terkirim',
                            });
                }
                    $('.preloader').hide();
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
