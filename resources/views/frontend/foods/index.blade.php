@extends('frontend.home')
@section('content')
<div class="menu">
	<div class="container">
		<div class="menu-main">
			<div class="menu-head">
			  <h3><a href="{{ route('food.create') }}"><button class="btn btn-lg btn-warning" >{{ trans('lang_user.foods.create_food') }}</button></a></h3>
			</div>
			<div class="menu-top">
				<h3>{{ trans('lang_user.foods.all_food') }}</h3>
				<div class="menu-top-grids mgd1 wow bounceInRight" data-wow-delay="0.5s">
					@foreach($foodList as $item)
					<div class="col-md-4 menu-items firstdata">
						@if($item->image)
						<a href="{{ route('food.show',$item->id) }}"><img src="{{ url(config('path.foods').$item->image) }}" alt="{{ trans('lang_user.foods.error_image') }}" class="img-responsive sizefood" ></a>
						@else
						<a href="{{ route('food.show',$item->id) }}"><img src="{{ url(config('path.foods').'food_default.png')}}" alt="" class="img-responsive"></a>
						@endif
						<h4><a href="{{ route('food.show',$item->id) }}">{{  $item->name_food}}</a></h4>
					</div>
					@endforeach
					<div class="col-md-4 menu-items" id="food_result" style="display:none">
						<a href="" id="food_url" ><img src="" class="img-responsive sizefood" id="img_food"></a>
						<h4 id="food_name" class=""><a href="" id="food_name_url"></a></h4>
					</div>
					<div id="food_search" class="menu-items "></div>
					<div class="text-center col-lg-12">{!! $foods->render() !!}</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection