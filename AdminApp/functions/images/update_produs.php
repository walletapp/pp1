<?php
/**
 * Created by PhpStorm.
 * User: Alex Donea
 * Date: 11/2/2017
 * Time: 14:46
 */







function updateProdus($idProd,$numeProduse,$idCat,$pret,$stock,$icon,$ingrediente,$conn){


    
    
   
    
    
    
    
    
    $query = "UPDATE products SET idCategory='".$idCat."', nameProduct='".$numeProduse."', `price`='".$pret."', `stock`='".$stock."', `icon`='".$icon."',`ingrediente`='".$ingrediente."' WHERE  `idProduct`=".$idProd.";";


    $resultat = $conn->query($query) or die ($conn->error);


    if ($resultat) {
        echo "Stare: Produs modificată cu succes!";
    } else {
        echo "Stare: Eroare la modificare";
    }

    mysqli_close($conn);
  
}