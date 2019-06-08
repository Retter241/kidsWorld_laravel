<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
<link href="{{URL('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- fontawesome -->     
<link href="{{URL('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- Bootstrap stylesheet -->
<link href=" {{URL('css/style.css')}} " rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{URL('css/flexslider.css')}}" type="text/css" media="screen" property="" />
<!-- stylesheet -->
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="keywords" content="Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!--//fonts-->

<script type="text/javascript" src="{{URL('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{URL('js/main.js')}}"></script>
<!-- Required-js -->
<!-- main slider-banner -->
<link href="{{URL('css/skdslider.css')}}" rel="stylesheet">
<script src="{{URL('js/skdslider.min.js')}}"></script>


<!-- //main slider-banner --> 
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{URL('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{URL('js/easing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->

<!-- scriptfor smooth drop down-nav -->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //script for smooth drop down-nav -->
</head>
<body>
<!-- header -->
    <header>
        <div class="w3layouts-top-strip">
            <div class="container">
                <div class="logo">
                    <h1><a href="index.html">Kid's World</a></h1>
                    <p>ИНТЕРНЕТ-ЖУРНАЛ</p>
                </div>
            </div>
        </div>
        <!-- navigation -->
           @include('site.layouts.nav')
            
        <!-- //navigation -->
    </header>
    <!-- //header -->

    @stack('main_slider')
    
    @stack('top_banner')


    <!-- Content Containers --> 
    <div class="container">
        <div class="banner-btm-agile">
        <!-- //btm-wthree-left -->
            <div class="col-md-9 btm-wthree-left">
                @yield('content')
                
                  
            </div>
            <!-- //btm-wthree-left -->
                <!-- btm-wthree-right -->
            <div class="col-md-3 w3agile_blog_left">
                <div class="w3l_categories">
                    <h3>Категории</h3>
                        @stack('category_sidebar')
                            
                
                </div>


                <div class="w3ls_popular_posts">
                    <h3>Полезно знать</h3>
                      @foreach($posts_sidebar as $item)
                       <div class="agileits_popular_posts_grid">
                        <div class="w3agile_special_deals_grid_left_grid">
                            <a href="{{url($item->alias)}}"><img src="{{URL::asset('/storage/posts/'.$item->img)}}" class="img-responsive" alt="" /></a>
                        </div>
                        <h4><a href="{{url($item->alias)}}">{{ $item->title }}</a></h4>
                    </div>
                      @endforeach
                   
                </div>
            </div>
            <!-- //btm-wthree-right -->
            <div class="clearfix"></div>
        </div>
    </div> 
    <!-- -->


{{--
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/forum') }}">Forum</a>
                <a href="{{ url('/logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    
</div>
    --}}



<!-- footer -->
    <div class="footer-agile-info">
        <div class="container">
            <div class="col-md-3 w3layouts-footer">
                <h3>Контакты</h3>
                    <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="parents.html">Email: kid'sworld@mail.ru</a> </p>
                    <p><span><i class="fa fa-mobile" aria-hidden="true"></i></span><a href="pets.html">Phone: +375 (33) 619-80-20</a></p>
                    <p><span><i class="fa fa-globe" aria-hidden="true"></i></span><a href="1_2.html">www.kid'sworld.by</a></p>
            </div>
            <div class="col-md-6 wthree-footer">
                <h2>Kid'sWorld</h2>
                <p>Этот интернет-журнал станет лучшим другом для Вас и ваших детей. Здесь Вы сможете найти интересующую Вас информацию об обучении, воспитании и развитии вашего ребёнка! У каждого родителя в процессе воспитания и развития ребёнка возникает масса вопросов, на которые непросто найти однозначный ответ.</p>
            </div>
            <div class="col-md-3 w3-agile">
                <a href="index.html"><img src="{{URL('images/logo_footer.png')}}" alt=" " class="img-responsive"></a>

        </div>

    </div>
    </div>
    <!-- footer -->


    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="w3agile-list">
                <ul>
                    <li><a href="{{url('/')}}">Главная</a></li>
                    <li><a href="{{url('/roditeliam')}}">Родителям</a></li>
                    <li><a href="{{url('/domashnie-jivotnie')}}">Домашние животные</a></li>
                    <li><a href="#">Игры</a></li>
                    <li><a href="{{url('/about')}}">О нас</a></li>
                </ul>
            </div>
            <div class="agileinfo">
            </div>
        </div>
    </div>
<!-- //copyright -->
<!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
<!-- //here ends scrolling icon -->
<script src="{{URL('js/bootstrap.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

        jQuery('#responsive').change(function(){
            $('#responsive_wrapper').width(jQuery(this).val());
        });

    });
</script>

@stack('scripts')
</body>
</html>
