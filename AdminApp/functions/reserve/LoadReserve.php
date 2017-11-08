<?php include 'functions/database/databaseConnection.php';
      include 'loadDetails.php';
?>
<div class="row">

<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-loop-strong"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Rezervări în curs</span>
            <span class="info-box-number"><?php echo getCount("3",$conn)?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-checkmark-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Rezervări preluate</span>
                <span class="info-box-number"><?php echo getCount("2",$conn)?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="ion ion-ios-timer-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Rezervări nepreluate</span>
                <span class="info-box-number"><?php echo getCount("6",$conn)?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-close-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Rezervări anulate</span>
                <span class="info-box-number"><?php echo getCount("4",$conn)?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border" style="padding-top: 20px; padding-bottom: 20px;">
              <h3 class="box-title">Management rezervări</h3>

              <div class="box-tools pull-right" style="padding-top: 10px;">
                <div class="has-feedback" >
                  <input type="text" class="form-control input-sm" placeholder="Căutare rezervări">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->



                <div class="btn-group">

                  <button style="margin-right:10px;" type="button" class="btn btn-default btn-sm"><i class="fa fa-check"></i></button>
                  <button style="margin-right:10px;" type="button" class="btn btn-default btn-sm"><i class="fa fa-bell-o"></i></button>
                    <button  style="margin-right:10px;" id="delete-btn" type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    <button  style="margin-right:10px;" id="refresh-btn" type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                </div>
                <!-- /.btn-group -->

               
                <!-- /.pull-right -->
              </div>
                <div class="box-body table-responsive no-padding mailbox-messages">
                    <table class="table table-hover" style="min-height:400px;">
                    <thead>
                    <td>

                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>

                    </td>
                    <td>Cod</td>
                    <td>Nume și prenume</td>
                    <td>Dată plasare</td>
                    <td>Dată preluare</td>
                    <td>Interval de preluare</td>
                    <td>Oraș și adresă</td>
                    <td>Preț total</td>
                    <td>Stare rezervare</td>
                    </thead>
                  <tbody>
                  <?php include 'showReserve.php'?>
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  <?php echo 'Rezervări totale: <strong>'.$number_of_results.'</strong>';
                      echo '<input type="hidden" id="pagina-principala" value="'.$page.'">'; 
       echo '<input type="hidden" id="total_numb" value="'.$number_of_results.'">';
        echo '<input type="hidden" id="total_results" value="'.$results_per_page.'">';
                  ?>
                      <div id="demo"></div>
                
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
    </div>
          <!-- /. box -->
</div>
<div id="dialog-stergere" title="Confirmare preluare">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span><p id="set_nr_val">Total produse selectete:0</p>Doriți să confirmați stergerea?</p>
</div> 

<script>
     $("#dialog-stergere").dialog({
      autoOpen: false,
      modal: true
    });
    $('#refresh-btn').click(function(){
        window.location.reload();
    });
    $('#delete-btn').click(function(){
        var nrArray=new Array();
   $('input[name=valori_selectate]:checked').each(function() {
   nrArray.push(this.value); 
});
$('#set_nr_val').text("Rezervări selectate: "+nrArray.length);
 $( "#dialog-stergere" ).dialog({
			resizable: false,
			height: "auto",
			width: 400,
			modal: true,
                        autoOpen: true,
			buttons: {
				"Confirmare": function() {
					 
				},
				Anulare: function() {
					$( this ).dialog( "close" );
				}
			}
		});
    
    });
     loadPaginator($('#total_results').val(),$('#total_numb').val(),$('#pagina-principala').val());
function loadPaginator(dim,totalnumb,pageNumb){
        // alert('dim='+dim+'  total='+totalnumb+'      actualPage='+pageNumb);
        var data=new Array();
        for(var i=0;i<totalnumb;i++){
         data.push(i);
        }
        
$('#demo').pagination({        
    dataSource: data,
    pageSize: dim,
    totalNumber:totalnumb,
    pageNumber:pageNumb,
    callback: function(data, pagination) {
     
         
        
    },
    afterPageOnClick:function(data,pagination){
  
        window.location.href='?m=rezervari&page='+pagination;
        // $('.wrapper').load('functions/vedereRezervari.php?page='+pagination);
          // alert(pageNumb);
    }
    
  
});
}


  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });


</script>

