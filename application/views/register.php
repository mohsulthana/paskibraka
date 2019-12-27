<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | jeweler - Material Admin Template</title>
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
    <script src="<?php echo base_url() ?>js/vendor/modernizr-2.8.3.min.js"></script>
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
                    <a href="index.html" class="btn btn-primary">Kembali ke Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Registrasi</h3>
                    <p>Paskibraka Provinsi Sumatera Selatan</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo base_url() ?>/Login/insert_register" method="post" id="loginForm">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>NISN</label>
                                    <input name="nisn" type="text" class="form-control">
                                </div>
                                 <div class="form-group col-lg-12">
                                    <label>Nama Lengkap</label>
                                    <input name="namalengkap" type="text" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input name="nama" type="text" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn">Register</button>
                                <button class="btn btn-default"><a href="<?php echo base_url() ?>/Login"> Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; 2019 <a href="https://colorlib.com/wp/templates/">Dispora Sumsel</a> All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="<?php echo base_url() ?>js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url() ?>js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url() ?>js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url() ?>js/main.js"></script>
</body>

</html>