<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docs extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('crud_model');
		if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
			
		}
	}

	function index() {
	

          			
		$data['addressbook'] = $this->crud_model->getStudentWeekly3();
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll();
	
		$this->load->view('docsView', $data);

     
		
		
	}


  function weeklyReport2($studentNumber) {

	

				
		$data['addressbook'] = $this->crud_model->getFiles($studentNumber);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll();
	
		$this->load->view('aStudentFiles', $data);

      
  }
  
  

	function sectionPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->pickWeeklyReport2($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllS($batchID,$sectionID);
		$this->load->view('docsView', $data);
	}

	function batchPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->pickWeeklyReport2($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllB($batchID,$sectionID);
		$this->load->view('docsView', $data);
	}

	function comment($weeklyReportID,$studentNumber) {
		$data['report'] = $this->crud_model->getWeeklyReport($weeklyReportID);
		$data['student'] = $this->crud_model->getWeeklyReportStudent($studentNumber);
		
		$this->load->view('weeklyReport_comment', $data);
	}
	
	function approve($studentNumber) {
	$this->crud_model->approve($studentNumber);
	       			
		$data['addressbook'] = $this->crud_model->getStudentWeekly3();
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll();
		$this->load->view('docsView', $data);
	}
	function disapprove($studentNumber) {
    	$this->crud_model->disapprove($studentNumber);
		       			
		$data['addressbook'] = $this->crud_model->getStudentWeekly3();
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll();
		
		$this->load->view('docsView', $data);
	}
	
	public function comment_insert($weeklyReportID,$studentNumber) {
		$this->crud_model->comment_insert($weeklyReportID);
		
	   	if($this->session->userdata('level') === '1') {

				
		$data['addressbook'] = $this->crud_model->getWeeklyReport2($studentNumber);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll();
		$data['start'] = $this->crud_model->startDate($studentNumber);
		$this->load->view('aStudentWeeklyReport', $data);

        }else{
            $adviserSection = $this->session->userdata('section');
            $adviserBatch = $this->session->userdata('batch');

            $data['addressbook'] = $this->crud_model->getWeeklyReport2( $studentNumber);
            $data['row'] = $this->crud_model->getAll2($adviserSection, $adviserBatch );
            $data['start'] = $this->crud_model->startDate($studentNumber);
            $this->load->view('aStudentWeeklyReport', $data);

        }
	}

	public function download($id){
        $this->load->helper('download');
        $fileinfo = $this->crud_model->downloadFile($id);
        $file = 'uploads/'.$fileinfo['fileName'];
        force_download($file, NULL);
	}
	
	public function delete($id,$studentNumber){
       
       $this->crud_model->deleteFile($id);
       
       			
		$data['addressbook'] = $this->crud_model->getFiles($studentNumber);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll();
	
		$this->load->view('aStudentFiles', $data);
       
       
      
	}

}