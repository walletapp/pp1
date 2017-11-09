



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
                     <th>Edit   </th>
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
                <h4 class="modal-title">Adăugare produs</h4>
              </div>
              <div class="modal-body">
                 <div class="box-body">                 
                     <div class="row">
                         <div class="col-md-12"
                    <div class="form-group" >                  
                                           
                           <form id="uploadimage2" action="" method="post" enctype="multipart/form-data">
                            <div id="selectImage">
                                 
                                <label>Denumire produs</label> <p id="iscorectDenumire" style="float:right">Campul nu poate fi gol!</p>
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
                                 <label>Ingrediente</label>               
                                
                               
                               
                               
                               <textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
                              
            
                
              
           
                                <label>Stoc</label>  <p id="iscorectStoc" style="float:right">Campul nu poate fi gol!</p>
                               <input   style="margin-bottom:10px;" id="stoc-produse" type="text" name="stoc-produse" class="form-control" >
                                <label>Preț</label> <p id="iscorectPret" style="float:right">Campul nu poate fi gol!</p>
                               <input   style="margin-bottom:10px;" id="pret-produse" type="text" name="pret-produse" class="form-control" >
                               
                             
                             
                              <div class="row">
                                  <div class="col-md-6">
                                <label for="file2" class="btn btn-block btn-default" style="margin-bottom:10px; width:100%;">
                                    <i class="fa fa-upload" aria-hidden="true"></i> &nbsp;Încarcare imagine
                               </label>
                                         <input type="file" name="file2" id="file2"/>
                                  </div>
                               
                                  <div class="col-md-6">
                                      <button   style="margin-bottom:10px; width:100%;" class="btn btn-block btn-default" type="submit" class="submit" /><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Salvează</i>
                                </button> 
                                  </div>
                              </div>
                           </div>
                           </form>
                        
                  
                   <div id="message2">Stare:</div>
                       
                   </div>
                                <div class="col-md-12" style="text-align: center;">
                <div id="image_preview2" style="margin:20px; width:100px; height:100px; "><img id="previewing2" src="functions/images/upload/default.svg" /></div>
                     </div>
                     </div>
                       
        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Anulare</button>
                <button id="btnSubmit" type="button" class="btn btn-primary" disabled="">Adăugă</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>

          <!-- /.modal-dialog -->
        </div>

        <!-- /.modal -->
          
        
        
        <script>
      
   
   

    


    $(document).ready(function (e) {
       
function checkFlag(){
        var thestoc = checkifStoc("btnSubmit","iscorectStoc","stoc-produse");
        var theprice = checkifPret("btnSubmit","iscorectPret","pret-produse");
        var thename = checkifDenumireProdus("btnSubmit","iscorectDenumire","nume-produse");
        if (thestoc == 1 && theprice == 1 && thename == 1) {
          document.getElementById("btnSubmit").disabled = false;
        } else {
          document.getElementById("btnSubmit").disabled = true;
        }
      }

      $("#stoc-produse").keyup(function(){
        var var1 = checkifStoc("btnSubmit","iscorectStoc","stoc-produse");
        // console.log(var1);
        checkFlag();
    });


      $("#pret-produse").keyup(function(){
        var var2 = checkifPret("btnSubmit","iscorectPret","pret-produse");
        // console.log(var2);
        checkFlag();
      });

      $("#nume-produse").keyup(function(){
        checkifDenumireProdus("btnSubmit","iscorectDenumire","nume-produse");
        checkFlag();
      });




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
                    $('#loading').hide();
                    $("#message2").html(data);
                }
            });
        }));

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
   

</script>