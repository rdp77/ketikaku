@extends('layouts_frontend._main_frontend')

@section('extra_style')
{{-- <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet"> --}}
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/dist/starrr.css') }}">


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
<section class="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-12 col-md-12">
                        <img src="https://cdn.storial.co/book_front/26998-9f820fdcc293c6a2d38e01c237ae005164fe63d7.jpeg">
                    </div>

                    <div class="col-md-6">
                        <h5>
                            <div class="text">{{ $book->dn_title }}</div>
                        </h5>
                        <table width="100%">
                            <tr style="height: 60px">
                                <td valign="middle" width="30%" style="border-top:none;border-bottom:1px solid #dddddd">Status</td>
                                <td valign="middle" style="border-top:none;border-bottom:1px solid #dddddd">-</td>
                            </tr>
                            <tr style="height: 60px" >
                                <td valign="middle" style="border-bottom:1px solid #dddddd">Kategori</td>
                                <td style="border-bottom:1px solid #dddddd">-</td>
                            </tr>
                            <tr style="height: 60px">
                                <td valign="middle" style="border-bottom:1px solid #dddddd">Ditulis Oleh</td>
                                <td style="border-bottom:1px solid #dddddd"><a href="{{ route('profile_frontend',['name'=>$book->name]) }}">{{ $book->name }}</a></td>
                            </tr>
                            <tr style="height: 60px">
                                <td valign="middle" style="border-bottom:1px solid #dddddd">Diterbitkan</td>
                                <td style="border-bottom:1px solid #dddddd">{{ date('d F Y , h.i',strtotime($book->dn_created_at)) }}</td>
                            </tr>
                        </table>            
                    </div>

                    <div class="col-md-3">
                        <div class="featured-author">
                                    <div class="featured-author-inner">
                                        <div class="featured-author-cover" style="background-image: url('{{ asset('assets/images/news/img15.jpg') }}');">
                                            <div class="badges">
                                                <div class="badge-item"><i class="ion-star"></i> Official</div>
                                            </div>
                                            <div class="featured-author-center">
                                                <figure class="featured-author-picture">
                                                    <img src="{{ asset('assets/images/img01.jpg"') }} alt="Sample Article">
                                                </figure>
                                                <div class="featured-author-info">
                                                    <h2 class="name">John Doe</h2>
                                                    <div class="desc">@JohnDoe</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="featured-author-body">
                                            <div class="featured-author-count">
                                                <div class="item">
                                                    <a href="#">
                                                        <div class="name">Follower </div>
                                                        <div class="value">208</div>                                                        
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="#">
                                                        <div class="name">Book</div>
                                                        <div class="value">3,729</div>                                                      
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="#">
                                                        <div class="icon">
                                                            <div>More</div>
                                                            <i class="ion-chevron-right"></i>
                                                        </div>                                                      
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="featured-author-quote">
                                                "Eur costrict mobsa undivani krusvuw blos andugus pu aklosah"
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     
                    </div>

                    <div class="col-md-12" style="background-color: #efefef;margin-top: 40px;padding: 20px 0px 0px 30px">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">DESKRIPSI</a></li>
                        <li><a data-toggle="tab" href="#menu1">BAB CERITA</a></li>
                        <li><a data-toggle="tab" href="#menu2">ULASAN</a></li>
                      </ul>

                      <div class="tab-content">
                        <div id="home" class="tab-pane fade in active" style="font-size: 15px;margin-top: 40px">
                            <div class="col-md-offset-5">
                            @if(Auth::user() != null)
                            <h5>Click to rate:</h5>
                            <div class="starrr"></div>
                            <div>&nbsp;
                              <span class='your-choice-was' style='display: none;'>
                                Your rating was <span class='choice'></span>.
                              </span>
                            </div>
                            @else
                                Anda Harus Login terlebih dahulu  <a href="" class="btn btn-primary btn-sm">Login</a>
                            @endif
                            </div>
                              {!! $book->dn_description !!}
                        </div>
                        <div id="menu1" class="tab-pane fade" style="margin-top: 40px">
                            <table class="table" style="width:100%" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Judul Chapter</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($chapter as $index => $element)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $element->dnch_title }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-book"></i> Baca</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="menu2" class="tab-pane fade" style="margin-top: 40px">
                          
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="best-of-the-week">
            <div class="container">
                <h1><div class="text">Best Of The Week</div>
                 
                </h1>
            </div>
        </section>
@endsection

@section('extra_scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/dist/starrr.js') }}"></script>
<script type="text/javascript">
    
    // $(document).ready( function () {
     $('#myTable').DataTable({
        info: false,
        lengthChange: false,
        searching:false

     });
    // } );
     $('.starrr').starrr({
      change: function(e, value){
        if (value) {
          $('.your-choice-was').show();
          $('.choice').text(value);
        } else {
          $('.your-choice-was').hide();
        }
      }
    });



</script>
@endsection
