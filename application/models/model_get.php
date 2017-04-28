<?php

	class Model_get extends CI_Model{

	/******* log-in administrator ******/
		
		function loginAdmin($username, $password){
			$this -> db -> select('dceno, username, password,lname');
			$this -> db -> from('employee');
			$this -> db -> where('username', $username);
			$this -> db -> where('password', $password);
			$this -> db -> limit(1);
			$query = $this -> db -> get();
			if($query -> num_rows() == 1){
				return $query->result();   
			} else {     
					return false;
				}
		}

		function validDceNo($dceno){
			$this -> db -> select('dceno');
			$this -> db -> select('lname');
			$this -> db -> from('employee');
			$this -> db -> where('dceno', $dceno);
			$this -> db -> limit(1);
			$query = $this -> db -> get();
			if($query -> num_rows() == 1){
				return $query->result();   
			} else {     
					return false;
				}
		}
		
		function checkAuthentication($username, $password){
			$this -> db -> select('dceno, username, password,fname,lname,mname,user_access_level,ccno,position,requisitioning_section');
			$this -> db -> from('employee');
			$this -> db -> where('username', $username);
			$this -> db -> where('password', $password);
			$this -> db -> limit(1);
			$query = $this -> db -> get();
			if($query -> num_rows() == 1){
				return $query->result();   
			} else {     
					return false;
				}
		}
		
		function checkWRLastId($dceno){
			
			$query = $this->db->query("select count(wrid) as wrid from withdrawal_request order by wrid limit 1");		   
			$result = $query->result();
		    return $result;  	
		}
		function checkSLastId(){
			
			$query = $this->db->query("select count(wsid) as wsid from warehouse_spares order by wsid desc limit 1");		   
			$result = $query->result();
		    return $result;  	
		}
		function getCategory(){
			$query = $this->db->query("select * from warehouse_spares order by category");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getDelivery(){
			$query = $this->db->query("select delivery_details.did,delivery_details.ddid,warehouse_spares.category,warehouse_spares.unit_of_measurement,
										warehouse_spares.description,warehouse_spares.spare_name, delivery_details.wsid,delivery_details.delivery_price,delivery.date_delivered,delivery_details.qty_available 
										from delivery join delivery_details on delivery.did = delivery_details.did join warehouse_spares on delivery_details.wsid = warehouse_spares.wsid 
										where qty_available != 0 order by category, date_delivered DESC");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getDeliveryDetails(){
			$query = $this->db->query("select delivery_details.did,delivery_details.ddid,warehouse_spares.category,warehouse_spares.unit_of_measurement,warehouse_spares.description, 
										warehouse_spares.spare_name, delivery_details.wsid,delivery_details.delivery_price,delivery.date_delivered,delivery_details.qty_available
										,delivery_details.qty_delivered,delivery_details.qty_accepted
										from delivery join delivery_details on delivery.did = delivery_details.did join warehouse_spares on delivery_details.wsid = warehouse_spares.wsid order by category, date_delivered DESC");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getDeliveryDetailsS($data){
			$query = $this->db->query("select delivery_details.did,delivery_details.ddid,warehouse_spares.category,warehouse_spares.unit_of_measurement,warehouse_spares.description, 
										warehouse_spares.spare_name, delivery_details.wsid,delivery_details.delivery_price,delivery.date_delivered,delivery_details.qty_available
										,delivery_details.qty_delivered,delivery_details.qty_accepted
										from delivery join delivery_details on delivery.did = delivery_details.did join warehouse_spares on delivery_details.wsid = warehouse_spares.wsid where delivery.did='".$data."' order by category, date_delivered DESC");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getspecificspare($data){
			$query = $this->db->query("select * from warehouse_spares where wsid='".$data."'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		// get specific draft pre-pr
		function getDraftSparePurchase($dceno){
			$query = $this->db->query("select * from spare_purchase where dceno='".$dceno."' and status='draft'");		   
			$result = $query->result();
		    return $result;  	
		}
	
		// get specific draft pre-pr
		function getPendingRequest($dceno){
			$query = $this->db->query("select * from withdrawal_request where dceno='".$dceno."' and status IN ('Pending','Draft') ORDER BY wrid DESC");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getReleasedRequest($dceno){
			$query = $this->db->query("select * from withdrawal_request where dceno='".$dceno."' and status='Released' ORDER BY wrid DESC");		   
			$result = $query->result();
		    return $result;  	
		}
		
		// get specific draft pre-pr
		function getApprovedRequest($dceno){
			$query = $this->db->query("select * from withdrawal_request where dceno='".$dceno."' and status IN ('Approved','Declined','Released') ORDER BY wrid DESC");		   
			$result = $query->result();
		    return $result;  	
		}
		
		//get speecific sent pre-pr list
		function getSentSparePurchase($dceno){
			$query = $this->db->query("select * from spare_purchase join employee on spare_purchase.dceno = employee.dceno where employee.dceno='".$dceno."' and spare_purchase.status !='draft'");		   
			$result = $query->result();
		    return $result;  	
		}
		//get speecific sent pre-pr list
		function getSentRequest($dceno){
			$query = $this->db->query("select * from withdrawal_request join employee on withdrawal_request.dceno = employee.dceno where employee.dceno='".$dceno."' and withdrawal_request.status !='pending'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		//get all sent pre-pr list
		function getallSentSparePurchase(){
			$query = $this->db->query("select * from spare_purchase join employee on spare_purchase.dceno = employee.dceno where status !='draft'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallpendingSparePurchase(){
			$query = $this->db->query("select * from spare_purchase join employee on spare_purchase.dceno = employee.dceno where status = 'pending' order by date desc");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallpendingSpareRequest(){
			$query = $this->db->query("select * from withdrawal_request join employee on withdrawal_request.dceno = employee.dceno where status = 'Pending'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallpendingPurchaseRequest(){
			$query = $this->db->query("select * from purchase_request full join employee on purchase_request.dceno = employee.dceno where status = 'pending' AND prid > 0");		   
			$result = $query->result();
		    return $result;  	
		}
		function getallapprovedPurchaseRequest(){
			$query = $this->db->query("select * from purchase_request full join employee on purchase_request.dceno = employee.dceno where status in ('approved','on bid') AND prid > 0");		   
			$result = $query->result();
		    return $result;  	
		}
		
		
		function getallpendingSpareRequestCount(){
			$query = $this->db->query("select count(*) as count from withdrawal_request join employee on withdrawal_request.dceno = employee.dceno where status = 'Pending'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		
		function getallpendingPurchaseRequestCount(){
			$query = $this->db->query("select count(*) as count from purchase_request where status = 'pending' AND prid > 0");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallSparePurchase(){
			$query = $this->db->query("select * from purchase_request");		   
			$result = $query->result();
		    return $result;  	
		}
		
		
		function getallApprovePR(){
			$query = $this->db->query("select * from purchase_request where status = 'approved'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallPendingPR(){
			$query = $this->db->query("select * from purchase_request where status = 'pending'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getPR_Status($data){
			$query = $this->db->query("select * from purchase_request where prid = '".$data."'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallapprovedSparePurchase(){
			$query = $this->db->query("select * from spare_purchase join employee on spare_purchase.dceno = employee.dceno where status = 'approved pre-pr'");		   
			$result = $query->result();
		    return $result;  	
		}
		function getallapprovedSpareRequest(){
			$query = $this->db->query("select * from withdrawal_request join employee on withdrawal_request.dceno = employee.dceno where status IN ('Approved','Released') ORDER BY wrid DESC");		   
			$result = $query->result();
		    return $result;  	
		}
	
	   function getallPRSparePurchase(){
			$query = $this->db->query("select * from spare_purchase join employee on spare_purchase.dceno = employee.dceno where status='approved pr'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallBiddingSparePurchase(){
			$query = $this->db->query("select * from employee join spare_purchase join bidding on employee.dceno = spare_purchase.dceno and spare_purchase.spid = pr_date where status='bidding pr'");		   
			$result = $query->result();
		    return $result;  	
		}

		function getallnotpendingSparePurchase(){
			$query = $this->db->query("select * from spare_purchase where status like 'approved%' or status like 'declined%'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallbidding(){
			$query = $this->db->query("select * from bidding order by date");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallnotpendingSpareRequest(){
			$query = $this->db->query("select * from withdrawal_request join employee on withdrawal_request.dceno = employee.dceno where status IN ('Approved','Declined') ORDER BY wrid DESC");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getallnotpendingPurchaseRequest(){
			$query = $this->db->query("select * from purchase_request full join employee on purchase_request.dceno = employee.dceno where status = 'approved' AND prid > 0");		   
			$result = $query->result();
		    return $result;  	
		}
		
		
		function getSpecificDraft($spid){
			$query = $this->db->query("select * from spare_purchase where spid='".$spid."'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getSpecificRequest($data){
			$query = $this->db->query("select * from withdrawal_request where wrid='".$data."'");		   
			$result = $query->result();
		    return $result;  	
		}
		
		function getSpecificPurchase($data){
			$query = $this->db->query("select * from purchase_request where prid='".$data."'");		   
			$result = $query->result();
		    return $result;  	
		}
		function getSpecificPurchasea($data){
			$query = $this->db->query("select * from employee join purchase_request on employee.dceno = purchase_request.dceno where purchase_request.prid='".$data."'");		   
			$result = $query->result();
		    return $result;  	
		}
		public function Bidding_Spare_Purchase($data,$data1){
			$query = $this->db->query("select * from spare_purchase join bidding on spare_purchase.spid = pr_date where pr_date= '".$data."' and bidding.bid= '".$data1."'");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		function getPPMPOfficer($requisitioning_section){
			
			$query = $this->db->query("select * from fixed_value where fvid='".$requisitioning_section."'");		   
			$result1 = $query->result();
		    return $result1;  	
		}
		
		function getOicOfficer(){
			
			$query = $this->db->query("select * from fixed_value where name='Plant Manager' limit 1");		   
			$result2 = $query->result();
		    return $result2;  	
		}
		function getSectionChief(){
			
			$query = $this->db->query("select * from fixed_value where name='Section Chief' limit 1");		   
			$result2 = $query->result();
		    return $result2;  	
		}
		
		function getvat(){
			
			$query = $this->db->query("select * from fixed_value where name='VAT' limit 1");		   
			$result2 = $query->result();
		    return $result2;  	
		}
		function getppmp(){
			
			$query = $this->db->query("select * from fixed_value where name='Agus 6/7 PPMP Office' limit 1");		   
			$result2 = $query->result();
		    return $result2;  	
		}
		
		public function addSparePurchase($data){
			$this->db->insert("spare_purchase",$data);		
		} 
		
		public function addRequestSpare($data){
			$this->db->insert("withdrawal_request",$data);		
		} 
		
		public function addlogs($data){
			$this->db->insert("logs",$data);		
		} 
		public function addRequestSpare_details($data){
			$this->db->insert("withdrawal_request_details",$data);		
		} 
		
		public function addBidding($data){
			$this->db->insert("bidding",$data);		
		} 
		
		public function addBidding_Details($data){
			$this->db->insert("bidding_details",$data);		
		} 
		
		public function addSpare($data){
			$this->db->insert("warehouse_spares",$data);		
		} 
		public function addSpare_Purchase_Details($data){
			$this->db->insert("spare_purchase_details",$data);		
		} 
		
		public function addUser($data){
			$this->db->insert("employee",$data);		
		} 
		
		public function addSpare_Technical_Details($data){
			$this->db->insert("technical_details",$data);		
		} 
		
		public function Update_Spare_Purchase_Details($data1,$data2,$data3){	
			$this->db->where('wsid', $data1);
			$this->db->where('spid', $data2);
			$this->db->update('spare_purchase_details', $data3);
		}
		
		public function Update_Spare_Request_Details($data1,$data2,$data3){	
			$this->db->where('ddid', $data1);
			$this->db->where('wrid', $data2);
			$this->db->update('withdrawal_request_details', $data3);
		}
		public function Update_Spare($data1,$data3){	
			$this->db->where('wsid', $data1);
			$this->db->update('warehouse_spares', $data3);
		}
		
		public function Update_Technical_Details($data1,$data3){	
			$this->db->where('tid', $data1);
			$this->db->update('technical_details', $data3);
		}
		public function Delete_Spare_Purchase_Details($data,$data1){	
			$query = $this->db->query("delete from spare_purchase_details where spid='".$data."' and wsid='".$data1."'");		   
		}
		
		
		public function Delete_Spare_Technical_Details($data){	
			$this->db->where('tid', $data);
			$this->db->delete('technical_details');   
    	}
	public function Delete_Spare_Request($data){	
			$this->db->where('wrid', $data);
			$this->db->delete('withdrawal_request');   
    	}
	public function Delete_Spare_Request_Details($data){	
			$this->db->where('wrid', $data);
			$this->db->delete('withdrawal_request_details');   
    	}
	public function Delete_Spare_Request_Details2($data,$data1){	
			$this->db->where('ddid', $data);
			$this->db->where('wrid', $data1);
			$this->db->delete('withdrawal_request_details');   
    	}
	
		public function Bidding_Details($data,$data1,$data2){
			$query = $this->db->query("select * from spare_purchase_details join  bidding_details join warehouse_spares 
										on spare_purchase_details.spid = bidding_details.spid and spare_purchase_details.wsid = bidding_details.wsid 
										and bidding_details.wsid = warehouse_spares.wsid where bidding_details.bid= '".$data."' 
			                            and bidding_details.wsid = '".$data1."' and bidding_details.spid = '".$data2."' ");		   
			$result = $query->result();
		    return $result;  		
		} 
		public function Bidding_Details2($data,$data2){
			$query = $this->db->query("select * from spare_purchase_details join  bidding_details join warehouse_spares 
										on spare_purchase_details.spid = bidding_details.spid and spare_purchase_details.wsid = bidding_details.wsid 
										and bidding_details.wsid = warehouse_spares.wsid where bidding_details.bid= '".$data."' and bidding_details.spid = '".$data2."' ");		   
			$result = $query->result();
		    return $result;  		
		} 
		
	
		
		public function Spare_Request_Details($data){
			$query = $this->db->query("select warehouse_spares.wsid, warehouse_spares.spare_name, warehouse_spares.category, withdrawal_request_details.wrid,withdrawal_request_details.qty_released,withdrawal_request_details.qty_requested,warehouse_spares.unit_of_measurement, withdrawal_request_details.ddid,delivery_details.qty_available,
										delivery_details.qty_available, delivery_details.delivery_price
										from withdrawal_request_details join delivery_details on withdrawal_request_details.ddid = delivery_details.ddid join warehouse_spares on delivery_details.wsid = warehouse_spares.wsid
										where withdrawal_request_details.wrid= '".$data."'");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function Spare_Purchase_Details($data){
			$query = $this->db->query("select purchase_request_details.prid,purchase_request_details.wsid, category, spare_name, description, unit_of_measurement, qty, estimated_cost from purchase_request join purchase_request_details on purchase_request.prid = purchase_request_details.prid
			join warehouse_spares on purchase_request_details.wsid = warehouse_spares.wsid where purchase_request_details.prid = ".$data." ORDER BY category");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function Spare_Purchases_Details($data){
			$query = $this->db->query("select * from purchase_request join purchase_request_details on purchase_request.prid = purchase_request_details.prid 
										join warehouse_spares on purchase_request_details.wsid = warehouse_spares.wsid where purchase_request.prid = '".$data."'");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function Spare_Withdraw_Details($data){
			$query = $this->db->query("select warehouse_spares.wsid, warehouse_spares.spare_name, warehouse_spares.category, withdrawal_request_details.wrid,withdrawal_request_details.qty_released,withdrawal_request_details.qty_requested,warehouse_spares.unit_of_measurement, withdrawal_request_details.ddid,delivery_details.qty_available,
										delivery_details.qty_available, delivery_details.delivery_price
										from withdrawal_request_details join delivery_details on withdrawal_request_details.ddid = delivery_details.ddid join warehouse_spares on delivery_details.wsid = warehouse_spares.wsid
										where withdrawal_request_details.wrid= '".$data."'");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function Withdrawal_Details(){
			$query = $this->db->query("select warehouse_spares.wsid, warehouse_spares.spare_name, warehouse_spares.category, withdrawal_request_details.wrid,withdrawal_request_details.qty_released,withdrawal_request_details.qty_requested,warehouse_spares.unit_of_measurement, withdrawal_request_details.ddid,delivery_details.qty_available,
										delivery_details.qty_available, delivery_details.delivery_price
										from withdrawal_request_details join delivery_details on withdrawal_request_details.ddid = delivery_details.ddid join warehouse_spares on delivery_details.wsid = warehouse_spares.wsid");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function Bidding_Spare_Purchase_Details($data,$data1){
			$query = $this->db->query("select * from spare_purchase_details join warehouse_spares on spare_purchase_details.wsid = warehouse_spares.wsid
										where spare_purchase_details.spid= '".$data."' and  spare_purchase_details.wsid= '".$data1."'");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function Spare_Purchase_Details_sid($data,$data1){
			$query = $this->db->query("select * from spare_purchase_details join warehouse_spares on spare_purchase_details.wsid= warehouse_spares.wsid where warehouse_spares.wsid= ".$data." and spare_purchase_details.spid= '".$data1."'");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function Spare_Request_Details_sid($data,$data1){
			$query = $this->db->query("select * from withdrawal_request_details join delivery_details on withdrawal_request_details.ddid= delivery_details.ddid where delivery_details.ddid= '".$data."' and withdrawal_request_details.wrid = '".$data1."'");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function Spare_Technical_Details($data){
			$query = $this->db->query("select tid,wsid ,spid ,tech_name,value from technical_details where technical_details.spid= '".$data."'");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function editdraft($data1,$data3){	
			$this->db->where('spid', $data1);
			$this->db->update('spare_purchase', $data3);
		}
		public function editrequest($data1,$data3){	
			$this->db->where('wrid', $data1);
			$this->db->update('withdrawal_request', $data3);
		}
		public function editPR1($data1,$data3){	
			$this->db->where('pr_date', $data1);
			$this->db->update('pr_status', $data3);
		}
		
		public function getEmployeeData($dceno){
			$query = $this->db->query("select * from employee where dceno = '".$dceno."'");		   
			$result = $query->result();
		    return $result;  		
		} 	
		public function getAllEmployeeData(){
			$query = $this->db->query("select * from employee where position != 'Administrator' order by lname");		   
			$result = $query->result();
		    return $result;  		
		} 

		
		public function Delete_User($data){	
			$this->db->where('dceno', $data);
			$this->db->delete('employee');   
    	}
		
		public function Delete_Bidding($data){	
			$this->db->where('bid', $data);
			$this->db->delete('bidding');   
    	}
		
		public function Delete_Bidding_Details($data){	
			$this->db->where('bid', $data);
			$this->db->delete('bidding_details');   
    	}
		
		public function editUser($data1,$data3){	
			$this->db->where('dceno', $data1);
			$this->db->update('employee', $data3);
		}
		
		public function getAllSupplierData(){
			$query = $this->db->query("select * from supplier order by supplier_name");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function getAllLogs(){
			$query = $this->db->query("select * from logs order by log_id desc");		   
			$result = $query->result();
		    return $result;  		
		} 
		public function addSupplier($data){
			$this->db->insert("supplier",$data);		
		} 
	
		public function Delete_Supplier($data){	
			$this->db->where('sdceno', $data);
			$this->db->delete('supplier');   
    	}
		
		public function editSupplier($data1,$data3){	
			$this->db->where('sdceno', $data1);
			$this->db->update('supplier', $data3);
		}
		
		public function getAllFixedValueData(){
			$query = $this->db->query("select * from fixed_value order by fvid asc");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function getAllEndUser(){
			$query = $this->db->query("select * from employee where user_access_level = 4 order by lname");		   
			$result = $query->result();
		    return $result;  		
		} 
		
		public function editFixedValue($data1,$data3){	
			$this->db->where('fvid', $data1);
			$this->db->update('fixed_value', $data3);
		}
		
		public function sasmple($data,$data1){	
			$query = $this->db->query("update withdrawal_request_details set qty_requested=0,qty_released=0 where ddid = 23 AND wrid = 'JBB-WRS17-008' spid='".$data."' and wsid='".$data1."'");		   
		}
		
		public function Update_Delete_Spare_Request($data){	
			$query = $this->db->query("update withdrawal_request set status = 'removed' where wrid ='".$data."'");		   
		}
		
		public function Update_Delete_Spare_Release($data,$data1){	
			$query = $this->db->query("update withdrawal_request set status = 'Released', date_released ='".$data1."' where wrid ='".$data."'");		   
		}
		
		public function Update_Submit_Spare_Request($data,$data1){	
			$query = $this->db->query("update withdrawal_request set status = 'Pending',date_released ='".$data."' where wrid ='".$data1."'");		   
		}
		
		public function Evaluate_Spare_Request($data,$data1,$data2,$data3,$data4){	
			$query = $this->db->query("update withdrawal_request set status = '".$data."',remarks = '".$data4."',date_released ='".$data1."',released_by ='".$data2."' where wrid ='".$data3."'");		   
		}public 
		
		function updateqtypurchaserequest($data,$data1,$data2){	
			$query = $this->db->query("update purchase_request_details set qty = '".$data."' where prid ='".$data1."' AND wsid ='".$data2."'");		   
		}
		
		function updateqtyaccepted($data,$data1){	
			$query = $this->db->query("update delivery_details set qty_accepted = ".$data.", qty_available = ".$data." where ddid =".$data1."");		   
		}
		
		function updatestatuspurchaserequest($data,$data1,$data2,$data3,$data4){	
			$query = $this->db->query("update purchase_request set status = '".$data."',person_responsible = '".$data1."',remark = '".$data3."',dceno = '".$data4."',date_status_changed = current_timestamp where prid ='".$data2."' ");		   
		}
		
		public function getEndUserEmployee(){
			$query = $this->db->query("select * from employee where user_access_level = 4 order by lname");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getLastBid(){
			$query = $this->db->query("select * from bidding order by bid desc LIMIT 1");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getLastDelivery(){
			$query = $this->db->query("select * from delivery order by did desc LIMIT 1");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getLastBidInfo(){
			$query = $this->db->query("select * from bidding order by bid");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getAllDelivery(){
			$query = $this->db->query("select * from delivery JOIN supplier on delivery.sdceno = supplier.sdceno order by date_delivered desc");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getAllDeliveryS($data){
			$query = $this->db->query("select * from delivery JOIN supplier on delivery.sdceno = supplier.sdceno JOIN purchase_order on delivery.poid = purchase_order.poid where did = '".$data."' order by date_delivered desc");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getSpecificBid($data,$data1){
			$query = $this->db->query("select * from bidding join warehouse_spares on bidding.wsid = warehouse_spares.wsid where warehouse_spares.wsid='".$data."' AND prid='".$data1."' order by bid");		   
			$result = $query->result();
		    return $result;  		
		}
		public function getSpecificBidDetails($data,$data1){
			$query = $this->db->query("select * from bidding_details join supplier on bidding_details.sdceno = supplier.sdceno where wsid='".$data."' AND prid='".$data1."' order by quotation asc");		   
			$result = $query->result();
		    return $result;  		
		}
		public function countSpecificBidDetails($data,$data1){
			$query = $this->db->query("select count(*) as countnotset from bidding_details where wsid='".$data."' AND prid='".$data1."' AND quotation <= 0");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getBidInfo(){
			$query = $this->db->query("select bidding.bid, bidding.date as date,bidding.time,bidding.venue,bidding.status,bidding.date_status_changed, bidding.person_responsible,bidding.wsid, bidding.prid,warehouse_spares.category, warehouse_spares.spare_name,warehouse_spares.description, warehouse_spares.unit_of_measurement,purchase_request.date as prid_date from bidding join warehouse_spares on bidding.wsid = warehouse_spares.wsid join purchase_request on bidding.prid = purchase_request.prid order by bidding.date desc,bidding.time desc");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getPOInfo(){
			$query = $this->db->query("select * from purchase_order join supplier on purchase_order.sdceno = supplier.sdceno order by date_approved desc");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getPOInfo_except1(){
			$query = $this->db->query("select * from purchase_order join supplier on purchase_order.sdceno = supplier.sdceno where dceno IS NULL order by date_approved desc");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getSPOInfo($data){
			$query = $this->db->query("select * from purchase_order join supplier on purchase_order.sdceno = supplier.sdceno where poid ='".$data."' order by date_approved desc");
			$result = $query->result();
		    return $result;  		
		}
		
		public function getBidDetailsInfo(){
			$query = $this->db->query("select * from bidding_details join supplier on bidding_details.sdceno = supplier.sdceno order by quotation asc");		   
			$result = $query->result();
		    return $result;  		
		}
		
		public function getPODetailsInfo(){
			$query = $this->db->query("select * from purchase_order_details join warehouse_spares on purchase_order_details.wsid = warehouse_spares.wsid join purchase_request on purchase_order_details.prid = purchase_request.prid order by category");
			$result = $query->result();
		    return $result;  		
		}
		public function getSPODetailsInfo($data){
			$query = $this->db->query("select * from purchase_order_details join warehouse_spares on purchase_order_details.wsid = warehouse_spares.wsid join purchase_request on purchase_order_details.prid = purchase_request.prid where poid ='".$data."' order by category");
			$result = $query->result();
		    return $result;  		
		}
		
		public function update_on_bid($data,$data1){	
			$query = $this->db->query("update purchase_request set status = 'on bid',person_responsible='".$data1."' where prid ='".$data."'");		   
		}public 
		
		function update_status_on_delivery($data,$data1){	
			$query = $this->db->query("update delivery set status='completed',received_by='".$data."',date_completed=current_date where did ='".$data1."'");		   
		}
		
		public function update_dceno_on_purchaseorder($data){	
			$query = $this->db->query("update purchase_order set dceno = 1 where poid ='".$data."'");		   
		}
		
		public function update_qoutation_on_bid($data,$data1){	
			$query = $this->db->query("update bidding_details set quotation = '".$data."' where bdid ='".$data1."'");		   
		}
		
		public function bidding_mark_as_complete($data,$data1){	
			$query = $this->db->query("update bidding set status = 'confirm',date_status_changed=current_date,person_responsible='".$data."' where bid ='".$data1."'");		   
		}
		
		public function set_bid($data,$data1,$data2,$data3,$data4,$data5){	
			$query = $this->db->query("INSERT INTO bidding(date,time,venue,status,date_status_changed,person_responsible,wsid,prid) 
										VALUES ('".$data."','".$data1."','".$data2."','pending',current_date,'".$data3."','".$data4."','".$data5."')");		   
		}
		
		public function set_delivery($data,$data1){	
			$query = $this->db->query("INSERT INTO delivery(date_delivered,received_by,remarks,total_amount,sdceno,status,date_completed,poid) 
										VALUES (current_date,'','',0,".$data.",'on inspection',null,".$data1.")");		   
		}
		
		public function set_delivery_details($data,$data1,$data2,$data3){	
			$query = $this->db->query("INSERT INTO delivery_details(qty_delivered,qty_accepted,qty_available,delivery_price,wsid,did) 
										VALUES (".$data.",0,0,".$data1.",".$data2.",".$data3.")");		   
		}
		
		public function set_bid_details($data,$data1,$data2,$data3,$data4){	
			$query = $this->db->query("INSERT INTO bidding_details(bid,prid,wsid,sdceno,quotation,status,qty) 
										VALUES (".$data.",".$data1.",".$data2.",".$data3.",0,'confirm',".$data4.")");		   
		}
		
		//function updatestatuspurchaserequest($data,$data1,$data2){	
			//$query = $this->db->query("update purchase_request set status = '".$data."',person_responsible = '".$data1."',date_status_changed = current_timestamp where prid ='".$data2."' ");		   
		//s}
		/************************************************           E        N          D       ****************************************/


		
	
	}	