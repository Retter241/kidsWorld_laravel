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
@php
$post = new App\Post ; $post->id = 0;
@endphp
                    @foreach($posts as $post)
                <div class="single-left1">
                    <img src="{{URL::asset('/storage/posts/'.$post->img)}}" alt=" " class="img-responsive">
                    <h3>{{ $post->title }}</h3>
                    <p>{!! $post->content !!}</p>
                </div>


                <div class="comments">
                    <h3>Комментарии:</h3>
                    <div class="comments-grids">
                    @foreach($post->comments as $comment)
                        <div class="comments-grid">
                            <div class="comments-grid-left">
                                <img src="{{URL::asset('images/3.png')}}" alt=" " class="img-responsive">
                            </div>
                            <div class="comments-grid-right">
                                <h4><a href="#" onclick="return false;">  {{$comment->user->name}}</a></h4>
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
                     @include('site.layouts.addCommentForm' , ['post_id' => $post->id , 'type' => 'Post'])
               </div>
        @else
            <div class="comments-grids">

                    <div class="comments-grid">
                        Для комментирования новости необходимо
                        <a href="{{ url('/login') }}" class="auth__btn">Войти</a>
                        @if (Route::has('register'))
                            Или
                            <a href="{{ route('register') }}" class="auth__btn">Зарегистироваться</a>

                        @endif
                    </div>


            </div>
                    @endauth
                
 @endforeach
</div>



{{--
@php
$post = new App\Post ; $post->id = 0;
@endphp
                    @foreach($posts as $post)
                    <div class="card-header">Новость  {{$post->title}}</div>

                    <div class="" style="font-size: 16px;">



                            <img src="/public/storage/{{$post->img}}" alt="" style="height: 75px"> <br/>
                            {!! $post->content !!}<br/>
                        <div style="border: 1px solid yellow;">
                            <h3>Комментарии</h3>
                            @foreach($post->comments as $comment)
                                {{$comment->user->name}}<br>
                                {{$comment->body}}<br>
                            @endforeach
                        </div>


                            <hr>
                    @endforeach

    @include('site.layouts.addCommentForm' , ['post_id' => $post->id , 'type' => 'Post'])
                    </div>
                </div>
            </div>
        </div>
    </div>

 --}}
    {{-- dd( preg_match('*ot-3-do-4-let*' , app('request')->path()) ) --}}



@endsection
