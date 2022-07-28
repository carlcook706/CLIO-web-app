<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('crud_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	function auth() {
		$username  = $this->input->post('username',TRUE);
		$password  = $this->input->post('password',TRUE);
		$result    = $this->crud_model->check_user($username, $password);
		if($result->num_rows() > 0) {
			$data  = $result->row_array();
			$name  = $data['username'];
			$level = $data['userTypeID'];

			if($level === '2') {
				$result2    = $this->crud_model->getAdviserSectionAndBatch($username);
				$data2  = $result2->row_array();
				
				$sesdata = array(
					'username'  => $username,
					'level'     => $level,
					'section'   => $data2['sectionID'],
					'batch'     => $data2['batchID'],
					'logged_in' => TRUE
				);
				
			}else{
				$sesdata = array(
					'username'  => $username,
					'level'     => $level,
					'logged_in' => TRUE
				);
			}

			
			$this->session->set_userdata($sesdata);
			if($level === '1') {
				redirect('Master_list');
			} elseif($level === '2'){
				redirect('Master_list');
			}
		} else {
			echo "<script>alert('access denied');history.go(-1);</script>";
		}
		$this->load->view('login_view');
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('Login');
	}

	
}
