<?php
 class Common_model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  	
		
		
   public function insertVal($table,$data)
  {
        $query = $this->db->insert($table,$data);
        //return $this->db->affected_rows();
		return $this->db->insert_id();
  }
  
  
  
  public function all_record($table,$where=0)

	{
      if($where!='')
	  {
	  $this->db->where($where);
	  }

      $query = $this->db->get($table); 
	  $value = $query->row(); 
	   //return $query->result(); 
	  return $value;	   
	  

	}
	
	 
  public function all_record_result($table,$where=0)

	{
      if($where!='')
	  {
	  $this->db->where($where);
	  }

      $query = $this->db->get($table); 
	  //$value = $query->row(); 
	   return $query->result();
//$value =  $this->db->last_query();	   
	 // print_r($value);	   
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
        $query = $this->db->query("CALL Proc_sg_File_list_new('".$value."')");
        return $query->result();
    }

public function profile()
{
	$this->db->select('tbl_user.username,tbl_user.userid,tbl_usercategory.typee');
$this->db->from('tbl_user');
$this->db->join('tbl_usercategory','tbl_usercategory.usercategoryid=tbl_user.usercategoryid');
$query=$this->db->get();
$data=$query->result_array();
}

public function notification()
{
/* $this->db->select('sud.id,sud.firstname,sud.lastname,sud.email,susd.notification_1,susd.notification_2,susd.notification_3');
$this->db->from('sg_user_details as sud');
$this->db->join('sg_user_subscribe_details as susd','susd.user_id=sud.id'); */

$this->db->select('sud.id,sud.firstname,sud.lastname,sud.email,susd.notification_1,susd.notification_2,susd.notification_3');
$this->db->from('sg_user_details as sud');
$this->db->join('sg_user_subscribe_details as susd','susd.user_id=sud.id');
/*$whereArray = array('date(notification_1)' => 'date("2018-12-21")','date(notification_2)' => 'date("2018-12-21")','date(notification_3)' => 'date("2018-12-21")');*/
/*$whereArray = array('date(notification_1)' => 'date("2018-12-21")','date(notification_2)' => 'date("2018-12-21")','date(notification_3)' => 'date("2018-12-21")');*/
//$query=$this->db->get_where(date('notification_1') , date("2018-12-21"));
$query=$this->db->get();
$data=$query->result_array();
}


public function notification_array($dateValue)
{
	$query = $this->db->query("CALL proc_sg_subscribe_notification('".$dateValue."')");
        return $query->result_array();
}

public function notification_all($dateValue)
{
	$query = $this->db->query("CALL proc_sg_subscribe_notification('".$dateValue."')");
        return $query->result();
	
/* $this->db->select('sud.id,sud.firstname,sud.lastname,sud.email,susd.notification_1,susd.notification_2,susd.notification_3');
$this->db->from('sg_user_details as sud');
$this->db->join('sg_user_subscribe_details as susd','susd.user_id=sud.id'); */

//$this->db->select('*');
//$this->db->from('sg_user_details');
//$this->db->join('sg_user_subscribe_details as susd','susd.user_id=sud.id');
/*$whereArray = array('date(notification_1)' => 'date("2018-12-21")','date(notification_2)' => 'date("2018-12-21")','date(notification_3)' => 'date("2018-12-21")');*/
/*$whereArray = array('date(notification_1)' => 'date("2018-12-21")','date(notification_2)' => 'date("2018-12-21")','date(notification_3)' => 'date("2018-12-21")');*/
//$query=$this->db->get_where(date('notification_1') , date("2018-12-21"));
/*$query=$this->db->get();
$data=$query->result_array();*/
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