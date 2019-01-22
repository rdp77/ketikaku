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
                    <form method="POST" action="{{ route('forgot_password_email') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>

                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} form-control-lg" name="username" placeholder="Username" value="{{ old('username') }}" autofocus aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info" type="submit">Send</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0 m-t-10">
                            <div class="col-sm-12 text-center">
                                Alreadt have  an account? <a href="{{ url('login') }}" class="text-info m-l-5"><b>Login</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="recoverform">
            <div class="logo">
                <span class="db"><img src="{{ asset('assets_backend/images/logo-icon.png') }}" alt="logo" /></span>
                <h5 class="font-medium m-b-20">Recover Password</h5>
                <span>Enter your Email and instructions will be sent to you!</span>
            </div>
            <div class="row m-t-20">
                <!-- Form -->
                <form class="col-12" action="index.html">
                    <!-- email -->
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control form-control-lg" type="email" required="" placeholder="Username">
                        </div>
                    </div>
                    <!-- pwd -->
                    <div class="row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    @include('layouts_backend._scripts_backend')
</body>
</html>