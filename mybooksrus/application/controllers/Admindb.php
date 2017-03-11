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
		$limit=2;
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
		$total = $this->admindbmodel->active_record_count(0);
		$limit=2;
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
		$limit=2;
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
		$total = $this->admindbmodel->school_record_count('1','1');
		$limit=2;
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
}