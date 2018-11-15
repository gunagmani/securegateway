



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
	<script src="<?php echo WEB_DIR;?>assets/js/jquery-2.1.4.min.js"></script>




	
	<!-- Bootstrap Js -->
	<script src="<?php echo WEB_DIR;?>assets/js/datatable.js"></script>
    <script src="<?php echo WEB_DIR;?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo WEB_DIR;?>assets/materialize/js/materialize.min.js"></script>	
    <!-- Metis Menu Js -->
    <script src="<?php echo WEB_DIR;?>assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
 
 <!--   <script src="<?php echo WEB_DIR;?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo WEB_DIR;?>/assets/js/morris/morris.js"></script>
	
	
	<script src="<?php echo WEB_DIR;?>/assets/js/easypiechart.js"></script>
	<script src="<?php echo WEB_DIR;?>/assets/js/easypiechart-data.js"></script>
	
	 <script src="<?php echo WEB_DIR;?>/assets/js/Lightweight-Chart/jquery.chart.js"></script> -->
	 
	 <script src="<?php echo WEB_DIR;?>assets/js/dataTables/jquery.dataTables.js"></script>
	
  
	<script>
		$(document).ready(function(){
			$('#c_name').val('');
			 $("#c_name").attr('maxlength','14');
			 
$('#c_name').keypress(function(e) {   
$('#error_cname').html(''); 
    if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
        return false;
});
 });
 
 
 $(document).ready(function() {
    $('.modal').on('hidden.bs.modal', function(){
       $('#error_cname').html(''); 
     });
});
	
	</script>
	
	
	  
	 <script>
	 
	 $(document).ready(function() {
    $('#example').DataTable();

$('#myModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})	
} );



	$(document).ready(function(){
$("#oldpass").keyup(function(){

    	var oldpass= $("#oldpass").val();
	var newpass= $("#newpass").val();
	var repass= $("#newpass").val();
	if(oldpass!='')
	{
		$("#pass_error").hide();
		$("#pass_error1").hide();

	url = "<?php echo WEB_DIR; ?>/dashboard/changepass";
		$.ajax({
					type: 'POST',
					url: url,
					data:'old_pass='+ oldpass,
					success: function(data) 
					{	
                    if(data==1)
						{
							$('#change').prop("disabled",false);
							 
							 $('#change').css('background-color','#26a69a');
							 $("#change").prop('value', 'Change');
							$("#pass_error").hide();
							$('#oldpass').removeClass( "invalid" );
											
					  }
						else if(data==2)
						{
							
							
							
							$('#change').prop("disabled",true);
							$("#pass_error").show();
							 
							 $('#oldpass').addClass( "invalid" );
							 
							 //$('#change').css('background-color','red');
							 //$("#change").prop('value', 'Old Password Wrong');
							 //alert("old password is Incorrect");
							
					}
						
					}
					});
	}
	else
	{
		$("#pass_error").hide();
	}

	});
});
	
	</script>
	
	<script>
	
	
	
	
	$(document).ready(function(){
    $('#form_comapny').on('submit', function(e){
		 e.preventDefault();
		c_name = $('#c_name').val();
		cname = $('#c_name').val().length;
		
		if (c_name != "") 
		{
    if ( /[^A-Za-z\d]/.test(c_name)) 
	{
        alert("Symbols are not allowed");
  return false;
    }
	else
	{
			if(cname<=4)
		{

		var res = "<p style='color:red';>Company name should be more then 4 characters</p>";
						$('#error_cname').html(res);
		}
		else
		{
			 $("#sub_cname").attr("disabled", true);
				 $("#sub_cname").val('Processing..');
				 $("#cname_close").hide();
					$('#form_comapny').unbind('submit').submit();
		}
	}
    }
		
		
		
	
		
   
	});
	});
	</script>
	
 <script>
	 
	$(document).ready(function(){
$("#newpass").blur(function(){

    	
	var newpass= $("#newpass").val();
	
	if(oldpass!='')
	{
		
		$("#pass_error1").hide();

	url = "<?php echo WEB_DIR; ?>/dashboard/changepass";
		$.ajax({
					type: 'POST',
					url: url,
					data:'old_pass='+ newpass,
					success: function(data) 
					{	
                    if(data==2)
						{
	 $("#error_password1").text(""); 
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
							
							$('#change').prop("disabled",false);
							 $('#change').css('background-color','#26a69a');
							 $("#change").prop('value', 'Change');
							$("#pass_error1").hide();
							$('#newpass').removeClass( "invalid" );
							$('#oldpass').trigger('keyup');
											}
											 else
										   {
											 $("#error_password1").text("New Password : Maximum 10 Characters only.");  
											 $("#change").attr("disabled", true);    
										   }
										   
										   }
										   else
										   {
											 $("#error_password1").text("New Password : Need minimum 8 Characters.");  
											 $("#change").attr("disabled", true);    
										   }
										 }

										else
									   {  
									   $("#error_password1").text("New Password : Atleast One Character needed.");  
									   $("#change").attr("disabled", true);     
									   }
									 
									   }
									   else
									   {  
									   $("#error_password1").text("New Password : Atleast One Number needed.");  
									   $("#change").attr("disabled", true);     
									   }
							

							
							
							
								
					  }
						else if(data==1)
						{

					


							$("#pass_error1").show();
							 $('#change').prop("disabled",true);
							 $('#newpass').addClass( "invalid" );
							 
							 //$('#change').css('background-color','red');
							 //$("#change").prop('value', 'Old Password Wrong');
							 //alert("old password is Incorrect");
							
					}
						
					}
					});
	}

	});
});
	
	</script>	

	
	  <script src="<?php echo WEB_DIR;?>assets/js/parsley.js"></script>
    <script src="<?php echo WEB_DIR;?>assets/js/custom-scripts.js"></script>  
 
  <!-- Custom Js -->

     
   
 
 

</body>

</html>