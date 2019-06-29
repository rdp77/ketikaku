@extends('layouts_backend._main_backend')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/normalize.css') }}" /> --}}
@section('extra_styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('design_frontend/input_file/css/demo.css') }}" /> --}}
<style type="text/css">
    .kuning{
      color: #ffd119;
      font-size: 14px;
    }
    .comment-widgets .comment-row{
        margin: 0px;
        padding-top: 3px;
        padding-bottom: 3px;

    }
</style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card  bg-light no-card-border">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="m-r-30">
                                <i class="fas fa-bell fa-lg"></i>
                            </div>
                            <div>
                                <h3 class="m-b-0">Notification Center !</h3>
                                <span>{{ date('F ,d Y') }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                    <!-- column -->
                   <div class="col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Notication Subscribe</h4>
                                <div class="feed-widget scrollable ps-container ps-theme-default ps-active-y" style="height:450px;" data-ps-id="e2d62cf6-60ba-6e02-f15e-23bda1d3fd45">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                       @foreach ($notif_subs as $element)
                                        <li class="feed-item">
                                            <div class="m-r-20">
                                                @if ($element->image == null)
                                                    <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" alt="user"  width="50" height="50" class="rounded-circle"{{-- width="150" --}} />
                                                @else
                                                    <img src="{{ asset('storage/app/'.$element->image) }}" style="overflow: hidden;" alt="user" width="50" height="50" class="rounded-circle">
                                                @endif
                                            </div>
                                            <a href="#"><b>{{ $element->user }}</b> Has Msubscribe Novel <b>{{ $element->tittles }}</b></a>
                                            <span class="ml-auto font-12 text-muted">{{ date('d M Y',strtotime($element->upload_date)) }}</span>
                                        </li>
                                       @endforeach
                                    </ul>
                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -18px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 18px; right: 3px; height: 450px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 18px; height: 432px;"></div></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Notication Followers</h4>
                                <div class="feed-widget scrollable ps-container ps-theme-default ps-active-y" style="height:450px;" data-ps-id="e2d62cf6-60ba-6e02-f15e-23bda1d3fd45">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                       @foreach ($notif_follow as $element)
                                        <li class="feed-item">
                                            <div class="m-r-20">
                                                @if ($element->image == null)
                                                    <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" alt="user"  width="50" height="50" class="rounded-circle"{{-- width="150" --}} />
                                                @else
                                                    <img src="{{ asset('storage/app/'.$element->image) }}" style="overflow: hidden;" alt="user" width="50" height="50" class="rounded-circle">
                                                @endif
                                            </div>
                                            <a href="#"><b>{{ $element->user }}</b> Has Following you <b></b></a>
                                            <span class="ml-auto font-12 text-muted">{{ date('d M Y',strtotime($element->upload_date)) }}</span>
                                        </li>
                                       @endforeach
                                    </ul>
                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -18px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 18px; right: 3px; height: 450px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 18px; height: 432px;"></div></div></div>
                            </div>
                        </div>
                    </div>
        </div>

        <div class="row">
                    <!-- column -->
                   <div class="col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Notication Update Novel</h4>
                                <div class="feed-widget scrollable ps-container ps-theme-default ps-active-y" style="height:450px;" data-ps-id="e2d62cf6-60ba-6e02-f15e-23bda1d3fd45">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                       @foreach ($notif_upload_novel as $element)
                                        <li class="feed-item">
                                            <div class="m-r-20">
                                                @if ($element->image == null)
                                                    <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" alt="user"  width="50" height="50" class="rounded-circle"{{-- width="150" --}} />
                                                @else
                                                    <img src="{{ asset('storage/app/'.$element->image) }}" style="overflow: hidden;" alt="user" width="50" height="50" class="rounded-circle">
                                                @endif
                                            </div>
                                            <a href="#"><b>{{ $element->user }}</b> Has Upload Novel <b>{{ $element->tittles }}</b></a>
                                            <span class="ml-auto font-12 text-muted">{{ date('d M Y',strtotime($element->upload_date)) }}</span>
                                        </li>
                                       @endforeach
                                    </ul>
                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -18px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 18px; right: 3px; height: 450px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 18px; height: 432px;"></div></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Notication Update Chapter</h4>
                                <div class="feed-widget scrollable ps-container ps-theme-default ps-active-y" style="height:450px;" data-ps-id="e2d62cf6-60ba-6e02-f15e-23bda1d3fd45">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                       @foreach ($notif_upload_chapter as $element)
                                        <li class="feed-item">
                                            <div class="m-r-20">
                                                @if ($element->image == null)
                                                    <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" alt="user"  width="50" height="50" class="rounded-circle"{{-- width="150" --}} />
                                                @else
                                                    <img src="{{ asset('storage/app/'.$element->image) }}" style="overflow: hidden;" alt="user" width="50" height="50" class="rounded-circle">
                                                @endif
                                            </div>
                                            <a href="#"><b>{{ $element->user }}</b> Has Updated {{ $element->tittles_chapter }} from novel {{ $element->tittles }} <b></b></a>
                                            <span class="ml-auto font-12 text-muted">{{ date('d M Y',strtotime($element->upload_date)) }}</span>
                                        </li>
                                       @endforeach
                                    </ul>
                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -18px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 18px; right: 3px; height: 450px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 18px; height: 432px;"></div></div></div>
                            </div>
                        </div>
                    </div>
        </div>
</div>

        @endsection

@section('extra_scripts')
<script type="text/javascript">



</script>

@endsection
