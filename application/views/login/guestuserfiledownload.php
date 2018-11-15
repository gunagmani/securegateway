<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title></title>

  <!-- Stylesheets -->
  
  <link rel="stylesheet" href="<?php echo WEB_DIR;?>/assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo WEB_DIR;?>/assets/css/logincss.css">
  <link rel="stylesheet" href="<?php echo WEB_DIR;?>/assets/css/loginset.css">  

  <!--Google Fonts-->
  <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
<style>
	
#signinbox,#first{
	//position: absolute;
	//top: 0;	
}

#signupbox,#second{
	//position: absolute;
	display: none;
}
#login-content{
	color: #fff;
	align-items: center;
  position: absolute;
  top: 25%;
  left: 0;
  right: 0;
  margin-top: -22px;
}
#login-content h3{
	//font-family : Arial,loto,Serif !important;
}

#login-content h3,#login-content header,#login-content span{
	text-transform: uppercase;
	color: #fff;
}

 
 

</style>
  
</head>

<body>
<div id="main-wrapper">
		<?php //$this->load->view("homeincludes/homemenu") ?>
  <div class="container-fluid">
    <div class="row">
       <div class="col-md-6 left-side">
		<div id="login-content">
			<header>          
			  <h3>YOUR SPACE FOR <BR>SECURE FILE TRANSFER</h3>
			  <span>SIGNUP TODAY AND BE ASSURED OF SECURE DATA EXCHANGE!<br/>GETTING STARTED IS ONLY A FEW CLICKS AWAY</span>
			</header>
			<!--<button class="btn btn-default">Learn More</button><button class="btn btn-default">Learn More</button> -->
		</div>
      </div>
      <div class="col-md-6 right-side">
	 
        <div id="first">			
				<div class="section-title">
					<h1 class="text-center">Guest User File Download</h1>
					<div class="divider"></div>
				</div>	
				
			<div class="cta">
			<a onclick="JavaScript:Void(0);" class="waves-effect waves-light btn btn btn-download" href="<?php echo base_url('DashboardGuestUser/download'); ?>/<?php echo $this->session->userdata("file_id"); ?>" >Download</a> 
			<!-- <button class="waves-effect waves-light btn btn btn-download" >Download</button>   -->
											 
					  
			</div>
			
		</div>	
		
		
		
		
      </div>
	 
    </div>
  </div>

</div> <!-- end #main-wrapper -->

<!-- Scripts -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="<?php echo WEB_DIR;?>assets/js/jquery.min.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/loginscripts.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/loginclassie.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/parsley.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/customRegValid.js"></script>
<!-- <script src="<?php echo WEB_DIR;?>assets/js/bootbox.js"></script>  -->

<!--<script>

	$(".btn-download").click(function()
	{
		alert("maninalliappan");
		$.ajax({
			alert("maninalliappan");
			/*url:'<?php echo base_url('DashboardGuestUser/download'); ?>',
			 		 
			success:function(result)
			{
				
			}*/
	}); 
	
	});
</script>-->


</body>
</html>

		<?php //$this->load->view('homeincludes/footerjs'); ?>

