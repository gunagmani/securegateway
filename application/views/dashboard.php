<div id="page-wrapper">
<div id="success"><?php echo $this->messages->getMessageFront(); ?></div>
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard
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

			<div class="dashboard-cards" id="securewrapper"> 
                <div class="row" >
				
				
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
                    <div class="col-xs-12 col-sm-6 col-md-4">
					
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image green">
						<i class="material-icons dp48">library_books</i>
						</div>
						<div class="card-stacked green">
						<div class="card-content">
						<h3><?php echo $no_of_files_uploaded; ?></h3> 
						</div>
						<div class="card-action">
						<strong>Upload Files</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
					
					   <div class="col-xs-12 col-sm-6 col-md-4">
					
							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image blue">
						<i class="material-icons dp48">equalizer</i>
						</div>
						<div class="card-stacked blue">
						<div class="card-content">
						<h3><?php echo byte_format($size,2);  ?></h3> 
						</div>
						<div class="card-action">
						<strong>Size Used</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
					 <div class="col-xs-12 col-sm-6 col-md-4">
					
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image green">
						<i class="material-icons dp48">library_books</i>
						</div>
						<div class="card-stacked green">
						<div class="card-content">
						<h3><?php echo $downloads; ?></h3> 
						</div>
						<div class="card-action">
						<strong>Download</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
					
					
					
					
				</div>	
					
					<div class="row">
					<?php if($this->session->userdata("account_id")==3 && $this->session->userdata("role_id")==1)
					{
			?>
				   <div class="col-xs-12 col-sm-6 col-md-4">
					
							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image green">
						<i class="material-icons dp48">equalizer</i>
						</div>
						<div class="card-stacked green">
						<div class="card-content">
						<h3><?php echo $no_of_users;  ?></h3> 
						</div>
						<div class="card-action">
						<strong>No of Users</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
					<?php
					}
			?>
					<?php if($this->session->userdata("account_id")==3 && $this->session->userdata("role_id")==1)
					{
			?>
						 <div class="col-xs-12 col-sm-6 col-md-4">
					
							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
						<i class="material-icons dp48">equalizer</i>
						</div>
						<div class="card-stacked red">
						<div class="card-content">
						<h3><?php echo $no_of_department; ?></h3> 
						</div>
						<div class="card-action">
						<strong>Departments</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
					
					
			
			<?php
					}
			?>
					
					
					    
					
					
					
					
					
					
					<!--
					
					      <div class="col-xs-12 col-sm-6 col-md-3">
					
					<div class="card horizontal cardIcon waves-effect waves-dark">
					
						<div class="card-stacked orange">
						<div class="card-content">
						<p style="font-size:20px;"><?php echo $lastseen; ?></p>
						</div>
						<div class="card-action">
						<strong>Last Seen</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
					
					
					-->
                </div>
			   </div>
		

				
				