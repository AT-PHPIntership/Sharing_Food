@extends('frontend.home')
@section('content')
@section('header')
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-star-rating/css/star-rating.css') }}">		
	<link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-star-rating/css/theme-krajee-fa.css') }}">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
	<script type="text/javascript" src="{{ asset('bower/bootstrap-star-rating/js/star-rating.js') }}" ></script>		
{{-- <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> --}}
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
				<p class="sed1">{{ trans('lang_user.foods.posted_by') }}<a href="#"> {{ $foods->usersid->username }}</a> {{ trans('lang_user.foods.in_general') }}| <a href="#">{{ count($comments) }} {{ trans('lang_user.foods.comments') }}</a></p> 
				<p class="sed2">{{ $foods->introduce }}</p>
		       <div class="clearfix"> </div>
			 </div>
	</div>
</div>
<div class="single-middle">
	<h1>{{ count($comments) }} {{ trans('lang_user.foods.comments') }}</h1>
		@foreach($comments as $itemcomment)
		<div class="media" id="{{ $itemcomment->id}}">
		  <div class="media-left">
			<a href="#">
				<img class="media-object sizeimage" src="{{ url(config('path.avatar').$itemcomment->usercomment->avatar) }}" alt="">
			</a>
		  </div>
		  <div class="media-body">
			<h4 class="media-heading"><a href="#">{{ $itemcomment->usercomment->username }}</a><small class="pull-right">
				@if($itemcomment->usercomment->id == Auth::user()->id)
				<form class="del-cmt-form" method="POST">
					<input type="hidden" name="_token" value="{{ Session::token() }}" />
	                <button type="submit" class="btn btn-danger btn-sm" id="deletecmt">{{ trans('lang_user.comments.delete') }}</button>
	                <input type="hidden" name="comment_id" value="{{$itemcomment->id}}">
	            </form>
	            @endif
			</small></h4>
				<p>{{ $itemcomment->body }}
					@if($itemcomment->usercomment->id == Auth::user()->id)
		            @endif
				</p>
		  </div>
		</div>
		@endforeach
</div>
<div class="single-bottom">
	<h2>{{ trans('lang_user.foods.comment') }}</h2>
		<form method="POST">
			<input type="hidden" name="_token" value="{{ Session::token() }}" />
			<input type="hidden" name="users_id" value="{{Auth::user() ? Auth::user()->id : ''}}">
			<input type="hidden" name="foods_id" value="{{$foods->id}}">
			<textarea cols="77" rows="6" value=" " name="comment" id="comment-text" onfocus="this.value='';" onblur="if (this.value == '') {this.value = {{ trans('lang_user.foods.message') }};}">{{ trans('lang_user.foods.message') }}</textarea>
			<input id="input-id" type="text" class="rating" data-size="lg" name="rating_id">
			<div class='clearfix'></div>
			<input type="submit" value="Send" name="sendcmt" id="sendcmt">
		</form>
	</div>
</div>
<script type="text/javascript" src="{{ asset('frontend/js/comment.js') }}" ></script>
<script type="text/javascript">
	//comment
	var slider = {!! json_encode(config('define.slider')) !!};
	var comment_path = {!! json_encode(config('path.comment')) !!};
</script>
<script type="text/javascript" src="{{ asset('frontend/js/slide.js') }}" ></script>

@endsection