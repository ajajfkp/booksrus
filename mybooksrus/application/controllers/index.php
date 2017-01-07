<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Index extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->library('Layouts');

		$this->load->library('session');

		$this->load->library('utilities');

		$this->load->library('form_validation');

		$this->load->library('email');

		

		$this->load->helper('form');

		

		$this->load->model('auth/auths');

	}

	

	public function index() {

		$this->layouts->set_title('welcome!');

		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');

		$this->layouts->view('home/main_page');

	}

	

	public function about() {

		$this->layouts->set_title('About!');

		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');

		$this->layouts->view('home/about');

	}

	

	public function contact() {

		$this->layouts->set_title('Contact!');

		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');

		$this->layouts->view('home/contact');

	}

	

	

	

	

}