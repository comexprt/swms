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
                          <i class="fa fa-briefcase"></i>
                          <span>Spares Inventory</span>
                      </a>
                     
                  </li>

				  <li class="sub-menu">
                      <a  href="<?php echo base_url();?>WMS/Request_Spare" class='active'>
                          <i class="fa fa-send"></i>
                          <span>Requested Spares</span>
                      </a>
                  </li>

				  <li class="sub-menu">
                      <a  href="<?php echo base_url();?>WMS/Approve_Request" >
                          <i class="glyphicon glyphicon-ok"></i>
                          <span>Approved Spares</span>
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
          	<h4><i class="fa fa-tasks"></i><a style="color:#004D40;padding-left:5px;">Transactions</a><i class="fa fa-angle-double-left" style="padding-left:5px;">
			</i><a style="color:#004D40;padding-left:5px;font-size:16px;" href="<?php echo base_url();?>WMS/Request_Spare" title="back to list">Requested Spares</a></i>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<?php foreach ($DraftInfo as $row){ ?>
			<a style="color:#004D40;padding-left:5px;font-size:16px;"><?php echo $row->status;?></a></i>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;"><code><?php echo $row->wrid;?></code></a></i>
		
			</h4>
          	<div class="row">
          		<div class="col-lg-12">
						<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:17px;font-weight:bold;"><?php echo $message;?></center></a>
							 <a style='font-size:16px;color:#004030;cursor:pointer;' data-toggle='modal' data-target='#DeleteRequest' title='Delete Request'>
								 <i class='glyphicon glyphicon-trash pull-right'> 
								</i>
							 </a>
							 
							</div>
						</div>
			<?php }?>
						<div style="width:90%;margin-left:5%;">
							<?php foreach ($DraftInfo as $row){ 
								$status_check = $row->status;
							?>
							
								<div class="row mt">
								
								
								
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										<br>
										<div class="spare-left-purpose">
											<label>Date Requested<p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: <?php echo $row->date_created;?><p>
										</div>
										
										
								</div><!-- col-lg-4 -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										
										<div class="spare-left-purpose">
											<label>Purpose <p></label>		
										</div>
										<div class="spare-right-purpose">
											<p>:<?php  
												$remarks4 = $row->remarks;
												$con_cat4 = explode ("///",$remarks4);
												
												echo $con_cat4[0];?>
												<p>
										</div>
										
										
								</div><!-- col-lg-4 -->
								<?php  if ($status_check != 'Draft' ) {}else{?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1	">
										<div class="spare-new-left-button">
											<button class="btn btn-sm" title="Add Spare" data-toggle="modal" data-target="#newDraft">
												ADD SPARE <i style="padding-left:5px;" class="fa fa-plus"></i>
											</button>
										</div>
										
										
								</div><!-- col-lg-4 -->
									
								
							<?php }}?>
						</div>
						
						<!-- /.panel-body -->
				 
				</div><!--/end col -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="margin-top:10px;">
										 <table class="table table-striped  table-hover  table-bordered" >
                                    <thead>
                                        <tr>
											  <th style="border:1px solid #24665B;width:3px;"><center>ITEM NO.</center></th>
											  <th style="border:1px solid #24665B;"><center>PARTICULARS</center></th>
											  <th style="border:1px solid #24665B;"><center>QTY REQUESTED</center></th>
											  <th style="border:1px solid #24665B;"><center>UM</center></th>
											  <?php 
												 if ($status_check != 'Draft' ){}else{
												 ?>
											  <th style="border:1px solid #24665B;"><center><i class="fa fa-gears"></i> OPTION</center></th>
											  <?php } ?>
										</tr>
                                    </thead>
                                    <tbody>
										 
									 <?php 
									 $i=1;
									 $totalec=0;
									 foreach ($SpareInfo as $row){ ?>
                                        <tr>
											
                                            <td style="border:1px solid #24665B;font-weight:bold"><center><?php
											
											echo $i++;?></center></td>
                                            
											<td style="border:1px solid #24665B;"><p>
											<a style="color:#004d40;font-size:13px;" class="btn btn-link btn-link-modal" data-toggle="modal" data-target="#<?php echo $row->wsid;?>info"><?php echo $row->spare_name;?></a>
											</td>
											<td style="border:1px solid #24665B;"><p>
											<center>
											<span style="font-weight:bold;font-size:12px;"><?php echo $row->qty_requested;?></span>
											</center>
											</p>
										  
											</td>
											<td style="border:1px solid #24665B;"><p>
											<center><span style="font-weight:bold;font-size:12px;text-transform:uppercase;"><?php echo $row->unit_of_measurement;?></span>
											</center></p>
										  
											</td>
											<?php 
											 if ($status_check != 'Draft' ) {}else{
											 ?>
											<td style="border:1px solid #24665B;">
												<center><a href="#" data-toggle="modal" data-target="#<?php echo $row->ddid."".$row->wrid;?>UpdateSpare" title="Update Item : <?php echo $row->spare_name;?>"><i style="font-size:18px;color:#004D40;padding-right:10%;" class="glyphicon glyphicon-edit"></i></a>
												<a href="#" data-toggle="modal" data-target="#<?php echo $row->ddid."".$row->wrid;?>DeleteSpare" title="Remove Item : <?php echo $row->spare_name;?>"><i style="font-size:18px;color:#8C0000" class="fa fa-times"></i></a></center>
											</td>
											<?php }?>
											  
                                        </tr>
											
										<?php }?>
										
										
                                    </tbody>
									
										
								</table>
										
						</div><!-- col-lg-4 total -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="margin-top:10px;"><center>- - - - - - - - - - - - - - - - - - - - - - -   NOTHING FOLLOWS    - - - - - - - - - - - - - - - - - - - - - - -</center></div>
						 <?php foreach ($DraftInfo as $row){ 
						 if ($status_check != 'Draft' ) {}else{
						 ?>	
						 
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:10px;">
							<button class="btn btn-lg" style="font-size:20px;border-radius:8px;float:right" title="PR Approval" data-toggle="modal" data-target="#<?php echo $row->wrid;?>Accept">
							<i class="glyphicon glyphicon-send"></i>
							<span>Submit</span>
							</button>
						</div><!-- col-lg-4 -->
						<?php } ?>
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
							echo $row->released_by; ?>
							</button>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Date Modified  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Pre-PR Approval">
							<?php 
								
								echo $row->date_released;
							
							?>
							</button>
						</div><!-- col-lg-4 -->
							<?php }?>
					
				</div> <!-- /end row -->
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
  
  
<?php foreach ($DraftInfo as $row){?>			
			<div class="modal fade" id="<?php echo $row->wrid;?>Accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/submitrequestspares");?>	
							<div class="row">
								<input  type="hidden" value="accept-confirm" name="sms">
								<input  type="hidden" value="<?=$row->wrid;?>" name="wrid">
							
						
								<div class='col-md-12'>
									<div style="margin-top:8px;margin-bottom:12px;">
										<div style="margin-top:8px;">
										<label style="font-size:12px;font-weight:bold;">Are you sure to Submit Spares Withdrawal Request ?</label>
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

			<div class="modal fade" id="DeleteRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/delete_spare_request");?>	
							<div class="row">
								<div class='col-md-12'>
										<div class='col-md-12' style="margin-left:2%;margin-top:2%;">
										<p>Are you sure to delete " <span  style="font-size:14px;color:#660000;font-weight:bold;"><?php echo $WRId;?></span>" ?</p>
										<input type="hidden" value="<?php echo $WRId;?>" name="WRId">
										
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

			

 <!-- Modal Update Amount Spare-->
  <?php foreach ($SpareInfo as $row){?>
			<div class="modal fade" id="<?php echo $row->ddid."".$row->wrid;?>UpdateSpare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog2" style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Spare Requested Info</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/UpdateSpareToRequest");?>	
							<div class="row">
								<input  type="hidden" value="EditSpareToDraft" name="action">
							
								
												<input  type="hidden" value="<?php echo $row->wrid;?>" name="WRId">
												<input  type="hidden" value="<?php echo $row->ddid;?>" name="ddid">
						
								<div class='col-md-12'>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:12px;">
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Category</label>
										<br>
										<label style="font-size:13px;padding-left:15px;"><?php echo $row->category;?></label>
									</div>
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Spare Name</label>
										<br>
										<label style="font-size:13px;padding-left:15px;"><?php echo $row->spare_name;?></label>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Available</label>
										<br>
										<label style="font-size:13px;padding-left:15px;"><?php echo $row->qty_available." ".$row->unit_of_measurement;?></label>
									</div>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Requested  Quantity</label>
										<br>
										<input type="number" class="form-control"  value="<?php echo $row->qty_requested;?>" name="Qty_Requested" min="1" max="<?php echo $row->qty_released + $row->qty_available;?>"required/>
										<br>
							
										
							
										</div>
									</div>
									
									
									</div>
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

<!-- Modal Create WRS-->
			<div class="modal fade" id="newDraft" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog2">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">REQUEST SPARE</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php //echo form_open("WMS/add_spare");?>	
							<div class="row" style="width:98%;margin:0px auto;">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-advance table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th><center>SNN #</center></th>
												<th class="hidden-phone"><i class="fa fa-bookmark"></i> Category</th>
												  <th><i class="glyphicon glyphicon-info-sign"></i> Spare Name</th>
												  <th><center><i class="glyphicon glyphicon-import"></i>Quantity Available</center></th>
												  <!--th><i class="glyphicon glyphicon-export"></i> On Order</th-->
												</tr>
										</thead>
										
										<tbody>
										<?php foreach ($Category as $row){ ?>
											<tr class="odd gradeX">
												<td><center><?php echo $row->wsid;?></center></td>
												<td class="hidden-phone" style="text-indent:2%;"><?php echo $row->category;?></td>
												<td><a type="button" class="btn btn-link btn-link-modal" 
												 data-toggle="modal" data-target="#<?php echo $row->wsid;?>info">
												 <?php echo $row->spare_name;?></a></td>
												 
												<td style="text-indent:1%;">
												<?php if($row->quantity_onhand > 0){ ?>
													<center><a type="button" class="btn btn-link btn-link-modal" 
													 data-toggle="modal" 
													 data-target="#<?php echo $row->wsid;?>sub">
													<?php echo $row->quantity_onhand." ".$row->unit_of_measurement;?></a></center>
												<?php } else{ ?>
												
												<center><span class="label label-danger">Out Of Stock</span></center>
												<?php } ?>
												</td>
												
											</tr>
											<?php } ?>
										
										  
										  
										</tbody>
									</table> 
								
								</div> <!--end row-->
							</div>
						
						</div>
					</div>
				</div>
			</div>
	

	<?php foreach ($Delivery as $row1){ ?>
			<div class="modal fade" id="<?php echo $row1->ddid;?>Request" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							
						    <h4 class="modal-title" id="myModalLabel">Confirm Spare Request</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/add_spare");?>	
							<div class="row">
								<input  type="hidden" value="add-spare-verified" name="new_spare">
							
												<input  type="hidden" value="<?php echo $WRId;?>" name="WRId">
												<input  type="hidden" value="<?php echo $row1->ddid;?>" name="ddid">
						
								<div class='col-md-12'>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:12px;">
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;"><?php echo $row1->category." - ".$row1->spare_name;?></label>
										<br>
										<label style="font-size:13px;font-weight:bold;"><?php echo "₱ ".number_format($row1->delivery_price,2); ?></label>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Available</label>
										<br>
										<label style="font-size:13px;padding-left:15px;"><?php echo $row1->qty_available." ".$row1->unit_of_measurement;?></label>
									</div>
									
									<?php
										if ($row1->qty_available <= 0){}else{
									?>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Request  Quantity</label>
										<br>
										<input type="number" class="form-control"  value="<?php echo $row1->qty_available;?>" name="Qty_Requested" min="1" max="<?php echo $row1->qty_available;?>"required/>
										
							
										</div>
									</div>
									<?php
										}
									?>
									
									
									</div>
								</div>
							</div> <!--end row-->
						
						
					</div>
				<div class="modal-footer">
							
							<?php //registration button
									if ($row->quantity_onhand <= 0){
									
									}else{
									
								
									echo form_submit("loginSubmit","OK","class='btn btn-success'");
									echo form_close();
									}
							?>
				</div>
				<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","OK","class='btn btn-success'");
									echo form_close();
							?>
							<button type="button" class="pull-left btn btn-default btn-color-close" data-dismiss="modal" data-toggle="modal" 
													data-target="#<?php echo $row1->wsid; ?>sub"><i class="glyphicon glyphicon-arrow-left" style="font-size:15px;"></i></button>
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

 <?php foreach ($SpareInfo as $row){?>
			<div class="modal fade" id="<?php echo $row->ddid."".$row->wrid;?>DeleteSpare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/delete_spare");?>	
							<div class="row">
								<div class='col-md-12'>
										<div class='col-md-12' style="margin-left:2%;margin-top:2%;">
										<p>Are you sure to remove " <span  style="font-size:14px;color:#660000;font-weight:bold;"><?php echo $row->category.", ".$row->spare_name;?></span>" ?</p>
										<input type="hidden" value="<?php echo $WRId;?>" name="WRId">
										<input type="hidden" value="<?php echo $row->ddid;?>" name="ddid">
										
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
	  <?php foreach ($Category as $row){ ?>
			<div class="modal fade" id="<?php echo $row->wsid;?>sub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel" style="font-size:14px;">Sub-Item Details </h4>
						</div>
						
						<div class="modal-body">
						    
							<div class="row mt">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info spare-info1 ">
									
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>SNN<p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:40px;">: <?php echo $row->wsid;?><p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Category<p>
										</div>
											<div style="width:100%;">
											<p style="text-indent:15px;">: <?php echo $row->category;?><p>
										</div>
										
								
										<div style="padding-top:10px;">
										</div>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Spare Name<p>
										</div>
										
										<div style="width:100%;">
											<p style="text-indent:2px;">: <?php echo $row->spare_name;?><p>
										</div>
									
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info end-user-pr">
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Description<p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:2px;">: <?php echo $row->description;?><p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>ON HAND :</p>
										</div>
										<br>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:24px;" >
											<p><?php echo $row->quantity_onhand." ".$row->unit_of_measurement; ?></p>
										</div>
									
								</div><!-- col-lg-4 -->
								
							</div>
							<!-- TABLE -->
							<div class="row">
								<center>
								<div class="row" style="width:98%">
									<table class="table table-advance table-bordered">
										<thead>
											<tr>
												<th>
													<center>
														Date Delivered
													</center>
												</th>
												<th class="hidden-phone">
													<center>
														<i class="fa fa-bookmark"></i> Price
													</center>
												</th>
												<th>
													<center>
														<i class="glyphicon glyphicon-import"></i> Available
													</center>
												</th>
											</tr>
										</thead>
										
										<tbody>
											<?php 
											
												foreach ($Delivery as $row1){ 
												if ($row->wsid == $row1->wsid){
											
											?>
												<tr class="odd gradeX">
													<td><center><?= date('F d , Y',strtotime($row1->date_delivered));?></center></td>
													<td class="text-right">
														<?php echo "₱ ".number_format($row1->delivery_price,2); ?>
													</td>
													<td><center><?php echo $row1->qty_available; ?> <code class="pull-right"  style="background-color:#FFFFFF;">
															<a data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row1->ddid;?>Request" title="Request For Withdrawal">
															<i class="glyphicon glyphicon-log-out" style="font-size:15px;"></i></code></a>
														</center></td>
													
												</button>
													
												
													
												</tr>
											<?php }else{}} ?>
										  
										  
										</tbody>
									</table> 
								
								</div>
								</center>
							</div>
							
						</div>
						
						<div class="modal-footer">
						
							<p class="pull-left" style="font-size:12px;">Click <i class="glyphicon glyphicon-log-out" style="font-size:15px;"></i> To Request Withdrawal</code><p>
							
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
			$('#dataTables-example').DataTable({
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
