<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->load->library('recaptcha');
		$this->load->library('sendemail');
		$this->load->model('auth/auths');
	}

	public function index() {
		$extraHead = "activateHeadMeanu('topdashboard,topdashboardhead')";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('welcome!');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('home/main_page');
	}

	public function about() {
		$extraHead = "activateHeadMeanu('topabout,topabouthead')";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('About!');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('home/about');
	}

	public function contact() {
		$extraHead = "activateHeadMeanu('topcontact,topcontacthead')";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Contact!');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css')->add_include('https://www.google.com/recaptcha/api.js',false);
		$this->layouts->view('home/contact');
	}
	
	function contactus(){
		$extraHead = "activateHeadMeanu('topcontact,topcontacthead')";
		$this->layouts->set_extra_head($extraHead);
		
		$this->layouts->set_title('Contact Us');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css')->add_include('https://www.google.com/recaptcha/api.js',false);
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]|xss_clean');
		$this->form_validation->set_rules("email", "Email", "trim|required|xss_clean|max_length[50]");
		$this->form_validation->set_rules("subject", "Subject", "trim|required|max_length[100]|xss_clean");
		$this->form_validation->set_rules("message", "Message", "trim|required|max_length[250]|xss_clean");
		$recaptcha = $this->input->post("g-recaptcha-response");
		if ($this->form_validation->run() == FALSE || !$recaptcha) {
			// fails			
			if(!$recaptcha){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-left">Please re-enter your reCAPTCHA.</div>');
			} else {
				$this->session->set_flashdata('msg', '');
			}
			$this->layouts->view('home/contact');
        } else {
			
			$result = $this->recaptcha->captcha(array('recaptcha'=>$recaptcha));
			if(!$result) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please re-enter your reCAPTCHA.</div>');
				$this->layouts->view('home/contact');
			}else{
				$emailData = array(
					'to'=>'aijaz.fkp@gmail.com',
					'from'=>$this->input->post('email'),
					'subject'=>'Collegebooksrus.com - '.$this->input->post('name').' - '.$this->input->post('subject'),
					'from_name'=>$this->input->post('name'),
					'message'=>$this->input->post('message')
				);
				$send = $this->sendemail->emailSend($emailData);
				if(!$send){
					//Error
					//$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!!</div>');
						//redirect('index/contact');
						echo 'fail';
				}else{
					//$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Thank you for contacting us...</div>');
					//redirect('index/contact');
					echo 'success';
				}
			}
		}
	}
	
	function termsandpolicy(){
		$this->layouts->set_title('Contact Us');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css')->add_include('https://www.google.com/recaptcha/api.js',false);
		$this->layouts->view('home/termsandpolicy');
	}
}