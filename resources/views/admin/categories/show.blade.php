@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Категория</h2>
        </div>
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Назад</a>
        </div>
   </div>

   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Название: </strong>
            {{ $category->title }}
        </div>
    </div>
    
  
</div>
 

    </div>
</div>
@endsection
