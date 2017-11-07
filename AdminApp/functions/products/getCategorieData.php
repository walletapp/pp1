<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'functions/database/databaseConnection.php';


$query="SELECT * from category where idCategory=".$_GET['id'];

$result=$conn->query($query) or die ($conn->error);

$row= mysqli_fetch_assoc($result);