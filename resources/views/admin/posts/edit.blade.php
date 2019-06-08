@extends('admin.layouts.app')

@push('styles')
 

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<!-- the font awesome icon library if using with `fas` theme (or Bootstrap 4.x). Note that default icons used in the plugin are glyphicons that are bundled only with Bootstrap 3.x. -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>

<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script -->
<style>
    .file-caption-main{
        display: none;
        visibility: hidden;
    }

    .input-file-row-1:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0;
}

.input-file-row-1{
    display: inline-block;
    margin-top: 25px;
    position: relative;
}

html[xmlns] .input-file-row-1{
    display: block;
}

* html .input-file-row-1 {
    height: 1%;
}

.upload-file-container { 
    position: relative; 
    width: 100px; 
    height: 137px; 
    overflow: hidden;   
    background: url(http://i.imgur.com/AeUEdJb.png) top center no-repeat;
    float: left;
    margin-left: 23px;
} 

.upload-file-container:first-child { 
    margin-left: 0;
} 

.upload-file-container > img {
    width: 93px;
    height: 93px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}

.upload-file-container-text{
    font-family: Arial, sans-serif;
    font-size: 12px;
    color: #719d2b;
    line-height: 17px;
    text-align: center;
    display: block;
    position: absolute; 
    left: 0; 
    bottom: 0; 
    width: 100px; 
    height: 35px;
}

.upload-file-container-text > span{
    border-bottom: 1px solid #719d2b;
    cursor: pointer;
}

.upload-file-container input  { 
    position: absolute; 
    left: 0; 
    bottom: 0; 
    font-size: 1px; 
    opacity: 0;
    filter: alpha(opacity=0);   
    margin: 0; 
    padding: 0; 
    border: none; 
    width: 100px;
    height: 137px;
    cursor: pointer;
}
</style>
@endpush



@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Редактировать Новость  {{ $post->title }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Назад</a>
        </div>
   </div>
        



{!! Form::open(array('route' => array('posts.update' , $post->id),'method'=>'PUT' , 'files'=> true)) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Заголовок:</strong>
            {!! Form::text('title', $post->title, array('placeholder' => 'title','class' => 'form-control' , 'id'=>'title')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Алиас:</strong>
            {!! Form::text('alias', $post->alias, array('placeholder' => 'alias','class' => 'form-control', 'id'=>'alias')) !!}
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Описание:</strong>
            {!! Form::text('desc', $post->desc, array('placeholder' => 'desc','class' => 'form-control')) !!}
        </div>
    </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Контент:</strong>
                {!! Form::textarea('content', $post->content, ['class' => 'form-control' , 'placeholder' => 'content' , 'id'=> 'visual_editor']) !!}
        </div>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <strong>Категории: (*ctrl для мультивыбора)</strong>
            Сейчас в категориях:
        @foreach($postCategory as $category)
              <span style="color:blue;"> {{$category}} </span>
            @endforeach
            {!! Form::select('categories[]', $categories,$postCategory, array('class' => 'form-control','multiple')) !!}

        </div>
    </div>

     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            {{-- 
<strong>Изображение:</strong> <div class="image_preview"></div> <br/>
            {!! Form::file('image') !!} <input type="file" name="pic[]" class="photo" id="imgInput" />
                --}} 

                    <fieldset>
                                        
                    <div class="input-file-row-1">
                    
                        <div class="upload-file-container">
                            @if(isset($post->img))
                                <img id="image" src="{{URL::asset('/storage/posts/'.$post->img)}} " alt="" />
                            @endif
                            <img id="image" src="" alt="" />
                            <div class="upload-file-container-text">
                               <strong>Изображение новости</strong>
                                
                                 {!! Form::file('image', array('name'=>'picture' , 'class'=> 'photo' , 'id'=> 'imgInput')) !!}
                            </div>
                        </div>              
                                        
                    </div>         
                </fieldset>
 {{--URL::asset($post->img)--}} 

        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Обновить</button>
    </div>
</div>
{!! Form::close() !!}


    </div>
</div>
@endsection

@push('scripts')

<script src="{{ asset('admin/ckeditor/ckeditor.js') }}" defer></script>
<script src="{{ asset('admin/ckeditor/AjexFileManager/ajex.js') }}" defer></script>

    <script type="text/javascript">


   //$(document).on('load', function() {
      $(document).ready(function () {

        /*$('input[name="image"]').on('change', function (e) {
            console.log($(this).val());
            $('.image_preview').html('<img src="'+$(this).val()+'" />');
        });*/

        function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInput").change(function(){
    readURL(this);
});


    

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var editor = CKEDITOR.replace('visual_editor', {
            height: 350,
            removePlugins: 'easyimage',
            filebrowserUploadUrl: '{{ route('upload',["_token" => csrf_token() ]) }}',
        });
        //AjexFileManager.init({returnTo: 'ckeditor', editor: editor});
        //$('#visual_editor').val(CKEDITOR.instances['visual_editor'].getData());
        CKEDITOR.instances['visual_editor'].on("blur", function () {
            var data = CKEDITOR.instances['visual_editor'].getData();
            $('#visual_editor').val(data);
            //console.log( $('#visual_editor').val());
        });

        CKEDITOR.on('instanceReady', function (ev) {
            ev.editor.dataProcessor.htmlFilter.addRules({
                elements: {
                    img: function (el) {
                        // Add bootstrap "img-responsive" class to each inserted image
                        el.addClass('img-responsive');

                        // Remove inline "height" and "width" styles and
                        // replace them with their attribute counterparts.
                        // This ensures that the 'img-responsive' class works
                        var style = el.attributes.style;

                        if (style) {
                            // Get the width from the style.
                            var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                                width = match && match[1];

                            // Get the height from the style.
                            match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                            var height = match && match[1];

                            // Replace the width
                            if (width) {
                                el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                                el.attributes.width = width;
                                delete el.attributes.width;
                            }

                            // Replace the height
                            if (height) {
                                el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                                el.attributes.height = height;
                                delete el.attributes.height;
                            }
                        }

                        // Remove the style tag if it is empty
                        if (el.attributes.style)
                            delete el.attributes.style;
                    }
                }
            });
        });


        /* Fields Translit Start */
        var ru2en = {
            ru_str: 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя(),.; "+/*?!@',
            en_str: ['a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
                'h', 'c', 'ch', 'sh', 'shh', '', 'i', '', 'je', 'ju', 'ja',
                'a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
                'h', 'c', 'ch', 'sh', 'shh', '', 'i', '', 'je', 'ju', 'ja',
                '', '', '', '', '', '-', '', '', '', '', '', '', ''],
            translit: function (org_str) {

                var tmp_str = "";
                for (var i = 0, l = org_str.length; i < l; i++) {
                    var s = org_str.charAt(i), n = this.ru_str.indexOf(s);
                    if (n >= 0) {
                        tmp_str += this.en_str[n];
                    }
                    else {
                        tmp_str += s;
                    }
                }
                return tmp_str.toLowerCase();
            }
        };

        function TranslitCustom(old_input, old_value, new_input, new_value, rewritemode = true) {
            //console.log(new_value, rewritemode);
            if (new_value != undefined) {
                //console.log('clear');
                new_input.val(ru2en.translit(old_value));
            }
        }


        $('#title').on('change keypress keyup keydown', function (e) {
            TranslitCustom($('#title'), $('#title').val(), $('#alias'), $('#alias').val());
        });//page post + project


        /* Fields Translit End */





});
    </script>
@endpush


