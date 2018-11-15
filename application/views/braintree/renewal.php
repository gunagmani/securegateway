<?php //include("./braintree_includes/braintree_init.php"); ?>
<?php $this->load->view("braintree_includes/braintree_init"); ?>

<html>
<?php //include("./braintree_includes/head.php"); ?>
<?php $this->load->view("braintree_includes/head"); ?>
<body>

    <?php //include("./braintree_includes/header.php"); ?>
	<?php //$this->load->view("braintree_includes/header"); ?>
	<?php //$this->load->view("header"); ?>
	<?php 
	//Payment Details
	$monthlyAmt=$user_monthly_price;
	$yearlyAmt=$user_yearly_price;
	
	?>
    <div class="main-wrapper">
        <div class="checkout container-fluid">
			<div class="row">
					<div class="col-md-7 left-side">
						<div id="login-content">
							<header>          
							  <h3>Your Space for<br>Secure File Transfer</h3>
							  <span>Blast off today and join the fun!<br/>Getting started is only a few clicks away</span>
							</header>
							<!--<button class="btn btn-default">Learn More</button><button class="btn btn-default">Learn More</button> -->
						</div>
					  </div>
			<div class="col-md-5 right-side">			
				
				<?php
			
				$plan='';
				if($this->session->userdata("type_post")==2)
				{
					$plan = 'Personal Plan';
				}	
else if($this->session->userdata("type_post")==3)
{
	$plan = 'Bussiness Plan';
}	

				?>
				
            <header>
                <h1>Payment Transaction</h1>
                <p>
                    Make a payment with Braintree using PayPal or a card
                </p>
            </header>
			
            <form method="post" id="payment-form" action="<?php echo WEB_DIR;?>Renewal_payment/checkout/">
                <section>
                    <h3><?php echo $plan; ?></h3>
					<label for="monthlyPlan">                        
                        <div class="input-wrapper amount-wrapper">
                           <input class="radio-buttons" type="radio" name="rdio" id ="M" value="<?php echo $monthlyAmt;?>" checked><span class="input-label">Monthly</span>
                        </div>						
                    </label>
					<label for="yearlyPlan">                        
                        <div class="input-wrapper amount-wrapper">                           
						   <input class="radio-buttons" type="radio" name="rdio" id ="Y" value="<?php echo $yearlyAmt;?>"><span class="input-label">Yearly</span>
                        </div>
                    </label>
					
					<br/><br/>
                    <label for="amount">
                        <span class="input-label">Subscription Amount(USD $)</span>
                        <div class="input-wrapper amount-wrapper">
                            <input class="form-control" id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="<?php echo $monthlyAmt;?>" disabled>
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
									
	<div class="input-wrapper form-group">
                           <input type="checkbox" class="coupon_question" name="coupon_question" value="1" onchange="valueChanged()"/> Accept the terms and condition 
                        </div>
					
					<div class="input-wrapper form-group">
					
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <input id="plan" name="plan" type="hidden" value="M" />
                <button class="btn btn-primary" id="paysub" type="submit" disabled><span>Pay Subscribe</span></button>
				<a href="<?php echo WEB_DIR.'securegateway'; ?>" class="btn btn-default"> Cancel </a>
				</div>
					<div class="input-wrapper form-group">	
			<Strong>	Please do not refresh the page and wait while we are processing your payment. This can take a few minutes. </strong>
			</div>
                </section>

				</div>
			</div>  <!-- Form Row Completed -->
        </div>
		<div id="wait" class="loader"></div>
    </div>
    
	<script src="<?php echo WEB_DIR;?>assets/js/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.9.2/js/dropin.min.js"></script>
	<script>
	$("input[name='rdio']").change(function(){
    // Do something interesting here
			//alert("Radio.... Click....");
		});
	
			function valueChanged()
{
    if($('.coupon_question').is(":checked"))   
        
		{
			document.getElementById("paysub").disabled = false;
		}
	else
	{
		document.getElementById("paysub").disabled = true;
	}
       
}
	
		$(document).ready(function(){
			//$("#amount").val("-"+$(".radio-buttons").value);
			$( ".radio-buttons" ).click(function() {
					//alert("Radio Clicked");
					
				$( "#amount" ).val(this.value);
				var selected_Id = $('input[name="rdio"]:checked').attr('id');
					$( "#plan" ).val(selected_Id);
				
			});
		
		});
	</script>
	<script>
	$(window).load(function(){
		$("#wait").show();
		setTimeout(function(){$("#wait").hide()},2000);
   // PAGE IS FULLY LOADED  
   // FADE OUT YOUR OVERLAYING DIV
   //document.getElementById("paysub").disabled = true;
      //setTimeout(function(){document.getElementById("paysub").disabled = false;},5000);

});
	</script>
	
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "<?php echo(Braintree\ClientToken::generate()); ?>";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
			   document.getElementById("paysub").disabled = true;
            });
          });
        });
    </script>
    <script src="<?php echo WEB_DIR; ?>assets/js/braintree/demo.js"></script>
</body>
</html>
