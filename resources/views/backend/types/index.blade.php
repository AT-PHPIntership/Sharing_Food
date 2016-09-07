@extends('backend.layouts.master')

@section('title', trans('admin_manager_type.title_manage_type'))
@section('content')
<div class="row">
	<h2 class="text-left">&nbsp;{{trans('admin_manager_type.type_list')}}</h2><br>
    <div class="box box-success">
    <div class="col-md-12" align="center"><a href="{{ route('admin.type.create') }}" class="btn btn-primary" >{!! trans('admin_manager_type.add_type') !!}</a></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_types" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('admin_manager_type.no') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_type.type') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_type.edit') !!}</th>
                        <th class="text-center">{!! trans('admin_manager_type.delete') !!}</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($types as $item)
                        <tr>
                            <td>{!! $index++ !!}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                                <a href="{{ route('admin.type.edit',$item ->id)}}"><button class="btn btn-info">{!!trans('admin_manager_type.edit' )!!}</button></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.type.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                {!! Form::button(trans('admin_manager_type.delete'), ['class' => 'btn btn-danger',
                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                'data-title' => trans('admin_manager_type.title_delete'),
                                'data-message' => trans('admin_manager_type.confirm')]) !!}
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

