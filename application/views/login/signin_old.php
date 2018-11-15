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
       <div class="col-md-7 left-side">
		<div id="login-content">
			<header>          
			  <h3>Your Space for<br>Secure File Transfer</h3>
			  <span>Blast off today and join the fun!<br/>Getting started is only a few clicks away</span>
			</header>
			<!--<button class="btn btn-default">Learn More</button><button class="btn btn-default">Learn More</button> -->
		</div>
      </div>
      <div class="col-md-5 right-side">
	  <div id="success"><?php echo $this->messages->getMessageFront(); ?></div>
        <div id="first">			
				<div class="section-title">
					<h1 class="text-center">Login</h1>
					<div class="divider"></div>
				</div>	
				<form data-parsley-validate  method="post" action="<?php echo WEB_DIR;?>Securegateway/login/">
			<div class="input input--hoshi">
			  <input class="input__field input__field--hoshi" type="text" id="email" name="email" ata-parsley-type="email" data-parsley-required-message="Username is required" required />
			  <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="email">
				<span class="input__label-content input__label-content--hoshi">E-mail</span>
			  </label>
			</div>
			<span class="input input--hoshi">
			  <input class="input__field input__field--hoshi" type="password" name="pwd" id="password" required />
			  <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password">
				<span class="input__label-content input__label-content--hoshi">Password</span>
			  </label>
			</span>
		   
			<div class="cta">
			<input type="submit" class="btn btn-primary pull-left" value="Sign-In">
					  
			</div>
			</form>
				<div class="clearfix"></div>
				<!--<p id="one"><a href="#">Forgot Password ?</a></p>-->
				<p id="two">Don't have account? <a class="signup" href="#" id="signup">Sign up here</a></p>
		</div>	
		
		<div id="second">
			<div class="section-title">
					<h1 class="text-center">Registration</h1>
					<div class="divider"></div>
				</div>
				<form data-parsley-validate  method="post" action="<?php echo WEB_DIR;?>Securegateway/registration">
			<span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="text" id="name" name="first_name" data-parsley-required-message="Firstname is required" required />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="name">
            <span class="input__label-content input__label-content--hoshi">First Name</span>
          </label>
        </span>
		
        <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="text"  name="last_name" data-parsley-required-message="Lastname is required" required />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="email">
            <span class="input__label-content input__label-content--hoshi">Last Name</span>
          </label>
        </span>
		
			 <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="text"  name="email" data-parsley-required-message="Email Required" required />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="email">
            <span class="input__label-content input__label-content--hoshi">Email</span>
          </label>
        </span>
		
		
        <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="password" name="password" id="newpass" required />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password">
            <span class="input__label-content input__label-content--hoshi">Password</span>
          </label>
        </span>
        <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="password" name="password" id="re_password" data-parsley-equalto="#newpass" data-parsley-required-message="Retype the password" required />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password1">
            <span class="input__label-content input__label-content--hoshi">Repeat Passowrd</span>
          </label>
        </span>
		  <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="text" name="phone" required />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password1">
            <span class="input__label-content input__label-content--hoshi">Phone</span>
          </label>
        </span>
		
		  <span class="input input--hoshi">
        
				
									<select name="user_type" class="input__field input__field--hoshi" required>
									<option value="">User Type</option>
									<option value="1">Free</option>
									<option value="2">Personal</option>
									<option value="3">Bussiness</option>
									</select>
		
		
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password1">
            <span class="input__label-content input__label-content--hoshi"></span>
          </label>
        </span>
        <div class="cta">
        <input type="submit" class="btn btn-primary pull-left"  value="Register">	         
        </div>
		</form>
		<div class="clearfix"></div>
		<p id="two">Already have an account? <a class="signin" href="#" 
		id="signin">Sign in</a></p>
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
<!-- <script src="<?php echo WEB_DIR;?>assets/js/bootbox.js"></script>  -->

<script>
	
	$(document).ready(function(){
				// On Click SignUp It Will Hide Login Form and Display Registration Form
				//bootbox.alert("clicked...");
		$("#signup").click(function() {
			console.log("Sign up Clicked..");
		$("#first").slideUp("slow", function() {
			$("#second").slideDown("slow");
		});
		});
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

<script>
$("#success").fadeOut(3000);
</script> 



</body>
</html>

		<?php //$this->load->view('homeincludes/footerjs'); ?>

