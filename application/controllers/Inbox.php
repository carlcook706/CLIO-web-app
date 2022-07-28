<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('crud_model');
		if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}
	}

	function index() {
	        $username = $this->session->userdata('username');
			$data['result'] = $this->crud_model->getInboxData($username);
		    $data['result2'] = $this->crud_model->getInboxData2($username);
			$this->load->view('inbox_view', $data);
		
	}

	function takeAction($rciID) {
			$this->crud_model->updateInboxData($rciID);
			redirect("Inbox");
		}
	}

