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
    section.single article.main-article .main{
        padding: 10px 50px 10px 50px;
    }

</style>
@endsection

@section('content')
<section class="single" style="background-color: #e1e1e1;margin-top: 40px">

            <div class=" container " >
                <div class="row col-md-offset-1 col-md-10" style="background-color: white;">
                    <div class="col-md-12">
                        
                        <article class="article main-article" >
                            <header align="center">
                                <p class="header_title">{{ $chapter->dnch_title }}</p>

                                <p style="margin-top: 30px"><dd style="font-size: 15px"> Ditulis Oleh  <a href="#">{{ $chapter->m_username }}</a></dd><tt style="color: grey">{{ date('d F Y ',strtotime($chapter->dnch_created_at)) }} pukul {{ date('h:i ',strtotime($chapter->dnch_created_at)) }} </tt></p>
                            </header>
                            <div class="main">
                               <p>
                                   {!! $chapter->dnch_content !!}
                               </p>
                            </div>
                           {{--  <footer>
                                <div class="col">
                                    <ul class="tags">
                                        <li><a href="#">Free Themes</a></li>
                                        <li><a href="#">Bootstrap 3</a></li>
                                        <li><a href="#">Responsive Web Design</a></li>
                                        <li><a href="#">HTML5</a></li>
                                        <li><a href="#">CSS3</a></li>
                                        <li><a href="#">Web Design</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1220</div></a>
                                </div>
                            </footer> --}}
                        </article>
                        {{-- <div class="sharing">
                        <div class="title"><i class="ion-android-share-alt"></i> Sharing is caring</div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="facebook">
                                        <i class="ion-social-facebook"></i> Facebook
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="twitter">
                                        <i class="ion-social-twitter"></i> Twitter
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="googleplus">
                                        <i class="ion-social-googleplus"></i> Google+
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="skype">
                                        <i class="ion-ios-email-outline"></i> Email
                                    </a>
                                </li>
                                <li class="count">
                                    20
                                    <div>Shares</div>
                                </li>
                            </ul>
                        </div> --}}
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
                                {{-- <div class="form-group col-md-4">
                                    <label for="name">Name <span class="required"></span></label>
                                    <input type="text" id="name" name="" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email <span class="required"></span></label>
                                    <input type="email" id="email" name="" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="website">Website</label>
                                    <input type="url" id="website" name="" class="form-control">
                                </div> --}}
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

    $( document ).ready(function() {
        $('.info').html('<i class="fas fa-book"></i> &nbsp;&nbsp;'+'{{ ucwords($chapter->dn_title) }}'+' oleh '+'{{ ucwords($chapter->m_username) }}');
    });

</script>
@endsection
