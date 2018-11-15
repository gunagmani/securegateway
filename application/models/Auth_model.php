<?php
 class Auth_model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  	
		
		
   public function regForm($data)
  {
   

        $query = $this->db->insert('sg_user_auth',$data);
		$last_id = $this->db->insert_id();
        //return $this->db->affected_rows();
        return  $last_id;
  }
  
  public function loginCheck($data)
	{
	 
	  $uname=$data['uname'];
	  $pass=$data['password'];   
	  $where = array('username' => $uname,'password' =>$pass);
	  $this->db->where($where);
      $query = $this->db->get('sg_user_auth'); 
	  return $query->row();  	
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