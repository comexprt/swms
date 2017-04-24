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
                      <a href="<?php echo base_url();?>WMS/Bidding" class="active">
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
          	<h4><i class="fa fa-sort-amount-desc	"></i><a href="<?php echo base_url();?>WMS/Bidding" title="List of Bidding PR" style="color:#004D40;padding-left:5px;font-size:15px;">Bidding PR</a>
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
																
								<li class="active"><a href="#Requested" data-toggle="tab">List Of PR</a>
								</li>
							
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							
								
								<div class="tab-pane fade in active" id="Requested">
									 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-hover" id="dataTables-Requested">
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone"><center>No.</center></th>
                                            <th class="hidden-phone"><center>PR No.</center></th>
											<th class="hidden-phone" ><i class="fa fa-calendar" style="margin-left:12%;"></i> DATE CREATED</th>
											<th class="hidden-phone" ><i class="fa fa-calendar" style="margin-left:5%;"></i> REQUISITIONER</th>
                                            <th><center><i class="glyphicon glyphicon-stats"></i> ON BID</center></th>
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
                                            <td style="text-transform:uppercase;"><span style="margin-left:5%;"><?=date('F m, Y  h:i A', strtotime($row->date));?></span></td>
                                            <td style="text-transform:uppercase;"><span style="margin-left:10%;"><?=$row->fname[0].".".$row->mname[0]." ".$row->lname;?></span></td>
                                            <td class="hidden-phone"><center>
											<?php if ($row->status == 'approved'){ ?>
											<span class="label label-default" style="text-transform:capitalize;font-size:12px;">NOT SET</span>
											<?php }else{ ?>
											<span class="label label-danger" style="font-size:12px;"><?php echo $row->status; ?></span>
											<?php } ?>
											</center></td>
                                            
                                            <td><center>
											<?php if ($row->status == 'approved'){ ?>
												<a  class="btn btn-success btn-xs" title="Set bidding" data-toggle="modal" data-target="#<?php echo $row->prid;?>update">
													<i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
													</a>
											<?php }else{ ?>
											<form method="post" action="<?php echo base_url();?>WMS/Bidding_Info">
												<input  type="hidden" value="<?php echo $row->prid;?>" name="prid">
												<button type="submit"  class="btn btn-default btn-xs" style="text-decoration:none;"> 
													<i style='font-size:12px;' class='fa fa-share' aria-hidden='true'></i>
												</button></form>
											<?php } ?>
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


	  
	  <?php foreach ($Draftp as $row){
		$lastSpId = $row->prid;
		if($lastSpId < 10){
		$a = "00$lastSpId";
		}else if ($lastSpId >= 10 && $lastSpId < 100){
		$a = "0$lastSpId";
		}
		$date=date('Y', strtotime($row->date));
		$b=substr($date,2);
	  ?>			
			<div class="modal fade" id="<?php echo $row->prid;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel" style="font-size:14px;">Confirmation Message</p>
						</div>
						<div class="modal-body" style="font-size:16px;color:#00271D;font-weight:bold;">
							<div class="row">
																
								<div class='col-md-12'>
								 <?php echo form_open("WMS/addonbid");?>	
								 <p style="font-weight:bold;font-size:14px;">Setting Up PR : AG67-PR<?php echo $b."-".$a;?> On Bid ... </p>
								<input  type="hidden" value="<?php  echo $row->prid;?>" name="prid">
								<input  type="hidden" value="<?php  echo $row->date;?>" name="prid_date">
					
								<input  type="hidden" value="<?=$Enduser_Name;?>" name="responsible_person">
									<!--label	style="font-size:14px;font-weight:bold">Venue : </label>
									<input class="form-control" type="text" name="venue" required/>
									<br>
									
									<label	style="font-size:14px;font-weight:bold">Date : </label>
									<input class="form-control" type="date" name="date" required/>
									<br>
									
									<label	style="font-size:14px;font-weight:bold">Time : </label>
									<input class="form-control" type="time" name="time" required/-->
									
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
