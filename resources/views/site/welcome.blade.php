@extends('site.layouts.app')

@push('main_slider')
<!-- top-header and slider -->
    <div class="w3-slider"> 
    <!-- main-slider -->
        <ul id="demo1">
            <li>
                <img src="{{URL('images/2.jpg')}}" alt="" />
                <!--Slider Description example-->
                <div class="slide-desc">
                    <!-- <h3>Учиться любить, учиться быть добрыми, надо с детства.</h3> -->
                    <!-- <p>Фридрих Вильгельм Ницше</p>  -->
                </div>
            </li>
            <li>
                <img src="{{URL('images/2.jpg')}}" alt="" />
                  <div class="slide-desc">
                    <h3>Life Style </h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                </div>
            </li>
            <li>
                <img src="{{URL('images/3.jpg')}}" alt="" />
                <div class="slide-desc">
                    <h3>Photography</h3>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature. </p>
                </div>
            </li>
            
        </ul>
    </div>
    <!-- //main-slider -->
    <!-- //top-header and slider -->
@endpush

@push('category_sidebar')
<ul>
                            @foreach($categories_menu as $menu_item)
                                @if($menu_item ->id > 5)
                                <li><a href="/{{$menu_item->alias}}"><span class="glyphicon    glyphicon-arrow-right" aria-hidden="true"></span>{{$menu_item->title}}</a></li     >
                                @endif
                                @endforeach
                            </ul>
@endpush

@section('content')
 @foreach($posts as $post)
        <div class="wthree-top">
                    <div class="w3agile-top">
                        <div class="w3agile_special_deals_grid_left_grid">
                            <a href="{{url($post->alias)}}">
                                <img src="{{URL::asset('/storage/posts/'.$post->img)}}" class="img-responsive" alt="" /></a>
                        </div>
    
                    </div>
                    
                    <div class="w3agile-bottom">

                        <div class="col-md-9 w3agile-right">
                            <h3><a href="{{url($post->alias)}}">{{$post->title}}</a></h3>
                        <p>{{$post->desc}}</p>                    </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
   @endforeach

   {!! $posts->links() !!}
@endsection
