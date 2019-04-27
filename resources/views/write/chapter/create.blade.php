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
                                    <div class="form-group row">
                                        <label for="dn_title" class="col-2 col-form-label">Title Novel</label>
                                        <div class="col-10">
                                            <input class="form-control" value="{{ $title->dn_id }}" type="hidden" readonly="" name="dnch_ref_id" id="dnch_ref_id">
                                            <input class="form-control" value="{{ $title->dn_title }}" type="text" readonly="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dnch_title" class="col-2 col-form-label">Title Chapter</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" name="dnch_title" id="dnch_title">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <textarea id="mymce" name="dnch_content"></textarea>
                                    <br>

                                     <div class="text-right">
                                        <button class="btn btn-primary button_click" value="publish" type="button" onclick="save(1)"><i class="fas fa-share"> </i> Publish</button>
                                        <button class="btn btn-warning button_click" value="draft" type="button" onclick="save(2)"><i class="fas fa-share"> </i> Draft</button>
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
                    plugins: "image,paste",
                    paste_data_images: true,
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

        function save(argument) {

            if (argument == 1) {
                status = 'publish';
            }else if (argument == 2){
                status = 'draft';
            }

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
                  var id = $("#dnch_ref_id").val();
                  tinyMCE.triggerSave();
                  var form  = $('#save');
                  formdata = new FormData(form[0]);
                  formdata.append('dnch_status',status);


                  $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "post",
                        url: baseUrl+'/write'+'/write_chapter/save/'+id,
                        data: formdata ? formdata : form.serialize(),
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

                        location.href = baseUrl+'/write'+'/write_chapter/'+id;
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



    

       