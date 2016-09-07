@extends('backend.layouts.master')

@section('title', trans('admin_manager_food_store.title_manage_food'))
@section('content')
<div class="row">
	<h2 class="text-left">&nbsp;{{trans('admin_manager_food_store.food_store_list')}}</h2><br>
    <div class="box box-success">
    <div class="col-md-12" align="center"><a href="{{ route('admin.foodstore.create') }}" class="btn btn-primary" >{!! trans('admin_manager_food_store.add_food_store') !!}</a></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_food_store" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('admin_manager_food_store.no') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food_store.name') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food_store.user_id') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.edit') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.delete') !!}</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($foodstores as $item)
                        <tr>
                            <td>{!! $index++ !!}</td>
                            <td><a href="{{ route('admin.foodstore.show',$item ->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->foodstoreuser->username }}</td>
                            <td>
                                <a href="{{ route('admin.foodstore.edit',$item ->id)}}"><button class="btn btn-info">{!!trans('admin_manager_food_store.edit' )!!}</button></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.foodstore.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                {!! Form::button(trans('admin_manager_food_store.delete'), ['class' => 'btn btn-danger',
                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                'data-title' => trans('admin_manager_food_store.title_delete'),
                                'data-message' => trans('admin_manager_food_store.confirm')]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
    </div>                      
</div>
@endsection

