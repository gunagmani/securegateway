<?php
 class Transaction_Model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  	
		
		
	
		 
  public function order_history($where,$or_where=0)
	{
		
	 
 
	  if($where!='')
	  {
	  $this->db->where($where);
	  }
	  
	  if($or_where!='')
	  {
      $this->db->or_where($or_where);
	  }
	  
       $customerId = $this->session->userdata("customer_id");
	  $this->db->select("sg_payment_details.customer_id,sg_payment_details.user_id, sg_payment_details.plan, sg_payment_details.subscriptiontype, sg_payment_details.Currency, sg_payment_details.Amount, sg_payment_details.Transactionid,sg_payment_details.paymentdate,sg_user_details.firstname, sg_user_details.role_id");
  $this->db->from('sg_payment_details');
  $this->db->join('sg_user_details', 'sg_user_details.id = sg_payment_details.user_id');
 
  
  $query = $this->db->get();
  
  return $query->result();

	}
	
	
	
	
	
	public function order_download()

	{
		
		/*$sql1 = "SELECT a.*,b.department_name, b.id as department_id FROM Securegateway.sg_access_parent a join Securegateway.sg_department b on a.department_id = b.id where user_id = 82 and a.customer_id = '$customer_id' and download = 1';
        */
	/* $sql = "select sap.id as uid,sap.user_id,sap.customer_id,sd.id,sd.department_name from  sg_access_parent sap 
INNER JOIN sg_department sd ON sap.department_id=sd.id 
where sap.user_id='$user_id' and sap.customer_id='$customer_id' and upload='1'"; */

$sql = "SELECT * FROM sg_payment_details";
/*$this->db->select('(SELECT SUM(payments.amount) FROM sg_payment_details WHERE payments.invoice_id=7') AS amount_paid', FALSE);*/


	
	$query = $this->db->query($sql);
        return $query->result();
	}
	
	
	
	public function invoice_download($transactionid)

	{
		
		$this->db->select('*');
$this->db->from('sg_payment_details');
$wharray = array('Transactionid =' => $transactionid);
$this->db->where($wharray);	
$query = $this->db->get();
	
        return $query->result();
	}
  
}
?>