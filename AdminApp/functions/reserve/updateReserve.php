<?php
include '../database/databaseConnection.php';
$idReservare=$_POST['idReservare'];
$idStatus=$_POST['idStatus'];
$resultate='UPDATE reserveproduct set status='.$idStatus.' where idReserve="'.$idReservare.'"';
$finalQuery=$conn->query($resultate) or die($conn->error);
mysqli_close($conn);

