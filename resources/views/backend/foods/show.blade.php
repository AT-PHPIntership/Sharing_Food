@extends('backend.layouts.master')

@section('title', trans('admin_manager_food.title_manage_food'))
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-4">
                        @foreach($images as $item)
                            @if($item->image ==null)
                                <img src="{!! asset(config('path.foods').'food_default.png') !!}" alt="{{ trans('admin_manager_food.no_image') }}" class="img-rounded img-responsive" />
                            @else
                                <img src="{!! asset(config('path.foods').$item->image) !!}" alt="{{ trans('admin_manager_food.no_image') }}" class="img-rounded img-responsive" />
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-4">
                        <h3>{{ $foods->name_food }}</h3>
                        <cite title="{!! $foods->places->place !!}">{{ $foods->places->place }}<i class="glyphicon glyphicon-map-marker">
                        </i></cite>
                        <ul class="profile">
                            <li>
                                <strong>{!! trans('admin_manager_food.type') !!}:</strong> {{ $foods->types->type }}
                            </li>
                            <li>
                                <strong>{!! trans('admin_manager_food.user_create') !!}:</strong> {{ $foods->usersid->username }}
                            </li>
                            <li>
                                <strong>{!! trans('admin_manager_food.food_store') !!}:</strong> {{ $foods->foodsstore->name }}
                            </li>
                            <li>
                                <strong>{!! trans('admin_manager_food.introduce') !!}:</strong> {{ $foods->introduce }}
                            </li>
                        </ul>
                        <!-- Split button -->
                        <div class="btn-group">
                            <a href="{{ route('admin.food.edit',$foods ->id)}}"><button class="btn btn-info">{!! trans('admin_manager_food.edit_food') !!}</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection