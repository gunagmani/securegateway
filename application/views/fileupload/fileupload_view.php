
<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            File Upload <span style="font-size:25px;">(Free disk size available :  <?php echo byte_format($file_size,4);   ?>) 
							</span>
                        </h1>
						
						<!--
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol> 
					-->
									
		</div>
		
		<input type="hidden" value="<?php echo $file_size; ?>" id="total_vail_size">
		<input type="hidden" value="<?php echo $single_limit; ?>" id="single_file">
		
		
            <div id="page-inner">

		 <input type="hidden" id="path" name="path" value="<?php echo site_url('/fileupload/email_notify_ajax'); ?>">
		<!--  <input type="email" id="email" name="email"> -->
		 
		<!-- 
		<div class="input-field col s6">
          <input id="email" type="email" name="email" class="validate" data-parsley-type="email" data-parsley-required-message="Username is required">
          <label for="last_name">Notification Email</label>
        </div> -->
		 
		
		   <div class="alert alert-danger alert-dismissable" id="pass_error" style="display: none;">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <strong>You Dont have enough disk space to do this.</strong>
        </div>
		
		
		   <div class="alert alert-danger alert-dismissable" id="pass_error1" style="display: none;">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <strong>You exceed the single file tranffer limit</strong>
        </div>
                <div class="row" id="securewrapper">
                   
                    <form action="<?php echo site_url('/fileupload/upload'); ?>" id="my-dropzone" class="dropzone">
					
</form>

                   <!--<button id="submit-all">Submit all files</button>-->
                	<br>
					<div class="col-md-offset-4 col-md-3">
					<button id="submit-all" class="waves-effect waves-light btn" style="width:200px; height:30px;margin-left:60px;"> Upload </button>
	<!--<button id="submit-all" class="waves-effect waves-light btn" style="width:200px; height:30px;margin-left:0px;display:none;" onClick="refreshPage()"> Finish </button> -->
                </div>
				</div>
			
		
 			
				