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
                      <a href="<?php echo base_url();?>WMS" >
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
                      <a href="<?php echo base_url();?>WMS/Bidding" class="active">
                          <i class="glyphicon glyphicon-stats"></i>
                          <span>Bidding</span>
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
		<h4><i class="glyphicon glyphicon-stats"></i><a href="<?php echo base_url();?>WMS/Bidding" title="List of Bidding PR" style="color:#004D40;padding-left:5px;font-size:15px;">Bidding PR</a></i>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;">PR</a></i>
			<?php foreach ($DraftInfo as $row){ ?>
			<?php foreach ($EmployeeInfo as $row2){ ?>
			<?php foreach ($bidding_spare_purchase as $row3){ ?>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;">
				<code style="text-transform:uppercase">
					<?php echo substr($row2->Fname,0,1).".".substr($row2->Mname,0,1)." ".$row2->Lname." (".$row->SpId.") ";?>
				</code></a>
				
				
			</i>
				
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;">
					<?php echo  date('F d , Y',strtotime($row3->Date))." / ".date('h:i A', strtotime($row3->Time)); ?></a>
			</i>
			
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;">
					<?php echo  $row3->Venue; ?></a>
			</i>
		
		
			</h4>
          	<div class="row">
          		<div class="col-lg-12">
						<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:17px;font-weight:bold;"><?php echo $message;?></center></a>
								 <form method="post" action="<?php echo base_url();?>WMS/Bidding_PR_Info">
												<input  type="hidden" value="<?php echo $row->SpId;?>" name="SpId">
												<input  type="hidden" value="<?php echo $row2->DceNo;?>" name="DceNo">
												<input  type="hidden" value="<?php echo $row3->BId;?>" name="BId">
												<button type="submit" class="btn btn-link btn-link-modal" style="text-decoration:none;"> 
												   <i class='glyphicon glyphicon-arrow-left pull-left' style='margin-right:25px;'> 
														BACK
													</i>
												</button>
												
												</form>
						
							
							</div>
						</div>
			<?php }?>
			<?php }?>
			<?php }?>
						<div style="width:90%;margin-left:5%;">
							<?php foreach ($SpecificSpareInfo as $row){ ?>
							
								<div class="row mt">
									<div class='col-md-12' style="width:11%;">
									Spare Name
							
								</div>
								<div class='col-md-12' style="width:50%;font-weight:bold;	">
									:  <?php echo $row->Category.", ".$row->Spare_Name;?></span>, <?php echo $row->Description;?>
							
								</div>
								
								</div>
								
								<div class="row mt" style="margin-top:15px;">
									<div class='col-md-12' style="width:11%;">
									Quantity
							
								</div>
								<div class='col-md-12' style="width:50%;font-weight:bold;	">
									:  <?php echo number_format($row->Qty,2);?>
							
								</div>
								
								</div>
								<div class="row mt" style="margin-top:15px;">
									<div class='col-md-12' style="width:11%;">
									Unit Measure
							
								</div>
								<div class='col-md-12' style="width:50%;font-weight:bold;	">
									:  <?php echo $row->UM;?>
							
								</div>
								
								</div>
								
								<div class="row mt" style="margin-top:15px;">
									<div class='col-md-12' style="width:11%;">
									Estimated Cost
							
								</div>
								<div class='col-md-12' style="width:50%;font-weight:bold;	">
									:  P <?php echo number_format($row->Estimated_Cost,2);?>
							
								</div>
								
								</div>
						
							<?php }?>
						<div class="spare-new-left-button" style="margin-top:15px;">
								<button class="btn btn-sm" title="Add Participants" data-toggle="modal" data-target="#newDraft"><i class="fa fa-plus"> </i> Participant</button>
							</div>
						</div><!--/end col -->
						
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="margin-top:10px;">
										 <table class="table table-striped  table-hover  table-bordered" >
                                    <thead>
                                        <tr>
											  <th style="border:1px solid #24665B;width:3px;"><center>ITEM</center></th>
											  <th style="border:1px solid #24665B;"><center><i class="fa fa-users"></i> PARTICIPANTS</center></th>
											  <th style="border:1px solid #24665B;"><center><i class="glyphicon glyphicon-shopping-cart"></i> QUOTATIONS</center></th>
										</tr>
                                    </thead>
                                    <tbody>
										 
									 <?php 
									 $i=1;
									 $totalec=0;
									 foreach ($bidding_details as $row){ ?>
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
											<td style="border:1px solid #24665B;text-align:right;padding-right:1%;font-size:14px;"><?php if ($row->Estimated_Cost <= 0){ 
																													echo "--";
																											} else {
																													
																													echo "P".number_format(($row->Estimated_Cost * $row->Qty),2);
																													
																											}	
																												 $ec = $row->Estimated_Cost * $row->Qty;
																												 $totalec = $totalec + $ec;
																											?>
											</td>
								          
											<td>
											<center><a href="#" class="btn btn-sm" title="View Bidding Quotations" data-toggle="modal" data-target="#<?php echo $row->WSid;?>bidding"><i class="glyphicon glyphicon-search" style="color:#004d40;font-size:14px;"> View </i></a></center></td>
											
											  
                                        </tr>
										<?php }?>
										
                                    </tbody>
                                </table>
										
						</div><!-- col-lg-4 total -->
				
					
					     <?php foreach ($bidding_spare_purchase as $row){ ?>	
						  
						
					
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:10px;">
							<button class="btn btn-lg" style="font-size:20px;border-radius:8px;float:right" title="Cancel Bid" data-toggle="modal" data-target="#<?php echo $row->SpId;?>BidCancel">
							<i class="glyphicon glyphicon-remove"></i>
							<span>Bid</span>
							</button>
							
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
  
  
  <!-- Modal Delete Technical -->
  



<?php foreach ($bidding_spare_purchase as $row){?>			
			<div class="modal fade" id="<?php echo $row->SpId;?>BidCancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirm Bidding cancellation</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/editPR");?>	
							<div class="row">
								<input  type="hidden" value="decline-Bid" name="sms">
								<input  type="hidden" value="<?php  echo $row->SpId;?>" name="SpId">
								<input  type="hidden" value="<?php  echo $row->Date_Prepared;?>" name="Date_Prepared">
								<input  type="hidden" value="<?php  echo $row->Requisitioning_Section;?>" name="Requisitioning_Section">
								<input  type="hidden" value="<?php  echo $row->Ppmp_Officer;?>" name="PPMP_officer">
								<input  type="hidden" value="<?php  echo $row->Ppmp_Section;?>" name="PPMP_Section">
								<input  type="hidden" value="<?php  echo $row->Purpose;?>" name="Purpose">
								<input  type="hidden" value="<?php  echo $row->OIC;?>" name="Oic">
								<input  type="hidden" value="Approved PR" name="Status">
								<input  type="hidden" value="<?php  echo $row->DceNo;?>" name="DceNo">
								<input  type="hidden" value="<?php  echo $row->Date_Needed;?>" name="Date_Needed">
								<?php $dc=time();?>
								<input  type="hidden" value="<?php  echo date('F d ,Y',$dc);?>" name="Date_Status_Changed">
								<input  type="hidden" value="<?php  echo $Enduser_Name;?>" name="Po_Incharge">
								<input  type="hidden" value="0000-00-00" name="New_Needed">
								<input  type="hidden" value="<?php  echo $row->note;?>" name="note">
								<input  type="hidden" value="<?php echo $row->remark;?>"  name="remark">
								<input  type="hidden" value="<?php echo $row->BId;?>"  name="BId">
						
								<div class='col-md-12'>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:14px;font-weight:bold;">Are you sure to Cancel Bidding ? </label>
									</div>
									
								</div>
							</div> <!--end row-->
						
						
					</div>
				</div>
				<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","OK","class='btn btn-success'");
									echo form_close();
							?>
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
