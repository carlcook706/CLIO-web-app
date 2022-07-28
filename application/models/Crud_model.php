<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud_model extends CI_Model {

    public function __construct()
	{
	    parent::__construct();		
		$this->load->library('upload');
	}

	function check_user($username, $password) {
		$this->db->select('*'); //select all
		$this->db->from('tbl_users'); // table name
		$this->db->where('username', $username); // where username is equal to $username
		$this->db->where('password', md5($password)); // and password is equal to  $password (md5 format)
		$query = $this->db->get(); //get data from DB
		return $query;
	}
    
    function getInboxData2($username) {
      
        
        $this->db->select('*');
        $this->db->from('tbl_rci');
        $this->db->join('tbl_supervisor', 'tbl_rci.username = tbl_supervisor.username');
        $this->db->join('tbl_users', 'tbl_users.username = tbl_supervisor.username');
        $this->db->join('tbl_contactnumber', 'tbl_supervisor.contactID = tbl_contactnumber.contactNumber');
        $this->db->join('tbl_usertype', 'tbl_users.userTypeID = tbl_usertype.userTypeID');
          
        $this->db->where('tbl_rci.isDone',0);
        $this->db->where('tbl_rci.toUser', $username);

        $query = $this->db->get();

        return $query->result();
    }
    
	function getProfileData($username) {

		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->join('tbl_users', 'tbl_admin.username = tbl_users.username');
        $this->db->join('tbl_contactnumber', 'tbl_contactnumber.contactNumber = tbl_admin.contactNumber');
		$this->db->where('tbl_admin.username', $username);
		$query = $this->db->get();
        
        return $query->row();
    }

    function getProfileData2($username) {

		$this->db->select('*');
		$this->db->from('tbl_advisers');
		$this->db->join('tbl_users', 'tbl_advisers.username = tbl_users.username');
        $this->db->join('tbl_contactnumber', 'tbl_contactnumber.contactNumber = tbl_advisers.contactNumber');
		$this->db->where('tbl_advisers.username', $username);
		$query = $this->db->get();
        
        return $query->row();
    }

	function getCalendarData() {
        $query = $this->db->query('SELECT * FROM tbl_calendar JOIN tbl_batch ON tbl_calendar.batchID = tbl_batch.batchID WHERE tbl_calendar.batchID = 1 ');
        return $query->result();
    }


	function getInboxData($username) {
	    
      
             
              
        $this->db->select('*');
        $this->db->from('tbl_rci');
        $this->db->join('tbl_student', 'tbl_rci.username = tbl_student.username');
          $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_users', 'tbl_users.username = tbl_student.username');
        $this->db->join('tbl_contactnumber', 'tbl_student.contactNumber = tbl_contactnumber.contactNumber');
        $this->db->join('tbl_usertype', 'tbl_users.userTypeID = tbl_usertype.userTypeID');
          
        $this->db->where('tbl_rci.isDone',0);
        $this->db->where('tbl_rci.toUser', $username);

        $query = $this->db->get();

        return $query->result();
    }
  

	function getAnnouncementData() {
        $query = $this->db->query('SELECT * FROM tbl_announcement JOIN tbl_section ON tbl_announcement.sectionID = tbl_section.sectionID WHERE tbl_announcement.sectionID = 1');
        return $query->result();
    }
    function getAnnouncementData2($section,$batch) {
      
        $this->db->select('*');
        $this->db->from('tbl_announcement');
        $this->db->join('tbl_section', 'tbl_announcement.sectionID = tbl_section.sectionID');
        
        $this->db->where('tbl_announcement.sectionID',$section);
     

        $query = $this->db->get();

        return $query->result();
    }
	
	function getBatch() {
        $query = $this->db->query('SELECT * FROM tbl_batch');
        return $query->result();
    }

	function getData($batchID) {
        $query = $this->db->query('SELECT * FROM tbl_calendar JOIN tbl_batch ON tbl_calendar.batchID = tbl_batch.batchID WHERE tbl_calendar.batchID =' .$batchID);
        return $query->result();
    }
    function getDataRow($batchID) {
        $query = $this->db->query('SELECT * FROM tbl_calendar JOIN tbl_batch ON tbl_calendar.batchID = tbl_batch.batchID WHERE tbl_calendar.batchID =' .$batchID);
        return $query->row();
    }

	function getSection() {
        $query = $this->db->query('SELECT * FROM tbl_section');
        return $query->result();
    }
    
    function getAllWeekNumber($studentNumber) {
        
    	$query = $this->db->query("SELECT * FROM tbl_weekNumber where studentNumber = '$studentNumber'");
        
        return $query->result();
        
    }
    
	function getSectionData($sectionID) {
        $query = $this->db->query('SELECT * FROM tbl_announcement JOIN tbl_section ON tbl_announcement.sectionID = tbl_section.sectionID WHERE tbl_section.sectionID =' .$sectionID);
        return $query->result();
    }
    function getSectionDataRow($sectionID) {
        $query = $this->db->query('SELECT * FROM tbl_announcement JOIN tbl_section ON tbl_announcement.sectionID = tbl_section.sectionID WHERE tbl_section.sectionID =' .$sectionID);
        return $query->row();
    }
    function updateInboxData($rciID) {
        $data = array (
            'isDone' => '1'
        );
        $this->db->where('rciID', $rciID);
        $this->db->update('tbl_rci', $data);
    }
    function createAnnouncement() {
        $data = array (
            'announcementFeature' => $this->input->post('feature'),
            'announcement' => $this->input->post('announcement'),
            'announcementTopic' => $this->input->post('topic'),
            'sectionID' => $this->input->post('section'),
            'announcementDateTime' => date("Y-m-d\TH:i:s") 
        );
        $this->db->insert('tbl_announcement', $data);
    }
     function createAnnouncement2($section) {
        $data = array (
            'announcementFeature' => $this->input->post('feature'),
            'announcement' => $this->input->post('announcement'),
            'announcementTopic' => $this->input->post('topic'),
            'sectionID' => $this->input->post('section'),
            'announcementDateTime' => date("Y-m-d\TH:i:s"),
            'sectionID' => $section
        );
        
        $this->db->insert('tbl_announcement', $data);
    }
    function createCalendar() {
        $data = array (
            'activity' => $this->input->post('activity'),
            'expectation' => $this->input->post('expectedOutput'),
            'batchID' => $this->input->post('batch'),
            'calendarDateTime' => $this->input->post('date')
        );
        $this->db->insert('tbl_calendar', $data);
    }
    function getDataCalendar($calendarID) {
        $query = $this->db->query('SELECT * FROM tbl_calendar JOIN tbl_batch on tbl_batch.batchID = tbl_calendar.batchID WHERE `calendarID` =' .$calendarID);
        return $query->row();
    }
    
    function calendarUpdate($calendarID) {
        $data = array (
            'activity' => $this->input->post('activity'),
            'expectation' => $this->input->post('expectation'),
            'batchID' => $this->input->post('batch'),
            'calendarDateTime' => $this->input->post('date')
        );
        $this->db->where('calendarID', $calendarID);
        $this->db->update('tbl_calendar', $data);
    }
    function deleteCalendar($calendarID) {
        $this->db->where('calendarID', $calendarID);
        $this->db->delete('tbl_calendar');
    }

    function getAnnouncement($announcementID) {
        $query = $this->db->query('SELECT * FROM tbl_announcement JOIN tbl_section ON tbl_announcement.sectionID = tbl_section.sectionID WHERE `announcementID` =' .$announcementID);
        return $query->row();
    }
    function announcementUpdate($announcementID) {
        $data = array (
            'announcementFeature' => $this->input->post('feature'),
            'announcementTopic' => $this->input->post('topic'),
            'announcement' => $this->input->post('announcement'),
            'sectionID' => $this->input->post('section'),
        );
        $this->db->where('announcementID', $announcementID);
        $this->db->update('tbl_announcement', $data);
    }
    
     function search($batchID) {
        $data = array (
            'city' => $this->input->post('city')
        );
        
        $city = $data['city'];
        
          $query = $this->db->query("SELECT * FROM tbl_student INNER JOIN tbl_supervisor ON tbl_student.supervisorID = tbl_supervisor.id INNER JOIN tbl_company ON tbl_supervisor.companyID = tbl_company.id INNER JOIN tbl_address ON tbl_address.id = tbl_company.addressID INNER JOIN tbl_section ON tbl_student.sectionID = tbl_section.sectionID INNER JOIN tbl_batch ON tbl_student.batchID = tbl_batch.batchID WHERE tbl_address.city = '$city' AND tbl_student.batchID = '$batchID'");
          
        return $query->result();
        
   
    }
    
    function masterListUpdate($studentNumber,$contactNumber) {
        $data = array (
            'firstName' => $this->input->post('firstName'),
            'middleName' => $this->input->post('middleName'),
            'lastName' => $this->input->post('lastName'),
            'suffix' => $this->input->post('suffix'),
            'contactNumber' => $this->input->post('contactNumber'),
            'sectionID' => $this->input->post('sectionID'),
            'batchID' => $this->input->post('batchID'),
        );
        
          $count2 = $this->crud_model->findContactNumber($data['contactNumber']);
                     
                    if($count2<1){
                       $this->crud_model->insert_usern($data['contactNumber']);
                    };

        $this->db->set('a.firstName', $data['firstName']);
        $this->db->set('a.middleName', $data['middleName']);
        $this->db->set('a.lastName', $data['lastName']);
        $this->db->set('a.suffix',  $data['suffix']);
        $this->db->set('a.sectionID',  $data['sectionID']);
        $this->db->set('a.batchID',  $data['batchID']);
         $this->db->set('a.contactNumber',$data['contactNumber']);
        $this->db->where('a.studentNumber',  $studentNumber);
        $this->db->update('tbl_student as a');

       
      
    }
    function deleteAnnouncement($announcementID) {
        $this->db->where('announcementID', $announcementID);
        $this->db->delete('tbl_announcement');
    }
    function deleteMasterList($studentNumber) {
        $this->db->where('studentNumber', $studentNumber);
        $this->db->delete('tbl_student');
        
    }
     function deleteMasterList2($username) {
        $this->db->where('username', $username);
        $this->db->delete('tbl_users');
        
    }
    function profileUpdate($username,$contactNumber,$fileName) {
        
            $data = array (
                'id' => $this->input->post('id'),
                'firstName' => $this->input->post('firstName'),
                'middleName' => $this->input->post('middleName'),
                'lastName' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'suffix' => $this->input->post('suffix'),
                'password' => $this->input->post('password'),
                'contactNumber' => $this->input->post('contactNumber'),
                'image' => $fileName,
            );
            
              $count2 = $this->crud_model->findContactNumber($data['contactNumber']);
                     
                    if($count2<1){
                       $this->crud_model->insert_usern($data['contactNumber']);
                    };

            $this->db->set('a.id', $data['id']);
            $this->db->set('a.firstName', $data['firstName']);
            $this->db->set('a.middleName', $data['middleName']);
            $this->db->set('a.lastName', $data['lastName']);
            $this->db->set('a.email',  $data['email']);
            $this->db->set('a.suffix',  $data['suffix']);
            $this->db->set('a.image',  $data['image']);
            $this->db->where('a.username',  $username);
             $this->db->set('a.contactNumber',$data['contactNumber']);
            $this->db->update('tbl_admin as a');

            if(empty($data['password'])){
            
            }elseif(!empty($data['password'])){
                $this->db->set('u.password', md5($data['password']));
                $this->db->where('u.username',  $username);
                $this->db->update('tbl_users as u');
            }
            

           
           
        
    }
    function profileUpdate2($username,$contactNumber,$fileName) {
        
        $data = array (
            'id' => $this->input->post('id'),
            'firstName' => $this->input->post('firstName'),
            'middleName' => $this->input->post('middleName'),
            'lastName' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'suffix' => $this->input->post('suffix'),
            'password' => $this->input->post('password'),
            'contactNumber' => $this->input->post('contactNumber'),
            'image' => $fileName,
        );
        
         $count2 = $this->crud_model->findContactNumber($data['contactNumber']);
                     
                    if($count2<1){
                       $this->crud_model->insert_usern($data['contactNumber']);
                    };
                    
                    
        $this->db->set('a.id', $data['id']);
        $this->db->set('a.firstName', $data['firstName']);
        $this->db->set('a.middleName', $data['middleName']);
        $this->db->set('a.lastName', $data['lastName']);
        $this->db->set('a.email',  $data['email']);
        $this->db->set('a.suffix',  $data['suffix']);
        $this->db->set('a.image',  $data['image']);
        $this->db->where('a.username',  $username);
        $this->db->set('a.contactNumber',$data['contactNumber']);
        $this->db->update('tbl_advisers as a');

        if(empty($data['password'])){
            
        }elseif(!empty($data['password'])){
            $this->db->set('u.password', md5($data['password']));
            $this->db->where('u.username',  $username);
            $this->db->update('tbl_users as u');
        }
        

        
}
    function get_addressbook() {     

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_student.sectionID');
        $this->db->join('tbl_batch', 'tbl_student.batchID = tbl_batch.batchID');
        $this->db->where('tbl_batch.batchID',1);
        $this->db->where('tbl_section.sectionID', 1);

        $query = $this->db->get();

        return $query->result();
    }

    function get_addressbook2($section,$batch) {     

        $this->db->select('tbl_student.suffix,tbl_student.username, tbl_student.studentNumber, tbl_student.contactNumber, tbl_student.firstName, tbl_student.middleName, tbl_student.lastName');
        $this->db->from('tbl_student');
        $this->db->join('tbl_advisers', 'tbl_student.sectionID = tbl_advisers.sectionID');
        $this->db->where('tbl_advisers.batchID',$batch);
        $this->db->where('tbl_advisers.sectionID', $section);

        $query = $this->db->get();

        return $query->result();
    }
    
 
    function insert_csv($data) {
        $this->db->insert('tbl_student', $data);
    }
    
     function insertBatch($batchName) {
         $data = array (
            'batchName' => $batchName
          
        );
        $this->db->insert('tbl_batch', $data);
    }

    function insert_user($data) {
        $this->db->insert('tbl_users', $data);
    }
    function insert_usern($contactNumber) {
         $data = array (
            'contactNumber' => $contactNumber
          
        );
        $this->db->insert('tbl_contactnumber', $data);
    }
    function getAll() {
        $this->db->select('*');
        $this->db->from('tbl_advisers');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_advisers.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_advisers.batchID');
      
        
        $this->db->where('tbl_section.sectionID',1);
        $this->db->where('tbl_batch.batchID',1);

        $query = $this->db->get();

        return $query->row();
    }
    function getAll2($sectionID) {
        $this->db->select('*');
        $this->db->from('tbl_advisers');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_advisers.sectionID');
      
        $this->db->where('tbl_advisers.sectionID', $sectionID);

      

        $query = $this->db->get();

        return $query->row();
    }
     function getWeekNumber($studentNumber) {
        $this->db->select('*');
        $this->db->from('tbl_weekNumber');
        
      
        $this->db->where('tbl_weekNumber.studentNumber', $studentNumber);
        $this->db->where('tbl_weekNumber.weekNumber', 1);

      

        $query = $this->db->get();

        return $query->row();
    }
      function getWeekNumber2($studentNumber,$weekNumber) {
        $this->db->select('*');
        $this->db->from('tbl_weekNumber');
        
      
        $this->db->where('tbl_weekNumber.studentNumber', $studentNumber);
        $this->db->where('tbl_weekNumber.weekNumber', $weekNumber);

      

        $query = $this->db->get();

        return $query->row();
    }
    function getAllS($batchID,$sectionID) {

        $this->db->select('*');
        $this->db->from('tbl_advisers');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_advisers.sectionID');
        $this->db->join('tbl_batch', 'tbl_advisers.batchID = tbl_batch.batchID');
        
        $this->db->where('tbl_section.sectionID', $sectionID);

        $query = $this->db->get();

        return $query->row();
    }
    function getMasterListSection($batchID,$sectionID) {

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_student.sectionID');
        $this->db->join('tbl_batch', 'tbl_student.batchID = tbl_batch.batchID');
        $this->db->where('tbl_batch.batchID',$batchID);
        $this->db->where('tbl_section.sectionID', $sectionID);

    
        $query = $this->db->get();

        return $query->result();
    }
    function getMasterListBatch($batchID,$sectionID) {
        
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_student.sectionID');
        $this->db->join('tbl_batch', 'tbl_student.batchID = tbl_batch.batchID');
        $this->db->where('tbl_batch.batchID',$batchID);
        $this->db->where('tbl_section.sectionID', $sectionID);

    
        $query = $this->db->get();

        return $query->result();
    }
    function getAllB($batchID,$sectionID) {

        $this->db->select('*');
        $this->db->from('tbl_advisers');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_advisers.sectionID');
        $this->db->join('tbl_batch', 'tbl_advisers.batchID = tbl_batch.batchID');
       
        $this->db->where('tbl_section.sectionID', $sectionID);
      

        $query = $this->db->get();

        return $query->row();
    }
    function getAllBB($batchID,$sectionID) {

        $this->db->select('*');
        $this->db->from('tbl_advisers');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_advisers.sectionID');
        $this->db->join('tbl_batch', 'tbl_advisers.batchID = tbl_batch.batchID');
       
        $this->db->where('tbl_section.sectionID', $sectionID);
       

        $query = $this->db->get();

        return $query->row();
    }
    function getGrading() {
        $query = $this->db->query('SELECT * FROM tbl_gradingsystem ');
        return $query->result_array();
    }

    function insert_grading($data) {
        $this->db->insert('tbl_gradingsystem', $data);
    }

    function getOjt() {     

        $query = $this->db->query('SELECT * FROM tbl_student INNER JOIN tbl_supervisor ON tbl_student.supervisorID = tbl_supervisor.id INNER JOIN tbl_company ON tbl_supervisor.companyID = tbl_company.id  INNER JOIN tbl_address ON tbl_address.id = tbl_company.addressID INNER JOIN tbl_section ON tbl_student.sectionID = tbl_section.sectionID INNER JOIN tbl_batch ON tbl_student.batchID = tbl_batch.batchID join tbl_weeklyreport on tbl_weeklyreport.studentNumber = tbl_student.studentNumber WHERE tbl_student.sectionID AND tbl_student.batchID = 1 ');
        return $query->result();

    }
    function getStudentTimeOJT($studentNumber) {     

        $this->db->select(' * ');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_company.id = tbl_supervisor.companyID');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
        $this->db->join('tbl_weeklyreport', 'tbl_weeklyreport.studentNumber = tbl_student.studentNumber');
       

        $this->db->where('tbl_student.studentNumber',$studentNumber);
         $this->db->where('tbl_weeklyreport.weekNumber',1);
    

        $query = $this->db->get();

        return $query->result();
    }
    function getStudentTimeOJT2($studentNumber,$weekNumber) {     

        $this->db->select(' * ');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_company.id = tbl_supervisor.companyID');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
        $this->db->join('tbl_weeklyreport', 'tbl_weeklyreport.studentNumber = tbl_student.studentNumber');
       

        $this->db->where('tbl_student.studentNumber',$studentNumber);
         $this->db->where('tbl_weeklyreport.weekNumber',$weekNumber);
    

        $query = $this->db->get();

        return $query->result();
    }
    
    function getWeeklyReport2($studentNumber) {     

      
        
        $this->db->select(' * ');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_company.id = tbl_supervisor.companyID');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
        $this->db->join('tbl_weeklyreport', 'tbl_weeklyreport.studentNumber = tbl_student.studentNumber');
       

        $this->db->where('tbl_student.studentNumber',$studentNumber);
    

        $query = $this->db->get();

        return $query->result();

    }
    
     function getFiles($studentNumber) {     

      
        
        $this->db->select(' * ');
        $this->db->from('tbl_docs');
        $this->db->join('tbl_student', 'tbl_docs.studentNumber = tbl_student.studentNumber');
       
       

        $this->db->where('tbl_docs.studentNumber',$studentNumber);
    

        $query = $this->db->get();

        return $query->result();

    }
    
    function getCompanyHistory($studentNumber) {     

      
        
        $this->db->select(' * ');
        $this->db->from('tbl_postcompanyinfo');
        
        $this->db->where('postStudentNumber',$studentNumber);
    

        $query = $this->db->get();

        return $query->result();

    }
    

    function getOjt2( $adviserSection, $adviserBatch) {     

       

        $this->db->select(' tbl_student.studentNumber, tbl_student.firstName, tbl_student.lastName, tbl_student.totalHours, tbl_weeklyreport.weeklyReportID, tbl_weeklyreport.date, tbl_weeklyreport.timeDiff, tbl_weeklyreport.tasks, tbl_weeklyreport.lesson');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_company.id = tbl_supervisor.companyID');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
        $this->db->join('tbl_weeklyreport', 'tbl_weeklyreport.studentNumber = tbl_student.studentNumber');
        $this->db->join('tbl_advisers', 'tbl_advisers.sectionID = tbl_student.sectionID');

        $this->db->where('tbl_advisers.batchID',$adviserBatch);
        $this->db->where('tbl_advisers.sectionID', $adviserSection);

        $query = $this->db->get();

        return $query->result();

    }
    
    function getStudentWeekly() {
        
        $this->db->select(' tbl_student.studentNumber, tbl_student.isAbleToRender, tbl_student.firstName, tbl_student.lastName, tbl_student.totalHours, tbl_student.totalHoursToRender');
        $this->db->from('tbl_student');
         $this->db->join('tbl_weekNumber', 'tbl_weekNumber.studentNumber = tbl_student.studentNumber');
        $this->db->where('tbl_student.sectionID',1);
         $this->db->where('tbl_weekNumber.weekNumber',1);
        $this->db->where('tbl_student.batchID', 1);

        $query = $this->db->get();

        return $query->result();

    }
    
      function getStudentWeekly3() {
        
        $this->db->select(' tbl_student.studentNumber, tbl_student.isAbleToRender, tbl_student.firstName, tbl_student.lastName, tbl_student.middleName , tbl_student.suffix, tbl_student.totalHours, tbl_student.totalHoursToRender');
        $this->db->from('tbl_student');
     
        $this->db->where('tbl_student.sectionID',1);
         
        $this->db->where('tbl_student.batchID', 1);

        $query = $this->db->get();

        return $query->result();

    }
    
    function startDate($studentNumber) {
        
        $this->db->select(' date ');
        $this->db->from('tbl_weeklyreport');
        $this->db->where('studentNumber',$studentNumber);
        $this->db->limit(1); 
     

        $query = $this->db->get();

        return $query->row();

    }
    
    function getStudentWeekly2( $adviserSection, $adviserBatch) {     

       

        $this->db->select(' tbl_student.studentNumber, tbl_student.firstName, tbl_student.lastName, tbl_student.totalHours, tbl_student.totalHoursToRender');
        $this->db->from('tbl_student');
        $this->db->join('tbl_advisers', 'tbl_advisers.sectionID = tbl_student.sectionID');

        $this->db->where('tbl_advisers.batchID',$adviserBatch);
        $this->db->where('tbl_advisers.sectionID', $adviserSection);

        $query = $this->db->get();

        return $query->result();

    }
    
    function getStudentTime( $adviserSection, $adviserBatch) {     

       

        $this->db->select(' tbl_student.studentNumber, tbl_student.firstName, tbl_student.lastName , tbl_weeklyreport.dtrImage, tbl_weeklyreport.date , tbl_weeklyreport.timeIn, tbl_weeklyreport.timeOut, tbl_weeklyreport.timeDiff, tbl_student.totalHours , tbl_weeklyreport.weeklyReportID ');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_company.id = tbl_supervisor.companyID');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
        $this->db->join('tbl_weeklyreport', 'tbl_weeklyreport.studentNumber = tbl_student.studentNumber');
        $this->db->join('tbl_advisers', 'tbl_advisers.sectionID = tbl_student.sectionID');

        $this->db->where('tbl_advisers.batchID',$adviserBatch);
        $this->db->where('tbl_advisers.sectionID', $adviserSection);

        $query = $this->db->get();

        return $query->result();

    }

    function getStudentCompany() {     
        $query = $this->db->query('SELECT * FROM tbl_student INNER JOIN tbl_supervisor ON tbl_student.supervisorID = tbl_supervisor.id INNER JOIN tbl_company ON tbl_supervisor.companyID = tbl_company.id INNER JOIN tbl_address ON tbl_address.id = tbl_company.addressID INNER JOIN tbl_section ON tbl_student.sectionID = tbl_section.sectionID INNER JOIN tbl_batch ON tbl_student.batchID = tbl_batch.batchID WHERE tbl_student.sectionID = 1 AND tbl_student.batchID = 1');
        return $query->result();
    }
    function getStudentCompany2($section,$batch) {     

        $this->db->select(' tbl_student.studentNumber, tbl_supervisor.supfirstName, tbl_supervisor.suplastName, tbl_supervisor.contactID, tbl_student.firstName, tbl_student.lastName, tbl_supervisor.email, tbl_company.companyName , tbl_address.street, tbl_address.baranggay, tbl_address.city, tbl_address.province');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_company.id = tbl_supervisor.companyID');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
        $this->db->join('tbl_advisers', 'tbl_advisers.sectionID = tbl_student.sectionID');

        $this->db->where('tbl_advisers.batchID',$batch);
        $this->db->where('tbl_advisers.sectionID', $section);

        $query = $this->db->get();

        return $query->result();
    }
    function getStudentEvaluation() {     
        $query = $this->db->query('SELECT * FROM tbl_student INNER JOIN tbl_supervisor ON tbl_student.supervisorID = tbl_supervisor.id INNER JOIN tbl_company ON tbl_supervisor.companyID = tbl_company.id INNER JOIN tbl_address ON tbl_address.id = tbl_company.addressID INNER JOIN tbl_section ON tbl_student.sectionID = tbl_section.sectionID INNER JOIN tbl_batch ON tbl_student.batchID = tbl_batch.batchID join tbl_evaluation on tbl_student.studentNumber = tbl_evaluation.studentNumber WHERE tbl_student.sectionID AND tbl_student.batchID = 1');
        return $query->result();
    }
    function getStudentEvaluation2() {     

        $query = $this->db->query('SELECT * FROM tbl_student INNER JOIN tbl_supervisor ON tbl_student.supervisorID = tbl_supervisor.id INNER JOIN tbl_company ON tbl_supervisor.companyID = tbl_company.id INNER JOIN tbl_address ON tbl_address.id = tbl_company.addressID INNER JOIN tbl_section ON tbl_student.sectionID = tbl_section.sectionID INNER JOIN tbl_batch ON tbl_student.batchID = tbl_batch.batchID join tbl_evaluation on tbl_student.studentNumber = tbl_evaluation.studentNumber WHERE tbl_student.sectionID AND tbl_student.batchID = 1');
        return $query->result();

        
        $this->db->select(' tbl_student.studentNumber, tbl_supervisor.supfirstName, tbl_supervisor.suplastName, tbl_supervisor.contactID, tbl_student.firstName, tbl_student.lastName, tbl_student.totalHours, tbl_evaluation.remarks');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_evaluation', 'tbl_evaluation.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
        $this->db->join('tbl_advisers', 'tbl_advisers.sectionID = tbl_student.sectionID');

        $this->db->where('tbl_advisers.batchID',$batch);
        $this->db->where('tbl_advisers.sectionID', $section);

        $query = $this->db->get();

        return $query->result();
    }
    function getStudentEvaluationPick($batchID, $sectionID) {   

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_supervisor.companyID = tbl_company.id');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_student.batchID = tbl_batch.batchID');
         $this->db->join('tbl_evaluation', 'tbl_student.studentNumber = tbl_evaluation.studentNumber');
        
        $this->db->where('tbl_batch.batchID', $batchID);
        $this->db->where('tbl_section.sectionID', $sectionID);

        $query = $this->db->get();

        return $query->result();
    }
   

    
    function pickWeeklyReport($batchID, $sectionID ) {     
        

        $this->db->select(' tbl_student.studentNumber,  tbl_student.isAbleToRender, tbl_student.firstName, tbl_student.lastName, tbl_student.totalHours, tbl_student.totalHoursToRender');
        $this->db->from('tbl_student');
         $this->db->join('tbl_weekNumber', 'tbl_weekNumber.studentNumber = tbl_student.studentNumber');
        $this->db->where('tbl_weekNumber.weekNumber',1);
        $this->db->where('tbl_student.sectionID', $sectionID);
        $this->db->where('tbl_student.batchID',  $batchID);

        $query = $this->db->get();

        return $query->result();
    }
    
        function pickWeeklyReport2($batchID, $sectionID ) {     
        

        $this->db->select(' tbl_student.studentNumber,  tbl_student.isAbleToRender, tbl_student.firstName, tbl_student.lastName, tbl_student.totalHours, tbl_student.totalHoursToRender');
        $this->db->from('tbl_student');
        
        
        $this->db->where('tbl_student.sectionID', $sectionID);
        $this->db->where('tbl_student.batchID',  $batchID);

        $query = $this->db->get();

        return $query->result();
    }


    function getOjtS($batchID, $sectionID ) {     
        

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_supervisor.companyID = tbl_company.id');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_student.batchID = tbl_batch.batchID');
        $this->db->join('tbl_weeklyreport', 'tbl_student.studentNumber = tbl_weeklyreport.studentNumber');
        
        $this->db->where('tbl_batch.batchID', $batchID);
        $this->db->where('tbl_section.sectionID', $sectionID);

        $query = $this->db->get();

        return $query->result();
    }
    function getStudentSection($batchID, $sectionID ) {     
        

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_supervisor.companyID = tbl_company.id');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_student.batchID = tbl_batch.batchID');
       
        
        $this->db->where('tbl_batch.batchID', $batchID);
        $this->db->where('tbl_section.sectionID', $sectionID);

        $query = $this->db->get();

        return $query->result();
    }
    function getStudentBatch($batchID, $sectionID ) {     
        

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_supervisor.companyID = tbl_company.id');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_student.batchID = tbl_batch.batchID');
       
        
        $this->db->where('tbl_batch.batchID', $batchID);
        $this->db->where('tbl_section.sectionID', $sectionID);

        $query = $this->db->get();

        return $query->result();
    }
    function getOjtB($batchID, $sectionID ) {     
        
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_supervisor', 'tbl_student.supervisorID = tbl_supervisor.id');
        $this->db->join('tbl_company', 'tbl_supervisor.companyID = tbl_company.id');
        $this->db->join('tbl_address', 'tbl_address.id = tbl_company.addressID');
        $this->db->join('tbl_section', 'tbl_student.sectionID = tbl_section.sectionID');
        $this->db->join('tbl_batch', 'tbl_student.batchID = tbl_batch.batchID');
        $this->db->join('tbl_weeklyreport', 'tbl_student.studentNumber = tbl_weeklyreport.studentNumber');
        
        $this->db->where('tbl_batch.batchID', $batchID);
        $this->db->where('tbl_section.sectionID', $sectionID);

        $query = $this->db->get();

        return $query->result();
    }

    function getMasterList($studentNumber) {

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_student.sectionID');
        $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
        $this->db->join('tbl_contactnumber', 'tbl_student.contactNumber = tbl_contactnumber.contactNumber');
        $this->db->where('tbl_student.studentNumber', $studentNumber);

        $query = $this->db->get();

        return $query->row();
    }

    function getWeeklyReport($weeklyReportID) {

        $this->db->select('*');
        $this->db->from('tbl_weeklyreport');
        $this->db->where('tbl_weeklyreport.weeklyReportID', $weeklyReportID);

        $query = $this->db->get();

        return $query->row();
    }
    
    function getWeeklyReportStudent($studentNumber) {

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('tbl_student.studentNumber', $studentNumber);

        $query = $this->db->get();

        return $query->row();
    }

    function comment_insert($weeklyReportID) {

        $data = array (
            'comment' => $this->input->post('comment')
        );

        $this->db->set('comment', $data['comment']);
        $this->db->where('tbl_weeklyreport.weeklyReportID',  $weeklyReportID);
        $this->db->update('tbl_weeklyreport');

        
    }
    
     function approve($studentNumber) {

        

        $this->db->set('isAbleToRender', 1);
        $this->db->where('tbl_student.studentNumber',  $studentNumber);
        $this->db->update('tbl_student');

        
    }
    
    function disapprove($studentNumber) {

        

        $this->db->set('isAbleToRender', 0);
        $this->db->where('tbl_student.studentNumber',  $studentNumber);
        $this->db->update('tbl_student');

        
    }
    
    
    
    function update_studentTime($weeklyReportID,$studentNumber,$totalHours,$dtrImage,$timeCount, $isApproved) {

        $data = array (
            'dtrImage' => $this->input->post('dtrImage'),
            'timeIn' => $this->input->post('timeIn'),
            'timeOut' => $this->input->post('timeOut'),
            'timeDiff' => $this->input->post('timeDiff'),
            'dtrImage' => $dtrImage
        );

        
        $DateTime1 = $data['timeIn'];
        $DateTime2 = $data['timeOut'];

       
      
            $first = strtotime($DateTime1);
            $second = strtotime($DateTime2);
            $datediff = abs($first - $second);
            $dif['s'] = floor($datediff); 
            $dif['m'] = floor($datediff/(60)); //minute
            $dif['h'] = floor($datediff/(60*60)); //hour
            $dif['d'] = floor($datediff/(60*60*24));//day 
            $dif['M'] = floor($datediff/(60*60*24*30)); //Months
            $dif['y'] = floor($datediff/(60*60*24*30*365));//year  


        $timeDiff = $dif['h'];
        
        if($isApproved == 0) {
            
        $difference = $totalHours;

        $this->db->set('ss.totalHours', $difference+$timeDiff);
        $this->db->where('ss.studentNumber', $studentNumber);
        $this->db->update('tbl_student as ss');

        $this->db->set('w.dtrImage', $data['dtrImage']);
        $this->db->set('w.timeIn', $data['timeIn']);
        $this->db->set('w.timeOut', $data['timeOut']);
        $this->db->set('w.timeDiff', $timeDiff);
        $this->db->set('w.isApproved', 1);
        $this->db->where('w.weeklyReportID', $weeklyReportID);
        $this->db->update('tbl_weeklyreport as w');
   
    }else{
        
        $difference = $totalHours - $timeCount;

        $this->db->set('ss.totalHours', $difference+$timeDiff);
        $this->db->where('ss.studentNumber', $studentNumber);
        $this->db->update('tbl_student as ss');

        $this->db->set('w.dtrImage', $data['dtrImage']);
        $this->db->set('w.timeIn', $data['timeIn']);
        $this->db->set('w.timeOut', $data['timeOut']);
        $this->db->set('w.timeDiff', $timeDiff);
        $this->db->where('w.weeklyReportID', $weeklyReportID);
        $this->db->update('tbl_weeklyreport as w');
    }

        
    }

    function getGradingSystemRow($gradingSystemID) {

        $this->db->select('*');
        $this->db->from('tbl_gradingsystem');
        $this->db->where('gradingSystemID', $gradingSystemID);

        $query = $this->db->get();

        return $query->row();
    }

    function delete_gradingSystem($gradingSystemID) {

        $this->db->where('gradingSystemID', $gradingSystemID);
        $this->db->delete('tbl_gradingsystem');
    }
     function deleteFile($id) {

        $this->db->where('id', $id);
        $this->db->delete('tbl_docs');
    }
    function update_gradingSystem($gradingSystemID) {

        $data = array (
            'gradingSystem' => $this->input->post('gradingSystem'),
            'criteria' => $this->input->post('criteria')
        );
        $this->db->where('gradingSystemID', $gradingSystemID);
        $this->db->update('tbl_gradingsystem', $data);
    }
    function download($studentNumber) {
        $query = $this->db->get_where('tbl_evaluation',array('studentNumber'=>$studentNumber));
			return $query->row_array();
    }
     function downloadCertificate($studentNumber) {
        $query = $this->db->get_where('tbl_certificate',array('studentNumber'=>$studentNumber));
			return $query->row_array();
    }
    function downloadWeekReport($weekNumber,$studentNumber) {
       
        $this->db->select('*'); 
		$this->db->from('tbl_weekPDFReport
'); 
		$this->db->where('weekNumber', $weekNumber ); 
		$this->db->where('studentNumber', $studentNumber); 
	
		$query = $this->db->get();
		return $query->row_array();
    }
    
     function downloadFile($id) {
        $query = $this->db->get_where('tbl_docs',array('id'=>$id));
			return $query->row_array();
    }
    function identifyBatchID($batchName) {
        $query = $this->db->get_where('tbl_batch',array('batchName'=>$batchName));
			return $query->row_array();
    }
     function findBatch($batchName) {
        $query = $this->db->get_where('tbl_batch',array('batchName'=>$batchName));
			return $query->num_rows();
    }
    
     function findContactNumber($contactNumber) {
        $query = $this->db->get_where('tbl_contactnumber',array('contactNumber'=>$contactNumber));
			return $query->num_rows();
    }
    
      function findUsername($username) {
        $query = $this->db->get_where('tbl_users',array('username'=>$username));
			return $query->num_rows();
    }
    
      function findStudentNumber($studentNumber) {
        $query = $this->db->get_where('tbl_student',array('studentNumber'=>$studentNumber));
			return $query->num_rows();
    }

    function getAdviserSectionAndBatch($username) {

        $this->db->select('*'); //select all
		$this->db->from('tbl_advisers'); // table name
		$this->db->where('username', $username); // where username is equal to $username
	
		$query = $this->db->get(); //get data from DB
		return $query;

       
    }
    
     function getTotalHoursToRender($studentNumber) {

        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->join('tbl_section', 'tbl_section.sectionID = tbl_student.sectionID');
         $this->db->join('tbl_batch', 'tbl_batch.batchID = tbl_student.batchID');
           
        $this->db->where('tbl_student.studentNumber', $studentNumber);

        $query = $this->db->get();

        return $query->row();
    }
    
      function updateTotalHoursToRender($studentNumber) {

        $data = array (
            'totalHoursToRender' => $this->input->post('totalHoursToRender')
        );

        $this->db->set('totalHoursToRender', $data['totalHoursToRender']);
        $this->db->where('tbl_student.studentNumber',  $studentNumber);
        $this->db->update('tbl_student');

        
    }

    
}

    

