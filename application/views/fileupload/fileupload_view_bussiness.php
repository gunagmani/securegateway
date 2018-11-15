

<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            File Upload <span style="font-size:25px;">(Free disk size available :   <?php echo byte_format($file_size, 2);   ?>) 
                        </h1>
						
						<!--
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol> 
					-->
									
		</div>
		
		
		
            <div id="page-inner">

		 <input type="hidden" id="path" name="path" value="<?php echo site_url('/fileupload/email_notify_ajax'); ?>">
		<!--  <input type="email" id="email" name="email"> -->
				<input type="hidden" value="<?php echo $file_size; ?>" id="total_vail_size">
		<input type="hidden" value="<?php echo $single_limit; ?>" id="single_file">
		 
		<!-- 
		<div class="input-field col s6">
          <input id="email" type="email" name="email" class="validate" data-parsley-type="email" data-parsley-required-message="Username is required">
          <label for="last_name">Notification Email</label>
        </div> -->
	<div id="securewrapper">
	<div class="row" id="upload_panel">
	<div class="col-md-2">
	<select id="department" class="form-control">
     <option value="N"> Department </option>
	
	<?php foreach($department_data as $department_value)
	{
	$id = $department_value->id;
	$department_name = $department_value->department_name;
	?>
	<option value="<?php echo $id; ?>"> <?php echo $department_name; ?></option>
	<?php } ?>
	</select>
	</div>
	
	<div class="col-md-2">
	<select id="service_type" class="form-control">
    <option value="N"> Service Type </option>
	</select>
	</div>

	<div class="col-md-2">
	<select id="frequency"  class="form-control">
	 <option value="0"> Frequency </option>
	<?php foreach($frequency as $frequency_value)
	{
	$id = $frequency_value->id;
	$frequency_name = $frequency_value->frequency_name;
	?>
	<option value="<?php echo $id; ?>"> <?php echo $frequency_name; ?></option>
	<?php } ?>
	</select>
	
	</div> 
	
	<!--<div class="col-md-2" id="adhoc_div" style="display:none;">
	<select id="adhoc" class="form-control" >
    <option value=""> Adhoc </option>
	<?php foreach($adhoc as $adhoc_value)
	{
	$id = $adhoc_value->id;
	$adhoc_name = $adhoc_value->folder_name;
	?>
	<option value="<?php echo $id; ?>"> <?php echo $adhoc_name; ?></option>
	<?php } ?>
	</select>
	</div>
	-->
	
	
	</div>
		   <div class="alert alert-danger alert-dismissable" id="pass_error" style="display: none;">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <strong>You Dont have enough disk space to do this.</strong>
        </div>
		
		
		   <div class="alert alert-danger alert-dismissable" id="pass_error1" style="display: none;">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <strong>You exceed the single file tranffer limit</strong>
        </div>
		 
                <div class="row">
                   
                    <form action="<?php echo site_url('/fileupload_bussiness/upload'); ?>" id="my-dropzone" class="dropzone">
					
					<input type="hidden" name="department_hidden" id="department_hidden" value="N">
					<input type="hidden" name="service_type_hidden" id="service_type_hidden" value="N">
					<input type="hidden" name="frequency_hidden" id="frequency_hidden" value="0">
					<input type="hidden" name="adhoc_hidden" id="adhoc_hidden" value="0">
					
					
					
					
</form>

                   <!--<button id="submit-all">Submit all files</button>-->
                	<br>
					<div class="col-md-offset-4 col-md-3">
					<button id="submit-all" class="waves-effect waves-light btn" style="width:200px; height:30px;margin-left:60px;"> Upload </button>
	<!--<button id="submit-all" class="waves-effect waves-light btn" style="width:200px; height:30px;margin-left:0px;display:none;" onClick="refreshPage()"> Finish </button> -->
                </div>
				</div>
			
		</div>
 			
				