<?php


include 'databaseConnection.php';
include 'update_category.php';
include '../products/adaugare_categorie.php';

if(isset($_FILES["file"]["type"]))
{   $name=str_replace(" ","-",$_FILES["file"]["name"]);
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $name);
    $file_extension = end($temporary);

    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
        ) && ($_FILES["file"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
        && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        }
        else
        {
            if (file_exists("upload/category" . $name)) {
                echo $name . " <span id='invalid'><b>already exists.</b></span> ";
                if(!$name=="default-category.png"){
                unlink("upload/category".$name);
                }
               // echo "<span id='success'>Image Deleted Successfully...!!</span><br/>";
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "upload/category".$name; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                echo "Datele au fost actualizate cu succes!";
              
                //updateCategory($_POST['valoare-input'],$name,$_POST['id-cat'],$conn);
                
                adaugare_cat($_POST['valoare-input'], $name,$conn);
            }
            else
            {
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "upload/category/".$name; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
               // echo "Descrierea categoriei și imaginea au fost create cu succes!";
                
               // updateCategory($_POST['valoare-input'],$name,$_POST['id-cat'],$conn);
                
                adaugare_cat($_POST['valoare-input'], $name,$conn);
            }
        }
    }
    else
    {
       // echo "Categorie noua cu imagine default";    
                
        adaugare_cat($_POST['valoare-input'], "default-category.png",$conn);
    }
}
?>