<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FE | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/dist/css/AdminLTE.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/dist/css/skins/skin-red.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/iCheck/flat/purple.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/select2/select2.css') }}">

  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/bootstrap-switch/bootstrap-switch.min.css') }}">

  @yield('stylesheets')

  <!-- jQuery 2.2.3 -->
  <script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>E</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Find</b>Enchiladas</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::asset('assets/img/new-logo.png') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL::asset('assets/img/new-logo.png') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                  <small>Member since {{ substr(Auth::user()->created_at, 0, 11) }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/shm-admin/settings" class="btn btn-default btn-flat">Settings</a>
                </div>
                <div class="pull-right">
                  <form method="POST" action="/logout">{{ csrf_field() }}<button type="submit" class="btn btn-default btn-flat">Sign out</a></form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('assets/img/new-logo.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
          <a href="#">{{ Auth::user()->username }}</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::is('/user') ? 'active' : '' }} treeview">
          <a href="/shm-admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="{{ Request::is('/user/settings') ? 'active' : '' }} treeview">
          <a href="">
            <i class="fa fa-gear"></i> <span>Settings</span>
          </a>
        </li>
        <li class="{{ Request::is('/user/menus') ? 'active' : '' }}">
          <a href="user/menus">
            <i class="fa fa-calendar"></i> <span>Menus</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        @yield('main')
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.3
    </div>
    <strong>Copyright &copy; 2016 <a href="https://ukiyodesigns.github.io">Ukiyo Designs</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('assets/admin/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ URL::asset('assets/admin/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ URL::asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- FileInput -->
<script src="{{ URL::asset('assets/admin/plugins/fileinput/fileinput.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ URL::asset('assets/admin/plugins/select2/select2.full.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('assets/admin/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
{{-- <script src="{{ URL::asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script> --}}
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('assets/admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/admin/dist/js/app.min.js') }}"></script>
@yield('more-scripts')
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64484825-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
