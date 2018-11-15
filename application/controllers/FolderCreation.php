<?php
Class FolderCreation extends CI_Controller{

	public function __construct()
		{
			
			    parent ::__construct();
				$this->load->database();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->helper('number');
				$this->load->model('Auth_model');
				$this->load->model('Common_model');
				$this->load->library('Messages');
				$this->load->library('Logentry');
				$this->load->library('form_validation');
				
				
	 $this->data['menu'] = "includes/leftMenu_bussiness";
				//$this->data['menu']="includes/mainmenu.php";
								
								
				if($this->session->userdata("account_id")=='')
				{
				 redirect(base_url());
				}
				
		if($this->session->userdata("account_id")==1)
		{
		   $this->data['left_menu'] = 'includes/leftMenu_free';
		}
		else if($this->session->userdata("account_id")==2)
	    {
		    $this->data['left_menu'] = 'includes/leftMenu_personal';
		}
	    else if($this->session->userdata("account_id")==3)
	    {
		    $this->data['left_menu'] = 'includes/leftMenu_bussiness';
		}
	
		
	}
	

	
	function header_value()
	{
		$this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($this->data['left_menu']);
		//$this->load->view('includes/mainmenu');
		
	}
	

   
	
	public function index()
	{		   
     
	 $where = array('customer_id'=> $this->session->userdata("customer_id"), 'status'=>1);
	 $data['department_data'] = $this->Common_model->all_record_result('sg_department',$where);

		$this->header_value();
		//$this->load->view('department/department_form', $data);
		//$this->load->view('folder/foldercreation_form', $data);
		$this->show_tree();
		$this->load->view('includes/jstreebottom');
	
	
	}	 
	
	function show_tree()
    {
        $this->form_validation->set_error_delimiters("", "");
         $this->form_validation->set_rules('node', 'node ', 'trim|required');
        //$this->load->view('messaging');
        if($this->form_validation->run()== false){
            //$this->load->view('show_tree');
            $this->load->view('folder/view_tree_folder');
            //$this->load->view('folder/tree_folder_view');			
        }else{
            //redirect('folder/foldercreation_form/');
            redirect('FolderCreation/show_tree/');
        }
    }
	
	function getChildrenDirect()
    {
		//echo "session id:".$this->session->userdata("customer_id");
        //$result = $this->Common_model->tree_department_all($this->session->userdata("customer_id"));
       // $result = $this->Common_model->tree_department_all(55);
		$custID= $this->session->userdata("customer_id");
		
        $itemsByReference = array();
		
		/*$sql = "SELECT id,department_name as name,department_name as text,0 as parent_id FROM sg_department";// where customer_id=$custID";*/
		$sql = "SELECT id,department_name as name,department_name as text,0 as parent_id FROM sg_department";// where customer_id=$custID";
		
		
				//$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
				$res=$this->db->query($sql);
					//var_dump($res->result_array);
				if($res->num_rows <=0){
				 //add condition when result is zero
				 echo 'No Records....';
				} else {
					//iterate on results row and create new index array of data
					while( $row = mysqli_fetch_assoc($res) ) { 
						$data[] = $row;
					}
		
		
		
		//print_r($result);//	exit;
// Build array of item references:
				foreach($data as $key => &$item) {
				   $itemsByReference[$item['id']] = &$item;
				   // Children array:
				   $itemsByReference[$item['id']]['children'] = array();
				   // Empty data class (so that json_encode adds "data: {}" ) 
				   $itemsByReference[$item['id']]['data'] = new StdClass();
			
			$getChildNodes = "SELECT id,service_type as name,service_type as text,child_id as parent_id from Securegateway_dev.sg_service_type where customer_id=$custID and child_id=".$item['id'];
				$resChildNodes = mysqli_query($conn, $getChildNodes);	
				//echo "Row Count:".$resChildNodes->num_rows;
				if($resChildNodes->num_rows <=0){
				 //add condition when result is zero
				 //echo "No Children";
				} else {
					//echo "records...";
						//print_r($resChildNodes);
						while( $rowChild = mysqli_fetch_assoc($resChildNodes) ) { 
						$dataChild[] = $rowChild;
						$itemsByReference [$item['id']]['children'][] = $rowChild;
							}	
							//print_r($dataChild);
				}
        }

// Set items as children of the relevant parent item.
        foreach($result as $key => &$item)
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
        foreach($result as $key => &$item) {
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                unset($result[$key]);
        }
        foreach ($result as $row) {
            $data[] = $row;
        }
		print_r($data);
				}
// Encode:
        echo json_encode($data);
    }
	
	function getTreeNodes()
    {
		//$custID=55;
		//echo "session id:".$this->session->userdata("customer_id");
        $result = $this->Common_model->tree_department_all($this->session->userdata("customer_id"));
        //$result = $this->Common_model->tree_department_all(55);

        $itemsByReference = array();
		/*echo "<hr>";
		print_r($result);//	exit;*/
// Build array of item references:
        foreach($result as $key => &$item) {
            $itemsByReference[$item['id']] = &$item;
            // Children array:
            $itemsByReference[$item['id']]['children'] = array();
            // Empty data class (so that json_encode adds "data: {}" )
            $itemsByReference[$item['id']]['data'] = new StdClass();
			
			/*$getChildNodes = "SELECT id,service_type as name,service_type as text,child_id as parent_id from Securegateway_dev.sg_service_type where customer_id=$custID and child_id=".$item['id'];
				$resChildNodes = mysqli_query($conn, $getChildNodes);	*/
				//$resChildNodes = $this->Common_model->tree_servicetype_all(55,$item['id']);	
				
				$resChildNodes = $this->Common_model->tree_servicetype_all($this->session->userdata("customer_id"),$item['id']);	
				
				//echo "Row Count:".$resChildNodes->num_rows;
					//echo "Child Data";
				//print_r($resChildNodes);echo "<hr>";
				if(!isset($resChildNodes)){
				 //add condition when result is zero
				 echo "No Children";
				} else {
					//echo "records...";
						//print_r($resChildNodes);
					//	while( $rowChild = mysqli_fetch_assoc($resChildNodes) ) { 
					foreach($resChildNodes as $rowChild){
						$dataChild[] = $rowChild;
						$itemsByReference [$item['id']]['children'][] = $rowChild;
							}	
							//print_r($dataChild);
				}
        }

// Set items as children of the relevant parent item.
        foreach($result as $key => &$item)
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
        foreach($result as $key => &$item) {
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                unset($result[$key]);
        }
        foreach ($result as $row) {
            $data[] = $row;
        }

// Encode:
		//print_r($data);
        echo json_encode($data);
        //print_r(json_encode($data));
    }
	
	public function create_root_node(){
		if(isset($_POST['dept_name'])) {
			//echo "Root Val:".$_GET['addroot'];
			//print_r($_GET['addroot']);
			//print_r($_POST['dept_name']);		

         
//Avoid Multi-Click	
	  $where = array('department_name'=> $_POST['dept_name'], 'customer_id'=>$this->session->userdata("customer_id"));
	  $data['user_details'] = $this->Common_model->all_record_result('sg_department',$where);
	  
	  $count = count($data['user_details']); 
     
	    if($count==0)
		{
//Create department			
			$data = array(
				'department_name'=>$this->input->post('dept_name'),
				'customer_id'=>$this->session->userdata("customer_id"),
				'status'=>1
            );
            $return_value = $this->Common_model->insertVal('sg_department',$data);
		   
		    $user_access_upload = array('department_id'=> $return_value, 'user_id' => $this->session->userdata("user_id"),'customer_id' => $this->session->userdata("customer_id"),'upload' => 1, 'download' => 1, 'status' => 1);
	     $upload_return = $this->Common_model->insertVal('sg_access_parent',$user_access_upload);
			 

			 $this->logentry->logcreate($this->session->userdata("user_id"), $return_value, 'Folder creation', 'Folder Created Successfully');
		}
		   
		   redirect(WEB_DIR.'foldercreation');			
		}
		else{
			echo "Error in Response";
		}
	}
	
	public function get_root_node_name(){
		if(isset($_POST['addroot'])) {		
			$data= $this->input->post('addroot');
			
			$this->db->where('id', $data[0]);
			$qc = $this->db->get('sg_department');
		//	print_r($qc);die;
			$q=$qc->result_array();
		//	print_r($q); die;
			//if($q->[0]['affected_rows']>0){
			if($this->db->affected_rows() == 1)	{
				echo $q[0]['department_name'];
			}
			else{
				echo "No-Matched";				//die;			
			}
		}
		else{
			echo "Error in Response";
		}
	}
	
	public function edit_root_node(){
		if(isset($_POST['dept_name_edit'])) {
			//echo "Root Val:".$_GET['addroot'];
			//print_r($_GET['addroot']);
			//print_r($_POST['addroot']);
			//$data[]=$this->input->post();
			$dpid=$this->input->post('file_id_edit');
			$data= array(				
				"department_name"=>$this->input->post('dept_name_edit')			
				);
				$this->db->where('id', $dpid);
				$this->db->update('sg_department', $data);		
				redirect(WEB_DIR.'foldercreation');
			/*echo($dpid);
			print_r($data); die;*/
			/*echo "Add Root:".$data[0]."<hr>";
			die;*/
			//$data[]=$this->input->get();	
			
					//print_r($data);die;//echo $data[0];*/
					//print_r($this->input->get());die;
			/* $this->db->where('id', $data[0]);
			$qc = $this->db->get('sg_department');
			$q=$qc->result_array(); */
			//echo "Dept Name:".$q[0]['department_name'];die;
			// print_r($q);die;
			//echo $q[0]['department_name'];
		}
		else{
			echo "Error in Response";
		}
	}
	
	public function folder_get_response(){
			//echo "Response:".$_GET['operation'];exit;
			
			if(isset($_GET['operation'])) {
				try {
					$result = null;
					switch($_GET['operation']) {
						case 'get_node':
							$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
							//$custID=55;
		//echo "session id:".$this->session->userdata("customer_id");
        $result = $this->Common_model->tree_department_all($this->session->userdata("customer_id"));
        //$result = $this->Common_model->tree_department_all(55);

        $itemsByReference = array();
		/*echo "<hr>";
		print_r($result);//	exit;*/
// Build array of item references:
        foreach($result as $key => &$item) {
            $itemsByReference[$item['id']] = &$item;
            // Children array:
            $itemsByReference[$item['id']]['children'] = array();
            // Empty data class (so that json_encode adds "data: {}" )
            $itemsByReference[$item['id']]['data'] = new StdClass();
			
			/*$getChildNodes = "SELECT id,service_type as name,service_type as text,child_id as parent_id from Securegateway_dev.sg_service_type where customer_id=$custID and child_id=".$item['id'];
				$resChildNodes = mysqli_query($conn, $getChildNodes);	*/
				//$resChildNodes = $this->Common_model->tree_servicetype_all(55,$item['id']);	
				
				$resChildNodes = $this->Common_model->tree_servicetype_all($this->session->userdata("customer_id"),$item['id']);	
				
				//echo "Row Count:".$resChildNodes->num_rows;
					//echo "Child Data";
				//print_r($resChildNodes);
				if(!isset($resChildNodes)){
				 //add condition when result is zero
				 //echo "No Children";
				} else {
					//echo "records...";
						//print_r($resChildNodes);
					//	while( $rowChild = mysqli_fetch_assoc($resChildNodes) ) { 
					foreach($resChildNodes as $rowChild){
						$dataChild[] = $rowChild;
						$itemsByReference [$item['id']]['children'][] = $rowChild;
							}	
							//print_r($dataChild);
				}
        }

// Set items as children of the relevant parent item.
        foreach($result as $key => &$item)
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
        foreach($result as $key => &$item) {
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                unset($result[$key]);
        }
        foreach ($result as $row) {
            $data[] = $row;
        }

// Encode:
		//print_r($data);
      //  echo json_encode($data);
							//$result = json_encode($data);
							//$result = $data;
							//print_r($result);
							//return($result);
							break;
						case 'create_node':
						
								$custID=$this->session->userdata("customer_id");
							$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
							
							$nodeText = isset($_GET['text']) && $_GET['text'] !== '' ? $_GET['text'] : '';
							
							$servInsert=$this->Common_model->folderInsert('sg_service_type',$node,$nodeText,$custID);
							
							//echo $_GET['id'];exit;
							//$custID=55;
							/*$custID=$this->session->userdata("customer_id");
							$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
							
							$nodeText = isset($_GET['text']) && $_GET['text'] !== '' ? $_GET['text'] : '';
							//$nodeText = 'manikandan';
							if($node!='#'){							
							$servInsert=$this->Common_model->folderInsert('sg_service_type',$node,$nodeText,$custID);
							}
							else{
								$servInsert='#';	
							}*/
							/*$sqlIns="INSERT INTO `sg_service_type`(`parent_id`,`child_id`,`customer_id`,`service_type`)
							VALUES(56,45,56,'Q-KINodes')";
							$this->db->query($sqlIns);*/
							
							
							//$nodeText = "".$nodeText;
							//return $node;die;
						/*	if($node===0){
								echo "Parent Node Creation - Department Insert";die;
							}
							else{
								//echo "Node val:".$node."=".$nodeText;
							$servInsert=$this->Common_model->folderInsert('sg_service_type',$node,$nodeText,$custID);
							}*/
						/*	$sql ="INSERT INTO `treeview_items2` (`name`, `text`, `parent_id`) VALUES('".$nodeText."', '".$nodeText."', '".$node."')";
							mysqli_query($conn, $sql);
							
							$result = array('id' => mysqli_insert_id($conn));*/
							//print_r($result);die;
							//echo "Insert Res:".$servInsert;
							$result=$servInsert;
							//return $servInsert;
							break;
						case 'rename_node':
							$custID=$this->session->userdata("customer_id");
							$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
							//print_R($_GET);
							$nodeText = isset($_GET['text']) && $_GET['text'] !== '' ? $_GET['text'] : '';
							//echo $node."=".$nodeText;//;
							/* $sql ="UPDATE `treeview_items2` SET `name`='".$nodeText."',`text`='".$nodeText."' WHERE `id`= '".$node."'";
							mysqli_query($conn, $sql); */
							
								/*$nodeText = str_replace(' ', '-',$nodeText);
	                            $nodeText = str_replace('-', '',$nodeText);
	                            $nodeText = str_replace('$', '',$nodeText);
	                            $nodeText = str_replace('#', '',$nodeText);
	                            $nodeText = str_replace('&', '',$nodeText);
	                            $nodeText = str_replace('amp', '',$nodeText);
	                            $nodeText = preg_replace("/[^a-zA-Z0-9()]/", "", $nodeText); */
	                            //$nodeText = preg_replace("/[^a-zA-Z0-9()]/", "", $nodeText); */
							
							if($node!='#'){												
							$servUpdate=$this->Common_model->folderUpdate('sg_service_type',$node,$nodeText,$custID);
							}
							else if($node=='#')
							{
							$servUpdate=$this->Common_model->folderUpdate('sg_department',$node,$nodeText,$custID);
							}
							/*$servUpdate=$this->Common_model->record_update('sg_service_type',$node,$nodeText,$custID);*/
							//echo "Update Res "+$servUpdate;
							break;
						case 'delete_node':
							$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
							$sqlDel ="DELETE FROM `sg_service_type` WHERE `id`= '".$node."'";
							//mysqli_query($conn, $sql);			
							$this->db->query($sqlDel);
							//return ($this->db->affected_rows() != 1) ? false : true;
							//return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
							break;
						default:
							throw new Exception('Unsupported operation: ' . $_GET['operation']);
							break;
					}
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($result);
				}
				catch (Exception $e) {
					header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
					header('Status:  500 Server Error');
					echo $e->getMessage();
				}
				die();
			}
		
	}
	
	
	public function department_exist() 
    {
	
   $input  = $this->input->post('folder_name');
	
	     $where = array('department_name'=> $input,'customer_id'=>$this->session->userdata("customer_id"));
	  $data['user_details'] = $this->Common_model->all_record_result('sg_department',$where);
	  
	
	  $count = count($data['user_details']); 
     
	  
	    if($count >= 1)
		{
	     echo 1;
	     exit;	 
        }
		else
		{
			echo 2;
			exit;
		}
}
	
	public function getBootstrapTreeview()
	{
		
	}
	
	
	
	
	
	/*
	
	public function view_edit_department()
	{
		$id = $this->uri->segment(3);
		
		 $where = array('id'=> $id, 'status'=>1);
	     $data['department_data'] = $this->Common_model->all_record('sg_department',$where);

		$this->header_value();
		$this->load->view('department/view_edit_department', $data);
		$this->load->view('includes/bottom');

		
		
	}
	
	
	
	public function add_department()
	{
	
	 $department = $this->input->post('department');
     $this->form_validation->set_rules('department','Department','required|callback_department_exist');
	 	 
        if($this->form_validation->run() == TRUE) 
        {

		      $date_time = date('Y-m-d H:i:s');
			  $data = array('department_name'=>$department, 'customer_id'=>$this->session->userdata("customer_id"), 'status'=>1, 'created_date'=>$date_time);	  
			  $return_value = $this->Common_model->insertVal('sg_department',$data);
			  $this->messages->setMessageFront('Department Added Successfully','success');
		      redirect('department');
					
		}
		else
		{
         $where = array('customer_id'=> $this->session->userdata("customer_id"), 'status'=>1);
	  $data['department_data'] = $this->Common_model->all_record_result('sg_department',$where);
		$this->header_value();
		$this->load->view('department/department_form', $data);
		$this->load->view('includes/bottom');
		}

	}	
	

	public function department_exist($input) 
    {
	

	
	     $where = array('department_name'=> $input,'customer_id'=>$this->session->userdata("customer_id"));
	  $data['user_details'] = $this->Common_model->all_record_result('sg_department',$where);
	  
	
	  $count = count($data['user_details']); 
     
	  
	    if($count >= 1)
		{
			$this->form_validation->set_message('department_exist', 'Entered Department name is already exist');
	     return FALSE;
		  
		 
        }
		else{
			return TRUE;
		}
}
 /*   $this->db->where('roll', $roll);
    $query = $this->db->get('student');
    $count_row = $query->num_rows();
    if ($count_row > 0) 
    {
        $this->form_validation->set_message('checkDuplicateRoll', 'This roll number already exists. Please enter a new roll.');
        return FALSE;
    } 
    else 
    {
        return TRUE;
    }*/

	
	/*
		
	public function edit_department()
	{
		//$table=0,$data=0,$where=0
		 if($this->input->post('id')==''){ redirect('department');}
		 
		 $department = $this->input->post('department');
		 $id = $this->input->post('id');
		 
     $this->form_validation->set_rules('department','Department','required|callback_department_exist');

	 
	 
        if($this->form_validation->run() == TRUE) 
        {
		     
			  	$where = array('id' => $id);
	            $data = array('department_name' => $department);
	            $data['update_department'] = $this->Common_model->record_update('sg_department',$where,$data);
			  
			  
			  $this->messages->setMessageFront('Department Updated Successfully','success');
		      redirect('department');
					
		}
		else
		{
        $where = array('id'=> $id, 'status'=>1);
	    $data['department_data'] = $this->Common_model->all_record('sg_department',$where);
		$this->header_value();
		$this->load->view('department/view_edit_department', $data);
		$this->load->view('includes/bottom');
		}
		
		
		

	}
	*/
	
	

	
	
	
	/*  Service Type Inclusion */
		
	/*	public function view_edit_servicetype()
		{
			$id = $this->uri->segment(3);
			
			 $where = array('id'=> $id);
			 $data['servicetype_data'] = $this->Common_model->all_record('sg_service_type',$where);
		 
			$this->header_value();
			$this->load->view('servicetype/view_edit_servicetype', $data);
			$this->load->view('includes/bottom');		
			
		}
		
		public function add_servicetype()
		{
		

		 $department_value = $this->input->post('department_value');
		 $servicetype = $this->input->post('service_type');
		 
		 $this->form_validation->set_rules('service_type','Servicetype','required|callback_servicetype_exist['.$department_value.']');
		 
		 
		 
			if($this->form_validation->run() == TRUE) 
			{

				  $date_time = date('Y-m-d H:i:s');
				 $data = array('parent_id'=> $this->session->userdata("customer_id"), 'child_id'=>$department_value, 'customer_id'=>$this->session->userdata("customer_id"), 'service_type'=>$servicetype);	  
				  $return_value = $this->Common_model->insertVal('sg_service_type',$data);
				  $this->messages->setMessageFront('Service type Added Successfully','success');
				  redirect('servicetype');
						
			}
			else
			{
				
			 $where = array('customer_id'=> $this->session->userdata("customer_id"));
		$data['department_value'] = $this->Common_model->all_record_result('sg_department',$where);

		$where = array('customer_id'=> $this->session->userdata("customer_id"));
		$data['service_value'] = $this->Common_model->all_record_result('sg_service_type',$where);
		

		
			$this->header_value();
			$this->load->view('servicetype/servicetype_form', $data);
			$this->load->view('includes/bottom');
		
			}

		}	
	
		public function edit_servicetype()
	{
		//$table=0,$data=0,$where=0
		 if($this->input->post('id')==''){ redirect('servicetype');}
		 
		 $servicetype = $this->input->post('servicetype');
		 $id = $this->input->post('id');
		 
     $this->form_validation->set_rules('servicetype','Servicetype','required|callback_servicetype_exist');

	 
	 
        if($this->form_validation->run() == TRUE) 
        {
		     
			  	$where = array('id' => $id);
	            $data = array('service_type' => $servicetype);
	            $data['update_servicetype'] = $this->Common_model->record_update('sg_service_type',$where,$data);
			  
			  
			  $this->messages->setMessageFront('Servicetype Updated Successfully','success');
		      redirect('servicetype');
					
		}
		else
		{
        $where = array('id'=> $id);
	    $data['servicetype_data'] = $this->Common_model->all_record('sg_service_type',$where);
		$this->header_value();
		$this->load->view('servicetype/view_edit_servicetype', $data);
		$this->load->view('includes/bottom');
		}
		
		

	}
	
	
	public function name_by_id($id)
	{
		$where = array('id'=> $id);
	    $data['department_name_print'] = $this->Common_model->all_record('sg_department',$where);
	    echo $data['department_name_print']->department_name;
	}
	*/
	
	
	
		
    }
	
	
