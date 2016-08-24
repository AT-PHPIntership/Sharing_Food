<!DOCTYPE html>
<html lang="en-IN">
<head>
<meta charset="utf-8">
<title>{{ trans('auth.title_login') }}</title>
<link href="{{ url('backend/css/vendor.css') }}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet'>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="{{ url('backend/css/login.css') }}">
</head>
<body>
	@include('backend.layouts.partials.alerts')
	<div id="login-form">

		<input type="radio" checked id="login" name="switch" class="hide">
		<input type="radio" id="signup" name="switch" class="hide">
		<div>
			<ul class="form-header">
				<li><label for="login"><i class="fa fa-lock"></i> {{ trans('auth.btn_login') }}<label for="login"></li>
				<li><label for="signup"><i class="fa fa-credit-card"></i> {{ trans('auth.btn_register') }}</label></li>
			</ul>
		</div>

		<div class="section-out">
			<section class="login-section">
			<div class="login">
				<form action="{!! route('login') !!}" method="POST" role="form">
					<input type="hidden" name="_token" value="{{ Session::token() }}" />
					<ul class="ul-list">
						<li><input type="email" required class="input" placeholder="Your Email" name="email" id="email" /><span class="icon" ><i class="fa fa-user"></i></span></li>
						<li><input type="password" required class="input" placeholder="Password" name="password" id="password" /><span class="icon" ><i class="fa fa-lock"></i></span></li>
						<li>
							<span class="remember"><input name="remember" type="checkbox" id="check"> 
								<label for="check" >{{ trans('auth.remember') }}</label></span><span class="remember"><a href="#">{{ trans('auth.forget') }}</a>
							</span>
						</li>
						<li><input type="submit" value="{{ trans('auth.btn_login') }}" class="btn"></li>
					</ul>
				</form>
			</div>

			<div class="social-login">{{ trans('auth.or_sign_in') }}
				<a href="{!! route('facebook')!!}" class="fb"><i class="fa fa-facebook"></i></a>
				<a href="{!! route('google')!!}" class="gp"><i class="fa fa-google-plus"></i></a>
			</div>
			</section>

			<section class="signup-section">
				<div class="login">
					<form action="">
						<ul class="ul-list">
							<li><input type="email" required class="input" placeholder="Your Email"/><span class="icon"><i class="fa fa-user"></i></span></li>
							<li><input type="password" required class="input" placeholder="Password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
							<li><input type="checkbox" id="check1"> <label for="check1">{{ trans('auth.accept') }}</label></li>
							<li><input type="submit" value="{{ trans('auth.btn_register') }}" class="btn"></li>
						</ul>
						<input type="hidden" name="_token" value="{{ Session::token() }}" />
					</form>
				</div>

				<div class="social-login">{{ trans('auth.or_sign_up') }}
					<a href="{!! route('facebook')!!}" class="fb"><i class="fa fa-facebook"></i></a>
					<a href="{!! route('google')!!}" class="gp"><i class="fa fa-google-plus"></i></a>
				</div>
			</section>
		</div>

	</div>
	<script src="{{ url('bower/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('backend/js/admin.js') }}"></script>
	<script type="text/javascript">
		var timeout = {!! json_encode(config('define.timeout')) !!};
	</script>    
</body>
</html>