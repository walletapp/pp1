<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../database/databaseConnection.php';

$message=$_POST['message'];
$title=$_POST['title'];
$idUser=$_POST['idUser'];
$path_to_fcm='https://fcm.googleapis.com/fcm/send';
$server_key="AIzaSyAntNEblFsO9nI7jxJIyNGSyhGMmSaj7UM";
$tokenQuery="select `user`.token from `user` where `user`.userID=".$idUser.";";
$result=$conn->query($tokenQuery);
$row= mysqli_fetch_array($result);
$key=$row['token'];


$headers=array(
    'Authorization:key='.$server_key,
    'Content-Type:application/json'
);
$fiels=array(
    'to'=>$key,
    'notification'=>array('title'=>$title,'body'=>$message,'sound'=>'default','priority'=>'high'),
    );

$payload= json_encode($fiels);
$curl_session=curl_init();
curl_setopt($curl_session,CURLOPT_URL,$path_to_fcm);
curl_setopt($curl_session, CURLOPT_POST, true);
curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_session, CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);


$result= curl_exec($curl_session);