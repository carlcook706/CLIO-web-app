<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('crud_model');
		if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}
	}

	function index() {
		
			$data['result'] = $this->crud_model->getCalendarData();
			$data['result2'] = $this->crud_model->getBatch();
			$data['row'] = $this->crud_model->getAll();
			$this->load->view('calendar_view', $data);
		
	}
	function batchPick($batchID) {
		$data['result'] = $this->crud_model->getData($batchID);
		$data['row'] = $this->crud_model->getDataRow($batchID);
		$data['result2'] = $this->crud_model->getBatch();
        $this->load->view('calendar_view', $data);
	}

	public function create() {
        $this->crud_model->createCalendar();
        redirect("Calendar");
    }
	public function edit($calendarID) {
		$data['row'] = $this->crud_model->getDataCalendar($calendarID);
		$data['result2'] = $this->crud_model->getBatch();
        $this->load->view('calendarEdit', $data);
    }
	public function update($calendarID) {
		$this->crud_model->calendarUpdate($calendarID);
       	redirect("Calendar");
    }
	public function delete($calendarID) {
		$this->crud_model->deleteCalendar($calendarID);
       	redirect("Calendar");
    }
	
}