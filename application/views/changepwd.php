<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Change Password
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
			
				
				
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-action">
                            Change Password 
                        </div>
                        <div class="card-content">
                        
						<form data-parsley-validate role="form" id="change_form" method="post"  action="<?php echo WEB_DIR; ?>/dashboard/changepassinsert">
						
								
								  <div class="row">
									<div class="input-field col s12">
									  <input id="oldpass" type="password" class="validate" required>
									  <label for="email">Old Password </label>
									</div>
								  </div>
								
								
								
								
								  <div class="row">
									<div class="input-field col s12">
									  <input id="newpass" type="password" class="validate" data-parsley-required-message="New Password Required" name="newpass" required>
									  <label for="email">New Password</label>
									</div>
								  </div>
							
								
								
								
								  <div class="row">
									<div class="input-field col s12">
									  <input id="repass" type="password"  class="form-control mb" data-parsley-equalto="#newpass" data-parsley-required-message="Retype the password" data-parsley-equal-to-message="Password is not same" required>
									  <label for="email">Re-Type the password</label>
									</div>
								  </div>
						
								
								<div class="row" id="pass_error" style="display: none;">
									<div class="input-field col s12">
									<p style="color:red;"> Old Password is wrong </p>
								</div>
								  </div>
								  <div class="row" id="pass_error1" style="display: none;">
									<div class="input-field col s12">
									<p style="color:red;"> New password and old password is same </p>
								</div>
								  </div>
								  
								  <div class="row">
								<div class="input-field col s12" id="error_password1" style="color:red;">
								</div>
									  
								  </div>
								  
								  
							
								
								  <div class="row">
									<div class="input-field col s12">
									  
									  <input class="waves-effect waves-light btn" type="submit" id="change" value="Submit" name="Change">
									</div>
								  </div>
								  
								  
								  
							
								
							</form>
 
				<div class="clearBoth"></div>
							</div>
							</div>
							</div>
							
				<!--
                    <div class="col-xs-12 col-sm-6 col-md-3">
			
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
						<i class="material-icons dp48">import_export</i>
						</div>
						<div class="card-stacked red">
						<div class="card-content">
						<h3>3</h3> 
						</div>
						<div class="card-action">
						<strong>Customers</strong>
						</div>
						</div>
						</div>
	 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image orange">
						<i class="material-icons dp48">shopping_cart</i>
						</div>
						<div class="card-stacked orange">
						<div class="card-content">
						<h3>3</h3> 
						</div>
						<div class="card-action">
						<strong>Admin</strong>
						</div>
						</div>
						</div> 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image blue">
						<i class="material-icons dp48">equalizer</i>
						</div>
						<div class="card-stacked blue">
						<div class="card-content">
						<h3>6</h3> 
						</div>
						<div class="card-action">
						<strong>Users</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
					
					-->
                 
					
					 
					
					
					
					
				
                </div>
			   </div>
		

