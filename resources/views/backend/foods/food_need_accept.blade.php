@extends('backend.layouts.master')

@section('title', trans('admin_manager_food.title_manage_food'))
@section('content')
<div class="row">
	<h2 class="text-left">&nbsp;{{trans('admin_manager_food.food_list')}}</h2><br>
    <div class="box box-success">
    <div class="col-md-12" align="center"><a href="{{ route('admin.food.create') }}" class="btn btn-primary" >{!! trans('admin_manager_food.add_food') !!}</a></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_foods_accept" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('admin_manager_food.no') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.name_food') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.introduce') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.accept') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.place') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.type') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.user_create') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.food_store') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.accept') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_food.delete') !!}</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($foods as $item)
                        <tr id="{{ $item ->id }}">
                            <td>{!! $index++ !!}</td>
                            <td><a href="{{ route('admin.food.show',$item ->id) }}">{{ $item->name_food }}</a></td>
                            <td>{{ $item->introduce }}</td>
                            <td>{{ $item->accept }}</td>
                            <td>{{ $item->places->place }}</td>
                            <td>{{ $item->types->type }}</td>
                            <td>{{ $item->usersid->username }}</td>
                            <td>{{ $item->foodsstore->name }}</td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="food_accept_id" id="food_accept_id" value="{{ $item ->id }}">
                                    <input type="hidden" name="accept" id="accept" value="1">
                                    <button class="btn btn-success" id="accept_food">{!!trans('admin_manager_food.accept' )!!}</button>
                                </form>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.food_accept.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                {!! Form::button(trans('admin_manager_food.delete'), ['class' => 'btn btn-danger',
                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                'data-title' => trans('admin_manager_food.title_delete'),
                                'data-message' => trans('admin_manager_food.confirm')]) !!}
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
@section('script')
    <script type="text/javascript">
        var pathaccept = {!! json_encode(config('path.pathaccept')) !!};
    </script>
    <script type="text/javascript" src="{{ asset('backend/js/acceptfood.js') }}"></script>
@endsection
@endsection

