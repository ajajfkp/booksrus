<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recaptcha {
	var $CI;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	
	public function captcha($params = array()){
		//varify recaptcha
		$q = http_build_query(array(
			'secret'    => RE_CAPTCHA_SECRET,
			'response'  => $params['recaptcha'],
			'remoteip'  => REMOTE_IP,
		));
	
		$result = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?'.$q));
		
		if($result->success) {
			return true;
		}else{
			return false;
		}	
	}
	
	
	
	
	
	
}