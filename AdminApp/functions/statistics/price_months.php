<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'functions/database/databaseConnection.php';

$queryMonths='SELECT IFNULL(sum(pretTotal),0) as "ian",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 2 and reserveproduct.`status`=2) as "feb",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 3 and reserveproduct.`status`=2) as "mar",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 4 and reserveproduct.`status`=2) as "apr",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 5 and reserveproduct.`status`=2) as "mai",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 6 and reserveproduct.`status`=2) as "iun",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 7 and reserveproduct.`status`=2) as "iul",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 8 and reserveproduct.`status`=2) as "aug",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 9 and reserveproduct.`status`=2) as "sept",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 10 and reserveproduct.`status`=2) as "oct",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 11 and reserveproduct.`status`=2) as "nov",
	(SELECT IFNULL(sum(pretTotal),0) FROM reserveproduct Where MONTH(reserveproduct.endDate) = 12 and reserveproduct.`status`=2) as "dec"
FROM reserveproduct Where  MONTH(reserveproduct.endDate) = 1 and reserveproduct.`status`=2;';

$resultat_luni=$conn->query($queryMonths);


$row_luni= mysqli_fetch_assoc($resultat_luni);
