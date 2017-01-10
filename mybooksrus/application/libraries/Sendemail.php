<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail {
	var $CI;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	
	public function emailSend($params = array()){
		$config = Array(
			'protocol'	=> PROTOCOL,
			'smtp_host'	=> SMTP_HOST,
			'smtp_port'	=> SMTP_PORT,
			'smtp_user' => SMTP_USER,
			'smtp_pass' => SMTP_PASS,
			'mailtype'	=> MAILTYPE,
			'charset'	=> CHARSET,
			'wordwrap'	=> WORDWRAP
		);

		$this->CI->load->library('email', $config);
		$this->CI->email->set_newline("\r\n");
		$this->CI->email->from($params['from'], "Admin Team");
		$this->CI->email->to($params['to']);  
		$this->CI->email->subject($params['subject']);
		$this->CI->email->message($params['message']);
		if(!$this->CI->email->send()){
			return false;
		}else{
			return true;
		}
	}
	
	
	
	
	
	
}