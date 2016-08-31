@if (Session::has('success'))

	<div class="alert alert-success" role="alert">
		<strong>{{trans('lang_admin_manager_user.success')}}</strong> {{ Session::get('success') }}
	</div>

@endif

@if (Session::has('danger'))

	<div class="alert alert-danger" role="alert">
		<strong>{{trans('lang_admin_manager_user.danger')}}</strong> {{ Session::get('danger') }}
	</div>

@endif