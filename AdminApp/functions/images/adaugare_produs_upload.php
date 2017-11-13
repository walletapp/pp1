<?php


include 'databaseConnection.php';
include 'update_category.php';
include '../products/adaugare_produs.php';

if(isset($_FILES["file2"]["type"]))
{   $name=str_replace(" ","-",$_FILES["file2"]["name"]);
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $name);
    $file_extension = end($temporary);

    if ((($_FILES["file2"]["type"] == "image/png") || ($_FILES["file2"]["type"] == "image/jpg") || ($_FILES["file2"]["type"] == "image/jpeg")
        ) && ($_FILES["file2"]["size"] < 1000000000)//Approx. 100kb files can be uploaded.
        && in_array($file_extension, $validextensions)) {
        if ($_FILES["file2"]["error"] > 0)
        {
            echo "Eroare fisier: " . $_FILES["file2"]["error"] . "<br/><br/>";
        }
        else
        {
            if (file_exists("upload/products" . $name)) {
             //   echo $name . " <span id='invalid'><b>already exists.</b></span> ";
                if(!$name=="produs-default.png"){
                unlink("upload/products".$name);
                }
            //    echo "Produs creat cu succes!";
                $sourcePath = $_FILES['file2']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "upload/products".$name; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
               
                //updateCategory($_POST['valoare-input'],$name,$_POST['id-cat'],$conn);                
               adaugare_prod($_POST["nume-produse"], $_POST["getIDC"], $_POST["stoc-produse"], $_POST["pret-produse"],$name,$_POST["editor1"],$conn);
              }
            else
            {   
             //echo "Produs creat cu succes!";
                $sourcePath = $_FILES['file2']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "upload/products/".$name; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                
               // updateCategory($_POST['valoare-input'],$name,$_POST['id-cat'],$conn);
                 adaugare_prod($_POST["nume-produse"],$_POST["getIDC"], $_POST["stoc-produse"], $_POST["pret-produse"],$name,$_POST["editor1"],$conn);
             //  adaugare_cat($_POST['valoare-input'], $name,$conn);
            }
        }
    }
    else
    {   
        // echo "Produs creat cu succes!";
        adaugare_prod($_POST["nume-produse"],$_POST["getIDC"], $_POST["stoc-produse"], $_POST["pret-produse"],"produs-default.png",$_POST["editor1"],$conn);
    }
}

?>