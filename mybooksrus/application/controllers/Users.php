<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->utilities->validateSession();
		$this->load->model('users/usersModel');
		$this->utilities->checkUnivApr();
	}
	
	public function changecontact() {
		$this->layouts->set_title('Address Details!');
		$this->layouts->set_page_title('Address','<i class="glyphicon glyphicon-pushpin"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/js/users.js')->add_include('assets/css/coustom.css');
		$this->layouts->dbview('users/contact');
	}
	
	public function changenamae() {
		$this->layouts->set_title('Identity Details!');
		$this->layouts->set_page_title('Address','<i class="glyphicon glyphicon-pushpin"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/js/users.js')->add_include('assets/css/coustom.css');
		$this->layouts->dbview('users/identity');
	}
	
	
}

?>