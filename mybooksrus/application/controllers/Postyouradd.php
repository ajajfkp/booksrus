<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Postyouradd extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		if(!$this->utilities->isAuth()){
			$url = uri_string();
			$this->utilities->setserchurl($url);
		}
		$this->utilities->validateSession();
		$this->load->model('users/usersModel');
		$this->load->model('books/booksad');
		$this->utilities->checkUnivApr();
	}
	
	public function index() {
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('leftsellbooks');";
		$this->layouts->set_extra_head($extraHead);
		
		$this->layouts->set_title('Add your post!');
		$this->layouts->set_page_title('Post your ad','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$this->layouts->dbview('dashboard/addpost');
	}
	
	public function postadd() {
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('leftsellbooks');";
		$this->layouts->set_extra_head($extraHead);

		$this->layouts->set_title('Add your post!');
		$this->layouts->set_page_title('Post your ad','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		// set form validation rules
		$this->form_validation->set_rules('isbn10', 'ISBN 10', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('isbn13', 'ISBN 13', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('name', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('authors', 'Authors', 'trim|required|xss_clean');
		$this->form_validation->set_rules('edition', 'Edition', 'trim|required|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('condition', 'Condition of book', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('discription', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('image', 'Image', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->layouts->dbview('dashboard/addpost');
		}else{
			$bookData = $this->input->post();
			$useruniv = $this->commonModel->getRecord('users','university_id',array('id'=>$this->utilities->getSessionUserData('uid')));
			
			$bookData['added_by'] = $this->utilities->getSessionUserData('uid'); 
			$bookData['date_added'] = date('Y-m-d H:i:s');
			$bookData['language'] = '1';
			$bookData['university_id'] = $useruniv['university_id'];
			
			$this->db->trans_start();
			$insBookData = $this->commonModel->insertRecord('books',$bookData);
			$bookTran = $this->commonModel->insertRecord('books_transaction',array('book_id'=>$insBookData,'user_id'=>$this->utilities->getSessionUserData('uid'),
				'transaction_typt'=>'1',
				'transaction_date'=>date('Y-m-d'),
				'added_by'=>$this->utilities->getSessionUserData('uid'),
				'date_added'=>date('Y-m-d H:i:s')));
			$this->db->trans_complete();
			
			if($insBookData && $bookTran){
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Post has been added successfully.</div>');
				redirect('postyouradd');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Some technical error!!!</div>');
				$this->layouts->dbview('dashboard/addpost');
			}
		}
		
	}
	
	function uploadimages(){
		$config['upload_path']          = './uploads/booksimg/';
		$config['allowed_types']        = 'jpeg|JPEG|jpg|JPG|png|PNG';
		$config['max_size']             = '*';
		$config['max_width']            = '*';
		$config['max_height']           = '*';
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('photoimg')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = $this->upload->data();
			if($data){
				echo json_encode($data);
			}else{
				echo json_encode( array('error' =>'File not upload'));
			}
        }
    }
	
	function listuseradsetails(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('listad');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Book list!');
		$this->layouts->set_page_title('Book list','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$getData = $this->booksad->getListUserAd($this->utilities->getSessionUserData('uid'),'1');
		$getBuyData = $this->booksad->getListUserAd($this->utilities->getSessionUserData('uid'),'2');
		$data['userbooks'] = $getData;
		$data['userbuybooks'] = $getBuyData;
		$this->layouts->dbview('dashboard/userbooklist',$data);
	}
	
	function bookdetails($bookId=''){
		$this->utilities->setserchurl('',true);
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		//$extraHead .= "setusermenu('listad');";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Book details!');
		$this->layouts->set_page_title('Book details','<i class="glyphicon glyphicon-book"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		if($bookId){
			$getData = $this->booksad->getBookDetails($bookId);
			$data['boodata'] = $getData;
			$data['contactCnt'] = $this->utilities->numUsersContact($bookId);
			$this->layouts->dbview('dashboard/viewbookdetails',$data);
		}else{
			redirect('postyouradd/listuseradsetails');
		}
	}
	
	function updatebookform($bookId=''){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('listad');";
		$extraHead .= "$('#published').datepicker({'dateFormat':'mm-dd-yy'})";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Book list!');
		$this->layouts->set_page_title('Book list','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		if($bookId){
			$getData = $this->booksad->getBookDetails($bookId);
			$data['boodata'] = $getData;
			$this->layouts->dbview('dashboard/updatebookdetails',$data);
		}else{
			redirect('postyouradd/listuseradsetails');
		}
	}
	
	function updatebookdata($bookId=""){
		$getData = $this->booksad->getBookDetails($bookId);
		$data['boodata'] = $getData;
		
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('leftsellbooks');";
		$this->layouts->set_extra_head($extraHead);

		$this->layouts->set_title('Add your post!');
		$this->layouts->set_page_title('Post your ad','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		// set form validation rules
		$this->form_validation->set_rules('name', 'Title', 'trim|required|xss_clean|max_length[255]');
		$this->form_validation->set_rules('isbn10', 'ISBN 10', 'trim|integer|required|xss_clean|max_length[11]');
		$this->form_validation->set_rules('isbn13', 'ISBN 13', 'trim|integer|required|xss_clean|max_length[11]');
		$this->form_validation->set_rules('authors', 'Authors', 'trim|required|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('condition', 'Condition of book', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('discription', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('image', 'Image', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$getData = $this->booksad->getBookDetails($bookId);
			$data['boodata'] = $getData;
			$this->layouts->dbview('dashboard/updatebookdetails',$data);
		}else{
			$bookData = $this->input->post();
			$bookData['date_updated'] = date('Y-m-d H:i:s');
			$bookData['published'] = $this->utilities->convertDateFormatForDbase($bookData['published']);
			$bookData['updated_by'] = $this->utilities->getSessionUserData('uid');
			$bookUpdate = $this->commonModel->updateRecord('books',$bookData,array('id'=>$bookId));
			if($bookUpdate){
				redirect('postyouradd/bookdetails/'.$bookId.'/'.$this->utilities->cleanurl($getData['title']));
			}else{
				$this->layouts->dbview('dashboard/updatebookdetails',$data);
			}
		}
	}
	
}