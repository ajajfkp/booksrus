<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->utilities->validateSession();
		$this->load->model('users/usersModel');
		$this->load->model('books/booksad');
		$this->utilities->checkUnivApr();
	}
	
	public function updateaddress() {
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('changeaddr');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Update address!');
		
		$this->layouts->set_title('Address Details!');
		$this->layouts->set_page_title('Address','<i class="glyphicon glyphicon-pushpin"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/js/users.js')->add_include('assets/css/coustom.css');
		$data['userData'] = $this->utilities->getUserDataById($this->utilities->getSessionUserData('uid'));
		//print_r($data['userData']);die;
		$data['allcitys'] = $this->utilities->getAllCity($data['userData']['state_id']);
		$data['allstates'] = $this->utilities->getAllState('','3926');
		if($this->input->post()){
			// set form validation rules
			$this->form_validation->set_rules('address_one', 'Address Line One', 'trim|alpha_numeric|max_length[254]|xss_clean');
			$this->form_validation->set_rules('address_two', 'Address Line Two', 'trim|alpha_numeric|max_length[254]|xss_clean');
			$this->form_validation->set_rules('pincode', 'Postcode', 'trim|integer|exact_length[5]|xss_clean');
			$this->form_validation->set_rules('state', 'State', 'trim|integer|max_length[5]|xss_clean');
			$this->form_validation->set_rules('city', 'City', 'trim|integer|max_length[8]|xss_clean');
			$this->form_validation->set_rules('country', 'Country', 'trim|integer|max_length[5]|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->layouts->dbview('users/updateaddr',$data);
			}else{
				$profiledata = $this->input->post();
				if($profiledata){
					$addrArr = array(
						'address_one'=>$profiledata['address_one'],
						'address_two'=>$profiledata['address_two'],
						'pincode'=>$profiledata['pincode'],
						'city_id'=>$profiledata['city'],
						'state_id'=>$profiledata['state'],
						'countery_id'=>$profiledata['country'],
						'added_by'=>$this->utilities->getSessionUserData('uid'),
						'date_updated'=>date('Y-m-d H:i:s')
					);

					$updateUserProfile = $this->commonModel->updateRecord('user_profile',$addrArr,array('users_id'=>$this->utilities->getSessionUserData('uid')));
					if($updateUserProfile){
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Address updated successfully!!!</div>');
						redirect('users/updateaddress');
					}else{
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops!...Some technical error!!!</div>');
					}
				}
			}
		}else{
			$this->layouts->dbview('users/updateaddr',$data);
		}
	}
	
	public function updateprofile() {
		
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('changename');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Update profile!');

		$this->layouts->set_page_title('Update Profile','<i class="glyphicon glyphicon-user"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/js/users.js')->add_include('assets/css/coustom.css');
		$data['userData'] = $this->utilities->getUserDataById($this->utilities->getSessionUserData('uid'));
		if($this->input->post()){
			// set form validation rules
			$this->form_validation->set_rules('username', 'User Name', 'trim|alpha_numeric|max_length[30]|xss_clean|callback_cust_username_check');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|alpha|required|max_length[100]|xss_clean');
			$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|alpha|max_length[100]|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|alpha|max_length[100]|required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|integer|max_length[11]|xss_clean');
			$this->form_validation->set_rules('email', 'Email Id', 'trim|valid_email|max_length[100]|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->layouts->dbview('users/updateprofile',$data);
			}else{
				$profiledata = $this->input->post();
				if($profiledata){
					$usaeData = array(
						'username'=>$profiledata['username'],
						'first_name'=>$profiledata['first_name'],
						'last_name'=>$profiledata['last_name'],
						'mobile'=>$profiledata['mobile'],
						'updated_by'=>$this->utilities->getSessionUserData('uid'),
						'date_updated'=>date('Y-m-d H:i:s')
					);
					$updateUser = $this->commonModel->updateRecord('users',$usaeData,array('id'=>$this->utilities->getSessionUserData('uid')));
					
					$userProfileData = array(
						'username'=>$profiledata['username'],
						'first_name'=>$profiledata['first_name'],
						'middle_name'=>$profiledata['middle_name'],
						'last_name'=>$profiledata['last_name'],
						'email_personal'=>$profiledata['email'],
						'mobile'=>$profiledata['mobile'],
						'updated_by'=>$this->utilities->getSessionUserData('uid'),
						'date_updated'=>date('Y-m-d H:i:s')
					);
					
					$updateUserProfile = $this->commonModel->updateRecord('user_profile',$userProfileData,array('users_id'=>$this->utilities->getSessionUserData('uid')));
					if($updateUser && $updateUserProfile){
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Profile updated successfully!!!</div>');
						redirect('users/updateprofile');
					}else{
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops!...Some technical error!!!</div>');
					}
				}
			}
		}else{
			$this->layouts->dbview('users/updateprofile',$data);
		}
		
	}
	public function updatepasswd(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('changepasswd');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Update password!');

		$this->layouts->set_page_title('Update password','<i class="glyphicon glyphicon-lock"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/js/users.js')->add_include('assets/css/coustom.css');
		$data['userData'] = $this->utilities->getUserDataById($this->utilities->getSessionUserData('uid'));
		if($this->input->post()){
			$this->form_validation->set_rules('cpasswd', 'Current password', 'trim|min_length[6]|required|md5|callback_cust_passwd_check');
			$this->form_validation->set_rules('newpasswd', 'New password', 'trim|required|min_length[6]|matches[cnewpasswd]|md5');
			$this->form_validation->set_rules('cnewpasswd', 'Confirm New password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->layouts->dbview('users/updatepasswd');
			}else{
				$passwd = $this->input->post();
				if($passwd){
					$updatepasswd = $this->commonModel->updateRecord('users',array('passwd'=>$passwd['newpasswd']),array('id'=>$this->utilities->getSessionUserData('uid')));
					if($updatepasswd){
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Password updated successfully!!!</div>');
						redirect('users/updatepasswd');
					}else{
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops!...Some technical error!!!</div>');
					}
				}
			}
		}else{
			$this->layouts->dbview('users/updatepasswd');
		}
	}
	public function cust_username_check($str) {
		$getusername=$this->commonModel->getRecord('users','username',array('username'=>$str));
		if(!$getusername){
			return true;
		}else{
			$userusername=$this->commonModel->getRecord('users','username',array('username'=>$getusername['username'],'id'=>$this->utilities->getSessionUserData('uid')));
			if($userusername){
				return true;
			}else{
				$this->form_validation->set_message('cust_username_check', 'This %s field must contain a unique value');
				return FALSE;
			}
		}
	}
	
	public function cust_passwd_check($str) {
		$passwd=$this->commonModel->getRecord('users','passwd',array('passwd'=>$str,'id'=>$this->utilities->getSessionUserData('uid')));
		if($passwd){
			return TRUE;
		}else{
			$this->form_validation->set_message('cust_passwd_check', 'This %s dose not matched with saved password');
			return FALSE;
		}
	}
	
	function messagetosellar($bookId=""){
		if($bookId){
			$getData = $this->booksad->getBookDetails($bookId);
			$data['boodata'] = $getData;
				
			$extraHead = "activateHeadMeanu('topdashboard');";
			$extraHead .= "activateLeftMeanu('');";
			$this->layouts->set_extra_head($extraHead);
			$this->layouts->set_title('View book details!');
			
			$this->form_validation->set_rules('message', 'Message to seller', 'trim|required|min_length[20]|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$data['contactCnt'] = $this->utilities->numUsersContact($bookId);
				$this->layouts->dbview('dashboard/viewbookdetails',$data);
			}else{
				$getBookData = $this->commonModel->getRecord('books','*',array('id'=>$bookId));
				if($getBookData){
					$this->db->trans_start();
					
					$gettransData = $this->commonModel->getRecord('books_transaction','*',array('book_id'=>$bookId,'user_id'=>$this->utilities->getSessionUserData('uid'),'transaction_typt'=>'2','active_status'=>'1'));
					if(!$gettransData){
						$trancInsArr = array(
							'book_id'=>$bookId,
							'user_id'=>$this->utilities->getSessionUserData('uid'),
							'transaction_typt'=>'2',
							'transaction_date'=>date('Y-m-d'),
							'added_by'=>$this->utilities->getSessionUserData('uid'),
							'date_added'=>date('Y-m-d H:i:s')
						);
						$insurtRec = $this->commonModel->insertRecord('books_transaction',$trancInsArr);
						$messageInsArr = array(
							'transaction_id'=>$insurtRec,
							'subject'=>$getBookData['name'],
							'body'=>$this->input->post('message'),
							'added_by'=>$this->utilities->getSessionUserData('uid'),
							'date_added'=>date('Y-m-d H:i:s')
						);
						$messageIns = $this->commonModel->insertRecord('messages',$messageInsArr);
						$mapInsArrForSeller = array(
							'message_id'=>$messageIns,
							'to_addr'=>$getBookData['added_by'],
							'added_by'=>$this->utilities->getSessionUserData('uid'),
							'date_added'=>date('Y-m-d H:i:s')
						);
						$this->commonModel->insertRecord('messages_maped',$mapInsArrForSeller);
					} else {
						$messageInsArr = array(
							'transaction_id'=>$gettransData['id'],
							'subject'=>$getBookData['name'],
							'body'=>$this->input->post('message'),
							'added_by'=>$this->utilities->getSessionUserData('uid'),
							'date_added'=>date('Y-m-d H:i:s')
						);
						$messageIns = $this->commonModel->insertRecord('messages',$messageInsArr);
						$mapInsArrForSeller = array(
							'message_id'=>$messageIns,
							'to_addr'=>$getBookData['added_by'],
							'added_by'=>$this->utilities->getSessionUserData('uid'),
							'date_added'=>date('Y-m-d H:i:s')
						);
						$this->commonModel->insertRecord('messages_maped',$mapInsArrForSeller);
					}
					
					$this->db->trans_complete();
					if($this->db->trans_status() === FALSE){
					   $this->db->trans_rollback();
					   $this->layouts->dbview('dashboard/viewbookdetails',$data);
					}else{
					   $this->db->trans_complete();
					   redirect('dashboard');
					}
				}
			}
		}
	}
}

?>