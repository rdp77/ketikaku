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
    .starrr { display: inline-block; }

    .starrr i {
      font-size: 25px;
      padding: 0 1px;
      cursor: pointer;
      color: #ffd119;
    }
</style>
@endsection

@section('content')
<section class="single">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 sidebar" id="sidebar">
                     
                        <aside>
                            <h1 class="aside-title">List Chapter</h1>
                            <div class="aside-body">
                                @foreach ($all_chapter as $element)
                                @if ($element->dnch_id == $chapter->dnch_id)
                                    <article class="article-mini" style="background-color: #eaeaea;padding: 7px">
                                        <div class="inner">
                                            <div>
                                                <h1><a href="{{ route('frontend_chapter',[str_replace(" ","-",$element->dnch_title)]) }}" class="baca">{{ $element->dnch_title }}</a></h1>
                                                <div class="detail">
                                                    {{-- <div class="category"><a href="category.html">Lifestyle</a></div> --}}
                                                    <div class="time">{{ date('d F ,Y',strtotime($chapter->dnch_created_at)) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @else
                                    <article class="article-mini" style="padding: 7px">
                                        <div class="inner">
                                            <div>
                                                <h1><a href="{{ route('frontend_chapter',[str_replace(" ","-",$element->dnch_title)]) }}" class="baca">{{ $element->dnch_title }}</a></h1>
                                                <div class="detail">
                                                    {{-- <div class="category"><a href="category.html">Lifestyle</a></div> --}}
                                                    <div class="time">{{ date('d F ,Y',strtotime($chapter->dnch_created_at)) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endif
                                @endforeach
                            </div>
                        </aside>
                     
                    </div>
                    <div class="col-md-9">
                        <ol class="breadcrumb">
                          <li><a href="{{ url('/') }}">Home</a></li>
                          <li><a href="#">{{ $chapter->dn_title }}</a></li>
                          <li class="active">{{ $chapter->dnch_title }}</li>
                        </ol>
                        <article class="article main-article">
                            <header>
                                <h1>{{ $chapter->dnch_title }}</h1>
                                <ul class="details">
                                    <li>Posted on {{ date('d F ,Y',strtotime($chapter->dnch_created_at)) }}</li>
                                   
                                    <li>By <a href="#">{{ $chapter->m_username }}</a></li>
                                </ul>
                            </header>
                            <div class="main">
                               <p>
                                   {!! $chapter->dnch_content !!}
                               </p>
                            </div>
                           
                        </article>
                        
                        <div class="line">
                            <div>Author</div>
                        </div>
                        <div class="author">
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
                        </div>
                        <div class="line thin"></div>
                        <div class="comments">
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
                                                        {{-- <a href="#">Reply</a> --}}
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
        // alert('a');
        $.ajax({
            
        })
    });

</script>
@endsection
