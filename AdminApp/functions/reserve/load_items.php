<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions/database/databaseConnection.php';
$query2='select products.icon,products.nameProduct, products.price, reserveitems.bucati, (products.price*reserveitems.bucati) as "totalP",info_produs
from reserveitems
INNER JOIN products on reserveitems.idProduct=products.idProduct
where reserveitems.idReserve='.$_GET['id'].';';
$val2=$conn->query($query2) or die ($conn->error);
 if($val2->num_rows>0){
        while($row2=$val2->fetch_assoc()){
        echo ' <tr>
                <td><img src="'.$row2['icon'].'" style="width:50px;height:50px;border-radius: 50%;"></td>
               <td>'.$row2['nameProduct'].'<br>'.$row2['info_produs'].'</td>
                <td>'.$row2['bucati'].'</td>
                <td>'.$row2['price'].'</td>
                <td>'.$row2['totalP'].'</td>
                   
           </tr>';
            
    }
        }
        mysqli_close($conn);