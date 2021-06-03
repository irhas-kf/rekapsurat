<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?=base_url('theme/cpanel/assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('theme/cpanel/assets/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('theme/cpanel/assets/vendors/themify-icons/css/themify-icons.css');?>" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?=base_url('theme/cpanel/assets/css/main.css');?>" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="<?=base_url('theme/cpanel/assets/css/pages/auth-light.css');?>" rel="stylesheet" />
</head>

<body style="background-image: url('uploads/bglogin.jpg');">

    <div class="content">
      <div id="particle-container"></div>
        <div class="brand">
            <img src="<?=base_url('uploads/iconlogo.png');?>"/>
        </div>
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>
        <form id="login-form" action="<?=base_url('/login/auth');?>" method="post">
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                    <input class="form-control" type="text" name="username" placeholder="Username" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox">
                    <span class="input-span"></span>Remember me</label>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
            <div class="text-center">Belum Punya Akun?
                <a class="color-blue" href="<?php echo base_url();?>/register">Create accaunt</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="<?=base_url('theme/cpanel/assets/vendors/jquery/dist/jquery.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('theme/cpanel/assets/vendors/popper.js/dist/umd/popper.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('theme/cpanel/assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="<?=base_url('theme/cpanel/assets/vendors/jquery-validation/dist/jquery.validate.min.js');?>" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?=base_url('theme/cpanel/assets/js/app.js');?>" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->

    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>

</body>

</html>
