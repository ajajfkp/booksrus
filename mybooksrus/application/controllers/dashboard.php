<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->utilities->validateSession();
		$this->load->model('auth/auths');
		$this->utilities->checkUnivApr();
	}
	
	public function index() {
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('lefthome');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Dashboard!');
		$this->layouts->set_page_title('Home','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->dbview('dashboard/dashboard');
	}
	
	public function admin() {
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('lefthome');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Admin Dashboard!');
		$this->layouts->set_page_title('Admin Home','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->dbview('dashboard/admindashboard');
	}
	
	
	public function adduniversity() {
		$this->layouts->set_title('Add university!');
		$this->layouts->set_page_title('University','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->dbview('home/completeprofile');
	}
	
	
}

?>