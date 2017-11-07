<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include 'functions/database/databaseConnection.php';

if(isset($_SESSION['status'])=='autentificat'){
    header('Location: admin.php');
}
else{
if(isset($_POST['username']) && isset($_POST['password'])){
    $pass=$_POST['password'];
    $username=$_POST['username'];
    check($username,$pass,$conn);
    mysqli_close($conn);
}
else{
    
//    echo '<h3 style="color:white; text-align:center;">Sesiune expirata</h3>';
}
}


function check($usr, $pass,$conn){
    
    
    $query='SELECT * from admins where username="'.$usr.'" and password="'.$pass.'";';
    $result=$conn->query($query) or die ($conn->error);
    $row= mysqli_num_rows($result);
    if($row>0){
       
        $_SESSION['admin']=$usr;
        $_SESSION['status']='autentificat';
         header('Location: admin.php');
        
    }    
    else{
        echo '  <div style="margin:0!important;"class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Eroare!</strong> Numele de utilizator sau parola sunt greșite!
  </div>';
    }
    

        
}

     function ifsessionExists(){
// check if session exists?
  if(!empty($_SESSION)){
    return true;
  }else{
    return false;
  }
 }