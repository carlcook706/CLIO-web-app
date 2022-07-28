<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Master_list extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->library('csvimport');

        if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}
    }
    
    function index() {
        
     

            $data['addressbook'] = $this->crud_model->get_addressbook();
            $data['section'] = $this->crud_model->getSection();
            $data['batch'] = $this->crud_model->getBatch();
            $data['row'] = $this->crud_model->getAll();
             $data['roww'] = $this->crud_model->getAll();
            $this->load->view('master_list_view', $data);

   
       
    }
 
    function importcsv() {

        $data['addressbook'] = $this->crud_model->get_addressbook();
        $data['error'] = '';    //initialize image upload error array to empty
 
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
 
        $this->upload->initialize($config);
 
 
        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('master_list_view', $data);
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            
            if ($this->csvimport->get_array($file_path)) {
                
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $trim = str_replace(' ','',$row['lastname']); 
                    $lower = strtolower($trim);
                    $data = array(
                        'password'=> md5($row['studentnumber']),
                        'username'=> $lower.$row['studentnumber'].'@clio-rms.com',
                        'userTypeID'=> 3
                    );
                    
                    $count2 = $this->crud_model->findContactNumber($row['contactnumber']);
                     
                    if($count2<1){
                       $this->crud_model->insert_usern($row['contactnumber']);
                    };
                   
                    
                    $count = $this->crud_model->findBatch($row['batchName']);
                    
                    if($count<1){
                        $this->crud_model->insertBatch($row['batchName']);
                    };
                    
                    $getBatchID = $this->crud_model->identifyBatchID($row['batchName']);
                    
                    $batchID = $getBatchID['batchID'];
                    
                    
                    
                    
                    $insert_data = array(
                        'studentNumber'=>$row['studentnumber'],
                        'username'=>$lower.$row['studentnumber'].'@clio-rms.com',
                        'firstName'=>$row['firstname'],
                        'middleName'=>$row['middlename'],
                        'lastName'=>$row['lastname'],
                        'suffix'=>$row['suffix'],
                        'sectionID'=>$row['sectionid'],
                        'batchID'=> $batchID,
                        'contactnumber'=>$row['contactnumber'],
                    );
                    
                    
                     $count3 = $this->crud_model->findUsername($lower.$row['studentnumber'].'@clio-rms.com');
                     $count4 = $this->crud_model->findStudentNumber($row['studentnumber']);
                     
                     
                    if($count4<1 && $count3<1 ){
                       $this->crud_model->insert_user($data);
                       $this->crud_model->insert_csv($insert_data);
                       
                        $this->session->set_flashdata('success', 'Student Data Imported Succesfully');
                          
                    };
                    
                   
                }
                redirect('Master_list');
                
               
              
            } else 
                $data['error'] = "Error occured";
                $this->load->view('master_list_view', $data);
            }
 
        } 

        function sectionPick($batchID,$sectionID) {
            $data['addressbook'] = $this->crud_model->getMasterListSection($batchID,$sectionID);
            $data['section'] = $this->crud_model->getSection();
            $data['batch'] = $this->crud_model->getBatch();
            $data['row'] = $this->crud_model->getAllS($batchID,$sectionID);
            $data['roww'] = $this->crud_model->getAllBB($batchID,$sectionID);
            $this->load->view('master_list_view', $data);
        }
        function batchPick($batchID,$sectionID) {
            $data['addressbook'] = $this->crud_model->getMasterListBatch($batchID,$sectionID);
            $data['section'] = $this->crud_model->getSection();
            $data['batch'] = $this->crud_model->getBatch();
            $data['row'] = $this->crud_model->getAllB($batchID,$sectionID);
             $data['roww'] = $this->crud_model->getAllBB($batchID,$sectionID);
            $this->load->view('master_list_view', $data);
        }

        public function edit($studentNumber) {
            $data['row'] = $this->crud_model->getMasterList($studentNumber);
            $data['sections'] = $this->crud_model->getSection();
            $data['batches'] = $this->crud_model->getBatch();
            $this->load->view('masterListEdit', $data);
        }
        public function update($studentNumber,$contactNumber) {
            $this->crud_model->masterListUpdate($studentNumber,$contactNumber);
            redirect("Master_list");
        }

        public function delete($studentNumber,$username) {
            $this->crud_model->deleteMasterList($studentNumber);
            $this->crud_model->deleteMasterList2($username);
            redirect("Master_list");
        }

        
 
}
/*END OF FILE*/