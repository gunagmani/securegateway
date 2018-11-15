

<div id="page-wrapper">
<div id="success"><?php echo $this->messages->getMessageFront();?></div>
		  <div class="header"> 
                        <h1 class="page-header">
                            Service Type
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
 <div class="row" id="securewrapper">
			<div class="dashboard-cards"> 
             
				
				
				<div class="row">
			 <div class="col-lg-8">
			 <div class="card">
                        <div class="card-action">
                           Service type Form
                        </div>
                        <div class="card-content">
						
						<?php if(validation_errors()!='') { ?>
						<div class="alert alert-danger">
  <strong><?php echo validation_errors(); ?></strong>
</div>
						<?php } ?>	
   <form method="post" id="department_post" action="<?php echo WEB_DIR;?>/Servicetype/add_servicetype">
      <div class="row">
        <div class="input-field col s6">
         
		 <select class="form-control" name="department_value">
		 <?php 
	
			 foreach($department_value as $department_dropdown)
			 {
				 ?>
				 
				 <option value="<?php echo $department_dropdown->id;  ?>"> 
				 <?php echo $department_dropdown->department_name; ?> 
				 </option>
			 <?php } ?>
				 
		 </select>
		 
         
        </div> 
		</div>
		
	
		  <div class="row">
        <div class="input-field col s6">
         
		 <input type="text" name="service_type" placeholder="Service type" required>
		 
         
        </div> 
		</div>
		
		
		<div class="row">
        <div class="input-field col s6">
          
		  <input class="waves-effect waves-light btn" type="submit" value="Save" name="department_submit" id="department_submit">
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
                         Service type name Listing
                        </div>
                        <div class="card-content">
                             <div class="table-responsive">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Department Name</th>
                                            <th>service Type</th>
                                            <th>Edit</th>
                                           <!-- <th>Delete</th> -->
                                           											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$i=1;
							
    $CI =& get_instance();
 
									foreach ($service_value as $values) 
	                                {
		                            $id= $values -> id;
		                          
		                            $department= $values -> child_id;
		                            $service_type= $values -> service_type;
		                        
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $CI->name_by_id($department); ?></td>
                                            <td><?php echo $service_type; ?></td>
                                           
                                             
											 <td>
											 <a class="waves-effect waves-light btn btn" href="<?php echo base_url('servicetype/view_edit_servicetype'); ?>/<?php echo $id; ?>">Edit</a>
										     </td> 
											 
											<!-- <td>
										<a class="waves-effect waves-light btn btn btn-danger" href="<?php //echo base_url('adhoc'); ?>/<?php //echo $id; ?>">Delete</a>
											 </td>
										-->
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
			  
		

				
				