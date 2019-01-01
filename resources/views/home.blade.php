@extends('layouts_backend._main_backend')

@section('extra_styles')
@endsection

@section('content')
   <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title"></h4>
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

    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card  bg-light no-card-border">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <img src="{{ asset('assets_backend/images/users/2.jpg') }}" alt="user" width="60" class="rounded-circle">
                        </div>
                        <div>
                            <h3 >Welcome back <b>{{ Auth::user()->name }}</b> !</h3>
                            <span><?php date_default_timezone_set('Asia/Jakarta'); echo date('l \, j F Y'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('extra_scripts')
@endsection



    

       