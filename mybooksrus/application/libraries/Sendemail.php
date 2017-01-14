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
		$this->CI->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->CI->email->set_header('Content-type', 'text/html');
		$this->CI->email->from($params['from'], $params['from_name']);
		$this->CI->email->to($params['to']);  
		$this->CI->email->subject($params['subject']);
		$this->CI->email->message($params['message']);
		//$this->CI->email->send(FALSE);
		//echo $this->CI->email->print_debugger(array('headers'));die;
		if(!$this->CI->email->send()){
			return false;
		}else{
			return true;
		}
	}
	
	
	
	
	
	
}