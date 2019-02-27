@extends('layouts_frontend._chapter_frontend')

@section('extra_style')
{{-- <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet"> --}}
{{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/dist/starrr.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">


<style type="text/css">
    .header_title {
        font-family:Lato,Helvetica Neue,Arial,Helvetica,sans-serif !important;
        font-weight: 300 !important;
        margin-top: 50px !important;
        font-size: 30px !important;
        color: black !important;
    }
    .article p{
        font-family:Lato,Helvetica Neue,Arial,Helvetica,sans-serif !important;
        font-weight: 300 !important;
    }
    section.single article.main-article .main p {
        font-family:Lato,Helvetica Neue,Arial,Helvetica,sans-serif !important;
    
    }
    
    article footer .btn-primary{
        padding: 5px !important;
    }
    article footer .select_chapter{
        height: auto;
    }
    article footer .coling_chapters{
        padding: 0px  !important;
    }

</style>
@endsection

@section('content')
<section class="" style="background-color: #e1e1e1;margin-top: 40px">
            <div class="container">
                <div class="row col-md-offset-1 col-md-10 col-md-offset-2 col-md-10" style="background-color: white;padding-bottom: 40px">
                    <div class="col-md-12">
                        <article class="article main-article" >
                            <header align="center">
                                <p class="header_title">{{ $chapter->dnch_title }}</p>
                                <p style="margin-top: 30px"><dd style="font-size: 15px"> Ditulis Oleh  <a href="#">{{ $chapter->m_username }}</a></dd><tt style="color: grey">{{ date('d F Y ',strtotime($chapter->dnch_created_at)) }} pukul {{ date('h:i ',strtotime($chapter->dnch_created_at)) }} </tt></p>
                            </header>
                            <div class="main" {{-- style="padding: ;" --}}>
                                {!! $chapter->dnch_content !!}
                               <footer>
                                    <div class="col-md-3 col-sm-4 col-xs-4">
                                        <div class="pull-left">
                                            <button class="btn btn-primary" type="button"><i class="fas fa-arrow-alt-circle-left"></i>Back</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-4 col-xs-4 coling_chapters">
                                        <select class="form-control select_chapter">
                                            @foreach ($all_chapter as $index => $element)
                                                @if ($element->dnch_title == $chapter->dnch_title)
                                                    <option value="{{ $element->dnch_title }}" selected="" disabled="">{{ $index+1 }}&nbsp;&nbsp;&nbsp;{{ $element->dnch_title }}</option>
                                                @else
                                                    <option value="{{ $element->dnch_title }}">{{ $index+1 }}&nbsp;&nbsp;&nbsp;{{ $element->dnch_title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" col-md-3 col-sm-4 col-xs-4">
                                        <div class="pull-right">
                                            <button class="btn btn-primary" type="button"><i class="fas fa-arrow-alt-circle-right"></i>Next</button>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </article>
                        <div class="line">
                            <div>Author</div>
                        </div>
                        <div class="author">
                            {{-- <div class="container"> --}}
                                <figure>
                                    @if ($chapter->m_image == null)
                                        <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" />
                                    @else
                                        <img src="{{ asset('/storage/app/'.$chapter->m_image) }}?{{ time() }}" />
                                    @endif
                                </figure>
                                <div class="details">
                                    <div class="job">{{ $chapter->m_instagram }}</div>
                                    <h3 class="name">{{ $chapter->m_username }}</h3>
                                    <p>{!! $chapter->m_desc_short !!}</p>
                                    <ul class="social trp sm">
                                        <li>
                                            <a href="#" class="facebook">
                                                <svg><rect/></svg>
                                                <i class="ion-social-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <svg><rect/></svg>
                                                <i class="ion-social-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="googleplus">
                                                <svg><rect/></svg>
                                                <i class="ion-social-googleplus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            {{-- </div> --}}
                        </div>

                        <div class="line thin"></div>
                        <div class="comments" style="margin-top: -50px !important;">
                            <h4 class="title">{{-- 3 Responses  --}}</h4>
                            <div class="comment-list">
                            <form class="row">
                                <div class="col-md-12">
                                    <h4 class="title">Leave Your Response <a href="#">Write a Response</a></h4>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="message">Response <span class="required"></span></label>
                                    <textarea class="form-control" name="message" placeholder="Write your response ..."></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary">Send Response</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div {{-- class="col-md-12" --}}>
                              <div class="comments">
                                <div class="comment-list drop_here">
                                    @foreach ($chapter_comment as $element)
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
                                                    <h5 class="name">{{ $element->m_username }}</h5>
                                                    <div class="time">{{ date('d F Y',strtotime($element->dncc_created_at)) }} <small>{{ date('h:i:s A',strtotime($element->dncc_created_at)) }}</small></div>
                                                    <div class="description">
                                                        {{ $element->dncc_message }}
                                                    </div>
                                                    <footer>
                                                        <br>
                                                        <button type="button" class="btn btn-sm btn-primary reply_{{ $element->dncc_id }}" onclick="reply({{ $element->dncc_id }})"><i class="fas fa-share"></i> Reply</button>
                                                    </footer>
                                                </div>
                                            @foreach ($chapter_reply as $gg)
                                            @if ($gg->dnccdt_comment_id == $element->dncc_id)
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
                                                            <div class="time">{{ date('d F Y',strtotime($gg->dnccdt_created_at)) }} <small>{{ date('h:i:s A',strtotime($gg->dnccdt_created_at)) }}</small></div>
                                                            <div class="description">
                                                                {{ $gg->dnccdt_message }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            @endif
                                            @endforeach
                                            <div class="drop_reply_{{ $element->dncc_id }}">
                                                
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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

    $( window ).load(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         $.ajax({
            type: "post",
            url:baseUrl+'/chapter/viewer/'+('{{ $chapter->dnch_id }}'),
            success:function(data){
            },error:function(){
          }
        });
    });

    $( document ).ready(function() {
        $('.info').val('{{ ucwords($chapter->dn_title) }}');
    });

    if ($(window).width() < 500) {
       $('.main').css('padding','10px 0px 10px 0px');
    }
    else {
       $('.main').css('padding','10px 50px 10px 50px');
    }

</script>
@endsection
