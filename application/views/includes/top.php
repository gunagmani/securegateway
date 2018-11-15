<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Securegateway</title> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			
	<link rel="stylesheet" href="<?php echo WEB_DIR;?>assets/materialize/css/materialize.min.css" media="screen,projection" />
	
    <!-- Bootstrap Styles-->	
    <link href="<?php echo WEB_DIR;?>assets/css/bootstrap.css" rel="stylesheet" />
    
	 
	<!--   **********LESS Bootstrap************ -->
	<!--<link href="<?php echo WEB_DIR;?>assets/css/securebootstrap123.css" rel='stylesheet' type='text/css' />	-->
	
    <!-- FontAwesome Styles-->
    <link href="<?php echo WEB_DIR;?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
   <!-- <link href="<?php echo WEB_DIR;?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" /> -->
    <!-- Custom Styles-->
  <!--  <link href="<?php echo WEB_DIR;?>assets/css/custom-styles1.css" rel="stylesheet" />-->
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo WEB_DIR;?>assets/js/Lightweight-Chart/cssCharts.css"> 
	
	<!--Secure Common Styles-->
    <link href="<?php echo WEB_DIR;?>assets/css/securecommon.css" rel="stylesheet" />
	<!--SecureCustom Styles-->
	<!-- <link href="<?php echo WEB_DIR;?>assets/css/secure-custom.css" rel="stylesheet" /> -->
    <link href="<?php echo WEB_DIR;?>assets/css/dropzone.css" rel="stylesheet" />
  
<!--<link href="<?php echo WEB_DIR;?>assets/css/datatable.css" rel="stylesheet" /> -->
<link href="<?php echo WEB_DIR;?>assets/css/custom-datatable.css" rel="stylesheet" />
  

<!-- <link href="<?php echo WEB_DIR;?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />    -->
<!-- Smartsupp Live Chat script -->



<?php  if($this->session->userdata("account_id")==3) { ?>

<script type="text/javascript">

var _smartsupp = _smartsupp || {};
_smartsupp.key = '1f89d81180e6bb509cdb57d6ffddd8d14288129c';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>

<?php } ?>	

</head>

<body>
    <div id="wrapper">
	