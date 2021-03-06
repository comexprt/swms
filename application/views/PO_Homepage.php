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
		<?php
			include 'include/sidebar.php';
		?>
    
      <!--sidebar end-->
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
          	<h4><i class="fa fa-briefcase"></i><a style="color:#004D40;padding-left:5px;">Spares Inventory</a></h4>
				<div class="row">
							<div class='form-group'>
							  <a><center style="font-size:17px;font-weight:bold;"><?php echo $message;?></center></a>							
							</div>
				</div>
				 <div class="row">
										<div class="spare-new-left-button">
											<button class="btn btn-sm" title="Add Spare" data-toggle="modal" data-target="#newSpare">
												ADD SPARE <i style="padding-left:5px;" class="fa fa-plus"></i>
											</button>
										</div>
										
										
								</div><!-- col-lg-4 -->
          	<div class="row mt">
				
          		<div class="col-lg-12">
						 <!-- /.panel-heading -->
						
				  <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><center>SNN #</center></th>
                                            <th class="hidden-phone"><i class="fa fa-bookmark"></i> Category</th>
											  <th><i class="glyphicon glyphicon-info-sign"></i> Spare Name</th>
											  <th><center><i class="glyphicon glyphicon-import"></i>Quantity On Hand</center></th>
											  <th><center><i class="glyphicon glyphicon-export"></i>Quantity On Order</center></th>
											</tr>
                                    </thead>
									
                                    <tbody>
									<?php foreach ($Category as $row){ ?>
                                        <tr class="odd gradeX">
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
											
											<center><span class="label label-warning">No Purchase</span></center>
											<?php } ?>
											</td>
											
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
		
			<?php }?>
	 
	  


	 <?php foreach ($Category as $row){ ?>
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
						    <button type="button" class="btn btn-color pull-left"  data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row->wsid;?>Update">Update</button>
					
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
	 
	  
	  <?php }?>
	  
	 <?php foreach ($Category as $row){ ?>
			<div class="modal fade" id="<?php echo $row->wsid;?>Update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirm Spare Update</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/UpdateSpare");?>	
							<div class="row">
							
						
												<input  type="hidden" value="<?php echo $row->wsid;?>" name="WSid">
												<input  type="hidden" value="<?php echo $row->quantity_onhand;?>" name="Quantity_onHand">
												<input  type="hidden" value="<?php echo $row->quantity_onorder;?>" name="Quantity_onOrder">
						
								<div class='col-md-6'>
									
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Category</label>
										<br>
									
										<select class="form-control" name="Category"  style="font-size:13px;font-weight:bold;">  
									
												<option value="<?php echo $row->category;?>"><?php echo $row->category;?></option>
												<option value="EXCITATION SYSTEM">EXCITATION SYSTEM</option>
												<option value="GENERATOR">GENERATOR</option>
												<option value="SWITCHGEAR">SWITCHGEAR</option>
												<option value="MECHANICAL  SPARES">MECHANICAL  SPARES</option>
												<option value="POWER TRANSFORMER">POWER TRANSFORMER</option>
												<option value="STATION SERVICE SYSTEM">STATION SERVICE SYSTEM</option>
											  </select>
									</div>
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Spare Name</label>
										<br>
										<input type="text" class="form-control"  name="Spare_Name" value="<?php echo $row->spare_name;?>" placeholder="Text Here ... " required>
									</div>
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Description</label>
										<br>
										<textarea class="form-control"  name="Description"  style="height:90px" placeholder="Text Here ... " required><?php echo $row->description;?></textarea>
									</div>
									
									<div class="form-group" style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Unit Of Measure</label>
										<br>
											  <select class="form-control" name="Unit_Of_Measurement"  style="font-size:12px;">  
										    	<option value = "<?php echo $row->unit_of_measurement;?>"><?php echo $row->unit_of_measurement;?></option>
												<option value="unit">unit</option>
												<option value="lot">lot</option>
												<option value="set">set</option>
												<option value="tube">tube</option>
											  </select>
									</div>
								</div>
								<div class='col-md-6'>
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Price</label>
										<br>
										<input type="number" class="form-control"  name="Delivery_Price" value="<?php echo $row->delivery_price;?>" min="0" required>
									</div>
									<br>
									
									<div>
											<div style="width:100%;height:2px;background-color:#24665B;">
											</div>
									</div>
									
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Stock Limit</label>
										<br>
										<input type="number" class="form-control"  name="ReOrdering_Pt" value="<?php echo $row->reordering_pt;?>" min="1" max="3" required>
									</div>
								
								
								
									
								
									
								</div>
							</div> <!--end row-->
						
						
					</div>
				<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","OK","class='btn btn-success'");
									echo form_close();
							?>
				</div>
				
			</div>
			</div>
			</div>
	 
	  
	  <?php }?>
	  <div class="modal fade" id="newSpare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Add New Spare</h4>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/AddSpare");?>	
							<div class="row">
							
						
								<div class='col-md-12'>
									<div class='col-md-6'>
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Category</label>
										<br>
										 <select class="form-control" name="Category"  style="font-size:13px;font-weight:bold;">  
									
												<option value="EXCITATION SYSTEM">EXCITATION SYSTEM</option>
												<option value="GENERATOR">GENERATOR</option>
												<option value="GENERATOR SWITCHGEAR">SWITCHGEAR</option>
												<option value="MECHANICAL  SPARES">MECHANICAL  SPARES</option>
												<option value="POWER TRANSFORMER">POWER TRANSFORMER</option>
												<option value="STATION SERVICE SYSTEM">STATION SERVICE SYSTEM</option>
											  </select>
									</div>
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Spare Name</label>
										<br>
										<input type="text" class="form-control"  name="Spare_Name"  required>
									</div>
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Description</label>
										<br>
										<textarea class="form-control"  name="Description"  style="height:90px" placeholder="Text Here ... " required></textarea>
									</div>
									
									<div class="form-group" style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Unit Of Measure</label>
										<br>
											  <select class="form-control" name="Unit_Of_Measurement"  style="font-size:12px;font-weight:bold;"> 
												<option value="unit">UNIT</option>
												<option value="lot">LOT</option>
												<option value="set">SET</option>
												<option value="tube">TUBE</option>
											  </select>
									</div>
									</div>
									<div class='col-md-6' >
									
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Price</label>
										<br>
										<input type="number" class="form-control"  name="Delivery_Price" value="" min="0" required>
									</div>
									<br>
									<div>
											<div style="width:100%;height:2px;background-color:#24665B;">
											</div>
									</div>
								
									<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:13px;font-weight:bold;">Stock Limit</label>
										<br>
										<input type="number" class="form-control"  name="ReOrdering_Pt" value="1" min="1" max="3" required>
									</div>
								
								
									</div>
								
								
									
								
									
									</div>
								</div>
							</div> <!--end row-->
						
						
				<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","OK","class='btn btn-success'");
									echo form_close();
							?>
				</div>
				
			</div>
			</div>
			</div>
			<?php foreach ($Category as $row){ ?>
			<div class="modal fade" id="<?php echo $row->wsid;?>sub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel" style="font-size:14px;">Sub-Item Details </h4>
						</div>
						
						<div class="modal-body">
						    
							<div class="row mt">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info spare-info1 ">
									
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>SNN<p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:40px;">: <?php echo $row->wsid;?><p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Category<p>
										</div>
											<div style="width:100%;">
											<p style="text-indent:15px;">: <?php echo $row->category;?><p>
											
										</div>
										
								
										<div style="padding-top:10px;">
										</div>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Spare Name<p>
										</div>
										
										<div style="width:100%;">
											<p style="text-indent:2px;">: <?php echo $row->spare_name;?><p>
										</div>
									
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 spare-info end-user-pr">
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>Description<p>
										</div>
										<div style="width:100%;">
											<p style="text-indent:2px;">: <?php echo $row->description;?><p>
										</div>
										
										<div class="pull-left spare-info" style="font-weight:bold;font-size:12px;" >
											<p>ON HAND :</p>
										</div>
										<br>
										<div class="pull-left spare-info" style="font-weight:bold;font-size:24px;" >
											<p><?php echo $row->quantity_onhand." ".$row->unit_of_measurement; ?></p>
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
														Delivery No.
													</center>
												</th>
												<th>
													<center>
														Date Delivered
													</center>
												</th>
												<th class="hidden-phone">
													<center>
														<i class="fa fa-bookmark"></i> Price
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
											
												foreach ($Delivery as $row1){ 
												if ($row->wsid == $row1->wsid){
											
											?>
												<tr class="odd gradeX">
													<td><center>
													<?php 
													$lastSpId = $row1->did;if($lastSpId < 10){
													$a = "00$lastSpId";}else if ($lastSpId >= 10 && $lastSpId < 100){
													$a = "0$lastSpId";}$date=date('Y', strtotime($row1->date_delivered));$b=substr($date,2);echo "AG67-DEV".$b."-".$a;?>
													
													</center></td>
													<td><center><?= date('F d , Y',strtotime($row1->date_delivered));?></center></td>
													<td class="text-right">
														<?php echo "₱ ".number_format($row1->delivery_price,2); ?>
													</td>
													<td><center><?php echo $row1->qty_available; ?> <code class="pull-right"  style="background-color:#FFFFFF;">
														</center></td>
													
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
							<button type="button" class="btn btn-default btn-color-close" data-dismiss="modal">Close</button>
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
