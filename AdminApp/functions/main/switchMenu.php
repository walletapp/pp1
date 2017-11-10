<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function switchMenuShow($val){
    
    switch($val){
        case "rezervari":
            require_once 'functions/reserve/LoadReserve.php';
            break;
        case "rezervare":
            require_once 'functions/reserve/rezervare.php';
            break;
        case "gestiune":
        require_once 'functions/products/gestiune.php';
            break;
        case "modificare_categorie":
        require_once 'functions/products/modificare_categorie.php';
            break;
         case "modificare_produs":
        require_once 'functions/products/modificare_produs.php';
            break;
         case "newsletter":
        require_once 'functions/marketing/newsletter.php';
            break;
         case "acasa":
        require_once 'functions/statistics/home.php';
            break;
    }
    
}










