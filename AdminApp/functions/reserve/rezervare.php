<?php include 'show_details.php';
 $pretTotal=$row2['pretTotal'];
 $pretTva=0;
 $pretTransport=0;
 $pretFinal=$pretTotal+$pretTva+$pretTransport;
?>
<section class="invoice">
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
         <label><input type="checkbox">Notifică clientul</label>
         
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
         
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-check-circle" aria-hidden="true"></i> Rezervare preluata
          </button>
          
        </div>
      </div>
    </section>
   