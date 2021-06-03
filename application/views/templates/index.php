<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E - Surat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>assets/backend/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/select2/dist/css/select2.min.css">

<!-- jQuery 3 -->
<script src="<?=base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/sweetalert/sweetalert.css">


  <!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">





  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IR</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img style="width:50%;" src="<?=base_url();?>img/logo2.png"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('templates/menu') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <?php $this->load->view($content); ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.4.0 -->
    </div>
    <strong>Copyright &copy; <?= date('Y') ?></strong> All rights
    reserved.
  </footer>

<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- Sparkline -->
<script src="<?=base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- datetimepicker -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- FLOT CHARTS -->
<script src="<?=base_url();?>assets/bower_components/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?=base_url();?>assets/bower_components/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?=base_url();?>assets/bower_components/flot/plugins/jquery.flot.pie.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<script src="<?=base_url();?>assets/custom/custom.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- SweetAlert -->
<script src="<?=base_url();?>assets/plugins/sweetalert/sweetalert.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#swalDefaultSuccess').click(function() {
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: '<?php echo $this->session->flashdata('data'); ?>',
          showConfirmButton: false,
          timer: 1500
        })
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#btn-logout").click(function(){
      swal({
          title: "Anda yakin ingin keluar aplikasi?",
          text: "",
          type : "warning",

          showCancelButton: true,
          cancelButtonClass: "btn-md btn-default",
          cancelButtonText: "Batal",

          confirmButtonClass: "btn-md btn-danger",
          confirmButtonText: "Ya",
          closeOnConfirm: true,

          showLoaderOnConfirm: true,

        }, function(){
          window.location.href = "<?= base_url('auth/logout') ?>";
        });
    });
  });

  function showModal(selector){
    $(selector).modal({
      keyboard : false,
      backdrop : 'static',
    })
  }

  function isNumberKey(evt){
    var charCode = evt.keyCode
    if (charCode < 48 && charCode > 57){
        return true;
    }
    return false;
  }

  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
