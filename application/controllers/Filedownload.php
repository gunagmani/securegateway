<?php
Class Filedownload extends CI_Controller{

	public function __construct()
		{
		 parent ::__construct();
		 $this->load->database();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->model('Common_model');
				$this->load->model('Filebussiness');
				 $this->load->library('email');
				 $this->load->library('Messages');
				 $this->load->library('Logentry');
				 $this->load->helper('number');
		}
		
		public function index()
		{
			/*$fileName = basename('new-server.zip');*/
			
			////$path_parts = pathinfo($_GET['file']);
			
		/*	$path_parts = pathinfo("Securegateway6.zip");
			$fileName  = $path_parts['basename'];
			$file_path  = WEB_DIR.$fileName;*/
		$ctargetPath = getcwd() . '/uploads/Free/';
	$cpath = FILE_DOWNLOAD_URL.'uploads/Free/';	
	$ccpath = 'uploads/Free/';	
			
		echo $ctargetPath."****".$cpath."*-*-*".$ccpath."<br/>".FILE_DOWNLOAD_URL;exit;
			
			$fileName = basename('Securegateway6.zip');
			$file_path  = WEB_DIR."uploads/Personal/nalliappansp-65/".$fileName;
			$file_path2 = $_SERVER["DOCUMENT_ROOT"]."/uploads/Personal/nalliappansp-65/".$fileName;
$filePath = WEB_DIR."uploads/Personal/nalliappansp-65/";
$filePath2 = $_SERVER["DOCUMENT_ROOT"]."/uploads/Personal/nalliappansp-65/";
echo $file_path."<br/>";
echo $filePath.$fileName."<br/>";
echo $filePath2.$fileName;
exit;
/*$filePath = "D:/xampp/htdocs/securebeta/uploads/Personal/nalliappansp-65/";*/
/*$filePath = "D:/new-server/";*/
		  
		  /*
		  header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    */
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	//header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=\"".$fileName."\"");
	//header("Content-Disposition: attachment; filename=".$fileName);
	//header("Content-Transfer-Encoding: binary");
	//header("Content-Length: ".filesize($filePath.$fileName));
	//ob_end_flush();
	
    
	set_time_limit(0);
$file = @fopen($file_path2,"rb");
while(!feof($file))
{
	print(@fread($file, 1024*8));
	ob_flush();
	flush();
}
	
    // Read the file
    //readfile($filePath.$fileName);
   // readfile($filePath.$fileName);
	
    // Read the file
    //readfile($filePath);
		}
		
		}
		
?>