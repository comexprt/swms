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
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i></h3>
              	  
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Homepage">
                          <i class="fa fa-database"></i>
                          <span>Spares Inventory</span>
                      </a>
                     
                  </li>

				 <li class="sub-menu">
                      <a href="javascript:;">
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
                          <li><a href="<?php echo base_url();?>WMS/Request_Approved">Release
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
                      <a href="<?php echo base_url();?>WMS/Delivery" class="active">
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
          	<h4><i class="fa fa-truck"></i><a href="<?php echo base_url();?>WMS/Delivery" title="List of Delivery" style="color:#004D40;padding-left:5px;font-size:15px;">Delivery</a><i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;">Details</a></i>
		
			</h4>
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:14px;font-weight:bold;"><?php echo $message;?></center></a>							
							</div>
							
					</div>
					<?php foreach ($getAllDelivery as $row){ ?>
					<div class="row mt">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info spare-info1 ">
									
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>No.  </p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:65px;font-size:14px;font-weight:bold;">: <code><?php 
													$lastSpId = $row->did;if($lastSpId < 10){
													$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
													$a = "0$lastSpId";}$date=date('Y', strtotime($row->date_delivered));$b=substr($date,2);echo "AG67-DEV".$b."-".$a;?></code></p>
										</div>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>PO No. </p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:48px;">: <code style="font-size:14px;font-weight:bold;">
											<?php
												$lastSpId = $row->poid;
												
												if($lastSpId < 10){
													  $a = "0000$lastSpId";
													}else if ($lastSpId >= 10 && $lastSpId < 100){
													  $a = "000$lastSpId";
													}else{$a = "0$lastSpId";}
													
													echo $a;
											?>
											</code></p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Date </p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:57px;">: <code style="font-size:14px;font-weight:bold;"><?php echo date('F d, Y',strtotime($row->date_delivered));?></code></p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Received by  </p>
										</div>
											<div style="width:100%;">
											<p style="text-indent:15px;">: <code style="font-size:14px;font-weight:bold;"><?php if (empty($row->received_by)){echo "NOT SET";}else{echo $row->received_by;}?></code></p>
										</div>
										
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info end-user-pr">
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Status </p>
										</div>
										<div style="width:100%;"></p>
										<?php if ($row->status == 'completed'){ ?>
											<span class="label label-primary" style="text-transform:capitalize;font-size:12px;margin-left:5%;"> Completed</span>
											<?php }else{ ?>
											<span class="label label-danger" style="font-size:12px;margin-left:5%;"> <?="On Inspection";?></span>	
											<?php } ?></p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Amount </p>
										</div>
										<br>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:24px;" >
											<p><code>₱ <?php echo number_format($row->total_amount,2); ?></code></p>
										</div>
									
								</div><!-- col-lg-4 -->
								
							</div>
							<!-- TABLE -->
							<div class="row">
								<center>
								<div class="row" style="width:98%;font-size:13px;font-weight:bold;">
									<table class="table table-advance table-bordered">
										<thead>
											<tr>
												<th>
													<center>
														SNN #
													</center>
												</th>
												<th>
													<center><i class="glyphicon glyphicon-shopping-cart"></i>
														ITEM
													</center>
												</th>
												<th class="hidden-phone">
													<center>
														<i class="fa fa-money"></i> Price
													</center>
												</th>
												<th>
													<center>
														<i class="fa fa-truck"></i> DELIVERED
													</center>
												</th>
												<th>
													<center>
														<i class="fa fa-check-square-o"></i> Accepted
													</center>
												</th>
											</tr>
										</thead>
										
										<tbody>
											<?php 
											
												foreach ($getDeliveryDetails as $row1){ 
												if ($row->did == $row1->did){
											
											?>
												<tr class="odd gradeX">
													<td><center><?=$row1->wsid;?></center></td>
													<td><?=$row1->category.", ".$row1->spare_name;?></td>
													<td class="text-right">
														<?php echo "₱ ".number_format($row1->delivery_price,2); ?>
													</td>
													<td><center><?php echo $row1->qty_delivered." ".$row1->unit_of_measurement; ?></center></td>
													<td><center><?php echo $row1->qty_accepted." ".$row1->unit_of_measurement; ?>
													<a href="#" data-toggle="modal" data-target="#<?php echo $row1->ddid;?>accepted">
													<i class="glyphicon glyphicon-pencil" style="padding-left:5%;font-size:13px;"></i>
													</a>
													</center></td>
													
												</button>
													
												
													
												</tr>
											<?php }else{}} ?>
										  
										  
										</tbody>
									</table> 
								
								</div>
								</center>
							</div>
							
						<?php } ?>
						
							<a class="btn btn-xs" style="border:1px solid #003428;font-size:20px;font-weight:bold;float:right;color:#003428;margin-right:1%;margin-top:5%;" title="Approved Purchase Request" data-toggle="modal" data-target="#submit">
							<i class="glyphicon glyphicon-send" aria-hidden="true"></i><code style="background-color:#FFFFFF;color:#003428;">APPROVED</code>
							</a>
					
								<p style="font-size:12px;font-weight:bold;">NOTE :</p>
								<p style="font-size:12px;font-weight:bold;"><i class="glyphicon glyphicon-pencil" style="font-size:16px;"></i> - To Edit Quantity Accepted</p>
				

				 
				
				</div><!--/end col -->
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
	  
<?php foreach ($getDeliveryDetails as $row1){ ?>	
			<div class="modal fade" id="<?php echo $row1->ddid;?>accepted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:35%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">Edit Quantity Accepted</p>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/updateqtyaccepted");?>	
							<div class="row">
							
								<input  type="hidden" value="<?php  echo $row1->did;?>" name="did">
								<input  type="hidden" value="<?php  echo $row1->ddid;?>" name="ddid">
								
						
								<div class='col-md-12'>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:12px;text-transform:uppercase;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">ITEM</label><br>
										<code><label style="font-size:14px;font-weight:bold;text-transform:capitalize;">
										<?=$row1->category."- ".$row1->spare_name;?>
										</label></code>
									<br>
									<label style="font-size:13px;font-weight:bold;">QTY DELIVERED : </br><code style="font-size:14px;"><?=$row1->qty_delivered." ".$row1->unit_of_measurement;?></code></label>
									<br></br>
									<label style="font-size:13px;font-weight:bold;">Qty Accepted</label>
										<input type="number" class="form-control"  name="qty_accepted" min="1" max="<?=$row1->qty_delivered?>" value="<?=$row1->qty_accepted;?>" required></input>
										<br>
									</div>
									
									</div>
								</div>
							</div> <!--end row-->
						
						
					</div>
				<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","SAVE","class='btn btn-success'");
									echo form_close();
							?>
				</div>
				
			</div>
			</div>
			</div>

<?php } ?>

<div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">confirmation message</p>
						</div>
						<div class="modal-body" style="font-size:13px;color:#00271D;font-weight:bold;">
							<div class="row">
																
								<div class='col-md-12'>
								 <?php echo form_open("WMS/approved_delivery");?>	
									<input  type="hidden" value="<?php  echo $did;?>" name="did">
									<label	style="font-size:14px;font-weight:bold">
										Approving Delivery ...
									</label>
									<br>
									<label	style="font-size:14px;font-weight:bold">
										Inspected by :
									</label>
										 
									<input class="form-control" name="by" rows="4" required/>										
								</div>
								<div class='col-md-12' style="font-size:11px;margin-top:2%;">
								<p>Note: <br>
								- Please Review Delivery Thoroughly</br>
								- Once Delivery is Approved. It can't be UNDO
								</p>
								</div>
							</div> <!--end row-->
						</div>	
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","Confirm","class='btn btn-danger'");
									echo form_close();
							?>
						</div>
						
					
					</div>
				</div>
			</div>


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
