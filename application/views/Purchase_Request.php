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
                          <i class="fa fa-home"></i>
                          <span>Spares Inventory</span>
                      </a>
                  </li>
				  
				     <li class="sub-menu">
                      <a href="javascript:;" class="active">
                          <i class="glyphicon glyphicon-file"></i>
                          <span>Pre - PR Request</span>
						  <span class="pull-right"  style="font-size:15px;"><i class="fa fa-exclamation-circle"></i></span>
						  

                      </a>
                      <ul class="sub">
                          <li class="active"><a href="<?php echo base_url();?>WMS/Purchase_Request">Pending
						  <span class="label label-theme pull-right"  style="margin-right:45%;font-size:9px;">2</span>
						  </a>
						  </li>
                          <li><a href="<?php echo base_url();?>WMS/Purchase_Approved">Approved
						  </a>
						  </li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="glyphicon glyphicon-saved"></i>
                          <span>Approved PR</span>
                      </a>
                      <ul class="sub">
                          <li><a href="<?php echo base_url();?>">My Spares</a></li>
                          <li><a  href="EndUser_ws.html">Warehouse Spares</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                          <span>Purchase Order</span>
                      </a>
                      <ul class="sub">
                          <li><a href="<?php echo base_url();?>">My Spares</a></li>
                          <li><a  href="EndUser_ws.html">Warehouse Spares</a></li>
                      </ul>
                  </li> 
				  
				  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-briefcase"></i>
                          <span>Warehouse Spares</span>
                      </a>
                      <ul class="sub">
                          <li><a href="<?php echo base_url();?>">My Spares</a></li>
                          <li><a  href="EndUser_ws.html">Warehouse Spares</a></li>
                      </ul>
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
          	<h4><i class="glyphicon glyphicon-file"></i><a href="<?php echo base_url();?>WMS/Purchase_Request" title="List of Pre-PR Request" style="color:#004D40;padding-left:5px;font-size:15px;">Purchase Request</a>
			<i class="fa fa-angle-double-left" style="padding-left:5px;"></i><a style="color:#004D40;padding-left:5px;font-size:16px;">Pending</a></h4>
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
																
								<li class="active"><a href="#Requested" data-toggle="tab">Pending</a>
								</li>
								
								<li><a href="#Approved" data-toggle="tab">Evaluated</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							
								
								<div class="tab-pane fade in active" id="Requested">
									
									 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-hover" id="dataTables-Requested">
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone">Pre-PR No.</th>
                                            <th ><i class="glyphicon glyphicon-user"></i> Requisitioner</th>
                                            <th>Description</th>
											    <th class="hidden-phone" ><i class="fa fa-calendar"></i> Prepared</th>
											  <th class="hidden-phone" ><i class="fa fa-calendar"></i> Needed</th>
											  <th><i class="fa fa-tags"></i> Status</th>
											</tr>
                                    </thead>
                                    <tbody>
                                        
										 <?php foreach ($Draft as $row){ ?>
                                        <tr class="spareitems">
                                            <td class="hidden-phone"><?php echo $row->SpId; ?></td>
                                            <td><?php 
                                            echo $row->Fname[0].".".$row->Mname[0]." ".$row->Lname; ?></td>
											<?php 
												$purpose = "$row->Purpose";
											?>
                                            <td>

												
												<form method="post" action="<?php echo base_url();?>WMS/Pre_PR_Info">
												<input  type="hidden" value="<?php echo $row->SpId;?>" name="SpId">
												<input  type="hidden" value="<?php echo $row->DceNo;?>" name="DceNo">
												<button type="submit" class="btn btn-link btn-link-modal" style="text-decoration:none;"> 
													<? echo substr($purpose,0,50)." <code style='font-size:11px;color:#000040;margin-left:2%;'>see more...</code>"?>
												</button>
												
												</form>
											</td>
                                            <td class="hidden-phone"><?php echo $row->Date_Prepared; ?></td>
                                            <td class="hidden-phone"><?php echo $row->Date_Needed; ?></td>
                                            <td><span class="label label-info" style="font-size:12px;"><?php echo $row->Status; ?></span></td>
								
                                        </tr>
										
										<?php } ?>
										
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
								</div>
								
								<div class="tab-pane fade" id="Approved">
								<h5><center>Purchase Requisition</center></h5>
								 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-hover" id="dataTables-Approved">
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone">Pre-PR#</th>
											    <th><i class="fa fa-list"></i> Description</th>
											    <th class="hidden-phone"><i class="fa fa-calendar"></i> Prepared</th>
											  <th class="hidden-phone"><i class="fa fa-calendar"></i> Needed</th>
											  <th><i class="fa fa-tags"></i> Status</th>
											</tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($Draft1 as $row){ ?>
                                        <tr class="spareitems">
                                            <td class="hidden-phone"><?php echo $row->SpId; ?></td>
											<?php 
												$purpose = "$row->Purpose";
											?>
                                            <td>
												
												<form method="post" action="<?php echo base_url();?>WMS/Pre_PR_Info">
												<input  type="hidden" value="<?php echo $row->SpId;?>" name="SpId">
												<input  type="hidden" value="<?php echo $row->DceNo;?>" name="DceNo">
												<button type="submit" class="btn btn-link btn-link-modal" style="text-decoration:none;"> 
													<? echo substr($purpose,0,50)." <code style='font-size:11px;color:#000040;margin-left:2%;'>see more...</code>"?>
												</button>
												
												</form>
											</td>
                                            <td class="hidden-phone"><?php echo $row->Date_Prepared; ?></td>
                                            <td class="hidden-phone"><?php echo $row->Date_Needed; ?></td>
											<?php 
												$det_status = $row->Status;
												if($det_status == "Approved Pre-PR"){ ?>
													<td><span class="label label-success" style="font-size:12px;"><?php echo $row->Status; ?></span></td>
												
												<?php }elseif ($det_status == "Declined Pre-PR"){ ?>
													<td><span class="label label-danger" style="font-size:12px;"><?php echo $row->Status; ?></span></td>
												
												<?php }else{ ?>
												
													<td><span class="label label-info" style="font-size:12px;"><?php echo $row->Status; ?></span></td>
												<?php }?>
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
						<!-- /.panel-body -->

					
				 
				
				</div><!--/end col -->
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->


	  
	  
	  
	  
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center centered">
              (c) 2016 - Spares Warehouse Management System
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
