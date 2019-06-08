@foreach($categories_menu as $menu_item)
    @if($menu_item ->id > 5)
        <li><a href="{{url($parent.$menu_item->alias)}}">{{$menu_item->title}}</a></li>
    @endif
@endforeach

 