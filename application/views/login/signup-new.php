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
  
  <link rel="stylesheet" href="<?php echo WEB_DIR;?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo WEB_DIR;?>assets/css/logincss.css">
  <link rel="stylesheet" href="<?php echo WEB_DIR;?>assets/css/loginset.css">  
 

  <!--Google Fonts-->
  <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
<style>
	
#signinbox,#first{
	//position: absolute;
	//top: 0;	
	display: none;
}

#signupbox,#second{
	//position: absolute;
	
}

#free-block{
	
}
#other-block{
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
       <div class="section-title">
					<h1 class="text-center"> Guest User Registration</h1>
					<div class="divider"></div>
				</div>
		
	<label class="radio-inline"><input type="radio" name="optradio" value="guest">Guest User(For Download)</label><br />
<label class="radio-inline"><input type="radio" name="optradio" value="register">Register</label>
<div id="first">
<div class="cta">
<form data-parsley-validate id="signup_form" method="post" action="<?php echo WEB_DIR;?>DashboardGuestUser/guestuser">
        <input type="submit" class="btn btn-primary pull-left" id="reg_submit" value="Continue">	         
        </div>
		</form>
			
</div>
<div id="second">
			<div class="section-title">
					<h1 class="text-center">Registration</h1>
					<div class="divider"></div>
				</div>
				<div class="row">
		 <div class="col-md-6">

					<a href="<?php echo $this->googleplus->loginURL();?>"><img style="margin-top:8px;" src="<?php echo WEB_DIR;?>assets/sign_in_gp.jpg" width="300"></a></div>
					
					<div class="col-md-6"><a href="<?php echo $this->facebook->login_url();?>"><img src="<?php echo WEB_DIR;?>assets/sign_in_fb.png" width="300"> </a>	</div>  </div>  
			<form data-parsley-validate id="signup_form" method="post" action="<?php echo WEB_DIR;?>Securegateway/registration">
				<div id="free-block">
					
					<h4 id="account-type">Free Account</h4>
			<span class="input input--hoshi">
          <input id="fname" class="input__field input__field--hoshi" type="text" name="first_name" data-parsley-type="alphanum" data-parsley-required-message="Firstname is required"  required/>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="name">
            <span id="fname-span" class="input__label-content input__label-content--hoshi">First Name</span>
          </label>
        </span>      
		
		 <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="email"  name="email" id="email_reg" data-parsley-type="email" data-parsley-required-message="Email Required"  required/>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="email">
            <span class="input__label-content input__label-content--hoshi">Email</span>
          </label>
       

	   </span>
	   <div id="error_email" style="display: none;">
		<p style="color:red;"> Entered email is already exist </p>
	   </div>  
	   
	
		 <span class="input input--hoshi">
          <input id="phone1" class="input__field input__field--hoshi" type="text" name="phone" data-parsley-type="digits"/>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="phone1">
            <span class="input__label-content input__label-content--hoshi">Phone</span>
          </label>
        </span>
        	<span id="utype" class="input input--hoshi">
        
				
									<select id="user_type" name="user_type" class="input__field input__field--hoshi" >
										<!--<option value="0"></option>-->
										<option value="1">Free</option>
										<option value="2">Personal</option> 
										<option value="3">Business</option>
									</select>
		
		
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="usertype1">
            <span class="input__label-content input__label-content--hoshi">Subscribe</span>
          </label>
        </span>
		
			</div>   <!-- Free User Block   -->
		<div id="other-block">
		<span class="input input--hoshi">
          <input id="last_name" class="input__field input__field--hoshi" type="text"  name="last_name" data-parsley-required-message="Lastname is required" data-parsley-type="alphanum" />
		  
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="email">
            <span class="input__label-content input__label-content--hoshi" >Last Name</span>
          </label>
        </span>
		<span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="password" name="password" id="newpass" data-parsley-length="[6, 10]" />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password">
            <span class="input__label-content input__label-content--hoshi">Password</span>
          </label>
        </span>
		
		<div id="error_password1">
	   </div>
	   
        <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="password" name="password" id="re_password" data-parsley-equalto="#newpass" data-parsley-required-message="Retype the password" data-parsley-length="[6, 10]"   />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password1">
            <span class="input__label-content input__label-content--hoshi">Repeat Password</span>
          </label>
        </span>
			
		 
		
		<div id="business-field" style="display:none;">
		  <span class="input input--hoshi">
			  <input id="companyName" class="input__field input__field--hoshi" type="text" name="companyName"  />
			  <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="companyName">
				<span class="input__label-content input__label-content--hoshi">Company Name</span>
			  </label>
		  </span>
		</div>
		
		  
		
        
				</div>
				<div class="cta">
        <input type="submit" class="btn btn-primary pull-left" id="reg_submit" value="Register">	         
        </div>
		</form>
			
		

		<!-- Second Ends Here  -->
		
      </div>    <!-- Rightside End -->
	 
    </div>
  </div>
<div id="wait" class="loader"></div>
</div> <!-- end #main-wrapper -->

<!-- Scripts -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
 <script src="<?php echo WEB_DIR;?>assets/js/jquery.min.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/loginscripts.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/loginclassie.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/parsley.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/customRegValid.js"></script>
<!-- <script src="<?php echo WEB_DIR;?>assets/js/bootbox.js"></script>  -->
<script>

$(function () {
    $('#second').hide();
  

    $("input[name=optradio]:radio").click(function () {
        if ($('input[name=optradio]:checked').val() == "guest") {
            $('#second').hide();
         
 $('#first').show();
        } else if ($('input[name=optradio]:checked').val() == "register") {
            $('#second').show();
           $('#first').hide();

        }
    });
});
</script>

<script>
	


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
	$(document).ready(function(){
$("#email_reg").blur(function(){
    	var email_reg = $("#email_reg").val();
		
	if(email_reg!='')
	{

	url = "<?php echo WEB_DIR; ?>/Securegateway/email_check";
		$.ajax({
					type: 'POST',
					url: url,
					data:'email_reg='+ email_reg,
					success: function(data) 
					{	
                    if(data==2)
						{
							$('#reg_submit').prop("disabled",false);
							 
							// $('#change').css('background-color','#26a69a');
							 //$("#change").prop('value', 'Change');
							$("#error_email").hide();
							//$('#oldpass').removeClass( "invalid" );
							//alert("Not Exist");
											
					  }
						else if(data==1)
						{
							$("#error_email").show();
							 $('#reg_submit').prop("disabled",true);
							 //$('#oldpass').addClass( "invalid" );
							 //$('#change').css('background-color','red');
							 //$("#change").prop('value', 'Old Password Wrong');
							 //alert("Already Exist");
							
					}
					}
					});
	} 

	});
});
	
	</script>

	
	
	<script type="text/javascript">
$(document).ready(function() {  

$("#newpass").keyup(function(){	

var word = $("#newpass").val();
var num = word.match(/\d+/);
var letter = word.match(/[A-z]/);


   if(num != null)
   {
	   if(letter != null)
       { 
   
	   if(word.length >= 8) 
	   {
		   
	    if(word.length <= 12)
		{
         $("#error_password1").text("");
         $("#re_password").attr("readonly", false); 
		}
		 else
	   {
		 $("#error_password1").text("Maximum 10 Characters only.");  
         $("#re_password").attr("readonly", true);    
	   }
	   
	   }
	   else
	   {
		 $("#error_password1").text("Need minimum 8 Characters.");  
         $("#re_password").attr("readonly", true);    
	   }
     }

    else
   {  
   $("#error_password1").text("Atleast One Character needed.");  
   $("#re_password").attr("readonly", true);     
   }
 
   }
   else
   {  
   $("#error_password1").text("Atleast One Number needed.");  
   $("#re_password").attr("readonly", true);     
   }
 
  
});
});
</script>

	 <script>
  $(document).ajaxStart(function () 
  { 
   $("#wait").show();
}).ajaxStop(function () {
    $("#wait").hide();
	
});

   </script>	
	

<script>
	//$("#success").fadeOut(3000);
</script> 



</body>
</html>

		<?php //$this->load->view('homeincludes/footerjs'); ?>