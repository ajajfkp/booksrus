<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->utilities->validateSession();
		$this->load->library('Layouts');
		$this->load->library('sendemail');
		$this->load->library('recaptcha');
		$this->load->model('auth/auths');
		$this->load->helper('string');
	}
	
	
	public function signin() {
		$extraHead = "activateHeadMeanu('topsignin')";
		$this->layouts->set_extra_head($extraHead);
		
		$this->layouts->set_title('SignIn');
		//$res = $this->auth->login('admin','admin');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css')->add_include('https://www.google.com/recaptcha/api.js',false);
		$this->layouts->view('auth/signin');
	}
	
	public function signinauth() {
		$extraHead = "activateHeadMeanu('topsignin')";
		$this->layouts->set_extra_head($extraHead);
		
		$this->layouts->set_title('SignIn');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css')->add_include('https://www.google.com/recaptcha/api.js',false);
		
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules("passwd", "Passwd", "trim|required|xss_clean|md5");
		$recaptcha = $this->input->post("g-recaptcha-response");
		$attempt = $this->utilities->getWrongPasswdAtempt();
		if ($this->form_validation->run() == FALSE || (!$recaptcha && $attempt>3)) {
			// validation fail			
			if(!$recaptcha && $attempt>3){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please re-enter your reCAPTCHA.</div>');
			}else{
				$this->session->set_flashdata('msg', '');
			}
			$this->utilities->setWrongPasswdAtempt();
			$this->layouts->view('auth/signin');
		} else {
			
			$result = $this->recaptcha->captcha(array('recaptcha'=>$recaptcha));
			if(!$result && $attempt>3) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please re-enter your reCAPTCHA.</div>');
				$this->utilities->setWrongPasswdAtempt();
				$this->layouts->view('auth/signin');
			}else{
				// check for user credentials
				$email = $this->input->post("email");
				$passwd = $this->input->post("passwd");
				$result = $this->auths->login($email, $passwd);
				
				if ($result && count($result) > 0) {
					
					$getuserdata = $this->utilities->getUserDataById($result['id']);
					
					if( $getuserdata['active_status']=='0' ) {
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your email not varified please '.anchor("auth/viewvarifyemail", 'Varify', array('title' => 'Varify Account!')).' your email</div>');
							redirect('auth/signin');
					} else if( $getuserdata['active_status']=='2' ) {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
						redirect('auth/signin');
					} else {
					// set session
						$sess_data = array('login' => TRUE, 'uname' => $result['first_name'], 'uid' => $result['id'], 'active_status' => $result['active_status'], 'email' => $result['email'], 'mobile' => $result['mobile'], 'user_type' => $result['user_type'], 'user_name' => $result['username'], 'university_id' => $result['university_id']);
						$saveurl = $this->utilities->getserchurl();
						$this->utilities->setSession($sess_data);
						$this->utilities->setWrongPasswdAtempt(true);
						if(!$saveurl){
							$usertype = $this->utilities->getUserType();
							if($usertype=='admin'){
								redirect('dashboard/admin');
							}else{
								redirect('dashboard');
							}
						}else{
							redirect($saveurl);
						}
					}
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
					$this->utilities->setWrongPasswdAtempt();
					redirect('auth/signin');
				}
			}
		}
	}
	
	public function signup() {
		$extraHead = "activateHeadMeanu('topsignup')";
		$this->layouts->set_extra_head($extraHead);
		
		$this->layouts->set_title('SignUp');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css')->add_include('https://www.google.com/recaptcha/api.js',false);
		$this->layouts->view('auth/signup');
	}
	
	public function signupauth() {
		$extraHead = "activateHeadMeanu('topsignup')";
		$this->layouts->set_extra_head($extraHead);
		
		$this->layouts->set_title('SignUp');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css')->add_include('https://www.google.com/recaptcha/api.js',false);
		
		// set form validation rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('passwd', 'Password', 'trim|required|min_length[6]|matches[cpasswd]|md5');
		$this->form_validation->set_rules('cpasswd', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]|callback_cust_email_check');
		/* |callback_cust_email_check */
		$recaptcha = $this->input->post("g-recaptcha-response");
		
		// submit
		if ($this->form_validation->run() == FALSE || !$recaptcha) {
			// fails			
			if(!$recaptcha){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please re-enter your reCAPTCHA.</div>');
			} else {
				$this->session->set_flashdata('msg', '');
			}
			$this->layouts->view('auth/signup');
        } else {
			
			$result = $this->recaptcha->captcha(array('recaptcha'=>$recaptcha));
			if(!$result) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please re-enter your reCAPTCHA.</div>');
				$this->layouts->view('auth/signup');
			}else{
				//insert user details into db
				$signUpdata = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'passwd' => $this->input->post('passwd'),
					'email_verification_code' => md5($this->input->post('email')).random_string('alnum', 20)
				);
				
				$insRecord = $this->auths->insert_user($signUpdata);
				if ($insRecord) {
					$userDetails = $this->utilities->getUserDataById($insRecord);
					if($userDetails){
						$verifyUrl = EMAIL_VARIFY_URL . $userDetails['email_verification_code'];
						$msgOne = "Thank you for signing up with collegebooksrus.com.";
						$msgTwo = "Please verify your account.";
						$buttonText = "Verify your account";
						$data['varifydata'] = array('name'=>$userDetails['first_name'],'verifyurl'=>$verifyUrl,'msgOne'=>$msgOne,'msgTwo'=>$msgTwo,'buttonText'=>$buttonText);
						
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
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your account has been created please '.anchor("auth/sendvarifyemailbyCode/".$signUpdata['email_verification_code']."", 'Varify', array('title' => 'Varify Account!')).' your account</div>');
							redirect('auth/signup');
						}else{
							//Success
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Verification email sent to the edu address, may take up to 30 mins. Please check your Inbox / Spam for the email.</div>');
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
	}
	
	public function logout() {
		$sesdata = $this->utilities->getSessionUserData('login');
		$this->utilities->setserchurl('',true);
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
		$this->layouts->set_title('Email varification');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('auth/emailVarifyResult',$data);
	}
	
	
	public function sendvarifyemailbyCode($emailcode=''){
		$this->layouts->set_title('Email varification');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		if(!empty($emailcode)){
			$getUserData = $this->commonModel->getRecord('users','*',array('email_verification_code'=>$emailcode));
			if($getUserData){
				$verifyUrl = EMAIL_VARIFY_URL . $getUserData['email_verification_code'];
				$msgOne = "Thank you signing up for collegebooksrus.com.";
				$msgTwo = "Please confirm your account.";
				$buttonText = "Verify your account";
				$data['varifydata'] = array('name'=>$getUserData['first_name'],'verifyurl'=>$verifyUrl,'msgOne'=>$msgOne,'msgTwo'=>$msgTwo,'buttonText'=>$buttonText);
				$emailMsg = $this->load->view('auth/sendEmailVerifyCard',$data,true);
				$emailData = array(
					'to'=>$getUserData['email'],
					'from'=>EMAIL_FROM,
					'subject'=>'Email verification from collegebooksrus.com - DO NOT REPLY',
					'from_name'=>EMAIL_FROM_NAME,
					'message'=>$emailMsg
				);
				$send = $this->sendemail->emailSend($emailData);
				if(!$send){
					//Error
					$data['msg_fail'] = 'Sorry...!!!, There are technical problems in sending mail please try again '.anchor("index/index", 'Go back to home page', array('title' => 'Go back to home'));
					$this->layouts->view('auth/emailVarifyResult',$data);
				}else{
					//Success
					$data['msg_succ'] = 'Verification email sent to the edu address, may take up to 30mins. Please check your Inbox / Spam for the email.'.anchor("index/index", 'Go back to home page', array('title' => 'Go back to home'));
					$this->layouts->view('auth/emailVarifyResult',$data);
				}
			}else{
				$data['msg_fail'] = 'Somthing is worng please try again '.anchor("index/index", 'Go back to home page', array('title' => 'Go back to home'));
				$this->layouts->view('auth/emailVarifyResult',$data);
			}
		}else{
			$data['msg_fail'] = 'Somthing is worng please try again '.anchor("index/index", 'Go back to home page', array('title' => 'Go back to home'));
			$this->layouts->view('auth/emailVarifyResult',$data);
		}	
	}
	
	public function viewvarifyemail(){
		$this->layouts->set_title('Email varification');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('auth/sendVarifyEmailForm');
	}
	
	public function sendvarificationemail(){
		$this->layouts->set_title('Email varification');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->form_validation->set_rules('emailInput', 'Email ID', 'trim|required|valid_email|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->layouts->set_title('SignIn');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('auth/sendVarifyEmailForm');
		} else {
			$email = $this->input->post('emailInput');
			$getUserData = $this->commonModel->getRecord('users','first_name,email,active_status,email_verification_code',array('email'=>$email));
			if($getUserData['active_status']=='0'){
				$verifyUrl = EMAIL_VARIFY_URL . $getUserData['email_verification_code'];
				$msgOne = "Thank you for connecting with collegebooksrus.com.";
				$msgTwo = "Please varify your email.";
				$buttonText = "Verify your email";
				$data['varifydata'] = array('name'=>$getUserData['first_name'],'verifyurl'=>$verifyUrl,'msgOne'=>$msgOne,'msgTwo'=>$msgTwo,'buttonText'=>$buttonText);
				$emailMsg = $this->load->view('auth/sendEmailVerifyCard',$data,true);
				$emailData = array(
					'to'=>$getUserData['email'],
					'from'=>EMAIL_FROM,
					'subject'=>'Email verification from collegebooksrus.com - DO NOT REPLY',
					'from_name'=>EMAIL_FROM_NAME,
					'message'=>$emailMsg
				);
				$send = $this->sendemail->emailSend($emailData);
				if(!$send){
					//Error
					$this->session->set_flashdata('msg','Sorry...!!!, There are technical problems in sending mail please try again '.anchor("index/index", 'Go back to home page', array('title' => 'Go back to home')));
					redirect('auth/viewvarifyemail');
				}else{
					//Success
					$this->session->set_flashdata('msg','Verification email sent to the edu address, may take up to 30mins. Please check your Inbox / Spam for the email.'.anchor("index/index", 'Go back to home page', array('title' => 'Go back to home')));
					redirect('auth/viewvarifyemail');
				}
			}else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Somthing is worng please try Again</div>');
				redirect('auth/viewvarifyemail');
			}
		}
	}
	
	public function forgetpasswd(){
		$this->layouts->set_title('Forget Password');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->view('auth/forgetPasswdForm');
	}
	
	
	public function forgetpasswdemail(){
		$this->layouts->set_title('Email varification');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->form_validation->set_rules('emailInput', 'Email ID', 'trim|required|valid_email|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->layouts->set_title('SignIn');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('auth/forgetPasswdForm');
		} else {
			$email = $this->input->post('emailInput');
			$getUserData = $this->commonModel->getRecord('users','first_name,email,active_status,email_verification_code',array('email'=>$email));
			if($getUserData['active_status']=='1'){
				$verifyUrl = FORGET_PASSWD_URL . $getUserData['email_verification_code'];
				$msgOne = "Thank you for connecting with collegebooksrus.com.";
				$msgTwo = "Please change your password by clicking below button.";
				$buttonText = "Reset Password";
				$data['varifydata'] = array(
					'name'=>$getUserData['first_name'],
					'verifyurl'=>$verifyUrl,
					'msgOne'=>$msgOne,
					'msgTwo'=>$msgTwo,
					'buttonText'=>$buttonText
				);
				$emailMsg = $this->load->view('auth/sendEmailVerifyCard',$data,true);
				$emailData = array(
					'to'=>$getUserData['email'],
					'from'=>EMAIL_FROM,
					'subject'=>'Email verification from collegebooksrus.com - DO NOT REPLY',
					'from_name'=>EMAIL_FROM_NAME,
					'message'=>$emailMsg
				);
				$send = $this->sendemail->emailSend($emailData);
				if(!$send){
					//Error
					$this->session->set_flashdata('msg','Sorry...!!!, There are technical problems in sending mail please try again '.anchor("index/index", 'Go back to home page', array('title' => 'Go back to home')));
					redirect('auth/forgetpasswd');
				}else{
					//Success
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Reset password link sent to the edu address, may take up to 30mins. Please check your Inbox / Spam for the email.</div>');
					redirect('auth/signin');
				}
			} else if($getUserData['active_status']=='0'){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your account is not varified please '.anchor("auth/viewvarifyemail", 'Varify', array('title' => 'Varify your account')).' your account</div>');
					redirect('auth/forgetpasswd');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">You are not registered with us please '.anchor("auth/signup", 'Signup', array('title' => 'Varify your account')).' first</div>');
					redirect('auth/forgetpasswd');
			}
		}
	}
	
	public function changepasswd($vfyId=''){
		$this->layouts->set_title('Reset Password');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		if($vfyId){
			$data['vfyId']=$vfyId;
			$this->layouts->view('auth/resetpasswdform',$data);
		}else{
			$data['msg_fail'] = 'Sorry...!!!, There are technical problems in sending mail please try again '.anchor("auth/signin", 'Sign in', array('title' => 'Sign in'));
					$this->layouts->view('auth/emailVarifyResult',$data);
		}
		
	}
	
	public function resetpasswd($vfyId=''){
		$this->layouts->set_title('Reset Password');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$this->form_validation->set_rules('passwd','Password','trim|required|min_length[6]|matches[repasswd]|md5');
		$this->form_validation->set_rules('repasswd', 'Repeat Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['vfyId']=$vfyId;
			$this->layouts->set_title('Reset Password');
			$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
			$this->layouts->view('auth/resetpasswdform',$data);
		} else {
			$passwd = $this->input->post('passwd');
			$vfyId = $this->input->post('vfyId');
			$updateRec = $this->commonModel->updateRecord('users',array('passwd'=>$passwd),array('email_verification_code'=>$vfyId));
			if($updateRec){
				$data['msg_succ'] = 'Your password hasbeen successfully reset please go to '.anchor("auth/signin", 'Sign in', array('title' => 'Sign in'));
					$this->layouts->view('auth/emailVarifyResult',$data);
			}else{
				$data['msg_fail'] = 'Sorry...!!!, There are technical problems in sending mail please try again '.anchor("auth/signin", 'Sign in', array('title' => 'Sign in'));
					$this->layouts->view('auth/emailVarifyResult',$data);
			}
		}
	}
	
	function updateuserUptime(){
		$uid = $this->input->post('uid');
		//echo $this->utilities->getLastActiveTimeDiff($uid);
		$updateRec = $this->commonModel->updateRecord('users',array('last_activity'=>date('Y-m-d H:i:s')),array('id'=>$uid));
		if($updateRec){
			echo "success";
		}else{
			echo "fail";
		}
	}
	
	
	
		
}
