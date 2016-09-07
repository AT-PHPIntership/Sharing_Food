@extends('backend.layouts.master')

@section('title', trans('admin_manager_food_store.title_manage_food'))
@section('content')
<div class="row">
    <h2 class="text-left">&nbsp;{{trans('admin_manager_food_store.create_food_store')}}</h2><br>
    <div class="box box-success">
        <div class="col col-lg-8 col-lg-offset-2">
            {{ Form::open(array('route' => 'admin.foodstore.store', 'id' => 'user-form', 'enctype' => 'multipart/form-data')) }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', trans('admin_manager_food_store.name')) }}
                    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans('admin_manager_food_store.name'), 'pattern'=>trans('admin_manager_food_store.name_food_store_pattern'),'title'=>trans('admin_manager_food_store.name_food_store_notice'),'required')) }}
                    @if ($errors->has('name'))
                        <span class="errors">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }}">
                    {{ Form::label('information', trans('admin_manager_food_store.information')) }}
                    {{ Form::textarea('information', null, array('class' => 'ckeditor','id' => 'information', 'resize' => 'true','placeholder' => trans('admin_manager_food_store.information'))) }}
                    @if ($errors->has('information'))
                        <span class="errors">
                            {{ $errors->first('information') }}
                        </span>
                    @endif
                </div>
                {{ Form::submit(trans('admin_manager_food_store.create_food_store'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript" src="{{ url('bower/ckeditor/ckeditor.js') }}"></script>    
@endsection
@endsection

