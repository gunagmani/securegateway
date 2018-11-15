

<div id="page-wrapper">
						
<div id="success"><?php echo $this->messages->getMessageFront(); ?></div>
		  <div class="header"> 
                   
						<h1 class="page-header">
                            Transaction History
                        </h1>
					</div>	
					   <div id="page-inner">

					<div class="row" id="securewrapper">
                <div class="col-md-11" style="margin-left:40px;">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                         Order History
                        </div>
						<div class="card-content">
							<div class="text-right">
								<button type="button" class="btn btn-success" onclick="window.location='<?php echo WEB_DIR;?>order_history/transaction_download'">Download</button> 
							</div>
						</div>
                        <div class="card-content">
                             <div class="table-responsive">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
											<th>Name</th>
											<th>Plan</th>
											
											<?php 
											if($this->session->userdata("account_id")=='3')
											{
											?>
											<th>Role</th>
											
                                            <?php } ?>
											<th>Type</th>
											<th>Amount</th>
    										<th>Transaction  Id</th>
										    <th>Transaction Date</th>
										    <th>Invoice Download</th>
													
													
                                        </tr>
                                    </thead>
                                     <tbody>
									<?php
									$i=1;
									
									foreach ($payment_info as $values) 
	                                {
		                            $id= $values ->customer_id;
		                            $user_id= $values ->user_id;
		                            $username= $values ->firstname;
		                            $Currency= $values ->Currency;
									 $Amount= $values ->Amount;
		                            $Transactionid= $values ->Transactionid;
									$Paymentdate= $values ->paymentdate;
									$role_id= $values ->role_id;
									$type= $values ->subscriptiontype;
									
									$plan= $values ->plan;
		                           
		                            //$owner= $values -> Ownership;
									?>
                                        <tr class="odd gradeX">
                                            
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $plan; ?></td>
											 
											 <?php 
											if($this->session->userdata("account_id")=='3')
											{
											?>
											 <td>
											 <?php 
											 
											 if($plan != 'Personal Plan')
											 {
											 if($role_id == 1) echo "Admin"; else echo "User";
											 }
											 else
											 {
												 echo ' -';
												 
											 }
											 ?>
											 </td>
											<?php } ?>
											 	 <td>
											 <?php 
											 
											 if($type == 'M')
											 {
											 echo "Monthly";
											 }
											 else
											 {
											 echo 'Yearly';
												 
											 }
											 ?>
											 </td>
											 
                                            <td><?php echo $Amount; ?></td>
                                        
                                             <td><?php echo $Transactionid; ?></td>
									       <td><?php echo $Paymentdate; ?></td>
										    <td>
											 <a class="btn btn-success" href="<?php echo WEB_DIR;?>/Order_History/invoice_download/<?php echo $Transactionid; ?>"> Download  </a> 
											
											</td>  
										</tr>
									<?php 
									$i++;
									} ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div> 
  </div>
									
	
	


		
         
		
		

				
				