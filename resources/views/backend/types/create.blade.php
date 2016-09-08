@extends('backend.layouts.master')

@section('title', trans('admin_manager_type.title_manage_type'))
@section('content')
<div class="row">
    <h2 class="text-left">&nbsp;{{trans('admin_manager_type.create_type')}}</h2><br>
    <div class="box box-success">
        <div class="col col-lg-8 col-lg-offset-2">
            {{ Form::open(array('route' => 'admin.type.store', 'id' => 'user-form', 'enctype' => 'multipart/form-data')) }}
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    {{ Form::label('type', trans('admin_manager_type.name')) }}
                    {{ Form::text('type', null, array('class' => 'form-control', 'placeholder' => trans('admin_manager_type.name'), 'pattern'=>trans('admin_manager_type.name_type_pattern'),'title'=>trans('admin_manager_type.name_type_notice'),'required')) }}
                    @if ($errors->has('type'))
                        <span class="errors">
                            {{ $errors->first('type') }}
                        </span>
                    @endif
                </div>
                {{ Form::submit(trans('admin_manager_type.create_type'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

