<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function getActive1($val){
    if($val==1){
        echo "active";
    }
    else{
        echo " ";
    }
    
}

function getActive2($val){
    if($val==2){
        echo "active";
    }
    else{
        echo " ";
    }
    
}


function setActiveTab($val){
    if($val=='1'){
        echo '<li class="active"><a href="#tab_1" data-toggle="tab">Categorii/Meniu</a></li>
              <li><a href="#tab_2" data-toggle="tab">Produse</a></li>';
    }
    else{
       echo '<li><a href="#tab_1" data-toggle="tab">Categorii/Meniu</a></li>
              <li class="active"><a href="#tab_2" data-toggle="tab">Produse</a></li>';  
    }
}

