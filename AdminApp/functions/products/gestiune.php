

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
             
              <?php include 'setTab.php';
              $tab;
              if(isset($_GET['tab'])){
                  $tab=$_GET['tab'];
              }
              else{
                  $tab=1;
              }
              setActiveTab($tab);
              ?>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane <?php getActive1($tab)?>" id="tab_1">
               <?php include 'categorii.php';?>
                  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php getActive2($tab)?>" id="tab_2">
                <?php include 'produse.php';?>
              </div>
              <!-- /.tab-pane -->
             
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
      
      
      <script>
     loadPaginator($('#total_results').val(),$('#total_numb').val(),$('#pagina-principala').val(),$('#pagina-principala2').val());
function loadPaginator(dim,totalnumb,pageNumb,pageNumb2){
        // alert('dim='+dim+'  total='+totalnumb+'      actualPage='+pageNumb);
        var data=new Array();
        for(var i=0;i<totalnumb;i++){
         data.push(i);
        }
        
$('#demo').pagination({        
    dataSource: data,
    pageSize: dim,
    totalNumber:totalnumb,
    pageNumber:pageNumb,
    callback: function(data, pagination) {
     
         
        
    },
    afterPageOnClick:function(data,pagination){
  
        window.location.href='?m=gestiune&tab=1&pageCat='+pagination+'&pageProd='+pageNumb2;
        // $('.wrapper').load('functions/vedereRezervari.php?page='+pagination);
          // alert(pageNumb);
    }
    
  
});
}
loadPaginator2($('#total_results2').val(),$('#total_numb2').val(),$('#pagina-principala2').val(),$('#pagina-principala').val());
function loadPaginator2(dim,totalnumb,pageNumb,pageNumb2){
        // alert('dim='+dim+'  total='+totalnumb+'      actualPage='+pageNumb);
        var data=new Array();
        for(var i=0;i<totalnumb;i++){
         data.push(i);
        }
        
$('#demo2').pagination({        
    dataSource: data,
    pageSize: dim,
    totalNumber:totalnumb,
    pageNumber:pageNumb,
    callback: function(data, pagination) {
     
         
        
    },
    afterPageOnClick:function(data,pagination){
  
        window.location.href='?m=gestiune&tab=2&pageCat='+pageNumb2+'&pageProd='+pagination;
        // $('.wrapper').load('functions/vedereRezervari.php?page='+pagination);
          // alert(pageNumb);
    }
    
  
});
}


</script>