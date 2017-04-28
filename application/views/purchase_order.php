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
	  <?php if($view == 1) {?>
       <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="<?php echo base_url();?>/_assets/assets/img/default_profile1.png" class="img-circle" style="background-color:#F3F3F3;"width="90"></p>
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i></h3>
              	  
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Approve_PR">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Approved PR</span>
                      </a>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Bidding">
                          <i class="fa fa-sort-amount-desc"></i>
                          <span>Bidding</span>
                      </a>
                  </li>

				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Purchase_Order_P" class="active">
                          <i class="glyphicon glyphicon-barcode"></i>
                          <span>Purchase Order</span>
                      </a>
                  </li>
                  
                </ul>
              <!-- sidebar menu end-->
          </div>
      </aside><?php }else{ ?>
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
                      <a href="<?php echo base_url();?>WMS/Purchase_Order" class="active">
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
                          <span>Statistics</span>
                      </a>
                  </li>
                  


                </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
	  <?php }?>
      <!--sidebar end-->
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
          	<h4><i class="glyphicon glyphicon-barcode"></i><a href="<?php echo base_url();?>WMS/Purchase_Order" title="List of Purchase Order" style="color:#004D40;padding-left:5px;font-size:15px;">Purchase Order</a>
			</h4>
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:17px;font-weight:bold;"><?php echo $message;?></center></a>							
							</div>
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
                                <table class="table table-advance table-bordered" id="dataTables-Requested" style='font-weight:bold;'>
							
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone" ><center>PO No.</center></th>
											<th class="hidden-phone" ><i class="fa fa-calendar" style="margin-left:12%;"></i> DATE APPROVED</th>
											<th class="hidden-phone" ><i class="fa fa-child" style="margin-left:5%;"></i> AWARDED</th>	
                                            <th><center><i class="fa fa-money"></i> PO AMOUNT</center></th>
											 <th><i class="fa fa-eye" style="margin-left:20%;"></i>View</th>
											</tr>
                                    </thead>
                                    <tbody>
                                        
										 <?php 
										 $iii = 1;
										 foreach ($getPOInfo as $row){ 
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
													<i class="glyphicon glyphicon-search" aria-hidden="true"></i>
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
						<!-- /.panel-body -->

					
				 
				
				</div><!--/end col -->
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->


	  
	  <?php foreach ($getPOInfo as $row){ ?>			
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
								<p>PO Amount : <code style="font-size:14px;">₱ <?=number_format($row->po_amount,2);?></code></p>
							</div>
							
							
							<div class='col-lg-12'>
								<div style="border-top:1px solid #004D40;height:1px;margin:0px auto;padding-bottom:2%;"></div>
								<p>Awarded : <code style="font-size:14px;"><?=$row->supplier_name;?></code></p>
								<p>Address : <code style="font-size:14px;"><?=$row->address;?></code></p>
								<center><p>- - ITEMS - -</p></center>
							</div>
							
							
							<div class='col-lg-12'>
								 <table class="table table-striped  table-hover  table-bordered" >
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
											$i=1;$total=0;
											foreach ($getPODetailsInfo as $row1){ 
											if ($row->poid != $row1->poid){}else{
										?>
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
							 <?php if($view == 1) {?>
							<a type="button" class="btn btn-primary" href="<?php echo base_url();?>WMS/Print_Purchase_Order_P/<?=$row->poid;?>" style="font-weight:bold;">PRINT PREVIEW</a>
							<?php }else{ ?>
								<a type="button" class="btn btn-primary" href="<?php echo base_url();?>WMS/Print_Purchase_Order/<?=$row->poid;?>" style="font-weight:bold;">PRINT PREVIEW</a>
							<?php } ?>
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
