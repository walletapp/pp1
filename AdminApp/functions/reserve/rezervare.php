<?php include 'show_details.php';

 $pretTotal= str_replace(",", ".",$row2['pretTotal']);
 $pretTva=0;
 $pretTransport=0;
 $pretFinal=$pretTotal+$pretTva+$pretTransport;
$stare=$row2['stareProdus1'];
 ?>
<section class="invoice">
    <input type="hidden" id="id-rezervare" value="<?php echo $row2['idReserve']?>">
     <input type="hidden" id="id-user" value="<?php echo $row2['userID']?>">
     
     
    
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
              <i class="fa fa-globe"></i> &nbsp; Rezervare la Debbie's Yogurt [<?php echo $row2['shopName']?>]
              <small class="pull-right">&nbsp;Data: <strong><?php echo $row2['startDate'];?></strong></small>
               <small class="pull-right">Ora: <strong><?php echo $row2['startDateTime'];?></strong></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <p>
            Nume client:
          
            <strong><?php echo $row2['firstName']." ".$row2['lastName'];?></strong><br>
            Adresă: <?php echo $row2['adresaUser'];?><br>
            Telefon:<?php echo $row2['phone'];?><br>
            E-mail: <?php echo $row2['email'];?>
          </p>
        </div>
   
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Cod rezervare: <?php echo $row2['idReserve'];?></b><br>
          <b>Dată preluare:</b><?php echo $row2['endDate'];?><br>
          <b>Interval de preluare:</b> <?php echo $row2['endDateTime']." - ".$row2['endDateTime2'];?><br>
          <b>Locatie:</b> <?php echo $row2['shopName'].', '.$row2['address'];?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Poza</th>
              <th>Denumire produse</th>
              <th>Cantitate produs</th>
              <th>Preț produs</th>
              <th>Preț final</th>
            </tr>
            </thead>
            <tbody>
<!--            <tr>
                 <td>1</td>
              <td>1</td>
              <td>Call of Duty</td>
              <td>455-981-221</td>
              <td>El snort testosterone trophy driving gloves handsome</td>
             
            </tr>-->
                <?php include 'load_items.php';?>
            </tbody>
           
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
     <div class="col-xs-6 " style="float:left!important;">
         <?php
            if($stare=='2'){
                echo '<label><input id="notificare-client" type="checkbox">&nbsp;Notifică clientul &nbsp;[Mail]</label>'
                . '<div class="callout callout-success" style="max-width:300px!important;">
                <h4><i class="fa fa-check" aria-hidden="true"></i> &nbsp;Stare rezervare</h4>

                <p>Această rezervare a fost preluată cu succes!</p>
              </div>'
                . '<script>document.getElementById("notificare-client").disabled = true;</script>'
                        . '';
            }
            else{
                echo '<label><input id="notificare-client" type="checkbox">&nbsp;Notifică clientul &nbsp;[Mail]</label>';
            }
         
         ?>
         
         
        </div>
        <div class="col-xs-6 " style="float:right!important;">
         

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td> <?php echo $pretTotal;?> Lei</td>
              </tr>
              <tr>
                <th>TVA (0.00%)</th>
                <td>0 Lei</td>
              </tr>
              <tr>
                <th>Transport:</th>
                <td>0 Lei</td>
              </tr>
              <tr>
                <th>Preț total:</th>
                <td> <?php echo $pretFinal;?> Lei</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>  
      <div class="row no-print">
        <div class="col-xs-12">
         
           <?php
            if($stare=='2'){
                echo ' <button type="button" id="preluare-btn" class="btn btn-success pull-right"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp; Rezervare preluată
          </button>
          <button type="button" style="margin-right:16px;" id="comanda-btn" class="btn btn-success pull-right"><i class="fa fa-bell" aria-hidden="true"></i></i>&nbsp; Rezervare pregătită
          </button>'
                
                . '<script>document.getElementById("preluare-btn").disabled = true;'
                        . 'document.getElementById("comanda-btn").disabled = true;</script>'
                        . '';
            }
            else{
                echo '  <button type="button" id="preluare-btn" class="btn btn-success pull-right"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp; Rezervare preluată
          </button>
          <button type="button" style="margin-right:16px;" id="comanda-btn" class="btn btn-success pull-right"><i class="fa fa-bell" aria-hidden="true"></i></i>&nbsp; Rezervare pregătită
          </button>';
            }
         
         ?>
            
            
          
        </div>
      </div>
    </section>
<div id="dialog-confirm" title="Confirmare preluare">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Doriți să confirmați preluarea?</p>
</div> 
<div id="dialog-comanda" title="Confirmare produse">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Doriți să notificați clientul că produsele sunt pregatite de preluar?</p>
</div>  

	<script>
            
            
            $('#comanda-btn').click(function(){
                $( "#dialog-comanda" ).dialog({
			resizable: false,
			height: "auto",
			width: 400,
			modal: true,
                        autoOpen: true,
			buttons: {
				"Confirmare": function() {
					var titlu="Informatii despre rezervarea cu codul "+$('#id-rezervare').val();
                                        var message="Rezervarea dumneavoastră este pregătită pentru a fi preluata din magazinul nostru!"
                                            $.ajax({
            type: 'POST',
            url: 'functions/firebase/rezervare_pregatita.php',
            data:{"message":message,"title":titlu,"idUser":$('#id-user').val()},
            beforeSend: function() { 
               
                },
                success: function(data) {
                $.notify("Clientul a fost notificat prin aplicație!",{position:"bottom left",className:"success",gap:"6"});
                $("#dialog-comanda").dialog( "close" );
                //alert(data);
               //  window.location.href='?m=rezervari';
                 },
                error: function(xhr, status, error) {
  alert(xhr.responseText);
},
                complete: function(data) {
              //  alert("complet"+data);
                },
                dataType: 'html'
});
                                     //   alert("dada");
                                      
				},
				Anulare: function() {
					$( this ).dialog( "close" );
				}
			}
		});
                
            });
             $("#dialog-confirm").dialog({
      autoOpen: false,
      modal: true
    });
     $("#dialog-comanda").dialog({
      autoOpen: false,
      modal: true
    });
 
            $('#preluare-btn').click(function(){
                $( "#dialog-confirm" ).dialog({
			resizable: false,
			height: "auto",
			width: 400,
			modal: true,
                        autoOpen: true,
			buttons: {
				"Confirmare": function() {
					if($("#notificare-client").is(':checked')){
                                            $.ajax({
            type: 'POST',
            url: 'functions/firebase/sendNotification.php',
            data:{"idReservare":$('#id-rezervare').val(),"idStatus":"2","message":"mesaj test","title":"titlu test","idUser":$('#id-user').val()},
            beforeSend: function() { 
               
                },
                success: function(data) {
                $.notify("Rezervare preluata cu succes! Clientul a fost notificat prin mail și aplicație!",{position:"bottom left",className:"success",gap:"6"});
                $("#dialog-confirm").dialog( "close" );
                //alert(data);
               //  window.location.href='?m=rezervari';
                 },
                error: function(xhr, status, error) {
  alert(xhr.responseText);
},
                complete: function(data) {
              //  alert("complet"+data);
                },
                dataType: 'html'
})
                                        }
                                        else{
                                           
             $.ajax({
            type: 'POST',
            url: 'functions/reserve/updateReserve.php',
            data:{"idReservare":$('#id-rezervare').val(),"idStatus":"2"},
            beforeSend: function() { 
               
                },
                success: function(data) {
                 $.notify("Rezervare preluata cu succes! Clientul nu fost notificat!",{position:"bottom left",className:"warn",gap:"6"});
                $("#dialog-confirm").dialog( "close" );
                 // window.location.href='?m=rezervari';
                 },
                error: function(xhr, status, error) {
  alert(xhr.responseText);
},
                complete: function(data) {
              //  alert("complet"+data);
                },
                dataType: 'html'
});
                                        }
				},
				Anulare: function() {
					$( this ).dialog( "close" );
				}
			}
		});
                
            });
	
        </script>