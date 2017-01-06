<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->load->library('utilities');
		$this->load->library('email');
		
		$this->load->library(array('session', 'form_validation'));
		$this->load->model('auth/auths');
	}
	
	
	public function signin() {
		$this->layouts->set_title('SignIn');
		//$res = $this->auth->login('admin','admin');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('auth/signin');
	}
	
	public function signinauth() {
		//$this->form_validation->set_rules("email", "Email-ID", "trim|required|xss_clean");
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules("passwd", "Passwd", "trim|required|xss_clean|md5");
		if ($this->form_validation->run() == FALSE) {
			// validation fail
			$this->layouts->set_title('SignIn');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('auth/signin');
		} else {
			// check for user credentials
			$email = $this->input->post("email");
			$passwd = $this->input->post("passwd");
			$uresult = $this->auths->login($email, $passwd);
			if ($uresult && count($uresult) > 0) {
				// set session
				$sess_data = array('login' => TRUE, 'uname' => $uresult['first_name'], 'uid' => $uresult['id']);
				$this->utilities->setSession($sess_data);
				redirect('dashboard/index');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
				redirect('auth/signin');
			}
		}
	}
	
	public function signup() {
		$this->layouts->set_title('SignUp');
		//$res = $this->auth->login('admin','admin');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('auth/signup');
	}
	
	public function signupauth() {
		// set form validation rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('passwd', 'Password', 'trim|required|matches[cpasswd]|md5');
		$this->form_validation->set_rules('cpasswd', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
		
		// submit
		if ($this->form_validation->run() == FALSE) {
			// fails
			$this->layouts->set_title('SignUp');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('auth/signup');
        } else {
			//insert user details into db
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'passwd' => $this->input->post('passwd')
			);

			if ($this->auths->insert_user($data)) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');
				redirect('auth/signin');
			} else {
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('auth/signup');
			}
		}
	}
	
	public function logout() {
		$sesdata = $this->session->userdata('login');
		if (isset($sesdata) && $sesdata === true) {
			$this->session->sess_destroy();
			redirect('/');
		}else{
			redirect('/');
		}
	}
	
		
}