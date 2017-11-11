<?php

include 'functions/database/databaseConnection.php';
$results_per_page=8;
    $page="";
     if(!isset($_GET['page'])){
      $page=1;
    }
    else{
      $page=$_GET['page'];
    }
    $number_of_results=mysqli_num_rows($conn->query("SELECT * FROM report"));
    $number_of_pages=ceil($number_of_results/$results_per_page);
    $this_page_first_result=($page-1)*$results_per_page;
    

$idRezervare="";
    if(isset($_GET['cautare'])){
$val=$_GET['cautare'];
$number_of_pages=mysqli_num_rows($conn->query("select report.idReport,user.firstName,user.lastName,report.message,report.title, report.`date` 
from report
INNER JOIN `user` on report.idUser=`user`.userID
where 
report.idReport like '%".$val."%' OR
user.firstName  like '%".$val."%' OR
user.lastName  like '%".$val."%' OR
report.message  like '%".$val."%' OR
report.title  like '%".$val."%' OR
report.`date`  like '%".$val."%'
order by report.idReport desc"));
     $interogatieVedere="select report.idReport,user.firstName,user.lastName,report.message,report.title, report.`date` 
from report
INNER JOIN `user` on report.idUser=`user`.userID
where 
report.idReport like '%".$val."%' OR
user.firstName  like '%".$val."%' OR
user.lastName  like '%".$val."%' OR
report.message  like '%".$val."%' OR
report.title  like '%".$val."%' OR
report.`date`  like '%".$val."%'
order by report.idReport desc limit ".$this_page_first_result.",".$number_of_pages.";";   
    }
   
    else{
          $interogatieVedere="select report.idReport,user.firstName,user.lastName,report.message,report.title, report.`date` 
from report
INNER JOIN `user` on report.idUser=`user`.userID
    order by report.idReport desc limit ".$this_page_first_result.",".$results_per_page.";";  
    }
    
    
   $rezultat=$conn->query($interogatieVedere) or die ($conn->error);


while($row= mysqli_fetch_array($rezultat)){
    
  
    
      echo ' <tr>
            <td>
           
            <div class="checkbox icheck">
                        <label>
                            <input name="valori_selectate" value="'.$row['idReport'].'" type="checkbox">
                        </label>
                    </div>
                
            
            
            </td>
           <td >'.$row['idReport'].'</td>
           <td>'.$row['firstName'].' '.$row['lastName'].'</td>
           <td>'.$row['date'].'</td>
           <td>'.$row['title'].'</td>    
           <td><button name="'.$row['idReport'].'" style="width:40px; height:40px;" type="button" class="vedereRaport btn btn-block btn-default"><i class="fa fa-eye" aria-hidden="true"></i>
</button></td>
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




