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
			<a style="color:#004D40;padding-left:5px;font-size:16px;">Draft</a></i>
			<?php foreach ($DraftInfo as $row){ ?>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;"><code><?php echo $row->SpId;?></code></a></i>
		
			</h4>
          	<div class="row">
          		<div class="col-lg-12">
						<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:17px;font-weight:bold;"><?php echo $message;?></center></a>
							 <a style='font-size:16px;color:#004030;cursor:pointer;' data-toggle='modal' data-target='#deleteprepr' title='Delete'>
								 <i class='glyphicon glyphicon-trash pull-right'> 
								</i>
							 </a>
							 <a style='font-size:16px;color:#004030;cursor:pointer;' onclick='myFunction()' data-toggle='modal' data-target='#printprepr' title='Print'>
								 <i class='glyphicon glyphicon-print pull-right' style='margin-right:25px;'> 
								</i>
							 </a>
							 
							 <a style='font-size:16px;color:#004030;cursor:pointer;' title="Edit Pre-PR" data-toggle='modal' data-target='#<?php echo $row->SpId;?>editDraft' title='Edit'>
								 <i class='glyphicon glyphicon-edit pull-right' style='margin-right:15px;'> 
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
										
										<br></br>
										<div class="spare-left-d">
											<label>LEGEND</label>
										</div>
									    <div class="spare-right-d">
											: <i class="glyphicon glyphicon-check" style="color:#004d40;font-size:14px;"> Check</i>
									
											 <i class="glyphicon glyphicon-exclamation-sign" style="color:#FF0000;margin-left:15px;font-size:14px;"> Available</i>
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
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										<div class="spare-new-left-button">
											<button class="btn btn-sm" title="Add Spare" data-toggle="modal" data-target="#newDraft">
												ADD SPARE <i style="padding-left:5px;" class="fa fa-plus"></i>
											</button>
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
											  <th style="border:1px solid #24665B;"><center>Availability</center></th>
											  <th style="border:1px solid #24665B;"><center><i class="fa fa-gears"></i></center></th>
											  
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
												<button class="btn btn-sm" title="Add Spare" data-toggle="modal" data-target="#<?php echo $row->WSid;?>newTechnical">
													Specifications <i style="padding-left:5px;" class="fa fa-plus"></i>
												</button>
										   </div>
										   
										   <div>
												<ul style="margin-top:8px;list-style-type:circle;">
													
												<?php foreach ($TechnicalInfo as $row1){ 
													if ($row->WSid == $row1->WSid){
												?>
												  <li style="width:100%;">
												  <div style="width:20%;float:left;" class="tech">
													
													- <a title="Edit Specification" href="#" data-toggle="modal" data-target="#<?php echo $row1->TId;?>UpdateTechnical" ><?php echo $row1->Tech_Name;?></a>
												  </div>
												  
												  <div style="width:80%;float:left;">
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
											<td><center><a href="#" class="btn btn-sm" title="Check Availability" data-toggle="modal" data-target="#<?php echo $row->WSid;?>CheckAvailability"><i class="glyphicon glyphicon-check" style="color:#004d40;font-size:14px;"> Check</i></a></center></td>
											<td style="border:1px solid #24665B;">
												<center><a href="#" data-toggle="modal" data-target="#<?php echo $row->WSid;?>UpdateSpare" title="Update Quantity and Amount"><i style="font-size:18px;color:#004D40" class="glyphicon glyphicon-credit-card"></i></a></center>
												<center><a href="#" data-toggle="modal" data-target="#<?php echo $row->WSid;?>DeleteSpare" title="Delete Item <?php echo $i." : ". $row->Spare_Name;?>"><i style="font-size:15px;color:#8C0000" class="glyphicon glyphicon-trash"></i></a></center>
											</td>
											  
                                        </tr>
											
										<?php }?>
										
                                    </tbody>
                                </table>
										
						</div><!-- col-lg-4 total -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="text-align:right;padding-right:11%;margin-top:0px;font-size:14px">
							<p>Total : <span style="margin-left:2%;font-weight:bold;color:#CA254E;">P  <?php echo number_format($totalec,2); ?></span></p>
				
						</div><!-- col-lg-4 -->
					
					     <?php foreach ($DraftInfo as $row){ ?>	
						  
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:10px;">
							<button class="btn btn-sm" title="Edit Note" data-toggle="modal" data-target="#<?php echo $row->SpId;?>newNote">
							Note :  <i style="padding-left:5px;" class="fa fa-edit"></i>
							</button>
							<p style="margin-left:8px;margin-top:10px;text-indent:20px;"><?php echo $row->note?></p>
						</div><!-- col-lg-4 -->
					
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:10px;">
						
							<button class="btn btn-lg" style="font-size:20px;border-radius:8px;float:right" title="Send Pre-PR DRAFT for Approval" data-toggle="modal" data-target="#<?php echo $row->SpId;?>sendPrePR">
							SEND FOR REVIEW
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
  <?php foreach ($TechnicalInfo as $row1){?>
			<div class="modal fade" id="<?php echo $row1->TId;?>DeleteTechnical" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/DeleteTechnicalToDraft");?>	
							<div class="row">
								<div class='col-md-12'>
										<div class='col-md-12' style="margin-left:2%;margin-top:2%;">
										<p>Are you sure to delete " <span  style="font-size:14px;color:#660000;font-weight:bold;"><?php echo $row1->Tech_Name." : ".$row1->value;?></span>" Specification ?</p>
										<input type="hidden" value="<?php echo $row1->SpId;?>" name="SpId">
										<input type="hidden" value="<?php echo $row1->WSid;?>" name="WSid">
										<input type="hidden" value="<?php echo $row1->TId;?>" name="TId">
										<input type="hidden" value="DeleteTechnicalToDraft" name="action">
										
										</div>
								</div>
								
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","YES","style='color:#FFFFFF;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
			
<?php }?>

<!-- Modal Delete Spare-->
  <?php foreach ($SpareInfo as $row){?>
			<div class="modal fade" id="<?php echo $row->WSid;?>DeleteSpare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/DeleteSpareToDraft");?>	
							<div class="row">
								<div class='col-md-12'>
										<div class='col-md-12' style="margin-left:2%;margin-top:2%;">
										<p>Are you sure to delete " <span  style="font-size:14px;color:#660000;font-weight:bold;"><?php echo $row->Category.", ".$row->Spare_Name;?></span>" ?</p>
										<input type="hidden" value="<?php echo $row->SpId;?>" name="SpId">
										<input type="hidden" value="<?php echo $row->WSid;?>" name="WSid">
										<input type="hidden" value="DeleteSpareToDraft" name="action">
										
										</div>
								</div>
								
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","YES","style='color:#FFFFFF;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
			
<?php }?>

 <!-- Modal Update Amount Spare-->
  <?php foreach ($SpareInfo as $row){?>
			<div class="modal fade" id="<?php echo $row->WSid;?>UpdateSpare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog2">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Spare Item Info</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/UpdateSpareToDraft");?>	
							<div class="row">
								<div class='col-md-12'>
								
									<input  type="hidden" value="EditSpareToDraft" name="action">
									<input  type="hidden" value="<?php echo $row->SpId;?>" name="SpId">
									<input  type="hidden" value="<?php echo $row->WSid;?>" name="WSid">
									<table class="table table-striped  table-hover  table-bordered" >
                                    <thead>
                                        <tr>
											  <th style="border:1px solid #24665B;"><center>COMPLETE DESCRIPTION / SPECIFICATION</center></th>
											  <th style="border:1px solid #24665B;"><center>Estimated_Cost</center></th>
											  <th style="border:1px solid #24665B;"><center>UNIT MEASURE</center></th>
											  <th style="border:1px solid #24665B;"><center>QTY</center></th>
										</tr>
                                    </thead>
                                    <tbody>
										 
                                        <tr>
											
                                            
											<td style="border:1px solid #24665B;"><p>
											<span style="font-weight:bold;font-size:12px;"><?php echo $row->Category.", ".$row->Spare_Name;?></span>, <?php echo $row->Description;?></p>
											<div style="margin-top:1%;font-size:12px;font-weight:bold;">
											</div>
											
											</td>
                                            
											<td style="border:1px solid #24665B;text-align:right;">
												<input type="number" style="text-align:center;text-align:center;" class="form-control" placeholder="Enter Amount" name="amount" value="<?php echo $row->Estimated_Cost;?>">

											</td>
                                           
                                            <td style="border:1px solid #24665B;">
											<div class="form-group">
											  <select class="form-control" name="um"  style="font-size:12px;">  
										    	<option><?php echo $row->UM;?></option>
												<option value="LOT">LOT</option>
												<option value="SET">SET</option>
												<option value="TUBE">TUBE</option>
												<option value="UNIT">UNIT</option>
											  </select>
											</div>
											</td>
											  <td style="border:1px solid #24665B;">
												<input type="number" style="text-align:center;text-align:center;" class="form-control" placeholder="Enter Quantiy" name="qty" value="<?php echo $row->Qty;?>">
											
											</td>
                                        </tr>
										
                                    </tbody>
                                    </table>
								</div>
								
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","UPDATE","style='color:#FFFFFF;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
			
<?php }?>

<!-- Modal Update Technical-->
  <?php foreach ($TechnicalInfo as $row1){?>
			<div class="modal fade" id="<?php echo $row1->TId?>UpdateTechnical" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog2">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Update Specification Info</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/UpdateTechnicalToDraft");?>	
							<div class="row">
								<div class='col-md-12'>
								
									<input  type="hidden" value="EditTechnicalToDraft" name="action">
									<input  type="hidden" value="<?php echo $row1->TId;?>" name="TId">
									<input  type="hidden" value="<?php echo $row1->SpId;?>" name="SpId">
									<input  type="hidden" value="<?php echo $row1->WSid;?>" name="WSid">
									
									
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Name</label>
										<input  class="form-control"  name="technical-name" type="text" value="<?php echo $row1->Tech_Name;?>" placeholder="Text here ... ">
										
									</div>
								</div>
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Value</label>
										<input  class="form-control"  name="technical-value" type="text"s value="<?php echo $row1->value;?>" placeholder="Value here... ">
									
									</div>
								</div>
									
								</div>
								
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<button type="button" style="font-size:12px;float:left;" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row1->TId;?>DeleteTechnical" title="delete specification">Delete</button>
							<?php //registration button
								
									echo form_submit("loginSubmit","UPDATE","style='color:#FFFFFF;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
			
<?php }?>
			<!-- Modal Create WRS-->
			<div class="modal fade" id="newDraft" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">ADD SPARE</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/add_spare");?>	
							<div class="row">
								<div class='col-md-12'>
										<div class='col-md-12' style="margin-left:2%;margin-top:2%;">
										<label>List of Spares :</label>
										<br>
										<input type="hidden" value="add-spare-verified" name="new_spare">
										<?php foreach ($DraftInfo as $row1){ ?>
										<input type="hidden" value="<?php echo $row1->SpId;?>" name="SpId">
									    <?php }?>
										<select name="WSid" style="font-size:13px;margin-left:10%;padding:5px;border-color:#00271D;width:90%;">
										  <option value="-1">Please Select</option>
										   <?php 
												foreach ($Category as $row){
													
														$display_text="$row->Category - $row->Spare_Name, $row->Description";
												?>
														<option value="<?php echo $row->WSid; ?>"><?php echo substr($display_text,0,75); ?></option>
													
											
										   <?php 
													
											}											
										   ?>
										
										</select>
										</div>
								</div>
								
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<button type="button" style="font-size:12px;float:left;" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#newSpare" alt="List of Spares">New Spare</button>
							<?php //registration button
								
									echo form_submit("loginSubmit","ADD","style='color:#FFFFFF;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>

  <?php foreach ($SpareInfo as $row){?>			
			<!-- Modal Create Technical-->
			<div class="modal fade" id="<?php echo $row->WSid;?>newTechnical" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">ADD SPECIFICATION</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/new_technical");?>
									<input type="hidden" value="new-technical-verified" name="new_technical">
									<input type="hidden" value="<?php echo $row->WSid;?>" name="WSid">
							<div class="row">
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Item</label>
										<br>
										<p style="padding-left:5%;"><span><?php echo $row->Category.", ".$row->Spare_Name;?></span>, <?php echo $row->Description;?></p>
									</div>
								</div>
									<?php foreach ($DraftInfo as $row){ ?>
										<input type="hidden" value="<?php echo $row->SpId;?>" name="SpId">
									
									<?php }?>
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Name</label>
										<br>
										<textarea class="form-control"  name="technical-name" placeholder="Text Here ... " required></textarea>
									</div>
								</div>
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Value</label>
										<br>
										<textarea class="form-control"  name="technical-value" placeholder="Text Here ... " required></textarea>
									</div>
								</div>
								
							
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
							<?php //registration button
								
									echo form_submit("loginSubmit","ADD","style='color:#FFFFFF;padding:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
<?php }?> 

<?php foreach ($DraftInfo as $row){?>			
			<div class="modal fade" id="<?php echo $row->SpId;?>editDraft" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Edit PRE-PR</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/editdraft");?>	
							<div class="row">
								<div class='col-md-12'>
								<input  type="hidden" value="<?php  echo $row->SpId;?>" name="SpId">
								<input  type="hidden" value="<?php  echo $row->Date_Prepared;?>" name="Date_Prepared">
								<input  type="hidden" value="<?php  echo $row->Requisitioning_Section;?>" name="Requisitioning_Section">
								<input  type="hidden" value="<?php  echo $row->Ppmp_Officer;?>" name="PPMP_officer">
								<input  type="hidden" value="<?php  echo $row->Ppmp_Section;?>" name="PPMP_Section">
								<input  type="hidden" value="<?php  echo $row->OIC;?>" name="Oic">
								<input  type="hidden" value="<?php  echo $row->Status;?>" name="Status">
								<input  type="hidden" value="<?php  echo $row->Date_Status_Changed;?>" name="Date_Status_Changed">
								<input  type="hidden" value="<?php  echo $row->PO_Incharge;?>" name="Po_Incharge">
								<input  type="hidden" value="<?php  echo $row->DceNo;?>" name="DceNo">
								<input  type="hidden" value="<?php  echo $row->note;?>" name="note">
								<input  type="hidden" value="<?php  echo $row->Date_Needed;?>" name="Date_Needed">
								<input  type="hidden" value="<?php  echo $row->remark;?>" name="remark">
									<div class="pull-left" style="margin-left:5%;width:45%;">
										<div class="pull-left" style="width:50%;">
												PRE - PR No.
												<br></br>
												Requisition Section
												<br></br>
												Cost Center Number
										</div>
											
										<div class="pull-right" style="font-weight:bold;width:50%;">
												: <?php  echo $row->SpId;?>
												
												<br></br>
												: <?php  echo $row->Requisitioning_Section;?>
												<br></br>
												: <?php echo $CcNo;?>
										</div>
								
									</div>
									
									<div class="pull-right" style="width:50%;">
										<div class="pull-left" style="width:35%;">
												Date Prepared
												<br></br>
												Prev. Needed
												<br></br>
												New Needed
										</div>
											
										<div class="pull-right" style="width:65%;">
												: <?php echo $row->Date_Prepared;?>
												<br></br>
												: <?php echo $row->Date_Needed;?>
												
												
												<div style="padding-top:8px;" class="input-group-btn">
												
												<input type="date" style="padding:5px;font-size:12px;" class="form-control" value="" name="New_Needed">
				
												</div>
										</div>
								
									</div>
								</div>
	
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Purpose of Purchase</label>
										<br>
										<textarea class="form-control"  name="Purpose" placeholder="Text Here ... " required><?php echo $row->Purpose;?></textarea>
									</div>
								</div>
							</div> <!--end row-->
						</div>	
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
							<?php //registration button
								
									echo form_submit("loginSubmit","Save","style='color:#FFFFFF;padding:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
<?php }?>

<?php foreach ($DraftInfo as $row){?>			
			<div class="modal fade" id="<?php echo $row->SpId;?>newNote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Edit Note</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/editdraft");?>	
							<div class="row">
								<div class='col-md-12'>
								<input  type="hidden" value="<?php  echo $row->SpId;?>" name="SpId">
								<input  type="hidden" value="<?php  echo $row->Date_Prepared;?>" name="Date_Prepared">
								<input  type="hidden" value="<?php  echo $row->Requisitioning_Section;?>" name="Requisitioning_Section">
								<input  type="hidden" value="<?php  echo $row->Ppmp_Officer;?>" name="PPMP_officer">
								<input  type="hidden" value="<?php  echo $row->Ppmp_Section;?>" name="PPMP_Section">
								<input  type="hidden" value="<?php  echo $row->Purpose;?>" name="Purpose">
								<input  type="hidden" value="<?php  echo $row->OIC;?>" name="Oic">
								<input  type="hidden" value="<?php  echo $row->Status;?>" name="Status">
								<input  type="hidden" value="<?php  echo $row->Date_Status_Changed;?>" name="Date_Status_Changed">
								<input  type="hidden" value="<?php  echo $row->PO_Incharge;?>" name="Po_Incharge">
								<input  type="hidden" value="<?php  echo $row->DceNo;?>" name="DceNo">
								<input  type="hidden" value="<?php  echo $row->Date_Needed;?>" name="Date_Needed">
								<input  type="hidden" value="<?php  echo $row->remark;?>" name="remark">
								<input  type="hidden" value="0000-00-00" name="New_Needed">
							
	
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;margin-bottom:12px;">
										<label>Note</label>
										<br>
										<textarea class="form-control"  name="note" placeholder="Text Here ... " required><?php  echo $row->note;?></textarea>
									</div>
								</div>
							</div> <!--end row-->
						</div>	
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
							<?php //registration button
								
									echo form_submit("loginSubmit","Save","style='color:#FFFFFF;padding:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
			</div>
<?php }?>

<?php foreach ($DraftInfo as $row){?>			
			<div class="modal fade" id="<?php echo $row->SpId;?>sendPrePR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/editdraft");?>	
							<div class="row">
								<div class='col-md-12'>
								<input  type="hidden" value="sms-confirm" name="sms">
								<input  type="hidden" value="<?php  echo $row->SpId;?>" name="SpId">
								<input  type="hidden" value="<?php  echo $row->Date_Prepared;?>" name="Date_Prepared">
								<input  type="hidden" value="<?php  echo $row->Requisitioning_Section;?>" name="Requisitioning_Section">
								<input  type="hidden" value="<?php  echo $row->Ppmp_Officer;?>" name="PPMP_officer">
								<input  type="hidden" value="<?php  echo $row->Ppmp_Section;?>" name="PPMP_Section">
								<input  type="hidden" value="<?php  echo $row->Purpose;?>" name="Purpose">
								<input  type="hidden" value="<?php  echo $row->OIC;?>" name="Oic">
								<input  type="hidden" value="Pending" name="Status">
								<input  type="hidden" value="<?php  echo $row->Date_Status_Changed;?>" name="Date_Status_Changed">
								<input  type="hidden" value="<?php  echo $row->PO_Incharge;?>" name="Po_Incharge">
								<input  type="hidden" value="<?php  echo $row->DceNo;?>" name="DceNo">
								<input  type="hidden" value="<?php  echo $row->Date_Needed;?>" name="Date_Needed">
								<input  type="hidden" value="0000-00-00" name="New_Needed">
								<input  type="hidden" value="<?php  echo $row->note;?>" name="note">
								<input  type="hidden" value="<?php  echo $row->remark;?>" name="remark">
							
	
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;margin-bottom:12px;font-size:14px;font-weight:bold;">
										<p>Send Pre-PR Draft for Approval</p>
										<p>Are you to continue ? </p>
									</div>
								</div>
							</div> <!--end row-->
						</div>	
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
							<?php //registration button
								
									echo form_submit("loginSubmit","Send","style='color:#FFFFFF;padding:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
			</div>
<?php }?>
			
			<!-- Modal Create WRS-->
			<div class="modal fade" id="newSpare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">CREATE NEW SPARE</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/new_spare");?>
									<input type="hidden" value="new-spare-verified" name="new_spare">
									<?php foreach ($DraftInfo as $row){ ?>
										<input type="hidden" value="<?php echo $row->SpId;?>" name="SpId">
									
									<?php }?>
							<div class="row">
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Category</label>
										<br>
										<textarea class="form-control"  name="spare-category" placeholder="Text Here ... " required></textarea>
									</div>
								</div>
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Name</label>
										<br>
										<textarea class="form-control"  name="spare-name" placeholder="Text Here ... " required></textarea>
									</div>
								</div>
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label>Description</label>
										<br>
										<textarea class="form-control"  name="spare-description" placeholder="Text Here ... " required></textarea>
									</div>
								</div>
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
							<?php //registration button
								
									echo form_submit("loginSubmit","Create","style='color:#FFFFFF;padding:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
			
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
