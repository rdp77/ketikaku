@extends('layouts_frontend._main_frontend')

@section('extra_style')
{{-- <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet"> --}}
{{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/dist/starrr.css') }}">


<style type="text/css">
   /* .nav-tabs>li.active>a:hover{color:#555;cursor:default;background-color:red;border-bottom-color:transparent}
    .nav-tabs{
        border-bottom:none;
    }
    .nav-tabs>li.active>a{
        color: #555;
        cursor: default;
        background-color: transparent !important;
        border-bottom: 0px solid #ddd !important;
        border-bottom-color: transparent !important;
    }*/   
    .starrr { display: inline-block; }

    .starrr i {
      font-size: 25px;
      padding: 0 1px;
      cursor: pointer;
      color: #ffd119;
    }
    .best-of-the-week .article figure{
        height: auto;
    }
    .comments textarea.form-control{
        height: 100px;
    }
    .kuning{

      color: #ffd119;
    }
    .article .padding{
        padding: 15px 15px 50px !important;
    }
    .love i:before{
        font-size: 20px !important;
    }
    .love div{
        margin-top: 1px !important;
    }
</style>
@endsection

@section('content')
<section class="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-12 col-md-12">
                        @if ($book->dn_cover == null)
                            <img src="{{ asset('assets/images/noimage.jpg' ) }}" width="200px" height="280px" alt="{{ $book->dn_title }}">
                        @else
                            <img src="{{ asset('storage/app/'.$book->dn_cover ) }}" width="200px" height="280px" alt="{{ $book->dn_title }}">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <h5>
                            <div class="text">{{ $book->dn_title }} 

                            </div>
                        </h5>

                        <table width="100%">
                            <tr style="height: 50px">
                                <td valign="middle" width="30%" style="border-top:none;border-bottom:1px solid #dddddd">Status</td>
                                <td colspan="3" valign="middle" style="border-top:none;border-bottom:1px solid #dddddd">
                                    @if ($book->dn_type_novel == 1)
                                        <div class="badges">
                                            <div class="badge-item"><i class="ion-star"></i> Official</div>
                                        </div>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            <tr style="height: 50px" >
                                <td valign="middle" style="border-bottom:1px solid #dddddd">Kategori</td>
                                <td style="border-bottom:1px solid #dddddd">-</td>
                                <td style="border-bottom:1px solid #dddddd">&nbsp;</td>
                                <td style="border-bottom:1px solid #dddddd">&nbsp;</td>
                            </tr>
                            <tr style="height: 50px">
                                <td valign="middle" style="border-bottom:1px solid #dddddd">Ditulis Oleh</td>
                                <td style="border-bottom:1px solid #dddddd"><a href="{{ route('profile_frontend',['name'=>$book->m_username]) }}">{{ $book->m_username }}</a></td>
                            </tr>
                            <tr style="height: 50px">
                                <td valign="middle" style="border-bottom:1px solid #dddddd">Diterbitkan</td>
                                <td colspan="3" style="border-bottom:1px solid #dddddd">{{ date('d F Y , H:i A',strtotime($book->dn_created_at)) }}</td>
                            </tr>
                            <tr style="height: 50px" >
                                <td valign="middle" style="border-bottom:1px solid #dddddd"><i class="fas fa-users"></i>
                                    <span class="drop_here_total_subscribe">{{ $total_subscribe }}</span> 
                                &nbsp;Subscribed</td>
                                <td valign="middle" style="border-bottom:1px solid #dddddd"><i class="fas fa-heart"></i>
                                    <span class="drop_here_total_like">{{ $total_like }}</span> 
                                &nbsp;liked</td>
                                <td valign="middle" style="border-bottom:1px solid #dddddd"><i class="fas fa-eye"></i>
                                    <span class="drop_here_total_view">{{ $total_view }}</span> 
                                &nbsp;Viewer</td>
                                {{-- <td style="border-bottom:1px solid #dddddd" >Like</td> --}}
                                {{-- <td valign="middle" style="border-bottom:1px solid #dddddd"></td> --}}
                                {{-- <td style="border-bottom:1px solid #dddddd" class="drop_here_total_like">{{ $total_like }}</td> --}}
                            </tr>
                        </table> 
                        <table width="100%">
                            <tr style="height: 50px;text-align: left;">
                                @if (Auth::user() != null)
                                    @if (Auth::user()->m_id != $book->dn_created_by)
                                        <td width="30%">
                                            @if ($subscriber > 0)
                                                <button class="btn btn-secondary btn-sm subscribe drop_here_subscribe"><i class="far fa-bell"></i> Subscribed </button>
                                            @else
                                                <button class="btn btn-primary btn-sm subscribe drop_here_subscribe"><i class="fas fa-bell"></i> Subscribe </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($liker > 0)
                                                <button class="btn btn-secondary btn-sm like drop_here_like"><i class="far fa-heart"></i> Liked </button>
                                            @else
                                                <button class="btn btn-primary btn-sm like drop_here_like"><i class="fas fa-heart"></i> Like </button>
                                            @endif
                                        </td>
                                        <td>
                                            
                                        </td>
                                    @endif
                                @else 
                                    <td>Login To Subscribe</td>
                                @endif
                            </tr>
                        </table>     
                       {{--  <table width="100%">
                            <tr style="height: 50px;text-align: center;">
                                <td><button class="btn btn-primary btn-sm"><i class="fas fa-bell"></i> Follow</button></td>
                                <td><button class="btn btn-primary btn-sm"><i class="fas fa-bell"></i> Follow</button></td>
                                <td><button class="btn btn-primary btn-sm"><i class="fas fa-bell"></i> Follow</button></td>
                            </tr>
                        </table>  --}}       
                    </div>
                    <div class="col-md-3">
                        <div class="featured-author">
                                    <div class="featured-author-inner">
                                        <div class="featured-author-cover" style="background-image: url('{{ asset('assets/images/news/img15.jpg') }}');">
                                            @if ($book->m_role == 4)
                                                <div class="badges">
                                                    <div class="badge-item"><i class="ion-star"></i> Official</div>
                                                </div>
                                            @else
                                            
                                            @endif
                                            
                                            <div class="featured-author-center">
                                                <figure class="featured-author-picture">
                                                    @if ($book->m_image == null)
                                                        <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" />
                                                    @else
                                                        <img src="{{ asset('/storage/app/'.$book->m_image) }}?{{ time() }}" />
                                                    @endif
                                                </figure>
                                                <div class="featured-author-info">
                                                    <h2 class="name">{{ $book->m_username }}</h2>
                                                    <div class="desc">{{ $book->m_instagram }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="featured-author-body">
                                            <div class="featured-author-count">
                                                <div class="item">
                                                    <a href="#">
                                                        <div class="name">Follower </div>
                                                        <div class="value">{{ $book->m_follower }}</div>                                                        
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="#">
                                                        <div class="name">Book</div>
                                                        <div class="value">{{ $total_book }}</div>                                                      
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="{{ route('profile_frontend',['name'=>$book->m_username]) }}">
                                                        <div class="icon">
                                                            <div>More</div>
                                                            <i class="ion-chevron-right"></i>
                                                        </div>                                                      
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="featured-author-quote">
                                                {{-- "{{ $a }}" --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     
                    </div>

                    <div class="col-md-12" style="/*background-color: #efefef;*/margin-top: 40px;padding: 20px 0px 0px 30px">
                   {{--    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">DESKRIPSI</a></li>
                        <li><a data-toggle="tab" href="#menu1">BAB CERITA</a></li>
                        <li><a data-toggle="tab" href="#menu2">ULASAN</a></li>
                      </ul> --}}

                      <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active">
                                <a href="#home" role="tab" data-toggle="tab">
                                    {{-- <i class="ion-android-star-outline"></i> --}} DESKRIPSI
                                </a>
                            </li>
                            <li>
                                <a href="#menu1" role="tab" data-toggle="tab">
                                    {{-- <i class="ion-ios-chatboxes-outline"></i> --}} BAB CERITA
                                </a>
                            </li>
                            <li>
                                <a href="#menu2" role="tab" data-toggle="tab">
                                    {{-- <i class="ion-ios-chatboxes-outline"></i> --}} ULASAN
                                </a>
                            </li>
                        </ul>


                      <div class="tab-content">
                        <div id="home" class="tab-pane fade in active col-md-12" style="font-size: 15px;margin-top: 40px">
                                
                            <div class="col-md-12">
                              {!! $book->dn_description !!}
                              
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade" style="margin-top: 40px">
                            <table class="table" style="width:100%" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Judul Chapter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($chapter as $index => $element)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $element->dnch_title }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm baca" 
                                            data-name1="{{ $book->dn_title }}" 
                                            data-name="{{ $element->dnch_title }}" 
                                            value="{{ $element->dnch_id }}" ><i class="fa fa-book"></i> Baca</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu2" class="tab-pane fade" style="margin-top: 10px">
                            <div class="col-md-4 col-md-offset-4">
                                @if(Auth::user() != null)
                                        <input type="hidden" name="" value="{{ Auth::user()->m_id }}" class="dr_rated_by">
                                    @if (Auth::user()->m_id != $book->dn_created_by)
                                        <div class="comments">
                                            <h4 class="title">{{-- 3 Responses  --}}</h4>
                                            <div class="comment-list">
                                                <form class="row">
                                                    <div class="col-md-12">
                                                        <h4 class="title">Rate This Novel :</h4>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12">
                                                        <div class="starrr"></div>
                                                        <input type="hidden" class="choice">
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
                                    @endif
                                @else
                                    Anda Harus Login terlebih dahulu  <a href="{{ url('/login') }}" class="btn btn-primary btn-sm">Login</a>
                                @endif
                            </div>
                            <div class="col-md-12">
                              <div class="comments">
                                <div class="comment-list drop_here">
                                    @foreach ($novel_rate as $element)
                                        <div class="item">
                                            <div class="user">                                
                                                <figure>
                                                    @if ($element->m_image != null)
                                                        <img src="{{ asset('/storage/app/'.$element->m_image) }}?{{ time() }}">
                                                    @else
                                                        <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" >
                                                    @endif
                                                </figure>
                                                <div class="details">
                                                    <h5 class="name">{{ $element->m_username }}  
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
                                                    </h5>
                                                    <div class="time">{{ date('d F Y',strtotime($element->dr_created_at)) }} <small>{{ date('h:i:s A',strtotime($element->dr_created_at)) }}</small></div>
                                                    <div class="description">
                                                        {{ $element->dr_message }}
                                                    </div>
                                                    <footer>

                                                        <br>
                                                        <button type="button" class="btn btn-sm btn-primary reply_{{ $element->dr_id }}" onclick="reply({{ $element->dr_id }})"><i class="fas fa-share"></i> Reply</button>
                                                        {{-- <a href="#">Reply</a> --}}
                                                    </footer>
                                                </div>
                                            @foreach ($novel_reply as $gg)
                                            @if ($gg->drdt_ref_rate_id == $element->dr_id)
                                            <div class="reply-list">
                                                <div class="item">
                                                    <div class="user">                                
                                                        <figure>
                                                            @if ($gg->m_image != null)
                                                                <img src="{{ asset('/storage/app/'.$gg->m_image) }}?{{ time() }}">
                                                            @else
                                                                <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" >
                                                            @endif
                                                        </figure>
                                                        <div class="details">
                                                            <h5 class="name">{{ $gg->m_username }}</h5>
                                                            <div class="time">{{ date('d F Y',strtotime($gg->drdt_created_at)) }} <small>{{ date('h:i:s A',strtotime($gg->drdt_created_at)) }}</small></div>
                                                            <div class="description">
                                                                {{ $gg->drdt_message }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            @endif
                                            @endforeach
                                            <div class="drop_reply_{{ $element->dr_id }}">
                                                
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="best-of-the-week">
            <div class="container">
                <h1><div class="text">Write by {{ $book->m_username }}</div>
                    
                </h1>
                <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    @foreach ($novel as $element)
                                    <article class="article col-md-3">
                                        <div class="inner">
                                            <figure>
                                                <a href="{{ asset('storage/app/'.$element->dn_cover ) }}">
                                                    @if ($element->dn_cover == null)
                                                        <img src="{{ asset('assets/images/noimage.jpg' ) }}" alt="{{ $element->dn_title }}">
                                                    @else
                                                        <img src="{{ asset('storage/app/'.$element->dn_cover ) }}" alt="{{ $element->dn_title }}">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="padding">
                                                <h6 style="font-size: 12px"><a href="{{ route('frontend_book',['id'=>str_replace(" ","-",$element->dn_title)]) }}">{{-- {{ substr(strip_tags($element->dn_title), 0,25) }}{{ strlen($element->dn_title) > 2 ?  ".." : "" }} --}}<input type="text" style="width: 100%;border: none;cursor: pointer;" value="{{ $element->dn_title }}" name=""></a></h6>
                                                <footer>
                                                    <span class="love active"><i style="padding-left: 13px" class="ion-android-favorite"></i> <div>@if ($element->liked == null) 0 @else {{ $element->liked }} @endif</div></span>
                                                    <span class="love active"><i style="padding-left: 13px" class="fas fa-users"></i> <div>@if ($element->liked == null) 0 @else {{ $element->subscribed }} @endif</div></span>
                                                    <span class="love active"><i style="padding-left: 13px" class="fas fa-eye"></i> <div>@if ($element->liked == null) 0 @else {{ $element->viewer }} @endif</div></span>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>

                            </div>
                        </div>  
            </div>
        </section>
@endsection

@section('extra_scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/dist/starrr.js') }}"></script>
<script type="text/javascript">

    (function update() {
        $.ajax({
        }).then(function() {           // on completion, restart
           setTimeout(update, 30000);  // function refers to itself
        });
    })();  
    
     $('#myTable').DataTable({
        info: false,
        lengthChange: false,
        searching:false

     });

     $('.starrr').starrr({
      change: function(e, value){
        if (value) {
          $('.your-choice-was').show();
          $('.choice').val(value);
          
        } else {
          $('.your-choice-was').hide();
        }
      }

    });

    $('.baca').on('click',function(){
        // var datas = $(this).data('name');
        var datass = $(this).data('name');
        var creator = ('{{ $book->m_username }}');
        // var res1 = datas.replace(/\s/g,"-");

        var res = datass.replace(/\s/g,"-");
        window.location.href = baseUrl + '/chapter/'+creator+'/'+res;
    })

    function reply(argument) {
        // console.log(argument);
        $('.drop_reply_'+argument).html(
        '<br>'+
        '<textarea class="form-control" name="drdt_message_'+argument+'" id="drdt_message_'+argument+'" placeholder="Write your response ..."></textarea>'+
        '<br>'+
        '<button type="button" class="btn btn-sm btn-primary reply_comment_'+argument+'" onclick="reply_data('+argument+')"><i class="fas fa-share"></i> Reply</button>');  
    }

    function reply_data(argument) {
        var message = $('#drdt_message_'+argument).val();
        var dr_rated_by = $('.dr_rated_by').val();
        // alert(argument);
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
            url:'{{ route('novel_rate_reply') }}',
            data: '&id='+('{{ $book->dn_id }}')+'&message='+message+'&drdt_reply_by='+dr_rated_by+'&drdt_ref_rate_id='+argument,
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

    $('.subscribe').click(function(){
        $.ajax({
            type: "get",
            url:'{{ route('subscribe_novel') }}',
            data: '&id='+('{{ $book->dn_id }}')+'&creator='+('{{ $book->dn_created_by }}'),
            processData: false,
            contentType: false,
          success:function(data){
            if (data.check == 'plus') {
                $('.drop_here_subscribe').html('<i class="far fa-bell"></i>'+' Subscribed');
                $('.drop_here_subscribe').removeClass('btn-primary');
                $('.drop_here_subscribe').addClass('btn-secondary');
            }else{
                $('.drop_here_subscribe').html('<i class="fas fa-bell"></i>'+' Subscribe');
                $('.drop_here_subscribe').addClass('btn-primary');
                $('.drop_here_subscribe').removeClass('btn-secondary');
            }
            $('.drop_here_total_subscribe').html(data.total_subscribe);
          },error:function(){
            iziToast.error({
                icon: 'fa fa-info',
                position:'topRight',
                title: 'Error!',
                message: 'Try Again Later!',
            });
          }
        });
    });


    $('.like').click(function(){
        $.ajax({
            type: "get",
            url:'{{ route('like_novel') }}',
            data: '&id='+('{{ $book->dn_id }}')+'&creator='+('{{ $book->dn_created_by }}'),
            processData: false,
            contentType: false,
          success:function(data){
            if (data.check == 'plus') {
                $('.drop_here_like').html('<i class="far fa-heart"></i>'+' liked');
                $('.drop_here_like').removeClass('btn-primary');
                $('.drop_here_like').addClass('btn-secondary');
            }else{
                $('.drop_here_like').html('<i class="fas fa-heart"></i>'+' like');
                $('.drop_here_like').addClass('btn-primary');
                $('.drop_here_like').removeClass('btn-secondary');
            }
            $('.drop_here_total_like').html(data.total_like);
          },error:function(){
            iziToast.error({
                icon: 'fa fa-info',
                position:'topRight',
                title: 'Error!',
                message: 'Try Again Later!',
            });
          }
        });
    });




    $('.rate').click(function(){
        var message = $('#message').val();
        var value = $('.choice').val();
        var dr_rated_by = $('.dr_rated_by').val();
        if (value == '') {
            iziToast.warning({
                    icon: 'fa fa-info-circle',
                    position:'topRight',
                    title: 'Warning!',
                    message: 'Rating Tidak Boleh Kosong!',
                });
            return false;
        }
        if (message == '') {
            iziToast.warning({
                    icon: 'fa fa-info-circle',
                    position:'topRight',
                    title: 'Warning!',
                    message: 'Ulasan Tidak Boleh Kosong!',
                });
            return false;
        }

        $.ajax({
            type: "get",
            url:'{{ route('novel_rate_star') }}',
            data: '&id='+('{{ $book->dn_id }}')+'&rate='+value+'&message='+message+'&dr_rated_by='+dr_rated_by,
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
    })


</script>
@endsection
