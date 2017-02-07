<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {
	
	public function __construct() {
        parent::__construct();
		$this->load->model('common/commonModel');
	}
	
	function login($userId,$paswd){
		$where = "(username = '".$userId."' or  email='".$userId."') and passwd='".$paswd."'";
		$res  = $this->commonModel->getRecord('users','*',$where,'','','','array',0);
		if($res){
			return $res;
		}else{
			return false;
		}
	}
	
}

?>