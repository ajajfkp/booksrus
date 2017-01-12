<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->load->library('sendemail');
		$this->load->model('auth/auths');
		$this->load->helper('string');
		
	}
	
	
	public function index($searchby='') {
		$this->layouts->set_title('Search!');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$data['searchby'] = $searchby;
		
		$this->layouts->view('search/search',$data);
	}
	
}

?>