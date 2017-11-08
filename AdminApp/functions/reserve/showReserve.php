<?php

include 'databaseConnection.php';
$results_per_page=8;
    $page="";
     if(!isset($_GET['page'])){
      $page=1;
    }
    else{
      $page=$_GET['page'];
    }
    $number_of_results=mysqli_num_rows($conn->query("SELECT * FROM reserveproduct"));
    $number_of_pages=ceil($number_of_results/$results_per_page);
    $this_page_first_result=($page-1)*$results_per_page;
    

$idRezervare="";
    if(isset($_GET['cautare'])){
        $val=$_GET['cautare'];
         $number_of_pages=mysqli_num_rows($conn->query("select reserveproduct.idReserve,reserveproduct.idUser, `user`.firstName,`user`.lastName, reserveproduct.startDate, reserveproduct.endDate,reserveproduct.endDateTime, reserveproduct.endDateTime2,
reserveproduct.pretTotal,shop.shopName,shop.address, `status`.denumire_stare
from reserveproduct
INNER JOIN `user` on reserveproduct.idUser=`user`.userID
INNER JOIN  shop on reserveproduct.idShop=shop.idShop
INNER JOIN `status` on reserveproduct.`status`=`status`.id_status 
where 
reserveproduct.idReserve like '%".$val."%' OR
reserveproduct.idUser like '%".$val."%' OR
`user`.firstName like '%".$val."%'  OR
`user`.lastName like '%".$val."%' OR 
reserveproduct.startDate like '%".$val."%' OR
reserveproduct.endDate like '%".$val."%' OR
reserveproduct.endDateTime like '%".$val."%' OR
reserveproduct.endDateTime2 like '%".$val."%' OR
reserveproduct.pretTotal like '%".$val."%' OR
shop.shopName like '%".$val."%' OR
shop.address like '%".$val."%' OR
`status`.denumire_stare like '%".$val."%'
order by reserveproduct.idReserve desc"));
     $interogatieVedere="select reserveproduct.idReserve,reserveproduct.idUser, `user`.firstName,`user`.lastName, reserveproduct.startDate, reserveproduct.endDate,reserveproduct.endDateTime, reserveproduct.endDateTime2,
reserveproduct.pretTotal,shop.shopName,shop.address, `status`.denumire_stare
from reserveproduct
INNER JOIN `user` on reserveproduct.idUser=`user`.userID
INNER JOIN  shop on reserveproduct.idShop=shop.idShop
INNER JOIN `status` on reserveproduct.`status`=`status`.id_status 
where 
reserveproduct.idReserve like '%".$val."%' OR
reserveproduct.idUser like '%".$val."%' OR
`user`.firstName like '%".$val."%'  OR
`user`.lastName like '%".$val."%' OR 
reserveproduct.startDate like '%".$val."%' OR
reserveproduct.endDate like '%".$val."%' OR
reserveproduct.endDateTime like '%".$val."%' OR
reserveproduct.endDateTime2 like '%".$val."%' OR
reserveproduct.pretTotal like '%".$val."%' OR
shop.shopName like '%".$val."%' OR
shop.address like '%".$val."%' OR
`status`.denumire_stare like '%".$val."%'
order by reserveproduct.idReserve desc limit ".$this_page_first_result.",".$number_of_pages.";";   
    }
    else if(isset($_GET['status'])){
    if($_GET['status']=="1"){
            $interogatieVedere='select reserveproduct.idReserve,reserveproduct.idUser, `user`.firstName,`user`.lastName, reserveproduct.startDate,reserveproduct.endDate, reserveproduct.endDate,reserveproduct.endDateTime, reserveproduct.endDateTime2,
reserveproduct.pretTotal,shop.shopName,shop.address, `status`.denumire_stare
from reserveproduct
INNER JOIN `user` on reserveproduct.idUser=`user`.userID
INNER JOIN  shop on reserveproduct.idShop=shop.idShop
INNER JOIN `status` on reserveproduct.`status`=`status`.id_status order by reserveproduct.idReserve desc limit '.$this_page_first_result.','.$results_per_page.';';
        }
        else{
     $interogatieVedere='select reserveproduct.idReserve,reserveproduct.idUser, `user`.firstName,`user`.lastName, reserveproduct.startDate,reserveproduct.endDate, reserveproduct.endDate,reserveproduct.endDateTime, reserveproduct.endDateTime2,
reserveproduct.pretTotal,shop.shopName,shop.address, `status`.denumire_stare
from reserveproduct
INNER JOIN `user` on reserveproduct.idUser=`user`.userID
INNER JOIN  shop on reserveproduct.idShop=shop.idShop
INNER JOIN `status` on reserveproduct.`status`=`status`.id_status where reserveproduct.`status`='.$_GET['status'].' order by reserveproduct.idReserve desc limit '.$this_page_first_result.','.$results_per_page.';';   
        }
    }
    else{
          $interogatieVedere='select reserveproduct.idReserve,reserveproduct.idUser, `user`.firstName,`user`.lastName, reserveproduct.startDate,reserveproduct.endDate, reserveproduct.endDate,reserveproduct.endDateTime, reserveproduct.endDateTime2,
reserveproduct.pretTotal,shop.shopName,shop.address, `status`.denumire_stare
from reserveproduct
INNER JOIN `user` on reserveproduct.idUser=`user`.userID
INNER JOIN  shop on reserveproduct.idShop=shop.idShop
INNER JOIN `status` on reserveproduct.`status`=`status`.id_status order by reserveproduct.idReserve desc limit '.$this_page_first_result.','.$results_per_page.';';  
    }
    
    
   $rezultat=$conn->query($interogatieVedere) or die ($conn->error);


while($row= mysqli_fetch_array($rezultat)){
    
  
    
      echo ' <tr>
            <td>
           
            <div class="checkbox icheck">
                        <label>
                            <input name="valori_selectate" value="'.$row['idReserve'].'" type="checkbox">
                        </label>
                    </div>
                
            
            
            </td>
           <td >'.$row['idReserve'].'</td>
           <td>'.$row['firstName'].' '.$row['lastName'].'</td>
           <td>'.$row['startDate'].'</td>
           <td>'.$row['endDate'].'</td>
           <td>'.$row['endDateTime'].' - '.$row['endDateTime2'].'</td> 
               <td>'.$row['shopName'].', '.$row['address'].'</td>
              <td>'.$row['pretTotal'].'</td>
              <td>'.statusReserve($row['denumire_stare']).'</td>
              <td><a href="?m=rezervare&id='.$row['idReserve'].'"class="btn btn-app" style="padding:8px;">
                <i style="font-size:20px;" class="fa fa-pencil"></i> 
              </a></td>
          </tr>';
      

}
function statusReserve($val){

    switch($val){
        case "Preluat":
            return '<span class="label label-success">Preluat</span>';
            break;
        case "Anulat":
            return '<span class="label label-warning">Anulat</span>';
            break;
         case "Sters":
            return '<span class="label label-danger">Sters</span>';
            break;
        case "Confirmat":
            return '<span class="label label-primary">Confirmat</span>';
            break;
        case "Nepreluat":
            return '<span class="label label-danger">Nepreluat</span>';
            break;
        default:
            return $val;
            break;
     
    }
       
}

?>




