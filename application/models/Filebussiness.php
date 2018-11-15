<?php
 class Filebussiness extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  	
		
		
	 
  public function department_access($customer_id,$user_id)

	{
		
		/*$sql1 = "SELECT a.*,b.department_name, b.id as department_id FROM Securegateway.sg_access_parent a join Securegateway.sg_department b on a.department_id = b.id where user_id = 82 and a.customer_id = '$customer_id' and download = 1';
        */
		$sql = "select sap.id as uid,sap.user_id,sap.customer_id,sd.id,sd.department_name from  sg_access_parent sap 
INNER JOIN sg_department sd ON sap.department_id=sd.id 
where sap.user_id='$user_id' and sap.customer_id='$customer_id' and upload='1'";


		$query = $this->db->query($sql);
        return $query->result();
	}
	
	public function download_access($customer_id,$user_id)

	{
		
		/*$sql1 = "SELECT a.*,b.department_name, b.id as department_id FROM Securegateway.sg_access_parent a join Securegateway.sg_department b on a.department_id = b.id where user_id = 82 and a.customer_id = '$customer_id' and download = 1';
        */
		$sql = "select sap.id as uid,sap.user_id,sap.customer_id,sd.id,sd.department_name from  sg_access_parent sap 
INNER JOIN sg_department sd ON sap.department_id=sd.id 
where sap.user_id='$user_id' and sap.customer_id='$customer_id' and download='1'";


		$query = $this->db->query($sql);
        return $query->result();
	}
	
	 
	 public function department_download($customer_id,$user_id)

	{
		
		/*$sql1 = "SELECT a.*,b.department_name, b.id as department_id FROM Securegateway.sg_access_parent a join Securegateway.sg_department b on a.department_id = b.id where user_id = 82 and a.customer_id = '$customer_id' and download = 1';
        */
		$sql = "select sap.id as uid,sap.user_id,sap.customer_id,sd.id,sd.department_name from  sg_access_parent sap 
INNER JOIN sg_department sd ON sap.department_id=sd.id 
where sap.user_id='$user_id' and sap.customer_id='$customer_id' and download='1'";


		$query = $this->db->query($sql);
        return $query->result();
	}
		
		
	 public function file_receive($user_id)

	{
		
		/*$sql1 = "SELECT a.*,b.department_name, b.id as department_id FROM Securegateway.sg_access_parent a join Securegateway.sg_department b on a.department_id = b.id where user_id = 82 and a.customer_id = '$customer_id' and download = 1';
        */
		/*
		$sql = "select sap.id as uid,sap.user_id,sap.customer_id,sd.id,sd.department_name from  sg_access_parent sap 
INNER JOIN sg_department sd ON sap.department_id=sd.id 
where sap.user_id='$user_id' and sap.customer_id='$customer_id' and download='1'";
*/
$sql = 
"select sap.* from sg_file sap INNER
JOIN sg_file_share sd ON sap.id=sd.file_id 
where sd.user_id='$user_id' and sap.status=1";


		$query = $this->db->query($sql);
		
        return $query->result();
		
		
	
	}	
		

	  public function record_sum($table=0,$where=0)

	{
      if($where!='')
	  {
	  $this->db->where($where);
	  }
      $query = $this->db->select_sum('file_Size');
      $query = $this->db->get($table); 
	  //$value = $query->row(); 
	   return $query->row(); 
	  //return $value;	   
	}
	
	
function record_update($table=0,$where=0,$data=0)
{


if($where!='')
{
$this->db->where($where);	
}
$this->db->update($table,$data);
return $this->db->affected_rows();
//$value =  $this->db->last_query();
//echo $value; exit;
}	


function add_size($table=0,$where=0,$data=0)
{
	$value = 'size_used+'.$data;


$this->db->set('size_used', $value, FALSE);
$this->db->where($where);
$this->db->update($table);
return $this->db->affected_rows();	

}

function decrese_size($table=0,$where=0,$data=0)
{
	$value = 'size_used-'.$data;
$this->db->set('size_used', $value, FALSE);
$this->db->where($where);
$this->db->update($table);
return $this->db->affected_rows();	

}	

public function pc($value)
    {
        $query = $this->db->query("CALL Proc_sg_File_list('".$value."')");
        return $query->result();
    }







	 /*
	 
  	 public function user_data()
  {
   
       $query = $this->db->get('user');
       return $query->result(); 
  }	
  
   	 public function email_model($where_email)
  {
             $this->db->select('email');
			 $this->db->where($where_email);
             $query = $this->db->get('user');
             return $query->row(); 
  }	
  
  
  
  	 public function platform()
  {
       $query = $this->db->get('platform');
       return $query->result(); 
  }	  
		
		
	function user_edit_view($id)
{
 $query =  $this->db->get_where('user',$id);
   return $query->row();
 }
 	
		
  function UserEdit($data,$options)
{


$this->db->where($options);
$this->db->update('user',$data);
return $this->db->affected_rows();
 }		
		
		
		
  function DeleteUser($id)
{
   $this->db->where('User_ID', $id);
   $query=$this->db->delete('user'); 
   return $this->db->affected_rows();
}
		
		
		
	public function login_check($data)
	{
	 
	  $uname=$data['uname'];
	  $pass=$data['password'];
        $query = $this->db->get_where('login', array('uname' => $uname,'password' =>$pass)); 
        return $query->row();  
	}
	
	
	 public function project_form()
  {
   
       $query = $this->db->get('estimates_master');
       return $query->result(); 
  }
  
  
  
  
   	 public function developer_data($data)
  {
   
        $query = $this->db->insert('role',$data);
        return $query;
   
  }
  
  
  	 public function developer_form()
  {
   
       $query = $this->db->get('role');
       return $query->result(); 
  }
	
public function projectname_dropdown()
  {
   
       $query = $this->db->get('estimates_master');
       return $query->result(); 
  }
  public function developername_dropdown()
  {
   
       $query = $this->db->get('role');
       return $query->result(); 
  }
  function delete_project($id)
{
   $this->db->where('ID', $id);
   $query=$this->db->delete('estimates_master'); 
   return $this->db->affected_rows();
}
   
 function project_form_edit($id)
{
 $query =  $this->db->get_where('estimates_master',$id);
   return $query->row();
 }
 
  function project_form_edit_save($data,$update_data)
{
	
$this->db->where($update_data);
$this->db->update('estimates_master',$data);
return $this->db->affected_rows();
 }
 
 
  function delete_developer($id)
{
   $this->db->where('ID', $id);
   $query=$this->db->delete('role'); 
   return $this->db->affected_rows();
}
 
  function dev_form_edit($id)
{
 $query =  $this->db->get_where('role',$id);
   return $query->row();
 }
 
  function dev_form_edit_save($data,$update_data)
{

	
$this->db->where($update_data);
$this->db->update('role',$data);
return $this->db->affected_rows();
 }
 
	*/
 }
?>