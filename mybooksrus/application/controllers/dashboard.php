<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->load->library('session');
		$this->load->library('utilities');
		$this->load->library('email');
		
		$this->load->model('auth/auths');
	}
	
	public function index() {
		$this->layouts->set_title('Dashboard!');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('dashboard/dashboard');
	}
	
	
}