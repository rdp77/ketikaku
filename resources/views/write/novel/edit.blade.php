@extends('layouts_backend._main_backend')

@section('extra_styles')
<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        background-color: #4798e8 !important;
    }
    .select2 {
        width: 100% !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        background-color:#4798e8 !important;
    }
</style>
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
                                        <input type="hidden" value="{{ $data->dn_id }}" name="dn_id">
                                        <label for="dn_title" class="col-2 col-form-label">Title</label>
                                        <div class="col-10">
                                            <input class="form-control" value="{{ $data->dn_title }}" type="text" name="dn_title" id="dn_title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dn_title" class="col-2 col-form-label">Genre</label>
                                        <div class="col-10">
                                            <select class="form-control select2" name="dn_category">
                                            @foreach ($cat as $element)
                                                @if ($data->dn_category == $element->mc_id)
                                                  <option value="{{ $element->mc_id }}" selected="">{{ $element->mc_name }}</option>
                                                @else
                                                  <option value="{{ $element->mc_id }}">{{ $element->mc_name }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dn_title" class="col-2 col-form-label">Tags</label>
                                        <div class="col-10">
                                            <select class="form-control" multiple="" id="select2-with-tags" name="dn_tags[]" style="width: 100%;height: 36px;">
                                            @foreach ($tags as $element)
                                              <option value="{{ $element->dnt_name }}" selected="">{{ $element->dnt_name }}</option>
                                            @endforeach
                                            </select>

                                            <input type="hidden" class="dn_tags_remove" name="dn_tags_remove[]">
                                            <input type="hidden" class="dn_tags_add" name="dn_tags_add[]">

                                        </div>
                                    </div>
                                    <div class="row clearfix preview_div">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label class="form-control-label" for="caption_by">Photo</label>
                                        </div>
                                        <br>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="file-upload upl_1" style="width: 100%;">
                                                <div class="file-select">
                                                    <div class="file-select-button fileName" >Image</div>
                                                    <div class="file-select-name noFile tag_image_1" >Cover Image</div> 
                                                    <input type="file" class="chooseFile" name="dn_cover">
                                                    <input type="hidden" class="chooseFile_null" name="dn_cover_null">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label class="form-control-label" for="caption_by"></label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="preview_td">
                                                <img 
                                                @if ($data->dn_cover == null)

                                                @else
                                                    src="{{ asset('/storage/app/'.$data->dn_cover) }}?{{ time() }}" 
                                                @endif
                                                 style="width: 25%;border:1px solid pink" class="output" >
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <textarea id="mymce" name="dn_description">{{ $data->dn_description }}</textarea>
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
        $('.chooseFile').bind('change', function () {
            var filename = $(this).val();
            var fsize = $(this)[0].files[0].size;
            if(fsize>1048576) //do something if file size more than 1 mb (1048576)
            {
              iziToast.warning({
                icon: 'fa fa-times',
                message: 'File Is To Big!',
              });
              return false;
            }
            var parent = $(this).parents(".preview_div");
            if (/^\s*$/.test(filename)) {
                $(parent).find('.file-upload').removeClass('active');
                $(parent).find(".noFile").text("No file chosen..."); 
            }
            else {
                $(parent).find('.file-upload').addClass('active');
                $(parent).find(".noFile").text(filename.replace("C:\\fakepath\\", "")); 
            }
            load(parent,this);
        });

        function load(parent,file) {
            var fsize = $(file)[0].files[0].size;
            if(fsize>2048576) //do something if file size more than 1 mb (1048576)
            {
              iziToast.warning({
                icon: 'fa fa-times',
                message: 'File Is To Big!',
              });
              return false;
            }
            var reader = new FileReader();
            reader.onload = function(e){
                $(parent).find('.output').attr('src',e.target.result);
            };
            reader.readAsDataURL(file.files[0]);
        }

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
                  tinyMCE.triggerSave();
                  var comment = $("#mytextarea").val();

                  var form  = $('#save');
                  formdata = new FormData(form[0]);
                  formdata.append('dn_status',status);


                  $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "post",
                        url: ('{{ route('write_novel_update') }}'),
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

                            location.href = '{{ route('write_novel') }}'
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