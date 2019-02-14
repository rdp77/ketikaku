<!DOCTYPE html>
<html>
<head>
    <title></title>
    @include('layouts_backend._head_backend')
    @include('layouts_backend._css_backend')
    @include('layouts_backend._scripts_backend')
</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('assets_backend/images/big/auth-bg.jpg') }}) no-repeat center center;">
    <div class="auth-box">
        <div id="loginform">
            <div class="logo">
                <span class="db"><img src="{{ asset('assets_backend/images/logo-text.png') }}" width="120px" alt="logo" /></span>
                <h5 class="font-medium m-b-20">&nbsp;{{-- Sign In to Admin --}}</h5>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="save">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>

                            <input id="password1" type="password" class="form-control form-control-lg" placeholder="password"autofocus aria-label="password" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>

                            <input id="password2" type="password" class="form-control form-control-lg" name="password" placeholder="password"autofocus aria-label="password" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info send" onclick="send()" type="button">Reset</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0 m-t-10">
                            <div class="col-sm-12 text-center">
                                Create Account <a href="{{ url('register') }}" class="text-info m-l-5"><b>Sign Up</b></a> , Already have ?<a href="{{ url('login') }}" class="text-info m-l-5"><b>Login</b></a>
                            </div>
                        </div>
                        <div class="form-group m-b-0 m-t-10">
                            <div class="col-sm-12 text-center">
                                <a href="{{ url('/') }}" class="text-info m-l-5"><b>Back to Homepage</b></a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
    @include('layouts_backend._scripts_backend')
</body>
</html>

<script type="text/javascript">
    
    function send() {
        if ($('#password1').val() != $('#password2').val()) {
            iziToast.error({
                 icon: 'fa fa-info',
                 position:'topRight',
                 title: 'Warning!',
                 message: 'Password Not Match!',
              });
            return false;
        }

        var form  = $('.save');
        formdata = new FormData(form[0]);
        formdata.append('id',('{{ $data->m_id }}'));

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        

        $.ajax({
            type: "post",
            url:'{{ route('forgot_password_send_reset_password') }}',
            data: formdata ? formdata : form.serialize(),
            processData: false,
            contentType: false,
            success:function(data){
                if (data.status == 'sukses') {
                    iziToast.success({
                        icon: 'fa fa-info',
                        position:'topRight',
                        title: 'Success!',
                        message: 'Password Has ben Change!',
                    });
                }     
                        location.href = ('{{ route('login') }}');

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