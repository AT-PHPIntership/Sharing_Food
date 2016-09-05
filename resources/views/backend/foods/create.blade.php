@extends('backend.layouts.master')

@section('title', trans('admin_manager_food.title_manage_food'))
@section('header')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTkKlynaEYheQDPwlSufE3ySP8Cbku4FQ&libraries=places"></script>
@endsection
@section('content')
<div class="row">
    <h2 class="text-left">&nbsp;{{trans('admin_manager_food.create_food')}}</h2><br>
    <div class="box box-success">
        <div class="col col-lg-8 col-lg-offset-2">
            {{ Form::open(array('route' => 'admin.food.store', 'id' => 'user-form', 'enctype' => 'multipart/form-data')) }}
                <div class="form-group{{ $errors->has('name_food') ? ' has-error' : '' }}">
                    {{ Form::label('name_food', trans('admin_manager_food.name_food')) }}
                    {{ Form::text('name_food', null, array('class' => 'form-control', 'placeholder' => trans('admin_manager_food.name_food'), 'pattern'=>trans('admin_manager_food.name_food_pattern'),'title'=>trans('admin_manager_food.name_food_notice'),'required')) }}
                    @if ($errors->has('name_food'))
                        <span class="errors">
                            {{ $errors->first('name_food') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('introduce') ? ' has-error' : '' }}">
                    {{ Form::label('introduce', trans('admin_manager_food.introduce')) }}
                    {{ Form::textarea('introduce', null, array('class' => 'form-control', 'resize' => 'true','placeholder' => trans('admin_manager_food.introduce'))) }}
                    @if ($errors->has('introduce'))
                        <span class="errors">
                            {{ $errors->first('introduce') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                    {{ Form::label('place', trans('admin_manager_food.place')) }}
                    {{ Form::text('place', null,array('id' => 'searchmap', 'class' => 'form-controll' ,'placeholder' => trans('admin_manager_food.place'))) }}
                    <div id="map-canvas" class="col-lg-12 heightmap"></div>
                    @if ($errors->has('place'))
                        <span class="errors">
                            {{ $errors->first('place') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    {{ Form::label('type', trans('admin_manager_food.type')) }}
                    {{ Form::select('type',$types,null ,['class' => 'form-control']) }}
                    @if ($errors->has('type'))
                        <span class="errors">
                            {{ $errors->first('type') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('food_store') ? ' has-error' : '' }}">
                    {{ Form::label('food_store', trans('admin_manager_food.food_store')) }}
                    {{ Form::select('food_store',$foodstores,null ,['class' => 'form-control']) }}
                    @if ($errors->has('food_store'))
                        <span class="errors">
                            {{ $errors->first('food_store') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('image[]') ? ' has-error' : '' }}">
                    {{ Form::label('image', trans('admin_manager_food.image_food')) }}
                    {{ Form::file('image[]',['class' => 'control','id' => 'picture', 'multiple' => 'true']) }}<br>
                    <div id="listImage" class="col-md-12"></div>
                </div>
                {{ Form::submit(trans('admin_manager_food.create_food'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
         
@section('script')
    <script type="text/javascript" src="{{ url('backend/js/map.js') }}"> </script>
    <script type="text/javascript">
        
    </script>  
@endsection
@endsection

