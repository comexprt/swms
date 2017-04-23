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
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i><br></h3>
              	  
      
				  
				     <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS" class="active">
                          <i class="glyphicon glyphicon-file"></i>
                          <span>PR Request</span>
						  <span class="pull-right"  style="font-size:15px;"><i class="fa fa-exclamation-circle"></i></span>
						  

                      </a>
                     
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Approved_PR">
                          <i class="glyphicon glyphicon-saved"></i>
                          <span>Approved PR</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                          <span>Purchase Order</span>
                      </a>
                      <ul class="sub">
                         
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
		<h4><i class="glyphicon glyphicon-file"></i><a href="<?php echo base_url();?>WMS/Purchase_Request" title="List of Pre-PR Request" style="color:#004D40;padding-left:5px;font-size:15px;">Purchase Request</a></i>	
			<i class="fa fa-angle-double-left" style="padding-left:5px;"></i>
			<a style="color:#004D40;padding-left:5px;font-size:16px;">
			<?php 
				$lastprid = $prid;
				if($lastprid < 10){
					$a = "00$lastprid";
				}else if ($lastprid >= 10 && $lastprid < 100){
					$a = "0$lastprid";
				}else{
					$a = "$lastprid";
				}
				echo "PR". date('Y',strtotime($Date_Purchased))."-".$a; 
			?>
			</a>
			
		
			</h4>
          	<div class="row">
          		<div class="col-lg-12">
						<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:17px;font-weight:bold;"><?php echo $message;?></center></a>
							
							 
							</div>
						</div>
			
						<div style="width:90%;margin-left:5%;">
														
								<div class="row mt">
								
								
								
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										<br>
										<div class="spare-left-purpose">
											<label>Purchase Requested<p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: <?php echo date('F d , Y',strtotime($Date_Purchased))." - ".date('h:i A', strtotime($Date_Purchased));?><p>
										</div>
										
										
								</div><!-- col-lg-4 -->
																	
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
								
										<div class="spare-left-purpose">
											<label>Status<p></label>
										</div>
										<div class="spare-right-purpose">
											
											<?php 
												$det_status = $Status;
												if($det_status == "Bidded"){ ?>
													<p>: <span class="label label-success" style="font-size:12px;"><?php echo $Status; ?></span></p>
												
												
												<?php }else{ ?>
												
													<p>: <span class="label label-info" style="font-size:12px;"><?php echo $Status; ?></span></p>
												<?php }?>
										</div>
										
										
								</div><!-- col-lg-4 -->
									
		
						</div>
						
						<!-- /.panel-body -->
				 
				</div><!--/end col -->
						
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="margin-top:10px;">
										 <table class="table table-striped  table-hover  table-bordered" >
                                    <thead>
                                        <tr>
											  <th style="border:1px solid #24665B;width:3px;"><center>ITEM NO.</center></th>
											  <th style="border:1px solid #24665B;"><center>PARTICULARS</center></th>
											  <th style="border:1px solid #24665B;"><center>QTY PURCHASED</center></th>
											  <th style="border:1px solid #24665B;"><center>STATUS</center></th>
											  
										</tr>
                                    </thead>
                                    <tbody>
										 
									 <?php 
									 $i=1;
									 $totalec=0;
									 foreach ($SpareInfo as $row){ ?>
                                        <tr>
											
                                            <td style="border:1px solid #24665B;font-weight:bold"><center><?= $i++;?></center></td>
                                            
											<td style="border:1px solid #24665B;"><p>
											<button type="button" style="color:#004d40;font-size:13px;" class="btn btn-link btn-link-modal" data-toggle="modal" data-target="#<?php echo $row->wsid;?>info"><?php echo $row->spare_name;?></button>
											</td>

											<td style="border:1px solid #24665B;"><p>
											<center><span style="font-weight:bold;font-size:12px;"><?php echo $row->qty." ".$row->unit_of_measurement;?></span>
											</center></p>
										  
											</td>
											<td style="border:1px solid #24665B;">
											<?php 
												$det_status = $Status;

												if($det_status == "Quoted"){ ?>
													<center>
														<p>
															<span class="label label-success" style="font-weight:bold;font-size:12px;text-transform:uppercase;"><?php echo $row->status; ?></span>
														</p>
													</center>
													
												
												<?php }else{ ?>
													<center>
														<p>
															<span class="label label-info" style="font-weight:bold;font-size:12px;text-transform:uppercase;"><?php echo $row->status; ?></span>
														</p>
													</center>
												<?php }?>

										  
											</td>
                        
										   
                                        </tr>
											
										<?php }?>
										
										
                                    </tbody>
									
										
								</table>
										
						</div><!-- col-lg-4 total -->
						
						
					
					     <?php foreach ($draft3 as $row){ ?>	
						  
						
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:10px;">
							<button class="btn btn-lg" style="font-size:20px;border-radius:8px;float:right" title="PR Approval" data-toggle="modal" data-target="#<?php echo $row->date;?>Accept">
							<i class="glyphicon glyphicon-ok"></i>
							<span>Approve</span>
							</button>
						</div><!-- col-lg-4 -->
																		
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:20px;">
							<div style="width:100%;height:2px;background-color:#24665B;">
							</div>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:20px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Evaluation  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Pre-PR Approval">
							<?php
							echo $row->status; ?>
							</button>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Responsible  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Pre-PR Approval">
							<?php
							echo $row->person_responsible; ?>
							</button>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Date Changed  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Pre-PR Approval">
							<?php 
								if (date('F d , Y',strtotime($row->date_status_changed))== "January 01 , 1970"){
								echo "";
								}else{
							echo date('F d , Y',strtotime($row->date_status_changed))." - ".date('h:i A', strtotime($row->date_status_changed));
								}
							?>
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
  
  
  <!-- Modal Delete Technical -->
  



<?php foreach ($draft3 as $row){?>			
			<div class="modal fade" id="<?php echo $row->date;?>Accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirm Evaluation</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/editPR1");?>	
							<div class="row">
								<input  type="hidden" value="accept-confirm" name="sms">
								<input  type="hidden" value="<?php  echo $row->date;?>" name="PR_Date">
								<input  type="hidden" value="Approved PR" name="PR_Status">
								<input  type="hidden" value="<?php  echo $Fname[0].".".$Mname[0]." ".$Lname;?>" name="PR_responsible_person">
								<input  type="hidden" value="<?php  echo $row->date_status_changed	;?>" name="PR_Date_Changed">
							
						
								<div class='col-md-12'>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:14px;font-weight:bold;">Are you sure to Approve PR ? </label>
									</div>
								
								</div>
							</div> <!--end row-->
						
						
					</div>
				</div>
				<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","YES","class='btn btn-success'");
									echo form_close();
							?>
				</div>
				
			</div>
			</div>
			</div>
<?php }?>


<?php foreach ($Category as $row){ ?>
			<div class="modal fade" id="<?php echo $row->wsid;?>info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel" style="font-size:14px;">Warehouse Spare Information</h4>
						</div>
						
						<div class="modal-body">
						    
							<div class="row mt">
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 spare-info spare-info1 ">
									
										<div class="project">
											<div class="photo-wrapper">
												<div class="	">
													<!--a class="fancybox" href="assets/img/no-image-spare/system-icon.png"><img class="img-responsive" src="assets/img/portfolio/port04.jpg" alt=""></a-->
													<img class="img-responsive" src="<?php echo base_url();?>/_assets/assets/img/no-image-spare/system-icon3.png" alt="">
													
												</div>
											</div>
											
											
										
										</div>
										
									
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 spare-info end-user-pr">
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>SNN<p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:48px;">: <?php echo $row->wsid;?><p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Category<p>
										</div>
											<div style="width:100%;">
											<p style="text-indent:20px;">: <?php echo $row->category;?><p>
										</div>
										
								
										<div style="padding-top:10px;">
										</div>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Spare Name<p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:2px;">: <?php echo $row->spare_name;?><p>
										</div>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Description<p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:5px;">: <?php echo $row->description;?><p>
										</div>
									
										
								</div><!-- col-lg-4 -->
							</div>
							
						</div>
						
						<div class="modal-footer">
					
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
	 
	  
	  <?php }?>


	

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
