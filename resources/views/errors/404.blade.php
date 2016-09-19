@extends('frontend.home')
@section('content')
<div class="text-center">
    <h1>{{trans('lang_user.error.404')}}</h1>
    <p>
        {{trans('lang_user.error.error_404')}}<br>
        <a href="{{ route('home') }}">{{trans('lang_user.error.go_home')}}</a>
    </p>
</div>
@endsection