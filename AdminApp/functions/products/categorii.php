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
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adăugare categorie</h4>
              </div>
              <div class="modal-body">
                 <div class="box-body">                 
                     <div class="row">
                         <div class="col-md-12"
                    <div class="form-group" >                  
                        <label>Denumire categorie</label><small id="iscorectTitlu" class="label pull-right bg-red"></small>
                           <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                            <div id="selectImage">
                               <input  type="hidden" id="id-cat" name="id-cat" value="">
                               <input   style="margin-bottom:10px;" id="valoare-input" type="text" name="valoare-input" class="form-control" value="">
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
                        
                  
                   <div id="message">Stare:</div>
                       
                   </div>
                     </div>
                         <div class="col-md-12" style="text-align: center;">
                <div id="image_preview" style="margin:20px; width:100px; height:100px; "><img id="previewing" src="functions/images/upload/default.svg" />
                </div>
                     </div>
        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Anulare</button>
                <!-- <button type="button" class="btn btn-primary" id="btnAdauga">Adăugă</button> -->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
          
        
        
        <script>
       
    
      

    $(document).ready(function (e) {
      


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
                $('#loading').hide();
                $("#message").html(data);
              }});
            alert("send??");
          }));
       }
     });
        

// Function to preview image after validation
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




    // function checkif(idbtn,idP,input){
    //    $(input).keyup(function(){
    //     var iscorect = document.getElementById(idP);
    //     var btnAdd = document.getElementById(idbtn);
    //     var theInput = $("#valoare-input").val();
    //       var matches = theInput.match(/^[a-z_ ]+$/i);
    //       if(theInput==""){
    //         iscorect.innerHTML="Campul nu poate fi gol!";
    //         btnAdd.disabled = true;
    //       }else if(matches ==null){
    //         btnAdd.disabled = true;
    //         iscorect.innerHTML="textul nu poate avea cifre sau caractere speciale";
    //       }else{
    //         iscorect.innerHTML="OK";
    //         btnAdd.disabled = false;
    //       }
    //     });
    //   }
 

</script>