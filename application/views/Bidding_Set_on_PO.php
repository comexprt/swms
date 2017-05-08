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
                      <a href="<?php echo base_url();?>WMS/bids" class="active">
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
          	<h4><i class="fa fa-sort-amount-desc"></i><a href="<?php echo base_url();?>WMS/Bidding" title="List of Bidding" style="color:#004D40;padding-left:5px;font-size:15px;">Bidding</a>
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
																
								<li class="active"><a href="#Requested" data-toggle="tab">List Of Bidding</a>
								</li>
							
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							
								
								<div class="tab-pane fade in active" id="Requested">
									 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-hover" id="dataTables-Requested" style='font-weight:bold;'>
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone" ><center>No.</center></th>
                                            <th class="hidden-phone" ><center>PR No.</center></th>
											<th class="hidden-phone" ><i style="margin-left:12%;"></i> DATE</th>
											<th class="hidden-phone" ><i style="margin-left:5%;"></i> TIME</th>
											<th class="hidden-phone" ><i  style="margin-left:5%;"></i> VENUE</th>
                                            <th><center><i class="fa fa-tags"></i> STATUS</center></th>
											  <th><center><i class="fa fa-eye"></i> VIEW</center></th>
											</tr>
                                    </thead>
                                    <tbody>
                                        
										 <?php 
										 $iii = 1;
										 foreach ($getBidInfo as $row){ 
										 ?>
                                        <tr class="spareitems">
										
                                            <td class="hidden-phone"><center>
											<?php
												$lastSpId = $row->bid;
												if($lastSpId < 10){
													  $a = "00$lastSpId";
													}else if ($lastSpId >= 10 && $lastSpId < 100){
													  $a = "0$lastSpId";
													}
													
													echo "Bid-".$a;
											?>
											</center></td>
											<td class="hidden-phone"><center><?php 
													$lastSpId = $row->prid;if($lastSpId < 10){
													$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
													$a = "0$lastSpId";}$date=date('Y', strtotime($row->prid_date));$b=substr($date,2);echo "AG67-PR".$b."-".$a;?>
											</center></td>
                                            <td style="text-transform:capitalize;"><span style="margin-left:5%;"><?=date('F m, Y', strtotime($row->date));?></span></td>
                                            <td style="text-transform:capitalize;"><span style="margin-left:5%;"><?=date('h:i A', strtotime($row->time));?></span></td>
                                            <td style="text-transform:capitalize;"><span style="margin-left:10%;"><?=$row->venue;?></span></td>
                                            <td class="hidden-phone" style="text-transform:capitalize;"><center>
											<?php if ($row->status == 'confirm'){ ?>
											<span class="label label-primary" style="text-transform:capitalize;font-size:12px;">Completed</span>
											<?php }else{ ?>
											<span class="label label-danger" style="font-size:12px;"><?="On Bid";?></span>
											<?php } ?>
											</center></td>
                                            
                                            <td><center>
											<div class="col-lg-12">
												<a  class="btn btn-success btn-xs" title="View Bidding Details" data-toggle="modal" data-target="#<?php echo $row->bid;?>view">
													<i class="glyphicon glyphicon-search" aria-hidden="true"></i>
													</a>
												</div>
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


	  
	  <?php foreach ($getBidInfo as $row){ ?>			
			<div class="modal fade" id="<?php echo $row->bid;?>view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:50%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel" style="font-size:14px;">Bidding Details</p>
						</div>
						<div class="modal-body" style="font-size:14px;color:#00271D;font-weight:bold;text-transform:capitalize;">
						
						<div class="row">
							<div class='col-lg-6'>
								<p>No. <code><?php
									$lastSpId = $row->bid;if($lastSpId < 10){
									$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
									$a = "0$lastSpId";}echo "Bid-".$a;?></code>
								</p>
								<p>Venue : <code style="font-size:14px;"><?=$row->venue;?></code></p>
							</div>
							
							<div class='col-lg-6'>
								<p>Time : <code style="font-size:14px;"><?=date('h:i A', strtotime($row->time));?></code></p>
								<p>Date: <code style="font-size:14px;"><?=date('F d, Y', strtotime($row->date));?></code></p>
							</div>
							<div class="col-lg-12" style="margin-bottom:2%;">
								<div style="border-top:2px dashed #004D40;height:1px;margin:0px auto;"></div>
							</div>
							<div class="col-lg-6">
									<p style="font-weight:bold;font-size:14px;">ITEM TO BID ON <code> <?php 
													$lastSpId = $row->prid;if($lastSpId < 10){
													$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
													$a = "0$lastSpId";}$date=date('Y', strtotime($row->prid_date));$b=substr($date,2);echo "AG67-PR".$b."-".$a;?>
													</code>
									</p>
								<p style="text-transform:capitalize;font-weight:bold;margin-left:5%;"><?=$row->category.", ".$row->spare_name;?><br>- <?=$row->description;?></p>
								
							</div><!-- col-lg-4 -->
							<div class="col-lg-6">
								<p style="font-weight:bold;text-decoration:underline;font-size:14px;">PRICE TO BID <p>
												<div style="width:90%;margin-left:5%;">
												<p><code style="font-size:14px;font-weight:bold;"> - ₱ <?=number_format($row->delivery_price,2);?></p></code>
												</div>		
							</div><!-- col-lg-4 -->
							<div class='col-lg-12'>
								<center><p>- - BIDDERS - -</p></center>
							</div>
							<div class='col-lg-12'>
								 <table class="table table-striped  table-hover  table-bordered" >
                                    <thead>
                                        <tr>
											<td style="border:1px solid #24665B;"><center>RANKING</center></td>
											<td style="border:1px solid #24665B;"><center>SUPPLIER</center></td>
											<td style="border:1px solid #24665B;"><center>QUOTATION</center></td>
										</tr>
									</thead>
									<tbody>
										<?php
											$i=1;
											foreach ($getBidDetailsInfo as $row1){ 
											if ($row->bid != $row1->bid){}else{
										?>
											<tr>
												<td style="border:1px solid #24665B;"><center><?php if($row1->quotation==0){}else{echo $i++;}?></center></td>
												<td style="border:1px solid #24665B;"><p><?=$row1->supplier_name;?></p></td>
												<td style="border:1px solid #24665B;" class="text-right"><?php if($row1->quotation==0){echo "<label class='btn btn-xs btn-danger'>NOT SET</label>";}else{ ?>₱ <?=number_format($row1->quotation,2);}?></td>
											</tr>
										<?php }} ?>
									</tbody>
								</table>
								<p style="text-transform:capitalize;">Status : <code style="font-size:14px;"><?php
								if ($row->status == 'confirm'){echo 'Completed';}else{echo 'On Bid';};
								?></code></p>
								<p style="text-transform:capitalize;">Responsible : <code style="font-size:14px;"><?=$row->person_responsible;?></code></p>
								<p style="text-transform:capitalize;">Date Modified :<code style="font-size:14px;"><?=date('F d, Y', strtotime($row->date_status_changed));?></code></p>
							</div>
							
						</div> <!--end row-->
						</div>	
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
