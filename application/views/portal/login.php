<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PORTAL | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="<?=base_url('assets/bower_components/bootstrap/dist');?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/font-awesome');?>/css/font-awesome.min.css">
   <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>">

</head>
<body class="hold-transition login-page">

<?php if($this->session->userdata('admin')==""): ?>
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><img style="width:100%;" src="<?=base_url();?>img/logo.png"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <marquee><p class="login-box-msg">Selamat Datang di Aplikasi SIRekom Dinas Kesehatan Pengendalian Penduduk dan Keluarga Berencana Kota Mojokerto</p></marquee>
    <!-- <p class="login-box-msg"><?= "CodeIgniter v.".CI_VERSION ?></p> -->


    <?php
        $act = ($this->input->get("act")!="") ? $this->input->get("act") : "";
        $set_tahun = ($this->input->get("tahun")!="") ? $this->input->get("tahun") : '0';
        $username = ($this->input->get("username")!="") ? $this->input->get("username") : "";
        if($act=="failed"){
            echo "<div class='alert alert-danger'><h5>Kesalahan Username / Password.</h5></div>";
        }
    ?>

    <form action="<?= base_url('auth/do_login') ?>" method="post">
      <!-- <div class="form-group has-feedback"> -->
        <?php // form_dropdown('tahun', $tahun, [$set_tahun],['class'=>'form-control']) ?>
      <!-- </div> -->
      <div class="form-group has-feedback">
        <?= form_input('username', $username, ['class'=>'form-control', 'placeholder'=>'username', 'required'=>""]) ?>
      </div>
      <div class="form-group has-feedback">
        <?= form_password('password', '', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>""]) ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
            &nbsp;
        </div>
        <!-- /.col -->
        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php else: ?>

  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url() ?>"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"><?= "CodeIgniter v.".CI_VERSION ?></p>

      <a href="<?= base_url('auth/logout') ?>" class="btn btn-block btn-danger">LOGOUT</a>
    </div>
  </div>

  <?php endif; ?>

<!-- jQuery 3 -->
<script src="<?= base_url("assets/") ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url("assets/") ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url("assets/") ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
