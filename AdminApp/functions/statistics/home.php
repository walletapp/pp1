<?php include 'load_statistics.php';?>
<?php include 'price_months.php'?>

<div class="row">

       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $rowStatistics['total_utilizatori']?></h3>

              <p>Total utilizatori</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $rowStatistics['report']?></h3>

              <p>Raport/Feedback</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatboxes"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $rowStatistics['utilizatori_online']?></h3>

              <p>Utilizatori online</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $rowStatistics['utilizatori_offline']?></h3>

              <p>Utilizatori offline</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person-outline"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

    
    <div class="col-md-8">
        
        
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Raport magazine</h3>

              <div class="box-footer">
              <div class="row">
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block border-right">
<!--                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>-->
                    <h5 class="description-header"><?php echo $rowStatistics['pret_total']?> &nbsp; Lei</h5>
                    <span class="description-text">Profit total</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block border-right">
<!--                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>-->
                     <h5 class="description-header"><?php echo $rowStatistics['profitul_zilei']?> &nbsp; Lei</h5>
                    <span class="description-text">Profitul zilei</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block border-right">
<!--                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>-->
                      <h5 class="description-header"><?php echo $rowStatistics['pret_total_buc']?> &nbsp; Lei</h5>
                    <span class="description-text">Bucuresti</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block">
<!--                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>-->
                      <h5 class="description-header"><?php echo $rowStatistics['pret_total_cluj']?> &nbsp; Lei</h5>
                    <span class="description-text">Cluj-Napoca</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                 <div class="col-sm-2 col-xs-6">
                  <div class="description-block">
<!--                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>-->
                      <h5 class="description-header"><?php echo $rowStatistics['pret_total_alba']?> &nbsp; Lei</h5>
                    <span class="description-text">Alba-Iulia</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
               <canvas id="salesChart" style="height: 360px; width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff"><canvas style="display: inline-block; width: 34px; height: 30px; vertical-align: top;" width="34" height="30"></canvas></div>
                      <h5 class="description-header"><?php echo $rowStatistics['rezervari_preluate']?></h5>
                      <span class="description-text">Total vizite</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff"><canvas style="display: inline-block; width: 34px; height: 30px; vertical-align: top;" width="34" height="30"></canvas></div>
                      <h5 class="description-header"><?php echo $rowStatistics['total_magazine']?></h5>
                      <span class="description-text">Total magazine</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff"><canvas style="display: inline-block; width: 34px; height: 30px; vertical-align: top;" width="34" height="30"></canvas></div>
                      <h5 class="description-header"><?php echo $rowStatistics['rezervari_preluate']?></h5>
                      <span class="description-text">Statistici vizite in magazine pe zi</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
                 <div class="col-md-6" style="padding:20px;">
                  <p class="text-center">
                    <strong>Statistici produse</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Total produse existene in baza de date</span>
                    <span class="progress-number"><span class="pull-right badge bg-green"><?php echo $rowStatistics['total_produse']?></span></span>
<!--
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>-->
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Total categorii existente in baza de date</span>
                    <span class="progress-number"><span class="pull-right badge bg-green"><?php echo $rowStatistics['total_categori']?></span></span>

<!--                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                    </div>-->
                  </div>
                  <!-- /.progress-group -->
               
                  <!-- /.progress-group -->
                 
                  <!-- /.progress-group -->
                </div>
              <div class="col-md-6" style="padding:20px;">
                  <p class="text-center">
                    <strong>Statisticile utiliztorilor</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Rapoarte/feedback</span>
                    <span class="progress-number"><span class="pull-right badge bg-green"><?php echo $rowStatistics['report']?></span></span>
<!--
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>-->
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Recenzii la produse</span>
                    <span class="progress-number"><span class="pull-right badge bg-green"><?php echo $rowStatistics['total_review']?></span></span>

<!--                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                    </div>-->
                  </div>
                  <!-- /.progress-group -->
               
                  <!-- /.progress-group -->
                 
                  <!-- /.progress-group -->
                </div>
            </div>
            <!-- /.box-body -->
          
          </div>
       
        
    </div>
           <div class="col-md-4">
               <div class="info-box bg-white">
            <span class="info-box-icon"><i class="ion ion-android-funnel"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rezervari totale</span>
              <span class="info-box-number"><?php echo $rowStatistics['total_rezervari']?></span>

<!--              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>-->
            </div>
            <!-- /.info-box-content -->
          </div>
               <div class="info-box bg-white">
            <span class="info-box-icon"><i class="ion ion-ios-checkmark-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rezervări preluate</span>
              <span class="info-box-number"><?php echo $rowStatistics['rezervari_preluate']?></span>

<!--              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>-->
            </div>
            <!-- /.info-box-content -->
          </div>
               <div class="info-box bg-white">
            <span class="info-box-icon"><i class="ion ion-ios-loop-strong"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rezervări confirmate</span>
              <span class="info-box-number"><?php echo $rowStatistics['rezervari_confirmate']?></span>

<!--              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>-->
            </div>
            <!-- /.info-box-content -->
          </div>
               <div class="info-box bg-white">
            <span class="info-box-icon"><i class="ion ion-ios-close-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rezervări anulate</span>
              <span class="info-box-number"><?php echo $rowStatistics['rezervari_anulate']?></span>

<!--              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>-->
            </div>
            <!-- /.info-box-content -->
          </div>
               <div class="info-box bg-white">
            <span class="info-box-icon"><i class="ion ion-ios-trash-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rezervări șterse</span>
              <span class="info-box-number"><?php echo $rowStatistics['rezervari_sterse']?></span>

<!--              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>-->
            </div>
            <!-- /.info-box-content -->
          </div>
                <div class="info-box bg-white">
            <span class="info-box-icon"><i class="ion ion-ios-timer-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rezervări nepreluate</span>
              <span class="info-box-number"><?php echo $rowStatistics['rezervari_nepreluate']?></span>

<!--              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>-->
            </div>
            <!-- /.info-box-content -->
          </div>
           </div>
     
        </div>
<input type="hidden" id="ian" value="<?php echo $row_luni['ian']?>">
<input type="hidden" id="feb" value="<?php echo $row_luni['feb']?>">
<input type="hidden" id="mar" value="<?php echo $row_luni['mar']?>">
<input type="hidden" id="apr" value="<?php echo $row_luni['apr']?>">
<input type="hidden" id="mai" value="<?php echo $row_luni['mai']?>">
<input type="hidden" id="iun" value="<?php echo $row_luni['iun']?>">
<input type="hidden" id="iul" value="<?php echo $row_luni['iul']?>">
<input type="hidden" id="aug" value="<?php echo $row_luni['aug']?>">
<input type="hidden" id="sep" value="<?php echo $row_luni['sept']?>">
<input type="hidden" id="oct" value="<?php echo $row_luni['oct']?>">
<input type="hidden" id="noi" value="<?php echo $row_luni['nov']?>">
<input type="hidden" id="dec" value="<?php echo $row_luni['dec']?>">
<script>
$(function () {

  'use strict';

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  // -----------------------
  // - MONTHLY SALES CHART -
  // -----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChart       = new Chart(salesChartCanvas);

  var salesChartData = {
    labels  : ['Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie','August','Septembrie','Octombrie','Noiembrie','Decembrie'],
    datasets: [
      {
        label               : 'Profit pe an',
        fillColor           : 'rgb(116, 195, 116)',
        strokeColor         : 'rgb(104, 175, 104)',
        pointColor          : 'rgb(104, 175, 104)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgb(220,220,220)',
        data                : [$('#ian').val(), 
            $('#feb').val(),
            $('#mar').val(), 
            $('#apr').val(),
            $('#mai').val(), 
            $('#iun').val(),
            $('#iul').val(),
            $('#aug').val(),
            $('#sep').val(),
            $('#oct').val(),
            $('#noi').val(),
            $('#dec').val()]
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale               : true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    // String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    // Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    // Boolean - Whether the line is curved between points
    bezierCurve             : true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    // Boolean - Whether to show a dot for each point
    pointDot                : true,
    // Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    // Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    // String - A legend template
    legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    
    maintainAspectRatio     : true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  };

  // Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  // ---------------------------
  // - END MONTHLY SALES CHART -
  // ---------------------------

  // -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [
    {
      value    : 700,
      color    : '#f56954',
      highlight: '#f56954',
      label    : 'Chrome'
    },
    {
      value    : 500,
      color    : '#00a65a',
      highlight: '#00a65a',
      label    : 'IE'
    },
    {
      value    : 400,
      color    : '#f39c12',
      highlight: '#f39c12',
      label    : 'FireFox'
    },
    {
      value    : 600,
      color    : '#00c0ef',
      highlight: '#00c0ef',
      label    : 'Safari'
    },
    {
      value    : 300,
      color    : '#3c8dbc',
      highlight: '#3c8dbc',
      label    : 'Opera'
    },
    {
      value    : 100,
      color    : '#d2d6de',
      highlight: '#d2d6de',
      label    : 'Navigator'
    }
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> users'
  };
 
});
</script>



