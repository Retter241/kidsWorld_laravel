@extends('site.layouts.app')

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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Родителям </div>


                </div>
            </div>
        </div>
    </div>


@endsection
