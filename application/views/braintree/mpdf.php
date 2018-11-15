<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <style>
        *
        {
            margin:0;
            padding:0;
            font-family:Arial;
            font-size:10pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-family:Arial;
            font-size:10pt;
            margin:0;
            padding:0;
        }
         
        p
        {
            margin:0;
            padding:0;
        }
         
        #wrapper
        {
            width:180mm;
            margin:0 15mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }
         
        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: 149mm;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }
         
        #footer
        {   
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div id="wrapper">
            
    <div id="content">
         
        <div >
		            <table>
            <tr>
                <td style="width:50%;"><img src="http://www.qrsolutions.in/templates/zt_femto/images/presets/preset2/logo@2x.png"></td>
               
              <td style="width:50%;">Email Id: support@securegatewat.io<br />Phone No: 9789025087<br /></td>
            </tr>
			  </table>
		</div>
		</div>
    <h2 style="text-align:center; font-weight:bold; padding-top:5mm;">Transaction History</h2>
   
    
         
         
    <div id="content">
         
        <div id="invoice_body">
            <table>
            <tr style="background:#eee;">
                <td style="width:10%;"><b>No</b></td>
                <td style="width:15%;"><b>Name</b></td>
                <td style="width:15%;"><b>Plan</b></td>
				<?php 
											if($this->session->userdata("account_id")=='3')
											{
											?>
                <td style="width:15%;"><b>Role</b></td>
											<?php } ?>
                <td style="width:15%;"><b>Type</b></td>
                <td style="width:15%;"><b>Amount</b></td>
				 <td style="width:15%;"><b>Transaction  Id</b></td>
				  <td style="width:15%;"><b>Transaction Date</b></td>
            </tr>
            </table>
             
            <table>
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
                                            
                                            <td style="width:10%;"><?php echo $i; ?></td>
                                            <td style="width:15%;"><?php echo $username; ?></td>
                                            <td style="width:15%;">									
											<?php echo $plan; ?></td>
											
											<?php 
											if($this->session->userdata("account_id")=='3')
											{
											?>
                                             <td style="width:15%;"> <?php 
											 
											 if($plan == "Bussiness Plan")
											 {
											 if($role_id == 1) { echo "Admin"; } else { echo "User"; }
											 }
											 else
											 {
											 echo "_";
											 }
											 ?></td>
											 
											<?php } ?>
											 <td style="width:15%;">
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
											<td style="width:15%;">$ <?php echo $Amount; ?></td>
											<td style="width:15%;"><?php echo $Transactionid; ?></td>
											<td style="width:15%;"><?php echo $Paymentdate; ?></td>
										</tr>
									<?php 
									$i++;
									} ?>
                                      
            </table>
        </div>
       
         
       
    </div>
     

     
    </div>
     
    
     
</body>
</html>
