@extends('profile.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все Темы</h2>
        </div>
        <div class="pull-right">
          
            <a href="{{ route('topics.create') }}" class="btn btn-success">Создать</a>
        
        </div>
   </div>

  


  <table class="table table-bordered">
        
                <tr>
                       <th>ID</th>
                    <th>Тема</th>
                    <th>Действие</th>
                </tr>
       
                @foreach ($topics as $topic)
                <tr>
                    <td>{{ $topic->id }}</td> 
                    <td>{{ $topic->title }}</td> 
                    <td>
                        <a class="btn btn-info" href="{{ route('topics.show',$topic->id) }}">Посмотреть</a>
                    <a href="{{ route('topics.edit',$topic->id) }}" class="btn btn-info " style="margin-right: 3px;">Редактировать</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['topics.destroy', $topic->id] ,'style'=>'display:inline' ]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
        
        </table>

    
 
    </div>
</div>
@endsection
