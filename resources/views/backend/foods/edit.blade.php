@extends('backend.layouts.master')

@section('title', trans('admin_manager_food.title_manage_food'))
@section('content')
<div class="row">
    <h2 class="text-left">&nbsp;{{trans('admin_manager_food.edit_food')}}</h2><br>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('admin_manager_food.edit_food')}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('admin.food.update',$list ->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('namefood') ? ' has-error' : '' }}">
                        <label for="name_food">{{trans('admin_manager_food.name_food')}}</label>
                        <input type="text" class="form-control" id="name_food" name="name_food" placeholder="Enter name_food" value="{{$list->name_food}}">
                        @if ($errors->has('name_food'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_food') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('introduce') ? ' has-error' : '' }}">
                        <label for="introduce">{{trans('admin_manager_food.introduce')}}</label>
                        <textarea type="text" class="form-control" id="introduce" name="introduce" placeholder="Introduce" rows="3" resize="true">{{$list->introduce}}</textarea>
                        @if ($errors->has('introduce'))
                            <span class="help-block">
                                <strong>{{ $errors->first('introduce') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('accept') ? ' has-error' : '' }}">
                        <label for="accept">{{trans('admin_manager_food.accept')}}</label>
                        <input type="number" class="form-control" id="accept" name="accept" placeholder="Phone" value="{{$list->accept}}">
                        @if ($errors->has('accept'))
                            <span class="help-block">
                                <strong>{{ $errors->first('accept') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{trans('admin_manager_food.update_food')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

