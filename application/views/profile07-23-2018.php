<div id="page-wrapper">
<div id="success"><?php echo $this->messages->getMessageFront(); ?></div>
	
		<div class="header">
		<h2 class="page-header"> Profile</h2>
</div>		
            <div id="page-inner">

			<div class="dashboard-cards"> 
	<div class="row" id="securewrapper">
    
	  <br>
      <div class="col-md-6 personal-info">
           <div class="card">
                        <div class="card-action">
						
        <h3>Personal info</h3>
		<br><br>
        <div class="row">
        <form data-parsley-validate class="form-horizontal" method="post" 
		action="<?php echo WEB_DIR;?>Dashboard/user_edit">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name</label>
            <div class="col-lg-8">
              <input class="form-control" name="firstname" type="text" value="<?php echo $firstname; ?>" data-parsley-type="alphanum" data-parsley-required-message="Firstname is required"  required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name</label>
            <div class="col-lg-8">
              <input class="form-control" name="lastname" type="text" value="<?php echo $lastname; ?>" data-parsley-type="alphanum" data-parsley-required-message="Lastname is required"  required>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Phone</label>
            <div class="col-lg-8">
              <input class="form-control" name="phone" type="text" value="<?php echo $phone; ?>" data-parsley-type="digits" data-parsley-length="[10, 12]">
            </div>
          </div>
         
         
		  
		
		   

		            <div class="form-group" >
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              
              <input type="submit" class="btn btn-primary" value="Update">
                
			  <a class="btn btn-default" href="<?php echo WEB_DIR.'dashboard'?>"> Back </a>
            </div>
          </div>
		      </form>
		     </div>
			      </div>
		     </div>
		     </div>
			 
        
<div class="col-md-6  personal-info">
   <div class="card">
                        <div class="card-action">
						 <h3>Package info</h3>
								<br><br>
						<div class="row">
						
							<div class="form-group">
									<p><strong><label class="col-md-4 control-label">Email:</strong></label>
										<label class="col-md-8 control-label">
											<?php echo $email; ?>
										</label></p>
							</div> 
								<div class="form-group">
								<p><strong><label class="col-md-4 control-label">Plan / Company:</strong></label>
									<label class="col-md-8 control-label">	<?php
									if($this->session->userdata("account_id")==1)
									{ 
									echo "Free";
									} 
									else if($this->session->userdata("account_id")==2)
									{
									  echo "Personal User";
									} 
									else 
									{ 
										if($this->session->userdata("role_id")==1)
										{
										echo $company ." - Bussiness Admin";
										}
										else
										{
										echo $company . " - Bussiness User";	
										}
									} 
									?>   </label></p>
						</div>	 												
										 <div class="form-group">
											<p><strong><label class="col-md-4 control-label">Size used:</strong></label>
											<label class="col-md-8 control-label">
											  <?php echo byte_format($size_used);  ?>
													
											
										 </label></p>
										  </div> 
										
										<div class="form-group">
           <p> <strong><label class="col-md-4 control-label">Size Available:</strong></label>
           <label class="col-md-8 control-label">
              <?php echo byte_format($freespace);  ?>
          </label></p>
          
		  </div>
		 
		    <div class="form-group">
           <p> <strong><label class="col-md-4 control-label">Expiry Date:</strong></label>
          <label class="col-md-8 control-label">
            <?php echo $expiry;  ?>
            </label></p>
          
		  </div>
		
		  		   
		  
		 
		    <div class="form-group">
            <p><strong><label class="col-md-4 control-label">Type:</strong></label>
            <label class="col-md-8 control-label">
			  <?php
			  $subs_type = ($subscriptiontype == 'M') ? 'Monthly' : (($subscriptiontype=='Y') ? 'Yearly' : 'Trail');
              echo $subs_type;			  
              ?>
			 </label></p>
			</div>
			
			</div>
			</div>
			</div>
</div>

   
      </div>
	  
  </div>
