<?php
$pageTitle="Sign-in";
?>

<?php //$this->load->view('includes/top'); ?>

<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title></title>

  <!-- Stylesheets -->
  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/logincss.css">
  <link rel="stylesheet" href="assets/css/loginset.css">  

  <!--Google Fonts-->
  <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
<style>
	/* WIDGETS */
/* SHORTCODES */
/* WRAPPER */
.left-side {
  position: relative;
  min-height: 100vh;
  text-align: center;
  //background: #000 url('assets/images/loginbg.jpg') no-repeat center !important;
  background: #000 url('assets/images/login-bg-1920x820.jpg') no-repeat center !important;
  background-size: cover;
}
.left-side header {
  position: relative;
  margin-top: 80px;
}
.left-side header span {
  margin-bottom: 6px;
  display: block;
  font-family: 'lato', sans-serif;
  text-transform: uppercase;
  font-size: 13px;
  color: #A0292F;
  letter-spacing: 0.12em;
}
.left-side header h3 {
  margin: 0;
  font-family: 'Playfair Display', serif;
  font-size: 54px;
  font-weight: 400;
  line-height: 72px;
  letter-spacing: 0.01em;
  color: #A0292F;
}
.right-side {
  position: relative;
  //padding: 120px 120px 100px 120px;
  padding: 60px 80px;
  height: 100vh;
  background: #fff;
}
.right-side .input {
  margin-top: 0;
  margin-left: 0;
}
.right-side .input input {
  font-size: 14px;
}
.right-side .cta {
  margin-top: 20px;
}
.right-side .cta .btn {
  //padding: 13px 25px;
  border: none;
  color: #fff;
  display: inline-block;
  background: #A0292F;
  font-family: 'lato', sans-serif;
  text-transform: uppercase;
  font-size: 13px;
  letter-spacing: 0.12em;
  //border-radius: 24px;
}
.right-side .cta .btn:hover {
  -webkit-transition: 0.2s ease-in;
  -o-transition: 0.2s ease-in;
  transition: 0.2s ease-in;
  background: rgba(255,255,255,0);
  border: 1px solid #A0292F;
  color: #A0292F;
}
.right-side .cta span {
  margin-top: 10px;
  margin-left: 2px;
  display: inline-block;
}
.right-side .cta span a {
  font-family: 'lato', sans-serif;
  text-transform: uppercase;
  font-size: 13px;
  color: #999;
  letter-spacing: 0.1em;
}
.right-side .cta span a:hover {
	color: #A0292F;	
}

.right-side .social {
  position: absolute;
  padding: 0;
  bottom: 30px;
  right: 120px;
}
.right-side .social li {
  margin-left: 8px;
  display: inline-block;
}
.right-side .social li:last-child:after {
  display: none;
}
.right-side .social li:after {
  padding-left: 10px;
  content: "-";
  color: #A0292F;
}
.right-side .social li a {
  font-family: 'lato', sans-serif;
  text-transform: uppercase;
  font-size: 13px;
  color: #999;
  letter-spacing: 0.1em;
}

#signinbox,#first{
	//position: absolute;
	//top: 50% !important;	
	
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
       <div class="col-md-8 left-side">
		<div id="login-content">
			<header>          
			  <h3>Your Space for<br>Secure File Transfer</h3>
			  <span>Blast off today and join the fun!<br/>Getting started is only a few clicks away</span>
			</header>
			<!--<button class="btn btn-default">Learn More</button><button class="btn btn-default">Learn More</button> -->
		</div>
      </div>
      <div class="col-md-4 right-side">
        <div id="first">			
				<div class="section-title">
					<h1 class="text-center">One Time Password</h1>
					<div class="divider"></div>
				</div>	
		<!--	<div class="input input--hoshi">
			  <input class="input__field input__field--hoshi" type="text" id="email" />
			  <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="email">
				<span class="input__label-content input__label-content--hoshi">E-mail</span>
			  </label>
			</div>  -->
			<span class="input input--hoshi">
			  <input class="input__field input__field--hoshi" type="password" id="password" />
			  <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password">
				<span class="input__label-content input__label-content--hoshi">Password</span>
			  </label>
			</span>
		   
			<div class="cta">
			  <button class="btn btn-primary pull-left">
				Submit
			  </button>			  
			</div>
				<div class="clearfix"></div>
				
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
<script>
	
	$(document).ready(function(){
				// On Click SignUp It Will Hide Login Form and Display Registration Form
		$("#first").slideDown("slow");
		
		/*$("#signup").click(function() {
			console.log("Sign up Clicked..");
		$("#first").slideUp("slow", function() {
			$("#second").slideDown("slow");
		});
		});  */
		// On Click SignIn It Will Hide Registration Form and Display Login Form
		$("#signin").click(function() {
			console.log("Sign in Clicked..");
		$("#second").slideUp("slow", function() {
			$("#first").slideDown("slow");
		});
		});	
	});


  (function() {
    // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
    if (!String.prototype.trim) {
      (function() {
        // Make sure we trim BOM and NBSP
        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
        String.prototype.trim = function() {
          return this.replace(rtrim, '');
        };
      })();
    }

    [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
      // in case the input is already filled..
      if( inputEl.value.trim() !== '' ) {
        classie.add( inputEl.parentNode, 'input--filled' );
      }

      // events:
      inputEl.addEventListener( 'focus', onInputFocus );
      inputEl.addEventListener( 'blur', onInputBlur );
    } );

    function onInputFocus( ev ) {
      classie.add( ev.target.parentNode, 'input--filled' );
    }

    function onInputBlur( ev ) {
      if( ev.target.value.trim() === '' ) {
        classie.remove( ev.target.parentNode, 'input--filled' );
      }
    }
  })();
</script>

</body>
</html>

		<?php //$this->load->view('homeincludes/footerjs'); ?>

