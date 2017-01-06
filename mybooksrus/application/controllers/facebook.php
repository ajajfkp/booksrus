<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends CI_Controller {
	function __construct(){
		parent::__construct();
		$fb;
		$this->load->library('facebooksdk');
		$this->load->library('session');
		$this->fb = $this->facebooksdk;
	}
	
	public function login() {
		
		$clb = 'http://localhost/hometutionwala/facebook/callback';
		$url = $this->fb->getLoginUrl($clb);
		echo '<a href="'.$url.'">login with facebook</a>';
		
		//$this->load->view('login');
	}
	
	public function callback() {	
		$fbt = $this->fb->getAccessToken();
		$userNode = $this->fb->getUserData($fbt);
		echo "Welcome !<br><br>";
		echo 'Name: ' . $userNode->getName().'<br>';
		echo 'User ID: ' . $userNode->getId().'<br>';
		echo 'Email: ' . $userNode->getProperty('email').'<br><br>';
		$image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
		echo "Picture<br>";
		echo "<img src='$image' /><br><br>";
		echo '<a href="http://localhost/hometutionwala/facebook/logout">Logout</a>';
	}
	
		// Logout from facebook
	public function logout() {
		// Destroy session
		session_destroy();
		// Redirect to baseurl
		redirect(base_url('facebook/login'));
	}
	
	
}