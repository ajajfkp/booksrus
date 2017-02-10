<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Model {
	
	public function __construct() {
        parent::__construct();
		$this->load->model('common/commonModel');
	}
	
	function inbox($userId){
		if($userId){
			$sql = "select t1.id as msgid,t1.subject,t1.body, t3.id as transid, t3.book_id as bookid,t3.date_added as transdate,
				(select count(*) as msgcount from messages where transaction_id=transid) as msgcounts,
				(select count(*) as unread from messages t5
				inner join messages_maped t6 on t6.message_id = t5.id
				where t6.message_type = '0' and is_read='1' and transaction_id=transid) as isread,
				t4.first_name,t4.last_name
				from messages t1
				inner join messages_maped t2 on t2.message_id = t1.id
				inner join books_transaction t3 on t3.id = t1.transaction_id
				inner join user_profile as t4 on t4.users_id=t3.user_id
				where t2.message_type = '0' and t2.to_addr = '".$userId."'  group by t3.id";
				$result = $this->db->query($sql);
				if($result->num_rows()>0){
					return $result->result_array();
				}
		}else{
			return false;
		}
	}
	
	function sent($userId){
		if($userId){
			$sql = "select t1.id as msgid,t1.subject,t1.body, t3.id as transid, t3.book_id as bookid,t3.date_added as transdate,
				(select count(*) as msgcount from messages where transaction_id=transid) as msgcounts,
				(select count(*) as unread from messages t5
				inner join messages_maped t6 on t6.message_id = t5.id
				where t6.message_type = '0' and is_read='1' and transaction_id=transid) as isread,
				t4.first_name,t4.last_name
				from messages t1
				inner join messages_maped t2 on t2.message_id = t1.id
				inner join books_transaction t3 on t3.id = t1.transaction_id
				inner join user_profile as t4 on t4.users_id=t3.user_id
				where t2.message_type = '1' and t2.added_by = '".$userId."'  group by t3.id";
				$result = $this->db->query($sql);
				if($result->num_rows()>0){
					return $result->result_array();
				}
		}else{
			return false;
		}
	}
	
	function getTransactionDeatils($transId=""){
		if($transId){
			$sql="select t1.id bookid,t2.id transid,t1.name,t1.image,
			t3.first_name,t3.last_name 
			from books t1
			inner join books_transaction t2 on t2.book_id=t1.id
			inner join user_profile as t3 on t3.users_id=t1.added_by
			where t2.id=".$transId;
			$result = $this->db->query($sql);
			if($result->num_rows()>0){
				return $result->row_array();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
}









