<div class="box-body">
  <div style="padding-bottom:10px;">
    <button  data-toggle="modal" data-target="#modal-default" style="width:140px;" type="button" class="btn btn-block btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Categorie noua</button>
  </div>
  <table class="table table-bordered">
    <tr>
      <th style="width: 60px">Poza</th>  
      <th style="width:220px">ID și ordine categorii în aplicație</th>
      <th>Denumire categorie</th>
      <th></th>
      <th></th>   
    </tr>
    <?php include 'showCategory.php';?>
  </table>
</div>
  <!-- /.box-body -->
<div class="box-footer clearfix">
  <div class="pagination pagination-sm no-margin pull-right">
    <div id="demo"></div>
  </div>
</div>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Categorie nouă</h4>
      </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group" >                
                  <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">                
                  <div id="image_preview" style="width:200px; height:200px; margin:10px auto;">
                  <img id="previewing" src="functions/images/upload/category/default-category.png" />
                </div>
              </div>
               <div id="selectImage">
                <label>
                </label><br>
                 <input  type="hidden" id="id-cat" name="id-cat" value="">
                <label>Denumire categorie</label><small id="iscorectTitlu" class="label pull-right bg-red"></small>
                      <input   style="margin-bottom:10px;" id="valoare-input" type="text" name="valoare-input" class="form-control" value="">
                      <div class="row">
                            <div class="col-md-4">
                                     <button type="button"  style=" width:100%;" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                         &nbsp;Anulare</button>
                      
                          </div>
                        <div class="col-md-4">
                          <label for="file" class="btn btn-block btn-default" style="margin-bottom:10px; width:100%;">
                            <i class="fa fa-upload" aria-hidden="true"></i> &nbsp;Încarcare imagine
                          </label>
                          <input type="file" name="file" id="file"/>
                        </div>
                        <div class="col-md-4">
                          <button  id="btnSubmit" style="margin-bottom:10px; width:100%;" class="btn btn-block btn-default" type="submit" class="submit">
                          <i class="fa fa-check-circle-o" aria-hidden="true"></i>
&nbsp;Creează categorie</i>
                          </button>
                          </div>
                        
                      </div>
                    </div>
                  </form>
<!--                <div id="message">Stare:</div>-->
                </div>
              </div>
             
            </div>
          </div>
<!--          <div class="modal-footer">
           
             <button type="button" class="btn btn-primary" id="btnAdauga">Adăugă</button> 
          </div>-->
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
</div>
     <div id="dialog-stergere-cat" title="Confirmare newsletter">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Sigur doriți să ștergeți categoria?
</div> 
<script>
       
    
      

    $(document).ready(function (e) {
      
 $(function () {
     $("#dialog-stergere-cat").dialog({
      autoOpen: false,
      modal: true
    });
   
  }); 

      $("#btnSubmit").click(function(e){
        
        if($("#valoare-input").val()==""){
          e.preventDefault();
          $('#iscorectTitlu').text("Titlul nu poate fi gol!");
        }else {
        $("#uploadimage").on('submit',(function(e) {
            e.preventDefault();
            $("#message").empty();
            $('#loading').show();
        
            $.ajax({
              url: "functions/images/adaugare_categorie_upload.php", // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,        // To send DOMDocument or non processed data file it is set to false
              success: function(data)   // A function to be called if request succeeds
              {
               
                alert(data);
                window.location.reload();
              }});
            
           
           
          }));
       }
     });
     

 $(function () {
     $("#dialog-stergere-cat").dialog({
      autoOpen: false,
      modal: true
    });
  
  }); 
        $(function() {
            $("#file").change(function() {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                {
                    $('#previewing').attr('src','noimage.png');
                    alert("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        
        function imageIsLoaded(e) {
            $("#file").css("color","green");
            $('#image_preview').css("display", "block");
            $('#previewing').attr('src', e.target.result);
            

            //$('#previewing').attr('height', '400px');
        };
    });
    
    
    $('.stergereCat').click(function(){
    var id=this.name;
          $( "#dialog-stergere-cat" ).dialog({
          resizable: false,
          height: "auto",
          width: 400,
          modal: true,
          autoOpen: true,
          buttons: {
            "Ștergere": function() {
              $.ajax({
                type: 'POST',
                url: 'functions/products/stergere_categorie.php',
                data:{"id":id},
                beforeSend: function() { 
                  $("#dialog-newsletter").dialog( "close" );
                  
                },
                success: function(data) {
                 
                 // alert(data);
                 $("#dialog-newsletter").dialog( "close" );
               window.location.reload(); 
                },
                error: function(xhr) {
                   alert(xhr.responseText);
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
        });
</script>