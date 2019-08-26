@extends('layouts_backend._main_backend')

@section('extra_styles')
@endsection

@section('content')
   <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Daftar Bab dari Tulisan <b>{{ $title }}</b> </h4>
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
                            <li class="breadcrumb-item" aria-current="page">Daftar Karya</li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Bab</li>
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
                    <h4 class="m-b-0 text-white">Daftar Bab</h4></div>
                <div class="card-body">
                <div class="container-fluid row">
                    <div class="mb-3 col-sm-10">
                    <a href="{{ route('write_novel') }}" class="btn waves-effect waves-light btn-md btn-danger"><i class="fas fa-arrow-circle-left"></i> Daftar Karya</a>
                    </div>
                    <div  class="mb-3 text-right col-sm-2">
                    <a href="{{ route('write_chapter_create',['id'=>$id]) }}" class=" btn waves-effect waves-light btn-md btn-success"><i class="fas fa-plus-circle"></i> Tambahkan Bab Cerita</a>
                    </div>
                </div>
                   <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Bab</th>
                                    <th>Tgl Dibuat</th>
                                    <th>Status</th>
                                    <th>Dilihat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $element)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $element->dnch_title }}</td>
                                        <td>{{ date('d F Y  -  h:i:s',strtotime($element->dnch_created_at)) }}</td>
                                        <td>@if ($element->dnch_status == 'publish')
                                                <span class="label label-rounded label-success">Diterbitkan</span>
                                            @else
                                                <span class="label label-rounded label-warning">Draf</span>
                                            @endif
                                        </td>
                                        <td>{{ $element->dnch_viewer }}</td>
                                        <td>
                                            <button onclick="baca_chapter('{{ $element->dn_title }}','{{ $element->dnch_title }}',{{ $element->dnch_id }})" class="btn btn-primary btn-sm baca" 
                                            data-name1="{{ $element->dn_title }}" 
                                            data-name="{{ $element->dnch_title }}" 
                                            value="{{ $element->dnch_id }}" ><i class="fa fa-book"></i></button>
                                            <a class="btn waves-effect waves-light btn-sm btn-warning" href="{{ route('write_chapter_edit', ['id' => $element->dnch_id]) }}"><i class="fas fa-pencil-alt"></i></a>
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-danger delete" value="{{ $element->dnch_id }}" data-ref="{{ $element->dnch_ref_id }}" onclick="deletes({{ $element->dnch_id }},{{ $element->dnch_ref_id }})" ><i class="fas fa-times"></i></button>
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

        function deletes(argument,argument2) {
        var this_val = argument;
        var ref = argument2;

       iziToast.question({
                theme: 'dark',
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                backgroundColor: '#1f1f22',
                icon: 'fa fa-info-circle',
                title: 'Apakah anda yakin ?!',
                message: '',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                buttons: [
                    ['<button style="background-color:red;"> Hapus </button>', function (instance, toast) {

                        $.ajax({
                            url  : baseUrl+'/write'+'/write_chapter/delete/'+this_val,
                            data : '&dnch_ref_id='+ref,
                            type :'get',
                            success:function(data){
                                if (data.status == 'sukses') {
                                    iziToast.success({position: 'topRight',message: 'Bab Berhasil Dihapus!'});
                                    location.reload();
                                }else{
                                    iziToast.error({position: 'topRight',message: 'Terjadi Kesalahan.Cek Koneksi/Lapor Admin! '});
                                }
                            },
                            error:function(data){

                            }

                        })

                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }, true], // true to focus
                    ['<button> Batal </button>', function (instance, toast) {
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
        
    };
    function baca_chapter(creator,datass,id) {
        var creator = ('{{ $username }}');
        var res = datass.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
        window.location.href = baseUrl + '/chapter/'+creator+'/'+res+'/'+id
     }
    </script>

@endsection



    

       