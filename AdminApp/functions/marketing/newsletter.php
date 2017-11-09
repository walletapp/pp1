<div class="row" >
    <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="padding-top: 20px; padding-bottom: 20px;">
              <h3 class="box-title">Newsletter rezervări</h3>

             
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->

                <div class="form-group">
                  <label>Titlul mesajului</label>
                  <input class="form-control" id="titlu-news" placeholder="" type="text">
                </div>
                 <div class="form-group">
                  <label>Mesajul</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">
                   
                   </textarea>
                </div>  
                <!-- /.pull-right -->
              </div>
                <button style="width:200px;" id="trimite-buton" type="button" class="btn btn-block btn-default">Default</button>
            
                                     
                                
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
            
            </div>
          </div>
    </div>
</div>

<script>
    
    $('#trimite-buton').click(function(){
        alert($('#titlu-news').val()+"    "+$('#editor1').val());
    });
 $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    });
    //bootstrap WYSIHTML5 - text editor
    </script>
