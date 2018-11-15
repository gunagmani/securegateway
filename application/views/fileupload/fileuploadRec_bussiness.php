
<div id="page-wrapper">
						
<div id="success"><?php echo $this->messages->getMessageFront(); ?></div>
		  <div class="header"> 
                        
						
						
						

						<h1 class="page-header">
                            Received Files
                        </h1>
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
                                            <th>Download</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$i=1;
									foreach ($table_details as $values) 
	                                {
		                            $id= $values -> id;
		                            $filename= $values -> file_name;
		                            $date= $values -> createddate;
		                          
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $filename; ?></td>
                                            <td><?php echo $date; ?></td>
                                             <td>
											 <a class="waves-effect waves-light btn btn" href="<?php echo base_url('fileupload_bussiness/download'); ?>/<?php echo $id; ?>">Download</a>
										     </td> 
											 <td>
									
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
       
									
	


<div class="modal fade" id="addBookDialog" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>Email</p>
	   <form method="post" action="<?php echo WEB_DIR;?>/Fileupload/share_file">
        <input type="hidden" name="file_id" id="file_id" value=""/>
		<input type="text" value="" name="email_value[]" data-role="tagsinput" id="tags" class="form-control">
      </div>
      <div class="modal-footer">
		<input type="submit" value="Share" name="share" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 
</div>



	     </div>


		
      

		
		

				
				