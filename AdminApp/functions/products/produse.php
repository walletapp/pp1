



 <div class="box-body">
     <div style="padding-bottom:10px;">
         <button style="width:140px;" data-toggle="modal" data-target="#modal-default2"  type="button" class="btn btn-block btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Produs nou</button>
     </div>
              
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Poza</th>
                  <th>Descriere</th>
                  <th>Stoc</th>
                   <th>Ingrediente</th>
                   <th>Pret</th>
                     <th> </th>
                </tr>
                
                <?php include 'showProducts.php';?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pagination pagination-sm no-margin pull-right">
               <div id="demo2"></div>
              </div>
            </div>
            
            
            
   
            
            
          
            
            <div class="modal fade" id="modal-default2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Produs nou</h4>
              </div>
              <div class="modal-body">
                 <div class="box-body">                 
                     <div class="row">
                         <div class="col-md-12"
                    <div class="form-group" >                  
                                           
                           <form id="uploadimage2" action="" method="post" enctype="multipart/form-data">
                            <div id="selectImage">
                                 
                                <label>Denumire produs</label><small id="iscorectDenumire" class="label pull-right bg-red" style="float:right"></small> 
                               <input   style="margin-bottom:10px;" id="nume-produse" type="text" name="nume-produse" class="form-control">
                                <label>Categorie produs</label>
                                
                                 <select class="form-control" name="getIDC" id="getIDC">
                                     <?php 
                                      include 'functions/database/databaseConnection.php';
                                        $bla=$conn->query("select idCategory,categoryName from category where not idCategory = 0") or die ($conn->error);
                                        while($rrow= mysqli_fetch_array($bla)){
                                            echo "<option value=\"".$rrow['idCategory']."\">".$rrow['categoryName']."</option>";
                                        }
                                     ?>
                                      
                        
                                </select>
                                 <label>Ingrediente</label> <small id="iscorectEdit" class="label pull-right bg-red" style="float:right"></small>              
                                
                               
                               
                               
                               <textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
                              
            
                
              
           
                                <label>Stoc</label><small id="iscorectStoc" class="label pull-right bg-red" style="float:right"></small> 
                               <input   style="margin-bottom:10px;" id="stoc-produse" type="text" name="stoc-produse" class="form-control" >
                                <label>Preț</label><small id="iscorectPret" class="label pull-right bg-red" style="float:right"></small>
                               <input   style="margin-bottom:10px;" id="pret-produse" type="text" name="pret-produse" class="form-control" >
                               
                             
                             
                              <div class="row">
                                  <div class="col-md-12" >
                <div id="image_preview2" style="margin:20px auto; width:200px; height:200px; "><img id="previewing2" src="functions/images/upload/products/produs-default.png" /></div>
                     </div>
                                  <div class="col-md-4">
                                    <button type="button" style="width:100%;" class="btn btn-default pull-left" data-dismiss="modal">Anulare</button>
                                  </div>
                                  <div class="col-md-4">
                                <label for="file2" class="btn btn-block btn-default" style="margin-bottom:10px; width:100%;">
                                    <i class="fa fa-upload" aria-hidden="true"></i> &nbsp;Încarcare imagine
                               </label>
                                         <input type="file" name="file2" id="file2"/>
                                  </div>
                               
                                  <div class="col-md-4">
                                      <button  id="btnSubmit2"  style="margin-bottom:10px; width:100%;" class="btn btn-block btn-default" type="submit" class="submit" /><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Salvează</i>
                                </button> 
                                  </div>
                              </div>
                           </div>
                           </form>
                        
                  
                   <div id="message2">Stare:</div>
                       
                   </div>
                                
                     </div>
                       
        </div>
              </div>
<!--              <div class="modal-footer">
                  
              </div>-->
            </div>
            <!-- /.modal-content -->
          </div>

          <!-- /.modal-dialog -->
        </div>

        <!-- /.modal -->
          
         <div id="dialog-stergere-prod" title="Confirmare newsletter">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Sigur doriți să ștergeți categoria?
</div> 
        
        <script>
      
   
   

    


    $(document).ready(function (e) {
        $("#dialog-stergere-prod").dialog({
      autoOpen: false,
      modal: true
    });
     $("#btnSubmit2").click(function(e){
      $('#iscorectDenumire').text("");
      $('#iscorectStoc').text("");
      $('#iscorectPret').text("");
      $('#iscorectEdit').text("");
      var stocul = /^\d+$/.test($("#stoc-produse").val());
      // console.log("stocul :"+stocul);
      var pretul = /^[^.][\d]*\.?[\d]*$/.test($("#pret-produse").val());
      // console.log("pretul :"+pretul);
      var ingredientele = CKEDITOR.instances.editor1.getData();
      if($("#nume-produse").val()==""){
        e.preventDefault();
        $('#iscorectDenumire').text("Campul nu poate fi gol!");
      }else if(ingredientele==""){
        e.preventDefault();
        $('#iscorectEdit').text("Campul nu poate fi gol!");
      }else if(stocul == false || stocul == ""){
        e.preventDefault();
        $('#iscorectStoc').text("Sunt admise doar cifre!");
      }else if(pretul == false || pretul == ""){
        e.preventDefault();
        $('#iscorectPret').text("Sunt admise doar cifre si un singur punct!");;
      }else{
          $("#uploadimage2").on('submit',(function(e) {
            e.preventDefault();
            $("#message2").empty();
            $('#loading').show();
            $.ajax({
                url: "functions/images/adaugare_produs_upload.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                   // $('#loading').hide();
                  //  $("#message2").html(data);
                  alert(data);
                  window.location.reload();
                }
            });
        }));
        }
      });

// Function to preview image after validation
        $(function() {
            $("#file2").change(function() {
                $("#message2").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                {
                    $('#previewing2').attr('src','noimage.png');
                    $("#message2").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
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
            $("#file2").css("color","green");
            $('#image_preview2').css("display", "block");
            $('#previewing2').attr('src', e.target.result);
            

            //$('#previewing').attr('height', '400px');
        };
    }); $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    
  })
   
   
   
     $('.stergereProd').click(function(){
    var id=this.name;
   //alert(this.name);
          $( "#dialog-stergere-prod" ).dialog({
          resizable: false,
          height: "auto",
          width: 400,
          modal: true,
          autoOpen: true,
          buttons: {
            "Ștergere": function() {
              $.ajax({
                type: 'POST',
                url: 'functions/products/stergere_produs.php',
                data:{"id":id},
                beforeSend: function() { 
                  $("#dialog-stergere-prod").dialog( "close" );
                  
                },
                success: function(data) {
                 
                  alert(data);
                 $("#dialog-stergere-prod").dialog( "close" );
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