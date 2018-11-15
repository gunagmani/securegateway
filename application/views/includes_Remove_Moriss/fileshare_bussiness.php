



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
		$(document).ready(function(){
$("#department").change(function(){

    	var department_upload= $("#department").val();

	if(department_upload!='')
	{
		

	url = "<?php echo WEB_DIR; ?>/Fileupload_bussiness/load_service_type";
		$.ajax({
					type: 'POST',
					url: url,
					data:'department_id='+ department_upload,
					success: function(data) 
					{	
                    $('#service_type').html(data);
					
					$('#department_hidden').val(department_upload);
					//$('#service_type_hidden').val('');
					}
					});
	}

	}); 
	
	
	$("#service_type").change(function(){
		var service_upload= $("#service_type").val();
		$('#service_type_hidden').val(service_upload);
    }); 
	
		$("#frequency").change(function(){
			
		var frequency_upload= $("#frequency").val();
		if(frequency_upload==6)
		{
		 $("#adhoc_div").show();
		}
		else
		{
		$("#adhoc_div").hide();	
		}
		$('#frequency_hidden').val(frequency_upload);
    
	
	}); 
	
		
		/*
		$("#adhoc").change(function(){
		var adhoc_upload= $("#adhoc").val();
		$('#adhoc_hidden').val(adhoc_upload);
    }); 
	*/
	
	});
	</script>
	
	
	
	
	
	<!-- Bootstrap Js -->
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
	
   
   
	
	  
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo WEB_DIR;?>assets/js/dropzone.js"></script>     
	<script src="<?php echo WEB_DIR;?>assets/js/mydropzone_bussiness.js"></script>  
 
 <!-- Custom Js -->
    <script src="<?php echo WEB_DIR;?>/assets/js/custom-menu-scripts.js"></script>  
    <script src="<?php echo WEB_DIR;?>/assets/js/parsley.js"></script> 
 
 

</body>

</html>