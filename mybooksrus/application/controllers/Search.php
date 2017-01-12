<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->load->library('sendemail');
		$this->load->model('auth/auths');
		$this->load->model('Search/SearchModel');
		$this->load->helper('string');
		
	}
	
	
	public function index() {
		$this->layouts->set_title('Search!');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');

		$searchdata = array('search' => $this->input->get('search'));
		$this->form_validation->set_data($searchdata);
		
		$this->form_validation->set_rules("search", "Search", "trim|required|xss_clean");
				
		if ($this->form_validation->run() == FALSE) {
			$this->layouts->set_title('Search');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('home/main_page');
		} else {
			$data['searchby'] = $searchdata['search'];
			
			$getBooks = $this->SearchModel->getBookList($data['searchby']);
			
			$this->layouts->view('search/search',$data);
			
		}
		
		
		
		
		
		
		
		
		
	}
	
}

?>