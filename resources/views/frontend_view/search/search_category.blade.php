
<style type="text/css">
    .kuning{
      color: #ffd119;
      font-size: 14px;
    }
    .article .padding{
        padding: 10px 10px 50px !important;
    }
    .love i:before{
        font-size: 20px !important;
    }
    .love div{
        margin-top: 1px !important;
    }
</style>

<section class="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="line">
                            <div>Hasil Search Category <b>'{{ $ss->mc_name }}'</b></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    @foreach ($search_story as $element)
                                    <article class="article col-md-3 col-xs-6">
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
                                                    <span class="love active"><i class="fas fa-eye"></i> <div class="viewer">@if ($element->viewer == null) 0 @else 
                                                        @php
                                                        $n = $element->viewer;
                                                        $precision = 1; 
                                                        if ($n < 900) {
                                                            // 0 - 900
                                                            $n_format = number_format($n, $precision);
                                                            $suffix = '';
                                                        } else if ($n < 900000) {
                                                            // 0.9k-850k
                                                            $n_format = number_format($n / 1000, $precision);
                                                            $suffix = 'K';
                                                        } else if ($n < 900000000) {
                                                            // 0.9m-850m
                                                            $n_format = number_format($n / 1000000, $precision);
                                                            $suffix = 'M';
                                                        } else if ($n < 900000000000) {
                                                            // 0.9b-850b
                                                            $n_format = number_format($n / 1000000000, $precision);
                                                            $suffix = 'B';
                                                        } else {
                                                            // 0.9t+
                                                            $n_format = number_format($n / 1000000000000, $precision);
                                                            $suffix = 'T';
                                                        }

                                                        if ( $precision > 0 ) {
                                                            $dotzero = '.' . str_repeat( '0', $precision );
                                                            $n_format = str_replace( $dotzero, '', $n_format );
                                                        }
                                                        echo($n_format.$suffix);
                                                        @endphp
                                                        @endif</div></span>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                    
                                </div>
                               {{--  @if (count($search_story) >= 8)
                                <div>
                                   <button class="btn btn-primary load_more_official"><i class="fas fa-arrow-right"></i>Load More</button>
                                </div>
                                @endif --}}
                            </div>
                        </div>
                        
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
           
        </div>
    </div>

        </section>
