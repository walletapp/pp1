<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../database/databaseConnection.php';


stergere_prod($_POST['id'],$conn);


function stergere_prod($id,$conn){
     $query2="Select * from products where idProduct='".$id."';";
    $rezultat2=$conn->query($query2) or die ($conn->error);
    $val= mysqli_fetch_assoc($rezultat2);
    
        $query="DELETE FROM products WHERE  idProduct='".$id."';";
    $rezultat=$conn->query($query) or die ($conn->error);
    
    
 
    if($rezultat==true){
        if(!$val=="produs-default.png"){
           unlink("../images/upload/products/".$val['icon']);
        }
        echo "Stergere realizata cu succe!";
    }
    else{
        echo "eroare, nu se poate sterge!";
    }
    
}

