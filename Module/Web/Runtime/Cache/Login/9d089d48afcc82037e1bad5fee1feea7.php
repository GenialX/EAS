<?php if (!defined('THINK_PATH')) exit();?>a<!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title><?php echo C("LOGIN");?> - <?php echo C("APP_NAME");?> <?php echo C("APP_VERSION");?></title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="shortcut icon" href="/Public/images/favicon.ico" type="image/png">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="/Public/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/Public/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/Public/plugins/animate.css/animate.min.css">
        <link rel="stylesheet" href="/Public/plugins/iCheck/skins/all.css">
        <link rel="stylesheet" href="/Public/css/styles.css">
        <link rel="stylesheet" href="/Public/css/styles-responsive.css">
        <link rel="stylesheet" href="/Public/plugins/iCheck/skins/all.css">
        <!--[if IE 7]>
        <link rel="stylesheet" href="/Public/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="login">
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="logo">
                    <img src="/Public/images/gxblog-logo-white.png">
                </div>
                <!-- start: LOGIN BOX -->
                <div class="box-login">
                    <h3><?php echo C("LOGIN_WELCOME");?></h3>
                    <p>
                        <?php echo C("WELCOME_SUB");?>
                    </p>
                    <form id="form-login" class="form-login" action="/bootstrap.php/Login/Login/login" method="post">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-remove-sign"></i> <?php echo C("LOGIN_ERROR");?>
                        </div>
                        <fieldset>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="text" style="display:none" />
                                    <input type="text" class="form-control" name="ebes0csjd" id="ebes0csjd-input" autocomplete="off" placeholder="<?php echo C("USERNAME");?>">
                                    <i class="fa fa-user"></i> </span>
                            </div>
                            <div class="form-group form-actions">
                                <span class="input-icon">
                                    <input type="text" style="display:none" />
                                    <input type="password" class="form-control password"  name="do98jf7hs" id="do98jf7hs-input" autocomplete="off" placeholder="<?php echo C("PASSWORD");?>">
                                    <i class="fa fa-lock"></i>
                                    <a class="forgot" href="#">
                                        <?php echo C("FORGOT_PASSWORD");?>
                                    </a> </span>
                            </div>
                            <div class="form-actions">
                                <label for="remember" class="checkbox-inline">
                                    <input type="checkbox" class="grey remember" id="remember" name="remember">
                                    <?php echo C("KEEP_SIGNED");?>
                                </label>    
                                <button type="submit" class="btn btn-green pull-right">
                                    <?php echo C("LOGIN");?> <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                    <!-- start: COPYRIGHT -->
                    <div class="copyright">
                        <?php echo C("COPYRIGHT");?> <?php echo C("APP_VERSION");?>
                    </div>
                    <!-- end: COPYRIGHT -->
                </div>
                <!-- end: LOGIN BOX -->
                <!-- start: FORGOT BOX -->
                <div class="box-forgot">
                    <h3><?php echo C("FORGOT_PASSWORD");?></h3>
                    <p>
                        <?php echo C("ENTER_EMAIL");?>
                    </p>
                    <form id="form-forgot" class="form-forgot" action="/bootstrap.php/Login/Login/forgotPassword" method="post">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-remove-sign"></i> <?php echo C("LOGIN_ERROR");?>
                        </div>
                        <div class="email-sent alert alert-success no-display">
                            <i class="fa fa-remove-sign"></i> <?php echo C("EMAIL_SENT");?>
                        </div>
                        <div class="email-not-sent alert alert-warning no-display">
                            <i class="fa fa-remove-sign"></i> <?php echo C("EMAIL_NOT_SENT");?>
                        </div>
                        <fieldset>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="email" class="form-control" name="email" placeholder="<?php echo C("EMAIL");?>">
                                    <i class="fa fa-envelope"></i> </span>
                            </div>
                            <div class="form-actions">
                                <a class="btn btn-light-grey go-back">
                                    <i class="fa fa-chevron-circle-left"></i> <?php echo C("LOGIN");?>
                                </a>
                                <button type="submit" class="btn btn-green pull-right">
                                    <?php echo C("SUBMIT");?> <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                    <!-- start: COPYRIGHT -->
                    <div class="copyright">
                        <?php echo C("COPYRIGHT");?> <?php echo C("APP_VERSION");?>
                    </div>
                    <!-- end: COPYRIGHT -->
                </div>
                <!-- end: FORGOT BOX -->
                
            </div>
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="/Public/plugins/respond.min.js"></script>
        <script src="/Public/plugins/excanvas.min.js"></script>
        <script type="text/javascript" src="/Public/plugins/jQuery/jquery-1.11.1.min.js"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <script src="/Public/plugins/jQuery/jquery-2.1.1.min.js"></script>
        <!--<![endif]-->
        <script src="/Public/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="/Public/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/plugins/iCheck/jquery.icheck.min.js"></script>
        <script src="/Public/plugins/jquery.transit/jquery.transit.js"></script>
        <script src="/Public/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
        <script src="/Public/js/main.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="/Public/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="/Public/plugins/jquery-cookie/jquery.cookie.js"></script>
        <script src="__PUBLIC_COMMON__/js/jquery.md5.js"></script>
        <script src="/Public/js/login.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function() {
                var cn = '<?php echo C("LOAD_EXT_CONFIG");?>';
                var root = '/bootstrap.php/Login';
                if(cn == "lang-cn") cn = true;
                else cn = false;
                Main.init();
                Login.init(cn,root);
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>