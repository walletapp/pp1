<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions/database/databaseConnection.php';

$pageSlider2="";
$results_per_page2=8;
    $pageSlider2="";
     if(!isset($_GET['pageProd'])){
      $pageSlider2=1;
    }
    else{
      $pageSlider2=$_GET['pageProd'];
    }
    $number_of_results2=mysqli_num_rows($conn->query("SELECT * FROM products"));
    $number_of_pages2=ceil($number_of_results2/$results_per_page2);
    $this_page_first_result2=($pageSlider2-1)*$results_per_page2;
    $result=$conn->query('Select * from products limit '.$this_page_first_result2.','.$results_per_page2.'');
while($row= mysqli_fetch_array($result)){
    



echo '<tr>
                  <td>'.$row['idProduct'].'</td>  
                   <td><img style="width:50px; border-radius:50%;" src="'.LOCATIE_PRODUSE.$row['icon'].'"></td>
                   <td>'.$row['nameProduct'].'</td>
                  <td>'.$row['stock'].'</td>
                  <td>'.$row['ingrediente'].'</td>
                  <td>'.$row['price'].' Lei</td>
                   <td> 
                       <a href="?m=modificare_produs&id='.$row['idProduct'].'"class="btn btn-app">
                Modificare
              </a></td>  
              <td>  <button style="float:right;" button type="button" name="'.$row['idProduct'].'" class="stergereProd btn btn-default">Ștergere</button></td>   
                </tr>';




}
 echo '<input type="hidden" id="pagina-principala2" value="'.$pageSlider2.'">'; 
       echo '<input type="hidden" id="total_numb2" value="'.$number_of_results2.'">';
        echo '<input type="hidden" id="total_results2" value="'.$results_per_page2.'">';


        mysqli_close($conn);