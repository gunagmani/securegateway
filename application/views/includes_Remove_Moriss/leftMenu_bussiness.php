  

<?php
if($this->session->userdata("role_id")==1){
?>
  <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
           <ul class="nav" id="main-menu">

                    <li>   
                        <a class="<?php if(strtolower($this->uri->segment(1))=="dashboard"){echo "active-menu";}?> waves-effect waves-dark" href="<?php echo WEB_DIR.'dashboard/'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
            
                    <li>
					       <a href="<?php echo WEB_DIR.'fileupload_bussiness'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileupload_bussiness"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-upload"></i> Upload</a>
						
						</li>
						
						
						
						
							<li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-sitemap"></i> File <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                           <li>
                                <a href="<?php echo WEB_DIR.'fileupload_bussiness/fileupload_list'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileupload_list"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Uploaded</a>
                            </li>




						   <li>
                              <a href="<?php echo WEB_DIR.'fileupload_bussiness/fileuploadList_view'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileuploadList_view"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-fw fa-file"></i>Received</a>
                            </li>
                        
                         
                        </ul>
                    </li>
						
						
						<li>
					     <a href="<?php echo WEB_DIR.'user/'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="user"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-user"></i> User Creation</a>
						
<!--
						<a href="<?php echo WEB_DIR.'department'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="department"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-file"></i> Department Creation</a>
						
						<a href="<?php echo WEB_DIR.'servicetype'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="servicetype"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-cog"></i> Service Type</a>   -->
						
						<a href="<?php echo WEB_DIR.'foldercreation'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="foldercreation"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-file-o"></i> Folder Creation</a>

                      <!--  <a href="<?php echo WEB_DIR.'adhoc'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="adhoc"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-file-o"></i> Adhoc</a> -->
						   

                       <!-- <a href="<?php //echo WEB_DIR.'adhoc/'; ?>" class="waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Tracking</a> -->
                    </li>
                </ul>
            </div>
        </nav>
		<?php
		
		
}
else
{
?>
 <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
           <ul class="nav" id="main-menu">

                    <li>   
                        <a class="<?php if(strtolower($this->uri->segment(1))=="dashboard"){echo "active-menu";}?> waves-effect waves-dark" href="<?php echo WEB_DIR.'dashboard/'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
            
                    <li>
					       <a href="<?php echo WEB_DIR.'fileupload_bussiness'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileupload_bussiness"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Upload</a>
						    
					     

                       <!-- <a href="<?php echo WEB_DIR.'adhoc/'; ?>" class="waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Tracking</a> -->
                    </li>
						<li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-sitemap"></i> File <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                           <li>
                                <a href="<?php echo WEB_DIR.'fileupload_bussiness/fileupload_list'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileupload_list"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Uploaded</a>
                            </li>




						   <li>
                              <a href="<?php echo WEB_DIR.'fileupload_bussiness/fileuploadList_view'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileuploadList_view"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-fw fa-file"></i>Received</a>
                            </li>
                        
                         
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
<?php
}
?>
