<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->load->library('sendemail');
		$this->load->model('auth/auths');
		$this->load->model('search/SearchModel');
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
	
	public function searchbooks(){
		$this->utilities->checkUnivApr();
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('leftsearcby');";
		$this->layouts->set_extra_head($extraHead);
		
		$this->layouts->set_title('Search!');
		$this->layouts->set_page_title('Home','<i class="glyphicon glyphicon-search"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		if($this->input->get('inputsearch')){
			$getRec = $this->SearchModel->getBookList($this->input->get('inputsearch'));
			$data['booksdata'] = $getRec;
			$data['inputsearch'] = $this->input->get('inputsearch');
			$this->layouts->dbview('search/innersearch',$data);
		}else{
			$data['booksdata'] = '';
			$this->layouts->dbview('search/innersearch',$data);
		}
		
		
	}
	
	public function searchbookslist(){
		$input = $this->input->post('input');
		$getRec = $this->SearchModel->getBookList($input);
		$data['booksdata'] = $getRec;
		$this->load->view('search/innersearchview',$data);
	}
	
	
}

?>