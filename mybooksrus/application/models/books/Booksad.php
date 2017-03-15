<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booksad extends CI_Model {
	
	public function __construct() {
        parent::__construct();
	}
	
	function getListUserAd($userId,$type='1'){
		$sql = "select t1.id bookid,t1.isbn10,t1.isbn13,t1.name title,t1.discription,t1.authors,
					t1.edition,t1.binding,t1.publisher,t1.published,t1.price,t1.copyright_year,
					t1.pages,t1.image,t1.size_unit,t1.weight,t1.weight_unit,t1.language,t1.added_by,
					t1.condition,t1.discount,t2.transaction_typt from books t1 
					inner join books_transaction t2 on t1.id=t2.book_id
					where t2.active_status ='1' and t2.transaction_typt='".$type."'";
		if($userId){
			 $sql .= " and t1.added_by='".$userId."'";
			$data = $this->db->query($sql);
			if ($data->num_rows() > 0) {
				return $data->result_array();
			}else{
				return false;
			}
		}else{
			$data = $this->db->query($sql);
			if ($data->num_rows() > 0) {
				return $data->result_array();
			}else{
				return false;
			}
		}
	}
	
	function getBookDetails($bookId=""){
			$sql = "select t1.id bookid,t1.isbn10,t1.isbn13,t1.name title,t1.discription,t1.authors,t1.active_status as status,
				t1.edition,t1.binding,t1.publisher,t1.published,t1.price,t1.copyright_year,
				t1.pages,t1.image,t1.size,t1.size_unit,t1.weight,t1.weight_unit,
				case 
				when t1.language =1 then 'English'
				else 'English' end as langs,
				t1.language,
				t1.added_by,
				case  
				when t1.condition = '1' then 'new'
				when t1.condition = '2' then 'Like new'
				when t1.condition = '3' then 'Very good'
				when t1.condition = '4' then 'Good'
				when t1.condition = '5' then 'Acceptable' else '' end as conditions,t1.condition,
				t1.discount,t2.transaction_typt from books t1 
				inner join books_transaction t2 on t1.id=t2.book_id
				where t2.active_status ='1' and t2.transaction_typt='1' and t1.id='".$bookId."'";
		if($bookId){
			$data = $this->db->query($sql);
			if ($data->num_rows() > 0) {
				return $data->row_array();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
}

?>