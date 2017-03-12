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
	
	public function school_record_count($type='totlaapr'){
		if($type == 'total'){
			$where = "";
		}else if($type == 'totlaapr'){
			$where = " where approved = '1' and active_flag = '1'";
		}else if($type == 'totlnotaapr'){
			$where = " where approved = '0' and active_flag = '1'";
		}else if($type == 'inact'){
			$where = " where active_flag = '0'";
		}
		$sql ="select count(*) as count from universities ".$where;
		$data = $this->db->query($sql);
		if ($data->num_rows() > 0) {
			return $data->row()->count;
		}else{
			return false;
		}
	}
	
}