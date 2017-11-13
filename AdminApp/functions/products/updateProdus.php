<?php
  include '../database/databaseConnection.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
 
update($_POST['descriere'], $_POST['poza'],$_POST['id'],$conn);
function update($denumire,$poza,$id,$conn){

$interogatie="UPDATE category SET categoryName=\"".$denumire."\", poza=\"".$poza."\" where idCategory=".$id;

if (mysqli_query($conn, $interogatie)) {
    echo "Actualizate cu succes!";
} else {
    
    echo mysqli_error($conn);
}
mysqli_close($conn);
}