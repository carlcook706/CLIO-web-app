<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller {
 
    function __construct() {
        parent::__construct();
     
    }
    
    function index() {
        
        $this->load->view('downloadView');
       
    }
    
    public function download($fileName){
        $this->load->helper('download');
        $file = 'apks/'.$fileName;
        force_download($file, NULL);
	}
    
 
}