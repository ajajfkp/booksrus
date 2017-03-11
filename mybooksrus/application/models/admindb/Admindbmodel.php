<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admindbmodel extends CI_Model {
	
	public function __construct() {
        parent::__construct();
		$this->load->model('common/commonModel');
	}
	
	public function active_record_count($type='1'){
		
		if($type == 'all'){
			$whare = "";
		}elseif($type == '0'){
			$whare = "where active_status='".$type."'";
		}elseif($type == '1'){
			$whare = "where active_status='".$type."'";
		}elseif($type == '2'){
			$whare = "where active_status='".$type."'";
		}
		
		$sql ="select count(*) as count from users ".$whare;
		$data = $this->db->query($sql);
		if ($data->num_rows() > 0) {
			return $data->row()->count;
		}else{
			return false;
		}
	}
	
	public function school_record_count($approved='1',$type='1'){
		$sql ="select count(*) as count from universities where approved='".$approved."' and ".$type;
		$data = $this->db->query($sql);
		if ($data->num_rows() > 0) {
			return $data->row()->count;
		}else{
			return false;
		}
	}
	
}