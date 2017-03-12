<?php defined('BASEPATH') OR exit('No direct script access allowed');

class University extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->utilities->validateSession();
		$this->load->library('Layouts');
		$this->load->library('sendemail');
		$this->load->library('recaptcha');
	}
	
	
	public function index() {
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('addschool');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Add university');
		$this->layouts->set_page_title('University','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->dbview('dashboard/universityform');
	}
	
	public function adduniversity() {
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('addschool');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Add university');
		$this->layouts->set_page_title('University','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		// set form validation rules
		$this->form_validation->set_rules('name', 'University Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nickname', 'Nick Name', 'trim|xss_clean');
		$this->form_validation->set_rules('year_establis', 'Year Establis', 'trim|numeric|min_length[4]|max_length[4]|xss_clean');
		$this->form_validation->set_rules('website', 'Website', 'trim');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->layouts->dbview('dashboard/universityform');
		}else{
			
			$inputDataArr = $this->input->post();
			
			if($inputDataArr){
				$inputDataArr['added_by'] = $this->utilities->getSessionUserData('uid');
				$inputDataArr['date_added'] = date("Y-m-d H:i:s");
				$inputDataArr['active_flag'] = '1';
				$inputDataArr['approved'] = '1';
				$insRec = $this->commonModel->insertRecord('universities',$inputDataArr);
				if($insRec){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">University added successfully!</div>');
						redirect('university/index');
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">ERROR!..Something is wrong!</div>');
					redirect('university/index');
				}
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">ERROR!..Something is wrong!</div>');
				redirect('university/index');
			}
		}
	}
	
	
	
}