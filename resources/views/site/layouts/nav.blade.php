<nav class="navbar navbar-default">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a class="active" href="{{url('/')}}">Главная</a></li>
                    <li><a href="{{url('/roditeliam')}}">Родителям</a></li>
                    
                    <li><a href="{{url('/domashnie-jivotnie')}}">Домашние животные</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Возраст<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                         @foreach($categories_menu as $menu_item)
                @if($menu_item ->id <= 5)
                    <li><a href="{{url($menu_item->alias)}}">{{$menu_item->title}}</a></li>
                @endif

            @endforeach
                     
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Игры<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <li><a href="{{url('/rebusi')}}">Ребусы</a></li>
                        <li><a href="{{url('/zagadki')}}">Загадки</a></li>
                        <li><a href="{{url('/math')}}">Математические</a></li>
                      </ul>
                    </li>
					{{-- <li><a href="{{url('/about')}}">О нас</a></li>--}}
<li> <a href="{{ url('/forum') }}">Форум</a></li>
@if (Route::has('login'))
            @auth
             @if(Auth::user()->id === 1)
             <li>  <a href="{{ url('/backend') }}">Админ</a></li>
             @else
             <li>  <a href="{{ url('/profile') }}">Профиль</a></li>
             @endif
              <li>  <a href="{{ url('/logout') }}">Выйти</a></li>
            @else
               
             <li>  <a href="{{ url('/login') }}">Войти</a></li>

                @if (Route::has('register'))
                 <li>  <a href="{{ route('register') }}">Регистрация</a></li>
                   
                @endif
            @endauth
       
    @endif


                  </ul>
                </div><!-- /.navbar-collapse -->

                        <div class="clearfix"> </div>

              </div><!-- /.container-fluid -->
            </nav>




            