<!DOCTYPE html>
<html>
<head>
  @include('backend.layouts.partials.header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('backend.layouts.partials.navbar')
    @include('backend.layouts.partials.model_confirm')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        @include('backend.layouts.partials.message')
        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  @include('backend.layouts.partials.footer')
  </div>
  @include('backend.layouts.partials.jquery')
</body>
</html>
