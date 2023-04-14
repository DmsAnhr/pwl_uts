<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset ('plugins/fontawesome-free/css/all.min.css')}}">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('dist/css/adminlte.min.css')}}">
  {{-- color picker --}}
  <link rel="stylesheet" href="{{asset ('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  {{-- custom style --}}
  <link rel="stylesheet" href="{{asset ('dist/css/custom.css')}}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset ('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layout.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->


  <!-- Footer & Aside -->
  @include('layout.footer')
  <!-- /.Footer & Aside-->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset ('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset ('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset ('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset ('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset ('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset ('plugins/chart.js/Chart.min.js')}}"></script>

{{-- color-picker --}}
<script src="{{asset ('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset ('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset ('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset ('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset ('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset ('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset ('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset ('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset ('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset ('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset ('dist/js/adminlte.js')}}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{asset ('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset ('dist/js/pages/dashboard2.js')}}"></script>
<script>
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $('#tbl-barang, #tbl-pengiriman').DataTable({
      "searching": true,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "iDisplayLength": 5
    });
</script>
</body>
</html>
