@extends('backend.layouts.master')

@section('title', trans('lang_admin_manager_user.title_manage_user'))
@section('content')
<div class="row">
	<h2 class="text-left">{{trans('lang_admin_manager_user.user_list')}}</h2><br>
    <div class="box box-success">
    <div class="col-md-12" align="center"><a href="{{ route('admin.user.create') }}" class="btn btn-primary" >Add User</a></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_users" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('lang_admin_manager_user.no') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.user_name') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.fullname') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.address') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.phone') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.birthday') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.edit') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.delete') !!}</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($users as $item)
                        <tr>
                            <td>{!! $index++ !!}</td>
                            <td><a href="{{ route('admin.user.show',$item ->id) }}">{{$item->username}}</a></td>
                            <td>{{$item->fullname}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{preg_replace('/\d{3}/', '$0-', str_replace('.', null, trim($item->phone)), 2)}}</td>
                            <td>{!! date(config('path.formatdate'), strtotime($item->bithday)) !!}</td>
                            <td>
                                <a href="{{ route('admin.user.edit',$item ->id)}}"><button class="btn btn-info">{!!trans('lang_admin_manager_user.edit' )!!}</button></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.user.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                {!! Form::button(trans('lang_admin_manager_user.delete'), ['class' => 'btn btn-danger',
                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                'data-title' => trans('lang_admin_manager_user.title_delete'),
                                'data-message' => trans('lang_admin_manager_user.confirm')]) !!}
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

