<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'functions/products/databaseConnection.php';

$query="Select categoryName from category";

$result=$conn->query($query) or die ($conn->error);

while ($rowCat= mysqli_fetch_array($result)){
    echo ' <option>'.$rowCat['categoryName'].'</option>';
}