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
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url();?>" class="logo"><b>sWMS</b></a>
            <!--logo end-->
            <ul class="top-nav  pull-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
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
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i><br><i class="title-position" style="font-style:normal">END USER</i></h3>
              	  
                  <li class="sub-menu">
                      <a href="javascript:;" class="active" >
                          <i class="fa fa-briefcase"></i>
                          <span>Spares Inventory</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a href="<?php echo base_url();?>">My Spares</a></li>
                          <li><a  href="EndUser_ws.html">Warehouse Spares</a></li>
                      </ul>
                  </li>

				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Transactions</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>WMS/Spare_Purchase">Purchase Spare</a></li>
                          <li><a  href="Requisition.html">Warehouse Requisition</a></li>
                      </ul>
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
          	<h4><i class="fa fa-briefcase"></i><a style="color:#004D40;padding-left:5px;">Spares Inventory</a><i class="fa fa-angle-double-left" style="padding-left:5px;"></i><a style="color:#004D40;padding-left:5px;">My Spares</a></h4>
          	<div class="row mt">
          		<div class="col-lg-12">
						 <!-- /.panel-heading -->
				  <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><center>SNN#</center></th>
                                            <th class="hidden-phone"><i class="fa fa-bookmark"></i> Category</th>
											  <th><i class="glyphicon glyphicon-info-sign"></i> Spare Name</th>
											  <th><i class="glyphicon glyphicon-import"></i> On Hand</th>
											  <th><i class="glyphicon glyphicon-export"></i> On Order</th>
											</tr>
                                    </thead>
									
                                    <tbody>
									<?php foreach ($Category as $row){ ?>
                                        <tr class="odd gradeX">
                                            <td><center><?php echo $row->WSid;?></center></td>
                                            <td class="hidden-phone" style="text-indent:2%;"><?php echo $row->Category;?></td>
                                            <td><button type="button" class="btn btn-link btn-link-modal" data-toggle="modal" data-target="#<?php echo $row->WSid;?>info"><?php echo $row->Spare_Name;?></button></td>
                                            <td style="text-indent:1%;"><?php echo $row->Quantity_onHand;?></td>
                                            <td style="text-indent:1%;"><?php echo $row->Quantity_onOrder;?></td>
											
                                        </tr>
										<?php } ?>
                                    
                                      
                                      
                                    </tbody>
                                </table> 
							     <!--table class="table table-striped table-advance table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SNN#</th>
                                            <th class="hidden-phone"><i class="fa fa-bookmark"></i> Category</th>
											  <th><i class="fa fa-question-circle"></i> Name</th>
											  <th><i class="glyphicon glyphicon-import"></i> On Hand</th>
											  <th><i class="glyphicon glyphicon-export"></i> On Order</th>
											</tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>03333</td>
                                            <td class="hidden-phone">Trident</td>
                                            <!--td><button type="button" class="btn btn-link btn-link-modal" data-toggle="modal" data-target="#myModal">Oil-type transsformer</button></td-->
                                            <!--td><button type="button" class="btn btn-link btn-link-modal" data-toggle="modal" data-target="#wrsModal">Oil-type transsformer</button></td>
                                            <td style="text-indent:1%;"><span class="label label-danger label-mini">Out Of Stock</span></td>
											<td style="text-indent:5%;">5</td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>83833</td>
                                            <td class="hidden-phone">Trident</td>
                                            <td><a href="#">Internet Explorer 5.0</a></td>
                                            <td style="text-indent:5%;">18</td>
											<td style="text-indent:5%;">50</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>17171</td>
                                            <td class="hidden-phone">Trident</td>
                                            <td><a href="#">Internet Explorer 5.5</a></td>
                                            <td style="text-indent:5%;">5</td>
											<td style="text-indent:1%;"><span class="label label-warning label-mini"><i class="glyphicon glyphicon-warning-sign"></i> Re-Order</span></td>
                                            
                                        </tr>
                                       
                                        </tr>
                                        
                                    </tbody>
                                </table-->
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
				
				</div><!--/end col -->
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
	  <!-- Modal Spares Info-->
	  <?php foreach ($Category as $row){ ?>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Spare Information</h4>
						</div>
						
						<div class="modal-body">
						    
							<div class="row mt">
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 spare-info spare-info1">
									
										<div class="project">
											<div class="photo-wrapper">
												<div class="	">
													<!--a class="fancybox" href="assets/img/no-image-spare/system-icon.png"><img class="img-responsive" src="assets/img/portfolio/port04.jpg" alt=""></a-->
													<img class="img-responsive" src="<?php echo base_url();?>/_assets/assets/img/no-image-spare/system-icon3.png" alt="">
													
												</div>
											</div>
										
										</div>
										<br></br>
										<div class="spare-info-left">
											<p>SNN#<p>
										</div>
										
										<div class="spare-info-right">
											<p>: 093433<p>
										</div>
										
										<div class="spare-info-left">
											<p>Category<p>
										</div>
										
										<div class="spare-info-right">
											<p>: Valves<p>
										</div>
										
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 spare-info">
										
										
										
										<div class="spare-info-left">
											<p>Qty. OnHand<p>
										</div>
										
										<div class="spare-info-right">
											<p>: 5 sets<p>
										</div>
										<div class="spare-info-left">
											<p>Qty. OnOrder<p>
										</div>
										
										<div class="spare-info-right">
											<p>: 2 sets<p>
										</div>
										
										<div class="spare-info-left">
											<p>Status<p>
										</div>
										
										<div class="spare-info-right">
											<p style="color:#F0AD4E;">: Re-Order<p>
										</div>
										
										<br></br>
										<div class="spare-info-left-description">
											<p>Description : <p>
										</div>
										
										<div class="spare-info-right-description">
											<p>adfadfadf ,adfadfd ,n adfadf, adfadf, adfadadsf, adfadadf, asdfadfasdf, adfadsfd, adfadfad, adfdf<p>
										</div>
										
										
										
										<br></br>
										<div class="spare-info-left-button">
											 <!--button type="button" data-toggle="modal" data-target="#prePRModal" data-dismiss="modal" class="btn btn-sm" title="Create Pre-PR"><i class="fa fa-shopping-cart" title="Create Pre-PR"></i></button-->
											 <!--button type="button" data-toggle="modal" data-target="#wrsModal" data-dismiss="modal" class="btn btn-sm" title="Create Create Warehouse Requisition Slip"><i class="fa fa-shopping-cart" title="Create Warehouse Requisition Slip"></i></button-->
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
	 
	  
<!-- Modal Create Pre-pr -->
			<div class="modal fade" id="prePRModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel" style="font-size:14px;">Create Pre-Purchase Requisition</h4>
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
										<br></br>
										<div class="spare-info-left">
											<p>SNN#<p>
										</div>
										
										<div class="spare-info-right">
											<p>: 093433<p>
										</div>
										<div class="spare-info-left">
											<p>Category<p>
										</div>
										
										<div class="spare-info-right">
											<p>: Valves<p>
										</div>
										
										<p>Include in 2015 PPMP:</p>
										<div class="spare-info-left">
											<p style="margin-top:2px">Item No.<p>
										</div>
										
										<div class="spare-info-right">
											<input type="input" class="form-control" style="border-radius:0px;height:22px;padding:2px;font-size:12px;" placeholder="ex.123">
										</div>
										<br></br>
										<div class="spare-info-left">
											<p style="margin-top:5px";>Page No.<p>
										</div>
										
										<div class="spare-info-right">
											<input type="input" class="form-control" style="border-radius:0px;height:22px;padding:2px;font-size:12px;" placeholder="ex.456">
										</div>
										
										
										
										

										
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 spare-info end-user-pr">
										
										
										
										<div style="float:left;width:45%;font-weight:bold;">
											<p>Date Needed<p>
										</div>
										
										<div style="float:left;width:55%;margin-top:-5px;" >
											<input type="date" class="form-control" style="padding:3px;font-size:12px;">
										</div>
										<br></br>
										<br></br>
										<div class="spare-info-left">
											<p>Qty. OnHand<p>
										</div>
										
										<div class="spare-info-right">
											<p>: 5 sets<p>
										</div>
										
										<div class="spare-info-left">
											<p>Qty. OnOrder<p>
										</div>
										
										<div class="spare-info-right">
											<p>: 2 sets<p>
										</div>
										
										<div class="spare-info-left">
											<p>Status<p>
										</div>
										
										<div class="spare-info-right">
											<p style="color:#F0AD4E;">: Re-Order<p>
										</div>
										
										<br></br>
										<div class="spare-info-left-description">
											<p>Description : <p>
										</div>
										
										<div class="spare-info-right-description">
											<p>adfadfadf ,adfadfd ,n adfadf, adfadf, adfadadsf, adfadadf, asdfadfasdf, adfadsfd, adfadfad, adfdf<p>
										</div>
									
										<div class="spare-info-left-description">
											<p style="font-size:11px;margin-top:5px;">PURPOSE OF PURCHASE<p>
										</div>
										
										<div class="spare-info-right-description form-group">
										<textarea class="form-control" rows="4"></textarea>
										</div>
	
									
								</div><!-- col-lg-4 -->
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
						    <button type="button" class="btn btn-color">Create</button>
						</div>
					</div>
				</div>
			</div>

<!-- Modal Create WRS-->

	 <?php foreach ($Category as $row){ ?>
			<div class="modal fade" id="<?php echo $row->WSid;?>info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
										<br></br>
										<div class="spare-info-left">
											<p>SNN<p>
										</div>
										
										<div class="spare-info-right">
											<p>: <?php echo $row->WSid;?><p>
										</div>
										<div class="spare-info-left">
											<p>Category<p>
										</div>
										
										<div class="spare-info-right">
											<p>: <?php echo $row->Category;?><p>
										</div>
										<br></br>
										<br></br>
										<div style="padding-top:10px;">
										</div>
									
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 spare-info end-user-pr">
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Spare Name<p>
										</div>
										<div style="width:100%;padding-left:5px;">
											<p>: <?php echo $row->Spare_Name;?><p>
										</div>
										<div class="spare-info-left-wrs">
											<p style="font-size:14px;margin-top:5px;text-transform:underline">QUANTITY</p>
										</div>
										<div class="spare-info-left-wrs">
											<p style="margin-top:5px">On Hand</p>
										</div>
										
										<div class="spare-info-right-wrs">
											<p style="margin-top:5px">: <?php echo $row->Quantity_onHand." ".$row->Unit_Of_Measurement;?></p>
										</div>
										<div class="spare-info-left-wrs">
											<p style="margin-top:5px">On Order</p>
										</div>
										
										<div class="spare-info-right-wrs">
											<p style="margin-top:5px">: <?php echo $row->Quantity_onOrder." ".$row->Unit_Of_Measurement;?></p>
										</div>
										<div class="spare-info-left-wrs">
											<p style="margin-top:5px">Price</p>
										</div>
										
										<div class="spare-info-right-wrs">
											<p style="margin-top:5px">: <?php echo $row->Delivery_Price;?></p>
										</div>
										<div class="spare-info-left-wrs">
											<p style="margin-top:5px">Stock Limit</p>
										</div>
										
										<div class="spare-info-right-wrs">
											<p style="margin-top:5px">: <?php echo $row->ReOrdering_Pt." ".$row->Unit_Of_Measurement;?></p>
										</div>
										
										
	
									
								</div><!-- col-lg-4 -->
							</div>
							
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
						    <button type="button" class="btn btn-color">Request</button>
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
			$('#dataTables-example').DataTable({
					responsive: true
			});
		});
    </script>
  
  

  </body>
</html>
