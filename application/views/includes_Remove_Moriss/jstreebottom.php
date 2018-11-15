



			<footer class="copy">
					<p><?php echo PAGE_FOOTER_TEXT; ?></p>
		   </footer>
           
		   </div>
            <!-- /. PAGE INNER  -->
        </div>
 </div>
 
 <
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <!-- <script src="<?php echo WEB_DIR;?>assets/js/jquery-1.10.2.js"></script>-->
	<script src="<?php echo WEB_DIR;?>assets/js/jquery-2.1.4.min.js"></script>


	
	 <script>
 $(document).ready(function() {
    $('.modal').on('hidden.bs.modal', function(){
       $('#dept_name').val(''); 
     });
});			
</script>
	
		<script>
	
	$("#dept_name").keyup(function(){
		 $('#error_fname').hide();
	});
	
	$(document).ready(function(){
    $('#folder_form').on('submit', function(e){
		 e.preventDefault();
		
		 $('#error_fname').hide();
		dep = $('#dept_name').val();
		 
		 	url = "<?php echo WEB_DIR; ?>/Foldercreation/department_exist";
		$.ajax({
					type: 'POST',
					url: url,
					data:'folder_name='+ dep,
					success: function(data) 
					{	
                    if(data==1)
						{
						$('#error_fname').show();
						return false;
					    }
						else if(data==2)
						{
						 $("#sub_fname").attr("disabled", true);
				         $("#sub_fname").val('Processing..');
				         $("#fname_close").hide();
					     $('#folder_form').unbind('submit').submit();	
	    				}
						
					}
					});

	

	});
});
	
	</script>
	
	
	
 
	
	
	<!-- Bootstrap Js -->
	<!-- <script src="<?php echo WEB_DIR;?>assets/js/datatable.js"></script> -->
    <script src="<?php echo WEB_DIR;?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo WEB_DIR;?>assets/materialize/js/materialize.min.js"></script>	
    <!-- Metis Menu Js -->
    <script src="<?php echo WEB_DIR;?>assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
   <!-- <script src="<?php echo WEB_DIR;?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo WEB_DIR;?>/assets/js/morris/morris.js"></script> 
	
	
	<script src="<?php echo WEB_DIR;?>/assets/js/easypiechart.js"></script>
	<script src="<?php echo WEB_DIR;?>/assets/js/easypiechart-data.js"></script>
	
	 <script src="<?php echo WEB_DIR;?>/assets/js/Lightweight-Chart/jquery.chart.js"></script> -->
	 <!--<script src="<?php echo WEB_DIR;?>assets/js/dataTables/jquery.dataTables.js"></script>-->
	 
	
	
	  
	 
	
  <!--  <script src="<?php echo WEB_DIR;?>assets/js/dropzone.js"></script>     
	<script src="<?php echo WEB_DIR;?>assets/js/mydropzone.js"></script> -->
 
  <!-- Custom Js -->
  <!--<script src="<?php echo WEB_DIR;?>assets/js/parsley.js"></script> -->
    <script src="<?php echo WEB_DIR;?>assets/js/custom-menu-scripts.js"></script> 
	
    <script src="<?php echo WEB_DIR;?>assets/jstree/jstree.min.js"></script>  
   <!-- <script src="<?php echo WEB_DIR;?>assets/jstree/customjstree.js"></script>  -->
    <script src="<?php echo WEB_DIR;?>assets/jstree/jstree-new.js"></script>  
    <script src="//oss.maxcdn.com/bootbox/4.2.0/bootbox.min.js"></script>
 

</body>

</html>