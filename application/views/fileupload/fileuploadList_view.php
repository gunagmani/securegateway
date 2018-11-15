	

<div id="page-wrapper">
	 <div id="wait" class="loader"></div>					
<div id="success"><?php echo $this->messages->getMessageFront(); ?></div>
		  <div class="header"> 
                        
						
						
						

						<h1 class="page-header">
                            Uploaded Files
                        </h1>
					</div>	
					   <div id="page-inner">

					<div class="row" id="securewrapper">
                <div class="col-md-11" style="margin-left:40px;">
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
											<?php if($this->session->userdata("account_id")==3)
											{ 
										   ?>
										    <th>Department</th>
                                            <th>Service type</th>
                                           
											<?php
											}
											?>
                                            <th>Download</th>
         
											<?php if($this->session->userdata("account_id")==3)
											{ 
										   ?>
											<th>Move</th>
											<?php
											}
                                              ?>											
											<?php if($this->session->userdata("account_id")!=1)
											{ 
										   ?>
											<th>Delete</th>
											<?php
											}											
											?>
											<th>Share</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$CI = & get_instance();
									$i=1;
									foreach ($table_details as $values) 
	                                {
		                            $id= $values -> id;
		                            $filename= $values -> file_name;
		                            $date= $values -> createddate;
		                            $service_type= $values -> service_type;
		                            $parent_id= $values -> parent_id;
		                            //$owner= $values -> Ownership;
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $filename; ?></td>
                                          <td><?php echo $date; ?></td>

	                                      <?php if($this->session->userdata("account_id")==3)
											{ 
										   ?>

										  <td><?php

                                            $dept_value = $CI->Common_model->id_to_department($parent_id); 
											if($dept_value!='Free')
											{
											echo $dept_value;
											}
											else
											{
												echo "Others";
											}
											?></td>
                                            <td><?php 
											$ser_value = $CI->Common_model->id_to_servicetype($service_type);
											echo $ser_value; ?></td>
											
											<?php } ?>
											
											
                                            
                                             <td>
											 <a class="waves-effect waves-light btn btn" href="<?php echo base_url('fileupload/download'); ?>/<?php echo $id; ?>">Download</a>
										     </td> 
											 
											 		  	<?php if($this->session->userdata("account_id")==3)
											{ 
										?>
										
		
											 <td>
									

										<a data-toggle="modal" data-id="<?php echo $id; ?>" data-name="<?php echo $filename; ?>" title="File Share" class="open-filemove btn btn-warning" href="#filemove">Move</a>
										
											 </td>
										
											<?php } ?>
											 
											 
											 
											 
											  	<?php if($this->session->userdata("account_id")!=1)
											{ ?>
										
		
											 <td>
											
										<!--<a class="waves-effect waves-light btn btn btn-danger" href="<?php echo base_url('fileupload/fileDelete'); ?>/<?php echo $id; ?>">Delete</a> -->
										
										

							<a data-toggle="modal" data-id="<?php echo $id; ?>" data-name="<?php echo $filename; ?>" title="File Share" class="open-filedelete btn btn-danger" href="#filedelete">Delete</a>							
											 </td>
										
											<?php } ?>
											
											
										
											 
											 <td>
										<a data-toggle="modal" data-id="<?php echo $id; ?>" title="File Share" class="open-AddBookDialog btn btn-info" href="#addBookDialog">Share</a>							
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
          


<div class="modal" id="addBookDialog" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
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
      <input type="submit" value="Share" name="share" id="share_submit" class="btn btn-primary">
       <button type="button" class="btn btn-secondary" id="share_close" data-dismiss="modal">Close</button>
	   </form>
     </div>
   </div>
 </div>
</div>



<div class="modal" id="filemove" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header" style="background-color:#A0262F; color:#fff;">
       <h3 class="modal-title">File Move</h3>
       <button type="button"  style="margin-top:-25px; color:#ffffff;" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
 <div class="row">
    
 <div class="col-md-12" style="margin-left:15px;">  
 <h3 class="text-justify" style="color:#A0262F;">Secure File Move</h3>
 <br/>
 <p style="font-size:20px;">Filename : <span id="file_name" style="color:red"></span></p>
  <form  method="post" id="form_move" action="<?php echo WEB_DIR;?>/Fileupload_bussiness/file_move">
<input type="hidden" name="move_id" id="move_id" value=""/>
<div class="row">
<div class="input-field col s6">
		 <select class="form-control" name="department_value" id="department_move" required>
	
		 </select>
</div>
</div>

<div class="row">
<div class="input-field col s6">
		 <select class="form-control" name="service_type" id="service_type" required>
		  <option>Subfolder</option>
		 </select>
</div>
</div>

</div>
</div>
 
     </div>
     <div class="modal-footer">
      <input type="submit" value="Move" name="Move" id="move_submit" class="btn btn-primary">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	   </form>
     </div>
   </div>
 </div>
</div>






<div class="modal" id="filedelete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header" style="background-color:#A0262F; color:#fff;">
       <h3 class="modal-title">File Delete</h3>
       <button type="button"  style="margin-top:-25px; color:#ffffff;" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
 <div class="row">
    
 <div class="col-md-12" style="margin-left:15px;">  
 <h3 class="text-justify" style="color:#A0262F;">File Delete</h3>
 <br/>
 <p style="font-size:20px;">Are you sure to Delete : <span id="delete_name" style="color:red"></span></p>
    <form  method="post" id="form_delete" action="<?php echo WEB_DIR;?>/fileupload/fileDelete">
<input type="hidden" name="delete_id" id="delete_id" value=""/>
</div>
</div>
 
     </div>
     <div class="modal-footer">
      <input type="submit" value="Delete" name="Delete" id="delete_submit" class="btn btn-primary">
       <button type="button" class="btn btn-secondary" id="delete_close" data-dismiss="modal">Close</button>
	   </form>
     </div>
   </div>
 </div>
</div>




  </div>
									
	
	


		
         
		
		

				
				