<?php date_default_timezone_set('asia/manila');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="John Noah G. Ompad">

    <title>AGUS 6/7 - Warehouse Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>_assets/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>_assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>_assets/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>_assets/assets/css/style-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>_assets/assets/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>_assets/assets/css/dataTables.responsive.css" rel="stylesheet">
	
	
	
    <link href="<?php echo base_url();?>_assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url();?>_assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet"-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="<?php echo base_url();?>graph_js/amcharts.js"></script>
	<script src="<?php echo base_url();?>graph_js/pie.js"></script>
	<script src="<?php echo base_url();?>graph_js/serial.js"></script>
	<script src="<?php echo base_url();?>graph_js/export.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>graph_js/export.css" type="text/css" media="all" />
	<script src="<?php echo base_url();?>graph_js/light.js"></script>
	<style>
	#chartdiv,#chartdiv1,#chartdiv2,#chartdiv3{
		width		: 100%;
		height		: 550px;
		font-size	: 14px;
		font-weight :bold;
	}

							
	</style>
<!-- Chart code -->
<script>
var chart;
var legend;
var selected;

var types = [{
  type: "Transformer",
  percent: 32,
  color: "#FDD400",
  subs: [{
    type: "Corrugated",
    percent: 8
  }, {
    type: "Three-Phase Pad Mounted",
    percent: 10
  }, {
    type: "sample transformer",
    percent: 14
  }]
}, {
  type: "Valve",
  percent: 45,
  color: "#D77377",
  subs: [{
    type: "butterfly valve",
    percent: 25
  }, {
    type: "flanged ductile iron gate",
    percent: 18
  }, {
    type: "sample valve",
    percent: 7
  }]
}, {
  type: "Turbine",
  percent: 13,
  color: "#67B7DC",
  subs: [{
    type: "BOCHI synchronous",
    percent: 13
  }]
}, {
  type: "Carbon Brushes",
  percent: 10,
  color: "#83B762",
  subs: [{
    type: "copper center carbon",
    percent: 10
  }]
}];

function generateChartData() {
  var chartData = [];
  for (var i = 0; i < types.length; i++) {
    if (i == selected) {
      for (var x = 0; x < types[i].subs.length; x++) {
        chartData.push({
          type: types[i].subs[x].type,
          percent: types[i].subs[x].percent,
          color: types[i].color,
          pulled: true
        });
      }
    } else {
      chartData.push({
        type: types[i].type,
        percent: types[i].percent,
        color: types[i].color,
        id: i
      });
    }
  }
  return chartData;
}

AmCharts.makeChart("chartdiv", {
  "type": "pie",
"theme": "none",

  "dataProvider": generateChartData(),
  "labelText": "[[title]]: [[value]]",
  "balloonText": "[[title]]: [[value]]",
  "titleField": "type",
  "valueField": "percent",
  "outlineColor": "#FFFFFF",
  "outlineAlpha": 0.8,
  "outlineThickness": 2,
  "colorField": "color",
  "pulledField": "pulled",
  "titles": [{
    "text": "Click to see sub-category"
  }],
  "listeners": [{
    "event": "clickSlice",
    "method": function(event) {
      var chart = event.chart;
      if (event.dataItem.dataContext.id != undefined) {
        selected = event.dataItem.dataContext.id;
      } else {
        selected = undefined;
      }
      chart.dataProvider = generateChartData();
      chart.validateData();
    }
  }],
  "export": {
    "enabled": false
  }
});
</script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv1",
{
    "type": "serial",
    "theme": "light",
    "dataProvider": [{
        "name": "John",
        "points": 10,
        "color": "#2F4074",
        "bullet": "<?php echo base_url();?>/_assets/img/F01.png"
    }, {
        "name": "Damon",
        "points": 25,
        "color": "#FDD400",
        "bullet": "<?php echo base_url();?>/_assets/img/C01.png"
    }, {
        "name": "Patrick",
        "points": 8,
        "color": "#CC4748",
        "bullet": "<?php echo base_url();?>/_assets/img/D02.png"
    }, {
        "name": "Mark",
        "points": 18,
        "color": "#67B7DC",
        "bullet": "<?php echo base_url();?>/_assets/img/E01.png"
    }, {
        "name": "Mark",
        "points": 31,
        "color": "#448E4D",
        "bullet": "<?php echo base_url();?>/_assets/img/H01.png"
    }],
    "valueAxes": [{
        "maximum": 45,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "points"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": false
     }
});
</script>

  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
       <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url();?>" class="logo"><b>sWMS</b></a>
            <!--logo end-->
            <ul class="top-nav  pull-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                       
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>WMS/emp_logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
           	</ul>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="<?php echo base_url();?>/_assets/assets/img/default_profile1.png" class="img-circle" style="background-color:#F3F3F3;"width="90"></p>
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i></h3>
              	  
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Homepage">
                          <i class="fa fa-home"></i>
                          <span>Spares Inventory</span>
                      </a>
                     
                  </li>

				 <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="glyphicon glyphicon-file"></i>
                          <span>Spare Request</span>
						  <span class="pull-right"  style="font-size:15px;"><i class="fa fa-exclamation-circle"></i></span>
						  

                      </a>
                      <ul class="sub">
                          <li><a href="<?php echo base_url();?>WMS/Spare_Request">Pending
						  <span class="label label-theme pull-right"  style="margin-right:45%;font-size:9px;">2</span>
						  </a>
						  </li>
                          <li><a href="<?php echo base_url();?>WMS/Request_Approved">Approved
						  </a>
						  </li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Spare_Purchases">
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                          <span>Spare Purchase</span>
                      </a>
                  </li>
                  
				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/PO_Reports" class="active" >
                          <i class="glyphicon glyphicon-stats"></i>
                          <span>Graphs & Statistics</span>
                      </a>
                  </li>
                  


                </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
          	<h4><i class="glyphicon glyphicon-stats"></i><a style="color:#004D40;padding-left:5px;">Graphs & Statistics</a></h4>
			
				<div class="panel-bodyt">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#a" data-toggle="tab">Spares Summary</a></li>
						<li><a href="#b" data-toggle="tab">Annuall Cost</a></li>
						<li><a href="#c" data-toggle="tab">Supplier's Performance</a></li>
						<li><a href="#d" data-toggle="tab">Supplier's Performance</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane fade in active" id="a">
							<div class="panel-body">
								<div id="chartdiv"></div>
							</div>
						</div>
								
						<div class="tab-pane fade" id="b">
							<div class="panel-body">
								<div id="chartdiv1"></div>
							</div>
						</div>	
						
						<div class="tab-pane fade" id="c">
							<div class="panel-body">
								<div id="chartdiv1"></div>
							</div>
						</div>	
						
						<div class="tab-pane fade" id="d">
							<div class="panel-body">
								<div id="chartdiv1"></div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /.panel-body -->
   
	   </section>
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center centered">
              (c) 2015 - Spares Warehouse Management System
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

 <script src="<?php echo base_url();?>/_assets/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>/_assets/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/_assets/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url();?>/_assets/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>/_assets/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>/_assets/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>/_assets/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>/_assets/assets/js/datatables/metisMenu.min.js"></script>
	<script src="<?php echo base_url();?>/_assets/assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>/_assets/assets/js/datatables/dataTables.bootstrap.min.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url();?>/_assets/assets/js/common-scripts.js"></script>

  </body>
</html>
