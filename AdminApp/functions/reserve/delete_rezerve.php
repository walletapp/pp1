<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../database/DatabaseConnection.php';

$id=$_POST['idRezerve'];

$query='DELETE FROM reserveproduct WHERE  idReserve='.$id.';';
$query2='DELETE FROM reserveitems WHERE  idReserve='.$id.';';

$rezultat2=$conn->query($query2);

if($rezultat2==true){
    $conn->query($query);
    echo "sters tot";
}



mysqli_close($conn);