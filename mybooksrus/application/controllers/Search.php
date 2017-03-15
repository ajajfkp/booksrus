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
		$searchdata = array('search' => mysql_real_escape_string($this->input->get('search')));
		$this->form_validation->set_data($searchdata);
		$this->form_validation->set_rules("search", "Search", "trim|required|xss_clean");
		if ($this->form_validation->run() == FALSE) {
			$this->layouts->set_title('Search');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('home/main_page');
		} else {
			
			$url = base_url('/search/index/?university='.$this->input->get('university').'&state='.$this->input->get('state').'&search='.$searchdata['search']);
			 $total = $this->SearchModel->record_count($searchdata['search'],$this->input->get('university'));
			$limit=20;
			$this->utilities->getpagination($url,$total,$limit);
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
		$this->layouts->set_page_title('Search Books','<i class="glyphicon glyphicon-search"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$searchText = mysql_real_escape_string($this->input->get('inputsearch'));
		if($searchText){
			$univId = $this->utilities->getUnivByUserId($this->utilities->getSessionUserData('uid'));
			$url = base_url('/search/searchbooks/?inputsearch='.$searchText);
			$total = $this->SearchModel->record_count($searchText,$univId['id']);
			$limit=20;
			$this->utilities->getpagination($url,$total,$limit);
			if($this->input->get('per_page')){
				$offset = $this->input->get('per_page');
			}else{
				$offset ='0';
			}
			$data["links"] = $this->pagination->create_links();
			$getRec = $this->SearchModel->getBookList($searchText,$univId['id'],$limit,$offset);
			$data['booksdata'] = $getRec;
			$data['inputsearch'] = $searchText;
			$this->layouts->dbview('search/innersearch',$data);
		}else{
			$data["links"] ='';
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
				$uniOption = "<option value=''>Select School</option>";
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