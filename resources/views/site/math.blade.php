@extends('site.layouts.app')



@section('content')
    <style>
        .w3agile_blog_left{display:none!important
        }
        iframe {
            width: 100%!important;
            height: 750px!important;;
        }
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <iframe src="{{URL('Counting/index.html')}}" frameborder="0"></iframe>
            </div>
        </div>
    </div>


@endsection