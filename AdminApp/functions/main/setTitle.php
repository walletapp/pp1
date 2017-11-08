<?php
/**
 * Created by PhpStorm.
 * User: Alex Donea
 * Date: 11/1/2017
 * Time: 15:33
 */


function setTitle($val){
    switch($val){
        case "rezervari":
            return "Rezervări <small>Statistici actuale pentru data &nbsp; <strong>".date("d/m/Y")."</strong></small> ";
            break;
        case "rezervare":
            return "Rezerare cod:".$_GET['id'];
            break;
        case "gestiune":
            return "Management categorii și produse";
            break;
        case "modificare_categorie":
            return "Modificare categorie";
            break;
        case "modificare_produs":
            return "Modificare produs";
            break;
    }

}



function switchNavigation($val){
    switch($val){
        case "rezervari":
            return '<li><a href="?m=rezervari"><i class="fa fa-home"></i> Acasă</a></li>
        <li class="active">Rezervări</li>';
            break;
        case "rezervare":
            return '<li><a href="?m=rezervari"><i class="fa fa-home"></i> Acasă</a></li>
        <li class="active"><a href="?m=rezervari">Rezervări</a></li>
        <li class="active">Vedere rezervare</li>';
            break;
        case "gestiune":
            return '<li class="active">Panou gestiune</li>';
            break;
        case "modificare_categorie":
            return '
            <li class="active"><a href="?m=gestiune">Management categorii și produse</a></li>
            <li class="active">Modificare categorie</a></li>
            ';
            break;
        case "modificare_produs":
            return '
            <li class="active"><a href="?m=gestiune">Management categorii și produse</a></li>
            <li class="active">Modificare produs</a></li>
            ';
            break;
    }

}