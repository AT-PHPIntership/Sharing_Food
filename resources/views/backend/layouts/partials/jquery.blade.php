
<script src="{{ url('bower/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ url('backend/js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/js/admin.js') }}"></script>    
<script type="text/javascript">
	var timeout = {!! json_encode(config('define.timeout')) !!};
</script>
@yield('script')