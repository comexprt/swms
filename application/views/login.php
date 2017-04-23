<!DOCTYPE html>
<html lang="en" >
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
	<center style="margin-top:25%;">
	<div class="login-form"  style="background-color:rgba(0,0,0, 0.3) ;padding-bottom:1%;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="login-form-header">
						<h1 style="font-size:40px;font-weight:bold;color:#FFFFFF;text-shadow:2px 2px 2px #000000;">SPARES WAREHOUSE MANAGEMENT SYSTEM</h1>
					</div>
				</div>
			</div>
			<div class="row">
				 <center><h3 style="font-size:13px;margin-top:-5px;color:#FF7373;">
							<?php 
							
								if (validation_errors()==false)
								{echo " ";
								}else {
								echo validation_errors();
								} ?>
							</h3></center>
				  
					<button class="btn btn-md btn-default" data-toggle="modal" data-target="#newUser" style="color:#003428;font-size:14px;font-weight:bold;">LOGIN</button>
				
			</div>
		</div>
	</div>
	</center>
	
				<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<center><h5 class="modal-title" id="myModalLabel">LOGIN</h5><center>
							</div>
							<?php
								echo form_open("WMS/verifyloginEmployee");
							?>
							
							<div class="modal-body" style="font-size:12px;color:#00271D;">
							
		             
								<input type="hidden" name="login" value="login">
								<input type="text" name="Username"class="form-control" placeholder="Username" autofocus required>
								<br>
								<input type="password" name="Password" class="form-control" placeholder="Password" required>
								
								 
							</div>
							
							<div class="modal-footer">
								 <?php 
									 echo form_submit("loginSubmit","LOGIN","class ='btn btn-theme'"); 
									 echo form_close(); 
								 ?>
							</div>
						</div>
					</div>
				</div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>_assets/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>_assets/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url();?>_assets/assets/js/jquery.backstretch.min.js"></script>
    <script>
	     $.backstretch([
		  "<?php echo base_url();?>_assets/assets/img/npc/b.png",
		  "<?php echo base_url();?>_assets/assets/img/npc/a.png",
		  "<?php echo base_url();?>_assets/assets/img/npc/d.png",
		  "<?php echo base_url();?>_assets/assets/img/npc/c.png"
		  ], {
        fade: 750,
        duration: 4000,
		speed: 150
    });
    </script>


  </body>
</html>
