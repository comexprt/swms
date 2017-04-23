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

    <link href="<?php echo base_url();?>_assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box" >
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url();?>" class="logo hidden-print"><b>sWMS</b></a>
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
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i><br></h3>
              	  
               
				  
				     <li class="sub-menu">
                     <a href="<?php echo base_url();?>">
                          <i class="glyphicon glyphicon-send"></i>
                          <span>Pending PR</span>
						  <span class="pull-right"  style="font-size:15px;"><i class="fa fa-exclamation-circle"></i></span>
						  

                      </a>
                   
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Approved_PR"  class="active">
                          <i class="glyphicon glyphicon-saved"></i>
                          <span>Approved PR</span>
                      </a>
                     
                  </li>
				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Bidding">
                          <i class="glyphicon glyphicon-stats"></i>
                          <span>Bidding</span>
                      </a>
                     
                  </li>
				  
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                          <span>Purchase Order</span>
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
  <section id="main-content">
        <section class="wrapper site-min-height">
            <h4><i class="glyphicon glyphicon-file"></i><a href="<?php echo base_url();?>WMS" title="List of PR Approval" style="color:#004D40;padding-left:5px;font-size:15px;">Approved PR</a>
			<i class="fa fa-angle-double-left" style="padding-left:5px;"></i><a style="color:#004D40;padding-left:5px;font-size:16px;">List</a></h4>
            <div class="row mt">
              <div class="col-lg-12">
          <div class="col-lg-12">
              <div class='form-group'>
                <a><center style="font-size:17px;font-weight:bold;"><?php echo $message;?></center></a>             
              </div>
            </div>
        
            <div class="panel-bodyt">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                                
              
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
              
                
                <div class="tab-pane fade in active" id="Requested">
                  
                   <div class="panel-body">
                            <div class="dataTable_wrapper">
                               <table class="table table-striped table-advance table-hover" id="dataTables-Requested">
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone">PR NO.</th>
											    <th class="hidden-phone" ><i class="fa fa-calendar"></i> DATE/TIME PUCHASE REQUESTED</th>
											  <th><i class="fa fa-tags"></i> STATUS</th>
											  <th><i class="fa fa-calendar"></i> DATE APPROVED</th>
											</tr>
                                    </thead>
                                    <tbody>
                                        
										 <?php foreach ($Draft3 as $row){ ?>
                                        <tr class="spareitems">
                                            <td class="hidden-phone" style="text-indent:20px;">
											<?php 
													$lastprid = $row->prid;
													if($lastprid < 10){
														  $a = "00$lastprid";
														}else if ($lastprid >= 10 && $lastprid < 100){
														  $a = "0$lastprid";
														}else{
														  $a = "$lastprid";
														}
													echo "PR". date('Y',strtotime($row->date))."-".$a; 
												?>
											</td>
                                            
                                            <td>

												
												<form method="post" action="<?php echo base_url();?>WMS/Approved_PR_Info">
												<input  type="hidden" value="<?php echo $row->date;?>" name="Date">
												<input  type="hidden" value="<?php echo $row->status;?>" name="Status">
												<input  type="hidden" value="<?php echo $row->prid;?>" name="prid">
												<button type="submit" class="btn btn-link btn-link-modal" style="text-decoration:none;text-indent:20px;"> 
													<?php echo date('F d , Y',strtotime($row->date));?>
												</button>
												
												</form>
											</td>
                                            
                                            <td style="text-indent:20px;">
											<?php if( $row->status == "approved"){ ?>
												<span class="label label-success" style="font-size:12px;text-transform:capitalize;"><?php echo $row->status; ?></span>
												
											
										    <?php }else{ ?>
											<span class="label label-danger" style="font-size:12px;"><?php echo $row->status; ?></span>
											<?php }?>
											
											
											</td>
                                            
											
											<td style="text-indent:20px;"><span 	style="font-size:12px;"><?php echo date('F d , Y',strtotime($row->date_status_changed))." - ".date('h:i A', strtotime($row->date_status_changed)); ?></span></td>
								
                                        </tr>
										
										<?php } ?>
										
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                </div>
                
             
                
                </div>
                
              </div>
            </div>
            <!-- /.panel-body -->

          
         
        
        </div><!--/end col -->
            </div> <!-- /end row -->
      
    </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->

	  
	  
	  
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
 <!-- js placed at the end of the document so the pages load faster -->
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

    <!--script for this page-->  
    <script>
		$(document).ready(function() {
			$('#dataTables-Draft').DataTable({
					responsive: true
			});
		});
    </script>
	
	<script>
		$(document).ready(function() {
			$('#dataTables-Requested').DataTable({
					responsive: true
			});
		});
    </script>
	
	<script>
		$(document).ready(function() {
			$('#dataTables-Approved').DataTable({
					responsive: true
			});
		});
    </script>
  

  </body>
</html>
