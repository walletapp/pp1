<div class="row" >
    <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="padding-top: 20px; padding-bottom: 20px;">
              <h3 class="box-title">Newsletter</h3>

             
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
<<<<<<< HEAD
                <button  style="width:200px;" id="trimite-buton" type="button" class="btn btn-block btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Trimite</button
=======

                <button style="width:200px;" id="trimite-buton" type="button" class="btn btn-block btn-default">Trimite</button>
>>>>>>> c5a454f9686b009671077593860bd44d1243365c
            
                                
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

  

  $("#editorrrul").click(function(){
    alert(CKEDITOR.instances.editor1.getData());
  });

 

  $("#titlu-news").keyup(function(){
    checkifDenumireProdus("trimite-buton","iscorectTitlu","titlu-news");

  });

    

  $('#trimite-buton').click(function(){
    var var1 = checkifDenumireProdus("trimite-buton","iscorectTitlu","titlu-news");
    var var2 = 0;
    if(var1 == 0){
        console.log("Titlul nu pote fi gol!");
      }else if(var1 = 1){
        if(CKEDITOR.instances.editor1.getData()==""){
          console.log("Mesajul nu poate fi gol!");
        }else{
            console.log("trimite mesaj cu textul: " + CKEDITOR.instances.editor1.getData() + "si titlul: " + $("#titlu-news").val());
        }
  }
  });
  
  

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
     $("#dialog-newsletter").dialog({
      autoOpen: false,
      modal: true
    });
    CKEDITOR.replace('editor1');
    });


     $('#trimite-buton').click(function(){
         
             $( "#dialog-newsletter" ).dialog({
			resizable: false,
			height: "auto",
			width: 400,
			modal: true,
                        autoOpen: true,
			buttons: {
				"Confirmare": function(e) {
                                   
					
                                            $.ajax({
            type: 'POST',
            url: 'functions/phpMailer/mail_clienti.php',
            data:{"message":CKEDITOR.instances['editor1'].getData(),"title":$('#titlu-news').val()},
           beforeSend: function() { 
                $("#dialog-newsletter").dialog( "close" );
                },
                success: function(data) {
                alert(data);
               
                alert(data);
               
                 },
                error: function(xhr, status, error) {
  //alert(xhr.responseText);
},
                complete: function(data) {
              //  alert(data);
              
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
         
         
         
         
         
   
         return false;
       
    });


     $('#trimite-buton').click(function(){
         
             $( "#dialog-newsletter" ).dialog({
			resizable: false,
			height: "auto",
			width: 400,
			modal: true,
                        autoOpen: true,
			buttons: {
				"Confirmare": function(e) {
                                   
					
                                            $.ajax({
            type: 'POST',
            url: 'functions/phpMailer/mail_clienti.php',
            data:{"message":CKEDITOR.instances['editor1'].getData(),"title":$('#titlu-news').val()},
           beforeSend: function() { 
                $("#dialog-newsletter").dialog( "close" );
                },
                success: function(data) {
                alert(data);
               
                alert(data);
               
                 },
                error: function(xhr, status, error) {
  //alert(xhr.responseText);
},
                complete: function(data) {
              //  alert(data);
              
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
         
         
         
         
         
   
         return false;
       
    });
 
    </script>