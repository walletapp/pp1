<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function adaugare_cat($descriere,$poza,$conn){





$query1="INSERT INTO `debbies_db`.`category` (`categoryName`, `poza`) VALUES ('".$descriere."', '".$poza."');";
 $resultat = $conn->query($query1) or die ($conn->error);

if(mysqli_affected_rows($conn)==true){
    echo "Categorie adaugata cu succes!";
}
else{
    echo "eroare";
}
mysqli_close($conn);
}

