<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_History extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
  	
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('session');			
	       $this->load->model('Transaction_Model');
	       $this->load->model('Common_model');
	         $this->load->library('email');
				 $this->load->library('Messages');
				 $this->load->helper('number');
				
				if($this->session->userdata("account_id")=='')
				{
				 redirect(base_url());
				}
				
		
    }
	
	public function index()
	{
		
		
	if($this->session->userdata("account_id")==1)
		{
		   $left_menu = 'includes/leftMenu_free';
		   
		}
		else if($this->session->userdata("account_id")==2)
	    {
		    $left_menu = 'includes/leftMenu_personal';
		}
	    else if($this->session->userdata("account_id")==3)
	    {
		    $left_menu = 'includes/leftMenu_bussiness';
		}
		 $this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		
		
		
			if($this->session->userdata("account_id")=='')
				{
				 redirect(base_url());
				}
		
		
		
		$order_detail['payment_info']= $this->transactions();
	
	
			$this->load->view('braintree/paymentshistory', $order_detail);
			$this->load->view('includes/bottom_dashboard');
	}
	
	
	
	public function transactions()
	{
		
    $customerId = $this->session->userdata("customer_id");
		$userId = $this->session->userdata("user_id");
		//echo $customerId; exit;
		if($this->session->userdata("account_id")==3)
		{
			
			$where = array('sg_payment_details.customer_id'=>$customerId);
			$or_where = array('sg_payment_details.user_id'=>$userId);
			//print_r($where); exit;
			 
		$order_data = $this->Transaction_Model->order_history($where, $or_where);
		}
		else
		{
			
			$where = array('sg_payment_details.user_id'=>$userId);
		$order_data = $this->Transaction_Model->order_history($where);
		
		}

	//$order_data = $this->Transaction_Model->order_download();
	

 return $order_data;
	
	
	} 
	

	

	public function transaction_download()
	{
	
		$filename = time()."_order.pdf";
	    $pdf_data['payment_info'] = $this->transactions();
	//print_r($pdf_data['payment_info']);

		$html = $this->load->view('braintree/mpdf',$pdf_data,true);
//MPDF	


//print_r($html); exit;
	require_once APPPATH.'third_party/mpdf/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output($filename, "D");	
	
} 

public function invoice_download($transactionid)
	{
//Fetching	




    $filename = $transactionid."_order.pdf";
	$pdf_data['payment_info'] = $this->Transaction_Model->invoice_download($transactionid);
	

	
//User Details	
    $where = array('id' => $this->session->userdata("user_id"));
	$pdf_data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);				 
    	 	  
			
    $html = $this->load->view('braintree/invoice',$pdf_data,true);
	
	
//MPDF	
	require_once APPPATH.'third_party/mpdf/autoload.php';  
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output($filename, "D");		
} 
	
	
	
	
	
}
?>
