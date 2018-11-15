



			<footer class="copy">
					<p><?php echo PAGE_FOOTER_TEXT; ?></p>
		   </footer>
           
		   </div>
            <!-- /. PAGE INNER  -->
        </div>
 </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <!-- <script src="<?php echo WEB_DIR;?>assets/js/jquery-1.10.2.js"></script>-->
	<script src="<?php echo WEB_DIR;?>/assets/js/jquery-2.1.4.min.js"></script>	
		
		<script>
	
	
	$(document).ready(function() {
    $('#example').DataTable();
} );
	
	
	$(document).on("click", ".open-user_renewal_model", function () 
	{

     var renewal_id = $(this).data('id');
     $(".modal-body #ren_id").val( renewal_id );
	 //$('#email_div').html('');	
     //$("#tags").tagsinput('removeAll');
    });

	
	
	
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

$("#password_user").keyup(function(){	

var word = $("#password_user").val();
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
         $("#sub_reg").attr("disabled", false); 
		
		}
		 else
	   {
		 $("#error_password1").text("Maximum 10 Characters only.");  
         $("#sub_reg").attr("disabled", true);  
	   }
	   
	   }
	   else
	   {
		 $("#error_password1").text("Need minimum 8 Characters.");  
        $("#sub_reg").attr("disabled", true);  
	   }
     }

    else
   {  
   $("#error_password1").text("Atleast One Character needed.");  
  $("#sub_reg").attr("disabled", true);       
   }
 
   }
   else
   {  
   $("#error_password1").text("Atleast One Number needed.");  
   $("#sub_reg").attr("readonly", true);     
   }
 
  
});
});
</script>
	
	<!-- Bootstrap Js -->
    <script src="<?php echo WEB_DIR;?>assets/js/bootstrap.min.js"></script>
	
    <script src="<?php echo WEB_DIR;?>assets/materialize/js/materialize.min.js"></script>	
    <!-- Metis Menu Js -->
    <script src="<?php echo WEB_DIR;?>assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
  <script src="<?php echo WEB_DIR;?>/assets/js/morris/raphael-2.1.0.min.js"></script>
  <!--  <script src="<?php echo WEB_DIR;?>/assets/js/morris/morris.js"></script> -->
	
     
   
	
	

	  
	 <script>
	 /*
	$(document).ready(function(){
$("#department_upload").change(function(){

    	var department_upload= $("#department_upload").val();
	
	if(department_upload!='')
	{

	url = "<?php echo WEB_DIR; ?>/user/load_service_type";
		$.ajax({
					type: 'POST',
					url: url,
					data:'department_id='+ department_upload,
					success: function(data) 
					{	
                    $('#service_type_upload').html(data);
					
					}
					});
	}

	});
	
	
	
	
	$("#department_download").change(function(){

    	var department_upload= $("#department_upload").val();
	
	if(department_upload!='')
	{

	url = "<?php echo WEB_DIR; ?>/user/load_service_type";
		$.ajax({
					type: 'POST',
					url: url,
					data:'department_id='+ department_upload,
					success: function(data) 
					{	
                    $('#service_type_download').html(data);
					
					}
					});
	}

	});
	
	
	
	
});
	
	
	

		
	
	*/
	
	
	</script>
	
  
<!-- Custom Js -->

	  <script src="<?php echo WEB_DIR;?>assets/js/parsley.js"></script>
	 <script src="<?php echo WEB_DIR;?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo WEB_DIR;?>assets/js/custom-menu-scripts.js"></script>  
 
 

</body>

</html>