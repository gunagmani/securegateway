<?php $this->load->view('homeincludes/header'); ?>
<style>
	.row {
 margin-left: 0 !important;
 margin-right: 0 !important;
}
#messagewindow
{
   
    width: 100%;
   
	
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 100px;
  width: 100px;
  outline: black;
  background-size: 100%, 100%;
  border-radius: 50%;
  border: 1px solid black;
  background-image: none;
}
.carousel-control-next-icon:after
{
  content: '>';
  font-size: 55px;
  color: #A0262F;
}

.carousel-control-prev-icon:after {
  content: '<';
  font-size: 55px;
  color: #A0262F;
}
</style>
<body>
<div id="wrapper" class="">		
		<?php $this->load->view('homeincludes/homemenu'); ?>
		<div id="page-banner" class="jumbotron">
			<div class="container-fluid">
				<div class="row">
					<div id="banner-content" class="col-md-12 col-sm-12 col-xs-12 text-center .center" style="top: 50%;">
				<h2>File Transfer Made Simple, Quick and Secure</h2>
					<p>Transfer large files easily and eliminate email attachments with Securegateway</p>
			  <p><a class="btn btn-primary btn-lg" href="<?php echo WEB_DIR.'Securegateway/view_registration'; ?>" role="button">Get Started</a></p>
						</div>
					</div>
			</div>
		</div>
			<div class="clearfix"> </div>
		<!--<section id="whysecuregateway" class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
								
			</div>
		</section>  -->
		<!--
		<section id="whysecuregateway-content" class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">				
				<div id="box1" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">	
						<div class="panel panel-primary">
					<div class="panel-heading"><h1>Large File Transfers Made Easy</h1></div>
					<div class="panel-content">				
						<p>Never send large files as an email attachment again! Box lets you quickly and securely transfer files and folders to anyone — even if they’re outside your company firewall —with a simple link, on any device.
						</p>
					</div>				
						</div>
				</div>
				<div id="box2" class="panel panel-default col-lg-3 col-md-3 col-sm-3 col-xs-12">	
					<div class="panel-heading"><h1>Large File Transfers Made Easy</h1></div>
					<div class="panel-content">				
						<p>Never send large files as an email attachment again! Box lets you quickly and securely transfer files and folders to anyone — even if they’re outside your company firewall —with a simple link, on any device.
						</p>
					</div>				
				</div>
				<div id="box3" class="panel panel-default col-lg-3 col-md-3 col-sm-3 col-xs-12">	
					<div class="panel-heading"><h1>Large File Transfers Made Easy</h1></div>
					<div class="panel-content">				
						<p>Never send large files as an email attachment again! Box lets you quickly and securely transfer files and folders to anyone — even if they’re outside your company firewall —with a simple link, on any device.
						</p>
					</div>				
				</div>
				<div id="box4" class="panel panel-default col-lg-3 col-md-3 col-sm-3 col-xs-12">	
					<div class="panel-heading"><h1>Large File Transfers Made Easy</h1></div>
					<div class="panel-content">				
						<p>Never send large files as an email attachment again! Box lets you quickly and securely transfer files and folders to anyone — even if they’re outside your company firewall —with a simple link, on any device.
						</p>
					</div>				
				</div>
			
			
			
			</div>
		</section>  
		<div class="clearfix"> </div>-->
		
		
		
		
				
        <div class="row">
		<div class="section-title">
					<h1 class="text-center">Why Securegateway</h1>
				 <div class="divider"></div> 
				</div>
		<div id="myCarousel" class="carousel slide" data-ride="carousel" ata-interval="5000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
       <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="<?php echo WEB_DIR;?>/assets/images/securegateway2.jpg" alt="Chania">
        
      </div>

      <div class="item">
        <img src="<?php echo WEB_DIR;?>/assets/images/securegateway3.jpg" alt="Chania">
      
      </div>
    
      <div class="item">
        <img src="<?php echo WEB_DIR;?>/assets/images/securegateway4.jpg" alt="Flower" >
        
      </div>
  <div class="item">
        <img src="<?php echo WEB_DIR;?>/assets/images/securegateway5.jpg" alt="Flower" >
        
      </div>
      
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	<!-- 	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="max-height:550px; overflow-Y: auto;" id="messagewindow">
		
		<img src="<?php echo WEB_DIR;?>/assets/images/securegateway.jpg" class="img-responsive">
		</div> -->
		
          <!--  <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single">
                    <div class="icon-outer">
                        <div class="icon">
                            <i class="fa fa-compress"></i>
                        </div>
                    </div>
                    <h2>Free Snippets</h2>
                    <p>GistBox is the best interface to GitHub Gists. Organize your snippets with labels. Edit your code. With Snipplr you can keep all of your frequently used code snippets. Free and useful Twitter Bootstrap Components for Shiny.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single">
                    <div class="icon-outer">
                        <div class="icon">
                            <i class="fa fa-laptop"></i>
                        </div>
                    </div>
                    <h2>Bootstrap Codes</h2>
                    <p>A design element gallery for web designers and web developers. A collection of Twitter Bootstrap snippets for Visual Studio. Bootstrap themes, snippets and components package that includes an AngularJS admin dashboard theme.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single">
                    <div class="icon-outer">
                        <div class="icon">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <h2>Examples</h2>
                    <p>Free Snippets for Twitter Bootstrap, Examples of Websites. bootstrap snippets for dreamweaver. Bootstrap 3 Support with snippets and autocompletion. Next Bootstrap is a gallery of code snippets for web designers and developers.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single">
                    <div class="icon-outer">
                        <div class="icon">
                            <i class="fa fa-sliders"></i>
                        </div>
                    </div>
                    <h2>Snippet Gallery</h2>
                    <p>As a convenience Toggle and Menu components available as static properties. Bootstrap 3 components built with React. Contribute to react-bootstrap development by creating an account on GitHub. Bootstrap UI Component Collections.</p>
                </div>
            </div> -->
<!--<section class="features">
    <div class="container-fluid">
        </div>
    </div>
	<div class="clearfix"> </div>
</section> -->


	<!--	<section id="features" class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<div class="section-title">
					<h1 class="text-center">Features</h1>
					<div class="divider"></div>
				</div>
				
			</div>
		</section> -->
		<div class="clearfix"> </div>
		
	
		<section id="features" style="background-color:#e0e0e0 !important;">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 col-md-offset-3 pad-bottom" data-scroll-reveal="enter from the bottom after 0.2s">
				
					<div class="section-title">
						<h1 class="wow BounceInDown" data-wow-duration="2s" data-wow-delay="5s">AWESOME <strong>FEATURES</strong></h1>
						<div class="divider"></div>
					</div>
                
                    

                </div>
            </div>
            <div class="row text-center pad-bottom" data-scroll-reveal="enter from the bottom after 0.4s">
			 <div class="container">
           
            <div class="row">
                <div class="col-md-12">
                  
						<img src="<?php echo WEB_DIR;?>/assets/images/securegatewayfeature.jpg" class="img-responsive">
                        

                  
                    <!--/well-->
                </div>
            </div>
        </div>
			</div>
			<!-- <div class="col-md-12">
			 		<img src="<?php echo WEB_DIR;?>/assets/images/securegatewayfeature.jpg" class="img-responsive">
			 </div> -->
              <!--  <div class="col-md-4">
                    <i class="ion-ios-lightbulb-outline"></i>
                    <h4><strong>Sample Feature Name </strong></h4>
                    Consectetur adipiscing elit felis dolor felis dolor vitae.Eelit felis dolor vitae
                </div>
                <div class="col-md-4">
                    <i class="ion-ios-barcode-outline"></i>
                    <h4><strong>Sample Feature Name </strong></h4>
                    Consectetur adipiscing elit felis dolor felis dolor vitae.Eelit felis dolor vitae
                </div>
                <div class="col-md-4">
                    <i class="ion-ios-personadd-outline"></i>
                    <h4><strong>Sample Feature Name </strong></h4>
                    Consectetur adipiscing elit felis dolor felis dolor vitae.Eelit felis dolor vitae
                </div>

            </div>
            <div class="row text-center" data-scroll-reveal="enter from the bottom after 0.6s">
                <div class="col-md-4">
                    <i class="ion-ios-glasses-outline"></i>
                    <h4><strong>Sample Feature Name </strong></h4>
                    Consectetur adipiscing elit felis dolor felis dolor vitae.Eelit felis dolor vitae
                </div>
                <div class="col-md-4">
                    <i class="ion-ios-thunderstorm-outline"></i>
                    <h4><strong>Sample Feature Name </strong></h4>
                    Consectetur adipiscing elit felis dolor felis dolor vitae.Eelit felis dolor vitae
                </div>
                <div class="col-md-4">
                    <i class="ion-ios-drag"></i>
                    <h4><strong>Sample Feature Name </strong></h4>
                    Consectetur adipiscing elit felis dolor felis dolor vitae.Eelit felis dolor vitae
                </div>

            </div>-->
      </div>


    </section> 
    <!-- FEATURES SECTION END-->
		
	<!-- <section>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
 
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo WEB_DIR;?>/assets/images/SecureGatewaySlider1.png" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="<?php echo WEB_DIR;?>/assets/images/SecureGatewaySlider2.png" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="<?php echo WEB_DIR;?>/assets/images/SecureGatewaySlider3.png" alt="New york" style="width:100%;">
      </div>
    </div>

    
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
		</section> 
		 -->
		<div class="clearfix"> </div>
		<section id="pricing" class="row">
            <div class=" col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
				<div class="section-title">
					<h1 class="text-center">Pricing</h1>
					<div class="divider"></div>
				</div>
				<div style="margin-bottom:50px;"></div>
                <div class="db-wrapper">
                    <div class="db-pricing-nine">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="db-bk-color-one">Free</th>
                                       
                                        <th class="db-bk-color-three">Business</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="db-width-perticular">5 GB Space </td>
                                        <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                        <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                        
                                    </tr>
                                    <tr>
                                        <td class="db-width-perticular">Dual Authentication	</td>
                                        <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                        <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                       
                                    </tr>
                                    <tr>
                                        <td class="db-width-perticular">File Retention</td>
										 <td><i class="glyphicon glyphicon-remove icon-red"></i></td>
                                        <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                       
                                        
                                    </tr>
                                    <tr>
                                        <td class="db-width-perticular">Sub Users</td>
                                        <td><i class="glyphicon glyphicon-remove icon-red"></i></td>
                                           <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                       
                                    </tr>
                                    <tr>
                                        <td class="db-width-perticular">Personal Folders</td>
                                  
                                        <td><i class="glyphicon glyphicon-remove icon-red"></i></td>
                                            <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="db-width-perticular">Download Notification</td>
                                      <td><i class="glyphicon glyphicon-remove icon-red"></i></td>
                                        <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                       
                                    </tr>
                                    <tr>
                                        <td class="db-width-perticular">Chat Support </td>
										<td><i class="glyphicon glyphicon-remove icon-red"></i></td>
                                        <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                        
                                       
                                    </tr>
                                    <tr>
                                        <td class="db-width-perticular">Email Support </td>
                                      <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                         <td><i class="glyphicon glyphicon-ok icon-green"></i></td>
                                       
                                    </tr>
                                    
									<tr>
                                        <td class="db-width-perticular"></td>
                                        <td>-</td>
                                       
                                        <td>$9.99/MONTH</td>
                                    </tr>
                                    <tr>
                                        <td class="db-width-perticular"></td>
                                        <td><a href="#" class="btn db-button-color-one">TRY NOW</a> </td>
                                        <td><a href="#" class="btn db-button-color-two">BUY PLAN</a> </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		<!-- <div class="row ">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    <div class="db-pricing-two">
                        <div class="pricing-header db-bk-color-four">
                            <h1 class="price">199 <small>USD</small>
                            </h1>
                        </div>
                        <ul>
                            <li class="type">Billing Monthly
                                    <label class="label label-warning">Basic</label>
                            </li>
                            <li>5 Templates Design</li>
                            <li>20 Days Delivery </li>
                            <li>5 Templates Design</li>
                            <li>20 Days Delivery </li>
                        </ul>
                        <div class="pricing-footer db-bk-color-four">

                            <a href="#" class="btn btn-default ">BOOK ORDER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    <div class="db-pricing-two db-pricing-popular">
                        <div class="pricing-header db-bk-color-three">
                            <h1 class="price">299 <small>USD</small>
                            </h1>
                        </div>
                        <ul>
                            <li class="type">Billing Quarterly
                                    <label class="label label-success">Popular</label>
                            </li>
                            <li>5 Templates Design</li>
                            <li>20 Days Delivery </li>
                            <li>5 Templates Design</li>
                            <li>20 Days Delivery </li>
                        </ul>
                        <div class="pricing-footer db-bk-color-three">

                            <a href="#" class="btn btn-default ">BOOK ORDER</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    <div class="db-pricing-two">
                        <div class="pricing-header db-bk-color-four">
                            <h1 class="price">399 <small>USD</small>
                            </h1>
                        </div>
                        <ul>
                            <li class="type">Billing Semi-Annualy
                                    <label class="label label-info">Advance</label>
                            </li>
                            <li>5 Templates Design</li>
                            <li>20 Days Delivery </li>
                            <li>5 Templates Design</li>
                            <li>20 Days Delivery </li>
                        </ul>
                        <div class="pricing-footer db-bk-color-four">

                            <a href="#" class="btn btn-default ">BOOK ORDER</a>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->
		
		
		<!--
		<section id="pricing" class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<div class="section-title">
					<h1 class="text-center">Pricing</h1>
					<div class="divider"></div>
				</div>
				
				<div style="margin-bottom:50px;"></div>
				<div id="freeaccount" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="panel panel-success">				
						<div class="panel-heading">	
							<h3 class="text-center">Free</h3>						
						</div>
						<div class="panel-content">	
							<p>Free Account </p>
						</div>
						<div class="panel-footer">
						<p><a class="btn btn-primary btn-lg" href="#" role="button">Sign Up</a></p>
						</div>
					</div>
				</div>
				
				<div id="personalaccount" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="panel panel-success">				
						<div class="panel-heading">	
							<h3 class="text-center">Personal</h3>						
						</div>
						<div class="panel-content">	
							<p>Personal Account</p>
						</div>
						<div class="panel-footer">
						<p><a class="btn btn-primary btn-lg" href="#" role="button">Sign Up</a></p>
						</div>
					</div>
				</div>
				
				<div id="businessaccount" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="panel panel-success">				
						<div class="panel-heading">	
							<h3 class="text-center">Business</h3>						
						</div>
						<div class="panel-content">	
							<p>Business </p>
						</div>
						<div class="panel-footer">
						<p><a class="btn btn-primary btn-lg" href="#" role="button">Sign Up</a></p>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		
					 
		
</div>
		<div class="clearfix"> </div>

		<?php $this->load->view('homeincludes/footer'); ?>


	



