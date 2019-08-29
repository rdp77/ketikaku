<article class="article main-article">
    <header>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            @foreach ($data as $element)
            <article class="article col-md-3 col-xs-6" style="margin-top: 20px">
                <div class="inner">
                    <figure>
                        <a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}">
                            @if ($element->dn_cover == null)
                                <img src="{{ asset('assets/images/noimage.jpg' ) }}" height="300px" alt="{{ $element->dn_title }}">
                            @else
                                <img src="{{ asset('storage/app/'.$element->dn_cover ) }}" height="300px" alt="{{ $element->dn_title }}">
                            @endif
                        </a>
                    </figure>
                    <div class="padding">
                        <h6 style="font-size: 12px"><a href="{{ asset('/book/'.$element->dn_id.'/'.str_replace(" ","-",$element->dn_title)) }}"><input type="text" readonly="" style="width: 100%;border: none;cursor: pointer;" value="{{ $element->dn_title }}" name=""></a></h6>
                        <footer>
                            <span class="love active"><i class="ion-android-favorite"></i> <div class="liked">@if ($element->liked == null) 0 @else {{ $element->liked }} @endif</div></span>
                            <span class="love active"><i class="fas fa-users"></i> <div class="subscribed">@if ($element->subscribed == null) 0 @else {{ $element->subscribed }} @endif</div></span>
                            <span class="love active"><i class="fas fa-eye"></i> <div class="viewer">@if ($element->viewer == null) 0 @else {{ $element->viewer }} @endif</div></span>
                            {{-- <a class="btn btn-primary more" href="{{ route('frontend_book',['id'=>str_replace(" ","-",$element->dn_title)]) }}">
                                <div>More</div>
                                <div><i class="ion-ios-arrow-thin-right"></i></div>
                            </a> --}}
                        </footer>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
    </header>
</article>