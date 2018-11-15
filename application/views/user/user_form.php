
<style>
.parsley-required
{
	color:red;
}
</style>
<div id="page-wrapper">
<div id="success"><?php echo $this->messages->getMessageFront();?></div>
		  <div class="header"> 
                        <h1 class="page-header">
                            User Registration
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
                <div class="row" id="securewrapper">
				
				
				<div class="row">
			 <div class="col-lg-10">
			 <div class="card">
                        <div class="card-action">
                           User Form
                        </div>
                        <div class="card-content">
						
						<?php if(validation_errors()!='') { ?>
						<div class="alert alert-danger">
  <strong><?php echo validation_errors(); ?></strong>
</div>
						<?php } ?>	
   <form data-parsley-validate method="post" id="department_post" action="<?php echo WEB_DIR;?>/user/add_user">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" name="first_name" type="text" class="validate" value="<?php echo set_value('department'); ?>" placeholder="First Name" data-parsley-type="alphanum" data-parsley-required-message="Firstname is required" required>
         
        </div> 
		</div>
		
		<div class="row">
		   <div class="input-field col s6">
          <input id="last_name" name="last_name" type="text" class="validate" value="<?php echo set_value('department'); ?>" placeholder="Last Name" data-parsley-type="alphanum" data-parsley-required-message="Lastname is required" required>
        </div> 
		</div>
		
		<div class="row">
		  <div class="input-field col s6">
          <input id="email_reg" name="email" type="email" class="validate" data-parsley-type="email" data-parsley-required-message="Email is required" value="<?php echo set_value('department'); ?>"  placeholder="Email" required>
          <div id="error_email" style="display: none;">
		<p style="color:red;"> Entered email is already exist </p>
	   </div>
		</div> 
		 
		</div>
		
		 <div class="row">
        <div class="input-field col s6">
          <input name="password" type="password" data-parsley-required-message="Password is required" class="validate" value="" autocomplete="off" id="password_user" placeholder="Password" required>
        </div> 
		</div>
		 <div id="error_password1" style="color:red;">
		<p>  </p>
	   </div>
		
			 <div class="row">
        <div class="input-field col s6">
          <input id="phone" name="phone" type="text" class="validate" data-parsley-type="digits" value="" data-parsley-required-message="Phone no is required" placeholder="Phone" required>
        </div> 
		</div>
		
	    <div class="row">
        <div class="input-field col s6">
		<p> Department Upload </p>
		 <select class="form-control" name="department_upload[]" id="department_upload" multiple required data-parsley-required-message="Department upload is required">
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
		
		
		<div class="input-field col s6">
		<p> Department Download </p>
		 <select class="form-control" name="department_download[]" id="department_download" multiple required data-parsley-required-message="Department Download is required">
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
          
		  <input class="waves-effect waves-light btn" type="submit" id="sub_reg" value="Register" name="user_submit" id="reg_submit">
        </div>
    </div>
    
	
	
	
    </form>
	<div class="clearBoth"></div>
  </div>
  
 
                    </div>
  
  

  
  
  
    </div>
 </div>	
	
					
			<div class="row">	
 <div class="col-lg-10">
<div class="card">
                        <div class="card-action">
                        User Listing
                        </div>
                        <div class="card-content">
                             <div class="table-responsive">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Edit</th>
                                            <th>Status</th>
                                           
                                           											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$i=1;
									foreach ($user_value as $values) 
	                                {
		                            $id= $values -> id;
		                            $first_name= $values -> firstname;
		                            $email= $values -> email;
		                            $phone= $values -> phone;
		                            $role_id= $values -> role_id;
		                            $status= $values -> status;
		                           if($role_id!=1)
								   {
		                        
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $first_name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
											 <td>
											 <a class="waves-effect waves-light btn btn" href="<?php echo base_url('user/view_edit_user'); ?>/<?php echo $id; ?>">Edit</a>

											 </td> 
									     <td>
											<?php 
											if($status==1)
											{
											?>
											Active
											<?php
											}
											else if($status==0)
											{
											?>
											
											<a data-toggle="modal" data-id="<?php echo $id; ?>" title="User Renewal" class="open-user_renewal_model btn btn-danger" href="#user_renewal_model">Renewal</a>
											
											
											<?php } ?>
											</td>
										
										</tr>
									<?php 
									$i++;
								   }
									} ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
</div>
				
					
				</div>
                
			   </div>
		

				
		
<div class="modal" id="user_renewal_model" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header" style="background-color:#A0262F; color:#fff;">
       <h3 class="modal-title">User Renewal</h3>
       <button type="button"  style="margin-top:-25px; color:#ffffff;" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
 <div class="row">

 <div class="col-md-12 ml-auto">  

  <form method="post" id="modelForm" action="<?php echo WEB_DIR;?>/Renewal_payment/admin_user_renewal">
  <h4>Are You Confirm to Renewal the User<h4>
<input type="hidden" name="ren_id" id="ren_id" value=""/>
</div>
</div>
 
     </div>
     <div class="modal-footer">
      <input type="submit" value="Continue" name="share" class="btn btn-primary">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	   
	   </form>
     </div>
   </div>
 </div>
</div>
		 </div>		