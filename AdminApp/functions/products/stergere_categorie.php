<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../database/databaseConnection.php';


stergere($_POST['id'],$conn);


function stergere($id,$conn){
     $query2="Select * from category where idCategory='".$id."';";
    $rezultat2=$conn->query($query2) or die ($conn->error);
    $val= mysqli_fetch_assoc($rezultat2);
    
        $query="DELETE FROM category WHERE  idCategory='".$id."';";
    $rezultat=$conn->query($query) or die ($conn->error);
    
    
 
    if($rezultat==true){
        if(!$val=="default-category.png"){
           unlink("../images/upload/category/".$val['poza']);
        }
        echo "Stergere realizata cu succes!";
    }
    else{
        echo "eroare, nu se poate sterge!";
    }
    
}

