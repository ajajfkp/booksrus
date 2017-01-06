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
	
	
}