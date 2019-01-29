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
        font-weight: 300;
    }
</style>
@endsection

@section('content')
<section class="single">
            <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="bg">
                        </div>
                    </div>
                    
            </div>
            <div class="container">
                    <div class="line thin"></div>
                    <div class="col-md-2 sidebar" id="sidebar">
                        <aside>
                            @if ($profile->m_image == null)
                                <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" style="border-radius: 50%;width: 100%;" />
                            @else
                                <img src="{{ asset('storage/app/'.$profile->m_image) }}?{{ time() }}" style="border-radius: 50%;width: 100%;">
                            @endif
                            <br>
                            <br>
                            <p class="drop_here_follower"><i class="fas fa-users"></i> &nbsp;{{ $profile->m_follower }} Followers</p>
                            <p ><i class="fas fa-user-friends"></i> &nbsp;{{ $following }} Following</p>
                            @if (Auth::user() != null)
                                @if ($profile->m_id != Auth::user()->m_id)
                                    <button class="btn-sm btn btn-primary drop_here_button_follower" onclick="follow()"><i class="fas fa-user-plus"></i> Follow</button>
                                @endif
                            @else
                                    <button class="btn-sm btn btn-primary" disabled=""><i class="fas fa-user-plus"></i> Follow</button>
                            @endif
                        </aside>
                    </div>
                    <div class="col-md-10">
                        <article class="article main-article">
                            <header>
                                <h3>{{ $profile->m_name }}</h3>
                                <p>
                                    {!! $profile->m_desc_short !!}
                                </p>
                                <br>
                                <h6>
                                    {{  $profile->m_desc_full }}
                                </h6>
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
                            Anda Harus Login terlebih dahulu  <a href="{{ url('/login') }}" class="btn btn-primary btn-sm">Login</a>
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
            $('.drop_here_follower').html('<i class="fas fa-users"></i> &nbsp;'+data.follow+' Followers');
            if (data.check == 'plus') {
                $('.drop_here_button_follower').html('<i class="fas fa-user-check"></i> &nbsp; Follow');
            }else{
                $('.drop_here_button_follower').html('<i class="fas fa-user-plus"></i> &nbsp; Follow');
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

</script>
@endsection
