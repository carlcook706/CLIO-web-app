<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('crud_model');
		if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}
	}

	function index() {
            $adviserSection = $this->session->userdata('section');
            $adviserBatch = $this->session->userdata('batch');
            
              
        if($this->session->userdata('level') === '1') {

           	$data['result'] = $this->crud_model->getAnnouncementData();
			$data['result2'] = $this->crud_model->getSection();
			$data['row'] = $this->crud_model->getAll();
			$this->load->view('announcement_view', $data);

        }else{
          	$data['result'] = $this->crud_model->getAnnouncementData();
			$data['result2'] = $this->crud_model->getSection();
			$data['row'] = $this->crud_model->getAll();
			$this->load->view('announcement_view', $data);
        }
		
		
	}
	function sectionPick($sectionID) {
		$data['result'] = $this->crud_model->getSectionData($sectionID);
		$data['row'] = $this->crud_model->getSectionDataRow($sectionID);
		$data['result2'] = $this->crud_model->getSection();
        $this->load->view('announcement_view', $data);
	}
	
	public function create() {
	    
	       $adviserSection = $this->session->userdata('section');
        
           
	      if($this->session->userdata('level') === '1') {
             $this->crud_model->createAnnouncement();
             redirect("Announcement");

        }else{
           $this->crud_model->createAnnouncement2($adviserSection);
             redirect("Announcement");

        }
      
    }

	public function edit($announcementID) {
		$data['row'] = $this->crud_model->getAnnouncement($announcementID);
		$data['result2'] = $this->crud_model->getSection();
        $this->load->view('announcement_edit', $data);
    }
	public function update($announcementID) {
		$this->crud_model->announcementUpdate($announcementID);
       redirect("Announcement");
    }
	public function delete($announcementID) {
		$this->crud_model->deleteAnnouncement($announcementID);
       	redirect("Announcement");
    }
}