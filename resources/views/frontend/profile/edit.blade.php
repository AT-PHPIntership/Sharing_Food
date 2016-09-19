@extends('frontend.home')
@section('header')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/serarch.css') }}">
@endsection
@section('content')
<div class="container">
  <div class="row">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">{{ Auth::user()->username }}</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class=" col-md-12 col-lg-12 "> 
            <form action="{{ route('profile.update',$list ->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username">{{trans('lang_user.profile.username')}}</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="{{$list->username}}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">{{trans('lang_user.profile.email')}}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$list->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                        <label for="fullname">{{trans('lang_user.profile.fullname')}}</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" value="{{$list->fullname}}">
                        @if ($errors->has('fullname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address">{{trans('lang_user.profile.address')}}</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$list->address}}">
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                        <label for="birthday">{{trans('lang_user.profile.birthday')}}</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="{{$list->birthday}}">
                        @if ($errors->has('birthday'))
                            <span class="help-block">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone">{{trans('lang_user.profile.phone')}}</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$list->phone}}">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }}">
                        <label for="information">{{trans('lang_user.profile.information')}}</label>
                        <textarea type="text" class="form-control" id="information" name="information" placeholder="Information" rows="3" resize="true">{{$list->information}}</textarea>
                        @if ($errors->has('information'))
                            <span class="help-block">
                                <strong>{{ $errors->first('information') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="image">{{trans('lang_user.profile.avatar')}}</label>
                        <input type="file" id="image" name="image"/>
                        <img src="{{url(config('path.avatar').$list->avatar)}}" class = "setpicture img-thumbnail" id ="image_no"></img><br>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{trans('lang_user.profile.update_profile')}}</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@section('script')
  <script type="text/javascript">
    var profile_time = {!! json_encode(config('define.profile_time')) !!};
  </script>
	<script type="text/javascript" src="{{ asset('frontend/js/profile.js') }}"></script>
@endsection
@endsection