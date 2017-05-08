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
	<style>
		
		.tech a:hover{
			text-decoration:underline;
		}
		.print {display:none;}
	
		@media print
		{
		.noprint {display:none;}
		.close {display:none;}
		.print {display:inline;}
		.printthis {margin-top:-100px;}
		}
		@page {size: 8.5in 11in;size : portrait;}
	</style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg noprint">
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
       <aside class="noprint">
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
	   <aside class="noprint">
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
                          <span>Graphs & Statistics</span>
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
          	
			<h4 class="noprint"><i class="fa fa-tasks"></i><a style="color:#004D40;padding-left:5px;"  href="<?php echo base_url();?>WMS/Purchase_Order_P">Purchase Order</a><i class="fa fa-angle-double-left" style="padding-left:5px;">
	
			<a style="color:#004D40;padding-left:5px;font-size:16px;">Print Preview</a></i>
	
		
			</h4>
          	<div class="row mt">
				<div class="col-lg-12 noprint" style="margin-top:1%;"><div class='form-group pull-right' >
						<a style='font-size:16px;color:#004030;cursor:pointer;border:1px solid #004D40;' title='Print' class='btn btn-md' 
						onClick="window.print()"><i class='fa fa-print pull-right'> PRINT</i></a></div></div>
					
          		<div class="col-lg-12 printthis">
						
						
						
									<div class="panel-body">
									<?php foreach ($getSPOInfo as $row){ ?>	
						
					
							
							<div class='col-lg-12'>
								 <table class="table table-striped  table-hover  table-bordered" style="font-weight:bold;">
									<tr>
										<td colspan="5" style="border:1px solid #24665B;">
											<center>
												<img src="<?php echo base_url();?>/_assets/img/NPC-PO.png" height="80px"></center>		

										</td>
										<td style="border:1px solid #24665B;"><center><p style="font-size:18px;">PO No. <br><code><?php
											$lastSpId = $row->poid;if($lastSpId < 10){ $a = "0000$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){ $a = "000$lastSpId";
											}else{$a = "00$lastSpId";}echo $a;?></code></p></center>
										</td>
									</tr>
									<!-- 2 -->
									<tr>
										<td colspan="5" style="border:1px solid #24665B;">
										<p style="font-weight:bold;">TO :<br><code style="font-size:14px;"><?=$row->supplier_name;?></code></br><code style="font-size:14px;"><?=$row->address;?></code><br>Tel No. <code style="font-size:14px;"><?=$row->tel_no;?></code>/ Fax No. <code style="font-size:14px;"><?=$row->fax_no;?></code></br>DCE NO : <code style="font-size:14px;">AG67-0<?=strlen($row->supplier_name);?>-<?=$row->sdceno;?></code></p>
										</td>
										
										<td style="border:1px solid #24665B;">
											<center>
												<p  style="margin-top:25%;">DATE <br><code style="font-size:14px;"><?=date('F d, Y', strtotime($row->date_approved));?></code></p>
											</center>
										</td>
									</tr>
									<!-- 3 -->
									<tr>
										<td colspan="3" style="border:1px solid #24665B;">
												<p>Delivery Period : WITHIN <code style="font-size:14px;"><?=$row->delivery_period;?></code>FROM DATE OF RECEIPT OF THIS ORDER</p>
										</td>
										<td colspan="3" style="border:1px solid #24665B;">
										<p>TERMS: 30 DAYS UPON DELIVERY AND SUBMISSION OF ALL DOCUMENTS STATED AT THE BACK HEREOF/COD/PAYMENT</p>
										</td>
									</tr>
									<!-- 4 -->
									<tr>
										<td colspan="3" style="border:1px solid #24665B;">
											<div class="col-lg-3">
												<p>DELIVERY POINT :</p>
											</div>
											<div class="col-lg-9">
												<center>
													AGUS 6/7 HEPC WAREHOUSE - FUENTES MA. CRISTINA, ILIGAN CITY
												</center>
											</div>
										</td>
										<td colspan="3" style="border:1px solid #24665B;">
											<div class="col-lg-6">
												<p>REQUISITIONER: </p>
											</div>
											<div class="col-lg-6">
												<p>H.F TIBOR</p>
											</div>
										</td>
									</tr>
									
									<!-- 5 -->
									<tr>
										<td style="border:1px solid #24665B;width:8px;font-weight:bold;"><center>ITEM <br>NO.</center></td>
										<td style="border:1px solid #24665B;width:30px;font-size:15px;padding-top:2%;font-weight:bold;"><center>PR NO.</center></td>
										<td style="border:1px solid #24665B;font-weight:bold;letter-spacing:1px;font-size:18px;"><center>DESCRIPTIONS</center></td>
										<td style="border:1px solid #24665B;font-weight:bold;font-size:14px;width:80px;"><center>QTY / UM </center></td>
										<td style="border:1px solid #24665B;font-weight:bold;font-size:15px;padding-top:2%;width:130px;"><center>UNIT PRICE</center></td>
										<td style="border:1px solid #24665B;font-weight:bold;font-size:15px;padding-top:2%;width:140px;"><center>AMOUNT</center></td>
										
									</tr>
									
									<!-- 6 -->
									<?php $i=1;$total=0; foreach ($getSPODetailsInfo as $row1){ ?>
									<tr>
										<td style="border:1px solid #24665B;"><center><?=$i++;?></center></td>
										<td style="border:1px solid #24665B;"><center>
											<?php 
													$lastSpId = $row1->prid;if($lastSpId < 10){
													$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
													$a = "0$lastSpId";}$date=date('Y', strtotime($row1->date));$b=substr($date,2);echo "AG67-PR".$b."-".$a;?>
										</center></td>
										<td style="border:1px solid #24665B;">
											<p><?=$row1->category.", ".$row1->spare_name;?></p>
											<div style="width:90%;margin-left:2%;">
												<p> - <?=$row1->description;?></p>
											</div>
										</td>
										<td style="border:1px solid #24665B;text-transform:uppercase;font-size:14px;"><center>
											<?=$row1->qty." ".$row1->unit_of_measurement;?>
										</center></td>
										<td style="border:1px solid #24665B;" class="text-right"><p style="margin-right:5%;">₱ <?=number_format($row1->price,2);?></p></td>
												<td style="border:1px solid #24665B;" class="text-right"><p style="margin-right:5%;">₱ <?=number_format(($row1->price * $row1->qty),2);?></p></td>
									</tr>
									<?php 
									$total=$total+($row1->price * $row1->qty );
									foreach ($getvat as $row2){
											$vat=$row2->value;
										}
										$w_vat = ($vat/100)*$total;
										$net=$total+$w_vat;
									}

									?>
									
									<!-- 7 -->
									<tr>
										<td colspan="3" style="border:1px solid #24665B;">
											<center>
												<p> ~ PUBLIC BIDDING ~ </p>
												<br>
												<p> c - c - c - c - c - c - c - c - c - c  </p>
											</center>
										</td>
										<td colspan="3" style="border:1px solid #24665B;text-transform:uppercase;">
											<div class="col-lg-12 text-right">
												<p>Total Amount : <code style="font-size:14px;width:150px;"><?php echo "₱ ".number_format($total,2);?></code>
												</p>
												<p>	Add <?php
													foreach ($getvat as $row2){ echo $row2->value." ".$row2->name.": ";}
													?> <code style="font-size:14px;width:150px;"><?php echo "₱ ".number_format($w_vat,2);?></code>
												</p>
												<p>
													Total After Vat : <code style="font-size:14px;width:150px;"><?php echo "₱ ".number_format($net,2);?></code>
												</p>
											</div>
										</td>
									</tr>
									
									<tr>
										<td colspan="2" style="border:1px solid #24665B;">
											<center>
												<div style="text-decoration:underline;">________________________</div>
												<div>FUNDS AVAILABLE</div>
												<br>
												<div style="text-decoration:underline;"><?php foreach ($getSectionChief as $row2){ echo $row2->value;}?></div>
												<div>CHIEF, FINANCE SECTION</div>
											</center>
										</td>
										<td colspan="2" style="border:1px solid #24665B;">
											<p>By : </p>
											<center>
												<div style="text-decoration:underline;"><?php foreach ($getOicOfficer as $row2){ echo $row2->value;}?></div>
												<div>Plant Manager<br>Agus 6& 7 H.E. Plant Complex</div>
											</center>
										</td>
										<td colspan="2" style="border:1px solid #24665B;">
											<p style="font-size:12px;"> Please signify your acceptance and <br>agreement with this P.O. by signing below :</p>
											<div>
												CONFORM :
											<br>
												POSITION :
											</br>
												DATE :
											</div>
										</td>
									</tr>
								</table>
							</div>
							
							
							
						</div> <!--end row-->
									<?php } ?>			
                          
                           
									</div>

					
				 
				
				</div><!--/end col -->
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->


	  
      <!--footer start-->
      <footer class="site-footer noprint"> 
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
