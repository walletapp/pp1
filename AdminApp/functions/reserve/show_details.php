<?php
include 'functions/database/databaseConnection.php';
 $interogatieVedere2='select reserveproduct.idReserve,reserveproduct.idUser as "userID",`user`.address as "adresaUser",`user`.phone,`user`.email, `user`.firstName,`user`.lastName, reserveproduct.startDate, reserveproduct.startDateTime,reserveproduct.endDate, reserveproduct.endDate,reserveproduct.endDateTime, reserveproduct.endDateTime2,
reserveproduct.pretTotal,shop.shopName,shop.address, `status`.denumire_stare as "stare"
from reserveproduct
INNER JOIN `user` on reserveproduct.idUser=`user`.userID
INNER JOIN  shop on reserveproduct.idShop=shop.idShop
INNER JOIN `status` on reserveproduct.`status`=`status`.id_status
where idReserve='.$_GET['id'].';';
      $rezultat2=$conn->query($interogatieVedere2) or die ($conn->error);
      
  $row2= mysqli_fetch_assoc($rezultat2);