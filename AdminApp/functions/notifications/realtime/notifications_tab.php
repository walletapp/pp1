<?php
include 'databaseConnection.php';

showNotif($conn);

function showNotif($conn){
    
    $query='select reserveproduct.idReserve,reserveproduct.startDate, TIME_FORMAT(reserveproduct.startDateTime, \'%H:%i\') as "startDateTime",`user`.firstName, `user`.lastName, reserveproduct.endDate, reserveproduct.endDateTime,reserveproduct.endDateTime2, `status`.denumire_stare from reserveproduct
INNER JOIN `user` on reserveproduct.idUser=`user`.userID 
INNER JOIN `status` on reserveproduct.`status`=`status`.id_status 
where reserveproduct.`status`=3 OR  reserveproduct.`status`=4 OR reserveproduct.`status`=5 order by reserveproduct.startDate desc limit 8;';
    $result=$conn->query($query) or die ($conn->error);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
         
         
         
         echo ' <li>
                   
                    <a href="admin.php?m=rezervare&id='.$row['idReserve'].'"><i class="ion ion-person"></i>&nbsp;
                      <strong>['.$row['startDateTime'].'] </strong>'.$row['firstName'].' '.$row['lastName'].' a <strong>'.stare($row['denumire_stare']).'</strong><br> rezervarea cu numărul <strong>'.$row['idReserve'].'</strong>!   
                    </a>
                  </li>';
         
        }
    }
    else{
         echo ' <li>
                  <h4 style="text-align:center;">Nu există notificări!</h4><br>
                </li>'; 
    }
    
}


function stare($val){
    switch($val){
        case "Confirmat":
            return "confirmat";
            break;
        case "Anulat":
            return "anulat";
            break;
        case "Sters":
            return "șters";
            break;
        case "Prealuat":
            return "preluat";
            break;
        case "Nepreluat":
            return "nu a preluat";
            break;
            
        
    }
}