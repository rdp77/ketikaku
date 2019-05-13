@extends('layouts_backend._main_backend')

@section('extra_styles')
@endsection

@section('content')
   <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Create Novel</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">write_novel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <form id="save">

                                    {{--  --}}

                                        <input type="hidden" name="mc_id" id="mc_id" value="{{ $data->mc_id }}">

                                    {{--  --}}
                                    <div class="form-group row">
                                        <label for="mc_name" class="col-2 col-form-label">Cat Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" name="mc_name" id="mc_name" value="{{ $data->mc_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mc_name" class="col-2 col-form-label">Cat Color text</label>
                                        <div class="col-10">
                                            <input type="color" value="{{ $data->mc_color }}" name="mc_color" id="mc_color">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mc_name" class="col-2 col-form-label">Cat Background Color</label>
                                        <div class="col-10">
                                            <input type="color" value="{{ $data->mc_bgcolor }}" name="mc_bgcolor" id="mc_bgcolor">
                                        </div>
                                    </div>
                                    

                                     <div class="text-right">
                                        <button class="btn btn-primary" type="button" onclick="save()"><i class="fas fa-share"> </i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection

@section('extra_scripts')    
    <script type="text/javascript">
            // $(document).ready(function() {

            if ($("#mymce").length > 0) {
                tinymce.init({
                    selector: "textarea#mymce",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }
        // });

        function save() {
           iziToast.show({
            overlay: true,
            close: false,
            timeout: 20000, 
            color: 'dark',
            icon: 'fas fa-question-circle',
            title: 'Save Data!',
            message: 'Apakah Anda Yakin ?!',
            position: 'center',
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
            [
                '<button style="background-color:#17a991;color:white;">Save</button>',
                function (instance, toast) {
                  tinyMCE.triggerSave();
                  var comment = $("#mytextarea").val();
                  var id = $("#mc_id").val();
                  var form_save = $('#save').serialize();

                  $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "get",
                        url:baseUrl+'/master'+'/master_category/update/'+id,
                        data: form_save,
                        processData: false,
                        contentType: false,
                      success:function(data){
                        if (data.status == 'sukses') {
                            iziToast.success({
                                icon: 'fa fa-save',
                                position:'topRight',
                                title: 'Success!',
                                message: 'Data Berhasil Disimpan!',
                            });

                        location.href = baseUrl+'/master'+'/master_category';
                        }else if (data.status == 'ada') {
                            iziToast.warning({
                                icon: 'fa fa-save',
                                position:'topRight',
                                title: 'Error!',
                                message:'Level Sudah Terpakai',
                            });

                        }
                      },error:function(){
                        iziToast.error({
                            icon: 'fa fa-info',
                            position:'topRight',
                            title: 'Error!',
                            message: data.message,
                        });
                      }
                    });
                    instance.hide({
                        transitionOut: 'fadeOutUp'
                    }, toast);
                }
            ],
            [
                '<button style="background-color:#d83939;color:white;">Cancel</button>',
                function (instance, toast) {
                  instance.hide({
                    transitionOut: 'fadeOutUp'
                  }, toast);
                }
              ]
            ]
        });
        }

    </script>

@endsection



    

       