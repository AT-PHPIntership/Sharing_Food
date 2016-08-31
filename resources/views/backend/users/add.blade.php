@extends('backend.layouts.master')

@section('title', trans('lang_admin_manager_user.title_manage_user'))
@section('content')
<div class="row">
    <h2 class="text-left">{{trans('lang_admin_manager_user.create_user')}}</h2><br>
    <div class="box box-success">
        <div class="col col-lg-8 col-lg-offset-2">
            {{ Form::open(array('route' => 'admin.user.store', 'id' => 'user-form', 'enctype' => 'multipart/form-data')) }}
                <div class="form-group">
                    {{ Form::label('username', trans('lang_admin_manager_user.username')) }}
                    {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => trans('lang_admin_manager_user.username'), 'pattern'=>trans('lang_admin_manager_user.username_pattern'),'title'=>trans('lang_admin_manager_user.username_notice'),'required')) }}
                    @if ($errors->has('username'))
                        <span class="errors">
                            {{ $errors->first('username') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('email', trans('lang_admin_manager_user.email_address')) }}
                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => trans('lang_admin_manager_user.email_address'), 'pattern'=>trans('lang_admin_manager_user.email_pattern'),'title'=>trans('lang_admin_manager_user.email_notice'),'required')) }}
                    @if ($errors->has('email'))
                        <span class="errors">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('password', trans('lang_admin_manager_user.password')) }}
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => trans('lang_admin_manager_user.password'),
                    'pattern'=>trans('lang_admin_manager_user.password_pattern'),'title'=>trans('lang_admin_manager_user.password_notice'),'required')) }}
                    @if ($errors->has('password'))
                        <span class="errors">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('fullname', trans('lang_admin_manager_user.fullname')) }}
                    {{ Form::text('fullname', null, array('class' => 'form-control', 'placeholder' => trans('lang_admin_manager_user.fullname'), 'pattern'=>trans('lang_admin_manager_user.fullname_pattern'),  'title'=>trans('lang_admin_manager_user.fullname_notice'),'required')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('birthday', trans('lang_admin_manager_user.birthday')) }}
                    {{ Form::date('birthday', null, array('class' => 'form-control','pattern'=>trans('lang_admin_manager_user.birthday_pattern'),
                    'title'=>trans('lang_admin_manager_user.birthday_notice'),'required')) }}
                    @if ($errors->has('birthday'))
                        <span class="errors">
                            {{ $errors->first('birthday') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('phone', trans('lang_admin_manager_user.phone')) }}
                    {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => trans('lang_admin_manager_user.phone'),
                    'pattern'=> trans('lang_admin_manager_user.phone_pattern'),'title'=>trans('lang_admin_manager_user.phone_notice'),'required')) }}
                    @if ($errors->has('phone'))
                        <span class="errors">
                            {{ $errors->first('phone') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('address', trans('lang_admin_manager_user.address')) }}
                    {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => trans('lang_admin_manager_user.address'),
                    'pattern'=>trans('lang_admin_manager_user.address_pattern'),'title'=>trans('lang_admin_manager_user.address_notice'),'required')) }}
                    @if ($errors->has('address'))
                        <span class="errors">
                            {{ $errors->first('address') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('information', trans('lang_admin_manager_user.information')) }}
                    {{ Form::text('information', null, array('class' => 'form-control', 'placeholder' => trans('lang_admin_manager_user.information'),
                    'pattern'=>trans('lang_admin_manager_user.information_pattern'),'title'=>trans('lang_admin_manager_user.information_notice'),'required')) }}
                    @if ($errors->has('information'))
                        <span class="errors">
                            {{ $errors->first('information') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('image', trans('lang_admin_manager_user.avatar')) }}
                    {{ Form::file('image',['class' => 'control','id' => 'image', 'name' => 'image']) }}<br>
                    <img src="{{ url(config('path.avatar').'profile_default.png') }}" class = "setpicture img-thumbnail img_upload" id ="image_no"></img><br>
                </div>
                {{ Form::submit(trans('lang_admin_manager_user.create_user'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

