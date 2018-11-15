   <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
           <ul class="nav" id="main-menu">

                    <li>
                        <a class="<?php if(strtolower($this->uri->segment(1))=="dashboard"){echo "active-menu";}?> waves-effect waves-dark" href="<?php echo WEB_DIR.'dashboard/'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
              <!--      <li>
                        <a href="ui-elements.html" class="waves-effect waves-dark"><i class="fa fa-desktop"></i> UI Elements</a>
                    </li>
					<li>
                        <a href="chart.html" class="waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tab-panel.html" class="waves-effect waves-dark"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                    </li>
                    
                    <li>
                        <a href="table.html" class="waves-effect waves-dark"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.html" class="waves-effect waves-dark"><i class="fa fa-edit"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>  -->
                    <li>
					
					
                        <a href="<?php echo WEB_DIR.'fileupload'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileupload"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> File Upload</a>
						</li>
                     	
						<li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-sitemap"></i> File <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                              <a href="<?php echo WEB_DIR.'fileupload/fileuploadList_view'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileuploadList_view"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Upload</a>
                            </li>
                            <li>
                                 <a href="<?php echo WEB_DIR.'fileupload/fileuploadRec_view'; ?>" class="
						<?php $secondLastKey = count($this->uri->segment_array()); if($this->uri->segment($secondLastKey)=="fileuploadRec_view"){echo "active-menu";}?> waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Received</a>
                            </li>
                         
                        </ul>
                    </li>
                      
                    </li>
                </ul>
            </div>
        </nav>