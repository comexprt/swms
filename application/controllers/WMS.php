<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WMS extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index(){
	
		if($this->session->userdata('logged_ADMIN') || $this->session->userdata('logged_PR') || $this->session->userdata('logged_PO') || $this->session->userdata('logged_EU')){
			redirect('WMS/Homepage');
			
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/login');
			}
	
	}
	
	function login(){
		if($this->session->userdata('logged_ADMIN') || $this->session->userdata('logged_PR') || $this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
			redirect('WMS/Homepage');
		}else
		$this->load->view("login");
	}
	function InvalidURL(){
		$this->load->view('InvalidURL');
	}
	
	function verifyloginEmployee()
	 {
	   $confirmation=$this->input->post('login');
	   if ($confirmation=="login"){
		   //This method will have the credentials validation
		   $this->load->library('form_validation');

		   $this->form_validation->set_rules('Username', 'Username', 'trim|required');
		   $this->form_validation->set_rules('Password', 'Password', 'trim|required|callback_check_database_employee');

		   if($this->form_validation->run() == FALSE)
		   {
			 //Field validation failed.  User redirected to login page
			 $this->login();
		   }
		   else
		   {
			 //Go to private area
			 redirect('WMS/Homepage');
		   }
	   }else{
		 redirect('WMS/InvalidURL');
	   }
	   
	   
	 }
	 
	 
	 function __construct()
	{
	   parent::__construct();
	   $this->load->model('model_get','',TRUE);
	   date_default_timezone_set('asia/manila');
	   $this->load->library('pagination');
	   $prefs = array (
			   'local_time'    => time(),
	        );
		   
		$this->load->library('calendar', $prefs);
		$this->load->library('session');	   
    }
	 
	  function check_database_employee($Password)
	{
	   //Field validation succeeded.  Validate against database
	   $Username = $this->input->post('Username');
		if( $Username != ''){
		   //query the database
		   $result = $this->model_get->checkAuthentication($Username, $Password);

		   if($result)
		   {
			 $sess_array = array();
			 foreach($result as $row)
			 {
			   $sess_array = array(
				 'DceNo' => $row->dceno,
				 'Username' => $row->username,
				 'Password' => $row->password,
				 'Fname' => $row->fname,
				 'Mname' => $row->mname,
				 'Lname' => $row->lname,
				 'Position' => $row->position,
				 'Access_level' => $row->user_access_level,
				 'CcNo' => $row->ccno,
				 'Section' => $row->requisitioning_section,
				 
			   );
			   
			   if($sess_array['Access_level']=="1")
			   {
					$this->session->set_userdata('logged_PO', $sess_array);
			   }elseif($sess_array['Access_level']=="2")
			   {
					$this->session->set_userdata('logged_PR', $sess_array);
			   }elseif($sess_array['Access_level']=="3")
			   {
					$this->session->set_userdata('logged_ADMIN', $sess_array);
			   }elseif($sess_array['Access_level']=="4"){
					$this->session->set_userdata('logged_EU', $sess_array);
			   }else{
					$this->session->set_userdata('other', $sess_array);
			   }
			 }
			 return TRUE;
		   }
		   else
		   {
			 $this->form_validation->set_message('check_database_employee', 'Opps !!  Error: Invalid username or password');
			 return false;
		   }
		}else{
			redirect('WMS/InvalidURL');
		}
		
	}
	
	  /****   emp-logout destroy session ******/
	public function emp_logout(){
	  $this->session->sess_destroy();
	  redirect('WMS');
	
	}
	
	
	//homepage
	public function Homepage(){
		if($this->session->userdata('logged_ADMIN')){
		  $action = $this->session->flashdata('action');
		  $this->session->keep_flashdata('action');
		  
		//  $SpId_new_spare = $this->session->flashdata('SpId');
		  //$this->session->keep_flashdata('SpId_new_spare');
		  
		  $message = $this->session->flashdata('message');
		  $this->session->keep_flashdata('message');
			$session_data = $this->session->userdata('logged_ADMIN');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			 if ($action=="add-user" || $action=="delete-user" || $action=="update-user") {
		      //$SpId = $SpId_new_spare;
			  $data['message']= $message;
			  
			  }else{
			  
				//$SpId = $this->input->post('SpId');
					$data['message'] = "LIST OF USER";
			  }
		
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Lname";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			//print_r ($data);
			$data['user'] = $this->model_get->getAllEmployeeData();
			$this->load->view('ADMIN_Homepage',$data);
			
		}elseif($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			$data['Category'] = $this->model_get->getCategory();
			$data['Delivery'] = $this->model_get->getDelivery();
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add"){
					$data['message'] = $message;
				}else{
					$data['message'] = "INVENTORY";
				}
			$this->load->view('PO_Homepage',$data);
			
		}else if($this->session->userdata('logged_EU')){
			$session_data = $this->session->userdata('logged_EU');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
			$result = $this->model_get->checkWRLastId($DceNo);
			if($result)
			{
			 $Id_array = array();
			 foreach($result as $row)
			 {
			   $Id_array = array(
				 'SpId' => $row->wrid
			   );
			 }
			}else{}			
		
			$LastSpId = $Id_array ['SpId'];
			if($LastSpId <= 0){
				$SpId2 = 1;
			}else{
				$SpId2 = $LastSpId + 1;
			}
			$data['LastSpID'] = $SpId2;
			$data['Category'] = $this->model_get->getCategory();
			$data['Delivery'] = $this->model_get->getDelivery();
			
			//var_dump ($this->model_get->getCategory());
			$this->load->view('EndUser_Homepage',$data);
		}else if($this->session->userdata('logged_PR')){
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
		   $data['message'] = "";
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			$data['Category'] = $this->model_get->getCategory();
			
			$data['Draft3'] = $this->model_get->getallPendingPR();
			
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "PR APPROVAL";
				}
		
			redirect('WMS/Approve_PR');
		}elseif($this->session->userdata('other')){
			$this->session->sess_destroy();
			redirect('WMS');
			
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	
	//PR Approval Info
	public function Approved_PR(){

		if($this->session->userdata('logged_PR') || $this->session->userdata('logged_PO')){

		  
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
		   $data['message'] = "";
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			$data['Category'] = $this->model_get->getCategory();
			
			$data['Draft3'] = $this->model_get->getallApprovePR();
			
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "APPROVED PR";
				}
			$this->load->view('Approved_PR',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function editPR1(){

		if($this->session->userdata('logged_PR')){
		  $sms = $this->input->post('sms');

		  $PR_Date = $this->input->post('PR_Date');
		  $BId = $this->input->post('BId');
		
	      $newRow=array(
			
			  "PR_Date" => $this->input->post('PR_Date'),
			  "PR_Status" => $this->input->post('PR_Status'),
			  "PR_responsible_person" => $this->input->post('PR_responsible_person'),

		 );
			$this->model_get->editPR1($PR_Date,$newRow);
			
				$this->session->set_flashdata('PR_Date',"$PR_Date");
				$this->session->set_flashdata('action','add-spare');
				
					if ($sms == "accept-confirm"){
						$message="<code style='background-color:#FAFAFA;'>PR-$PR_Date</code> was Approved ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Approved_PR');
					}elseif ($sms == "cancel-confirm"){
						$message="<code style='background-color:#FAFAFA;'>PR-$PR_Date</code> was Cancelled ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Homepage');
					}elseif($sms == "bid-confirm"){
						 $newRow2=array(
							  "Date" => $this->input->post('Date_b'),
							  "Time" => $this->input->post('Time_b'),
							  "Venue" => $this->input->post('Venue_b'),
							  "PR_Date" => $this->input->post('PR_Date'),
							  "Submit" => "",
							  
						 );
						$this->model_get->addBidding($newRow2);
						//$this->model_get->addBidding_Details($newRow3);
						
						$message="PR: <code style='background-color:#FAFAFA;'>PR-$PR_Date</code> Was Added for Bidding...";
						$this->session->set_flashdata('message',"$message");
						 $this->session->set_flashdata('action','add-spare');
						redirect('WMS/Bidding');
					}elseif($sms == "add-Bid"){
						 $newRow3=array(
							  "Quatation" => $this->input->post('Quotation'),
							  "WSid" => $this->input->post('WSid'),
							  "PR_Date" => $this->input->post('PR_Date'),
							  "SDceNo" => $this->input->post('SDceNo'),
							  "BId" => $this->input->post('BId'),
							  
						 );
						$this->model_get->addBidding_Details($newRow3);
						
						$message="Quotation Was Successfully Added...";
						$this->session->set_flashdata('message',"$message");
						$this->session->set_flashdata('$PR_Date',"$PR_Date");
						$this->session->set_flashdata('$BId',"$BId");
						 $this->session->set_flashdata('action','add-spare');
						redirect('WMS/Bidding_PR_Info');
					}else {
			
						$message="OPPs!!! An Error Occur ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Homepage');
					}
	
				
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function UpdateSpare(){

		if($this->session->userdata('logged_PO')){
          $WSid = $this->input->post('WSid');
		   $Spare_Name = $this->input->post('Spare_Name');
		
			$newRow=array(
			
				"category" => $this->input->post('Category'),
				"spare_name" => $this->input->post('Spare_Name'),
				"description" => $this->input->post('Description'),
				"quantity_onhand" => $this->input->post('Quantity_onHand'),
				"quantity_onorder" => $this->input->post('Quantity_onOrder'),
				"reordering_pt" => $this->input->post('ReOrdering_Pt'),
				"unit_of_measurement" => $this->input->post('Unit_Of_Measurement'),
				"delivery_price" => $this->input->post('Delivery_Price'),
				"file_name" => 'system-icon3.png'
				 ); 
			
			$this->model_get->Update_Spare($WSid,$newRow);
			$message="$Spare_Name has been updated...";
            $this->session->set_flashdata('action','add');
            $this->session->set_flashdata('message',"$message");
			
			
			redirect('WMS/Homepage');
		
			}else{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}

	
	}
	public function AddSpare(){

		if($this->session->userdata('logged_PO')){
         
          $Spare_Name = $this->input->post('Spare_Name');
	
			$newRow=array(
			
				"category" => $this->input->post('Category'),
				"spare_name" => $this->input->post('Spare_Name'),
				"description" => $this->input->post('Description'),
				"quantity_onhand" => 0,
				"quantity_onorder" =>0,
				"reordering_pt" => $this->input->post('ReOrdering_Pt'),
				"unit_of_measurement" => $this->input->post('Unit_Of_Measurement'),
				"delivery_price" => $this->input->post('Delivery_Price'),
				"file_name" => 'system-icon3.png'
				 ); 
			
			$this->model_get->addSpare($newRow);
			$message="$Spare_Name has been Added...";
            $this->session->set_flashdata('action','add');
            $this->session->set_flashdata('message',"$message");
			
			
			redirect('WMS/Homepage');
		
			}else{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}

	
	}
	
	public function Spare_Purchase(){

		if($this->session->userdata('logged_EU')){
			$session_data = $this->session->userdata('logged_EU');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			
			if ($Section == "AGUS 7 HEP"){
				$sectionId = 3;
			}else {
				$sectionId = 4;
				
			}
		
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
			
			$data['Category'] = $this->model_get->getCategory();
			$data['Draft'] = $this->model_get->getDraftSparePurchase($DceNo);
			$data['Draft1'] = $this->model_get->getSentSparePurchase($DceNo);
			$result1 = $this->model_get->getPPMPOfficer($sectionId);
			if($result1)
			{
			 $Id_array1 = array();
			 foreach($result1 as $row)
			 {
			   $Id_array1 = array(
				 'Name' => $row->name,
				 'Value' => $row->value
			   );
			 }
			}else{}			
			
			$result2 = $this->model_get->getOicOfficer();
			if($result2)
			{
			 $Id_array2 = array();
			 foreach($result2 as $row)
			 {
			   $Id_array2 = array(
				 'Name' => $row->name,
				 'Value' => $row->value
			   );
			 }
			}else{}			
			
		
			$data['Oicname'] = $Id_array2 ['Value'];;
			
			$data['officername'] = $Id_array1 ['Value'];;
			$data['officersubname'] = $Id_array1 ['Name'];
			
			$result = $this->model_get->checkSpLastId($DceNo);
			if($result)
			{
			 $Id_array = array();
			 foreach($result as $row)
			 {
			   $Id_array = array(
				 'SpId' => $row->SpId
			   );
			 }
			}else{}			
		
			$LastSpId = $Id_array ['SpId'];
			if($LastSpId <= 0){
				$SpId = 1;
			}else{
				$SpId = $LastSpId + 1;
			}
			$data['LastSpID'] = $SpId;
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add"){
					$data['message'] = $message;
				}else{
					$data['message'] = "REQUESTED SPARES";
				}
			
			
			$this->load->view('Spare_Purchase',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Request_Spare(){

		if($this->session->userdata('logged_EU')){
			$session_data = $this->session->userdata('logged_EU');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			
			if ($Section == "AGUS 7 HEP"){
				$sectionId = 3;
			}else {
				$sectionId = 4;
				
			}
			
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
			
			$data['Category'] = $this->model_get->getCategory();
			$data['Draft'] = $this->model_get->getPendingRequest($DceNo);
			$data['Draft1'] = $this->model_get->getApprovedRequest($DceNo);
			$data['Withdrawal_Details'] = $this->model_get->Withdrawal_Details();
			$result1 = $this->model_get->getPPMPOfficer($sectionId);
			if($result1)
			{
			 $Id_array1 = array();
			 foreach($result1 as $row)
			 {
			   $Id_array1 = array(
				 'Name' => $row->name,
				 'Value' => $row->value
			   );
			 }
			}else{}		
			
			
			$result2 = $this->model_get->getOicOfficer();
			if($result2)
			{
			 $Id_array2 = array();
			 foreach($result2 as $row)
			 {
			   $Id_array2 = array(
				 'Name' => $row->name,
				 'Value' => $row->value
			   );
			 }
			}else{}			
			
		
			$data['Oicname'] = $Id_array2 ['Value'];;
			
			$data['officername'] = $Id_array1 ['Value'];;
			$data['officersubname'] = $Id_array1 ['Name'];
			
			$result = $this->model_get->checkWRLastId($DceNo);
			if($result)
			{
			 $Id_array = array();
			 foreach($result as $row)
			 {
			   $Id_array = array(
				 'SpId' => $row->wrid
			   );
			 }
			}else{}			
		
			$LastSpId = $Id_array ['SpId'];
			if($LastSpId <= 0){
				$SpId = 1;
			}else{
				$SpId = $LastSpId + 1;
			}
			$data['LastSpID'] = $SpId;
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add"){
					$data['message'] = $message;
				}else{
					$data['message'] = "LIST OF WITHDRAWAL REQUEST";
				}
			
			
			$this->load->view('Request_Spares',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Approve_Request(){

		if($this->session->userdata('logged_EU')){
			$session_data = $this->session->userdata('logged_EU');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			
			if ($Section == "AGUS 7 HEP"){
				$sectionId = 3;
			}else {
				$sectionId = 4;
				
			}
			
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
			
			$data['Category'] = $this->model_get->getCategory();
			$data['Draft'] = $this->model_get->getReleasedRequest($DceNo);
			$data['Draft1'] = $this->model_get->getApprovedRequest($DceNo);
			$data['Withdrawal_Details'] = $this->model_get->Withdrawal_Details();
			$result1 = $this->model_get->getPPMPOfficer($sectionId);
			if($result1)
			{
			 $Id_array1 = array();
			 foreach($result1 as $row)
			 {
			   $Id_array1 = array(
				 'Name' => $row->name,
				 'Value' => $row->value
			   );
			 }
			}else{}		
			
			
			$result2 = $this->model_get->getOicOfficer();
			if($result2)
			{
			 $Id_array2 = array();
			 foreach($result2 as $row)
			 {
			   $Id_array2 = array(
				 'Name' => $row->name,
				 'Value' => $row->value
			   );
			 }
			}else{}			
			
		
			$data['Oicname'] = $Id_array2 ['Value'];;
			
			$data['officername'] = $Id_array1 ['Value'];;
			$data['officersubname'] = $Id_array1 ['Name'];
			
			$result = $this->model_get->checkWRLastId($DceNo);
			if($result)
			{
			 $Id_array = array();
			 foreach($result as $row)
			 {
			   $Id_array = array(
				 'SpId' => $row->wrid
			   );
			 }
			}else{}			
		
			$LastSpId = $Id_array ['SpId'];
			if($LastSpId <= 0){
				$SpId = 1;
			}else{
				$SpId = $LastSpId + 1;
			}
			$data['LastSpID'] = $SpId;
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add"){
					$data['message'] = $message;
				}else{
					$data['message'] = "LIST OF APPROVED WITHDRAWAL REQUEST";
				}
			
			
			$this->load->view('Approve_Spares',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Request_Spare_Approved(){

		if($this->session->userdata('logged_EU')){
			$session_data = $this->session->userdata('logged_EU');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			
			if ($Section == "AGUS 7 HEP"){
				$sectionId = 3;
			}else {
				$sectionId = 4;
				
			}
		
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
			
			$data['Category'] = $this->model_get->getCategory();
			$data['Draft'] = $this->model_get->getPendingRequest($DceNo);
			$data['Draft1'] = $this->model_get->getSentRequest($DceNo);
			$result1 = $this->model_get->getPPMPOfficer($sectionId);
			if($result1)
			{
			 $Id_array1 = array();
			 foreach($result1 as $row)
			 {
			   $Id_array1 = array(
				 'Name' => $row->name,
				 'Value' => $row->value
			   );
			 }
			}else{}			
			
			$result2 = $this->model_get->getOicOfficer();
			if($result2)
			{
			 $Id_array2 = array();
			 foreach($result2 as $row)
			 {
			   $Id_array2 = array(
				 'Name' => $row->name,
				 'Value' => $row->value
			   );
			 }
			}else{}			
			
		
			$data['Oicname'] = $Id_array2 ['Value'];;
			
			$data['officername'] = $Id_array1 ['Value'];;
			$data['officersubname'] = $Id_array1 ['Name'];
			
			$result = $this->model_get->checkWRLastId($DceNo);
			if($result)
			{
			 $Id_array = array();
			 foreach($result as $row)
			 {
			   $Id_array = array(
				 'SpId' => $row->wrid
			   );
			 }
			}else{}			
		
			$LastSpId = $Id_array ['SpId'];
			if($LastSpId <= 0){
				$SpId = 1;
			}else{
				$SpId = $LastSpId + 1;
			}
			$data['LastSpID'] = $SpId;
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add"){
					$data['message'] = $message;
				}else{
					$data['message'] = "REQUESTED SPARES";
				}
			
			
			$this->load->view('Request_Spares_Approved',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	public function createrequest(){

		if($this->session->userdata('logged_EU')){
		  $session_data = $this->session->userdata('logged_EU');
		  
		  $ddid = $this->input->post('ddid');
		  $DceNo = $this->input->post('DceNo');
		  $WRId = $this->input->post('WRId');
		  $Qty_Requested= $this->input->post('Qty_Requested');
		  $Cur_date =  date('F d, Y h:i A',time());
	      $newRow=array(
			
			  "wrid" => $WRId,
			  "date_created" => $Cur_date,
			  "released_by" => "- -",
			  "date_released" => "0000-00-00 00:00:00",
			  "status" => "Draft",
			  "remarks" => $this->input->post('Purpose'),
			  "dceno" => $DceNo,
			

		 );
		 
		 $newRow2=array(
	
			  "qty_requested" => $Qty_Requested,
			  "qty_released" => 0,
			  "ddid" => $ddid,
			  "wrid" => $WRId,
			

		 );
		//	print_r($newRow2);
			$this->model_get->addRequestSpare($newRow);
			$this->model_get->addRequestSpare_details($newRow2);
			$message="REQUEST HAS BEEN ADDED";
            $this->session->set_flashdata('action','add');
            $this->session->set_flashdata('message',"$message");
            $this->session->set_flashdata('WRId',"$WRId");
			redirect('WMS/Request_Spares_Info');
		
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	
	//	"UpdateSpareToDraft"
	public function UpdateSpareToRequest(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->input->post('action');
          $WRId = $this->input->post('WRId');
          $ddid = $this->input->post('ddid');
          $Qty_Requested = $this->input->post('Qty_Requested');
	
		if ($action == "EditSpareToDraft"){
			
			
			$newRow=array(
			
				"qty_requested" => $Qty_Requested,
				"qty_released" => 0,
				"ddid" => $ddid,
				"wrid" => $WRId,
				 ); 
			
			$message="Spare Request has been update...";
            $this->session->set_flashdata('WRId',"$WRId");
            $this->session->set_flashdata('action','update');
            $this->session->set_flashdata('message',"$message");
			$this->model_get->Update_Spare_Request_Details($ddid,$WRId,$newRow);
			
			
			redirect('WMS/Request_Spares_Info');
			//print_r($newRow);
			}else{
			 redirect('WMS/Request_Spare');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	//	"UpdateSpareToDraft"
	public function UpdateSpareToReleased(){
		$id = $this->uri->segment(3);
		if($this->session->userdata('logged_PO')){
		$Cur_date =  date('F d, Y h:i A',time());
			$this->model_get->Update_Delete_Spare_Release($id,$Cur_date);
			$this->session->set_flashdata('WRId',"$WRId");
            $this->session->set_flashdata('action','update');
            $this->session->set_flashdata('message',"$message");
			$message="Qty Release has been added ...";
			
			redirect('WMS/Request_Approved');
	}else{redirect('WMS/InvalidURL');}}
	
	public function UpdateSpareToApproved(){

		if($this->session->userdata('logged_PO')){
		  $action = $this->input->post('action');
          $WRId = $this->input->post('WRId');
          $ddid = $this->input->post('ddid');
          $Qty_Requested = $this->input->post('Qty_Requested');
		  $Qty_Release = $this->input->post('Qty_Release');
	
		if ($action == "EditSpareToDraft"){
			
			
			$newRow=array(
			
				"qty_requested" => $Qty_Requested,
				"qty_released" => $Qty_Release,
				"ddid" => $ddid,
				"wrid" => $WRId,
				 ); 
			
			$message="Qty Release has been added ...";
            $this->session->set_flashdata('WRId',"$WRId");
            $this->session->set_flashdata('action','update');
            $this->session->set_flashdata('message',"$message");
			$this->model_get->Update_Spare_Request_Details($ddid,$WRId,$newRow);
			
			
			redirect('WMS/Spare_Approved_Info');
			//print_r($newRow);
			}else{
			 redirect('WMS/Request_Approved');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Request_Spares_Info(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->session->flashdata('action');
		  $this->session->keep_flashdata('action');
		  
		    $WRId_new_spare = $this->session->flashdata('WRId');
		  $this->session->keep_flashdata('SpId_new_spare');
		  
		  $message = $this->session->flashdata('message');
		  $this->session->keep_flashdata('message');
		   
		  $session_data = $this->session->userdata('logged_EU');
		  $DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];
		  $Position = $session_data['Position'];$Password = $session_data['Password'];$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];
		  $Section = $session_data['Section'];$Access_level = $session_data['Access_level'];
		
		  $data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
		  $data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
		  if ($action=="add" || $action=="delete" || $action=="update"	) {
			$WRId = $WRId_new_spare;
			$data['message']= $message;
		  
		  }else{
		  
			$WRId = $this->input->post('WRId');
			$data['message']= "Warehouse Requisition";
		  }
		  $data['WRId'] = $WRId;
     
				$data['SpareInfo'] = $this->model_get->Spare_Withdraw_Details($WRId);
				$data['Category'] = $this->model_get->getCategory();
				$data['Delivery'] = $this->model_get->getDelivery();
				$data['DraftInfo'] = $this->model_get->getSpecificRequest($WRId);
				$this->load->view('Request_Spares_Info',$data);
			} else {
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	}
	
	
	public function Approved_Spares_Info(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->session->flashdata('action');
		  $this->session->keep_flashdata('action');
		  
		    $WRId_new_spare = $this->session->flashdata('WRId');
		  $this->session->keep_flashdata('SpId_new_spare');
		  
		  $message = $this->session->flashdata('message');
		  $this->session->keep_flashdata('message');
		   
		  $session_data = $this->session->userdata('logged_EU');
		  $DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];
		  $Position = $session_data['Position'];$Password = $session_data['Password'];$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];
		  $Section = $session_data['Section'];$Access_level = $session_data['Access_level'];
		
		  $data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
		  $data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
		  if ($action=="add" || $action=="delete" || $action=="update"	) {
			$WRId = $WRId_new_spare;
			$data['message']= $message;
		  
		  }else{
		  
			$WRId = $this->input->post('WRId');
			$data['message']= "Warehouse Requisition";
		  }
		  $data['WRId'] = $WRId;
     
				$data['SpareInfo'] = $this->model_get->Spare_Withdraw_Details($WRId);
				$data['getOicOfficer'] = $this->model_get->getOicOfficer();
				$data['getppmp'] = $this->model_get->getppmp();
				$data['Category'] = $this->model_get->getCategory();
				$data['Delivery'] = $this->model_get->getDelivery();
				$data['DraftInfo'] = $this->model_get->getSpecificRequest($WRId);
				$this->load->view('Approved_Spares_Info',$data);
			} else {
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	}
	
	
	public function submitrequestspares(){

		if($this->session->userdata('logged_EU') && $this->input->post('sms') == 'accept-confirm'){
			$Cur_date =  date('F d, Y h:i A',time());
			$WRId = $this->input->post('wrid');
			$this->model_get->Update_Submit_Spare_Request($Cur_date,$WRId);
			
			$message="Withdrawal Request: <code style='background-color:#FAFAFA;'>$WRId</code> has been Submitted ...";
			
			$this->session->set_flashdata('WRId',"$WRId");
            $this->session->set_flashdata('action','add');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Request_Spare');
			
		}else{redirect('WMS/InvalidURL');}
	}
	
	public function Released_Spares_Info(){

		if($this->session->userdata('logged_EU')){
		  
		  
		  
		  $session_data = $this->session->userdata('logged_EU');
		 $DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		   
			$WRId = $this->input->post('WRId');
			$data['message']= "Warehouse Requisition";
		  
				$data['WRId'] = $WRId;
			
				$data['SpareInfo'] = $this->model_get->Spare_Withdraw_Details($WRId);
				$data['Category'] = $this->model_get->getCategory();
				$data['DraftInfo'] = $this->model_get->getSpecificRequest($WRId);
				$this->load->view('Released_Spares_Info',$data);
	
		
			}
		 
		else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function createdraft(){

		if($this->session->userdata('logged_EU')){
		  $session_data = $this->session->userdata('logged_EU');
		  
		  $SpId = $this->input->post('SpId');
		  $Date_Prepared = $this->input->post('Date_Prepared');
		  $Date_Needed = strtotime($this->input->post('Date_Needed'));
		  $Requisitioning_Section = $this->input->post('Requisitioning_Section');
		  $PPMP_officer = $this->input->post('PPMP_officer');
		  $PPMP_Section = $this->input->post('PPMP_Section');
		  $Purpose = $this->input->post('Purpose');
		  $Oic = $this->input->post('Oic');
		  $DceNo = $this->input->post('DceNo');
		  $Category = $this->input->post('Category');
		  
		  $Needed = date('F d , Y',$Date_Needed);		 
		  
	      $newRow=array(
			
			  "SpId" => $SpId,
			  "Date_Prepared" => "$Date_Prepared",
			  "Date_Needed" => "$Needed",
			  "requisitioning_section" => $Requisitioning_Section,
			  "Ppmp_officer" => $PPMP_officer,
			  "Ppmp_Section" => $PPMP_Section,
			  "Purpose" => $Purpose,
			  "Oic" => $Oic,
			  "Status" => "Draft",
			  "Date_Status_Changed" => "",
			  "Po_Incharge" => "",
			  "dceno"=> $DceNo,
			  "note"=>"Please Submit Broshure",
			  "remark"=>"none"

		 );
			$this->model_get->addSparePurchase($newRow);
			$message="DRAFT HAS BEEN ADDED";
            $this->session->set_flashdata('action','add');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Spare_Purchase');
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	
	public function editdraft(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		  $sms = $this->input->post('sms');
		  $SpId = $this->input->post('SpId');
		  $DceNo = $this->input->post('DceNo');
		  $Date_Needed = $this->input->post('Date_Needed');
		  $New_Needed = strtotime($this->input->post('New_Needed'));
		  $Needed = date('F d , Y',$New_Needed);		 
		  if($Needed == "January 01 , 1970" || $Needed == $Date_Needed){
			$Final_Needed=$Date_Needed;
		  }else {
			$Final_Needed=$Needed;
		  }
		  
	      $newRow=array(
			
			  "Date_Prepared" => $this->input->post('Date_Prepared'),
			  "Date_Needed" => "$Final_Needed",
			  "requisitioning_section" => $this->input->post('Requisitioning_Section'),
			  "Ppmp_Officer" => $this->input->post('PPMP_officer'),
			  "Ppmp_Section" => $this->input->post('PPMP_Section'),
			  "Purpose" => $this->input->post('Purpose'),
			  "OIC" => $this->input->post('Oic'),
			  "Status" => $this->input->post('Status'),
			  "Date_Status_Changed" => $this->input->post('Date_Status_Changed'),
			  "PO_Incharge" => $this->input->post('Po_Incharge'),
			  "dceno"=> $this->input->post('DceNo'),
			  "note"=>$this->input->post('note'),
			  "remark"=>$this->input->post('remark')

		 );
			$this->model_get->editdraft($SpId,$newRow);
			
				$this->session->set_flashdata('DceNo',"$DceNo");
				$this->session->set_flashdata('SpId',"$SpId");
				$this->session->set_flashdata('action','add-spare');
				
					if ($sms == "sms-confirm"){
						$message="Successfully Sent ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Draft');
						
					}elseif ($sms == "accept-confirm"){
						$message="Pre-PR : <code style='background-color:#FAFAFA;'>$SpId</code> was Accepted ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Spare_Request');
					}elseif ($sms == "decline-confirm"){
						$message="Pre-PR : <code style='background-color:#FAFAFA;'>$SpId</code> was Declined ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Spare_Request');
					}else {
			
						$message="Changes has been updated..";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Draft');
					}
	
				
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	public function editrequest(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		  $sms = $this->input->post('sms');
		  $DceNo = $this->input->post('DceNo');
		  $WRId = $this->input->post('WRId');
		  $Status = $this->input->post('Status');
		  $Remarks = $this->input->post('Remarks');
		  $Purpose = $this->input->post('Purpose');
		  $Released_by = $this->input->post('released_by');
		  $Cur_date =  date('F d , Y h:i A',time());
		  
		  $con_cat = explode ("///",$Remarks);
		  $update_remarks = "$con_cat[0]///$Purpose";
		
			$this->model_get->Evaluate_Spare_Request($Status,$Cur_date,$Released_by,$WRId,$update_remarks);
			 
				$this->session->set_flashdata('DceNo',"$DceNo");
				$this->session->set_flashdata('WRId',"$WRId");
				$this->session->set_flashdata('action','add-spare');
				
					if ($sms == "accept-confirm"){
						$message="<code style='background-color:#FAFAFA;'>$WRId</code> was Accepted ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Spare_Request');
					}elseif ($sms == "decline-confirm"){
						$message="<code style='background-color:#FAFAFA;'>$WRId</code> was Declined ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Spare_Request');
					}else {
			
						$message="OPPs!!! An Error Occur ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Spare_Request');
					}
	
				
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	
	public function editPR(){

		if($this->session->userdata('logged_PR')){
		  date_default_timezone_set('asia/manila');
		  $sms = $this->input->post('sms');
		  $SpId = $this->input->post('SpId');
		  $Date_b = $this->input->post('Date_b');
		  $Time_b = $this->input->post('Time_b');
		  $Venue_b = $this->input->post('Venue_b');
          $newDateTime = date('h:i A', strtotime($Time_b));
		  $newDate = date('F d , Y',strtotime($Date_b));
          //echo $newDate;
          //echo $newDateTime; 
		  
		 
		 $DceNo = $this->input->post('DceNo');
		  $Date_Needed = $this->input->post('Date_Needed');
		  $New_Needed = strtotime($this->input->post('New_Needed'));
		  $Needed = date('F d , Y',$New_Needed);		 
		  if($Needed == "January 01 , 1970" || $Needed == $Date_Needed){
			$Final_Needed=$Date_Needed;
		  }else {
			$Final_Needed=$Needed;
		  }
		  
					if ($sms == "accept-confirm"){
						$new_SpId2=explode('-',$SpId);
						$pr2=str_replace ("PREPR", "PR",$new_SpId2[1]);
						$new_SpId="$new_SpId2[0]-$pr2-$new_SpId2[2]";
					}elseif($sms == "decline-confirm"){
						$new_SpId2=explode('-',$SpId);
						$pr2=str_replace ("PR","PREPR",$new_SpId2[1]);
						$new_SpId="$new_SpId2[0]-$pr2-$new_SpId2[2]";
					}else{
						$new_SpId=$SpId;
					}
					
					
	      $newRow=array(
			
			  "SpId" => $new_SpId,
			  "Date_Prepared" => $this->input->post('Date_Prepared'),
			  "Date_Needed" => "$Final_Needed",
			  "requisitioning_section" => $this->input->post('Requisitioning_Section'),
			  "Ppmp_Officer" => $this->input->post('PPMP_officer'),
			  "Ppmp_Section" => $this->input->post('PPMP_Section'),
			  "Purpose" => $this->input->post('Purpose'),
			  "OIC" => $this->input->post('Oic'),
			  "Status" => $this->input->post('Status'),
			  "Date_Status_Changed" => $this->input->post('Date_Status_Changed'),
			  "PO_Incharge" => $this->input->post('Po_Incharge'),
			  "dceno"=> $this->input->post('DceNo'),
			  "note"=>$this->input->post('note'),
			  "remark"=>$this->input->post('remark')

		 );
		 
			$this->model_get->editdraft($SpId,$newRow);
			
				$this->session->set_flashdata('DceNo',"$DceNo");
				$this->session->set_flashdata('SpId',"$new_SpId");
				$this->session->set_flashdata('action','add-spare');
				//echo $Date_b."-".$Time_b."-".$Venue_b;
					if ($sms == "sms-confirm"){
						$message="Successfully Sent ...";
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Draft');
						
					}elseif ($sms == "accept-confirm"){
						$message="PR: <code style='background-color:#FAFAFA;'>$new_SpId</code> was Approved ...";
						$this->session->set_flashdata('message',"$message");
						 $this->session->set_flashdata('action','add-spare');
						redirect('WMS/Approved_PR');
					}elseif ($sms == "decline-Bid"){
						$message="PR: <code style='background-color:#FAFAFA;'>$new_SpId</code> Bidding was Cancelled ...";
						$this->session->set_flashdata('message',"$message");
						 $this->session->set_flashdata('action','add-spare');
						$this->model_get->Delete_Bidding($this->input->post('BId'));
						$this->model_get->Delete_Bidding_Details($this->input->post('BId'));
						redirect('WMS/Approved_PR');
					}elseif ($sms == "bid-confirm"){
						 $newRow2=array(
							  "Date" => $Date_b,
							  "Time" => $Time_b,
							  "Venue" => $Venue_b,
							  "SpId" => $new_SpId,
							  
						 );
						$this->model_get->addBidding($newRow2);
						//$this->model_get->addBidding_Details($newRow3);
						
						$message="PR: <code style='background-color:#FAFAFA;'>$SpId</code> Was Added for Bidding...";
						$this->session->set_flashdata('message',"$message");
						 $this->session->set_flashdata('action','add-spare');
						redirect('WMS/Bidding');
					}elseif ($sms == "decline-confirm"){
						$message="PRE-PR: <code style='background-color:#FAFAFA;'>$new_SpId</code> Approval was Cancel ...";
						$this->session->set_flashdata('message',"$message");
						 $this->session->set_flashdata('action','add-spare');
						redirect('WMS/Homepage');
					}else {
			
						$message="Changes has been updated..";
						
						$this->session->set_flashdata('message',"$message");
						redirect('WMS/Homepage');
					}
	
				
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	public function Draft(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->session->flashdata('action');
		  $this->session->keep_flashdata('action');
		  
		  $SpId_new_spare = $this->session->flashdata('SpId');
		  $this->session->keep_flashdata('SpId_new_spare');
		  
		  $message = $this->session->flashdata('message');
		  $this->session->keep_flashdata('message');
		  
		  
		  $session_data = $this->session->userdata('logged_EU');
		 $DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
		  if ($action=="add-spare" || $action=="delete-spare" || $action=="update-spare" || $action=="add-technical" || $action=="delete-technical") {
			$SpId = $SpId_new_spare;
			$data['message']= $message;
		  
		  }else{
		  
			$SpId = $this->input->post('SpId');
			$data['message']= "PRE-PR DRAFT";
		  }
		  
		  
          
		 if (empty($SpId)== 1){			
				redirect('WMS/Spare_Purchase');
		}else{
				$data['TechnicalInfo'] = $this->model_get->Spare_Technical_Details($SpId);
				$data['SpareInfo'] = $this->model_get->Spare_Purchase_Details($SpId);
				$data['Category'] = $this->model_get->getCategory();
				$data['DraftInfo'] = $this->model_get->getSpecificDraft($SpId);
				$this->load->view('Draft',$data);
	
				}
			}
		 
		else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	// Pre-PR
	public function Pre_PR(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->session->flashdata('action');
		  $this->session->keep_flashdata('action');
		  
		  $SpId_new_spare = $this->session->flashdata('SpId');
		  $this->session->keep_flashdata('SpId_new_spare');
		  
		  $message = $this->session->flashdata('message');
		  $this->session->keep_flashdata('message');
		  
		  
		  $session_data = $this->session->userdata('logged_EU');
		  $DceNo = $session_data['DceNo'];
		  $Fname = $session_data['Fname'];
		  $Mname = $session_data['Mname'];
		  $Lname = $session_data['Lname'];
		  $Position = $session_data['Position'];
		  $CcNo = $session_data['CcNo'];
		  $Section = $session_data['Section'];
		  
		  $data['DceNo'] = "$DceNo";
		  $data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		  $data['Fname'] = $Fname[0];
		  $data['Mname'] = $Mname[0];
		  $data['Lname'] = $Lname[0];
		  $data['Position'] = "$Position";
		  $data['CcNo'] = "$CcNo";
		  $data['Section'] = "$Section";
		
			$SpId = $this->input->post('SpId');
			$data['message']= "PRE-PR";
		  
		  
				$data['TechnicalInfo'] = $this->model_get->Spare_Technical_Details($SpId);
				$data['SpareInfo'] = $this->model_get->Spare_Purchase_Details($SpId);
				$data['Category'] = $this->model_get->getCategory();
				$data['DraftInfo'] = $this->model_get->getSpecificDraft($SpId);
				$this->load->view('Pre_PR',$data);
	
				
			}
		 
		else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	/*  Add Spares */
	public function new_spare(){

		if($this->session->userdata('logged_EU')){
		  $new_spare = $this->input->post('new_spare');
          $SpId = $this->input->post('SpId');
		 if ($new_spare == "new-spare-verified"){
	      $session_data = $this->session->userdata('logged_EU');
		
			$newRow=array(
			
			  "Category" => $this->input->post('spare-category'),
			  "Spare_Name" => $this->input->post('spare-name'),
			  "Description" => $this->input->post('spare-description'),
			  "Quantity_onHand" => 0,
			  "Quantity_onOrder" => 0,
			  "DId" => 0
			  
		 );
		 
	
			$result = $this->model_get->checkSLastId();
			if($result)
			{
			 $Id_array = array();
			 foreach($result as $row)
			 {
			   $Id_array = array(
				 'WSid' => $row->WSid,
			   );
			 }
			}else{}			
		
			$LastSId = $Id_array ['WSid'];
			if($LastSId <= 0){
				$WSid = 1;
			}else{
				$WSid = $LastSId+1;
			}
			
		 $newRow2=array(
			
			  "Qty" => 0,
				"UM" => "",
			  "Estimated_Cost" => 0,
			  "WSid" =>$WSid,
			  "SpId" => $this->input->post('SpId'),
			  
		 );
		 
			//add spare list
			$this->model_get->addSpare($newRow);
			// Add Pre - PR Details
			$this->model_get->addSpare_Purchase_Details($newRow2);
			echo $LastSId."-";
			echo $WSid;
			$message="NEW Spare has been added..";
            $this->session->set_flashdata('SpId',"$SpId");
            $this->session->set_flashdata('action','add-spare');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Draft');
			//print_r($newRow);
			}else{
			 redirect('WMS/Spare_Purchase');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	// ADD SPARE
	public function add_spare(){

		if($this->session->userdata('logged_EU')){
		  $new_spare = $this->input->post('new_spare');
          $WRId = $this->input->post('WRId');
          $ddid = $this->input->post('ddid');
          $Qty_Requested = $this->input->post('Qty_Requested');
		    		
		 if ($new_spare == "add-spare-verified"){
	      $session_data = $this->session->userdata('logged_EU');
	
		 $counter=0;
		  $result_duplicate = $this->model_get->Spare_Request_Details_sid($ddid,$WRId);
		   
		 if($result_duplicate)
			{
			 foreach($result_duplicate as $row)
			 {
			   $counter++;
			   
			 }
			}else{}
			
		 // Add Pre - PR Details
	
	        if($ddid == -1){
			$message="opps!!! Please Select a Spare ..";
			
			}elseif($counter >0){
			$message="opps!! Spare is already Exist..";
			
			
			}elseif($counter == 0){
			 $newRow2=array(
			
			  "qty_requested" => $Qty_Requested,
			  "qty_released" => 0,
			  "ddid" => $ddid,
			  "wrid" => $WRId,
			  
		 );
			$this->model_get->addRequestSpare_details($newRow2);
			$message="Spare has been added..";
			}else {
			$message="opps!! Error while adding..";
			}
			//echo $counter;
            $this->session->set_flashdata('WRId',"$WRId");
            $this->session->set_flashdata('action','add');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Request_Spares_Info');
			//print_r($newRow2);
			}else{
			 redirect('WMS/Request_Spare');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	// ADD SPARE
	public function delete_spare_request(){

		if($this->session->userdata('logged_EU')){
          $WRId = $this->input->post('WRId');
	
			$this->model_get->Update_Delete_Spare_Request($WRId);
			$this->model_get->Delete_Spare_Request_Details($WRId);
			
			
			$message="Spare Request Successfully Deleted...";
			
			//echo $counter;
            $this->session->set_flashdata('WRId',"$WRId");
            $this->session->set_flashdata('action','add');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Request_Spare');
			//print_r($newRow2);
			
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	public function delete_spare(){

		if($this->session->userdata('logged_EU')){
          $WRId = $this->input->post('WRId');
          $ddid = $this->input->post('ddid');
	
			$this->model_get->Delete_Spare_Request_Details2($ddid,$WRId);
			
			
			$message="Spare was successfully removed ...";
			
			//echo $counter;
            $this->session->set_flashdata('WRId',"$WRId");
            $this->session->set_flashdata('action','add');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Request_Spares_Info');
			//print_r($newRow2);
			
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	/*  Add Technical */
	public function new_technical(){

		if($this->session->userdata('logged_EU')){
		  $new_technical = $this->input->post('new_technical');
          $SpId = $this->input->post('SpId');
		 if ($new_technical == "new-technical-verified"){
	      $session_data = $this->session->userdata('logged_EU');
			
		 $newRow2=array(
			
			  "tech_name" => $this->input->post('technical-name'),
			  "value" => $this->input->post('technical-value'),
			  "WSid" => $this->input->post('WSid'),
			  "SpId" => $this->input->post('SpId'),
					  
		 );
		 
			// Add technical Details
			$this->model_get->addSpare_Technical_Details($newRow2);
			$message="New Specification has been added..";
            $this->session->set_flashdata('SpId',"$SpId");
            $this->session->set_flashdata('action','add-technical');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Draft');
			//print_r($newRow2);
			}else{
			 redirect('WMS/Spare_Purchase');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	//	"UpdateSpareToDraft"
	public function UpdateSpareToDraft(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->input->post('action');
          $SpId = $this->input->post('SpId');
          $WSid = $this->input->post('WSid');
		 if ($action == "EditSpareToDraft"){
			
			
			$newRow=array(
			
					"Qty"=>$this->input->post('qty'),
					"UM"=>$this->input->post('um'),
					"Estimated_Cost"=>$this->input->post('amount'),
					"WSid" => $this->input->post('WSid'),
					"SpId" => $this->input->post('SpId'),
				 ); 
			
			$message="Spare has been update...";
            $this->session->set_flashdata('SpId',"$SpId");
            $this->session->set_flashdata('action','update');
            $this->session->set_flashdata('message',"$message");
			$this->model_get->Update_Spare_Purchase_Details($WSid,$SpId,$newRow);
			
			
			redirect('WMS/Draft');
			//print_r($newRow);
			}else{
			 redirect('WMS/Spare_Purchase');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	//	"UpdateTechnicalToDraft"
	public function UpdateTechnicalToDraft(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->input->post('action');
		 if ($action == "EditTechnicalToDraft"){
          $SpId = $this->input->post('SpId');
          $WSid = $this->input->post('WSid');
          $TId = $this->input->post('TId');
			
			
			$newRow=array(
			
					"Tech_Name"=>$this->input->post('technical-name'),
					"value"=>$this->input->post('technical-value'),	
					"WSid" => $this->input->post('WSid'),
					"SpId" => $this->input->post('SpId'),
				 ); 
			
			$message="Specification has been updated...";
            $this->session->set_flashdata('SpId',"$SpId");
            $this->session->set_flashdata('action','update-spare');
            $this->session->set_flashdata('message',"$message");
			$this->model_get->Update_Technical_Details($TId,$newRow);
			
			
			redirect('WMS/Draft');
			//print_r($newRow);
			}else{
			 redirect('WMS/Spare_Purchase');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	//	"DeleteSpareToDraft"
	public function DeleteSpareToDraft(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->input->post('action');
          $SpId = $this->input->post('SpId');
          $WSid = $this->input->post('WSid');
		 if ($action == "DeleteSpareToDraft"){
			
			$message="Spare has been deleted...";
            $this->session->set_flashdata('SpId',"$SpId");
            $this->session->set_flashdata('action','delete-spare');
            $this->session->set_flashdata('message',"$message");
			$this->model_get->Delete_Spare_Purchase_Details($SpId,$WSid);
			
			redirect('WMS/Draft');
			//print_r($newRow);
			}else{
			 redirect('WMS/Spare_Purchase');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	//	"DeleteSpareToDraft"
	public function DeleteTechnicalToDraft(){

		if($this->session->userdata('logged_EU')){
		  $action = $this->input->post('action');
          $SpId = $this->input->post('SpId');
          $WSid = $this->input->post('WSid');
          $TId = $this->input->post('TId');
		 if ($action == "DeleteTechnicalToDraft"){
			
			$message="Specification has been deleted...";
            $this->session->set_flashdata('SpId',"$SpId");
            $this->session->set_flashdata('action','delete-technical');
            $this->session->set_flashdata('message',"$message");
			$this->model_get->Delete_Spare_Technical_Details($TId);
			redirect('WMS/Draft');
			//print_r($newRow);
			}else{
			 redirect('WMS/Spare_Purchase');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	// Purchase_Request
		public function Spare_Request(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Fname'] = $Fname[0];
			$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
		    
			
			$data['Category'] = $this->model_get->getCategory();
			$data['Draft'] = $this->model_get->getallpendingSpareRequest();
			$data['Draft1'] = $this->model_get->getallnotpendingSpareRequest();
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "Spares Request";
				}
			
			
			$this->load->view('Spare_Request',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Spare_Purchases(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Fname'] = $Fname[0];
			$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
		    
			
		
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			// 
			$data['Categoryp'] = $this->model_get->getCategory();
			$data['Draftp'] = $this->model_get->getallpendingPurchaseRequest();
			$data['countpendingep'] = $this->model_get->countpendingep();
			$data['getEndUserEmployee'] = $this->model_get->getEndUserEmployee();
			$data['Draft1p'] = $this->model_get->getallnotpendingPurchaseRequest();
			
			
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "Purchase Requisition";
				}
			
			
			$this->load->view('Spare_Purchases',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Spare_Purchases_Approved(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Fname'] = $Fname[0];
			$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
		    
			
		
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			// 
			$data['Categoryp'] = $this->model_get->getCategory();
			$data['Draftp'] = $this->model_get->getallapprovedPurchaseRequest();
			$data['Draft1p'] = $this->model_get->getallnotpendingPurchaseRequest();
			
			
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "Approved Purchase Requisition";
				}
			
			
			$this->load->view('Spare_Purchases_Approved',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Approve_PR(){

		if($this->session->userdata('logged_PR')){
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Fname'] = $Fname[0];
			$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
		    	
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			// 
			$data['Categoryp'] = $this->model_get->getCategory();
			$data['Draftp'] = $this->model_get->getallapprovedPurchaseRequest();
			$data['Draft1p'] = $this->model_get->getallnotpendingPurchaseRequest();
			
			
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "APPROVED PR";
				}
			
			
			$this->load->view('Spare_Purchases_Approved_Bid',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	public function Bids(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Fname'] = $Fname[0];
			$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
		    
			//last-state
		
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			// 
			$data['Categoryp'] = $this->model_get->getCategory();
			$data['Draftp'] = $this->model_get->getallapprovedPurchaseRequest();
			$data['Draft1p'] = $this->model_get->getallnotpendingPurchaseRequest();
			$data['getBidInfo'] = $this->model_get->getBidInfo();
			
			$data['getBidDetailsInfo'] = $this->model_get->getBidDetailsInfo();
			
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "Bidding";
				}
			
			
			$this->load->view('Bidding_Set_on_PO',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Purchase_Order_P(){

		if($this->session->userdata('logged_PR')){
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];
			$data['DceNo'] = "$DceNo";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";$data['Fname'] = $Fname[0];$data['Mname'] = $Mname[0];$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";$data['CcNo'] = "$CcNo";$data['Section'] = "$Section";
			$data['view'] = 1;
			
			$data['getPOInfo'] = $this->model_get->getPOInfo();
			$data['getPODetailsInfo'] = $this->model_get->getPODetailsInfo();
			$data['message'] = "Purchase Order";
			$this->load->view('purchase_order',$data);
		}else
			{redirect('WMS/InvalidURL');}
	}
	public function Print_Purchase_Order_P(){

		if($this->session->userdata('logged_PR')){
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];
			$data['DceNo'] = "$DceNo";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";$data['Fname'] = $Fname[0];$data['Mname'] = $Mname[0];$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";$data['CcNo'] = "$CcNo";$data['Section'] = "$Section";
			$data['view'] = 1;
			$poid = $this->uri->segment(3);;
			
			$data['getOicOfficer'] = $this->model_get->getOicOfficer();
			$data['getSectionChief'] = $this->model_get->getSectionChief();
			$data['getvat'] = $this->model_get->getvat();
			
			$data['getSPOInfo'] = $this->model_get->getSPOInfo($poid);
			$data['getSPODetailsInfo'] = $this->model_get->getSPODetailsInfo($poid);
			$data['message'] = "PO Print Preview";
			$this->load->view('print_purchase_order',$data);
		}else
			{redirect('WMS/InvalidURL');}
	}
	public function Purchase_Order(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];
			$data['DceNo'] = "$DceNo";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";$data['Fname'] = $Fname[0];$data['Mname'] = $Mname[0];$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";$data['CcNo'] = "$CcNo";$data['Section'] = "$Section";
			$data['view'] = 0;
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			$data['getPOInfo'] = $this->model_get->getPOInfo();
			$data['getPODetailsInfo'] = $this->model_get->getPODetailsInfo();
			$data['message'] = "Purchase Order";
			$this->load->view('purchase_order',$data);
		}else
			{redirect('WMS/InvalidURL');}
	}
	public function Print_Purchase_Order(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];
			$data['DceNo'] = "$DceNo";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";$data['Fname'] = $Fname[0];$data['Mname'] = $Mname[0];$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";$data['CcNo'] = "$CcNo";$data['Section'] = "$Section";
			$data['view'] = 0;
			$poid = $this->uri->segment(3);;
			
			$data['getOicOfficer'] = $this->model_get->getOicOfficer();
			$data['getSectionChief'] = $this->model_get->getSectionChief();
			$data['getvat'] = $this->model_get->getvat();
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			$data['getSPOInfo'] = $this->model_get->getSPOInfo($poid);
			$data['getSPODetailsInfo'] = $this->model_get->getSPODetailsInfo($poid);
			$data['message'] = "PO Print Preview";
			$this->load->view('print_purchase_order',$data);
		}else
			{redirect('WMS/InvalidURL');}
	}
	
	public function Delivery(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";	$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";$data['Fname'] = $Fname[0];$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];$data['Position'] = "$Position";$data['CcNo'] = "$CcNo";$data['Section'] = "$Section";
		   
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
		 
			$data['Categoryp'] = $this->model_get->getCategory();
			$data['Draftp'] = $this->model_get->getallapprovedPurchaseRequest();
			$data['Draft1p'] = $this->model_get->getallnotpendingPurchaseRequest();
			
			$data['getBidDetailsInfo'] = $this->model_get->getBidDetailsInfo();
				
			$data['getPODetailsInfo'] = $this->model_get->getPODetailsInfo();
			$data['getPOInfo_except1'] = $this->model_get->getPOInfo_except1();
			$data['getAllDelivery'] = $this->model_get->getAllDelivery();
			$data['getDeliveryDetails'] = $this->model_get->getDeliveryDetails();
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "Delivery";
				}
			$this->load->view('Delivery',$data);
		}else{redirect('WMS/InvalidURL');}
	}
	
	public function Delivery_Info(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";	$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";$data['Fname'] = $Fname[0];$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];$data['Position'] = "$Position";$data['CcNo'] = "$CcNo";$data['Section'] = "$Section";
		   
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			$did = $this->uri->segment(3);
			$message = $this->uri->segment(4);
			
			if (empty($message)){$sms="Delivery Details";}else{$sms="Quantity Accepted has been $message ...";}
			$data['message'] = $sms;
			$data['did'] = $did;
		
			$data['Categoryp'] = $this->model_get->getCategory();
			$data['Draftp'] = $this->model_get->getallapprovedPurchaseRequest();
			$data['Draft1p'] = $this->model_get->getallnotpendingPurchaseRequest();
			
			$data['getBidDetailsInfo'] = $this->model_get->getBidDetailsInfo();
				
			$data['getPODetailsInfo'] = $this->model_get->getPODetailsInfo();
			$data['getPOInfo_except1'] = $this->model_get->getPOInfo_except1();
			
			$data['getAllDelivery'] = $this->model_get->getAllDeliveryS($did);
			$data['getDeliveryDetails'] = $this->model_get->getDeliveryDetailsS($did);
			
			
			$this->load->view('Delivery_Info',$data);
		}else{redirect('WMS/InvalidURL');}
	}
	
	public function adddetails_on_delivery(){

		if($this->session->userdata('logged_PO')){
		  
		$sdceno = $this->input->post('sdceno');
		$poid = $this->input->post('poid');
	
		$this->model_get->update_dceno_on_purchaseorder($poid);
		
		$this->model_get->set_delivery($sdceno,$poid);
		$result = $this->model_get->getLastDelivery();
		if($result){ $Id_array = array();foreach($result as $row){$Id_array = array( 'did' => $row->did);}}else{} $LastSpId = $Id_array ['did'];
			
		
		$item_array=$this->input->post('po_details');
		$arrlength = count($item_array);
		for($x = 0; $x < $arrlength; $x++) 
		{
			$separate_value=explode('-',$item_array[$x]); //wsid,price,qty
			$this->model_get->set_delivery_details($separate_value[2],$separate_value[1],$separate_value[0],$LastSpId);
		}
		
		$message="PO Has been Added on Delivery ...";
		$this->session->set_flashdata('message',"$message");
		$this->session->set_flashdata('action',"add-spare");
		redirect('WMS/Delivery');	
		}else{ redirect('WMS/InvalidURL');}
	
	}
	
	public function Bidding(){

		if($this->session->userdata('logged_PR')){
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];$Lname = $session_data['Lname'];$Position = $session_data['Position'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";	$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";$data['Fname'] = $Fname[0];$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];$data['Position'] = "$Position";$data['CcNo'] = "$CcNo";$data['Section'] = "$Section";
		   
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
		 
			$data['Categoryp'] = $this->model_get->getCategory();
			$data['Draftp'] = $this->model_get->getallapprovedPurchaseRequest();
			$data['Draft1p'] = $this->model_get->getallnotpendingPurchaseRequest();
			$data['getBidInfo'] = $this->model_get->getBidInfo();
			$data['getBidDetailsInfo'] = $this->model_get->getBidDetailsInfo();
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "Bidding";
				}
			$this->load->view('Bidding_Set',$data);
		}else{redirect('WMS/InvalidURL');}
	}
	
	public function addonbid(){

		if($this->session->userdata('logged_PR')){
		  
		$responsible_person = $this->input->post('responsible_person');
		//$venue = $this->input->post('venue');
		//$date = $this->input->post('date');
		//$time = $this->input->post('time');
		
		
		$prid = $this->input->post('prid');
		$prid_date = $this->input->post('prid_date');
		
		$lastSpId = $prid;
		if($lastSpId < 10){
		$a = "00$lastSpId";
		}else if ($lastSpId >= 10 && $lastSpId < 100){
		$a = "0$lastSpId";
		}
		$date1=date('Y', strtotime($prid_date));
		$b=substr($date1,2);
		
		$sms_prid = "AG67-PR<?php echo $b-$a";
		
		//$this->model_get->set_bid($date,$time,$venue,$responsible_person,$prid);
		$this->model_get->update_on_bid($prid,$responsible_person);

		$message="Bidding on PR : $sms_prid has been set ...";
		$this->session->set_flashdata('message',"$message");
		$this->session->set_flashdata('action',"add-spare");
		redirect('WMS/Approve_PR');	
			
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	// Purchase Approved
		public function Purchase_Approved(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Fname'] = $Fname[0];
			$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
		    
			
			$data['Category'] = $this->model_get->getCategory();
			$data['Draft3'] = $this->model_get->getallapprovedSparePurchase();
			
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "Approved Spares Request";
				}
			
			
			$this->load->view('Purchase_Approved',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	// Purchase Approved
		public function Request_Approved(){

		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Fname'] = $Fname[0];
			$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
		    
			
			$data['Category'] = $this->model_get->getCategory();
			$data['Draft3'] = $this->model_get->getallapprovedSpareRequest();
			$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			
			$action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				if ($action=="add-spare"){
					$data['message'] = $message;
				}else{
					$data['message'] = "Spares Request";
				}
			
			
			$this->load->view('Request_Approved',$data);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	//Pre- PR Puchase Info
	public function Pre_PR_Info(){

		if($this->session->userdata('logged_PO')){
		
		 
		  
			$SpId = $this->input->post('SpId');
			$DceNo1 = $this->input->post('DceNo');
			$data['message'] = "Pre-Purchase Requisition Slip";
	
		  
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		    
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
		  
		  
          
		
				$data['EmployeeInfo'] = $this->model_get->getEmployeeData($DceNo1);
				$data['TechnicalInfo'] = $this->model_get->Spare_Technical_Details($SpId);
				$data['SpareInfo'] = $this->model_get->Spare_Purchase_Details($SpId);
				$data['Category'] = $this->model_get->getCategory();
				$data['DraftInfo'] = $this->model_get->getSpecificDraft($SpId);
				$this->load->view('Pre_PR_info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}

public function Spare_Approved_Info(){

		if($this->session->userdata('logged_PO')){
		
		 
		    $action = $this->session->flashdata('action');
			$this->session->keep_flashdata('action');
		  
		    $WRId_new_spare = $this->session->flashdata('WRId');
			$this->session->keep_flashdata('SpId_new_spare');
		  
			$message = $this->session->flashdata('message');
			$this->session->keep_flashdata('message');
		    
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		    $action = $this->session->flashdata('action');
			$message = $this->session->flashdata('message');
				 if ($action=="add" || $action=="delete" || $action=="update"	) {
					$WRId = $WRId_new_spare;
					$data['message']= $message;
				  
				  }else{
					$WRId = $this->input->post('WRId');
					$data['message'] = "Approved Warehouse Requisition";
				}
				
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			$data['WRId'] = "$WRId";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
				$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
				$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
				$data['SpareInfo'] = $this->model_get->Spare_Request_Details($WRId);
				$data['Category'] = $this->model_get->getCategory();
				$data['DraftInfo'] = $this->model_get->getSpecificRequest($WRId);
				$this->load->view('Spare_Approved_info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
public function Spare_Request_Info(){

		if($this->session->userdata('logged_PO')){
		
		 
		  
			$WRId = $this->input->post('WRId');
			$DceNo1 = $this->input->post('DceNo');
			$data['message'] = "Warehouse Requisition";
	
		  
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		    
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    
		  
		  
          
		
				$data['EmployeeInfo'] = $this->model_get->getEmployeeData($DceNo1);
				$data['SpareInfo'] = $this->model_get->Spare_Request_Details($WRId);
				$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
				$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
				$data['Category'] = $this->model_get->getCategory();
				$data['DraftInfo'] = $this->model_get->getSpecificRequest($WRId);
				$this->load->view('Spare_Request_info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
public function Spare_Purchases_Info(){

		if($this->session->userdata('logged_PO')){
		
			$prid1 = $this->session->flashdata('prid');	$this->session->keep_flashdata('prid1');
			$sms = $this->session->flashdata('message');	$this->session->keep_flashdata('sms');
			$action = $this->session->flashdata('action');	$this->session->keep_flashdata('action');
			
			if ($action == 'qty'){
				$prid = $prid1;
				$data['message'] = $sms;
			}else{
				$prid = $this->input->post('prid');
				$data['message'] = "Purchase Requisition";
			}
			
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];$Password = $session_data['Password'];
			$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];$Access_level = $session_data['Access_level'];

			$data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
			$data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			
				$data['PurchaseInfo'] = $this->model_get->Spare_Purchase_Details($prid);
				$data['DraftInfo'] = $this->model_get->getSpecificPurchase($prid);
				$result = $this->model_get->countitemspurchaserequest($prid);
				if($result){ $Id_array = array();foreach($result as $row){$Id_array = array( 'count' => $row->count);}}else{} $count = $Id_array ['count'];
				if($count==0){
					$max_limit = 3;
				}elseif($count==1){
					$max_limit = 2;
				}elseif($count==2){
					$max_limit = 1;
				}else{$max_limit = 0;} 
				
				$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
				$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
				$data['getEndUserEmployee'] = $this->model_get->getEndUserEmployee();
				$data['Category'] = $this->model_get->getCategory();
				$data['getvat'] = $this->model_get->getvat();
				$data['max_limit'] = $max_limit;
				$data['current_prid'] = $prid;
				
				$this->load->view('Spare_Purchases_info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Spare_Purchases_Approved_Info(){

		if($this->session->userdata('logged_PO')){
		
			$prid1 = $this->session->flashdata('prid');	$this->session->keep_flashdata('prid1');
			$sms = $this->session->flashdata('message');	$this->session->keep_flashdata('sms');
			$action = $this->session->flashdata('action');	$this->session->keep_flashdata('action');
			
			if ($action == 'qty'){
				$prid = $prid1;
				$data['message'] = $sms;
			}else{
				$prid = $this->input->post('prid');
				$data['message'] = "Purchase Requisition";
			}
			
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];$Password = $session_data['Password'];
			$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];$Access_level = $session_data['Access_level'];

			$data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
			$data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			
				$data['PurchaseInfo'] = $this->model_get->Spare_Purchase_Details($prid);
				$data['DraftInfo'] = $this->model_get->getSpecificPurchasea($prid);
				
				$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
				$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
				$data['getEndUserEmployee'] = $this->model_get->getEndUserEmployee();
				$data['getppmp'] = $this->model_get->getppmp();
				$data['getOicOfficer'] = $this->model_get->getOicOfficer();
				$data['Category'] = $this->model_get->getCategory();
				$data['getvat'] = $this->model_get->getvat();
				
				$this->load->view('Spare_Purchases_Approved_Info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	/* * * ** * * * * * * * * * * *  B I D D I N G *  * * * * * * * * * * * * * * * * */
	public function on_bid_Info(){

		if($this->session->userdata('logged_PR')){
			$session_data = $this->session->userdata('logged_PR');
		
			$prid1 = $this->session->flashdata('prid');	$this->session->keep_flashdata('prid1');
			$sms = $this->session->flashdata('message');	$this->session->keep_flashdata('sms');
			$action = $this->session->flashdata('action');	$this->session->keep_flashdata('action');
			
			if ($action == 'qty'){
				$prid = $prid1;
				$message = $sms;
			}else{
				$prid = $this->input->post('prid');
				$message = "SET UP SCHEDULE ON BIDDING";
			}
			
			$data['message'] = $message;
			
			
			$DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];$Password = $session_data['Password'];
			$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];$Access_level = $session_data['Access_level'];

			$data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
			$data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			
				$data['PurchaseInfo'] = $this->model_get->Spare_Purchase_Details($prid);
				$data['DraftInfo'] = $this->model_get->getSpecificPurchasea($prid);
				
				$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
				$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
				$data['getEndUserEmployee'] = $this->model_get->getEndUserEmployee();
				$data['getppmp'] = $this->model_get->getppmp();
				$data['getAllSupplierData'] = $this->model_get->getAllSupplierData();
				
				$data['getOicOfficer'] = $this->model_get->getOicOfficer();
				$data['Category'] = $this->model_get->getCategory();
				$data['getvat'] = $this->model_get->getvat();
				$data['getLastBidInfo'] = $this->model_get->getLastBidInfo();
				
				$this->load->view('on_bid_Info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function Bidding_Set_Info(){

		if($this->session->userdata('logged_PR')){
		
			$prid1 = $this->session->flashdata('prid');	
			$wsid1 = $this->session->flashdata('wsid');	
			$sms = $this->session->flashdata('message');	
			$action = $this->session->flashdata('action');	
			
			$this->session->keep_flashdata('prid1');
			$this->session->keep_flashdata('wsid1');
			$this->session->keep_flashdata('sms');
			$this->session->keep_flashdata('action');
			
			if ($action == 'b_s_i'){
				$prid = $prid1;
				$wsid = $wsid1;
				$data['message'] = $sms;
			}else{
				$prid = $this->input->post('trid1');
				$wsid = $this->input->post('tsid1');
				$data['message'] = "BIDS";
			}
			
			$data['prid'] = $prid;
			$data['wsid'] = $wsid;
			
			
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];$Password = $session_data['Password'];
			$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];$Access_level = $session_data['Access_level'];

			$data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
			$data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			
				$data['PurchaseInfo'] = $this->model_get->Spare_Purchase_Details($prid);
				$data['DraftInfo'] = $this->model_get->getSpecificPurchasea($prid);
				
				$data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
				$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
				$data['getEndUserEmployee'] = $this->model_get->getEndUserEmployee();
				$data['getppmp'] = $this->model_get->getppmp();
				$data['getAllSupplierData'] = $this->model_get->getAllSupplierData();
				
				$data['getOicOfficer'] = $this->model_get->getOicOfficer();
				$data['Category'] = $this->model_get->getCategory();
				$data['getvat'] = $this->model_get->getvat();

				$data['getLastBidInfo'] = $this->model_get->getLastBidInfo();
				$data['getSpecificBid'] = $this->model_get->getSpecificBid($wsid,$prid);
				$data['getSpecificBidDetails'] = $this->model_get->getSpecificBidDetails($wsid,$prid);
				$data['countSpecificBidDetails'] = $this->model_get->countSpecificBidDetails($wsid,$prid);
				
				$this->load->view('Bidding_Set_Info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function bidding_mark_as_complete(){

		if($this->session->userdata('logged_PR')){
				
		$bid = $this->input->post('bid');
		$responsible_person = $this->input->post('responsible_person');
	
		$this->model_get->bidding_mark_as_complete($responsible_person,$bid);
		
		$message="Bidding has been Completed ...";
		$this->session->set_flashdata('action',"add-spare");
		$this->session->set_flashdata('message',"$message");
		redirect('WMS/Bidding');	
		}else{ redirect('WMS/InvalidURL');}
	
	}
	
	public function updatequotations(){

		if($this->session->userdata('logged_PR')){
				
		$prid = $this->input->post('prid');
		$wsid = $this->input->post('wsid');
		$bdid = $this->input->post('bdid');
		
		$quotation = $this->input->post('quotation');

		$this->model_get->update_qoutation_on_bid($quotation,$bdid);
		
		$message="New Quotation has been set ...";
		$this->session->set_flashdata('message',"$message");
		$this->session->set_flashdata('prid',"$prid");
		$this->session->set_flashdata('wsid',"$wsid");
		$this->session->set_flashdata('action',"b_s_i");
		redirect('WMS/Bidding_Set_Info');	
		}else{ redirect('WMS/InvalidURL');}
	
	}
	
	public function addonbid_details(){

		if($this->session->userdata('logged_PR')){
		  
		$responsible_person = $this->input->post('responsible_person');
		$venue = $this->input->post('venue');
		$date = $this->input->post('date');
		$time = $this->input->post('time');
		
		$prid = $this->input->post('prid');
		$wsid = $this->input->post('wsid');
		$qty = $this->input->post('qty');

		
		$this->model_get->set_bid($date,$time,$venue,$responsible_person,$wsid,$prid);
		$result = $this->model_get->getLastBid();
		if($result){ $Id_array = array();foreach($result as $row){$Id_array = array( 'bid' => $row->bid);}}else{} $LastSpId = $Id_array ['bid'];
			
		
		$item_array=$this->input->post('supplier');
		$arrlength = count($item_array);
		for($x = 0; $x < $arrlength; $x++) 
		{
			$this->model_get->set_bid_details($LastSpId,$prid,$wsid,$item_array[$x],$qty);
		}
		
		
		
		$message="Schedule on Bidding has been set ...";
		$this->session->set_flashdata('message',"$message");
		$this->session->set_flashdata('prid',"$prid");
		$this->session->set_flashdata('wsid',"$wsid");
		$this->session->set_flashdata('action',"qty");
		redirect('WMS/on_bid_Info');	
		}else{ redirect('WMS/InvalidURL');}
	
	}
	/* * * * * * * * * * * * * * * *     E N D   B I D D I N G  * * * * * * * * * * * * * * * * * */
	
public function updatestatus(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		  $status = $this->input->post('status');
		  $responsible_person = $this->input->post('responsible_person');
		  $remarks = $this->input->post('remarks');
		  $dceno = $this->input->post('dceno');
		  $prid = $this->input->post('prid');
		  
			 
			$this->model_get->updatestatuspurchaserequest($status,$responsible_person,$prid,$remarks,$dceno);
			if ($status == 'approved' || $status == 'approved-ep'){
				$message="Purchase Request has been Approved";
				$this->session->set_flashdata('message',"$message");
				$this->session->set_flashdata('action',"add-spare");
				redirect('WMS/Spare_Purchases_Approved');	
			}else{
				$message="Purchase Request has been Pended";
				$this->session->set_flashdata('message',"$message");
				$this->session->set_flashdata('action',"add-spare");
				redirect('WMS/Spare_Purchases');	
			}
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function deleteepitem(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		
		  $prid = $this->input->post('prid');
		  $wsid = $this->input->post('wsid');
		  
		
			$this->model_get->deleteepitem($prid,$wsid);
			 
				
			$message="Spare Items Has been Removed ...";
			
			$this->session->set_flashdata('action',"qty");
			$this->session->set_flashdata('prid',"$prid");
			$this->session->set_flashdata('message',"$message");
			redirect('WMS/Spare_Purchases_Info');	
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function updateprqty(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		
		  $prid = $this->input->post('prid');
		  $wsid = $this->input->post('wsid');
		  $qty = $this->input->post('qty');
		  
		
			$this->model_get->updateqtypurchaserequest($qty,$prid,$wsid);
			 
				
			$message="Quantity to be purchase has been updated";
			
			$this->session->set_flashdata('action',"qty");
			$this->session->set_flashdata('prid',"$prid");
			$this->session->set_flashdata('message',"$message");
			redirect('WMS/Spare_Purchases_Info');	
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function emergencypurchase(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		  $dceno = $this->input->post('dceno');
		  $remarks = $this->input->post('remarks');
		  $responsible_person = $this->input->post('responsible_person');
		  
			$this->model_get->set_emergency_purchase($remarks,$responsible_person,$dceno);
			
			$result=$this->model_get->getLastprid($qty,$prid,$wsid);if($result){ $Id_array = array();foreach($result as $row){$Id_array = array('prid' => $row->prid);}}else{}			
			$LastSpId = $Id_array ['prid'];if($LastSpId <= 0){$prid = 1;}else{$prid = $LastSpId + 1;}
			
			$item_array=$this->input->post('items');
			$arrlength = count($item_array);
			for($x = 0; $x < $arrlength; $x++) 
			{
				$separate_name=explode('//',$item_array[$x]);
				$this->model_get->set_emergency_purchase_details($separate_name[1],$LastSpId,$separate_name[0]);
			}
			$message="Emergency Puchase Has Been Creaed ...";
			
			$this->session->set_flashdata('action',"qty");
			$this->session->set_flashdata('prid',"$LastSpId");
			$this->session->set_flashdata('message',"$message");
			redirect('WMS/Spare_Purchases_Info');	
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function sparesemergencypurchase(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		 	 $prid = $this->input->post('prid');
			$item_array=$this->input->post('items');
			$arrlength = count($item_array);
			for($x = 0; $x < $arrlength; $x++) 
			{
				$separate_name=explode('//',$item_array[$x]);
				$this->model_get->set_emergency_purchase_details($separate_name[1],$prid,$separate_name[0]);
			}
			$message="Spares Has Been Added ...";
			
			$this->session->set_flashdata('action',"qty");
			$this->session->set_flashdata('prid',"$prid");
			$this->session->set_flashdata('message',"$message");
			redirect('WMS/Spare_Purchases_Info');	
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function approved_delivery(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		
		  $did = $this->input->post('did');
		  $by = $this->input->post('by');
		  
			$this->model_get->update_status_on_delivery($by,$did);
			 
			$message="Delivery has been Completed ...";
			
			$this->session->set_flashdata('action',"add-spare");
			$this->session->set_flashdata('message',"$message");
			redirect('WMS/Delivery');	
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function updateqtyaccepted(){

		if($this->session->userdata('logged_EU') || $this->session->userdata('logged_PO')){
		  
		
		  $did = $this->input->post('did');
		  $ddid = $this->input->post('ddid');
		  $qty_accepted = $this->input->post('qty_accepted');
		  
		
			$this->model_get->updateqtyaccepted($qty_accepted,$ddid);
			 
			$message="Updated";
			
			redirect('WMS/Delivery_Info/'.$did.'/'.$message);	
			//print_r($newRow);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function PO_Reports(){
		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];$Position = $session_data['Position'];$Password = $session_data['Password'];
			$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			
		    $data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			$data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
			$data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			$this->load->view('PO_Reports',$data);
	
		}else{redirect('WMS/InvalidURL');}
	}
	
	public function PO_Reports_1(){
		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];$Position = $session_data['Position'];$Password = $session_data['Password'];
			$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			
		    $data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			$data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
			$data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			$this->load->view('PO_Reports_1',$data);
	
		}else{redirect('WMS/InvalidURL');}
	}
public function PO_Reports_2(){
		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];$Position = $session_data['Position'];$Password = $session_data['Password'];
			$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			
		    $data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			$data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
			$data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			$this->load->view('PO_Reports_2',$data);
	
		}else{redirect('WMS/InvalidURL');}
	}
public function PO_Reports_3(){
		if($this->session->userdata('logged_PO')){
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];$Lname = $session_data['Lname'];$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];$Position = $session_data['Position'];$Password = $session_data['Password'];
			$Username = $session_data['Username'];$CcNo = $session_data['CcNo'];$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			
		    $data['getallpendingSpareRequestCount'] = $this->model_get->getallpendingSpareRequestCount();
			$data['getallpendingPurchaseRequestCount'] = $this->model_get->getallpendingPurchaseRequestCount();
			$data['DceNo'] = "$DceNo";$data['CcNo'] = "$CcNo";$data['Lname'] = "$Lname";$data['Fname'] = "$Fname";$data['Mname'] = "$Mname";$data['Username'] = "$Username";
			$data['Password'] = "$Password";$data['Section'] = "$Section";$data['Access_level'] = "$Access_level";$data['Position'] = "$Position";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			
			$this->load->view('PO_Reports_3',$data);
	
		}else{redirect('WMS/InvalidURL');}
	}


//Puchase Info
	public function PR_Info(){

		if($this->session->userdata('logged_PO')){
		
		 
		  
			$SpId = $this->input->post('SpId');
			$DceNo1 = $this->input->post('DceNo');
			$data['message'] = "Purchase Requisition Slip";
	
		  
			$session_data = $this->session->userdata('logged_PO');
			$DceNo = $session_data['DceNo'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Lname = $session_data['Lname'];
			$Position = $session_data['Position'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			//$data['message'] = "$annual RECORD HAS BEEN DELETED";
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Fname'] = $Fname[0];
			$data['Mname'] = $Mname[0];
			$data['Lname'] = $Lname[0];
			$data['Position'] = "$Position";
			$data['CcNo'] = "$CcNo";
			$data['Section'] = "$Section";
		    
		  
		  
          
		
				$data['EmployeeInfo'] = $this->model_get->getEmployeeData($DceNo1);
				$data['TechnicalInfo'] = $this->model_get->Spare_Technical_Details($SpId);
				$data['SpareInfo'] = $this->model_get->Spare_Purchase_Details($SpId);
				$data['Category'] = $this->model_get->getCategory();
				$data['DraftInfo'] = $this->model_get->getSpecificDraft($SpId);
				$this->load->view('PR_info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	//PR Approval Info
	public function PR_Approval_Info(){

		if($this->session->userdata('logged_PR')){
	
		  
			$Date = $this->input->post('Date');
			$prid = $this->input->post('prid');
			$Status = $this->input->post('Status');
			$data['message'] = "PR Info";
	
		  
			$session_data = $this->session->userdata('logged_PR');
			
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		    
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Date_Purchased'] = "$Date";
			$data['prid'] = "$prid";
			$data['Status'] = "$Status";
			$data['Category'] = $this->model_get->getCategory();
				$data['SpareInfo'] = $this->model_get->Spare_Purchases_Details($prid);
				//$data['draft'] = $this->model_get->getallSparePurchase();
				$data['draft3'] = $this->model_get->getPR_Status($prid);
			
				$this->load->view('PR_Approval_Info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	//PR Approval Info
	public function Approved_PR_Info(){

	if($this->session->userdata('logged_PR')){
	
		  
			$Date = $this->input->post('Date');
			$Status = $this->input->post('Status');
			$data['message'] = "PR Info";
	
		  
			$session_data = $this->session->userdata('logged_PR');
			
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		    
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['Date_Purchased'] = "$Date";
			$data['Status'] = "$Status";
			$prid = $this->input->post('prid');
			$data['prid'] = "$prid";
			$data['Category'] = $this->model_get->getCategory();
				$data['SpareInfo'] = $this->model_get->Spare_Purchases_Details($prid);
				//$data['draft'] = $this->model_get->getallSparePurchase();
				$data['draft3'] = $this->model_get->getPR_Status($prid);
			
				$this->load->view('Approved_PR_Info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	}

	//PR Approval Info
	public function Bidding_PR_Info(){

		if($this->session->userdata('logged_PR')){
			

			$PR_Date = $this->session->flashdata('PR_Date');
			$this->session->keep_flashdata('PR_Date');	
			
			$BId = $this->session->flashdata('BId');
			$this->session->keep_flashdata('BId');
					
			$message = $this->session->flashdata('message');
			$this->session->keep_flashdata('message');
			
			$action = $this->session->flashdata('action');
			$this->session->keep_flashdata('action');
			
			 if ($action=="add-spare" || $action=="delete-spare" || $action=="update-spare") {
		      //$SpId = $SpId_new_spare;
			  $data['message']= $message;
			  $PR_Date = $PR_Date;
			$BId = $BId;
			  }else{
			  
				//$SpId = $this->input->post('SpId');
					$PR_Date = $this->input->post('PR_Date');
					$BId = $this->input->post('BId');
					$data['message'] = "Bidding PR Info";
			  }
			$data['BId'] = $BId;
			$data['PR_Date'] = $PR_Date;
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		    
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";	
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			$data['BiddingInfoDetails'] = $this->model_get->getAllBiddingDetails();
			$data['BiddingInfo'] = $this->model_get->getspecificbidding($PR_Date);
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
			$data['SpareInfo'] = $this->model_get->Spare_Purchases_Details($PR_Date);
			$data['SupplierInfo'] = $this->model_get->getallsupplier();
			
		

				
				
				$data['Category'] = $this->model_get->getCategory();
			$this->load->view('Bidding_PR_Info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
		public function Bidding_Item_Info(){

		if($this->session->userdata('logged_PR')){
	
		  
			$SpId = $this->input->post('SpId');
			$DceNo1 = $this->input->post('DceNo');
			$BId = $this->input->post('BId');
			$WSid = $this->input->post('WSid');
			
			$data['WSid'] = $WSid;
			$data['DceNo1'] = $DceNo1;
			$data['BId'] = $BId;
			$data['message'] = "Bidding Item Info";
	
		  
			$session_data = $this->session->userdata('logged_PR');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];

		    
			$data['DceNo'] = "$DceNo";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			
			$data['Enduser_Name'] = "$Fname[0].$Mname[0] $Lname";
		    $new_SpId2=explode('-',$SpId);
			$pr2=str_replace ("PREPR","PR",$new_SpId2[1]);
			$new_SpId="$new_SpId2[0]-$pr2-$new_SpId2[2]";
		    
				
				$data['bidding_details'] = $this->model_get->Bidding_Details($BId,$WSid,$SpId);
				$data['bidding_spare_purchase'] = $this->model_get->Bidding_Spare_Purchase($new_SpId,$BId);
				$data['EmployeeInfo'] = $this->model_get->getEmployeeData($DceNo1);
				$data['TechnicalInfo'] = $this->model_get->Spare_Technical_Details($SpId);
				$data['SpecificSpareInfo'] = $this->model_get->Bidding_Spare_Purchase_Details($SpId,$WSid);
				$data['Category'] = $this->model_get->getCategory();
				$data['DraftInfo'] = $this->model_get->getSpecificDraft($new_SpId);
				//echo $new_SpId;
				//print_r(array_values($data9));
				$this->load->view('Bidding_Item_Info',$data);
	
			
		 
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	
	
	/*  Add user*/
	public function new_user(){

		if($this->session->userdata('logged_ADMIN')){
          $new_user = $this->input->post('new_user');
		 if ($new_user == "add-user"){
		 $Lname = $this->input->post('Lname');
		 $position = $this->input->post('Position');
		
		if ($position == "Administrator"){
			$position1 = "Administrator";
			$User_Access_Level1 = "3";
			$CcNo1 ="6633445";
			$Requisitioning_Section1 = "Plant Technical";
		 }else if ($position == "Property Officer"){
			$position1 = "Property Officer";
			$User_Access_Level1 = "1";
			$CcNo1 ="6611223";
			$Requisitioning_Section1 = "Warehouse";
			
		 }else if ($position == "Procurement Officer"){
			$position1 = "Procurement Officer";
			$User_Access_Level1 = "2";
			$CcNo1 ="6622334";
			$Requisitioning_Section1 = "Admin and Finance";
		 }else{
			$position1 = "End-User";
			$User_Access_Level1 = "4";
			$CcNo1 ="6644556";
			$Requisitioning_Section1 = $this->input->post('Requisitioning_Section');}
		 
		 $newRow2=array(
			
			  "username" => "$Lname",
			  "password" => "$Lname.123",
			  "fname" => $this->input->post('Fname'),
			  "mname" => $this->input->post('Mname'),
			  "lname" => $this->input->post('Lname'),
			  "position" => $position1,
			  "user_access_level" => $User_Access_Level1,
			  "ccno" => $CcNo1,
			  "requisitioning_section" => $Requisitioning_Section1
		 );
		 
			// Add technical Details
			$this->model_get->addUser($newRow2);
			$message="User $Lname has been added..";
            $this->session->set_flashdata('action','add-user');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Homepage');
			//print_r($newRow2);
			}else{
			 redirect('WMS');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	
	//	"DeleteSpareToDraft"
	public function DeleteUser(){

		if($this->session->userdata('logged_ADMIN')){
		  $action = $this->input->post('action');
		  $DceNo = $this->input->post('DceNo');
		  $name = $this->input->post('name');
		 if ($action == "delete-user"){
            $message="$name has been Deleted..";
			
            $this->session->set_flashdata('action','delete-user');
            $this->session->set_flashdata('message',"$message");
			$this->model_get->Delete_User($DceNo);
			redirect('WMS/Homepage');
			//print_r($newRow);
			}else{
			 redirect('WMS');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function editUser(){

		if($this->session->userdata('logged_ADMIN')){
		 $name = $this->input->post('name');
		 $DceNoHidden = $this->input->post('DceNoHidden');
		 $position = $this->input->post('Position');
		
		if ($position == "Property Officer"){
			$position1 = "Property Officer";
			$User_Access_Level1 = "1";
			$CcNo1 ="6611223";
			$Requisitioning_Section1 = "Warehouse";
			
		 }else if ($position == "Procurement Officer"){
			$position1 = "Procurement Officer";
			$User_Access_Level1 = "2";
			$CcNo1 ="6622334";
			$Requisitioning_Section1 = "Admin and Finance";
		 }else{
			$position1 = "End-User";
			$User_Access_Level1 = "4";
			$CcNo1 ="6644556";
			$Requisitioning_Section1 = $this->input->post('Requisitioning_Section');}
		 
		 $newRow2=array(
			
			  "dceno" => $DceNoHidden,
			  "username" => $this->input->post('Lname'),
			  "password" => $this->input->post('password'),
			  "fname" => $this->input->post('Fname'),
			  "mname" => $this->input->post('Mname'),
			  "lname" => $this->input->post('Lname'),
			  "position" => $position1,
			  "user_access_level" => $User_Access_Level1,
			  "ccno" => $CcNo1,
			  "requisitioning_section" => $Requisitioning_Section1
		 );
			$Fname = $this->input->post('Fname');
			$Mname = $this->input->post('Mname');
			$Lname = $this->input->post('Lname');
			
			$this->model_get->editUser($DceNoHidden,$newRow2);
				
				$message = "User $Fname $Mname[0]. $Lname Has Been Updated ...";
				$this->session->set_flashdata('message',"$message");
				$this->session->set_flashdata('action','update-user');
				
			 redirect('WMS/Homepage');
				
			//print_r($newRow2);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS');
			}
	
	}
	
	
	public function passwordchanged(){
		$this->session->sess_destroy();
		$this->load->view('passwordchanged');
		
	}
	
	
	public function passwordUser(){

		if($this->session->userdata('logged_ADMIN')){
		 $DceNoHidden = $this->input->post('DceNoHidden');
		 $password1 = $this->input->post('password1');
		 $password2 = $this->input->post('password2');
		 $password3 = $this->input->post('password3');

		 if ($password1==$password2){
			 
		 $newRow2=array(
			
			  "dceno" => $DceNoHidden,
			  "username" => $this->input->post('username'),
			  "password" => $password3,
			  "fname" => $this->input->post('Fname'),
			  "mname" => $this->input->post('Mname'),
			  "lname" => $this->input->post('Lname'),
			  "position" => $this->input->post('Position'),
			  "user_access_level" => $this->input->post('User_Access_Level'),
			  "ccno" => $this->input->post('CcNo'),
			  "requisitioning_section" =>$this->input->post('Requisitioning_Section')
		 );
			$Fname = $this->input->post('Fname');
			$Mname = $this->input->post('Mname');
			$Lname = $this->input->post('Lname');
			
				$this->model_get->editUser($DceNoHidden,$newRow2);
				$message = "User's Password Has been Updated...";
				$this->session->set_flashdata('message',"$message");
				$this->session->set_flashdata('action','update-user');
			//print_r($newRow2);
				redirect('WMS/passwordchanged');
			}else{
				
				$message = "Error: Old password did not Match ...";
				$this->session->set_flashdata('message',"$message");
				$this->session->set_flashdata('action','update-user');
				//echo "wala";
				}
				redirect('WMS/Homepage');
		}else
			{
				//If no session, redirect to login page
				redirect('WMS');
			}
	
	}
	
	// Manage Supplier
	public function Manage_Supplier(){
		if($this->session->userdata('logged_ADMIN')){
		
		  $action = $this->session->flashdata('action');
		  $message = $this->session->flashdata('message');
		  $this->session->keep_flashdata('message');
			$session_data = $this->session->userdata('logged_ADMIN');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			 if ($action=="add-supplier" || $action=="delete-supplier" || $action=="update-supplier") {
		      //$SpId = $SpId_new_spare;
			  $data['message']= $message;
			  
			  }else{
			  
				//$SpId = $this->input->post('SpId');
					$data['message'] = "LIST OF SUPPLIER";
			  }
		
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Lname";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			//print_r ($data);
			$data['supplier'] = $this->model_get->getAllSupplierData();
			$this->load->view('manage_supplier',$data);
			
		}elseif($this->session->userdata('other')){
			$this->session->sess_destroy();
			redirect('WMS');
			
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	// Supplier
	/*  Add user*/
	public function new_supplier(){

		if($this->session->userdata('logged_ADMIN')){
          $new_user = $this->input->post('new_supplier');
		 if ($new_user == "add-supplier"){
		 $Lname = $this->input->post('Lname');
		 $position = $this->input->post('Position');
	
		 $newRow2=array(
			
			  "supplier_name" => $this->input->post('Supplier_Name'),
			  "address" => $this->input->post('Address'),
			  "tel_no" => $this->input->post('Tel_No'),
			  "fax_no" => $this->input->post('Fax_No')
		 );
		 
			// Add technical Details
			$this->model_get->addSupplier($newRow2);
			$message="Supplier $Lname has been added..";
            $this->session->set_flashdata('action','add-supplier');
            $this->session->set_flashdata('message',"$message");
			redirect('WMS/Manage_Supplier');
			//print_r($newRow2);
			}else{
			 redirect('WMS');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	
	//	"DeleteSpareToDraft"
	public function DeleteSupplier(){

		if($this->session->userdata('logged_ADMIN')){
		  $action = $this->input->post('action');
		  $SDceNo = $this->input->post('SDceNo');
		  $name = $this->input->post('name');
		 if ($action == "delete-supplier"){
            $message="$name has been Deleted..";
			
            $this->session->set_flashdata('action','delete-supplier');
            $this->session->set_flashdata('message',"$message");
			$this->model_get->Delete_Supplier($SDceNo);
			redirect('WMS/Manage_Supplier');
			//print_r($newRow);
			}else{
			 redirect('WMS');
			
			}
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	public function editSupplier(){

		if($this->session->userdata('logged_ADMIN')){
		 $SDceNoHidden = $this->input->post('SDceNoHidden');
	
		 $newRow2=array(
			
			  "supplier_name" => $this->input->post('Supplier_Name'),
			  "address" => $this->input->post('Address'),
			  "tel_no" => $this->input->post('Tel_No'),
			  "fax_no" => $this->input->post('Fax_No')
		 );
			$Supplier_Name = $this->input->post('Supplier_Name');
			
			$this->model_get->editSupplier($SDceNoHidden,$newRow2);
				
				$message = "Supplier $Supplier_Name Has Been Updated ...";
				$this->session->set_flashdata('message',"$message");
				$this->session->set_flashdata('action','update-supplier');
				
			 redirect('WMS/Manage_Supplier');
				
			//print_r($newRow2);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS');
			}
	
	}
	// Set fixed value
	public function Set_FixedValue(){
		if($this->session->userdata('logged_ADMIN')){
		
		  $action = $this->session->flashdata('action');
		  $message = $this->session->flashdata('message');
		  $this->session->keep_flashdata('message');
			$session_data = $this->session->userdata('logged_ADMIN');
			$DceNo = $session_data['DceNo'];
			$Lname = $session_data['Lname'];
			$Fname = $session_data['Fname'];
			$Mname = $session_data['Mname'];
			$Position = $session_data['Position'];
			$Password = $session_data['Password'];
			$Username = $session_data['Username'];
			$CcNo = $session_data['CcNo'];
			$Section = $session_data['Section'];
			$Access_level = $session_data['Access_level'];
			 if ($action=="add-fixedvalue" || $action=="delete-fixedvalue" || $action=="update-fixedvalue") {
		      //$SpId = $SpId_new_spare;
			  $data['message']= $message;
			  
			  }else{
			  
				//$SpId = $this->input->post('SpId');
					$data['message'] = "SET FIXED VALUE";
			  }
		
			$data['DceNo'] = "$DceNo";
			$data['Enduser_Name'] = "$Lname";
			$data['CcNo'] = "$CcNo";
			$data['Lname'] = "$Lname";
			$data['Fname'] = "$Fname";
			$data['Mname'] = "$Mname";
			$data['Username'] = "$Username";
			$data['Password'] = "$Password";
			$data['Section'] = "$Section";
			$data['Access_level'] = "$Access_level";
			$data['Position'] = "$Position";
			//print_r ($data);
			$data['fixedvalue'] = $this->model_get->getAllFixedValueData();
			$this->load->view('set_FixValue',$data);
			
		}elseif($this->session->userdata('other')){
			$this->session->sess_destroy();
			redirect('WMS');
			
			
		}else
			{
				//If no session, redirect to login page
				redirect('WMS/InvalidURL');
			}
	
	}
	
	// fixed value
	
	public function editFixedValue(){

		if($this->session->userdata('logged_ADMIN')){
		 $FvId = $this->input->post('FvId');
	
		 $newRow2=array(
			
			 "name" => $this->input->post('Name'),
			 "value" => $this->input->post('Value'),
		 );
			$Name = $this->input->post('Name');
			
			$this->model_get->editFixedValue($FvId,$newRow2);
				
				$message = "$Name Has Been Updated ...";
				$this->session->set_flashdata('message',"$message");
				$this->session->set_flashdata('action','update-fixedvalue');
				
			 redirect('WMS/Set_FixedValue');
				
			//print_r($newRow2);
		}else
			{
				//If no session, redirect to login page
				redirect('WMS');
			}
	
	}
	
	
	
	
	
}

