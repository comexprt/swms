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
	
	
	<style>
		.tech a:hover{
			text-decoration:underline;
		}
	</style>

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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
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
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i><br><i class="title-position" style="font-style:normal">END USER</i></h3>
              	  
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-briefcase"></i>
                          <span>Spares Inventory</span>
                      </a>
                      <ul class="sub">
                          <li><a href="<?php echo base_url();?>" >My Spares</a></li>
                          <li><a  href="EndUser_ws.html">Warehouse Spares</a></li>
                      </ul>
                  </li>

				  <li class="sub-menu">
                      <a href="javascript:;" class="active">
                          <i class="fa fa-tasks"></i>
                          <span>Transactions</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="<?php echo base_url();?>WMS/Spare_Purchase">Purchase Spare </a></li>
                          <li><a  href="Requisition.html">Warehouse Requisition</a></li>
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
          	<h4><i class="fa fa-tasks"></i><a style="color:#004D40;padding-left:5px;">Transactions</a><i class="fa fa-angle-double-left" style="padding-left:5px;">
			</i><a style="color:#004D40;padding-left:5px;font-size:16px;" href="<?php echo base_url();?>WMS/Spare_Purchase" title="back to list">Purchase Spare</a></i>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;">PRE-PR</a></i>
			<?php foreach ($DraftInfo as $row){ ?>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:17px;"><code><?php echo $row->SpId;?></code></a></i>
			
		
			</h4>
          	<div class="row">
          		<div class="col-lg-12">
						<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:17px;font-weight:bold;">
									<?php echo $message; ?>
							  </center></a>
							
							 <a style='font-size:16px;color:#004030;cursor:pointer;' onclick='myFunction()' data-toggle='modal' data-target='#printprepr' title='Print'>
								 <i class='glyphicon glyphicon-print pull-right' style='margin-right:25px;'> 
								</i>
							 </a>
							 
							
							</div>
						</div>
			<?php }?>
						<div style="width:90%;margin-left:5%;">
							<?php foreach ($DraftInfo as $row){ ?>
							
								<div class="row mt">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info spare-info1 " style="padding-top:12px;">
										<div class="spare-left">
											<p>Requisitioning Section</p>
										</div>
										
										<div class="spare-right">
											<p>: <?php echo $row->Requisitioning_Section;?></p>
										</div>
										<br></br>
										<div class="spare-left">
											<p>Cost Center Number</p>
										</div>
										
										<div class="spare-right">
											<p>: <?php echo $CcNo; ?></p>
										</div>
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info spare-info1 ">
									
										<div class="spare-left-d" style="padding-top:5px;">
											<p>Date Prepared</p>
										</div>
										<div class="spare-right-d" style="padding-top:5px;">
											<p>: <?php echo $row->Date_Prepared;?></p>
										</div>
										<br></br>
										<div class="spare-left-d">
											<p>Date Needed</p>
										</div>
										
										<div class="spare-right-d">
											<p>: <?php echo $row->Date_Needed;?></p>
										</div>
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										<br>
										<div class="spare-left-purpose">
											<label>Purpose of Purchase <p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: <?php echo $row->Purpose; ?><p>
										</div>
										
										
								</div><!-- col-lg-4 -->
								
								
								
								
							<?php }?>
						</div>
						
						<!-- /.panel-body -->
				 
				</div><!--/end col -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="margin-top:10px;">
										 <table class="table table-striped  table-hover  table-bordered" >
                                    <thead>
                                        <tr>
											  <th style="border:1px solid #24665B;width:3px;"><center>ITEM NO.</center></th>
											  <th style="border:1px solid #24665B;"><center>COMPLETE DESCRIPTION / SPECIFICATION</center></th>
											  <th style="border:1px solid #24665B;"><center>QTY</center></th>
											  <th style="border:1px solid #24665B;"><center>UM</center></th>
											  <th style="border:1px solid #24665B;"><center>ESTD. COST</center></th>
										</tr>
                                    </thead>
                                    <tbody>
										 
									 <?php 
									 $i=1;
									 $totalec=0;
									 foreach ($SpareInfo as $row){ ?>
                                        <tr>
											
                                            <td style="border:1px solid #24665B;font-weight:bold"><center><?echo $i++;?></center></td>
                                            
											<td style="border:1px solid #24665B;"><p>
											<span style="font-weight:bold;font-size:12px;"><?php echo $row->Category.", ".$row->Spare_Name;?></span>, <?php echo $row->Description;?></p>
										   <br>
										   <div class="spare-new-left-button">
												<p style="font-weight:bold;">
													Specifications :
												</p>
										   </div>
										   
										   <div>
												<ul style="margin-top:8px;list-style-type:circle;">
													
												<?php foreach ($TechnicalInfo as $row1){ 
													if ($row->WSid == $row1->WSid){
												?>
												  <li style="width:100%;">
												  <div style="width:30%;float:left;" class="tech">
													
													- <?php echo $row1->Tech_Name;?>
												  </div>
												  
												  <div style="width:50%;float:left;">
													: <?php echo $row1->value;?>
												  </div>

												  </li>
												<?php }else {}}?>
												</ul>
										   </div>
											
											</td>
                                            
                                            <td style="border:1px solid #24665B;text-align:center;font-size:14px;"><?php if ($row->Qty <= 0){ 
																													echo "--";
																													
																											} else {
																													echo number_format($row->Qty,2);
																											}
																												
																											?>
											</td>
                                            <td style="border:1px solid #24665B;text-align:center;font-size:14px;"><?php if (strlen($row->UM) > 0 && strlen(trim($row->UM))){ 
																													echo $row->UM;
																											} else {
																													echo "--";
																											}?>
											</td>
											<td style="border:1px solid #24665B;text-align:right;padding-right:5%;font-size:14px;"><?php if ($row->Estimated_Cost <= 0){ 
																													echo "--";
																											} else {
																													
																													echo "P ".number_format(($row->Estimated_Cost * $row->Qty),2);
																													
																											}	
																												 $ec = $row->Estimated_Cost * $row->Qty;
																												 $totalec = $totalec + $ec;
																											?>
											</td>
											  
                                        </tr>
											
										<?php }?>
										
                                    </tbody>
                                </table>
										
						</div><!-- col-lg-4 total -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="text-align:right;padding-right:5.7%;margin-top:0px;font-size:14px">
							<p>Total : <span style="margin-left:2%;font-weight:bold;color:#CA254E;">P  <?php echo number_format($totalec,2); ?></span></p>
				
						</div><!-- col-lg-4 -->
					
					     <?php foreach ($DraftInfo as $row){ ?>	
						  
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:10px;">
							<p style="font-weight:bold:font-size:14px;">
							Note : 
							</p>
							<p style="margin-left:8px;margin-top:10px;text-indent:20px;"><?php echo $row->note?></p>
						</div><!-- col-lg-4 -->
					
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:20px;">
							<div style="width:100%;height:2px;background-color:#24665B;">
							</div>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:20px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Evaluation  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Pre-PR Approval">
							<?php
							echo $row->Status; ?>
							</button>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Responsible  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Pre-PR Approval">
							<?php
							echo $row->PO_Incharge; ?>
							</button>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Date Changed  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Pre-PR Approval">
							<?php
							echo $row->Date_Status_Changed; ?>
							</button>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Remarks</h4><button style="font-size:15px;border-radius:8px;float:left;" title="Pre-PR Approval">
							<?php
							echo $row->remark; ?>
							</button>
						</div><!-- col-lg-4 -->
						
						
						
					     <?php }?>	
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
