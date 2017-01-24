<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Postyouradd extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->utilities->validateSession();
		$this->load->model('users/usersModel');
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
		$this->form_validation->set_rules('price', 'Price', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('condition', 'Condition of book', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('discription', 'Description', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->layouts->dbview('dashboard/addpost');
		}else{
			echo "success";
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
	
	
}