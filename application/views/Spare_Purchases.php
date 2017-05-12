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
                      <a href="javascript:;" class="active">
                          <i class="fa fa-shopping-cart" aria-hidden="true" ></i>
                          <span>Purchase Request</span>
				
                      </a>
					  
                      <ul class="sub">
                          <li class="active"><a href="<?php echo base_url();?>WMS/Spare_Purchases">Pending
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
          	<h4><i class="glyphicon glyphicon-file"></i><a href="<?php echo base_url();?>WMS/Spare_Purchases" title="List of Purchase Request" style="color:#004D40;padding-left:5px;font-size:15px;">Purchase Request</a>
			<i class="fa fa-angle-double-left" style="padding-left:5px;"></i><a style="color:#004D40;padding-left:5px;font-size:16px;">Pending</a></h4>
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="col-lg-12">
							<div class='form-group'>
							  <a><center style="font-size:16px;font-weight:bold;"><?php echo $message;?></center></a>							
							</div>
							<?php  if(count($countpendingep) != 0){}else{ ?>
							 <div class="row">
										<div class="spare-new-left-button pull-right" style="margin-right:3%;">
											<button class="btn btn-lg" title=""  style="font-size:14px;" data-toggle="modal" data-target="#emergencypurchase">
												<i style="padding-right:5px;" class="fa fa-plus"></i> EMERGENCY PURCHASE 
											</button>
										</div>
										
										
								</div><!-- col-lg-4 -->
							<?php }?>
						</div>
				
						<div class="panel-body">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
																
								<li class="active"><a href="#Requested" data-toggle="tab">Pending</a>
								</li>
							
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							
								
								<div class="tab-pane fade in active" id="Requested">
									<h5><center>List of Pending</center></h5>
									 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-hover" id="dataTables-Requested">
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone"><center>No.</center></th>
                                            <th class="hidden-phone"><center>PR No.</center></th>
                                            <th><center><i class="glyphicon glyphicon-user"></i>STATUS</center></th>
											  <th><center><i class="fa fa-eye"></i> VIEW</center></th>
											</tr>
                                    </thead>
                                    <tbody>
                                        
										 <?php 
										 $iii = 1;
										 foreach ($Draftp as $row){ 
													$lastSpId = $row->prid;
													if($lastSpId < 10){
													  $a = "00$lastSpId";
													}else if ($lastSpId >= 10 && $lastSpId < 100){
													  $a = "0$lastSpId";
													}
													$date=date('Y', strtotime($row->date));
													$b=substr($date,2);
										 
										 ?>
                                        <tr class="spareitems">
										
                                            <td class="hidden-phone"><center><?=$iii++;?></center></td>
                                            <td class="hidden-phone"><center>AG67-PR<?php echo $b."-".$a; ?></center></td></td>
                                            <td class="hidden-phone"><center><span class="label label-primary" style="font-size:12px;text-transform:capitalize;"><?php echo $row->status; ?></span></center></td>
                                            
                                            <td><center><form method="post" action="<?php echo base_url();?>WMS/Spare_Purchases_Info">
												<input  type="hidden" value="<?php echo $row->prid;?>" name="prid">
												<button type="submit"  class="btn btn-success btn-xs" style="text-decoration:none;"> 
													<i style='font-size:12px;' class='fa fa-share' aria-hidden='true'></i>
												</button></form>
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


	  
	  
		<div class="modal fade" id="emergencypurchase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:65%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">EMERGENCY PURCHASE</p>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
							<div class="row" style="width:95;margin:0px auto;">
							<label	style="font-size:14px;font-weight:bold">
												** PLEASE SELECT SPARES ITEM TO PURCHASE
											</label>
						    	<form action="<?php echo base_url();?>WMS/emergencypurchase" method="POST">
								<input  type="hidden" value="<?=$Enduser_Name;?>" name="responsible_person">
						 <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-bordered table-hover" id="dataTables-Approved">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1"><center>Select</center></th>
                                            <th><center>SNN #</center></th>
                                            <th class="hidden-phone"><i class="fa fa-bookmark"></i> Category</th>
											  <th><i class="glyphicon glyphicon-info-sign"></i> Spare Name</th>
											  <th><center><i class="glyphicon glyphicon-import"></i>Quantity On Hand</center></th>
											  <th><i class="glyphicon glyphicon-export"></i>Quantity On Order</th>
											</tr>
                                    </thead>
									
                                    <tbody>
									<?php foreach ($Categoryp as $row){ ?>
                                        <tr class="odd gradeX">
											<td class="col-md-1"><center>
												<input type="checkbox" name="items[]" value="<?= $row->wsid."//".$row->delivery_price;?>"></center>
											</td>
											
                                            <td><center><?php echo $row->wsid;?></center></td>
                                            <td class="hidden-phone" style="text-indent:2%;"><?php echo $row->category;?></td>
                                            <td>
											<button type="button" class="btn btn-link btn-link-modal" data-toggle="modal" data-target="#<?php echo $row->wsid;?>info"><?php echo $row->spare_name;?></button>
											</td>
                                            
											<td style="text-indent:1%;">
											<?php if($row->quantity_onhand > 0){ ?>
												<center>
												
												<button type="button" class="btn btn-link btn-link-modal" data-toggle="modal" 
													data-target="#<?php echo $row->wsid; ?>sub"><?php echo $row->quantity_onhand." ".$row->unit_of_measurement; ?>
												</button>
												</center>
												
											<?php } else{ ?>
											
											<center><span class="label label-danger">Out Of Stock</span></center>
											<?php } ?>
											</td>
											
											<td style="text-indent:1%;">
											<?php if($row->quantity_onorder > 0){ ?>
												<center><?php echo $row->quantity_onorder." ".$row->unit_of_measurement;?></center>
											<?php } else{?>
											
											<center><span class="label label-warning">On Purchase</span></center>
											<?php } ?>
											</td>
											
                                        </tr>
										<?php } ?>
                                    
                                      
                                      
                                    </tbody>
                                </table> 
							    
                            </div>
								<div class="col-lg-12" style="border-top:2px dashed #004D40;margin-bottom:2%;"> 
									
								</div>
								<div class="col-lg-12"> 
									<div class="col-lg-4"> 
										<label	style="font-size:14px;font-weight:bold">
												Select Requisitioner :
											</label>
												  <select class="form-control" name="dceno"  style="font-size:13px;text-transform:capitalize;" required>  
														<?php foreach ($getEndUserEmployee as $row){ ?>
														<option value="<?=$row->dceno;?>"><?=$row->lname.", ".$row->fname." ".$row->mname[0].". -  ".$row->requisitioning_section;?></option>
														<?php } ?>
												</select>
									</div>
									
									<div class="col-lg-8"> 
										<label	style="font-size:14px;font-weight:bold">
											Purpose :
										</label>
										
										<textarea class="form-control" name="remarks" placeholder="Text Here ..." rows="4" required></textarea>
									</div>
								</div>
                            <!-- /.table-responsive -->
							</div> <!--end row-->
						
						
					</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary pull-right" value="PURCHASE">
				</div>
				
			</div>
			</div>
			</div>

			 <?php foreach ($Categoryp as $row){ ?>
			<div class="modal fade" id="<?php echo $row->wsid;?>info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel" style="font-size:14px;">Warehouse Spares Information</h4>
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
										<br>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>On Hand</p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:19px;">: <?php echo $row->quantity_onhand." ".$row->unit_of_measurement;?></p>
										</div>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>On Order</p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:19px;">: <?php echo $row->quantity_onorder." ".$row->unit_of_measurement;?></p>
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
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Price</p>
										</div>
										<div style="width:100%;;">
											<p style="text-indent:42px;">: <?php echo "₱ ".number_format($row->delivery_price,2);?></p>
										</div>
										
										
										
										<div>
											<div style="width:100%;height:2px;background-color:#24665B;">
											</div>
										</div>
										<br>
										
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Stock Limit</p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:62px;">: <?php echo $row->reordering_pt." ".$row->unit_of_measurement;?></p>
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
		
		jQuery(function(){
    var max = 3;
    var checkboxes = $('input[type="checkbox"]');

    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });
});
    </script>
  

  </body>
</html>
