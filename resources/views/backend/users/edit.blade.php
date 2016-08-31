@extends('backend.layouts.master')

@section('title', trans('lang_admin_manager_user.title_manage_user'))
@section('content')
<div class="row">
    <h2 class="text-left">&nbsp;{{trans('lang_admin_manager_user.edit_user')}}</h2><br>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('lang_admin_manager_user.edit_user')}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('admin.user.update',$list ->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username">{{trans('lang_admin_manager_user.username')}}</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="{{$list->username}}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">{{trans('lang_admin_manager_user.email_address')}}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$list->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                        <label for="fullname">{{trans('lang_admin_manager_user.fullname')}}</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" value="{{$list->fullname}}">
                        @if ($errors->has('fullname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address">{{trans('lang_admin_manager_user.address')}}</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$list->address}}">
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                        <label for="birthday">{{trans('lang_admin_manager_user.birthday')}}</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="{{$list->birthday}}">
                        @if ($errors->has('birthday'))
                            <span class="help-block">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone">{{trans('lang_admin_manager_user.phone')}}</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$list->phone}}">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }}">
                        <label for="information">{{trans('lang_admin_manager_user.information')}}</label>
                        <textarea type="text" class="form-control" id="information" name="information" placeholder="Information" rows="2" resize="true">{{$list->information}}</textarea>
                        @if ($errors->has('information'))
                            <span class="help-block">
                                <strong>{{ $errors->first('information') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label for="role">{{trans('lang_admin_manager_user.role')}}</label>
                        <select id="role" name="role" class="form-control">
                            @foreach($roleuser as $role)
                                <option value="{{ $role->id }}">{{$role->role}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="image">{{trans('lang_admin_manager_user.avatar')}}</label>
                        <input type="file" id="image" name="image"/>
                        <img src="{{url(config('path.avatar').$list->avatar)}}" class = "setpicture img-thumbnail" id ="image_no"></img><br>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{trans('lang_admin_manager_user.update_user')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

