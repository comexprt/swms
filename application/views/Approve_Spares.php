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
                      <a href="<?php echo base_url();?>WMS/Homepage" >
                          <i class="fa fa-briefcase"></i>
                          <span>Spares Inventory</span>
                      </a>
                     
                  </li>

				  <li class="sub-menu">
                      <a  href="<?php echo base_url();?>WMS/Request_Spare" >
                          <i class="fa fa-send"></i>
                          <span>Requested Spares</span>
                      </a>
                  </li>

				  <li class="sub-menu">
                      <a  href="<?php echo base_url();?>WMS/Approve_Request" class="active">
                          <i class="glyphicon glyphicon-check"></i>
                          <span>GATE PASSES / SLIP</span>
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
          	<h4><i class="fa fa-tasks"></i><a style="color:#004D40;padding-left:5px;">Transaction</a><i class="fa fa-angle-double-left" style="padding-left:5px;">
			</i><a style="color:#004D40;padding-left:5px;font-size:16px;">Approved Spares Withdrawal</a></h4>
          	<div class="row mt">
          		<div class="col-lg-12">
						<div class="panel-bodyt">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#Draft" data-toggle="tab">Approved	</a>
								</li>
									
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="Draft">
									<?php 
										if ($message[0]== "L"){
											$color="#004D40";
										}else{
											$color="#006CD9";
										}
										
									?>
									
									<h5><center style="color:<?php echo $color;?>"><?php echo $message; ?></center></h5>
									
					
							<div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-hover" id="dataTables-Draft">
                                    <thead>
                                        <tr>
											  <th><center> WRS No.</center></th>
											  <th><i class="fa fa-list"></i> PURPOSE</th>
											  <th><i class="fa fa-user"></i> Responsible Person</th>
											  <th><i class="fa fa-calendar"></i> DATE APPROVED</th>
											 <th><center><i class="fa fa-tags"></i> RELEASE</center></th>
											<th><center><i class="fa fa-eye"></i> VIEW</center></th>
											
										</tr>
                                    </thead>
                                    <tbody>
										 <?php foreach ($Draft as $row){ ?>
                                        <tr class="spareitems">
										
                                            <td>
											
												<center>
													<?php echo $row->wrid;?>
												</center>
												
												</form>
											</td>
											<td>
												<?php  
												$remarks4 = $row->remarks;
												$con_cat4 = explode ("///",$remarks4);
												
												echo substr($con_cat4[0],0,50)." ...";?>
												
											</td>
                                            <td><p style="text-indent:11%;"><?php echo $row->released_by; ?></p></td>
                                            <td><?php echo $row->date_released; ?></td>
                                            <td><center><?php 
												if ($row->status == 'Released' ){echo "<span class='label label-success' style='font-size:12px;'> APPROVED</span>";}
												else {echo "<span class='label label-default' style='font-size:12px;'>".$row->status ."</span>";}
											?></center></td>
                                              
											 <td>
										
												<form method="post" action="<?php echo base_url();?>WMS/Approved_Spares_Info">
												<input  type="hidden" value="<?php echo $row->wrid;?>" name="WRId">
												
												<center><button type="submit" class="btn btn-xs" style="background-color:#FFFFFF;border:1px solid #004D40;text-decoration:none;" title="view">
													<?php echo"<i style='font-size:14px;' class='fa fa-search' aria-hidden='true'></i>"; ?>
												</button></center>
									
										
											</td>
                                              
                                        </tr>
										
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
								</div>
								
								<div class="tab-pane fade" id="Requested">
									<h5><center style="text-transform:uppercase;">EVALUATED WITHDRAWAL REQUEST</center></h5>
									 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-hover" id="dataTables-Requested">
                                 
                                      <thead>
                                        <tr>
											  <th><center> WRS No.</center></th>
											  <th><i class="fa fa-list"></i> PURPOSE</th>
											  <th><i class="fa fa-calendar"></i> DATE REQUESTED</th>
											  <th><center><i class="fa fa-tags"></i> Evaluation</center></th>
											  <th><center><i class="fa fa-cog"></i> ACTION</center></th>
										</tr>
                                    </thead>
                                    <tbody>
										 <?php foreach ($Draft1 as $row){ ?>
                                        <tr class="spareitems">
										
                                            <td>
												
												<form method="post" action="<?php echo base_url();?>WMS/Request_Spares_Info">
												<input  type="hidden" value="<?php echo $row->wrid;?>" name="WRId">
												<center><button type="submit" class="btn btn-link btn-link-modal" style="text-decoration:none;"> 
													<?php echo $row->wrid;?>
												</button></center>
												
												</form>
											</td>
											<td>
											
												<?php 
												$remarks3 = $row->remarks;
												$con_cat3 = explode ("///",$remarks3);
												
												echo substr($con_cat3[0],0,50)." ...";?>
												
											</td>
                                            <td><?php echo $row->date_created;?></td>
                                         
											   <?php 
												$det_status = $row->status;
												if($det_status == "Approved"){ ?>
													<td><center><span class="label label-primary" style="font-size:12px;"><?php echo "Accepted"; ?></span></center></td>
												
												<?php }elseif ($det_status == "Declined"){ ?>
													<td><center><span class="label label-danger" style="font-size:12px;"><?php echo $row->status; ?></span></center></td>
												
												<?php }elseif ($det_status == "Released"){ ?>
													<td><center><span class="label label-success" style="font-size:12px;"><?php echo "Approved"; ?></span></center></td>
												
												<?php }else{ ?>
												
													<td><center><span class="label label-default" style="font-size:12px;"><?php echo $row->status; ?></span></center></td>
												<?php }?>
												
												
											
											<td>
												<center>
													<a href="#" role="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#<?=$row->wrid;?>viewApprovedWithdrawalRequest">
													<i class='glyphicon glyphicon-search' style='font-size:14px;'></i>
												</a>
												</center>
											</td>
											
											  
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

<?php foreach ($Draft as $row){ ?>
<!-- Modal Create WRS-->
<div class="modal fade" id="<?=$row->wrid;?>viewWithdrawalRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><?php $wrid = $row->wrid; echo "PENDING WITHDRAWAL REQUEST";?></h4>
				</div>
				<div class="modal-body">
				<div class="row mt">
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										
										<div class="spare-left-purpose">
											<label>Withdrawal No. <p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: <?php echo $wrid;?><p>
										</div>
										
										
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										
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
											<p>: <?php 
												$remarks1 = $row->remarks;
												$con_cat1 = explode ("///",$remarks1);
												echo $con_cat1[0];
											
											?><p>
										</div>
										
										
								</div><!-- col-lg-4 -->
								
						</div>
						
					<div class="table-responsive max-height-350">
						<table class="table table-bordered" width="80%">
							<thead>
								<tr style="text-align:center">
									<th class="col-md-1"style="text-align:center">Item No.</th>
									<th style="text-align:center">Particulars</th>
									<th style="text-align:center">Qty Requested</th>
									<th style="text-align:center">UM</th>
									
								</tr>
							</thead>
							<tbody>
							
							<?php 
							$i = 1;
							foreach ($Withdrawal_Details as $row1){ 
							if ($wrid != $row1->wrid){}else{
							?>
								<tr>
									<th class="col-md-1" scope="row"><center><?=$i++;?></center></th>
									<td><?=$row1->spare_name;?></td>
									<td><center><?=$row1->qty_requested;?></center></td>
									<td><center><?=$row1->unit_of_measurement;?></center></td>
								</tr>
							<?php }} ?>

							</tbody>
						</table>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><center>- - - - - - - -    NOTHING FOLLOWS    - - - - - - - - - -</center></div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:20px;">
							<div style="width:100%;height:2px;background-color:#24665B;">
							</div>
						</div><!-- col-lg-4 -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1%;">
							<h5 style="float:left;font-weight:bold;margin-top:1px;width:130px;">Evaluation  </h5>: 
							<?php
							echo $row->status; ?>
							
						</div><!-- col-lg-4 -->
					
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1%;">
							<h5 style="float:left;font-weight:bold;margin-top:1px;width:130px;">Date Modified  </h5>: 
							<?php 
								
								echo $row->date_released;
							
							?>
							
						</div><!-- col-lg-4 -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php }?>	


<?php foreach ($Draft1 as $row){ ?>
<!-- Modal Create WRS-->
<div class="modal fade" id="<?=$row->wrid;?>viewApprovedWithdrawalRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><?php $wrid = $row->wrid; echo "EVALUATED WITHDRAWAL REQUEST";?></h4>
				</div>
				<div class="modal-body">
				<div class="row mt">
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										
										<div class="spare-left-purpose">
											<label>Withdrawal No. <p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: <?php echo $wrid;?><p>
										</div>
										
										
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
										
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
											<p>: <?php 
												$remarks2 = $row->remarks;
												$con_cat2 = explode ("///",$remarks2);
												echo $con_cat2[0];
								
											?><p>
										</div>
										
										
								</div><!-- col-lg-4 -->
								
						</div>
						
					<div class="table-responsive max-height-350">
						<table class="table table-bordered" width="80%">
							<thead>
								<tr style="text-align:center">
									<th class="col-md-1"style="text-align:center">Item No.</th>
									<th style="text-align:center">Particulars</th>
									<th style="text-align:center">Qty Requested</th>
									<th style="text-align:center">Qty Released</th>
									<th style="text-align:center">UM</th>
									
								</tr>
							</thead>
							<tbody>
							
							<?php 
							$i = 1;
							foreach ($Withdrawal_Details as $row1){ 
							if ($wrid != $row1->wrid){}else{
							?>
								<tr>
									<th class="col-md-1" scope="row"><center><?=$i++;?></center></th>
									<td><?=$row1->spare_name;?></td>
									<td><center><?=$row1->qty_requested;?></center></td>
									<td><center><?=$row1->qty_released;?></center></td>
									<td><center><?=$row1->unit_of_measurement;?></center></td>
								</tr>
							<?php }} ?>

							</tbody>
						</table>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><center>- - - - - - - -    NOTHING FOLLOWS    - - - - - - - - - -</center></div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:20px;">
							<div style="width:100%;height:2px;background-color:#24665B;">
							</div>
						</div><!-- col-lg-4 -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1%;">
							<h5 style="float:left;font-weight:bold;margin-top:1px;width:130px;">Evaluation  </h5>: 
							<?php
							if ($row->status =='Approved'){
								echo "Accepted";
							}elseif ($row->status =='Released'){
								echo "Approved";
							}else {
							echo $row->status;} ?>
							
						</div><!-- col-lg-4 -->
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1%;">
							<h5 style="float:left;font-weight:bold;margin-top:1px;width:130px;">Responsible  </h5>: 
							<?php
							echo $row->released_by; ?>
							
						</div><!-- col-lg-4 -->
					
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1%;">
							<h5 style="float:left;font-weight:bold;margin-top:1px;width:130px;">Date Modified  </h5>: 
							<?php 
								
								echo $row->date_released;
							
							?>
							
						</div><!-- col-lg-4 -->
						<?php 
							//$remarks = $row->remarks."///Spare request already requested by Engr. Moncay and released";
							$remarks = $row->remarks;
							$con_cat = explode ("///",$remarks);
							$count_con_cat = count ($con_cat);
							if ($count_con_cat >= 2){ ?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1%;">
							<h5 style="float:left;font-weight:bold;margin-top:1px;width:130px;">Remarks </h5>: 
							<?php 
								
								echo $con_cat[1];
							
							?>
							
						</div><!-- col-lg-4 -->
								
							<?php }else {} ?>
					
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
              (c) 2015 - Spares Warehouse Management System
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
