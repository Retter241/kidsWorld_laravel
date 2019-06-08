@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все комментарии</h2>
        </div>
       {{--
<div class="pull-right">
         
                                <a class="btn btn-success" href="{{ route('comments.create') }}"> Создать</a>
                            
                         
  
        </div>
        --}} 
   </div>
        
   
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


@if(count($comments) > 0)
<table class="table table-bordered">
  <tr>
     <th>Пользователь:</th>
        <td>Ресурс: </th>
        <th>Текст: </th>
        <th>Действия: </th>
  </tr>
    @foreach ($comments as $key => $comment)
    <tr>
        <td>{{ App\User::find($comment->user_id)->name }}</td>
       
        <td>
          
            @if($comment->commentable_type == 'App\Post')
            <a href="{{ action('Admin\PostController@show' , $comment->commentable_id) }}">
                    {{App\Post::findOrFail($comment->commentable_id)->title}}</a>
            @endif
             @if($comment->commentable_type == 'App\Topic')
            <a href="{{ action('Admin\TopicController@show' , $comment->commentable_id) }}">
                    {{App\Topic::findOrFail($comment->commentable_id)->title}}</a>
            @endif


        </td>
        <td>{{ $comment->body }}</td>
        <td>
                {!! Form::open(['method' => 'DELETE','route' => ['comments.destroy', $comment->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>



@else 
<div class="alert alert-danger">
        <strong>Комментарии отсуствуют<br>
        
    </div>
@endif
    </div>





{!! $comments->render() !!}
    </div>
</div>
@endsection
