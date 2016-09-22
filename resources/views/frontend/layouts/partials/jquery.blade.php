<script src="{{ url('frontend/js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/easing.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/home.js') }}"></script>
<script src="{{ url('frontend/js/wow.min.js') }}"></script>
<script src="{{ url('frontend/js/search.js') }}"></script>
<script type="text/javascript" src={{ asset('bower/jquery-ui/jquery-ui.min.js') }}></script>
<script type="text/javascript">
	var pathjsonsearch = {!! json_encode(config('path.pathjsonsearch')) !!};
	var pathresultsearch = {!! json_encode(config('path.pathresultsearch')) !!};
	var pathfoodresult = {!! json_encode(url(config('path.pathfoodresult'))) !!};
	var pathfoodresultimg = {!! json_encode(url(config('path.pathfoodresultimg'))) !!};
	var keypress = {!! json_encode(config('define.keypress')) !!};
</script>
@yield('script')