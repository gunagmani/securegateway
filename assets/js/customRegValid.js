function paidAccountDisp(vv)
	{
		
		if(vv==1){
			$("#last_name").removeAttr("required");
			$("#newpass").removeAttr("required");
			$("#re_password").removeAttr("required");
			$("#phone1").removeAttr("required");
			$("#companyName").removeAttr("required");
			
		}
		else if(vv==2){
			$("#last_name").attr("required","required");
			$("#newpass").attr("required","required");
			$("#re_password").attr("required","required");
			$("#phone1").attr("required","required");
			$("#companyName").removeAttr("required");
		}
		else if(vv==3){
			$("#last_name").attr("required","required");
			$("#newpass").attr("required","required");
			$("#re_password").attr("required","required");
			$("#phone1").attr("required","required");
			$("#companyName").attr("required","required");
		}
	}
	
	
	
	$(document).ready(function(){
		
				// On Click SignUp It Will Hide Login Form and Display Registration Form
				//bootbox.alert("clicked...");
		$("#signup").click(function() {
			
			  $('#messages').hide();
			  $('#error_email').html('');
			 $('#signup_form')[0].reset();
			   
			  $("#user_type").prop("selectedIndex", 0);
			  	$('#user_type').trigger('change');
			console.log("Sign up Clicked..");
		$("#first").slideUp("slow", function() {
			$("#second").slideDown("slow");
		});
		});
		// On Click SignIn It Will Hide Registration Form and Display Login Form
		$("#signin").click(function() {
			
			 $('#messages').hide();
			  $('#signin_form')[0].reset();
               
			   $("#user_type").prop("selectedIndex", 0);
				$('#user_type').trigger('change');
				paidAccountDisp(user_type);
			console.log("Sign in Clicked..");
		$("#second").slideUp("slow", function() {
			$("#first").slideDown("slow");
		});
		});	
		
		
		// Reg Block Selection
		$('#user_type').bind('change', function (e) { 
		
		
        if( $('#user_type').val() == 0 )  {
			 $('#messages').hide();
			
			//console.log("Val:"+$('#user_type').val());
			$("#account-type").text("Free Subscription");	
			
          $('#other-block').hide();
    	  $("#other-block").css({ display: "none" });  
		  
		  $("#utype").removeClass("input--filled");
		    	  //$('#decision').hide();
		  
		  
		  paidAccountDisp(1);
        }
		else if( $('#user_type').val() == 1)  {
			//console.log("Val:"+$('#user_type').val());
		$("#account-type").text("Free Subscription");
		
          $('#other-block').hide();
    	  $("#other-block").css({ display: "none" });
		  $("#utype").addClass("input--filled");	  
		  
    	  //$('#decision').hide();
		  paidAccountDisp(1);
		  
        }
		else if( $('#user_type').val() == 2 ) {
			//console.log("Val:"+$('#user_type').val());
		  $("#account-type").text("Paid Subscription");	
			
          $('#other-block').show();
    	  $("#other-block").css({ display: "block" });
		  $('#business-field').hide();
    	  $("#business-field").css({ display: "none" });
		  
    	  $("#utype").addClass("input--filled");
		  
		  paidAccountDisp(2);
        }       
		else if( $('#user_type').val() == 3 ) {
			//console.log("Val:"+$('#user_type').val());
		$("#account-type").text("Paid Subscription");
		
          $('#other-block').show();
    	  $("#other-block").css({ display: "block" });
		  
		  $('#business-field').show();
    	  $("#business-field").css({ display: "block" });
		  
    	  $("#utype").addClass("input--filled");
		  paidAccountDisp(3);
        } 		
		}).trigger('change');
	});