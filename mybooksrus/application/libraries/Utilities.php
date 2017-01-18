<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * booksrus Utilities Class
 *
 * It contain common functions that will be used in the whole product  
 *
 * @package		booksrus
 * @category	Libraries
 * @author		Aijaz Ahmad
 * @CDate		
 */
class Utilities {

    private $CI;
	
	public function __construct() {
        $this->CI = & get_instance();
		$this->CI->load->model('common/commonModel');
    }
	
	/**
	 * 		Function 		setSession
	 * 		author			Aijaz Ahmad <aijaz@collegebooksrus.com>
	 * 		Description		This function will use to set session variables.
	 * 		@param			$sess_data
	 * 		@return 		none
	 */
	function setSession($sess_data) {
		$this->CI->session->set_userdata($sess_data);
	}

	function setAccessSession($setAceess) {
		$this->CI->session->set_userdata('access',$setAceess);
	}
	
	function getUserTypeAndStatus(){
			if($this->CI->session->userdata('user_type')=='1'){
				$return['user_type'] = 'admin';
			}elseif($this->CI->session->userdata('user_type')=='0'){
				$return['user_type'] = 'user';
			}
			if($this->CI->session->userdata('active_status')=='0'){
				$return['active_status'] = 'active';
			}elseif($this->CI->session->userdata('active_status')=='1'){
				$return['active_status'] = 'inactive';
			}elseif($this->CI->session->userdata('active_status')=='2'){
				$return['active_status'] = 'delete';
			}
		return $return;
	}
	
	public function validateSession() {
		$sesdata = $this->CI->session->userdata('login');
		if (isset($sesdata) && $sesdata === true) {
			if($_SERVER['REQUEST_URI']=='/auth/signin'){
				redirect('dashboard/index');
			}else if($_SERVER['REQUEST_URI']=='/auth/signup'){
				redirect('dashboard/index');
			}else if($_SERVER['REQUEST_URI']=='/auth/signupauth'){
				redirect('dashboard/index');
			}else if($_SERVER['REQUEST_URI']=='/auth/signinauth'){
				redirect('dashboard/index');
			}
        } else {
			$this->destroySession();
		}
	}
	
	function destroySession() {
        $this->CI->session->sess_destroy();
        redirect('auth/signin');
    }
	
	function getUserDataById($userId='0'){
		if(!empty($userId)){
			return $this->CI->commonModel->getUserDataById($userId);
		}else{
			return false;
		}
	}
	
	function getAllCountry(){
		$result = $this->CI->commonModel->getAllCountry();
		if($result){
			return $result;
		}else{
			return false;
		}
		
	}
	
	function getAllState($countryId='231'){
		$result = $this->CI->commonModel->getAllCountry($countryId);
		if($result){
			return $result;
		}else{
			return false;
		}
		
	}
	
	
}