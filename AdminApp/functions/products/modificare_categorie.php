<?php include 'getCategorieData.php';?> 
<!--<div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>-->
<div class="row">
<div class="col-md-4">
<div class="box box-primary">
    <div class="box-header with-border">               
        <h3 class="box-title">Modificare categorie cu codul <?php echo $_GET['id']; ?></h3>
        

        
    </div>
    <div class="box-body">                 
              
                    <div class="form-group" >                  
                        <label>Denumire categorie</label> <p id="iscorectDenumire" style="float:right;margin: 0px;"></p>                      
                           <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                            <div id="selectImage">
                               <input  type="hidden" id="id-cat" name="id-cat" value="<?php echo $_GET['id'];?>">
                               <input   style="margin-bottom:10px;" id="valoare-input" type="text" name="valoare-input" class="form-control" value="<?php echo $row['categoryName']?>">
                              <div class="row">
                                  <div class="col-md-6">
                                <label for="file" class="btn btn-block btn-default" style="margin-bottom:10px; width:100%;">
                                    <i class="fa fa-upload" aria-hidden="true"></i> &nbsp;Încarcare imagine
                               </label>
                                         <input type="file" name="file" id="file"/>
                                  </div>
                               
                                  <div class="col-md-6">
                                      <button id="btnSubmit"  style="margin-bottom:10px; width:100%;" class="btn btn-block btn-default" type="submit" class="submit" /><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Salvează</i>
                                </button> 
                                  </div>
                                                      </div>
                           </div>
                           </form>
                        
                  
                   <div id="message">Stare:</div>
                       
                   </div>
            
               
                     
        </div>
 </div>
</div>
<div class="col-md-8">
<div class="box box-primary">
  <div class="align-icon-category">
        <div class="box-header with-border">      
      <h3 class="box-title">Imagine categorie</h3>
       
        </div>
       <div class="box-body">       
           <div id="image_preview" style="margin:20px;"><img id="previewing" src="<?php echo LOCATIE_CATEGORIE.$row['poza']?>" />
              
           </div>
            <div class="clear:both;"></div>
           <p><?php echo $row['poza'] ?></p>
           
       </div>
      <div>
</div>
</div>
</div>
</div>
</div>
<script>


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

    


    $(document).ready(function (e) {




      $("#valoare-input").keyup(function(){
        checkifDenumireProdus("btnSubmit","iscorectDenumire","valoare-input");
      });



      $("#btnSubmit").click(function(e){

        if($("#valoare-input").val()==""){
          e.preventDefault();
          alert("Denumire nasoala");
        }else{

          $("#uploadimage").on('submit',(function(e) {
              e.preventDefault();
              $("#message").empty();
              $('#loading').show();
              $.ajax({
                  url: "functions/images/ajax_php_file.php", // Url to which the request is send
                  type: "POST",             // Type of request to be send, called as method
                  data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  contentType: false,       // The content type used when sending data to the server.
                  cache: false,             // To unable request pages to be cached
                  processData:false,        // To send DOMDocument or non processed data file it is set to false
                  success: function(data)   // A function to be called if request succeeds
                  {
                      $('#loading').hide();
                      $("#message").html(data);
                  }
              });
          }));
        }
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
                    $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
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
 

</script>