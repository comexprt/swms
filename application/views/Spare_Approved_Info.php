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
                          <i class="fa fa-database"></i>
                          <span>Spares Inventory</span>
                      </a>
                     
                  </li>

				 <li class="sub-menu">
                      <a href="javascript:;" class="active">
                          <i class="fa fa-envelope" aria-hidden="true" ></i>
                          <span>Spares Request</span>
				
						  

                      </a>
                      <ul class="sub">
                          <li><a href="<?php echo base_url();?>WMS/Spare_Request">Pending
						  <span class="label label-theme pull-right"  style="margin-right:55%;font-size:10px;">
						  <?php foreach ($getallpendingSpareRequestCount as $row){
							echo $row->count;
						  }
						  ?></span>
						  </a>
						  </li>
                          <li class="active"><a href="<?php echo base_url();?>WMS/Request_Approved">Release
						  </a>
						  </li>
                      </ul>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-shopping-cart" aria-hidden="true" ></i>
                          <span>Purchase Request</span>
				
                      </a>
					  
                      <ul class="sub">
                          <li><a href="<?php echo base_url();?>WMS/Spare_Purchases">Pending
						  <span class="label label-theme pull-right"  style="margin-right:55%;font-size:10px;">
						  <?php foreach ($getallpendingPurchaseRequestCount as $row){
							echo $row->count;
						  }
						  ?></span>
						  </a>
						  </li>
                          <li><a href="<?php echo base_url();?>WMS/Spare_Purchases_Approved">Approved
						  </a>
						  </li>
                      </ul>
                  </li>
				  
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/bids">
                          <i class="fa fa-sort-amount-desc"></i>
                          <span>Bidding</span>
                      </a>
                  </li>

				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Purchase_Order">
                          <i class="glyphicon glyphicon-barcode"></i>
                          <span>Purchase Order</span>
                      </a>
                  </li>
                  
					<li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Delivery">
                          <i class="fa fa-truck"></i>
                          <span>Delivery</span>
                      </a>
                  </li>
                  
				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/PO_Reports">
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
          	<h4><i class="glyphicon glyphicon-file"></i><a href="<?php echo base_url();?>WMS/Request_Approved" title="List of Spare Request" style="color:#004D40;padding-left:5px;font-size:15px;">Spares Request</a>
			<i class="fa fa-angle-double-left" style="padding-left:5px;"></i><a style="color:#004D40;padding-left:5px;font-size:16px;">Approved</a></h4>
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:17px;font-weight:bold;"><?php echo $message;?></center></a>							
							</div>
						</div>
				
						<div style="width:90%;margin-left:5%;">
							<?php foreach ($DraftInfo as $row){ ?>
							
								<div class="row mt">
								
								
								
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										<br>
										<div class="spare-left-purpose">
											<label>Date Requested<p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: <?php echo $row->date_created; ?><p>
										</div>
										
										
								</div><!-- col-lg-4 -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										
										<div class="spare-left-purpose">
											<label>Purpose <p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: 
											<?php 
												$status = $row->status;
												$remarks3 = $row->remarks;
												$con_cat3 = explode ("///",$remarks3);
												
												echo $con_cat3[0];?>
											<p>
										</div>
										
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										
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
											  <th style="border:1px solid #24665B;"><center>PARTICULARS</center></th>
											  <th style="border:1px solid #24665B;"><center>QTY REQUESTED</center></th>
											  <th style="border:1px solid #24665B;"><center>QTY RELEASED</center></th>
											  <th style="border:1px solid #24665B;"><center>ACTION</center></th>
											  
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
											<center><span style="font-weight:bold;font-size:12px;"><?php echo $row->qty_requested." ".$row->unit_of_measurement;?></span>
											</center></p>
										  
											</td>
											<td style="border:1px solid #24665B;"><p>
											<center><span style="font-weight:bold;font-size:12px;text-transform:uppercase;"><?php echo $row->qty_released." ".$row->unit_of_measurement;?></span>
											</center></p>
										  
											</td>
											<td>
											<p>
											<?php if ($status == 'Released'){ ?>
											<center><span><i class="glyphicon glyphicon-ok" style="color:#004d40;font-size:18px;"></i></span></center>
											<?php }else{ if ($row->qty_released == 0){?>
												<center><button href="#" class="btn btn-xs" style="background-color:#FFFFFF;border:1px solid #004D40;" title="Add Qty Release" data-toggle="modal" data-target="#<?php echo $row->wsid;?>release2"><i class="glyphicon glyphicon-plus" style="color:#004d40;font-size:11px;"></i></button></center>
												<?php }else{ ?>
												<center><a href="#" class="btn btn-xs" style="" title="Update Qty Release" data-toggle="modal" data-target="#<?php echo $row->wsid;?>release2"><i class="glyphicon glyphicon-edit" style="color:#004d40;font-size:18px;"></i></a></center>
												<?php } ?>
											<?php } ?>
											</p>
											</td>
											  
                        
										   
                                        </tr>
											
										<?php }?>
										
										
                                    </tbody>
									
										
								</table>
										
						</div><!-- col-lg-4 total -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="margin-top:10px;"><center>- - - - - - - - - - - - - - - - - - - - - - -   NOTHING FOLLOWS    - - - - - - - - - - - - - - - - - - - - - - -</center></div>
						 
						
						<?php foreach ($DraftInfo as $row){ 
						if ($row->status == 'Released'){}else{
						?>	
						<a class="btn btn-xs" style="border:1px solid #004D40;font-size:20px;font-weight:bold;float:right;color:#004D40;margin-right:1%;" title="Approve to Release Spares Request" 
						data-toggle="modal" data-target="#ApproveSpareRequest">
							<i class="glyphicon glyphicon-check" aria-hidden="true"></i><code style="background-color:#FFFFFF;color:#004D40;">Approve</code>
						</a>
						<?php } ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:1%;">
							<div style="width:100%;height:2px;background-color:#24665B;">
							</div>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:20px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Evaluation  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Evaluation">
							<?php if ($row->status == 'Approved'){
								echo "Accepted"; 
							}elseif ($row->status == 'Released'){
								echo "Approved"; 
							}else{echo $row->status;}
							?>
							</button>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Responsible  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Responsible Person">
							<?php
							echo $row->released_by; ?>
							</button>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Date Modified  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Date Modified">
							<?php 
								if (date('F d , Y',strtotime($row->date_released))== "January 01 , 1970"){
								echo "- -";
								}else{
							echo date('F d , Y',strtotime($row->date_released))." - ".date('h:i A', strtotime($row->date_released));
								}
							?>
							</button>
						</div><!-- col-lg-4 -->
						<?php 
							//$remarks = $row->remarks."///Spare request already requested by Engr. Moncay and released";
							$remarks = $row->remarks;
							$con_cat = explode ("///",$remarks);
							$count_con_cat = count ($con_cat);
							if ($count_con_cat >= 2){ ?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:1%;">
							<h4 style="float:left;font-weight:bold;margin-top:1px;width:130px;">Remarks </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Remarks"> 
							<?php 
								
								echo $con_cat[1];
							
							?>
							</button>
							
						</div><!-- col-lg-4 -->
								
							<?php }else {} ?>
							<?php }?>
					
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
	  <!-- Modal Update Amount Spare-->
	  
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
			<div class="modal fade" id="<?php echo $row->wsid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
												<input  type="hidden" value="<?php echo $row->wsid;?>" name="WSid">
												<input  type="hidden" value="<?php echo $row->qty_released;?>" name="Qty_Release">
						
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
										<label style="font-size:13px;padding-left:15px;"><?php echo $row->quantity_onhand." ".$row->unit_of_measurement;?></label>
									</div>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Requested  Quantity</label>
										<br>
										<input type="number" class="form-control"  value="<?php echo $row->qty_requested;?>" name="Qty_Requested" min="1" max="<?php echo $row->qty_released + $row->quantity_onhand ;?>"required/>
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
  
  

<!-- Modal Delete Spare-->

			<div class="modal fade" id="ApproveSpareRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog"  style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						 
							<div class="row">
								<div class='col-md-12'>
										<p style="font-weight:bold;">Approving Spares Request for Release ...</p>
										<br>
										<p style="font-size:11px;">Note: Once it's APPROVED, You can not UNDO the Transaction</p>
										
								</div>
								
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<a href="<?php echo base_url();?>WMS/UpdateSpareToReleased/<?=$row->wrid;?>" class="btn btn-success">CONFIRM</a>
						</div>
					</div>
				</div>
			</div>
			

 <!-- Modal Update Amount Spare-->
  <?php foreach ($SpareInfo as $row){?>
			<div class="modal fade" id="<?php echo $row->wsid;?>released" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog2" style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Edit Quantity Release</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php //echo form_open("WMS/UpdateSpareToApproved");?>	
							<div class="row">
								<input  type="hidden" value="EditSpareToDraft" name="action">
							
								
												<input  type="hidden" value="<?php echo $row->wrid;?>" name="WRId">
												<input  type="hidden" value="<?php echo $row->wsid;?>" name="WSid">
												<input  type="hidden" value="<?php echo $row->qty_requested;?>" name="Qty_Requested">
						
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
										<label style="font-size:13px;padding-left:15px;"><?php 
											$total = $row->quantity_onhand + $row->qty_released;
										echo $total." ".$row->unit_of_measurement;?></label>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Requested</label>
										<br>
										<label style="font-size:13px;padding-left:15px;"><?php echo $row->qty_requested." ".$row->unit_of_measurement;?></label>
										<br>
										
							
										</div>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Released</label>
										<br>
										<label style="font-size:13px;padding-left:15px;"><?php echo $row->qty_released." ".$row->unit_of_measurement;?></label>
										<br>
										
							
										</div>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Release</label>
										<br>
										<input type="number" class="form-control"  value="<?php echo $row->qty_requested;?>" name="Qty_Release" min="1" max="<?php echo $row->qty_released;?>"required/>
										<br>
							
										
							
										</div>
									</div>
									
									
									</div>
								</div>
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
						<button class="btn btn-color" style="style='color:#FFFFFF;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;background-color:#004D40;border:2px solid #004D40;'" title="Click to Continue"  data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row->wsid;?>release1">
												OK</i>
											</button>
						</div>
					</div>
				</div>
			</div>
			
<?php }?> <!-- Modal Update Amount Spare-->
<!-- Modal Update Amount Spare-->
  <?php foreach ($SpareInfo as $row){?>
			
			<div class="modal fade" id="<?php echo $row->wsid;?>release" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog2" style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Quantity Release</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/UpdateSpareToApproved");?>	
							<div class="row">
								<input  type="hidden" value="EditSpareToDraft" name="action">
							
								
												<input  type="hidden" value="<?php echo $row->wrid;?>" name="WRId">
												<input  type="hidden" value="<?php echo $row->wsid;?>" name="WSid">
												<input  type="hidden" value="<?php echo $row->qty_requested;?>" name="Qty_Requested">
						
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
										<label style="font-size:13px;padding-left:15px;"><?php 
											$total = $row->quantity_onhand + $row->qty_released;
										echo $total." ".$row->unit_of_measurement;?></label>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Requested</label>
										<br>
										<label style="font-size:13px;padding-left:15px;"><?php echo $row->qty_requested." ".$row->unit_of_measurement;?></label>
										<br>
										
							
										</div>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Release</label>
										<br>
										<input type="number" class="form-control"  value="<?php echo $row->qty_requested;?>" name="Qty_Release" min="1" max="<?php echo $row->qty_requested;?>"required/>
										<br>
							
										
							
										</div>
									</div>
									
									
									</div>
								</div>
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">

							<?php //registration button
								
									echo form_submit("loginSubmit","Continue","style='color:#FFFFFF;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
			
<?php }?> <!-- Modal Update Amount Spare-->

 <?php foreach ($SpareInfo as $row){?>
			<div class="modal fade" id="<?php echo $row->wsid;?>release2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog2" style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Quantity Release </h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/UpdateSpareToApproved");?>	
							<div class="row">
								<input  type="hidden" value="EditSpareToDraft" name="action">
							
								
												<input  type="hidden" value="<?php echo $row->wrid;?>" name="WRId">
												<input  type="hidden" value="<?php echo $row->ddid;?>" name="ddid">
												<input  type="hidden" value="<?php echo $row->qty_requested;?>" name="Qty_Requested">
						
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
										<label style="font-size:13px;padding-left:15px;"><?php 
											$total = $row->qty_available + $row->qty_released;
										echo $total." ".$row->unit_of_measurement;?></label>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Requested</label>
										<br>
										<label style="font-size:13px;padding-left:15px;"><?php echo $row->qty_requested." ".$row->unit_of_measurement;?></label>
										<br>
										
							
										</div>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;margin-bottom:14px;font-size:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Quantity Release</label>
										<br>
										<input type="number" class="form-control"  value="<?php echo $row->qty_requested;?>" name="Qty_Release" min="0" max="<?php echo $row->qty_requested;?>" required/>
										<br>
							
										
							
										</div>
									</div>
									
									
									</div>
								</div>
							</div> <!--end row-->
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
			</div>
			
<?php }?> <!-- Modal Update Amount Spare-->
  <?php foreach ($SpareInfo as $row){?>
			<div class="modal fade" id="<?php echo $row->wsid;?>release1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog2" style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">

							<div class="row">
				
						
								<div class='col-md-12'>
									
										
											<center>
										<label style="font-size:18px;font-weight:bold;">
											Releasing Spares ... 
										</label>
											</center>
									
										<label style="font-size:12px;font-weight:bold;">
											Are You Sure To Continue ?
										</label>
										<br>
										<label style="font-size:13px;">Note: After this Transaction, Quantity Released will not be Editable</label>
										
									
									
								</div>
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-color pull-right"  title="Continue" data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row->wsid;?>release">Continue</button>

						
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
                                            <th><center>NSN #</center></th>
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
											 data-toggle="modal" 
											 data-target="#<?php echo $row->wsid;?>Request"><?php echo $row->spare_name;?></a></td>
                                            
											<td style="text-indent:1%;">
											<?php if($row->quantity_onhand > 0){ ?>
												<center><?php echo $row->quantity_onhand." ".$row->unit_of_measurement;?></center>
											<?php } else{?>
											
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
