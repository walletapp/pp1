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

   // UPDATE `debbies_db`.`products` SET `idCategory`='61', `nameProduct`='aq', `price`='1w', `stock`='2e', `icon`='17504492_1256992464392241_42ee61106687985902598_o.jpg', `ingrediente`='<p>aa</p>\r\nee' WHERE  `idProduct`=127;

if (mysqli_query($conn, $interogatie)) {
    echo "Actualizate cu succes!";
} else {
    
    echo mysqli_error($conn);
}
mysqli_close($conn);
}