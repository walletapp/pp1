<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'functions/database/databaseConnection.php';


$query="SELECT *,category.categoryName from products 
        INNER JOIN category on products.idCategory=category.idCategory
       where products.idProduct=".$_GET['id'];

$result=$conn->query($query) or die ($conn->error);

$rowP= mysqli_fetch_assoc($result);


mysqli_close($conn);