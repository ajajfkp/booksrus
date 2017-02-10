<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->utilities->validateSession();
		$this->load->model('messages/messages');
		$this->utilities->checkUnivApr();
	}
	
	function index(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('listad');";
		$extraHead .= "$('#published').datepicker({'dateFormat':'mm-dd-yy'})";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Book list!');
		$this->layouts->set_page_title('Book list','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$data['test'] = "";
		$data['inboxMsgs'] = $this->messages->inbox($this->utilities->getSessionUserData('uid'));
		$data['sentMsgs'] = $this->messages->sent($this->utilities->getSessionUserData('uid'));
		$this->layouts->dbview('messages/listmessages',$data);
		
	}
	
	function send(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('listad');";
		$extraHead .= "$('#published').datepicker({'dateFormat':'mm-dd-yy'})";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Book list!');
		$this->layouts->set_page_title('Book list','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$data['test'] = "";
		$data['inboxMsgs'] = $this->messages->inbox($this->utilities->getSessionUserData('uid'));
		$data['sentMsgs'] = $this->messages->sent($this->utilities->getSessionUserData('uid'));	
		$this->layouts->dbview('messages/listsentmessages',$data);
		
	}
	
	function showmessages($transId=""){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('listad');";
		$extraHead .= "$('#published').datepicker({'dateFormat':'mm-dd-yy'})";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Book list!');
		$this->layouts->set_page_title('Book list','<i class="glyphicon glyphicon-plus"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$data['test'] = "";
		$data['inboxMsgs'] = $this->messages->inbox($this->utilities->getSessionUserData('uid'));
		$data['transdetail'] = $this->messages->getTransactionDeatils($transId);
		$this->layouts->dbview('messages/viewmessage',$data);
	}
	
}