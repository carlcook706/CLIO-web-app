<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('crud_model');
		if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
			
		}
	}

	function index() {
		if($this->session->userdata('level')==='1') {
			$data['row'] = $this->crud_model->getProfileData($this->session->userdata('username'));
			$this->load->view('admin_view', $data);
		} elseif($this->session->userdata('level')==='2'){
			$data['row'] = $this->crud_model->getProfileData2($this->session->userdata('username'));
			$this->load->view('admin_view', $data);
		} 
		else {
			echo "Access Denied!";
		}
	}
	public function edit($username,$contactNumber) {
		if($this->session->userdata('level')==='1') {
			$data['row'] = $this->crud_model->getProfileData($username,$contactNumber);
			$this->load->view('profileEdit', $data);
		} elseif($this->session->userdata('level')==='2'){
			$data['row'] = $this->crud_model->getProfileData2($username,$contactNumber);
			$this->load->view('profileEdit', $data);
		} 
		else {
			echo "Access Denied!";
		}
    }

	public function update($username,$contactNumber) {

			$old_filename = $this->input->post('old_image');
			$new_filename = $_FILES['image']['name'];

			if($new_filename == true){

				$update_filename = time()."-".str_replace(' ',"-",$_FILES['image']['name']);
				
				$config['upload_path']          = APPPATH. '../assets/uploads/';
				$config['allowed_types']        = 'jpeg|jpg|png';
				$config['file_name']        = $update_filename;
			 
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('image')){
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('profileEdit', $error);
				}else{

					if(file_exists(APPPATH. '../assets/uploads/'.$old_filename)){
						unlink(APPPATH. '../assets/uploads/'.$old_filename);
					}
					
				}

			}else{
				$update_filename = $old_filename;
			}

			$fileName = $update_filename;
			

		
		if($this->session->userdata('level')==='1') {
			$this->crud_model->profileUpdate($username,$contactNumber,$fileName);
			redirect("Admin");
		} elseif($this->session->userdata('level')==='2'){
			$this->crud_model->profileUpdate2($username,$contactNumber,$fileName);
			redirect("Admin");
		} 
		else {
			echo "Access Denied!";
		}
		
		
		
	}
}