@extends('profile.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Тема:</h2>
        </div>
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('topics.index') }}"> Назад</a>
        </div>
   </div>

   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Название: </strong>
            {{ $topic->title }}
        </div>
    </div>
    <h3>Комментарии этой темы</h3>
         <table class="table table-bordered">
  <tr>
     <th>Пользователь:</th>
        <td>Автор темы</th>
        <th>Текст: </th>
        <th>Действия: </th>
  </tr>
    @foreach ($topic->comments as $key => $comment)
    <tr>
        <td>{{ App\User::find($comment->user_id)->name }}</td>
       
        <td>
           
            <a href="{{ action('Admin\UserController@show' , $topic->user->id) }}">
                  {{$topic->user->name}}</a>
      
             


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

  
</div>
 

    </div>
</div>
@endsection
