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
							<?php foreach ($getSpecificBid as $row){
								$bid = $row->bid;
								}
							?>

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
                      <a href="<?php echo base_url();?>WMS/Approve_PR">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Approved PR</span>
                      </a>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Bidding"  class="active">
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
        <section class="wrapper site-min-height"><h4><i class="fa fa-sort-amount-desc"></i><a href="<?php echo base_url();?>WMS/Bidding" title="List of Bidding" style="color:#004D40;padding-left:5px;font-size:15px;">Bidding</a>
          
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
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<a style="color:#004D40;padding-left:5px;font-size:16px;"><code>
				<?php
				$lastSpId = $bid;
					if($lastSpId < 10){
					$a = "00$lastSpId";
					}else if ($lastSpId >= 10 && $lastSpId < 100){
					$a = "0$lastSpId";
					}
					
					echo $a;
				?>
			</code></a></i>
		
			</h4>
			<?php }?>
			<!--form method="post" action="<?php echo base_url();?>WMS/Bidding_Set_Info">
												<input  type="hidden" value="<?php //echo $wsid;?>" name="wsid">
												<input  type="hidden" value="<?php //echo $prid;?>" name="prid">
												<button type="submit"  class="btn btn-default btn-xs" style="text-decoration:none;"> 
													<i class="fa fa-arrow-left" style="padding-left:5px;"></i> BACK
												</button></form-->
          	<div class="row">
					
					
						<div class='form-group noprint'>
							<center style="font-size:15px;font-weight:bold;font-color:#000000;"><?=$message;?></center>
						</div>
						
				
						
          		<div class="col-lg-12">
							<?php foreach ($getSpecificBid as $row){
							
								
							?>
						<div style="width:90%;margin-left:5%;text-transform:capitalize;font-size:13px;">
							
								<div class="row mt">
								<div class="col-xs-6">
									<p style="font-weight:bold;text-decoration:underline;font-size:15px;">ITEM TO BID <p>
									<p style="text-transform:capitalize;font-weight:bold;margin-left:5%;"><code style="font-size:14px;"><?=$row->category.", ".$row->spare_name;?></code></p>
												<div style="width:90%;margin-left:5%;">
												<p><code style="font-size:14px;"> - <?=$row->description;?></p></code>
												</div>
									
								</div><!-- col-lg-4 -->
								<div class="col-xs-6">
									<p style="font-weight:bold;text-decoration:underline;font-size:15px;">BIDDING SCHEDULE</p>
										<div class="col-xs-12" >
											<label><p style="font-weight:bold;">VENUE : <code style="font-size:14px;"><?=$row->venue;?></code></p></label>
											<br><label><p style="font-weight:bold;">DATE / TIME : <code style="font-size:14px;">
											<?php 
												echo date('F m, Y', strtotime($row->date))." - ".date('h:i A', strtotime($row->time));
											?></code></p></label>
										</div>
								</div><!-- col-lg-4 -->
										
								
								</div>
							<?php }?>
						
						<!-- /.panel-body -->
				 
					</div><!--/end col -->
			
				
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:1%;">
						
						<div class='col-lg-12'>
								<div style="border-top:2px solid #004D40;height:1px;margin:0px auto;padding-bottom:2%;"></div>
								<center><p style="font-weight:bold;font-size:15px;">- - BIDDERS - -</p></center>
							</div>
							<div class='col-lg-12'>
								<div class='col-lg-12'>
									 <table class="table table-striped  table-hover  table-bordered" style="font-weight:bold;font-size:12px;width:75%;margin:0px auto;font-size:14px;">
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
												foreach ($getSpecificBidDetails as $row1){ 
												
											?>
												<tr>
													<td style="border:1px solid #24665B;"><center><?php if($row1->quotation==0){}else{echo $i++;}?></center></td>
													<td style="border:1px solid #24665B;"><p><?=$row1->supplier_name;?></p></td>
													<td style="border:1px solid #24665B;" class="text-right"><?php if($row1->quotation==0){echo "<label class='btn btn-xs btn-danger'>NOT SET</label>";}else{ ?>₱ <?=number_format($row1->quotation,2);}?>
													<a class="text-right" href="#" style="font-size:15px;padding-left:10%;" data-toggle="modal" data-target="#<?=$row1->bdid;?>updateqty"><i class="fa fa-pencil"></i></a></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<div class='col-lg-12' style="margin-top:2%;">
									<div class='col-lg-6 pull-right'>
									<?php foreach ($countSpecificBidDetails as $row2){ if ($row2->countnotset != 0){}else{?>
									
									<a class="btn btn-xs" style="border:1px solid #003428;font-size:20px;font-weight:bold;float:right;color:#003428;margin-right:1%;" title="Approved Purchase Request" data-toggle="modal" data-target="#markascomplete">
										<i class="glyphicon glyphicon-check" aria-hidden="true"></i><code style="background-color:#FFFFFF;color:#003428;">Complete</code>
									</a>
									<?php }} ?>
									</div>
									<div class='col-lg-6 pull-left'>
									<p style="font-size:11px;font-weight:bold;text-transform:capitalize;line-height:22px;">Note: <br>- <i class="fa fa-pencil fa-lg"></i> To Edit Quotations</br> - All Supplier's Quotation must be SET before it can be mark as complete<br> - After Bidding is marked as complete. Quotations will be Uneditable<p>
									</div>
								</div>
								<div class='col-lg-12'>
									<div style="border-top:2px solid #004D40;height:1px;margin:0px auto;margin-top:2%;"></div>
									<p style="text-transform:capitalize;font-weight:bold;margin-top:1%;font-size:15px;">Status : <code style="font-size:15px;"><?php
									if ($row->status == 'confirm'){echo 'Completed';}else{echo 'On Bid';};
									?></code></p>
									<p style="text-transform:capitalize;font-weight:bold;font-size:14px;">Responsible : <code style="font-size:15px;"><?=$row->person_responsible;?></code></p>
									<p style="text-transform:capitalize;font-weight:bold;font-size:14px;">Date Modified :<code style="font-size:15px;"><?=date('F d, Y', strtotime($row->date_status_changed));?></code></p>
								</div>
							</div>
					</div>
					
					
				</div> <!-- /end row -->
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
     
	 
	  <?php foreach ($getSpecificBidDetails as $row1){ ?>
			<div class="modal fade" id="<?=$row1->bdid;?>updateqty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel" style="font-size:14px;">Setting New Bid</p>
						</div>
						<div class="modal-body" style="font-size:12px;color:#00271D;font-weight:bold;">
							<div class="row">
								<div class='col-md-12'>
									<p style="text-transform:capitalize;font-weight:bold;font-size:14px;">Bidder <br><code><?=$row1->supplier_name;?></code></p>
								</div>
								
								<div class='col-md-12'>
																			
								 <?php echo form_open("WMS/updatequotations");?>	
								 
								<input  type="hidden" value="<?php  echo $row1->prid;?>" name="prid">
								<input  type="hidden" value="<?php  echo $row1->wsid;?>" name="wsid">
								<input  type="hidden" value="<?php  echo $row1->bdid;?>" name="bdid">
								
								
								<label style="text-transform:capitalize;font-weight:bold;font-size:14px;">Quotation</label>
								<input  type="number" class="form-control" step="any" value="<?=$row1->quotation;?>" min='1' name="quotation">
									
									
								</div>
									
							</div> <!--end row-->
						</div>	
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","SET","class='btn btn-primary'");
									echo form_close();
							?>
						</div>
						
					
					</div>
				</div>
			</div>
<?php }?>

			<div class="modal fade" id="markascomplete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:30%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">Confirmation Message</p>
						</div>
						<div class="modal-body" style="font-size:16px;color:#00271D;font-weight:bold;">
							<div class="row">
																
								<div class='col-md-12'>
								 <?php echo form_open("WMS/bidding_mark_as_complete");?>	
								 
								<input  type="hidden" value="<?php  echo $bid;?>" name="bid">
								<input  type="hidden" value="<?=$Enduser_Name;?>" name="responsible_person">
														
									<label	style="font-size:16px;font-weight:bold">
										Are you sure you want to continue ? 
									</label>
									
										
								</div>
								<div class='col-md-12' style="font-size:11px;margin-top:2%;">
								<p>Note: <br>
								- Quotations on this bidding will no longer editable</br>
								- PO will be automatically generated and Awarded on Rank 1 Bidder</p>
								</div>
							</div> <!--end row-->
						</div>	
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","Yes","class='btn btn-danger'");
									echo form_close();
							?>
						</div>
						
					
					</div>
				</div>
			</div>


	  
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
