<div id="page-wrapper">
<div id="success"><?php echo $this->messages->getMessageFront();?></div>
		  <div class="header"> 
                        <h1 class="page-header">
                            Adhoc
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

			<div class="dashboard-cards"> 
                <div class="row">
				
				
				<div class="row">
			 <div class="col-lg-8">
			 <div class="card">
                        <div class="card-action">
                           Adhoc Form
                        </div>
                        <div class="card-content">
						
						<?php if(validation_errors()!='') { ?>
						<div class="alert alert-danger">
  <strong><?php echo validation_errors(); ?></strong>
</div>
						<?php } ?>	
   <form method="post" id="adhoc_post" action="<?php echo WEB_DIR;?>/adhoc/add_adhoc">
      <div class="row">
        <div class="input-field col s6">
          <input id="adhoc" name="adhoc" type="text" class="validate" value="<?php echo set_value('adhoc'); ?>" placeholder="Adhoc">
         
        </div> 
		</div>
		
		<div class="row">
        <div class="input-field col s6">
          
		  <input class="waves-effect waves-light btn" type="submit" value="Save" name="Adhoc" id="adhoc_submit">
        </div>
    </div>
    
    </form>
	<div class="clearBoth"></div>
  </div>
  
 
                    </div>
  
  

  
  
  
    </div>
 </div>	
	 </div>		
					
			<div class="row">	
 <div class="col-lg-10">
<div class="card">
                        <div class="card-action">
                         File Listing
                        </div>
                        <div class="card-content">
                             <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Adhoc Name</th>
                                            <th>Edit</th>
                                           <!-- <th>Delete</th> -->
                                           											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$i=1;
									foreach ($adhoc_data as $values) 
	                                {
		                            $id= $values -> id;
		                            $folder_name= $values -> folder_name;
		                        
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $folder_name; ?></td>
                                           
                                             
											 <td>
											 <a class="waves-effect waves-light btn btn" href="<?php echo base_url('adhoc/view_edit_adhoc'); ?>/<?php echo $id; ?>">Edit</a>
										     </td> 
											 
											 <td>
										<!-- <a class="waves-effect waves-light btn btn btn-danger" href="<?php //echo base_url('adhoc'); ?>/<?php //echo $id; ?>">Delete</a>
											 </td> -->
										
										</tr>
									<?php 
									$i++;
									} ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
</div>
				
					
				</div>
                </div>
			   </div>
		

				
				