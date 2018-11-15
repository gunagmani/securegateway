<?php
Class Blog extends CI_Controller{

	public function __construct()
		{
			
			    parent ::__construct();
				$this->load->database();
				$this->load->model('Auth_model');
				$this->load->model('Common_model');
				$this->load->library('session');
				$this->load->library('Messages');
				$this->load->helper('url');
	    }
	
	
	public function index()
	{		   
	
		
		

		$this->load->view('blog');		
		
	}
		
	public function secure_gateway_a_reliable_tool_accountants_to_exchange_files_securely()
	{		   
	
		
		

		$this->load->view('blog1');		
		
	}
	public function a_secure_file_sharing_tool_every_legal_professional_must_have_in_their_system_toolkit()
	{		   
	
		
		

		$this->load->view('blog2');		
		
	}
	public function the_untold_benefits_of_using_a_managed_file_transfer_software()
	{		   
	
		
		

		$this->load->view('blog3');		
		
	}
	}
	
	?>