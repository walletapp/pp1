<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../database/databaseConnection.php';



$query="Select *,user.firstName,user.lastName,user.email,user.phone from report 
        INNER JOIN user on report.idUser = user.userID
        where idReport=".$_POST['idReport'];


$rezultat=$conn->query($query) or die ($conn->eror);

$rowRaport= mysqli_fetch_assoc($rezultat);





?>

<div class="row">
    <div class="col-md-12">
         <div class="col-md-6">
             <label>Titlul raportului</label>
                     <p><?php echo $rowRaport['title'];?></p>
         </div>
         <div class="col-md-6">
             <label>Data</label>
                     <p><?php echo $rowRaport['date'].' , ora '.$rowRaport['time'];?></p>
         </div>
         <div class="col-md-12">
        <label>Motivul raportului</label>
                     <p><?php echo $rowRaport['message'];?></p>
        </div>
      
    </div>
      <div class="col-md-12">
            <div class="col-md-6">
       <label>Autor</label>
                     <p><?php echo $rowRaport['firstName'].' '.$rowRaport['lastName'];?></p>
            </div>
            <div class="col-md-6">
                 <label>Contact</label>
                     <p><?php echo $rowRaport['email'];?></p>
                     <label>Telefon</label>
                     <p><?php echo $rowRaport['phone'];?></p>
            </div>
    </div>
    
<!--    <div class="col-md-12">
       <div class="form-group">
                  <label>Titlul raspunsului</label>
                  <input class="form-control" placeholder="" type="text">
                  
                </div>
        <div class="form-group">
                  <label id="editor-raspuns">Mesaj</label>
                  <textarea id="editor-raspuns" name="editor-raspuns" rows="10" cols="80" style="visibility: hidden; display: none;">                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                </div>
    </div>-->
    
</div>