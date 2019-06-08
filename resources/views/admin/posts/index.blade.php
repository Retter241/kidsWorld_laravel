@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="width:100%;">
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все Новости</h2>
        </div>
        <div class="pull-right">
          
            <a href="{{ route('posts.create') }}" class="btn btn-success">Создать</a>
        
        </div>
   </div>


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Картинка</th>
                  
               
                        <th>Категории</th>
                    
                    <th width="280px">Действия</th>
                </tr>
                @foreach ($posts as $key => $post)
                    <tr>
                       
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>@if ($post->img)
                            <img style="height: 50px;" src="{{URL::asset('/storage/posts/'.$post->img)}}">
                            @endif
                            </td>
                      
                   
                            <td>
                                
                                    @foreach($post->categories as $k => $v)
                                        <label class="badge badge-primary">{{ $v->title }}</label>
                                    @endforeach
                                
                            </td>
                       
                        <td>
                            <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Просмотреть</a>
                            <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Изменить</a>
                        

                                {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}

                        
                        </td>
                    </tr>
                @endforeach
            </table>

            {{-- {!! $posts->render() !!} --}}

        </div>
    </div>
@endsection
