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
		.printtr {display:none;}
	
		@media print
		{
		.noprint {display:none;}
		.close {display:none;}
		.print {display:block;}
		.printtr {display:table-row;}
		.printthis {margin-top:-50px;}
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
        <aside class="noprint">
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="<?php echo base_url();?>/_assets/assets/img/default_profile1.png" class="img-circle" style="background-color:#F3F3F3;"width="90"></p>
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i></h3>
              	  
                   <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Bidding" class="active">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Approved PR</span>
                      </a>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Bidding_Schedule">
                          <i class="fa fa-sort-amount-desc"></i>
                          <span>Bidding</span>
                      </a>
                  </li>

				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Purchase_Order_P">
                          <i class="glyphicon glyphicon-barcode"></i>
                          <span>Purchase Order</span>
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
          	<h4 class="noprint"><i class="fa fa-shopping-cart"></i><a href="<?php echo base_url();?>WMS/Bidding" title="List of Approved PR" style="color:#004D40;padding-left:5px;font-size:15px;">Approved PR</a>
		
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<?php foreach ($DraftInfo as $row){ ?>
			<a style="color:#004D40;padding-left:5px;font-size:16px;text-transform:capitalize;"><?php echo $row->status;?></a></i>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;"><code><?php 
				$lastSpId = $row->prid;
													if($lastSpId < 10){
													  $a = "00$lastSpId";
													}else if ($lastSpId >= 10 && $lastSpId < 100){
													  $a = "0$lastSpId";
													}
													$date=date('Y', strtotime($row->date));
													$b=substr($date,2);
													
													echo "AG67-PR".$b."-".$a;
			?></code></a></i>
		
			</h4>
          	<div class="row">
					<div class="col-lg-12 noprint" style="margin-top:1%;"><div class='form-group pull-right' >
								<a style='font-size:16px;color:#004030;cursor:pointer;border:1px solid #004D40;' title='Print' class='btn btn-md' 
								onClick="window.print()"><i class='fa fa-print pull-right'> PRINT</i></a></div></div>
					
			<?php }?>
						<div class='form-group noprint'>
							<center style="font-size:18px;font-weight:bold;font-color:#000000;"><?=$message;?></center>
						</div>
						
				
          		<div class="col-lg-12 printthis">
					<img class="print" src="<?php echo base_url();?>/_assets/img/NPC.png" width="28%">  
				</div>
          		<div class="col-lg-12 print">
					<center style="font-size:18px;font-weight:bold;font-color:#000000;">PURCHASE REQUISTION SLIP</center>
				</div>
					
						
          		<div class="col-lg-12">
						<div style="width:90%;margin-left:5%;text-transform:capitalize;font-size:12px;">
							<?php foreach ($DraftInfo as $row){ ?>
							
								<div class="row mt">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
											<label><p style="font-weight:bold;">Requisitioning Section : AGUS 6/7 HE PLANT</p></label>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
											<label><p style="font-weight:bold;">Date Prepared : : 
											<?php 
												$purpose = $row->remark;
												echo date('F m, Y h:i A', strtotime($row->date));
											?></p></label>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
											<label><p style="font-weight:bold;">Cost Centre Number : 60004</p></label>
										</div>	
								</div><!-- col-lg-4 -->
								
								
							<?php }?>
						</div>
						
						<!-- /.panel-body -->
				 
					</div><!--/end col -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1" style="margin-top:10px;">
										 <table class="table table-striped  table-hover  table-bordered" >
                                    <thead>
                                        <tr style="background-color:#EEEEEE;">
											  <th style="border:1px solid #24665B;width:3px;"><center>ITEM NO.</center></th>
											  <th style="border:1px solid #24665B;"><center>COMPLETE DESCRIPTION / SPECIFICATION</center></th>
											  <th style="border:1px solid #24665B;"><center>QTY</center></th>
											  <th style="border:1px solid #24665B;"><center>UM</center></th>
											  <th style="border:1px solid #24665B;"><center>ESTIMATED PRICE</center></th>
											  <th style="border:1px solid #24665B;"><center>ESTD. COST</center></th>
											  <th style="border:1px solid #24665B;" class="noprint"><center>SET</center></th>
											  
											  
											  
										</tr>
                                    </thead>
                                    <tbody>
										 
									<?php 
									 $i=1;
									 $totalec=0;
									 foreach ($PurchaseInfo as $row){ 
									 $price = $row->estimated_cost;
									 $cost = $row->qty * $price;
									 ?>
                                        <tr>
											
                                            <td style="font-weight:bold;border:1px solid #24665B;"><center><?= $i++;?></center></td>
                                            
											<td style="border:1px solid #24665B;">
											<p style="text-transform:capitalize;font-weight:bold;"><?=$row->category.", ".$row->spare_name;?></p>
												<div style="width:90%;margin-left:2%;">
												<p> - <?=$row->description;?></p>
												</div>
											</td>
											
											<td style="border:1px solid #24665B;"><p><center>
											<span style="font-weight:bold;font-size:12px;text-transform:uppercase;"><?php echo $row->qty;?>
											
											</span></center></p></td>
										
											<td style="border:1px solid #24665B;"><p><center>
											<span style="font-weight:bold;font-size:12px;text-transform:uppercase;"><?php echo $row->unit_of_measurement;?>
											
											</span></center></p></td>
										
											
											<td style="border:1px solid #24665B;"><p>
											<span style="font-weight:bold;font-size:12px;text-transform:uppercase;margin-right:5%;" class='pull-right'>₱ <?php echo number_format($price,2);?></span>
											</p>
										  
											</td>
											
											<td style="border:1px solid #24665B;"><p>
											<span style="font-weight:bold;font-size:12px;text-transform:uppercase;margin-right:5%;" class='pull-right'>₱ <?php echo number_format($cost,2);?></span>
											</p>
										  
											</td>
											
											<td class="noprint"  style="border:1px solid #24665B;">
												<center>
													<a  class="btn btn-success btn-xs" title="Set bidding" data-toggle="modal" data-target="#<?php echo $row->wsid;?>update">
													<i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
													</a>
												</center>
											</td>
											
											
										
                                        </tr>
										<?php 
									
										$totalec = $totalec + $cost;
										foreach ($getvat as $row){
											$vat=$row->value;
										}
										$w_vat = ($vat/100)*$totalec;
										$net=$totalec-$w_vat;
										}
										
										?>
										<tr style="font-size:13px;font-weight:bold;" class="printtr">
											<td colspan="4">
											<center style="padding-top:4%;"><p> - - - x - x - x - - -</p>
											</center>
											
											<p>Included in CY <?php echo date('Y',time());?> PPMP :</p>
											<p>Item # :</p>
											<p>Page # :</p><br></br>
											<p style="font-weight:bold;font-size:14px;"><?php foreach ($getppmp as $row){ echo $row->value;}?><br>PPMP Officer, AGUS 6/7 HEPC</p>
											</td>
											
											<td>
											<p class="text-right">Total <br><?=$vat;?> Vat</p>
											
											<div></div>
											<p class="text-right">
											Net of VAT</p>
											</td>
											
											<td class="text-right"><p>
											₱ <?php echo number_format($totalec,2);?>
											<br>
											₱ <?php echo number_format($w_vat,2);?></p>
											
											<div style="float:right;width:70%;border-top:1px solid #24665B;">
											<p class="pull-right">
											₱ <?php echo number_format($net,2);?></p>
											</div>
											</td>
										</tr>
										
										
                                    </tbody>
									
										
								</table>
						</div><!-- col-lg-4 total -->
						
						
						<?php foreach ($DraftInfo as $row){ ?>	
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 print" >
						<p style="font-weight:bold;margin-left:1%;"> Purpose : <code style="font-size:12px;color:#000000;background-color:#FAFAFA;text-decoration:underline;"><?=$row->remark;?></code></p>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 print" style="margin-top:1%;">
							<div style="width:100%;height:2px;background-color:#24665B;">
							</div>
						</div><!-- col-lg-4 -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 print" style="margin-top:1%;font-weight:bold;">
							<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<p>PR Requested by : </p>
							</div>
							
							<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<p>Approved / Disapproved for PR by : </p>
							</div>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 print" style="margin-top:1%;">
							<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<p><center style="text-transform:capitalize"><?=$row->fname[0].".".$row->mname[0]." ".$row->lname;?><br>( Signature over printed name )</center></p>
							</div>
							
							<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<p><center style="text-transform:capitalize"><?php foreach ($getOicOfficer as $row1){echo $row1->value;}?><br>Plant Manager, AGUS 6/7 HEPC</center></p>
							</div>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 print" style="margin-top:1%;font-weight:bold;">
							<p style="font-size:10px;">(Note : Approved of Pre-Purchase Request Slip must be attached to NPC PR form effective August 01, 1998 and still subject to PR flow proccess)</p>
						</div><!-- col-lg-4 -->
				
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button noprint" style="margin-top:1%;">
							<div style="width:100%;height:2px;background-color:#24665B;">
							</div>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button noprint" style="margin-top:20px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Evaluation  </h4><button style="text-transform:capitalize;font-size:15px;border-radius:8px;float:left;" title="Evaluation">
							<?=$row->status;?>
							</button>
						</div><!-- col-lg-4 -->
						
						<?php if ($row->status == 'pending'){}else{ ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button noprint" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Responsible  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Responsible Person">
							<?php
							echo $row->person_responsible; ?>
							</button>
						</div><!-- col-lg-4 -->
						<?php } ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button noprint" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Date Modified  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Date Modified">
							<?php 
								if (date('F d , Y',strtotime($row->date_status_changed))== "January 01 , 1970"){
								echo "- -";
								}else{
							echo date('F d , Y',strtotime($row->date_status_changed))." - ".date('h:i A', strtotime($row->date_status_changed));
								}
							?>
							</button>
						</div><!-- col-lg-4 -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button noprint" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Requisitioner  </h4><button style="text-transform:capitalize;font-size:15px;border-radius:8px;float:left;" title="Responsible Person">
							<?=$row->fname[0].".".$row->mname[0]." ".$row->lname;?>
							</button>
						</div><!-- col-lg-4 -->
							<?php } ?>
					
				</div> <!-- /end row -->
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
     
	 
	  <?php foreach ($PurchaseInfo as $row){ ?>
			<div class="modal fade" id="<?php echo $row->wsid;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel" style="font-size:14px;">Setting up Schedule of Bidding</p>
						</div>
						<div class="modal-body" style="font-size:12px;color:#00271D;font-weight:bold;">
							<div class="row">
								<div class='col-md-12'>
									<p style="text-transform:capitalize;font-weight:bold;font-size:14px;">ITEM : <?=$row->category.", ".$row->spare_name;?></p>
								</div>
								<div class='col-md-12' >
									<p style="font-size:13px;">** BIDDING SCHEDULE</p>
								</div>
								<div class='col-md-12'>
																			
								 <?php echo form_open("WMS/addonbid_details");?>	
								 
								<input  type="hidden" value="<?php  echo $row->prid;?>" name="prid">
								<input  type="hidden" value="<?php  echo $row->wsid;?>" name="wsid">
								<input  type="hidden" value="<?php  echo $row->qty;?>" name="qty">
								
					
								<input  type="hidden" value="<?=$Enduser_Name;?>" name="responsible_person">
									<div class='col-md-4'>
										<label	style="font-size:13px;font-weight:bold">Venue : </label>
										<input class="form-control" type="text" name="venue" required/>
									</div>
									
									<div class='col-md-4'>
										<label	style="font-size:13px;font-weight:bold">Date : </label>
										<input class="form-control" type="date" name="date" required/>
									</div>
									
									<div class='col-md-4'>
									<label	style="font-size:13px;font-weight:bold">Time : </label>
									<input class="form-control" type="time" name="time" required/>
									</div>
									
								</div>
								
								<div class='col-md-12' >
								<p style="margin-top:1%;font-size:13px;">** SELECT SUPPLIER </p></center>
								</div>
								<div class='col-md-12'>
								
								<div class="table-responsive max-height-100">
									<table class="table table-bordered">
									<thead>
										<tr>
											<th class="col-md-2">Select</th>
											<th>Supplier Name</th>
											<th>Address</th>
										</tr>
									</thead>
									<tbody>
											
									<?php foreach ($getAllSupplierData as $row1){ ?>
									
									<tr style="text-transform:capitalize;">
										<td><input type="checkbox" name="supplier[]" value="<?= $row1->sdceno;?>"></td>
										<td>
										<?=$row1->supplier_name;?>
										</td>
										<td><?= $row1->address;?></td>
									</tr>
									<?php } ?>
								
										
									</tbody>
								</table>	
								</div>
							</div>
								
							</div> <!--end row-->
						</div>	
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","Confirm","class='btn btn-primary'");
									echo form_close();
							?>
						</div>
						
					
					</div>
				</div>
			</div>
<?php }?>




	  
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
