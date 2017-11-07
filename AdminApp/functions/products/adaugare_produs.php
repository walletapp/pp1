<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function adaugare_prod($numeProduse,$idCat,$pret,$stock,$icon,$ingrediente,$conn){





$query1="INSERT INTO `products` (`idCategory`, `nameProduct`, `price`, `stock`,`icon`,`ingrediente`) VALUES ('".$idCat."', '".$numeProduse."', '".$pret."', '".$stock."','".$icon."','".$ingrediente."');";
 $resultat = $conn->query($query1) or die ($conn->error);

if(mysqli_affected_rows($conn)==true){
    echo "Produs adaugat cu succes!";
}
else{
    echo "eroare";
}
mysqli_close($conn);
}

