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
                      
                        <li><a data-toggle="modal" data-target="#<?php echo $DceNo;?>changepassword"><i class="fa fa-gear fa-fw"></i> Setting</a>
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
              	  <h3 class="centered" style="text-transform:uppercase;"><?php echo $Enduser_Name;?><br><i class="title-position" ><?php echo $Position;?></i><br></h3>
              	  
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>">
                          <i class="glyphicon glyphicon-user"></i>
                          <span>Manage User</span>
                      </a>
                  </li>  
                  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Manage_Supplier" class="active">
                          <i class="fa fa-users"></i>
                          <span>Manage Supplier</span>
                      </a>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="<?php echo base_url();?>WMS/Set_FixedValue">
                          <i class="fa fa-cogs"></i>
                          <span>Fixed Value</span>
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
          		<h4><i class="fa fa-users"></i><a href="<?php echo base_url();?>WMS/Purchase_Approved" title="List of Approved Pre-PR" style="color:#004D40;padding-left:5px;font-size:15px;">Manage Supplier</a></h4>
		
          
		  <div class="row mt">
          		<div class="col-lg-12">
						 <!-- /.panel-heading -->
						 <?php 
								if ($message[0] == "L"){
								$color="#004D40";
								}elseif ($message[0] == "S"){
								$color="#0000d9";
								}else{
								$color="#ff0000";
							}
										
						?>
						 <h3><center style="color:<?php echo $color;?>;text-transform;uppercase;font-weight:bold;font-size:15px;"><?php echo $message; ?></center></h3>
				  <div class="spare-new-left-button">
					<button class="btn btn-sm" title="New Draft" data-toggle="modal" data-target="#newSupplier">NEW SUPPLIER</button>
				  </div>
				  <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-advance table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="hidden-phone"><i class="fa fa-bolt"></i> Dce No.</th>
                                             <th ><i class="glyphicon glyphicon-user"></i> Supplier</th>
											   <th><i class="fa fa-eject"></i> Address</th>
											</tr>
                                    </thead>
                                    <tbody style="text-transform:uppercase;">
                                        
										 <?php foreach ($supplier as $row){ ?>
                                        <tr class="spareitems">
											
                                            <td class="hidden-phone"><?php echo $row->sdceno;?></td>
                                            <td>
												<a data-toggle="modal" data-target="#<?php echo $row->sdceno;?>infoSupplier" title="Show <?php echo $row->supplier_name;?>'s Information" class="btn btn-link btn-link-modal" style="text-transform:uppercase;color:#000040;"> 
													<?php echo $row->supplier_name;?>
												</a>
											</td>
                                            <td class="hidden-phone"><?php echo $row->address;?></td>
										
                                        </tr>
										
										<?php } ?>
										
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
				
				</div><!--/end col -->
          	</div> <!-- /end row -->
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->

<!-- Modal Create WRS-->
			<div class="modal fade" id="newSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <center><h5 class="modal-title" id="myModalLabel">NEW SUPPLIER</h5><center>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/new_supplier");?>	
							<div class="row">
								<input  type="hidden" value="add-supplier" name="new_supplier">
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;" >SUPPLIER NAME</label>
										<br>
										<input class="form-control"  name="Supplier_Name" required/>
									</div>
								</div>
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;">Address</label>
										<br>
										<input class="form-control"  name="Address"  required/>
									</div>
								</div>
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;">Telephone No.</label>
										<br>
										<input class="form-control"  name="Tel_No" required/>
									</div>
								</div>
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;">Fax No.</label>
										<br>
										<input class="form-control"  name="Fax_No" required/>
									</div>
								</div>
								
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","ADD",""," class='btn btn-sm'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
	 
	<!-- Modal Create Info User-->
	 <?php foreach ($supplier as $row){ ?>
			<div class="modal fade" id="<?php echo $row->sdceno;?>infoSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <center><h5 class="modal-title" id="myModalLabel">SUPPLIER'S INFORMATION</h5><center>
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#00271D;">
						
								<input  type="hidden" value="add-user" name="new_user">
							<div class="row">
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label class="pull-left" style="font-color:#000000;font-weight:bold;font-size:14px;">Dce No. </label>
										<p class="pull-left" style="margin-left:10px;"><?php echo ": ".$row->sdceno;?><p>
									</div>
								</div>
							</div>
								<div class="row">
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label class="pull-left"  style="font-color:#000000;font-weight:bold;font-size:14px;">Supplier Name </label>
										<p class="pull-left" style="margin-left:20px;"><?php echo ": ".$row->supplier_name;?></p> 
									</div>
								</div>
								</div>
								
								<div class="row">
								<div class='col-md-12' style="width:100%;">
									<div style="margin-left:5%;margin-top:8px;">
										<label class="pull-left" style="font-color:#000000;font-weight:bold;font-size:14px;">Address</label>
										<p class="pull-left" style="margin-left:30px;"><?php echo ": ".$row->address;?><p>
									</div>	
									
								</div>
								</div>
								
								<div class="row">
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label class="pull-left" style="font-color:#000000;font-weight:bold;font-size:14px;">Tel No.</label>
										<p class="pull-left" style="margin-left:18px;"><?php echo ": ".$row->tel_no;?><p>
									</div>	
									
								</div>
								</div>
								
								<div class="row">
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label class="pull-left" style="font-color:#000000;font-weight:bold;font-size:14px;">Fax No.</label>
										<p class="pull-left" style="margin-left:18px;"><?php echo ": ".$row->fax_no;?><p>
									</div>	
									
								</div>
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<button type="button" style="font-weight:bold;font-size:13px;float:left;" class="btn btn-info" data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row->sdceno;?>editSupplier" alt="List of Spares"><i class="glyphicon glyphicon-pencil"> EDIT</i></button>
							<button type="button" style="font-weight:bold;font-size:13px;float:right;" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row->sdceno;?>deleteSupplier" alt="List of Spares"><i class="glyphicon glyphicon-trash"></i> DELETE</button>
						</div>
					</div>
				</div>
			</div>
        <!-- EDIT USER Info-->
			<div class="modal fade" id="<?php echo $row->sdceno;?>editSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <center><h5 class="modal-title" id="myModalLabel">EDIT SUPPLIER'S INFORMATION</h5><center>
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#00271D;">

							 <?php echo form_open("WMS/editSupplier");?>	
										<input type="hidden" class="form-control"  name="SDceNoHidden" value="<?php echo $row->sdceno;?>" required/>
							<div class="row">
								
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;" >SUPPLIER NAME</label>
										<br>
										<input class="form-control"  name="Supplier_Name" value="<?php echo $row->supplier_name;?>" required/>
									</div>
								</div>
							
						
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;">Address</label>
										<br>
										<input class="form-control"  name="Address" value="<?php echo $row->address;?>" required/>
									</div>
								</div>
							
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;">Tel No</label>
										<br>
										<input class="form-control"  name="Tel_No" value="<?php echo $row->tel_no;?>" required/>
									</div>
							
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;">Fax No</label>
										<br>
										<input class="form-control"  name="Fax_No" value="<?php echo $row->fax_no;?>" required/>
									</div>
								</div>
							
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<button type="button" style="font-weight:bold;font-size:13px;float:left;" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row->sdceno;?>infoSupplier" alt="Back"><i class="glyphicon glyphicon-arrow-left"> BACK</i></button>
							<?php //registration button
								
									echo form_submit("loginSubmit","Save","style='color:#FFFFFF;padding:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
 

        <!-- DELETE USER Info-->
			<div class="modal fade" id="<?php echo $row->sdceno;?>deleteSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
							
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#004D40;">
						    <?php echo form_open("WMS/DeleteSupplier");?>	
							<div class="row">
								<div class='col-md-12'>
										<div class='col-md-12' style="margin-left:2%;margin-top:2%;">
										<p>Are you sure to delete " <span  style="text-transform:uppercase;font-size:14px;color:#660000;font-weight:bold;"><?php echo $row->supplier_name;?></span>" ?</p>
										<input type="hidden" value="<?php echo $row->supplier_name;?>" name="name">
										<input type="hidden" value="<?php echo $row->sdceno;?>" name="SDceNo">
										<input type="hidden" value="delete-supplier" name="action">
										
										</div>
								</div>
								
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							<button type="button" style="font-weight:bold;font-size:13px;float:left;" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#<?php echo $row->sdceno;?>infoSupplier" alt="Back"><i class="glyphicon glyphicon-arrow-left"> BACK</i></button>
							<?php //registration button
								
									echo form_submit("loginSubmit","YES","style='color:#FFFFFF;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
	 
	  
 <?php } ?>
<!-- EDIT password Info-->
			<div class="modal fade" id="<?php echo $DceNo;?>changepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <center><h5 class="modal-title" id="myModalLabel">CHANGE SETTING</h5><center>
						</div>
						
						<div class="modal-body" style="font-size:14px;color:#00271D;">

							 <?php echo form_open("WMS/passwordUser");?>	
							<div class="row">
								<input  type="hidden" name="Position" value="<?php echo $Position;?>">
								<input  type="hidden" name="Requisitioning_Section" value="<?php echo $Section;?>">
								<input  type="hidden" name="username" value="<?php echo $Username;?>">
								<input type="hidden" class="form-control"  name="DceNoHidden" value="<?php echo $DceNo;?>" required/>
										<input type="hidden" class="form-control"  name="Fname" value="<?php echo $Fname;?>" required/>
										<input type="hidden" class="form-control"  name="Mname" value="<?php echo $Mname;?>" required/>
										<input type="hidden" class="form-control"  name="Lname" value="<?php echo $Lname;?>" required/>
										<input type="hidden" class="form-control"  name="password1" value="<?php echo $Password;?>" required/>
										<input type="hidden" class="form-control"  name="CcNo" value="<?php echo $CcNo;?>" required/>
										<input type="hidden" class="form-control"  name="User_Access_Level" value="<?php echo $Access_level;?>" required/>
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;">OLD PASSWORD</label>
										<br>
									<input  type="password" class="form-control"  name="password2" required/>
										
									</div>
								</div>
								
								<div class='col-md-12'>
									<div style="margin-left:5%;margin-top:8px;">
										<label style="font-color:#000000;font-weight:bold;font-size:14px;">NEW PASSWORD</label>
										<br>
									<input  type="password" class="form-control"  name="password3" required/>
										
									</div>
								</div>
						
							</div> <!--end row-->
						</div>
						
						<div class="modal-footer">
							
							<?php //registration button
								
									echo form_submit("loginSubmit","CHANGE","style='color:#FFFFFF;padding:5px;background-color:#004D40;border:2px solid #004D40;'","class='btn btn-color'");
									echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>

	  
	  
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
