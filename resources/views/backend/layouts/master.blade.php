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
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          {{ trans('lang_admin.dashboard') }}
          <small>{{ trans('lang_admin.control_panel') }}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('lang_admin.home') }}</a></li>
          <li class="active">{{ trans('lang_admin.dashboard') }}</li>
        </ol>
      </section>

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
