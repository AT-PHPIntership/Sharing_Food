@extends('frontend.home')
@section('content')
@section('header')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slide.css') }}">
@endsection
<div class="single">
	<div class="blog-to">		
		<div id="bigPic">
			@foreach($images as $itemimage)
				@if($itemimage->foods_id == $foods->id)
				<img class="img-responsive sin-on" src="{!! asset(config('path.foods').$itemimage->image) !!}" alt="" />
				@endif
			@endforeach
		</div>	
		<ul id="thumbs">
			@foreach($images as $itemimage)
				@if($itemimage->foods_id == $foods->id)
				<li rel='{{ $itemimage->id }}'><img class="img-responsive sin-on" src="{!! asset(config('path.foods').$itemimage->image) !!}" alt="" /></li>
				@endif
			@endforeach
		</ul>		
	</div>
	<div class='clearfix'></div>
	<div id='push'></div>
	<div class="blog-top">
			<div class="top-blog ">
				<h1>{{ $foods->name_food }}</h1>
				<p class="sed1">{{ trans('lang_user.foods.posted_by') }}<a href="#"> {{ $foods->usersid->username }}</a> {{ trans('lang_user.foods.in_general') }}| <a href="#">{{ count($foods->comment_id) }} {{ trans('lang_user.foods.comments') }}</a></p> 
				<p class="sed2">{{ $foods->introduce }}</p>
		       <div class="clearfix"> </div>
			 </div>
	</div>
</div>
<div class="single-middle">
	<h1>{{ count($foods->comment_id) }} {{ trans('lang_user.foods.comments') }}</h1>
		<div class="media">
		  <div class="media-left">
			<a href="#">
				<img class="media-object sizeimage" src="" alt="">
			</a>
		  </div>
		  <div class="media-body">
			<h4 class="media-heading"><a href="#"></a></h4>
				<p>{{-- Content comment --}}</p>
		  </div>
		</div>
</div>
<div class="single-bottom">
	<h2>{{ trans('lang_user.foods.comment') }}</h2>
		<form action="" >
			<input type="hidden" name="user_id" value="{{Auth::user() ? Auth::user()->id : ''}}">
			<textarea cols="77" rows="6" value=" " name="comment" id="comment" onfocus="this.value='';" onblur="if (this.value == '') {this.value = {{ trans('lang_user.foods.message') }};}">{{ trans('lang_user.foods.message') }}</textarea>
			<input type="submit" value="Send" name="sendcmt" id="sendcmt">
		</form>
	</div>
</div>
<script type="text/javascript">
	var slider = {!! json_encode(config('define.slider')) !!};
</script>
<script type="text/javascript" src="{{ asset('frontend/js/slide.js') }}" ></script>
<script type="text/javascript" src="{{ asset('frontend/js/comment.js') }}" ></script>
@endsection