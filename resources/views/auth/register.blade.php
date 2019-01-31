<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>AdminBite admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets_backend/images/background/background_register.jpg);background-size: cover;">
            <div class="auth-box on-sidebar">
                <div>
                    <div class="logo">
                        <span class="db"><img src="assets_backend/images/logo-text.png" width="100px" alt="logo" /></span>
                        <br>
                        <h5 class="font-medium m-b-20">&nbsp;</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('register') }}" class="form-horizontal m-t-20">
                                @csrf
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control{{ $errors->has('m_username') ? ' is-invalid' : '' }} form-control-lg" type="text" required=" " placeholder="Username" id="m_username" value="{{ old('m_username') }}" name="m_username" autofocus>

                                        @if ($errors->has('m_username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('m_username') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg"  id="m_email" type="text" required=" " placeholder="Email" class="form-control{{ $errors->has('m_email') ? ' is-invalid' : '' }}" name="m_email" value="{{ old('m_email') }}" autofocus>

                                        @if ($errors->has('m_email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('m_email') }}</strong>
                                            </span>
                                        @endif
                            
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input type="password" required=" " name="m_password" placeholder="Password" class="form-control-lg form-control{{ $errors->has('m_password') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('m_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('m_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            {{-- <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-lg btn-info "  type="submit ">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5 "><b>Sign In</b></a>
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
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets_backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets_backend/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets_backend/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip "]').tooltip();

    // if ($('input.checkbox_check').is(':checked')) {
        // $('.btn-block').attr('disabled',false);
    // }

    $(".preloader ").fadeOut();
    </script>
</body>

</html>