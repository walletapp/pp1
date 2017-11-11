<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




include 'databaseConnection.php';
$query_badge='SELECT count(reserveproduct.idReserve) as "badge_numb" from reserveproduct where reserveproduct.`status`=3;';
$result_badge=$conn->query($query_badge) or die ($conn->error);
$badge_notif= mysqli_fetch_assoc($result_badge);
mysqli_close($conn);
 echo $badge_notif['badge_numb'];
