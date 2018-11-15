
			
<div id="page-wrapper">
<div id="success"><?php echo $this->messages->getMessageFront();?></div>
		  <div class="header"> 
                        <h1 class="page-header">
                            User Registration Edit
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
   <form method="post" data-parsley-validate id="department_post" action="<?php echo WEB_DIR;?>/user/edit_user">
      <div class="row">
        <div class="input-field col s6">
          <input id="last_name" name="first_name" type="text" class="validate" value="<?php echo $user_value->firstname; ?>" placeholder="First Name" data-parsley-type="alphanum" data-parsley-required-message="Firstname is required"  required>
         <input type="hidden" name="id" value="<?php echo $user_value->id; ?>">
        </div> 
		</div>
		
		<div class="row">
		   <div class="input-field col s6">
          <input id="last_name" name="last_name" type="text" class="validate" value="<?php echo $user_value->lastname; ?>" placeholder="Last Name" data-parsley-type="alphanum" data-parsley-required-message="Lastname is required" required>
        </div> 
		</div>
		
		<div class="row">
		  <div class="input-field col s6">
          <input id="email" name="phone" type="text" class="validate" value="<?php echo $user_value->phone; ?>"placeholder="Email" data-parsley-type="digits" value="" data-parsley-required-message="Phone no is required">
        </div> 
		</div>
		
	
		
		
	    <div class="row">
        <div class="input-field col s6">
		<p> Department Upload </p>
		 <select class="form-control" name="department_upload[]" id="department_upload" multiple required>
	 <?php
	  $select='';
	 foreach($department_value as $department_dropdown)
			 {
				 
				 foreach($accessinfo as $access_check) 
				 {
					 if($department_dropdown->id == $access_check->id)
					 {
						 $select = "selected";
					 }
					
				 }	
					 
				 ?>
				 
				<option <?php echo $select; ?> value="<?php echo $department_dropdown->id;  ?>"> 
				 <?php echo $department_dropdown->department_name; ?> 
				 </option>
			 <?php	 
			
               $select='';
			} 
			 ?>
		 </select>
		</div>
		
		
		
		
		
		
		<div class="input-field col s6">
		<p> Department Download </p>
		 <select class="form-control" name="department_download[]" id="department_download" multiple required>
		 <?php
		
	 foreach($department_value as $department_dropdown)
			 {
				 
				 foreach($download_info as $access_check) 
				 {
					 if($department_dropdown->id == $access_check->id)
					 {
						 $select = "selected";
					 }
					
				 }	
					 
				 ?>
				 
				<option <?php echo $select; ?> value="<?php echo $department_dropdown->id;  ?>"> 
				 <?php echo $department_dropdown->department_name; ?> 
				 </option>
			 <?php	 
			
               $select='';
			} 
			 ?>
		
		 </select>
		</div>
		
        </div>
		
		
		
		
		
		<div class="row">
        <div class="input-field col s6">
            <input class="waves-effect waves-light btn" type="submit" value="Update" name="user_submit" id="user_submit">

        </div>
    </div>
    
	
	
	
    </form>
	<div class="clearBoth"></div>
  </div>
  
 
                    </div>
  
  

  
  
  
    </div>
 </div>	
	 </div>		
					
			
                </div>
			  
		

				
				