@extends('profile.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="width:100%;">

            <div class="row" style="width:100%;justify-content: space-between;">
                <div class="pull-left">
                    @if (Auth::user()->id == 1)
                        <h2>Пользователи</h2>
                    @else
                        <h2>Профиль</h2>
                    @endif

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
                    <th>Email</th>
            
                  
                    <th width="280px">Действия</th>
                </tr>
             
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>

                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$data->id) }}">Просмотреть</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$data->id) }}">Изменить</a>
                          
                        </td>
                    </tr>
            
            </table>

            {{-- {!! $data->render() !!} --}}

        </div>
    </div>
@endsection
