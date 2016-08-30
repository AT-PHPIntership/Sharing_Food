<!DOCTYPE html>
<html>
<head>
  @include('backend.layouts.partials.header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('backend.layouts.partials.navbar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
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
