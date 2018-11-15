	   
	   
	 
	   
	   <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
			  
                <a class="navbar-brand waves-effect waves-dark" href=
				"<?php echo base_url('dashboard');?>">
				
				<img src="<?php echo WEB_DIR;?>assets/images/sg.png" style="height:55px;"></img>
				
				</a>
				
		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
			<li><a class="dropdown-button waves-effect waves-dark" ><span style="color:#A0262F !important">Last Seen : </span> <?php echo $this->session->userdata("last_login"); ?></a></li>
			
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>

				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?php echo $this->session->userdata("firsttname"); ?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
				<ul id="dropdown1" class="dropdown-content">
				<li><a href="<?php echo WEB_DIR.'dashboard/profile' ?>"><i class="fa fa-user fa-fw"></i> 
				<?php 
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
					echo "Bussiness Admin";
					}
					else
					{
					echo "Bussiness User";	
					}
			    } 
			?>
			
				
				
				</a>
				</li>	

<li><a href="<?php echo base_url('dashboard/view_changepwd');?>"><i class="fa fa-eye fa-fw"></i> Change Password</a>
				</li>
                
				
				<?php 
				if($this->session->userdata("account_id")==2 || $this->session->userdata("account_id")==3 && $this->session->userdata("role_id")==1 )
				{ 
				?>
             <li>
			 <a href="<?php echo WEB_DIR.'Order_History/' ?>"><i class="fa fa-dollar fa-fw"></i>Transaction History
</a>
				</li>
				<?php } ?>
				
				<?php
				if($this->session->userdata("account_id")==2)
               { 
                ?>
               <li>
               <a href="<?php echo base_url('fileupload/upgrade_view');?>"><i class="fa fa-upload fa-fw"></i> Upgrade</a>
               </li>
				
               <?php } ?>		
				<?php 
				if($this->session->userdata("account_id")==1)
				{ 
				?>
             <li>
			 <a href="<?php echo base_url('fileupload/upgrade_view');?>"><i class="fa fa-upload fa-fw"></i> Upgrade</a>
				</li>
				<?php } ?>
				
				<li><a href="<?php echo base_url('Securegateway/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
				</ul>

				
				
				
				
				
			


   
<ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
                        
						
						
						
						  <?php 
	   
	    $CI = & get_instance();
		
		 $result = $CI->Common_model->menu_notification(); 
		 if($result!=null)
		 {
		foreach($result as $message_value)
		{
			$activity = $message_value->activity;
			$object_id = $message_value->object_id;
			$user_id = $message_value->user_id;
			$description = $message_value->description;
			$createddate = $message_value->createddate;
			if(($activity != "Login"))
			{
			
			?>
			
				
						<li>
                                <div>
                                    <strong><?php echo $activity; ?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo $createddate; ?></em>
                                    </span>
                                </div>
								
                                <p>
								<?php 

                                 if($activity=='Fileupload' || $activity=='Filedownload' || $activity=='Filedownload' || $activity=='Fileshare' || $activity == 'Fileshare' || $activity == 'Filedelete')
								 {
								  
								  $object_value = $CI->Common_model->id_to_name('sg_file',$object_id);   
							
								 echo $object_value . ' ('. $description . ') '; 
						
								 }
								 else if($activity=='Password Change' || $activity=='Profile')
								 {
								  echo 'Your '. $description;		 
								 }	
								 
		                         else if($activity=='Sub-Folder creation' || $activity=='Sub-Folder Edit')
								 {
								 $object_value = $CI->Common_model->id_to_servicetype($object_id); 
								  echo $object_value . ' ('. $description . ') '; 
								 }	
                                 else if($activity=='Folder creation' || $activity=='Folder Edit')
								 {
								 $object_value = $CI->Common_model->id_to_department($object_id);
                                 echo $object_value . ' ('. $description . ') '; 								 
								 }
								  else if($activity=='File Expiry')
								 {
								  echo $description;		 
								 }	
								 else if($activity=='File Move')
								 {
								  echo $description;		 
								 }	
								  else if($activity=='User Expiry')
								 {
								  echo $description;		 
								 }	
								   else if($activity=='Upgrade' || $activity=='Renewal')
								 {
								 echo 'Your '. $description;							 
								 }
                                 else if($activity=='Logout')
								 {
								 //$object_value = $CI->Common_model->id_to_folder('sg_department',$object_id,'folder');
                                 echo 'Last Seen :' . $createddate; 								 
								 }	
                                 else if($activity=='User Creation')
								 {
								 //$object_value = $CI->Common_model->id_to_folder('sg_department',$object_id,'folder');
                                echo $description; 								 
								 }									 
								
								?></p>
                           
                        </li>
                        <li class="divider"></li>
			
			<?php
			
			}
			}
		 } 
		 else{
			?>
						
					<li>
                                <div>
                                    <strong></strong>
                                    <span class="pull-right text-muted">
                                        <em></em>
                                    </span>
                                </div>
								
                                <p>No activities
								</p>
                          
                        </li>
                        <li class="divider"></li>	
						
						
		 <?php } ?>		
					
                   
                    

</ul>  