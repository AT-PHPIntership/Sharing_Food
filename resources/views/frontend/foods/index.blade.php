@extends('frontend.home')
@section('content')
<div class="menu">
	<div class="container">
		<div class="menu-main">
			<div class="menu-head">
			  <h3><button class="btn btn-lg btn-warning">{{ trans('lang_user.foods.create_food') }}</button></h3>
			</div>
			<div class="menu-top">
				<h3>{{ trans('lang_user.foods.all_food') }}</h3>
				<div class="menu-top-grids mgd1 wow bounceInRight" data-wow-delay="0.5s">
					@foreach($foodList as $item)
					<div class="col-md-4 menu-items">
						@if($item->image)
						<a href="#"><img src="{{ url(config('path.foods').$item->image)}}" alt="{{ trans('lang_user.foods.error_image') }}" class="img-responsive" width="284" height="177"></a>
						@else
						<a href="#"><img src="{{ url(config('path.foods').'food_default.png')}}" alt="" class="img-responsive"></a>
						@endif
						<h4><a href="#">{{  $item->name_food}}</a></h4>
					</div>
					@endforeach
					<div class="text-center col-lg-12">{!! $foods->render() !!}</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection