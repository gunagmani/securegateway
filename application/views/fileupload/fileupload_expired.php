<div id="page-wrapper">

					

		  <div class="header"> 
		  
		  <?php if(isset($expiry_message))
		  {
			  ?>
                       	  <div class="alert alert-danger">
                             <h3 class="page-header text-center">
                           <?php echo $expiry_message; ?> </h3>
                            </div>
						
						
		  <?php } ?>		
				</div>		
			
	<div id="page-inner">					
						<div class="dashboard-cards" id="securewrapper"> 
								<div class="row">		
						
										<?php 
										if($this->session->userdata("account_id")==1)
										{	
										?>	


	
										
										<div class="col-sm-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-12 col-sm-4 col-md-4 col-lg-4">


										<div class="panel price panel-red">
												<div class="panel-heading  text-center">
													<h3>Personal Plan</h3>
												</div>
												<div class="panel-body text-center">
													<p class="lead" style="font-size:40px"><strong>$4.99 / Month</strong></p>
												</div>
													<ul class="list-group list-group-flush text-center">
													<li class="list-group-item"><i class="icon-ok text-danger"></i>&nbsp; </li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> &nbsp;</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i>&nbsp; </li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> 5 GB</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i>  Dual Authentication</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> Email Support</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i>&nbsp; </li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i>&nbsp; </li>
													</ul>
													<div class="panel-footer">
													<form method="post" action="<?php echo base_url('Upgrade_payment'); ?>">
													<input type="hidden" value="2" name="upgrade_plan">

													<input type="submit" class="btn btn-lg btn-block btn-danger" name="submit" value="BUY NOW">
													</form>
													</div>
											</div>
											
										</div>
									
<!-- /PRICE ITEM -->



									<div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4">

									<!-- PRICE ITEM -->
									<div class="panel price panel-blue">
									<div class="panel-heading arrow_box text-center">
									<h3>Business Plan</h3>
									</div>
									<div class="panel-body text-center">
									<p class="lead" style="font-size:40px"><strong>$9.99 / Month</strong></p>
									</div>
									<ul class="list-group list-group-flush text-center">
									<li class="list-group-item"><i class="icon-ok text-info"></i> 5 GB Space</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Dual Authentication</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> File Retention</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Sub Users</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Personal Folders</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Download Notification</li>
										<li class="list-group-item"><i class="icon-ok text-info"></i>Chat Support</li>
											<li class="list-group-item"><i class="icon-ok text-info"></i>Email Support</li>

									</ul>
									<div class="panel-footer">


									<button type="button" class="btn btn-lg btn-block btn-danger" data-toggle="modal" data-target="#myModal">BUY NOW</button>

									</div>
									</div>
									<!-- /PRICE ITEM -->


									</div>

					    
                        <?php 
						}
						else if($this->session->userdata("account_id")==2)
						{
						
                        ?>	
                       
					   <div class="row">	
		
		
		<?php if($status==0)
		{
			?>
<div class="col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-12 col-sm-4 col-md-4 col-lg-4">

<!-- PRICE ITEM -->
<div class="panel price panel-red">
<div class="panel-heading  text-center">
<h3>Personal Plan</h3>
</div>
<div class="panel-body text-center">
<p class="lead" style="font-size:40px"><strong>$4.99 / Month</strong></p>
</div>
<ul class="list-group list-group-flush text-center">
													<li class="list-group-item"><i class="icon-ok text-danger"></i> &nbsp;</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> &nbsp;</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> &nbsp;</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> 5 GB</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i>  Dual Authentication</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> Email Support</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i> &nbsp;</li>
													<li class="list-group-item"><i class="icon-ok text-danger"></i>&nbsp; </li>
													</ul>
<div class="panel-footer">
<form method="post" action="<?php echo base_url('Renewal_payment'); ?>">
<input type="hidden" value="2" name="upgrade_plan">

<input type="submit" class="btn btn-lg btn-block btn-danger" name="submit" value="Renewal">
</form>
</div>
</div>

</div>
		<?php } ?>
<!-- /PRICE ITEM -->



<div class="col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-12 col-sm-4 col-md-4 col-lg-4">

<!-- PRICE ITEM -->
<div class="panel price panel-blue">
<div class="panel-heading arrow_box text-center">
<h3>Business Plan</h3>
</div>
<div class="panel-body text-center">
<p class="lead" style="font-size:40px"><strong>$9.99 / Month</strong></p>
</div>
<ul class="list-group list-group-flush text-center">
									<li class="list-group-item"><i class="icon-ok text-info"></i> 5 GB Space</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Dual Authentication</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> File Retention</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Sub Users</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Personal Folders</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Download Notification</li>
										<li class="list-group-item"><i class="icon-ok text-info"></i>Chat Support</li>
											<li class="list-group-item"><i class="icon-ok text-info"></i>Email Support</li>

									</ul>
<div class="panel-footer">
<button type="button" class="btn btn-lg btn-block btn-danger" data-toggle="modal" data-target="#myModal">BUY NOW</button>
</div>
</div>
<!-- /PRICE ITEM -->


</div>
</div>
						
					  



					  <?php 
						}
						else if($this->session->userdata("account_id")==3)
						{
							
							if($this->session->userdata("role_id")==1 && $status==0)
							{
									 
	
                        ?>	
						
						
						
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<!-- PRICE ITEM -->
<div class="panel price panel-blue">
<div class="panel-heading arrow_box text-center">
<h3>Business Plan</h3>
</div>
<div class="panel-body text-center">
<p class="lead" style="font-size:40px"><strong>$9.99 / Month</strong></p>
</div>
<ul class="list-group list-group-flush text-center">
									<li class="list-group-item"><i class="icon-ok text-info"></i> 5 GB Space</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Dual Authentication</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> File Retention</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Sub Users</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Personal Folders</li>
									<li class="list-group-item"><i class="icon-ok text-info"></i> Download Notification</li>
										<li class="list-group-item"><i class="icon-ok text-info"></i>Chat Support</li>
											<li class="list-group-item"><i class="icon-ok text-info"></i>Email Support</li>

									</ul>

<div class="panel-footer">
<form method="post" action="<?php echo base_url('Renewal_payment'); ?>">
<input type="hidden" value="3" name="upgrade_plan">
<input type="submit" class="btn btn-lg btn-block btn-danger" name="submit" value="Renewal">
</form>
</div>
</div>
<!-- /PRICE ITEM -->
</div>


						
						
						
						<?php 
						}
						else if($this->session->userdata("role_id")==2)
					    {
						?>
						
					<br><br><center><h3> Please Contact your admin for renewal. </h3></center><br><br>	
						<?php
						}
						}
					    ?>
						
						<!--
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol> 
					-->
							


	
		
		
		
	
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bussiness Upgrade</h4>
      </div>
      <div class="modal-body">
	
	  	 <div class="row">
        <div class="input-field col s7">
       <form method="post" action="<?php echo base_url('Upgrade_payment'); ?>" id="form_comapny">
      

          <input type="hidden" value="3" name="upgrade_plan">
          <input id="c_name" name="company_name" id="c_name" type="text" class="validate" value="" placeholder="Company Name" required>
       
	  
      </div>

   </div> 
   <div class="row">
   <div id="error_cname" style="margin-left:6px;">
                <p> </p>
             </div>
   </div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="cname_close" data-dismiss="modal">Close</button>
		<input type="submit" class="btn btn-primary" id="sub_cname" name="sub" value="Payment"> 
      </div>
    </div>
</form>
  </div>
</div>



</div>
</div>

<span style="display: none;">
 <form action="<?php echo site_url('/fileupload/upload'); ?>" id="my-dropzone" class="dropzone">
					
</form>
</span>