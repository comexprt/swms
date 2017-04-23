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

	  <div id="login-page">
	  	<div class="container">
						
			    <?php
					echo form_open("","class='form-login'");
				?>
		        <h2 class="form-login-heading">Spares<br>Warehouse Management System</h2>
		        <div class="login-wrap">
				<a href="<?php echo base_url();?>" style="font-size:10px;color:blue;text-decoration:underline;">back to Home</a><br><br>
					Page not found !!  <br></br>
					The given page was not found. The reason was: The URL wasn't found in the module. 
					<div style="color:#000000;font-weight:bold;margin-top:10px;font-size:10px;">
					<p>please contact an administrator<br>email:johnnoah.ompad@gmail.com</p>
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
