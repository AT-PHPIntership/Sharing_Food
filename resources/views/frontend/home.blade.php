<!DOCTYPE HTML>
<html>
<head>
@include('frontend.layouts.partials.header')
@include('frontend.layouts.partials.jquery')
</head>
<body>
@include('frontend.layouts.partials.banner')
@include('frontend.layouts.partials.navbar')
<!--typo start here-->
<div class="typrography">
	<div class="container">     
      {{-- contend --}}
      @yield('content')
    </div>
</div>
<!--typo end here-->
@include('frontend.layouts.partials.footer')
</body>
</html>