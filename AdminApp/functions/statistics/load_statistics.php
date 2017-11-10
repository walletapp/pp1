<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'functions/database/databaseConnection.php';

$query='select count(user.userID) as "total_utilizatori",
		 (select count(user.`status`) from user where user.`status`="logged") as "utilizatori_online",
		  (select count(user.`status`) from user where user.`status`="unlogged") as "utilizatori_offline",
		(select count(favourite.id_produs_favorit) from favourite ) as "produse_favorite",
			(select count(cart.idCart) from cart ) as "produse_in_cos",
				(select count(products.idProduct) from products ) as "total_produse",
					(select count(category.idCategory) from category ) as "total_categori",
					(select count(review.idReview) from review ) as "total_review",
					(select count(shop.idShop) from shop ) as "total_magazine",
					(select count(report.idReport) from report ) as "report",
					(select count(reserveproduct.idReserve) from reserveproduct ) as "total_rezervari",
					 (select count(reserveproduct.idReserve) from reserveproduct where reserveproduct.`status`="2") as "rezervari_preluate",
					 (select count(reserveproduct.idReserve) from reserveproduct where reserveproduct.`status`="3") as "rezervari_confirmate",
					 (select count(reserveproduct.idReserve) from reserveproduct where reserveproduct.`status`="4") as "rezervari_anulate",
					 (select count(reserveproduct.idReserve) from reserveproduct where reserveproduct.`status`="5") as "rezervari_sterse",
					 (select count(reserveproduct.idReserve) from reserveproduct where reserveproduct.`status`="6") as "rezervari_nepreluate"
 from user;';


$rezultat=$conn->query($query);
$rowStatistics= mysqli_fetch_assoc($rezultat);