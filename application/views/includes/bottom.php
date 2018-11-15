



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
<script src="<?php echo WEB_DIR;?>assets/js/dataTables/dataTables.bootstrap.js"></script>
  	
	  
	 <script>
	 
	 $(document).ready(function() {
    $('#example').DataTable();
} );

	$(document).ready(function(){
$("#oldpass").blur(function(){

    	var oldpass= $("#oldpass").val();
	var newpass= $("#newpass").val();
	var repass= $("#newpass").val();
	if(oldpass!='')
	{

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
							$("#pass_error").show();
							 $('#change').prop("disabled",true);
							 $('#oldpass').addClass( "invalid" );
							 
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
	

	
    <script src="<?php echo WEB_DIR;?>assets/js/dropzone.js"></script>     
	<script src="<?php echo WEB_DIR;?>assets/js/mydropzone.js"></script> 
	  <script src="<?php echo WEB_DIR;?>assets/js/parsley.js"></script>
    <script src="<?php echo WEB_DIR;?>assets/js/custom-scripts.js"></script>  
 
  <!-- Custom Js -->

     
   
 
 

</body>

</html>