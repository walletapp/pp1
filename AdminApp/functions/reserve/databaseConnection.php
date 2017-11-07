<?php

//========================
//    Debbie's Yoghurt
//  Powered by Wallet APP
//   www.walletisimo.com
//	  2017
//========================
$server="localhost";
$user="root";
$password="";
$database="debbies_db";

$conn=new mysqli($server,$user,$password,$database);    
if($conn->connect_error){
  //  die("Connection failed!".$conn->connect_error."<br>");
}
else{
   // echo 'Succesfully connected!<br>';
}