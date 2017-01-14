<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->utilities->validateSession();
		$this->load->library('Layouts');
		$this->load->library('sendemail');
		$this->load->model('auth/auths');
		$this->load->helper('string');
		
	}
	
	
	public function signin() {
		$this->layouts->set_title('SignIn');
		//$res = $this->auth->login('admin','admin');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('auth/signin');
	}
	
	public function signinauth() {
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
			$result = $this->auths->login($email, $passwd);
			if ($result && count($result) > 0) {
				// set session
				$sess_data = array('login' => TRUE, 'uname' => $result['first_name'], 'uid' => $result['id'], 'active_status' => $result['active_status'], 'email' => $result['email'], 'mobile' => $result['mobile'], 'user_type' => $result['user_type'], 'user_name' => $result['user_id']);
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
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('auth/signup');
	}
	
	public function signupauth() {
		// set form validation rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('passwd', 'Password', 'trim|required|min_length[6]|matches[cpasswd]|md5');
		$this->form_validation->set_rules('cpasswd', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
		/* |callback_cust_email_check */
		// submit
		if ($this->form_validation->run() == FALSE) {
			// fails
			$this->layouts->set_title('SignUp');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('auth/signup');
        } else {
			//insert user details into db
			$signUpdata = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'passwd' => $this->input->post('passwd'),
				'email_verification_code' => random_string('alnum',20)
			);
			
			$insRecord = $this->auths->insert_user($signUpdata);
			if ($insRecord) {
				$userDetails = $this->utilities->getUserDataById($insRecord);
				if($userDetails){
					
					$verifyUrl = EMAIL_VARIFY_URL . $userDetails['email_verification_code'];
					$data['varifydata'] = array('name'=>$userDetails['first_name'],'verifyurl'=>$verifyUrl);
					
					$emailMsg = $this->load->view('auth/sendEmailVerifyCard',$data,true);
					
					$emailData = array(
						'to'=>$userDetails['email'],
						'from'=>EMAIL_FROM,
						'subject'=>'Email Verification from collegebooksrus.com - DO NOT REPLY',
						'from_name'=>EMAIL_FROM_NAME,
						'message'=>$emailMsg
					);
					
					$send = $this->sendemail->emailSend($emailData);
					
					if(!$send){
						//Error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your account has been created please <a href="">verify</a> your account</div>');
						redirect('auth/signup');
					}else{
						//Success
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> verification email has been sent to your register email id please verify your Account...</div>');
						redirect('auth/signup');
					}
				}else{
					// error
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!!</div>');
					redirect('auth/signup');
				}
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
	
	public function cust_email_check($str) {
		if (substr($str, -strlen(".edu")) != ".edu") {
			$this->form_validation->set_message('cust_email_check', 'This %s must end with word ".edu"');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function verifyaccount($verifyId) {
		if(!empty($verifyId)){
			$getRec = $this->commonModel->getRecord('users','email_verification_code',array('email_verification_code'=>$verifyId,'active_status'=>'0'));
			if($getRec){
				$update = $this->commonModel->updateRecord('users',array('active_status'=>'1'),array('email_verification_code'=>$verifyId));
				if($update){
					$data['msg_succ'] = 'Accout verify success fully...!!!<br/>please <a href="'.base_url('auth/signin').'">login</a>';
				}else{
					$data['msg_fail'] = 'Somthing is worng please try Again';
				}
			}else{
				$data['msg_fail'] = 'Link has been expireed.... :-(';
			}
		}else{
			$data['msg_fail'] = 'Somthing is worng please try Again';
		}
		$this->layouts->set_title('SignUp');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('auth/emailVarifyResult',$data);
		//echo  $this->load->view('auth/emailVarifyResult',$data, true);	die;
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
}