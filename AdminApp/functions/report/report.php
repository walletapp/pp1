
    <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border" style="padding-top: 20px; padding-bottom: 20px;">
              <h3 class="box-title">Raportul clientului</h3>

              <div class="box-tools pull-right" style="padding-top: 10px;">
                <div class="has-feedback" >
                   
                  <input type="text" id="cautare-casuta-input" class="form-control input-sm" placeholder="Căutare rapoarte">
                  <button id="cautare-casuta" class="glyphicon glyphicon-search form-control-feedback"></button>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->



                <div class="btn-group">

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
                    <td>Dată </td>
                    <td>Subiect</td>
                    <td></td>
                    </thead>
                  <tbody>
                  <?php include 'load_report.php'?>
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
               
                <div class="pull-right">
                  <?php echo 'Rapoarte totale   : <strong>'.$number_of_results.'</strong>';
                      echo '<input type="hidden" id="pagina-principala" value="'.$page.'">'; 
       echo '<input type="hidden" id="total_numb" value="'.$number_of_results.'">';
        echo '<input type="hidden" id="total_results" value="'.$results_per_page.'">';
                  ?>
                      <div id="demo-raport"></div>
                
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
            <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                  <div id="test-modal">
                      
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Anulare</button>
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
          </div>
       
        
    </div>


<script>
    $(function(){
        CKEDITOR.replace('editor1');
    });
    $('.vedereRaport').click(function(){
      
        var id=this.name;
        
        
         $.ajax({
            type: 'POST',
            url: 'functions/report/getReport.php',
            data:{"idReport":id},
            beforeSend: function() {
                
                $('.modal-title').html('Raport cu codul '+id);
                $('#modal-default').modal('toggle');
                },
                success: function(data) {
                   $('#test-modal').html(data);
                 },
                error: function(xhr) {
                     $('#test-modal').html(xhr);
},
                complete: function(data) {
            // alert(data);
                },
                dataType: 'html'
})
        
        
    });
    
    
    loadPaginator($('#total_results').val(),$('#total_numb').val(),$('#pagina-principala').val());
function loadPaginator(dim,totalnumb,pageNumb){
        // alert('dim='+dim+'  total='+totalnumb+'      actualPage='+pageNumb);
        var data=new Array();
        for(var i=0;i<totalnumb;i++){
         data.push(i);
        }
        
$('#demo-raport').pagination({        
    dataSource: data,
    pageSize: dim,
    totalNumber:totalnumb,
    pageNumber:pageNumb,
    callback: function(data, pagination) {
     
         
        
    },
    afterPageOnClick:function(data,pagination){
  
        window.location.href='?m=raport&e=activ5&page='+pagination;
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
$('#cautare-casuta').click(function(){
    window.location.href='?m=raport&e=activ5&cautare='+$('#cautare-casuta-input').val();
    });
</script>