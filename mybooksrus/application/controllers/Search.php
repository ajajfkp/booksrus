<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->load->library('sendemail');
		$this->load->library('pagination');
		$this->load->model('auth/auths');
		$this->load->model('search/SearchModel');
		$this->load->helper('string');
	}
	
	
	public function index() {
		$this->layouts->set_title('Search!');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$data['listState'] = $this->utilities->getAllState('','3926');
		$searchdata = array('search' => $this->input->get('search'));
		$this->form_validation->set_data($searchdata);
		$this->form_validation->set_rules("search", "Search", "trim|required|xss_clean");
		if ($this->form_validation->run() == FALSE) {
			$this->layouts->set_title('Search');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('home/main_page');
		} else {
			$config = array();
			$limit='2';
			$total_row = $this->SearchModel->record_count($searchdata['search'],$this->input->get('university'));
			$config["base_url"] = base_url('/search/index/?university='.$this->input->get('university').'&state='.$this->input->get('state').'&search='.$searchdata['search']);
			$config['page_query_string'] = TRUE;
			$config["total_rows"] = $total_row;
			$config["per_page"] = $limit;
			$config['display_pages'] = FALSE;
			//$config['num_links'] = $total_row;
			//$config['use_page_numbers'] = FALSE;
			$config['full_tag_open'] = '<div class="pull-right"> <ul class="pagination">';
			$config['full_tag_close'] = '</div></ul>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_link'] = '→';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '←';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</li></a>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['last_link'] = '»';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['first_link'] = '«';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			if($this->input->get('per_page')){
				$offset = $this->input->get('per_page');
			}else{
				$offset ='0';
			}
			$data['searchby'] = $searchdata['search'];
			$data['university'] = $this->input->get('university');
			$data['state'] = $this->input->get('state');
			$data['univList'] = $this->utilities->getListUnivesityByStatteId($data['state']);
			$data['getBooks'] = $this->SearchModel->getBookList($data['searchby'],$this->input->get('university'),$limit,$offset);
			$data["links"] = $this->pagination->create_links();			
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
		if($input){
		$getRec = $this->SearchModel->getBookList($input);
		$data['booksdata'] = $getRec;
		$this->load->view('search/innersearchview',$data);
		}
	}
	
	public function getUniListByStateId(){
		$stateId = $this->input->post('stateid');
		if($stateId){
			$uniObj = $this->utilities->getListUnivesityByStatteId($stateId);
			
			if($uniObj){
				$uniOption = "<option value=''>Select University</option>";
				foreach($uniObj as $uni){
					$uniOption .= "<option value='".$uni->id."'>".$uni->name."</option>";
				}
				$uniOption .= "<option value='-2'>Other</option>";
				echo $uniOption;
			}else{
				echo "false";
			}
		}else{
			echo "false";
		}
	}
	
	
}

?>