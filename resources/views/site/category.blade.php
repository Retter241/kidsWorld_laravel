@extends('site.layouts.app')

@push('top_banner')
<div class="agile-banner">
	</div>

@endpush
@push('category_sidebar')
<ul>


  
                            @foreach($categories_menu as $menu_item)
                                @if($menu_item ->id > 5)
                                @if(in_array(Request::path(), array("sport" , "tvorchestvo" , "ucheba" , "vospitanie" , "zdorove")))
                                <li>
                                        <a href="/{{$menu_item->alias}}">
                                        <span class="glyphicon    glyphicon-arrow-right" aria-hidden="true"></span>{{$menu_item->title}}</a>     
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{Request::path().'/'.$menu_item->alias}}">
                                        <span class="glyphicon    glyphicon-arrow-right" aria-hidden="true"></span>{{$menu_item->title}}</a>     
                                    </li>
                                @endif
                                
                                @endif
                                @endforeach
                            </ul>
@endpush




@section('content')


@foreach($categories_menu as $category)
@if($category->alias === Request::route()->parameters['category1'])
<h3 style="color:#333;margin-bottom:25px;">{{$category['title']}}</h3>
@endif
@endforeach



@foreach($posts as $post)
        <div class="wthree-top">
                    <div class="w3agile-top">
                        <div class="w3agile_special_deals_grid_left_grid">
                            <a href="{{Request::path().'/'.$post->alias}}">
                                <img src="{{URL::asset('/storage/posts/'.$post->img)}}" class="img-responsive" alt="" /></a>
                        </div>
    
                    </div>
                    
                    <div class="w3agile-bottom">

                        <div class="col-md-9 w3agile-right">
                            <h3><a href="{{Request::path().'/'.$post->alias}}">{{$post->title}}</a></h3>
                        <p>{{$post->desc}}</p>                    </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
   @endforeach

@endsection