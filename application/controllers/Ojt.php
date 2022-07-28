<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ojt extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('crud_model');
		if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
			
		}
	}

	function index() {
	
            
          
			$data['addressbook'] = $this->crud_model->getStudentCompany();
			$data['section'] = $this->crud_model->getSection();
			$data['batch'] = $this->crud_model->getBatch();
			$data['row'] = $this->crud_model->getAll();
			$this->load->view('companyInfo_view', $data);
		
	}

	function weeklyReport() {

	

				
		$data['addressbook'] = $this->crud_model->getStudentWeekly();
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll();
	
		$this->load->view('ojt_view', $data);

       
        
      
	
	
}
  function weeklyReport2($studentNumber,$sectionID) {

	

		$data['addressbook'] = $this->crud_model->getWeeklyReport2($studentNumber);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll2($sectionID);
		$data['start'] = $this->crud_model->startDate($studentNumber);
		$this->load->view('aStudentWeeklyReport', $data);

      
  }
  
  function search($batchID) {
      
			$data['addressbook'] = $this->crud_model->search($batchID);
		    $data['section'] = $this->crud_model->getSection();
			$data['batch'] = $this->crud_model->getBatch();
			$data['row'] = $this->crud_model->getAll();
			$this->load->view('searchView', $data);

  }
  
   function viewCompanyHistory($studentNumber,$sectionID) {

	
				
		$data['addressbook'] = $this->crud_model->getCompanyHistory($studentNumber);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll2($sectionID);
	
		$this->load->view('companyHistoryView', $data);

     
  }

	function studentTime() {

	

          
			$data['addressbook'] = $this->crud_model->getStudentWeekly();
			$data['row'] = $this->crud_model->getAll();
			$data['section'] = $this->crud_model->getSection();
			$data['batch'] = $this->crud_model->getBatch();
			$this->load->view('studentTime', $data);
	
	

		
		
	}
	function studentEval() {



          
			$data['addressbook'] = $this->crud_model->getStudentEvaluation();
			$data['section'] = $this->crud_model->getSection();
			$data['batch'] = $this->crud_model->getBatch();
			$data['row'] = $this->crud_model->getAll();
			$this->load->view('studentEval', $data);
	
		
	
		
	}

	function sectionPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->pickWeeklyReport($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllS($batchID,$sectionID);
		$this->load->view('ojt_view', $data);
	}
	function timeRecordSectionPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->pickWeeklyReport($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllS($batchID,$sectionID);
		$this->load->view('studentTime', $data);

	}function evaluationSectionPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->getStudentEvaluationPick($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllS($batchID,$sectionID);
		$this->load->view('studentEval', $data);
	}
	
	function batchPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->pickWeeklyReport($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllB($batchID,$sectionID);
		$this->load->view('ojt_view', $data);
	}
	function timeRecordBatchPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->pickWeeklyReport($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllB($batchID,$sectionID);
		$this->load->view('studentTime', $data);
	}
	function evaluationBatchPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->getStudentEvaluationPick($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllB($batchID,$sectionID);
		$this->load->view('studentEval', $data);
	}

	function studentSectionPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->getStudentSection($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllS($batchID,$sectionID);
		$this->load->view('companyInfo_view', $data);
	}
	function studentBatchPick($batchID,$sectionID) {
		$data['addressbook'] = $this->crud_model->getStudentBatch($batchID,$sectionID);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAllB($batchID,$sectionID);
		$this->load->view('companyInfo_view', $data);
	}
	function comment($weeklyReportID,$studentNumber) {
		$data['report'] = $this->crud_model->getWeeklyReport($weeklyReportID);
		$data['student'] = $this->crud_model->getWeeklyReportStudent($studentNumber);
		
		$this->load->view('weeklyReport_comment', $data);
	}
	public function comment_insert($weeklyReportID,$studentNumber,$sectionID) {
	    
		$this->crud_model->comment_insert($weeklyReportID);
		
	 
				
		$data['addressbook'] = $this->crud_model->getWeeklyReport2($studentNumber);
		$data['section'] = $this->crud_model->getSection();
		$data['batch'] = $this->crud_model->getBatch();
		$data['row'] = $this->crud_model->getAll2($sectionID);
		$data['start'] = $this->crud_model->startDate($studentNumber);
		$this->load->view('aStudentWeeklyReport', $data);

      
	}
	public function getStudentTime($studentNumber,$weeklyReportID,$weekNumber) {
	
		$data['student'] = $this->crud_model->getWeeklyReportStudent($studentNumber);
			$data['weekNumber'] = $this->crud_model->getWeekNumber2($studentNumber,$weekNumber);
    	$data['weekNumber2'] = $this->crud_model->getAllWeekNumber($studentNumber);
		
        $data['report'] = $this->crud_model->getWeeklyReport($weeklyReportID);  
		$this->load->view('edit_studentTime', $data);
	}
	public function getStudentTime2($studentNumber,$sectionID) {
	   

          
			$data['addressbook'] = $this->crud_model->getStudentTimeOJT($studentNumber);
			$data['row'] = $this->crud_model->getAll2($sectionID);
			$data['weekNumber'] = $this->crud_model->getWeekNumber($studentNumber);
			$data['section'] = $this->crud_model->getSection();
			$data['weekNumber2'] = $this->crud_model->getAllWeekNumber($studentNumber);
			$data['batch'] = $this->crud_model->getBatch();
			$data['start'] = $this->crud_model->startDate($studentNumber);
			$this->load->view('studentTime2', $data);
	
		

	}
	public function timeRecordWeekPick($studentNumber,$sectionID,$weekNumber) {
	   

          
			$data['addressbook'] = $this->crud_model->getStudentTimeOJT2($studentNumber,$weekNumber);
			$data['row'] = $this->crud_model->getAll2($sectionID);
			$data['weekNumber'] = $this->crud_model->getWeekNumber2($studentNumber,$weekNumber);
			$data['section'] = $this->crud_model->getSection();
			$data['weekNumber2'] = $this->crud_model->getAllWeekNumber($studentNumber);
			$data['batch'] = $this->crud_model->getBatch();
			$data['start'] = $this->crud_model->startDate($studentNumber);
			$this->load->view('studentTime2', $data);
	
		

	}
	public function update_studentTime($weeklyReportID,$studentNumber,$totalHours,$dtrImage,$timeCount,$isApproved,$sectionID,$weekNumber) {
		$this->crud_model->update_studentTime($weeklyReportID,$studentNumber,$totalHours,$dtrImage,$timeCount,$isApproved);
		
		

          $data['weekNumber'] = $this->crud_model->getWeekNumber2($studentNumber,$weekNumber);
			$data['section'] = $this->crud_model->getSection();
			$data['weekNumber2'] = $this->crud_model->getAllWeekNumber($studentNumber);
			$data['addressbook'] = $this->crud_model->getStudentTimeOJT($studentNumber);
			$data['row'] = $this->crud_model->getAll2($sectionID);
			$data['section'] = $this->crud_model->getSection();
			$data['batch'] = $this->crud_model->getBatch();
			$data['start'] = $this->crud_model->startDate($studentNumber);
			$this->load->view('studentTime2', $data);
	
		
		
		
	}
	public function download($id){
        $this->load->helper('download');
        $fileinfo = $this->crud_model->download($id);
        $file = 'uploads/'.$fileinfo['evaluationForm'];
        force_download($file, NULL);
	}
		public function downloadCertificate($id){
        $this->load->helper('download');
        $fileinfo = $this->crud_model->downloadCertificate($id);
        
        if($fileinfo==null){
                 
		     $this->session->set_flashdata('error', 'No PDF Download Available!'); 
            
        }else{
              $file = 'uploads/'.$fileinfo['certificateName'];
              force_download($file, NULL);
        }
        	$data['addressbook'] = $this->crud_model->getStudentEvaluation();
			$data['section'] = $this->crud_model->getSection();
			$data['batch'] = $this->crud_model->getBatch();
			$data['row'] = $this->crud_model->getAll();
			$this->load->view('studentEval', $data);
      
	}
	
		public function downloadWeekReport($weekNumber,$studentNumber,$sectionID){
        $this->load->helper('download');
        $fileinfo = $this->crud_model->downloadWeekReport($weekNumber,$studentNumber);
      
        if($fileinfo===null){
              
               $this->session->set_flashdata('error', 'No PDF Download Available!'); 
        }else{
              $file = 'uploads/'.$fileinfo['weekReportPDFName'];
              force_download($file, NULL);
        }
        
        	$data['addressbook'] = $this->crud_model->getStudentTimeOJT2($studentNumber,$weekNumber);
			$data['row'] = $this->crud_model->getAll2($sectionID);
			$data['weekNumber'] = $this->crud_model->getWeekNumber2($studentNumber,$weekNumber);
			$data['section'] = $this->crud_model->getSection();
			$data['weekNumber2'] = $this->crud_model->getAllWeekNumber($studentNumber);
			$data['batch'] = $this->crud_model->getBatch();
			$data['start'] = $this->crud_model->startDate($studentNumber);
			$this->load->view('studentTime2', $data);
        
        
	}
	
	public function getTotalHoursToRender($studentNumber) {
	
		
		
			$data['student'] = 	$this->crud_model->getTotalHoursToRender($studentNumber);
		
			$this->load->view('totalHoursToRender', $data);
	
		
	}
		public function updateTotalHoursToRender($studentNumber,$sectionID) {
		    
		$this->crud_model->updateTotalHoursToRender($studentNumber);
		
	

          
			$data['addressbook'] = $this->crud_model->getStudentWeekly();
			$data['row'] = $this->crud_model->getAll2($sectionID);
			$data['section'] = $this->crud_model->getSection();
			$data['batch'] = $this->crud_model->getBatch();
			$this->load->view('studentTime', $data);
	
		
	}
}