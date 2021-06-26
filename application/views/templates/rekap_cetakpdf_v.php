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


<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
  <img style="display: block; margin-left: auto; margin-right: auto;" src="<?=base_url();?>img/kopsurat.png">
  <h4 align="center">Jenis Rekap Surat <?php echo $rekaptampilarray; ?></h4>
      <div class="">
        <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <?php
                foreach($datafiledrekapsurat as $u){
                ?>
                <th><?php echo $u ?></th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($rekaptampil as $u){
              ?>
              <tr>
                <?php
                foreach($datafiledrekapsurat as $a){
                ?>
                <td><?php echo $u->$a ?></td>
                <?php } ?>
              </tr>
              <?php } ?>
            </tbody>
        </table>
        <div style="display: flex; justify-content: flex-end;">
        <h5 align="center" style="padding:60px;">
          Mojokerto, <?php echo date('d-M-Y'); ?>
          <br>
          Kepala Sub Bidang Penyusunan Program<br><br><br><br><br>
          <?php echo $ttd; ?><br>
          NIP : 1986032220110112007
        </h5>
      </div>
      </div>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?=base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
  <script src="<?=base_url();?>assets/plugins/sweetalert/sweetalert.min.js"></script>

  <script>
  window.print();
  </script>

</body>
</html>
