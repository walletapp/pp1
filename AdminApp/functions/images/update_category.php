<?php
/**
 * Created by PhpStorm.
 * User: Alex Donea
 * Date: 11/2/2017
 * Time: 14:46
 */







function updateCategory($desc,$poza,$id,$conn){
//    $desc = "bla1";
//    $poza = "poza_bla";
//    $id = 0;

    $query = 'UPDATE category SET categoryName="'.$desc.'", poza="'.$poza.'" WHERE  idCategory="'.$id.'";';


    $resultat = $conn->query($query) or die ($conn->error);


    if ($resultat) {
        echo "da";
    } else {
        echo "nu";
    }

    mysqli_close($conn);

}