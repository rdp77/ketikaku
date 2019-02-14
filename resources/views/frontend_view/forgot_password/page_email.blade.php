<!DOCTYPE html>
<html>
<head>
    <title></title>
    @include('layouts_backend._head_backend')
    @include('layouts_backend._css_backend')
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
                    <form method="get" action="{{ route('forgot_password_send_email') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>

                            <input id="email" type="text" class="form-control form-control-lg email" name="email" placeholder="email" value="{{ old('email') }}" autofocus aria-label="email" aria-describedby="basic-addon1">
                        </div>

                        @if($errors->any())
                                @if ( $errors->first() == 'sukses')
                                    <h3 class="text-center"><span class="badge badge-success">Your Request Has ben Send</span></h3>
                                @elseif($errors->first() == 'kosong')
                                    <h3 class="text-center"><span class="badge badge-warning">Email Doesn't Exist</span></h3>
                                @else
                                    <h3 class="text-center"><span class="badge badge-error">System is Busy. Try Again later</span></h3>
                                @endif
                        @endif
                        
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info send" type="submit">Send Email</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0 m-t-10">
                            <div class="col-sm-12 text-center">
                                Create Account <a href="{{ url('register') }}" class="text-info m-l-5"><b>Sign Up</b></a> , Already have <a href="{{ url('login') }}" class="text-info m-l-5"><b>Login</b></a>
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
    $('.send').click(function(){
        if ($('.email').val() == '') {
            iziToast.success({
                icon: 'fa fa-info',
                position:'topRight',
                title: 'Warning!',
                message: 'Email Cannot be empty!',
            });
        return false;
        }
        $('.send').text('sending..');
        $('.send').attr('disabled','disabled');
    })
</script>