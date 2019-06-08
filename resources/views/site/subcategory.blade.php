@extends('site.layouts.app')

@push('top_banner')
<div class="agile-banner">
    </div>
@endpush
@push('category_sidebar')
<ul>
 

                            @foreach($categories_menu as $menu_item)
                                @if($menu_item ->id > 5)
                                <li><a href="/{{Request::route()->parameters['category1'].'/'.$menu_item->alias}}"><span class="glyphicon    glyphicon-arrow-right" aria-hidden="true"></span>{{$menu_item->title}}</a></li     >
                                @endif
                                @endforeach
                            </ul>
@endpush




{{--Request::route()->parameters['category1'].'/'.--}}


@section('content')

<h3 style="color:#333;margin-bottom:25px;">
@foreach($categories_menu as $category)
@if($category->alias === Request::route()->parameters['category1'])
{{$category['title']}}
@endif
@if($category->alias === Request::route()->parameters['category2'])
 / {{$category['title']}}
@endif
@endforeach
 </h3>   
@foreach($posts as $post)
        <div class="wthree-top">
                    <div class="w3agile-top">
                        <div class="w3agile_special_deals_grid_left_grid">
                            <a href="{{Request::url().'/'.$post->alias}}">
                                <img src="{{URL::asset('/storage/posts/'.$post->img)}}" class="img-responsive" alt="" /></a>
                        </div>
                    </div>
                    <div class="w3agile-bottom">

                        <div class="col-md-9 w3agile-right">
                            <h3><a href="{{Request::url().'/'.$post->alias}}">{{$post->title}}</a></h3>
                        <p>{{$post->desc}}</p>                    </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
   @endforeach

@endsection
