<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Debbie's Yogurt</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <style>
            .buton-login{
                width:160px; position: relative; margin-left: -78px;margin-top:4px;
                color:#999999!important; border:solid 1px #d2d6de!important; background: white!important; border-radius:20px!important;
                transition: color 0.3s linear;
                -webkit-transition: color 0.3s linear;
                -moz-transition: color 0.3s linear;
                outline:none!important;
            }
            .buton-login:hover{
                background-color:#74c374!important;
                color:white!important;
                border:solid 1px #74c374!important;
                outline:none;
            }
            .logo{
                margin:20px;

            }
            .alert-dialog1{

                min-height: 90px;
            }
            .login-box-body{
                border-radius: 16px;
            }
            .logoBorder{
               text-align: center;
            }
            .footer-login{
                padding-top:20px;
                margin-top:20px;
                margin-left:-20px;
                margin-right:-20px;
                text-align:center;
                border-top:solid 1px #d2d6de;
            }
            .login-box-body{
                -webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.44);
                -moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.44);
                box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.44);
            }

        </style>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color:#74c374;">
<div class="login-box">
    <div class="login-logo">

    </div>
    <!-- /.login-logo -->

    <div class="login-box-body">
        <div class="logoBorder">
            <a href="https://www.debbies.ro" target="_blank">   <img src="images/logo-no-circle.png" class="logo"></a>

        </div>
        <div class="alert-dialog1">
            <?php include 'functions/login/checkLogin.php'; ?>
        </div>
        <form action="index.php" method="post">
            <div class="form-group has-feedback">
                <input style="border-radius: 12px;" type="text" class="form-control" placeholder="Nume de utilizator"  name="username">
                <span  class="glyphicon glyphicon-envelope form-control-feedback"  style="color:#74c374;"></span>
            </div>
            <div class="form-group has-feedback">
                <input style="border-radius: 12px;" type="password" class="form-control" placeholder="Parola"  name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#74c374;"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox">&nbsp;Reține datele
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat buton-login">Autentificare</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

<!--        <div class="social-auth-links text-center">-->
<!--            <p>- OR -</p>-->
<!--            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using-->
<!--                Facebook</a>-->
<!--            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using-->
<!--                Google+</a>-->
<!--        </div>-->
        <!-- /.social-auth-links -->
<!---->
<!--        <a href="#">I forgot my password</a><br>-->
<!--        <a href="register.html" class="text-center">Register a new membership</a>-->
        <div class="footer-login">
        <h5>&copy; 2017 &nbsp; <a style="color:black;" href="https://www.walletisimo.com" target="_blank">Wallet App</a> </h5>
    </div>
    </div>

    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
