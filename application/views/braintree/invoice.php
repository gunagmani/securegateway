<html>
<head>
    <meta charset="utf-8">
    
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 0px;
        border: 1px solid #ddd;
        
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 15px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top" style="background-color:#eee;">
                <td colspan="2">
                    <table>
                        <tr >
                            <td class="title" style="padding-top:20px;">
                               <a href="https://www.qrsolutions.com.au"> <img src="http://www.qrsolutions.in/templates/zt_femto/images/presets/preset2/logo@2x.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                <h3>QR Solutions</h3>
        No 9, George Street,NSW - 2137<br />
        (+61) 2 8004 5244<br />
     sales@qrsolutions.com.au<br />

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
			<tr class="information">
                <td colspan="2" style="padding-left:200px;">
				<h2 style="color:#A0262F;"> Securegateway Invoice </h2>
				</td>
				
				</tr>
			
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
<h3> Billing Address</h3>
                                   <h4><?php echo $user_details->firstname; ?></h4>
                                <?php echo $user_details->email; ?>
                            </td>
                            
                            <td>
                                Invoice No: <?php echo $payment_info[0]->id; ?><br>
                                Date:<?php 
		  $date = $payment_info[0]->Paymentdate; 
		  $createDate = new DateTime($date);
          $date_pdf = $createDate->format('d-m-Y');
          echo $date_pdf;
		  ?><br>
                               
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                   Transaction Id
                </td>
            </tr>
            
            <tr class="details">
                <td>
                   Card Payment 
                </td>
                
                <td>
                  <?php echo $payment_info[0]->Transactionid; ?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                  Plan
                </td>
                
                <td>
                   Amount
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   

                    <?php 
								echo $payment_info[0]->plan; ?> ( 
								<?php 	 
											 if($payment_info[0]->subscriptiontype == 'M')
											 {
											 echo "Monthly";
											 }
											 else
											 {
											 echo 'Yearly';
												 
											 }
											 ?>

 )
                </td>
                
                <td>
                    $ <?php echo $payment_info[0]->Amount; ?>
                </td>
            </tr>
            
            
            
            
            
            <tr class="total">
                <td></td>
                
                <td>
                  Total: $ <?php echo $payment_info[0]->Amount; ?>
                </td>
            </tr>
			
			
			 <tr class="total top" style="background-color:#ddd;text-align:center;">
               
                
                <td colspan="2" style="padding:15px;">
                Invoice was created on a computer and is valid without the signature and seal.<br>
				Website Designed by <strong style="color:red">QR Solutions</strong>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
