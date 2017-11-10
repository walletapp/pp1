
<?php include 'getProductData.php';?>
<div class="box box-primary">
            <div class="box-header with-border">
               
                <h3 class="box-title">Modificare produs cu codul <?php echo $_GET['id']; ?></h3>
                  <div class="box-body">
                 
                <div class="row">
                         <div class="col-md-5"
                    <div class="form-group" >                  
                                           
                           <form id="uploadimage2" action="" method="post" enctype="multipart/form-data">
                            <div id="selectImage">
                                 
                                <label>Denumire produs</label> 
                                <p id="iscorectDenumire" style="float:right"></p>
                               <input   style="margin-bottom:10px;" id="nume-produse" type="text" name="nume-produse" value="<?php echo $rowP['nameProduct']?>" class="form-control">
                                <label>Categorie produs</label>
                                
                                 <select class="form-control" name="getIDC" id="getIDC">
                                     <option value="<?php echo $rowProwP['idCategory']?>">Categorie actuală:&nbsp;<?php echo $rowP['categoryName']?></option>
                                     <option disabled="">........................................</option>
                                     <?php 
                                      include 'functions/database/databaseConnection.php';
                                        $bla=$conn->query("select idCategory,categoryName from category where NOT idCategory = 0") or die ($conn->error);
                                        while($rrow= mysqli_fetch_array($bla)){
                                            echo "<option value=\"".$rrow['idCategory']."\">".$rrow['categoryName']."</option>";
                                        }
                                     ?>
                                      
                        
                                </select>
                                 <label>Ingrediente</label>  <p style="float:right" id="iscorectEdit"></p>             
                                
                               
                               
                               
                                 <textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">
                                     <?php echo $rowP['ingrediente']?>
                                 </textarea><br>
                                
            
                
              
           
                                <label>Stoc</label> <p style="float:right" id="iscorectStoc"></p>
                                <input   style="margin-bottom:10px;" id="stoc-produse" type="text" name="stoc-produse" class="form-control" value="<?php echo $rowP['stock']?>" > 
                                <label>Preț</label> <p style="float:right" id="iscorectPret"></p>
                                <input   style="margin-bottom:10px;" id="pret-produse" type="text" name="pret-produse" class="form-control" value="<?php echo $rowP['price']?>">
                               
                             
                             
                              <div class="row">
                                  <div class="col-md-6">
                                <label for="file2" class="btn btn-block btn-default" style="margin-bottom:10px; width:100%;">
                                    <i class="fa fa-upload" aria-hidden="true"></i> &nbsp;Încarcare imagine
                               </label>
                                         <input type="file" name="file2" id="file2"/>
                                  </div>
                               
                                  <div class="col-md-6">
                                      <button  id="btnSubmit" style="margin-bottom:10px; width:100%;" class="btn btn-block btn-default" type="submit" class="submit" /><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Salvează</i>
                                </button> 
                                  </div>
                              </div>
                           </div>
                           </form>
                        
                  
                   <div id="message2">Stare:</div>
                       
                   </div>
                          
                                <div class="col-md-7" style="text-align: center;">
                <div id="image_preview2" style="margin:20px; width:100px; height:100px; "><img id="previewing2" src=<?php echo $rowP['icon']?>/></div>
                     </div>
                     </div>
                       
        </div>


          </div>
 </div>



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
      });

      $("#pret-produse").keyup(function(){
        var var2 = checkifPret("btnSubmit","iscorectPret","pret-produse");
      });

      $("#nume-produse").keyup(function(){
        checkifDenumireProdus("btnSubmit","iscorectDenumire","nume-produse");
      });


      $("#btnSubmit").click(function(e){
        var stocul = /^\d+$/.test($("#stoc-produse").val());
        console.log("stocul :"+stocul);
        var pretul = /^[^.][\d]*\.?[\d]*$/.test($("#pret-produse").val());
        console.log("pretul :"+pretul);
        var ingredientele = CKEDITOR.instances.editor1.getData();
        if($("#nume-produse").val()==""){
          e.preventDefault();
          alert("DENUMIRE NASOALA");
        }else if(stocul == false || stocul == ""){
          e.preventDefault();
          alert("stoc?");
        }else if(pretul == false || pretul == ""){
          e.preventDefault();
          alert("pretul");
        }else if(ingredientele==""){
          e.preventDefault();
          alert("ingredientele!");
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
                    $('#loading').hide();
                    $("#message2").html(data);
                }
            });
          }));
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
        }
    }); 
    });
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
      CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    
    });
   

</script>