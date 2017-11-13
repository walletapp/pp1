
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
                                 
                                <label>Denumire produs</label><small id="iscorectDenumire" class="label pull-right bg-red" style="float:right"></small>
                               <input   style="margin-bottom:10px;" id="nume-produse" type="text" name="nume-produse" value="<?php echo $rowP['nameProduct']?>" class="form-control">
                                <label>Categorie produs</label>
                                 <input type="hidden" value="<?php echo $rowP['idProduct']?>" name="id-p1" id="id-p1">
                                 <select class="form-control" name="getIDC" id="getIDC">
<!--                                     <option value="<?php echo $rowProwP['idCategory']?>"><?php echo $rowP['categoryName']?></option>
                                   -->
                                     <?php 
                                      include 'functions/database/databaseConnection.php';
                                        $bla=$conn->query("select idCategory,categoryName from category where NOT idCategory = 0") or die ($conn->error);
                                        while($rrow= mysqli_fetch_array($bla)){
                                            echo "<option value=\"".$rrow['idCategory']."\">".$rrow['categoryName']."</option>";
                                        }
                                     ?>
                                      
                        
                                </select>
                                <label>Ingrediente</label><small id="iscorectEdit" class="label pull-right bg-red" style="float:right"></small>             
                                <textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">
                                     <?php echo $rowP['ingrediente']?>
                                 </textarea><br>
                                
            
                
              
           
                                <label>Stoc</label><small id="iscorectStoc" class="label pull-right bg-red" style="float:right"></small>
                                <input   style="margin-bottom:10px;" id="stoc-produse" type="text" name="stoc-produse" class="form-control" value="<?php echo $rowP['stock']?>" > 
                                <label>Preț</label><small id="iscorectPret" class="label pull-right bg-red" style="float:right"></small>
                                <input   style="margin-bottom:10px;" id="pret-produse" type="text" name="pret-produse" class="form-control" value="<?php echo $rowP['price']?>">
                               
                             
                             
                              <div class="row">
                                  <div class="col-md-6">
                                <label for="file" class="btn btn-block btn-default" style="margin-bottom:10px; width:100%;">
                                    <i class="fa fa-upload" aria-hidden="true"></i> &nbsp;Încarcare imagine
                               </label>
                                         <input type="file" name="file" id="file"/>
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
                    <div id="image_preview2" style="margin:20px; "><img id="previewing2" src="<?php echo LOCATIE_PRODUSE.$rowP['icon']?>"/></div>
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

      // $("#stoc-produse").keyup(function(){
      //   var var1 = checkifStoc("btnSubmit","iscorectStoc","stoc-produse");
      // });

      // $("#pret-produse").keyup(function(){
      //   var var2 = checkifPret("btnSubmit","iscorectPret","pret-produse");
      // });

      // $("#nume-produse").keyup(function(){
      //   checkifDenumireProdus("btnSubmit","iscorectDenumire","nume-produse");
      // });


      $("#btnSubmit").click(function(e){
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
         // alert("1");
          $('#iscorectDenumire').text("Campul nu poate fi gol!");
        }else if(ingredientele==""){
          //  alert("2");
          e.preventDefault();
          $('#iscorectEdit').text("Campul nu poate fi gol!");
        }else if(stocul == false || stocul == ""){
          //  alert("3");
          e.preventDefault();
          $('#iscorectStoc').text("Sunt admise doar cifre!");
        }else if(pretul == false || pretul == ""){
          //  alert("4");
          e.preventDefault();
          $('#iscorectPret').text("Sunt admise doar cifre si un singur punct!");;
        }else{
          $("#uploadimage2").on('submit',(function(e) {
            //  alert("5");
            e.preventDefault();
            $("#message2").empty();
            $('#loading').show();
            $.ajax({
                url: "functions/images/ajax_php_prod.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    alert(data);
                }
            });
          }));
         
        }
    }); 
    });
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
      CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    
    });
   
   
   $('#submit-update').click(function(){
        alert($('#valoare-input').val());
        $.ajax({
    type: 'POST',
    url: "functions/products/updateCategory.php",
    data: {"descriere":$('#valoare-input').val(),"poza":"poza1","id":"0"},
    beforeSend: function() {
        
    },
    success: function(data) {
     
    },
    error: function(xhr) { // if error occured
      
        
    },
    complete: function() {
       
    },
    dataType: 'html'
});
    });
   
    $(function() {
              $("#file").change(function() {
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
              $("#file").css("color","green");
              $('#image_preview2').css("display", "block");
              $('#previewing2').attr('src', e.target.result);
              

              //$('#previewing').attr('height', '400px');
          };
   

</script>