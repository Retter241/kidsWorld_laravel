

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
  @foreach($topics as $topic)
        <div class="wthree-top">
               
                    <div class="w3agile-bottom">

                        <div class="col-md-9 w3agile-right">
                            <h3><a href="{{url('forum/'.$topic->alias)}}">{{$topic->title}}</a></h3>
                        <p>Количество сообщений в теме: {{count($topic->comments)}}</p>
                        <p>Автор: {{$topic->user->name}}</p>                    </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
   @endforeach

   {!! $topics->links() !!}

  @auth
   <div class="leave-coment-form">
             <h3>Создать тему</h3>
                  {!! Form::open(array('action'=>'Site\SiteController@addTopic', 'method' => 'POST')) !!}
                        <input type="text" id="title" name="title"  placeholder="Название" value="">
                         <input type="hidden" id="alias" name="alias" placeholder="алиас" value="">
                        <div class="w3_single_submit" style="padding-top: 25px;text-align: left;">
                            {!! Form::submit('Отправить') !!}
                        </div>
             {!! Form::close() !!}          
</div>
  @else
     <div class="leave-coment-form">
             <h3 style="margin-bottom: 25px;">Для создания темы небходимо</h3>

             <a href="{{ url('/login') }}" class="auth__btn">Войти</a> или <a href="{{ route('register') }}" class="auth__btn">Зарегистрироваться</a>

</div>
  @endauth


   
@endsection

@push('scripts')

  <script>
            $(document).ready(function () {
                var ru2en = {
                    ru_str: 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя(),.; "+/*?!@',
                    en_str: ['a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
                        'h', 'c', 'ch', 'sh', 'shh', '', 'i', '', 'je', 'ju', 'ja',
                        'a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
                        'h', 'c', 'ch', 'sh', 'shh', '', 'i', '', 'je', 'ju', 'ja',
                        '', '', '', '', '', '-', '', '', '', '', '', '', ''],
                    translit: function (org_str) {

                        var tmp_str = "";
                        for (var i = 0, l = org_str.length; i < l; i++) {
                            var s = org_str.charAt(i), n = this.ru_str.indexOf(s);
                            if (n >= 0) {
                                tmp_str += this.en_str[n];
                            }
                            else {
                                tmp_str += s;
                            }
                        }
                        return tmp_str.toLowerCase();
                    }
                };

                function TranslitCustom(old_input, old_value, new_input, new_value, rewritemode = true) {
                    //console.log(new_value, rewritemode);
                    if (new_value != undefined) {
                        //console.log('clear');
                        new_input.val(ru2en.translit(old_value));
                    }
                }
                $('#title').on('change keypress keyup keydown', function (e) {
                    TranslitCustom($('#title'), $('#title').val(), $('#alias'), $('#alias').val());
                })
            });

        </script>


@endpush