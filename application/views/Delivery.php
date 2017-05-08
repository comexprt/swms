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
          	<h4><i class="fa fa-truck"></i><a href="<?php echo base_url();?>WMS/Delivery" title="List of Delivery" style="color:#004D40;padding-left:5px;font-size:15px;">Delivery</a>
			</h4>
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:14px;font-weight:bold;"><?php echo $message;?></center></a>							
							</div>
							 <div class="row">
										<div class="spare-new-left-button pull-right" style="margin-right:3%;">
											<button class="btn btn-lg" title=""  style="font-size:14px;" data-toggle="modal" data-target="#newDelivery">
												<i style="padding-right:5px;" class="fa fa-plus"></i> DELIVERY 
											</button>
										</div>
										
										
								</div><!-- col-lg-4 -->
						</div>
				
						<div class="panel-body">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
																
								<li class="active"><a href="#Requested" data-toggle="tab">List</a>
								</li>
							
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							
								
								<div class="tab-pane fade in active" id="Requested">
									 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-advance table-bordered" id="dataTables-Requested" style='font-weight:bold;text-transform:uppercase'>
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone" ><center>DELIVERY No.</center></th>
											<th class="hidden-phone" ><i class="fa fa-calendar" style="margin-left:12%;"></i> DATE</th>
                                            <th class="hidden-phone" ><center>PO No.</center></th>
											<th class="hidden-phone" ><i class="fa fa-user" style="margin-left:5%;"></i> DELIVERED BY</th>
											<th class="hidden-phone" ><i class="fa fa-money" style="margin-left:5%;"></i> AMOUNT</th>
                                            <th><center><i class="fa fa-tags"></i> STATUS</center></th>
											 <th><center>VIEW</center></th>
											</tr>
                                    </thead>
                                    <tbody>
                                        
										 <?php 
										 $iii = 1;
										 foreach ($getAllDelivery as $row){ 
										 ?>
                                        <tr class="spareitems">
										
                                            <td class="hidden-phone"><center>
											<?php $lastSpId = $row->did;if($lastSpId < 10){
													$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
													$a = "0$lastSpId";}$date=date('Y', strtotime($row->date_delivered));$b=substr($date,2);echo "AG67-DEV".$b."-".$a;?>
											</center></td>
                                            <td style="text-transform:capitalize;"><span style="margin-left:5%;">
											<?php echo date('F d, Y',strtotime($row->date_delivered));?>
											</span></td>
											<td class="hidden-phone"><center>
											<?php
												$lastSpId = $row->poid;
												
												if($lastSpId < 10){
													  $a = "0000$lastSpId";
													}else if ($lastSpId >= 10 && $lastSpId < 100){
													  $a = "000$lastSpId";
													}else{$a = "0$lastSpId";}
													
													echo $a;
											?>
											</center></td>
                                            <td style="text-transform:capitalize;"><span style="margin-left:10%;"><?=substr($row->supplier_name,0,47)." ...";?></span></td>
                                            <td style="text-transform:capitalize;" class="text-right"><span style="margin-left:10%;"> ₱ <?=number_format($row->total_amount,2);?></span></td>
                                            <td class="hidden-phone" style="text-transform:capitalize;"><center>
											<?php if ($row->status == 'completed'){ ?>
											<span class="label label-primary" style="text-transform:capitalize;font-size:12px;">Completed</span>
											<?php }else{ ?>
											<span class="label label-danger" style="font-size:12px;"><?="On Insp.";?></span>	
											<?php } ?>
											</center></td>
                                            
                                            <td><center>
												<a  class="btn btn-success btn-xs" title="SETUP BIDS" data-toggle="modal" data-target="#<?php echo $row->did;?>view">
													<i class="glyphicon glyphicon-search" aria-hidden="true"></i>
												</a>
											</center></td>
								
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


	  
	 <?php foreach ($getAllDelivery as $row){ ?>
			<div class="modal fade" id="<?php echo $row->did;?>view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:60%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel" style="font-size:14px;">Delivery Details</h4>
						</div>
						
						<div class="modal-body">
						    
							<div class="row mt">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info spare-info1 ">
									
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>No.  <p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:65px;">: <code><?php 
													$lastSpId = $row->did;if($lastSpId < 10){
													$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
													$a = "0$lastSpId";}$date=date('Y', strtotime($row->date_delivered));$b=substr($date,2);echo "AG67-DEV".$b."-".$a;?></code><p>
										</div>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>PO No. <p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:48px;">: <code>
											<?php
												$lastSpId = $row->poid;
												
												if($lastSpId < 10){
													  $a = "0000$lastSpId";
													}else if ($lastSpId >= 10 && $lastSpId < 100){
													  $a = "000$lastSpId";
													}else{$a = "0$lastSpId";}
													
													echo $a;
											?>
											</code><p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Date <p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:57px;">: <code><?php echo date('F d, Y',strtotime($row->date_delivered));?></code><p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Received by  <p>
										</div>
											<div style="width:100%;">
											<p style="text-indent:15px;">: <code><?php if (empty($row->received_by)){echo "NOT SET";}else{echo $row->received_by;}?></code><p>
										</div>
										
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info end-user-pr">
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Status <p>
										</div>
										<div style="width:100%;"><p>
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
								<div class="row" style="width:98%">
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
												<th>
													<center>
														<i class="glyphicon glyphicon-import"></i> Available
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
													<td><center><?php echo $row1->qty_accepted." ".$row1->unit_of_measurement; ?></center></td>
													<td><center><?php echo $row1->qty_available." ".$row1->unit_of_measurement; ?></center></td>
													
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
							<?php if ($row->status == 'completed'){}else{ ?>
							<a class="btn btn-xs btn-primary pull-left" title="Update Delivery Made"  style="font-size:14px;" href="<?php echo base_url();?>WMS/Delivery_Info/<?php echo $row->did;?>" >UPDATE</a>
							<?php } ?>
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
	 
	  
	  <?php }?>
	  
	  
	  <div class="modal fade" id="newDelivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:80%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel" style="font-size:14px;">Adding Delivery ...</p>
						</div>
						<div class="modal-body" style="font-size:14px;color:#00271D;text-transform:capitalize;">
						
						<div class="row">
							
							
							<div class='col-lg-12'>
								
								<center><p style="font-size:16px;font-weight:bold;">- - LIST OF PURCHASE ORDER - -</p></center>
							</div>
							<div class='col-lg-12'>
								  <div class="dataTable_wrapper">
                                <table class="table table-advance table-bordered" id="dataTables-Approved" style=''>
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone" ><center>PO No.</center></th>
											<th class="hidden-phone" ><i class="fa fa-calendar" style="margin-left:12%;"></i> DATE APPROVED</th>
											<th class="hidden-phone" ><i class="fa fa-child" style="margin-left:5%;"></i> AWARDED</th>	
                                            <th><center><i class="fa fa-money"></i> PO AMOUNT</center></th>
											 <th><center><i class="fa fa-cog"></i></center></th>
											</tr>
                                    </thead>
                                    <tbody>
                                        
										 <?php 
										 $iii = 1;
										 foreach ($getPOInfo_except1 as $row){ 
										 ?>
                                        <tr class="spareitems">
										
                                            <td class="hidden-phone"><center>
											<?php
												$lastSpId = $row->poid;
												
												if($lastSpId < 10){
													  $a = "0000$lastSpId";
													}else if ($lastSpId >= 10 && $lastSpId < 100){
													  $a = "000$lastSpId";
													}else{$a = "0$lastSpId";}
													
													echo $a;
											?>
											</center></td>
                                            <td style="text-transform:capitalize;"><span style="margin-left:8%;"><?=date('F m, Y', strtotime($row->date_approved));?></span></td>
                                            <td style="text-transform:capitalize;"><span style="margin-left:8%;"><?=$row->supplier_name;?></span></td>
                                            <td style="text-transform:capitalize;"><span class="pull-right" style="margin-right:15%;">₱ <?=number_format($row->po_amount,2);?></span></td>
                                                                     
                                            <td><center>
												<a  class="btn btn-success btn-xs" title="view details" data-toggle="modal" data-target="#<?php echo $row->poid;?>view">
													<i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
													</a>
												</center>
											
											</center></td>
								
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
							
						</div> <!--end row-->
						</div>	
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
						
					
					</div>
				</div>
			</div>
	  
	  
	  	  
	  <?php foreach ($getPOInfo_except1 as $row){ ?>			
			<div class="modal fade" id="<?php echo $row->poid;?>view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:75%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel" style="font-size:14px;">PO Details</p>
						</div>
						<div class="modal-body" style="font-size:13px;color:#00271D;font-weight:bold;text-transform:capitalize;">
						
						<div class="row">
							<div class='col-lg-6'>
								<p style="font-size:13px;">PO No. <code><?php
								$lastSpId = $row->poid;
												
												if($lastSpId < 10){
													  $a = "0000$lastSpId";
													}else if ($lastSpId >= 10 && $lastSpId < 100){
													  $a = "000$lastSpId";
													}else{$a = "0$lastSpId";}
													
													echo $a;
								?></code>
								</p>
								<p>Payment Method : <code style="font-size:14px;"><?=$row->payment_method;?></code></p>
								<p>Date Approved : <code style="font-size:14px;"><?=date('F d, Y', strtotime($row->date_approved));?></code></p>
							</div>
							
							
							<div class='col-lg-6'>
								<p>Delivery Period: <code style="font-size:14px;"><?=$row->delivery_period;?></code></p>
								<p>PO Amount </p><p> <code style="font-size:24px;margin-left:10%;">₱ <?=number_format($row->po_amount,2);?></code></p>
							</div>
							
							
							<div class='col-lg-12'>
								<div style="border-top:1px solid #004D40;height:1px;margin:0px auto;padding-bottom:2%;"></div>
								<p>Awarded : <code style="font-size:14px;"><?=$row->supplier_name;?></code></p>
								<p>Address : <code style="font-size:14px;"><?=$row->address;?></code></p>
								<center><p>- - ITEMS - -</p></center>
							</div>
							
							
							<div class='col-lg-12'>
								 <table class="table table-advance table-bordered" >
                                    <thead>
                                        <tr>
											<td style="border:1px solid #24665B;"><center>Item No.</center></td>
											<td style="border:1px solid #24665B;"><center>PR No.</center></td>
											<td style="border:1px solid #24665B;"><center>Item / Description</center></td>
											<td style="border:1px solid #24665B;"><center>QTY</center></td>
											<td style="border:1px solid #24665B;"><center>U/M</center></td>
											<td style="border:1px solid #24665B;"><center>Price</center></td>
											<td style="border:1px solid #24665B;"><center>Total Cost</center></td>
										</tr>
									</thead>
									<tbody>
									<?php
											echo form_open("WMS/adddetails_on_delivery");
									?>
										<input type="hidden" name="poid" value="<?= $row->poid;?>">
										<input type="hidden" name="sdceno" value="<?= $row->sdceno;?>">
										<?php
											$i=1;$total=0;
											foreach ($getPODetailsInfo as $row1){ 
											if ($row->poid != $row1->poid){}else{
											
											
										?>
										<input type="hidden" name="po_details[]" value="<?= $row1->wsid;?>-<?= $row1->price;?>-<?= $row1->qty;?>">
											<tr>
												<td style="border:1px solid #24665B;"><center><?php echo $i++;?></center></td>
												<td style="border:1px solid #24665B;"><center><?php 
													$lastSpId = $row1->prid;if($lastSpId < 10){
													$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
													$a = "0$lastSpId";}$date=date('Y', strtotime($row1->date));$b=substr($date,2);echo "AG67-PR".$b."-".$a;?>
												</center></td>
												<td style="border:1px solid #24665B;"><p>
													<?=$row1->category.", ".$row1->spare_name;?></p>
													<div style="width:90%;margin-left:2%;">
													<p> - <?=$row1->description;?></p>
													</div>
												</td>
												<td style="border:1px solid #24665B;"><p><center><?=$row1->qty;?></p></center></td>
												<td style="border:1px solid #24665B;text-transform:uppercase"><p><center><?=$row1->unit_of_measurement;?></center></p></td>
												<td style="border:1px solid #24665B;" class="text-right"><p style="margin-right:5%;">₱ <?=number_format($row1->price,2);?></p></td>
												<td style="border:1px solid #24665B;" class="text-right"><p style="margin-right:5%;">₱ <?=number_format(($row1->price * $row1->qty),2);?></p></td>
												
											</tr>
										<?php 
											$total=$total+($row1->price * $row1->qty );
										}} ?>
										 	<tr>
												<td colspan="6"><p class="text-right">TOTAL PO AMOUNT</p></td>
												<td><p class="text-right">₱ <?=number_format($total,2);?></p></td>
											</tr>
									</tbody>
									
								</table>
								
							</div>
							
						</div> <!--end row-->
						</div>	
						<div class="modal-footer" style="font-weight:bold;">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="font-weight:bold;">Close</button>
	
							<?php //registration button
								
									echo form_submit("loginSubmit","ADD","class='btn btn-primary pull-right'");
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
