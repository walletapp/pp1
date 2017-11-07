<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../database/databaseConnection.php';


stergere($_POST['id'],$conn);


function stergere($id,$conn){
    
        $query="DELETE FROM category WHERE  idCategory='".$id."';";
    $rezultat=$conn->query($query) or die ($conn->error);
    if($rezultat==true){
        echo "Stergere realizata cu succes!";
    }
    else{
        echo "eroare, nu se poate sterge!";
    }
    
}

