<?php
/**
 * Created by PhpStorm.
 * User: Alex Donea
 * Date: 11/2/2017
 * Time: 14:46
 */







function updateCategory($desc,$poza,$id,$conn){


    
    
   
    
    
    
    
    
    $query = 'UPDATE category SET categoryName="'.$desc.'", poza="'.$poza.'" WHERE  idCategory="'.$id.'";';


    $resultat = $conn->query($query) or die ($conn->error);


    if ($resultat) {
        echo "Stare: Categorie modificată cu succes!";
    } else {
        echo "Stare: Eroare la modificare";
    }

    mysqli_close($conn);
  
}