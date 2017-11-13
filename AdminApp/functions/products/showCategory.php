<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions/database/databaseConnection.php';

$pageSlider1="";
$results_per_page=8;
$valoare="";
$valaoreCautata="";
if(isset($_GET['valoareCautata2'])){
    $valaoreCautata=$_GET['valoareCautata2'];
}
    $pageSlider1="";
     if(!isset($_GET['pageCat'])){
      $pageSlider1=1;
    }
    else{
      $pageSlider1=$_GET['pageCat'];
    }
    $number_of_results=mysqli_num_rows($conn->query("SELECT * FROM category"));
    $number_of_pages=ceil($number_of_results/$results_per_page);
    $this_page_first_result=($pageSlider1-1)*$results_per_page;
    $result=$conn->query('select idCategory, categoryName,poza from category where idCategory like \'%'.$valaoreCautata.'%\' or categoryName like \'%'.$valaoreCautata.'%\' limit '.$this_page_first_result.','.$results_per_page.'');
while($row= mysqli_fetch_array($result)){
    

echo '  <tr>                    
                <td><img src="'.LOCATIE_CATEGORIE.$row['poza'].'" style="width:50px;border-radius:50%; height:50px;"></td>  
                <td>'.$row['idCategory'].'</td>
                  
                  <td>'.$row['categoryName'].'</td>
                  <td>  <a href="?m=modificare_categorie&id='.$row['idCategory'].'" style="float:right;" button type="button" class="btn btn-default">Modificare</a></td>  
                       <td>  <button style="float:right;" button type="button" name="'.$row['idCategory'].'" class="stergereCat  btn btn-default">Ștergere</button></td>   
       </tr>';

}
 echo '<input type="hidden" id="pagina-principala" value="'.$pageSlider1.'">'; 
       echo '<input type="hidden" id="total_numb" value="'.$number_of_results.'">';
        echo '<input type="hidden" id="total_results" value="'.$results_per_page.'">';


        mysqli_close($conn);