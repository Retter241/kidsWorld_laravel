@extends('profile.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все комментарии</h2>
        </div>
    
   </div>
        
   

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
        <td>{{$comment->user->name }}</td>
       
        <td>
          
            @if($comment->commentable_type == 'App\Post')
                    {{App\Post::findOrFail($comment->commentable_id)->title}}
            @endif
             @if($comment->commentable_type == 'App\Topic')
                    {{App\Topic::findOrFail($comment->commentable_id)->title}}
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
