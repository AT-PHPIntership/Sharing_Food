@extends('backend.layouts.master')

@section('title', trans('admin_manager_food_store.title_manage_food'))
@section('content')
<div class="row">
    <div class="col-lg-offset-2 col-lg-8">
            {!! Form::model($list,[ 'route' => ['admin.foodstore.update',$list ->id],'method'=>'PUT', 'enctype' => 'multipart/form-data']) !!}
            
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
            <label> {{trans('admin_manager_food_store.user_update')}} <strong>{{Auth::user()->username}}</strong></label><br>
            {{ Form::submit(trans('admin_manager_food_store.update_food_store'), array('class' => 'btn btn-info')) }}
        {{ Form::close() }}
        <br>
    </div>    
</div>
@section('script')
    <script type="text/javascript" src="{{ url('bower/ckeditor/ckeditor.js') }}"></script>    
@endsection
@endsection

