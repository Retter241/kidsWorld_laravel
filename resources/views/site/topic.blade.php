@extends('site.layouts.app')


@push('top_banner')
<div class="agile-banner">
    </div>
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
 <div class="single-left">
    
       @foreach( $topic as $top)
<h1 style="color:#333;margin-bottom:25px;">  {{$top->title}}</h2>
                <div class="comments">
                    <h3>Сообщения:</h3>
                    <div class="comments-grids">
                        @foreach(  $top->comments as $comment)
                            
                        <div class="comments-grid">
                            <div class="comments-grid-left">
                                <img src="{{URL::asset('images/3.png')}}" alt=" " class="img-responsive">
                            </div>
                            <div class="comments-grid-right">
                                <h4><a href="#" onclick="return false;">   {{$comment->user->name}}</a></h4>
                                <ul>
                                <!--    <li>5 December 2016 <i>|</i></li>
                                    <li><a href="#">Reply</a></li> -->
                                </ul>
                                <p>{{$comment->body}}</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                                @endforeach

                                        </div>
                </div>

                 @auth
                <div class="leave-coment-form">
             @include('site.layouts.addCommentForm' , ['post_id' => $top->id , 'type' => 'Topic'])              </div>
              @else
     <div class="leave-coment-form">
             <h3 style="margin-bottom: 25px;">Для участия в обсуждении небходимо</h3>

             <a href="{{ url('/login') }}" class="auth__btn">Войти</a> или <a href="{{ route('register') }}" class="auth__btn">Зарегистрироваться</a>

</div>
  @endauth


   @endforeach
 </div>
@endsection
