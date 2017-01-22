<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Postyouradd extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->utilities->validateSession();
		$this->load->model('users/usersModel');
		$this->utilities->checkUnivApr();
	}
	
	public function index() {
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('leftsellbooks');";
		$this->layouts->set_extra_head($extraHead);
		
		$this->layouts->set_title('Add your post!');
		$this->layouts->set_page_title('Post your ad','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->dbview('dashboard/addpost');
	}
	
}