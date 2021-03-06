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
	
	
	<style>
		.tech a:hover{
			text-decoration:underline;
		}
	</style>

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
          	<h4><i class="fa fa-tasks"></i><a style="color:#004D40;padding-left:5px;">Transactions</a><i class="fa fa-angle-double-left" style="padding-left:5px;">
			</i><a style="color:#004D40;padding-left:5px;font-size:16px;" href="<?php echo base_url();?>WMS/Spare_Purchases" title="back to list">Purchase Request</a></i>
			<i class="fa fa-angle-double-left" style="padding-left:5px;">
			<?php foreach ($DraftInfo as $row){ ?>
			<a style="color:#004D40;padding-left:5px;font-size:16px;text-transform:capitalize;"><?php $prid_status=$row->status; echo $prid_status;?></a></i>
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
          		<div class="col-lg-12">
				<?php if($prid_status == 'pending-ep'){ ?>
				<div class='form-group'>
							  <a><center style="font-size:14px;font-weight:bold;">Emergency Purchase</center></a>							
							</div>
							<?php if ($max_limit == 0){}else{ ?>
							<div class="spare-new-left-button pull-right" style="margin-right:3%;">
											<button class="btn btn-lg" title=""  style="font-size:14px;" data-toggle="modal" data-target="#emergencypurchase">
												<i style="padding-right:5px;" class="fa fa-plus"></i> SPARE PURCHASE 
											</button>
										</div>
				
			<?php }} else{ ?>
					<div class='form-group'>
							  <a><center style="font-size:14px;font-weight:bold;"><?php echo $message;?></center></a>							
							</div>
			<?php }}?>
						<div style="width:90%;margin-left:5%;">
							<?php foreach ($DraftInfo as $row){ ?>
							
								<div class="row mt">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
									
										<div class="spare-left-purpose">
											<label><p>Requisitioning Section</p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: AGUS 6/7 HE PLANT<p>
										</div>
										
										
								</div><!-- col-lg-4 -->
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1">
									
										<div class="spare-left-purpose">
											<label><p>Cost Centre Number</p></label>
										</div>
										<div class="spare-right-purpose">
											<p>: 60004<p>
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
											  <th style="border:1px solid #24665B;"><center>PRICE</center></th>
											  <th style="border:1px solid #24665B;"><center>ESTD. COST</center></th>
											  
										</tr>
                                    </thead>
                                    <tbody>
										 
									 <?php
									if ($max_limit == 3){}else{									 
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
											<span style="font-weight:bold;font-size:12px;"><?php echo $row->qty;?>
											<a href="#" data-toggle="modal" data-target="#<?php echo $row->wsid;?>qty">
											<i class="glyphicon glyphicon-pencil" style="padding-left:5%;font-size:13px;"></i>
											</a>
											</span></center></p></td>
											
											<td  style="border:1px solid #24665B;"><p>
											<center><span style="font-weight:bold;font-size:12px;text-transform:uppercase;"><?php echo $row->unit_of_measurement;?></span>
											</center></p>
										  
											</td>
											
											<td style="border:1px solid #24665B;"><p>
											<span style="font-weight:bold;font-size:12px;text-transform:uppercase;margin-right:5%;" class='pull-right'>₱ <?php echo number_format($price,2);?></span>
											</p>
										  
											</td>
											
											<td style="border:1px solid #24665B;"><p>
											<span style="font-weight:bold;font-size:12px;text-transform:uppercase;margin-right:5%;" class='pull-right'>₱ <?php echo number_format($cost,2);?>
											</span>
											</p>
										  
											</td>
											<?php if($prid_status == 'pending-ep'){ ?>
											<td style="background-color:#FAFAFA;border-left:1px solid #24665B;border-bottom:1px solid #FAFAFA;border-top:1px solid #FAFAFA;border-right:1px solid #FAFAFA;">
											<center>
												<a href="#" data-toggle="modal" data-target="#<?php echo $row->wsid;?>delete">
											<i class="glyphicon glyphicon-remove" style="color:#8C0000;padding-left:5%;font-size:16px;"></i>
											</a>
											</center>
											</td>
											<?php }else{}?>
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
										<tr style="font-size:13px;font-weight:bold;">
											<td colspan="4">
											<center style="padding-top:4%;"> - - - NOTHING FOLLOWS - - -
											</center>
											</td>
											
											<td>
											<p class="text-right">Total <br><?=$vat;?> Vat</p>
											
											<div></div>
											<p class="text-right">
											Net of VAT</p>
											</td>
											
											<td class="text-right" style="border-right:1px solid #24665B;"><p>
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
									<?php } ?>
										
								</table>
						</div><!-- col-lg-4 total -->
						
						<?php foreach ($DraftInfo as $row){ ?>	
						
						
						<?php 
						if ($max_limit == 3){}else{
						if($row->status == 'Approved'){ ?>
							<a class="btn btn-xs" style="border:1px solid #D90000;font-size:20px;font-weight:bold;float:right;color:#D90000;margin-right:1%;" title="Cancel Approved Purchase Request" data-toggle="modal" data-target="#">
							<i class="fa fa-undo" aria-hidden="true"></i><code style="background-color:#FFFFFF;color:#D90000;"> UNDO</code>
							</a>
						<?php }elseif($row->status == 'pending-ep'){ ?>
							<a class="btn btn-xs" style="border:1px solid #003428;font-size:20px;font-weight:bold;float:right;color:#003428;margin-right:1%;" title="Approved Purchase Request" data-toggle="modal" data-target="#<?php echo $row->prid;?>update1">
							<i class="glyphicon glyphicon-check" aria-hidden="true"></i><code style="background-color:#FFFFFF;color:#003428;">APPROVED</code>
							</a>
						<?php }else{ ?>
							<a class="btn btn-xs" style="border:1px solid #003428;font-size:20px;font-weight:bold;float:right;color:#003428;margin-right:1%;" title="Approved Purchase Request" data-toggle="modal" data-target="#<?php echo $row->prid;?>update">
							<i class="glyphicon glyphicon-check" aria-hidden="true"></i><code style="background-color:#FFFFFF;color:#003428;">APPROVED</code>
							</a>
						<?php }}?>
						
								<p style="font-size:12px;font-weight:bold;">NOTE :</p>
								<p style="font-size:10px;font-weight:bold;"><i class="glyphicon glyphicon-pencil" style="font-size:15px;"></i> - To edit quantity to be purchase</p>
								
								<?php if($prid_status == 'pending-ep'){ ?>
								<p style="font-size:10px;font-weight:bold;"><i class="glyphicon glyphicon-remove" style="color:#8C0000;font-size:15px;"></i> - To remove spare items</p>
								<?php }else{} ?>
										
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:1%;">
							<div style="width:100%;height:2px;background-color:#24665B;">
							</div>
						</div><!-- col-lg-4 -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:20px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Evaluation  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Evaluation">
							<?=$row->status;?>
							</button>
						</div><!-- col-lg-4 -->
						
						<?php if ($row->status == 'pending'){}else{ ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
							<h4 style="float:left;font-weight:bold;margin-top:4px;width:130px;">Responsible  </h4><button style="font-size:15px;border-radius:8px;float:left;" title="Responsible Person">
							<?php
							echo $row->person_responsible; ?>
							</button>
						</div><!-- col-lg-4 -->
						<?php } ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 spare-info spare-info1 spare-new-left-button" style="margin-top:5px;">
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
							<?php } ?>
					
          	</div> <!-- /end row -->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
     
	 
	 
	  <?php foreach ($DraftInfo as $row){?>			
			<div class="modal fade" id="<?php echo $row->prid;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">Approving Purchase Request ...</p>
						</div>
						<div class="modal-body" style="font-size:16px;color:#00271D;font-weight:bold;">
							<div class="row">
																
								<div class='col-md-12'>
								 <?php echo form_open("WMS/updatestatus");?>	
								 
								<input  type="hidden" value="<?php  echo $row->prid;?>" name="prid">
								<input  type="hidden" value="approved" name="status">
								<input  type="hidden" value="<?=$Enduser_Name;?>" name="responsible_person">
									<label	style="font-size:14px;font-weight:bold">
										Select Requisitioner :
									</label>
										  <select class="form-control" name="dceno"  style="font-size:13px;text-transform:capitalize;" required>  
												<?php foreach ($getEndUserEmployee as $row1){ ?>
												<option value="<?=$row1->dceno;?>"><?=$row1->lname.", ".$row1->fname." ".$row1->mname[0].". -  ".$row1->requisitioning_section;?></option>
												<?php } ?>
										</select>
										<br>
									<label	style="font-size:14px;font-weight:bold">
										Purpose :
									</label>
									
									<textarea class="form-control" name="remarks" placeholder="Text Here ..." rows="4" required></textarea>
										
								</div>
							</div> <!--end row-->
						</div>	
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","OK","class='btn btn-primary'");
									echo form_close();
							?>
						</div>
						
					
					</div>
				</div>
			</div>
<?php }?>


<?php foreach ($DraftInfo as $row){?>			
			<div class="modal fade" id="<?php echo $row->prid;?>update1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">Confirmation Message</p>
						</div>
						<div class="modal-body" style="font-size:16px;color:#00271D;font-weight:bold;">
							<div class="row">
																
								<div class='col-md-12'>
								 <?php echo form_open("WMS/updatestatus");?>	
								 
								<input  type="hidden" value="<?php  echo $row->prid;?>" name="prid">
								<input  type="hidden" value="approved-ep" name="status">
								<input  type="hidden" value="<?=$Enduser_Name;?>" name="responsible_person">
								<input  type="hidden" value="<?=$row->dceno;?>" name="dceno">
								<input  type="hidden" value="<?=$row->remark;?>" name="remarks">
									<label	style="font-size:14px;font-weight:bold">
										Approving Emergency Purchase Request ...
									</label>
										
								</div>
							</div> <!--end row-->
						</div>	
						<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","Continue","class='btn btn-primary'");
									echo form_close();
							?>
						</div>
						
					
					</div>
				</div>
			</div>
<?php }?>


	<?php foreach ($PurchaseInfo as $row){?>			
			<div class="modal fade" id="<?php echo $row->wsid;?>qty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">Edit Quantity</p>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/updateprqty");?>	
							<div class="row">
								<input  type="hidden" value="accept-confirm" name="sms">
								<input  type="hidden" value="<?php  echo $row->prid;?>" name="prid">
								<input  type="hidden" value="<?php  echo $row->wsid;?>" name="wsid">
								
						
								<div class='col-md-12'>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:14px;font-weight:bold;text-transform:capitalize;">
										<?=$row->category."- ".$row->spare_name;?>
										</label>
										<br></br>
									<label style="font-size:13px;font-weight:bold;">Qty Purchase</label>
										<input type="number" class="form-control"  name="qty" min="1" value="<?=$row->qty?>" required></input>
										<br>
									</div>
									
									</div>
								</div>
							</div> <!--end row-->
						
						
					</div>
				<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","UPDATE","class='btn btn-success'");
									echo form_close();
							?>
				</div>
				
			</div>
			</div>
			</div>
<?php }?>

<?php foreach ($PurchaseInfo as $row){?>			
			<div class="modal fade" id="<?php echo $row->wsid;?>delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:25%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">Confirmation Message</p>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
						    <?php echo form_open("WMS/deleteepitem");?>	
							<div class="row">
								<input  type="hidden" value="accept-confirm" name="sms">
								<input  type="hidden" value="<?php  echo $row->prid;?>" name="prid">
								<input  type="hidden" value="<?php  echo $row->wsid;?>" name="wsid">
								
						
								<div class='col-md-12'>
									<div style="margin-left:1%;margin-top:8px;margin-bottom:12px;">
										<div style="margin-left:1%;margin-top:8px;">
										<label style="font-size:14px;font-weight:bold;text-transform:capitalize;">
										<code><?=$row->category."- ".$row->spare_name;?></code>
										</label>
										<br></br>
									<label style="font-size:13px;font-weight:bold;">Are you sure to remove Items on Emergency Purchase ?</label>
										
									</div>
									
									</div>
								</div>
							</div> <!--end row-->
						
						
					</div>
				<div class="modal-footer">
							<?php //registration button
								
									echo form_submit("loginSubmit","Remove","class='btn btn-danger'");
									echo form_close();
							?>
				</div>
				
			</div>
			</div>
			</div>
<?php }?>

<div class="modal fade" id="emergencypurchase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:65%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <p class="modal-title" id="myModalLabel">ADDING SPARES ON AN EMERGENCY PURCHASE</p>
						</div>
						
						<div class="modal-body" style="font-size:12px;color:#00271D;">
							<div class="row" style="width:95;margin:0px auto;">
							<label	style="font-size:14px;font-weight:bold">
												** PLEASE SELECT SPARES ITEM TO PURCHASE
											</label>
						    	<form action="<?php echo base_url();?>WMS/sparesemergencypurchase" method="POST">
								<input  type="hidden" value="<?=$current_prid;?>" name="prid">
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
									<?php foreach ($Category as $row){ ?>
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
								
                            <!-- /.table-responsive -->
							</div> <!--end row-->
						
						
					</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary pull-right" value="PURCHASE">
				</div>
				
			</div>
			</div>
			</div>

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
		
		jQuery(function(){
    var max = <?=$max_limit;?>;
    var checkboxes = $('input[type="checkbox"]');

    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });
});
    </script>
  

  </body>
</html>
