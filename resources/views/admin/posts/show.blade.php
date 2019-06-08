@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Просмотр новости</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Назад</a>
        </div>
   </div>
        
 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>id:</strong>
            {{ $post->id }}
        </div>
        <div class="form-group">
            <strong>Имя:</strong>
            {{ $post->title }}
        </div>
        <div class="form-group">
            <strong>алиас:</strong>
            {{ $post->alias }}
        </div>
        <div class="form-group">
            <strong>Описание:</strong>
            {{ $post->desc }}
        </div>
        <div class="form-group">
            <strong>Контент:</strong>
            {!! $post->content !!}
        </div>
        <div class="form-group">
            <strong>Картинка:</strong>
            @if ($post->img)
                            <img style="height: 50px;" src="{{URL::asset('/storage/posts/'.$post->img)}}">
                            @endif
        </div>
    </div>
    
</div>

    </div>
</div>
@endsection
