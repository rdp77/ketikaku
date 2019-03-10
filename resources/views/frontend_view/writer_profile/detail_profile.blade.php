@extends('layouts_frontend._main_frontend')

@section('extra_style')
{{-- <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet"> --}}
{{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/dist/starrr.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">


<style type="text/css">
    .nav-tabs>li.active>a:hover{color:#555;cursor:default;background-color:red;border-bottom-color:transparent}
    .nav-tabs{
        border-bottom:none;
    }
    .nav-tabs>li.active>a{
        color: #555;
        cursor: default;
        background-color: transparent !important;
        border-bottom: 0px solid #ddd !important;
        border-bottom-color: transparent !important;
    }
    .bg{
        padding-left: 0px;
        background-image: url(https://images.unsplash.com/photo-1548536154-c1e7ea093768?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80);
        background-size: cover;
        height: 400px;
        background-repeat: no-repeat;
    }
    h3,h6{
        font-weight: 400;
    }
    h5 {
        font-weight: 550;
        color:#585858 !important;
    }
    h4{
        font-weight: 650;
        color:#585858 !important;
    }
    li {
        display: inline;
    }
    .menur ul > li > a {
        line-height: 28px !important;
    }
    .menur {
        height: 60px !important;
        border:1px solid transparent !important;
        box-shadow: -1px 0px 20px 8px rgba(0, 0, 0, 0.08), 0 4px 5px 0 rgba(0, 0, 0, 0.1);
    }
    .pad{
        padding-left: 0px !important;padding-right:0px !important
    }
    .btnfllower{
        margin-top: 16px;
    }
    .sidebar{
        border:1px solid transparent;
        box-shadow: -1px 0px 20px 8px rgba(0, 0, 0, 0.08), 0 4px 5px 0 rgba(0, 0, 0, 0.1);
        background-color: white;
        color: #606466;
    }
    /*.main_article{
        border:1px solid transparent;

        box-shadow: 0 1px 10px 0 rgba(34,34,34,.08), 0 4px 5px 0 rgba(34,34,34,.1);
        background-color: white;
    }*/
    .single {
        padding-top: 160px !important;
        background-color: #e8e8e8;
    }
    .love i:before{
        font-size: 20px !important;
    }
    .love div{
        margin-top: 1px !important;
    }
    .article .padding{
        padding-top: 10px;
        background-color: white;
    }
    section.single footer{
        margin-top: 10px;
    }
    input {
        font-weight: 600;
    }
    aside {
        min-height: 385px;
    }
    .counted{
        font-size: 25px;
        color:grey !important;
        text-align: center;
        font-family: 'Lato', sans-serif !important;
    }
    .text_count{
        font-size: 17px;margin-top: 8px;margin-bottom: 3px;color:grey;
        text-align: center;
    }
    .photo_profile {
        box-shadow: -1px 0px 20px 8px rgba(0, 0, 0, 0.08), 0 4px 20px 0px rgba(0, 0, 0, 0.1);
        border-radius: 50%;width: 210px;height:210px;margin-top:-120px;border:3px solid white;
    }
    .featured-author .featured-author-body{
        box-shadow: -1px 0px 20px 8px rgba(0, 0, 0, 0.08), 0 4px 20px 0px rgba(0, 0, 0, 0.1);

    }
    .featured-author .featured-author-body .featured-author-count .item .name{
        text-transform: none !important;
    }
    .icon-facebookbg {
    color: #3b5998;
    }
    .icon-twitterbg {
    color: #00aced;
    }
    .icon-youtubebg {
    color: #FF0000;
    }
    .icon-instagrambg {
    color: #fbad50;
    }

    .circle-icon2 {
        background: #ffc0c0;
        padding:30px;
        border-radius: 50%;
    }

    .circle-icon {
        background: #ffc0c0;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        text-align: center;
        line-height: 100px;
        vertical-align: middle;
        padding: 30px;
    }
    .social{
        color: white;
    }
    
</style>
@endsection

@section('content')
<section class="single">
            <div class="container-fluid pad" >
                    <div class="col-md-12 pad">
                        <div class="bg">
                        </div>
                        <nav class="menu menur">
                            <div class="container">
                                <div class="brand">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('assets/images/logo.png') }}">
                                    </a>
                                </div>
                                <div class="mobile-toggle">
                                    <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i> Detail</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <div id="menu-list" style="margin-left: 0%">
                                    <ul class="nav-list">
                                        {{-- <li class="for-tablet nav-title"><a>Menu</a></li> --}}
                                        <li class="for-tablet"><a href="{{ url('/login') }}">Login</a></li>
                                        <li class="for-tablet"><a href="{{ url('/register') }}">Register</a></li>
                                        <li >
                                            <img src="{{ asset('storage/app/'.$profile->m_image) }}?{{ time() }}" class="photo_profile">
                                        </li>
                                        <li style="padding-left: 250px">
                                                <p class="text_count">Novel </p>
                                                <a class="counted" onclick="novel({{ $profile->m_id }})">{{ $novels }}</a>
                                        </li>
                                        <li style="padding-left: 23px">
                                                <p class="text_count">Following </p>
                                                <a class="counted" onclick="following({{ $profile->m_id }})">{{ $following }}</a>
                                        </li>
                                        <li style="padding-left: 23px">
                                                <p class="text_count">Followers </p>
                                                <a class="drop_here_follower counted" onclick="followers({{ $profile->m_id }})">{{ $profile->m_follower }}</a>
                                        </li>
                                        <li style="padding-left: 120px">
                                                @if (Auth::user() != null)
                                                    @if ($profile->m_id != Auth::user()->m_id)
                                                        @if ($follow > 0)
                                                            <button class="btn-sm btn btn-secondary drop_here_button_follower btnfllower" onclick="follow()"><i class="fas fa-user-check"></i> &nbsp;Following</button>
                                                        @else
                                                            <button class="btn-sm btn btn-primary drop_here_button_follower btnfllower" onclick="follow()"><i class="fas fa-user-plus"></i> Follow</button>
                                                        @endif
                                                    @endif
                                                @else
                                                        <button class="btn-sm btn btn-secondary btnfllower" disabled=""><i class="fas fa-user-plus"></i> Follow</button>
                                                @endif                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
            </div>
            <div class="container" style="margin-top: 15px">
                    <div class="col-md-3 sidebar" id="sidebar">
                        <aside>
                                <h5>{{ ucwords($profile->m_username) }}</h5>
                                <h6>{{ ucwords($profile->m_name) }}</h6>
                                
                                <ul class="social trp">
                                    <li>
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x icon-facebookbg"></i>
                                          <i class="fab fa-facebook-f fa-stack-1x"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <h6>{{ $profile->m_facebook }}</h6>
                                    </li>
                                </ul>
                                <ul class="social trp">
                                    <li>
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x icon-instagrambg"></i>
                                          <i class="fab fa-instagram fa-stack-1x"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <h6>{{ $profile->m_instagram }}</h6>
                                    </li>
                                </ul>
                                <ul class="social trp">
                                    <li>
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x icon-twitterbg"></i>
                                          <i class="fab fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <h6>{{ $profile->m_twitter }}</h6>
                                    </li>
                                </ul>
                                <ul class="social trp">
                                    <li>
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x icon-youtubebg"></i>
                                          <i class="fab fa-youtube fa-stack-1x"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <h6>{{ $profile->m_youtube }}</h6>
                                    </li>
                                </ul>
                                <br>
                                <p>
                                    {!! ucfirst($profile->m_desc_short) !!}
                                </p>
                                <br>
                                <p>
                                    {{  ucfirst($profile->m_desc_full) }}
                                </p>
                        </aside>
                    </div>
                    <div class="col-md-9 main_article">
                        <article class="article main-article">
                            <header>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    @foreach ($data as $element)
                                    <article class="article col-md-3 col-xs-6">
                                        <div class="inner">
                                            <figure>
                                                <a href="{{ route('frontend_book',['id'=>str_replace(" ","-",$element->dn_title)]) }}">
                                                    @if ($element->dn_cover == null)
                                                        <img src="{{ asset('assets/images/noimage.jpg' ) }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @else
                                                        <img src="{{ asset('storage/app/'.$element->dn_cover ) }}" height="300px" alt="{{ $element->dn_title }}">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="padding">
                                                <h6 style="font-size: 12px"><a href="{{ route('frontend_book',['id'=>str_replace(" ","-",$element->dn_title)]) }}"><input type="text" readonly="" style="width: 100%;border: none;cursor: pointer;" value="{{ $element->dn_title }}" name=""></a></h6>
                                                <footer>
                                                    <span class="love active"><i class="ion-android-favorite"></i> <div class="liked">@if ($element->liked == null) 0 @else {{ $element->liked }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-users"></i> <div class="subscribed">@if ($element->subscribed == null) 0 @else {{ $element->subscribed }} @endif</div></span>
                                                    <span class="love active"><i class="fas fa-eye"></i> <div class="viewer">@if ($element->viewer == null) 0 @else {{ $element->viewer }} @endif</div></span>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                            </div>
                            </header>
                        </article>
                    </div>
                    <div class="col-md-12">
                     
                        <div class="line thin"></div>
                        @if(Auth::user() != null)
                            <input type="hidden" value="{{ Auth::user()->m_id }}" class="dmc_comment_by">
                                <div class="comments">
                                    {{-- <h4 class="title">3 Responses </h4> --}}
                                    <div class="comment-list">
                                        <form class="row">
                                            <div class="col-md-12">
                                                <h4 class="title">Comment :</h4>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="message">Response <span class="required"></span></label>
                                                <textarea class="form-control" name="message" id="message" placeholder="Write your response ..."></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="button" class="btn btn-primary rate">Send Response</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        @else
                            {{-- Anda Harus Login terlebih dahulu  <a href="{{ url('/login') }}" class="btn btn-primary btn-sm">Login</a> --}}
                        @endif
                </div>
            </div>
            </div>

        </section>
@endsection

@section('extra_scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/dist/starrr.js') }}"></script>
<script type="text/javascript">

    $( window ).load(function() {
        // alert('a');
        $.ajax({
            
        })
    });

    function follow(argument) {
        var dmc_comment_by = $('.dmc_comment_by').val();
        $.ajax({
            type: "get",
            url:'{{ route('follow_frontend') }}',
            data: '&dmf_followed='+('{{ $profile->m_id }}')+'&dmf_follow_by='+dmc_comment_by,
            processData: false,
            contentType: false,
          success:function(data){
            $('.drop_here_follower').html(data.follow);
            if (data.check == 'plus') {
                $('.drop_here_button_follower').html('<i class="fas fa-user-check"></i> &nbsp; Following');
                $('.drop_here_button_follower').removeClass('btn-primary');
                $('.drop_here_button_follower').addClass('btn-secondary');
            }else{
                $('.drop_here_button_follower').html('<i class="fas fa-user-plus"></i> &nbsp; Follow');
                $('.drop_here_button_follower').addClass('btn-primary');
                $('.drop_here_button_follower').removeClass('btn-secondary');
            }
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


    function reply(argument) {
        $('.drop_reply_'+argument).html(
        '<br>'+
        '<textarea class="form-control" name="drdt_message_'+argument+'" id="drdt_message_'+argument+'" placeholder="Write your response ..."></textarea>'+
        '<br>'+
        '<button type="button" class="btn btn-sm btn-primary reply_comment_'+argument+'" onclick="reply_data('+argument+')"><i class="fas fa-share"></i> Reply</button>');  
    }

    function reply_data(argument) {
        var message = $('#dmc_message_'+argument).val();
        var dmc_comment_by = $('.dmc_comment_by').val();

        if (message == '') {
            iziToast.warning({
                    icon: 'fa fa-info-circle',
                    position:'topRight',
                    title: 'Warning!',
                    message: 'Response Tidak Boleh Kosong!',
                });
            return false;
        }
        $.ajax({
            type: "get",
            url:'{{ route('comment_frontend') }}',
            data: '&dmc_commended='+('{{ $profile->m_id }}')+'&message='+message+'&dmc_comment_by='+dmc_comment_by,
            processData: false,
            contentType: false,
          success:function(data){
            $('.drop_here').html(data);
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
    if (parseInt($('.viewer').text()) > 1) {
        var char = $('.viewer').text();
        console.log(char);
        console.log(char.charAt(0));
    }

    if ($(window).width() < 500) {
       $('.ion-android-favorite').css('padding-left','0px');
       $('.fa-users').css('padding-left','9px');
       $('.fa-eye').css('padding-left','9px');
    }
    else {
       $('.ion-android-favorite').css('padding-left','3px');
       $('.fa-users').css('padding-left','13px');
       $('.fa-eye').css('padding-left','13px');
    }

    function following(argument) {
        $.ajax({
            type: "get",
            url:'{{ route('profile_following_frontend') }}',
            data: '&id='+argument,
            processData: false,
            contentType: false,
          success:function(data){
            $('.main_article').html(data);
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
    function novel(argument) {
        $.ajax({
            type: "get",
            url:'{{ route('profile_novel_frontend') }}',
            data: '&id='+argument,
            processData: false,
            contentType: false,
          success:function(data){
            $('.main_article').html(data);
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
    function followers(argument) {
        $.ajax({
            type: "get",
            url:'{{ route('profile_followers_frontend') }}',
            data: '&id='+argument,
            processData: false,
            contentType: false,
          success:function(data){
            $('.main_article').html(data);
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
