<?php
/**
 * Created by PhpStorm.
 * User: Alex Donea
 * Date: 11/1/2017
 * Time: 15:04
 */




function getCount($val,$conn){
    //$queryLoad = 'SELECT COUNT(idReserve) as "rezultat" from reserveproduct where status='.$val.'and endDate="'.date("y-m-d").'"';
    $queryLoad="SELECT COUNT(idReserve) as \"rezultat\" from reserveproduct where `status`=".$val." and endDate='".date("y-m-d")."';";
    $result=$conn->query($queryLoad) or die ($conn->error);
    $row=mysqli_fetch_assoc($result);
    return $row['rezultat'];
    mysqli_close($conn);
}