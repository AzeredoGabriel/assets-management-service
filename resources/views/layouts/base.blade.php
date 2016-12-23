
<!DOCTYPE html>

<html>
<head>
 
@include('partials.styles.main') 
@include('partials.metas.metas') 

<base href="/">

</head>
<body class="hold-transition skin-blue layout-top-nav">

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

@include('partials.scripts.main')

</body>
</html>
