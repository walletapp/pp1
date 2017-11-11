<div class="row" >
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="padding-top: 20px; padding-bottom: 20px;">
              <h3 class="box-title">Creare newsletter pentru toți clienți</h3>

             
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->

                <div class="form-group">
                  <label>Titlul mesajului</label> <p id="iscorectTitlu" style="float:right">Campul nu poate fi gol!</p>
                  <input class="form-control" id="titlu-news" placeholder="" type="text">
                </div>
                 <div class="form-group">
                  <label>Mesajul</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">
                   
                   </textarea>
                </div>  
                <!-- /.pull-right -->
              </div>

                <button  style="width:200px;" id="trimite-buton" type="button" class="btn btn-block btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Trimite</button>


              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
            </div>
          </div>
    </div>
</div>
<div id="dialog-newsletter" title="Confirmare newsletter">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span><p id="set_nr_val">Atentie! Se va trimite mail la toti clienti inregistrați!
</div> 

<script>

  $("#titlu-news").keyup(function(){
    checkifDenumireProdus("trimite-buton","iscorectTitlu","titlu-news");

  });

  $(function () {
     $("#dialog-newsletter").dialog({
      autoOpen: false,
      modal: true
    });
    CKEDITOR.replace('editor1');
  });  
  
  $('#trimite-buton').click(function(e){
    if($("#titlu-news").val()==""){
      console.log("titlul nu poate fi gol");
    }else{
      if(CKEDITOR.instances.editor1.getData()==""){
      console.log("mesaj gol!");
      }else{
        $( "#dialog-newsletter" ).dialog({
          resizable: false,
          height: "auto",
          width: 400,
          modal: true,
          autoOpen: true,
          buttons: {
            "Confirmare": function() {
              $.ajax({
                type: 'POST',
                url: 'functions/phpMailer/mail_clienti.php',
                data:{"message":CKEDITOR.instances['editor1'].getData(),"title":$('#titlu-news').val()},
                beforeSend: function() { 
                  $("#dialog-newsletter").dialog( "close" );
                },
                success: function(data) {
                  alert(data);
                },
                error: function(xhr) {
                  // alert(xhr.responseText);
                },
                complete: function(data) {
                  // alert(data);             
                }
              });
            },
            Anulare: function() {
              $( this ).dialog( "close" );
            }
          }
        });
      }
    }
    
  });

    </script>