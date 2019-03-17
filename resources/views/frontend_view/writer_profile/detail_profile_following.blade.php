@foreach ($followed as $element)
<div class="col-md-4" {{-- @if ($index == 0 || $index == 1 || $index == 2) @else --}} style="margin-top: 20px" {{-- @endif --}}>
    <div class="featured-author">
        <div class="featured-author-inner">
            <div class="featured-author-cover" style="background-image: url('http://localhost:7777/ketikaku/assets/images/news/img15.jpg');">
                <div class="featured-author-center">
                    <figure class="featured-author-picture">
                            @if ($element->m_image == null)
                                <img src="{{ asset('assets/images/noimage.jpg' ) }}" alt="{{ $element->m_image }}">
                            @else
                                <img src="{{ asset('storage/app/'.$element->m_image ) }}" alt="{{ $element->m_image }}">
                            @endif
                    </figure>
                    <div class="featured-author-info">
                        <h2 class="name">{{ ucwords($element->m_username) }}</h2>
                        <div class="desc"></div>
                    </div>
                </div>
            </div>
            <div class="featured-author-body">
                <div class="featured-author-count">
                    <div class="item">
                        <a href="#">
                            <div class="name">Novel </div>
                            <div class="value">{{ $element->novel > 0 ? $element->novel : 0}}</div>                                                        
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="name">Follower </div>
                            <div class="value">{{ $element->followers > 0 ? $element->followers : 0}}</div>                                                        
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="name">Following</div>
                            <div class="value">{{ $element->following > 0 ? $element->following : 0}}</div>                                                      
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
