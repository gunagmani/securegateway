<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

//include_once WEB_DIR.'third_party/mpdf/mpdf.php';
include('./application/third_party/mpdf/mpdf.php');

class M_pdf {

public $param;
public $pdf;
public function __construct($param = "'c', 'A4-L'")
{
	//$this->load->('/third_party/mpdf/mpdf.php');
	//require_once ('/third_party/mpdf/mpdf.php');
    $this->param =$param;
    $this->pdf = new mPDF($this->param);
}
}




