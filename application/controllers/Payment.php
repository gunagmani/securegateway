<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("lib/braintree");	
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('session');			
			$this->load->model('Common_model');
			$this->load->library('email');
			$this->load->library('Messages');
			$this->load->library('Logentry');
		//$this->load->library("third_party/lib/braintree");	
		//include APPPATH . 'third_party/lib/braintree';	
    }
	
	public function index()
	{
		$this->accountPay();
		//$this->load->view("braintree/index");
		//$this->load->view("braintree/checkout");
	}
	
	
	public function accountPay()
	{
		/*if($this->session->userdata("account_id")==2)
	    {
		    $left_menu = 'includes/leftMenu_personal';
		}
	    else if($this->session->userdata("account_id")==3)
	    {
		    $left_menu = 'includes/leftMenu_bussiness';
		}	*/
		//echo("USerdata:".$this->session->userdata('account_id'));
		

		$where = array('id'=>$this->session->userdata("type_post"));
		
		$payData['Payment_Detail']=$this->Common_model->all_record_result("sg_user_account",$where);
				
		// echo $payData['Payment_Detail'][0]->monthly_pricing;
		$data = array('user_monthly_price'=>$payData['Payment_Detail'][0]->monthly_pricing,'user_yearly_price'=>$payData['Payment_Detail'][0]->yearly_pricing);
		
		$this->load->view("braintree/index",$data);
	}

	/*
		private function printJSON($var){
				echo json_encode($var);
		}

    public function get_token()
    {
        $token = $this->braintree_lib->create_client_token();
        $this->printJSON($token);
    }
	*/
	
	public function checkout()
	{
	/*	echo '<br><a href ="'.WEB_DIR.'/Securegateway/payment_reg/">Checkout</a><br><br><br>';*/
		/*var_dump($_POST);
		exit;*/
			
	//$amount = $_POST["amount"];
	    $amount = $_POST["rdio"];
		$plan = $_POST["plan"];
		$nonce = $_POST["payment_method_nonce"];
        $this->session->set_userdata('plan_sub', $plan);
		
		
		 
//echo $amount."====".$nonce; exit;


	$result = Braintree\Transaction::sale([
		'amount' => $amount,
		'paymentMethodNonce' => $nonce,
		'options' => [
			'submitForSettlement' => true
		]
	]);


	if ($result->success || !is_null($result->transaction)) {
		$transaction = $result->transaction;
		//header("Location: transaction.php?id=" . $transaction->id);
	
		
		$transaction_id = $transaction->id;
		$transaction_amount = $transaction->amount;
		$this->session->set_userdata('transaction_id', $transaction_id);
		$this->session->set_userdata('transaction_amount', $transaction_amount);
		
		//echo "transaction success".$transaction->amount;
		//exit;
		
		if($this->session->userdata("payment_redirect")==3)
		{
		redirect('user/payment_user_reg');
		}
		else
		{	
		redirect('Securegateway/payment_reg');
		}
		
		
	} else {
		$errorString = "";

		foreach($result->errors->deepAll() as $error) {
			$errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
		}

		$_SESSION["errors"] = $errorString;
		//header("Location: index.php");
			echo "Errors:";
			}
	}    //Checkout Done 
	
	public function accountRenewal()
	{
		
	}
	
	public function accountUpgrade()
	{
		
	}
	
	public function accountExpireCheck()
	{
		
	}
	
	public function accountInvoice()
	{
		
	}
	
	public function accountBilling()
	{
		
	}

	
	
}
?>
