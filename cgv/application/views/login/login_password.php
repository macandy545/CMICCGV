<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login In | CGV</title>
    <link rel="icon" href="<?php echo base_url(); ?>webroot/images/logo.ico" type="image/x-icon">
    <link href="<?php echo base_url(); ?>webroot/css/online-fonts.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webroot/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webroot/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webroot/plugins/material-design-iconic-font/css/material-design-iconic-font.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webroot/plugins/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webroot/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webroot/css/icons2.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webroot/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>webroot/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>webroot/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>webroot/css/style.css" rel="stylesheet">
</head>
<style type="text/css">
    .login-design {
      background-color: transparent;
    }
    .login-header {
      color: #6a6868;
    }
</style>
<body class="login-page login-design">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="login-box">
        <div class="logo">
            <a href="#"><b class="login-header">CGV</b></a>
            <center><h4 class="login-header">Computerized Grade Viewer</span></h4>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?php echo base_url(); ?>login/check_password">
                    <?php if ($this->session->flashdata('alert')) { ?>
                        <?= $this->session->flashdata('alert') ?>
                    <?php } ?>
                    <div class="msg">Please Enter your Password</div>
                    <div class="media">
                        <div class="media-left">
                            <a href="javascript:void(0);">
                                <img class="media-object" src="<?php echo base_url() ?>webroot/images/<?php echo $admin_image; ?>" width="64" height="64">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $username; ?></h4> <?php echo $name; ?>
                            
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink" <?php if(isset($_POST['rememberme'])) echo "checked='checked'"; ?>>
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>webroot/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>webroot/plugins/node-waves/waves.js"></script>
    <script src="<?php echo base_url(); ?>webroot/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>webroot/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>webroot/js/pages/examples/sign-in.js"></script>
</body>

</html>