<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admindb extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->utilities->validateSession();
		$this->load->library('Layouts');
		$this->load->library('pagination');
		$this->load->model('admindb/admindbmodel');
	}
	
	public function userlist(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('registeruser');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('User list!');
		$this->layouts->set_page_title('User list','<i class="glyphicon glyphicon-user"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$url = base_url('/admindb/userlist/');
		$total = $this->admindbmodel->active_record_count(1);
		$limit=20;
		$this->utilities->getpagination($url,$total,$limit);
		if($this->input->get('per_page')){
			$offset = $this->input->get('per_page');
		}else{
			$offset ='0';
		}
		$data["total"] = $total;
		$data['actUserLists'] = $this->commonModel->getRecord('users','*',array('active_status'=>'1'),array(),$limit,$offset,'array',1);
		$data["links"] = $this->pagination->create_links();
		$this->layouts->dbview('admindb/userlist',$data);
	}
	
	public function inactivuserlist(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('registeruser');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('User list!');
		$this->layouts->set_page_title('User list','<i class="glyphicon glyphicon-user"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$url = base_url('/admindb/inactivuserlist/');
		$total = $this->admindbmodel->active_record_count('0');
		$limit=20;
		$this->utilities->getpagination($url,$total,$limit);
		if($this->input->get('per_page')){
			$offset = $this->input->get('per_page');
		}else{
			$offset ='0';
		}
		$data["total"] = $total;
		$data['actUserLists'] = $this->commonModel->getRecord('users','*',array('active_status'=>'0'),array(),$limit,$offset,'array',1);
		$data["links"] = $this->pagination->create_links();
		$this->layouts->dbview('admindb/inactiveuserlist',$data);
	}
	
	public function deleteuserlist(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('registeruser');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('User list!');
		$this->layouts->set_page_title('User list','<i class="glyphicon glyphicon-user"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$url = base_url('/admindb/deleteuserlist/');
		$total = $this->admindbmodel->active_record_count(2);
		$limit=20;
		$this->utilities->getpagination($url,$total,$limit);
		if($this->input->get('per_page')){
			$offset = $this->input->get('per_page');
		}else{
			$offset ='0';
		}
		$data["total"] = $total;
		$data['actUserLists'] = $this->commonModel->getRecord('users','*',array('active_status'=>'2'),array(),$limit,$offset,'array',1);
		$data["links"] = $this->pagination->create_links();
		$this->layouts->dbview('admindb/deleteuserlist',$data);
	}
	
	function schoolList(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('schoollist');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('School list!');
		$this->layouts->set_page_title('School list','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$url = base_url('admindb/schoolList/');
		$total = $this->admindbmodel->school_record_count($type='totlaapr');
		$limit=20;
		$this->utilities->getpagination($url,$total,$limit);
		if($this->input->get('per_page')){
			$offset = $this->input->get('per_page');
		}else{
			$offset ='0';
		}
		$data["total"] = $total;
		$data['actSchoolLists'] = $this->commonModel->getRecord('universities','*',array('approved'=>'1','active_flag'=>'1'),array(),$limit,$offset,'array',1);

		$data["links"] = $this->pagination->create_links();
		$this->layouts->dbview('admindb/actschools',$data);
	}
	
	function univapproved(){ 
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('schoollist');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('School list!');
		$this->layouts->set_page_title('School list','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$url = base_url('admindb/univapproved/');
		$total = $this->admindbmodel->school_record_count($type='totlnotaapr');
		$limit=20;
		$this->utilities->getpagination($url,$total,$limit);
		if($this->input->get('per_page')){
			$offset = $this->input->get('per_page');
		}else{
			$offset ='0';
		}
		$data["total"] = $total;
		$data['univapproved'] = $this->commonModel->getRecord('universities','*',array('approved'=>'0','active_flag'=>'1'),array(),$limit,$offset,'array',1);

		$data["links"] = $this->pagination->create_links();
		$this->layouts->dbview('admindb/univapproved',$data);
	}
	
	function inactiveUniv(){ 
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('schoollist');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('School list!');
		$this->layouts->set_page_title('School list','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$url = base_url('admindb/inactiveUniv/');
		$total = $this->admindbmodel->school_record_count($type='inact');
		$limit=20;
		$this->utilities->getpagination($url,$total,$limit);
		if($this->input->get('per_page')){
			$offset = $this->input->get('per_page');
		}else{
			$offset ='0';
		}
		$data["total"] = $total;
		$data['inactiveUniv'] = $this->commonModel->getRecord('universities','*',array('active_flag'=>'0'),array(),$limit,$offset,'array',1);

		$data["links"] = $this->pagination->create_links();
		$this->layouts->dbview('admindb/inactiveUniv',$data);
	}
	
	public function viewuser($uid='',$type='act'){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('registeruser');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('User list!');
		$this->layouts->set_page_title('User list','<i class="glyphicon glyphicon-user"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$data['userData'] = $this->utilities->getUserDataById($uid ? $uid : 0);
		$data['univList'] = $this->utilities->getListUnivesityByStatteId();
		$data['type'] = $type;
		
		if($this->input->post()){
			// set form validation rules
			$this->form_validation->set_rules('username', 'User Name', 'trim|alpha_numeric|max_length[30]|xss_clean|callback_cust_username_check');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|alpha|required|max_length[100]|xss_clean');
			$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|alpha|max_length[100]|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|alpha|max_length[100]|required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|integer|max_length[11]|xss_clean');
			$this->form_validation->set_rules('email', 'Email Id', 'trim|valid_email|max_length[100]|xss_clean');
			$this->form_validation->set_rules('university_id', 'School', 'trim|max_length[11]|xss_clean');
			$this->form_validation->set_rules('active_status', 'Status', 'trim|max_length[11]|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->layouts->dbview('admindb/viewuser',$data);
			}else{
				$profiledata = $this->input->post();
				if($profiledata){
					$usaeData = array(
						'username'=>$profiledata['username'],
						'first_name'=>$profiledata['first_name'],
						'last_name'=>$profiledata['last_name'],
						'mobile'=>$profiledata['mobile'],
						'university_id'=>$profiledata['university_id'],
						'active_status'=>$profiledata['active_status'],
						'user_type'=>$profiledata['user_type'],
						'updated_by'=>$uid,
						'date_updated'=>date('Y-m-d H:i:s')
					);
					$updateUser = $this->commonModel->updateRecord('users',$usaeData,array('id'=>$uid));
					
					$userProfileData = array(
						'username'=>$profiledata['username'],
						'first_name'=>$profiledata['first_name'],
						'middle_name'=>$profiledata['middle_name'],
						'last_name'=>$profiledata['last_name'],
						'mobile'=>$profiledata['mobile'],
						'updated_by'=>$uid,
						'date_updated'=>date('Y-m-d H:i:s')
					);
					
					$updateUserProfile = $this->commonModel->updateRecord('user_profile',$userProfileData,array('users_id'=>$uid));
					if($updateUser && $updateUserProfile){
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">User data updated successfully!!!</div>');
						redirect('admindb/viewuser/'.$uid.'/'.$type);
					}else{
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops!...Some technical error!!!</div>');
					}
				}
			}
		}else{
			$this->layouts->dbview('admindb/viewuser',$data);
		}
	}	
	
	public function cust_username_check($str) {
		$getusername=$this->commonModel->getRecord('users','username',array('username'=>$str));
		if(!$getusername['username']){
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
}