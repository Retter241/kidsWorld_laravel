<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{  config('app.url')  }}/public/css/style.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {csrfToken: '{{ csrf_token() }}'};

    </script>

    <title>{{ config('app.name', 'Админ-панель') }}</title>

    <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        form {
            width: 100%;
        }

        .col-md-6 {
            float: left;
        }

        .content img {
            max-width: 150px;
        }
  /*  https://bootstrapious.com/p/bootstrap-sidebar  */
    </style>
    @stack('styles')
</head>
<body>
<div id="app">
 <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>KID'S WORLD</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Меню</p>
            <li>
                <a href="{{ action('Profile\TopicController@index') }}">Мои темы форума</a>
                <a href="{{ action('Profile\CommentController@index') }}">Мои комментарии</a>
                <a href="{{ action('Profile\UserController@index') }}">Информация <br> пользователя</a>
            </li>
           
        </ul>
    </nav>
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn transparent">
                      <i class="fas fa-align-left"></i> 
                        <span><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="25px" height="25px" viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve">
<g>
    <g id="menu">
        <path d="M0,382.5h459v-51H0V382.5z M0,255h459v-51H0V255z M0,76.5v51h459v-51H0z"/>
    </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
<g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
</span>
                    </button>

                    <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                  


                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}" target="_blank">Перейти на сайт</a>
                            </li>
<li class="nav-item">

                                <a class="nav-link" href="{{ url('/logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                                   <form id="logout-form" action="{{ url('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>               
                            </li>

                           
                        </ul>
                    </div>

        </div>
    </nav>

 <div class="content__wrapper">
    @yield('content')
 </div>
</div>
</div>
</div>




<script type="text/javascript">
    $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});
</script>

@stack('scripts')

</body>
</html>
