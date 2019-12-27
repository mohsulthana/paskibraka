<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Paskibraka</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="<?php echo base_url() ?>https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="<?= base_url('home');?>" class="btn btn-primary">Kembali ke Menu Utama</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>Silahkan LOGIN</h3>
                    <p>Paskibraka Sumatera Selatan</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo base_url() ?>Login/insert_login" method="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Username Anda" title="Please enter you username" required="" name="nama" id="nama" class="form-control">
                                <span class="help-block small">Pastikan Username Benar</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" name="password" id="password" class="form-control">
                                <span class="help-block small">Password Anda</span>
                            </div>
                            
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="<?php echo base_url() ?>/Login/register">Register</a>
                        </form>
                    </div>
                </div>
                 <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; 2019 <a href="https://colorlib.com/wp/templates/">Dispora Sumsel</a> All rights reserved.</p>
            </div>
        </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>

  