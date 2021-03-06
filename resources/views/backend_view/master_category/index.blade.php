@extends('layouts_backend._main_backend')

@section('extra_styles')
@endsection

@section('content')
   <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card border-success">
                <div class="card-header bg-success">
                    <h4 class="m-b-0 text-white">Card Title</h4></div>
                <div class="card-body">
                <div class="container-fluid row">
                    <div class="mb-3 col-sm-11">
                    {{-- <a href="{{ route('write_novel') }}" class="btn waves-effect waves-light btn-md btn-danger"><i class="fas fa-arrow-circle-left"></i> Back</a> --}}
                    </div>
                    <div  class="mb-3 text-right col-sm-1">
                    <a href="{{ route('master_category_create') }}" class=" btn waves-effect waves-light btn-md btn-success"><i class="fas fa-plus-circle"></i> Add Data</a>
                    </div>
                </div>
                   <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $element)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>
                                            <div class="badge" style="font-size: 15px;background-color: {{ $element->mc_bgcolor }};color:{{ $element->mc_color }}">
                                                <div class="badge-item"> {{ $element->mc_name }}</div>
                                            </div></td>
                                        <td>
                                            <a class="btn waves-effect waves-light btn-sm btn-warning" href="{{ route('master_category_edit',['id'=>$element->mc_id]) }}"><i class="fas fa-chevron-circle-right"></i></a>
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-danger delete" value="{{ $element->mc_id }}"><i class="fas fa-times-circle"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
              
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('extra_scripts')
    <script type="text/javascript">
        $('#zero_config').DataTable();
        $( document ).ready(function() {

        $('.delete').on('click', function () {

       var this_val = $(this).val();
       var ref = $(this).data('ref');

       console.log(ref);

       iziToast.question({
                theme: 'dark',
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                backgroundColor: '#1f1f22',
                icon: 'fa fa-info-circle',
                title: 'Are you Sure!',
                message: '',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                buttons: [
                    ['<button style="background-color:red;"> Delete </button>', function (instance, toast) {

                        $.ajax({
                            url  : baseUrl+'/write'+'/write_chapter/delete/'+this_val,
                            type :'get',
                            success:function(data){
                                if (data.status == 'sukses') {
                                    iziToast.success({position: 'topRight',message: 'Successfully Deleted!'});
                                    // location.href = baseUrl+'/write'+'/write_chapter/'+id
                                    location.reload();
                                }else{
                                    iziToast.error({position: 'topRight',message: 'Error Check your data! '});
                                }
                            },
                            error:function(data){

                            }

                        })

                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }, true], // true to focus
                    ['<button> Cancel </button>', function (instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy){
                                console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                            }
                        }, toast, 'buttonName');
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }]
                ],
                onOpening: function(instance, toast){
                    console.info('callback abriu!');
                },
                onClosing: function(instance, toast, closedBy){
                    console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                }
            });
        
    });
});

    </script>

@endsection



    

       