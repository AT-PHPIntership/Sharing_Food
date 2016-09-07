
@extends('backend.layouts.master')

@section('title', trans('admin_manager_food_store.title_manage_food'))
@section('content')
<div class="row">
	<h2 class="text-left">&nbsp;{{trans('admin_manager_food_store.show_food_store')}}</h2><br>
    <div class="box box-success">
        <div class="col col-lg-8 col-lg-offset-2">
            <div id="titlefont" align="center"><strong>{!! trans('admin_manager_food_store.information') !!}</strong></div><br> {{ $list->information }}
        </div>
    </div>
</div>
@endsection

