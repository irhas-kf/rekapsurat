<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <!--
        Zoom Template 
        http://www.templatemo.com/tm-414-zoom
        -->
        <title>PORTAL</title>
        <meta name="description" content="PT Immas Jaya">
        <meta name="viewport" content="width=device-width">
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,500,300,700' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="<?=base_url('assets/portal/');?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url('assets/portal/');?>/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url('assets/portal/');?>/css/templatemo_main.css">
         <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>">

    </head>
    <body>
        <div id="main-wrapper">
<br />
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center templatemo-logo">
                <h4 class="templatemo-site-title">
                    PORTAL LOGIN
                </h4>
                <h5 class="text-danger"><?= "CodeIgniter v.".CI_VERSION ?></h5>

            </div>
            <div class="image-section">
                <div class="image-container">
                    <img src="<?=base_url('assets/portal/');?>/images/constructiontools.jpg" class="main-img inactive" >
                </div>
            </div>

            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 templatemo-content-wrapper" style="margin-top: -10%">
                    <div class="templatemo-content">
                        <?php if($this->session->userdata('admin')==""): ?>
                        <div class="login-box">
                          <!-- /.login-logo -->
                          <div class="login-box-body">
                            <?php
                                $act = ($this->input->get("act")!="") ? $this->input->get("act") : "";
                                $set_tahun = ($this->input->get("tahun")!="") ? $this->input->get("tahun") : '0';
                                $username = ($this->input->get("username")!="") ? $this->input->get("username") : "";
                                if($act=="failed"){
                                    echo "<div class='alert alert-danger'><h5>Kesalahan Username / Password.</h5></div>";
                                }
                            ?>

                            <form action="<?= base_url('auth/do_login') ?>" method="post">
                              <div class="form-group has-feedback">
                                <?= form_dropdown('tahun', $tahun, [$set_tahun],['class'=>'form-control']) ?>
                              </div>
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
                                <div class="col-xs-4">
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
                        
                        <section id="menu-section" class="active">
                            <?php if($admindata['LEVEL_ID']=='0'): ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-bottom-20">
                                    <a href="#">
                                        <div class="black-bg btn-menu">
                                            <h2>SUPER ADMIN</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-6 margin-bottom-20">
                                    <a href="<?=site_url('pegawai/absensi');?>" target="_blank" >
                                        <div class="black-bg btn-menu">
                                            <i class="fa fa-users"></i>
                                            <h2>KEPEGAWAIAN</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-6 margin-bottom-20">
                                    <a href="<?=site_url('inventori/barang');?>" target="_blank" >
                                        <div class="black-bg btn-menu">
                                            <i class="fa fa-cube"></i>
                                            <h2>INVENTORI</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-6 margin-bottom-20">
                                    <a href="<?=site_url('manajemen_proyek/dashboard');?>" target="_blank" >
                                        <div class="black-bg btn-menu">
                                            <i class="fa fa-laptop"></i>
                                            <h2>MANAJEMEN PROYEK</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-6 margin-bottom-20">
                                    <a  href="<?=site_url('keuangan/penerimaan/proyek');?>" target="_blank" >
                                        <div class="black-bg btn-menu">
                                            <i class="fa fa-envelope"></i>
                                            <h2>KEUANGAN</h2>
                                        </div>
                                    </a>
                                </div>                              
                            </div>
                            <div class="row">
                                
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 margin-bottom-20 pull-right">
                                    <a href="<?= base_url('auth/logout') ?>">
                                        <div class="black-bg btn-menu">
                                            <h2>Logout</h2>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </section><!-- /.menu-section -->    
                        <?php endif; ?>
                        
                    </div><!-- /.templatemo-content -->  
                </div><!-- /.templatemo-content-wrapper --> 
            </div><!-- /.row --> 

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer">
                    <p class="footer-text">Copyright &copy; <?= date("Y")." ".getenv('APP_TITLE') ?></p>
                </div><!-- /.footer --> 
            </div>

		</div><!-- /#main-wrapper -->
        
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div><!-- /#preloader -->
        
        <script src="<?=base_url('assets/portal/');?>/js/jquery.min.js"></script>
        <script src="<?=base_url('assets/portal/');?>/js/jquery-ui.min.js"></script>
        <script src="<?=base_url('assets/portal/');?>/js/jquery.backstretch.min.js"></script>
        <script src="<?=base_url('assets/portal/');?>/js/templatemo_script.js"></script>

    </body> 
</html>