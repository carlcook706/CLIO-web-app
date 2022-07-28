<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grading extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('crud_model');
       	$this->load->library('csvimport');
           
		if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}
	}

	function index() {
		
			$data['addressbook'] = $this->crud_model->getGrading();
			$this->load->view('grading_view', $data);
		
	}

	function importcsv() {

        $data['addressbook'] = $this->crud_model->getGrading();
        $data['error'] = '';    //initialize image upload error array to empty
 
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
 
        $this->upload->initialize($config);
 
 
        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('grading_view', $data);
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
 
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'gradingSystem'=>$row['gradingsystem'],
                        'criteria'=>$row['criteria'],
                    );
                    
                    $this->crud_model->insert_grading($insert_data);
                }
                $this->session->set_flashdata('success', 'Student Data Imported Succesfully');
                redirect('Grading');
                //echo "<pre>"; print_r($insert_data);
            } else 
                $data['error'] = "Error occured";
                $this->load->view('grading_view', $data);
            }
 
    } 

    public function edit($gradingSystemID) {
        $data['row'] = $this->crud_model->getGradingSystemRow($gradingSystemID);
        $this->load->view('edit_gradingSystem', $data);
    }
   
    public function update_gradingSystem($gradingSystemID) {
        $this->crud_model->update_gradingSystem($gradingSystemID);
        redirect("Grading");
    }

    public function delete_gradingSystem($gradingSystemID) {
        $this->crud_model->delete_gradingSystem($gradingSystemID);
        redirect("Grading");
    }

}