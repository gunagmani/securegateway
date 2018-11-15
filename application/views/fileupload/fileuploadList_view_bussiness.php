
<div id="page-wrapper">

		<br>	
		<div id="page-inner">
		
		<form method="post" action="<?php echo WEB_DIR; ?>/Fileupload_bussiness/filesearch">
    <div class="row">
	<div class="col-md-2">
	<select id="department" name="department" class="form-control" required>
     <option value=""> Department </option>
	
	<?php foreach($department_data as $department_value)
	{
	$id = $department_value->id;
	$department_name = $department_value->department_name;
	?>
	<option value="<?php echo $id; ?>"> <?php echo $department_name; ?></option>
	<?php } ?>
	 <option value="0">Others</option>
	</select>
	</div>
	
	
	
	<div class="col-md-2" id="divservice">
	<select id="service_type" name="servicetype" class="form-control" required>
    <option value="0"> Service Type </option>
	</select>
	</div>

	<div class="col-md-2" id="divfrequency">
	<select id="frequency" name="frequency"  class="form-control">
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
	
	<div class="col-md-2" id="divdate">
	<input type="date" name="fromdate" class="form-control">
	</div>
    
	<div class="col-md-2" id="divdate2">
	<input type="date" name="todate" class="form-control">
	</div>
	
	<div class="col-md-2">
	<input type="submit" class="btn primary" value="Search">
	</div>
	
	</div>

</form>
			


				
<div id="success"><?php echo $this->messages->getMessageFront(); ?></div>
		  <div class="header"> 
                        
						
						
						

						<h1 class="page-header">
                            Received Files
                        </h1>
						
					<div class="row">
                <div class="col-md-11">
                    <!-- Advanced Tables -->
                    <div class="card">
					
							
                        <div class="card-action">
                         File Listing
                        </div>
                        <div class="card-content">
                             <div class="table-responsive">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>File Name</th>
                                            <th>Uploaded Date</th>
                                            <th>Download</th>
    <!--
											<?php if($this->session->userdata("account_id")!=1)
											{ 
										   ?>
											<th>Delete</th>
											<?php
											}											
											?>
											<th>Share</th>
											-->
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									
									
								
									
									
									$i=1;
									foreach ($table_details as $dataval) 
	                                {
		                            $id= $dataval -> id;
		                            $filename= $dataval -> file_name;
		                            $date= $dataval -> createddate;
		                          
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $filename; ?></td>
                                            <td><?php echo $date; ?></td>
                                             <td>
											 <a class="waves-effect waves-light btn btn" href="<?php echo base_url('fileupload_bussiness/download'); ?>/<?php echo $id; ?>">Downloadz</a>
											 
										     </td> 
											 <td>
											
<!--											
										<a class="waves-effect waves-light btn btn btn-danger" href="<?php echo base_url('fileupload_bussiness/fileDelete'); ?>/<?php echo $id; ?>">Delete</a>
                                        
										
											 </td>
											 <td>
											
										<a data-toggle="modal" data-id="<?php echo $id; ?>" title="File Share" class="open-AddBookDialog btn btn-info" href="#addBookDialog">Share</a>
                                 
										-->
										
										
							
										</td>
										</tr>
									<?php 
									$i++;
									} ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
									
		</div>
		</div>



<div class="modal" id="addBookDialog" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header" style="background-color:#A0262F; color:#fff;">
       <h3 class="modal-title">File Share</h3>
       <button type="button"  style="margin-top:-25px; color:#ffffff;" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
 <div class="row">
     <div class="col-md-6">  


<img src="<?php echo WEB_DIR;?>/assets/images/file-transfer.png" align="center" width="75%" />
</div>
 <div class="col-md-6 ml-auto">  
 <h3 class="text-justify" style="color:#A0262F;">Secure File Transfer</h3>
 <br />
 <div id="email_div">

 </div>
<p>Email</p>
  
  <form method="post" id="modelForm" action="<?php echo WEB_DIR;?>/Fileupload/share_file">
<input type="hidden" name="file_id" id="file_id" value=""/>
<textarea value="" name="email_value[]" data-role="tagsinput" id="tags" class="form-control"></textarea>
</div>
</div>
 
     </div>
     <div class="modal-footer">
      <input type="submit" value="Share" name="share" class="btn btn-primary">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     </div>
   </div>
 </div>
</div>



	


		
            <div id="page-inner">

		
		

				
				