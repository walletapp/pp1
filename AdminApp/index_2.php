<!DOCTYPE html>
<?php 
ob_start();
session_start();?>

open the template in the editor.
-->
<html class="html-login">
    <head>
        <title>Debbie's Yogurt</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="dist/css/login.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="functions/javascript/pagination.js"></script>
  
    </head>
    <body>
       
        
         <div class="container container-content-login">
         <div class="center-login">
             <a href="index_2.php"><img src="images/logo-login.png" class="logo-login"></a>
         
        </div>
              <?php include 'functions/checkLogin.php'; ?>
        <form action="index_2.php" method="POST">
    <div class="form-group">
      <label class="text-login" for="email">Utilizator:</label>
      <input class="input-login"  type="text" class="form-control" id="email"  name="username">
    </div>
    <div class="form-group">
      <label class="text-login" for="pwd">Parola:</label>
      <input class="input-login" type="password" class="form-control" id="pwd"  name="password">
    </div>
    <div class="checkbox">
      <label class="text-login"><input  type="checkbox" name="remember"> Retine parola</label>
    </div>
            <div class="buton-position">
            <button class="buton-login" type="submit" class="btn btn-default"><strong>Autentificare</strong></button>
            </div>
        </form>
             <div class="footer-login">
                 <a href="http://www.debbies.ro" target="_blank">&copy; &nbsp; 2017 Debbie's Yogurt</a>
             </div>
</div>      
       
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
