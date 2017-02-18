<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('Layouts');
		$this->load->library('sendemail');
		$this->utilities->validateSession();
		$this->load->model('messages/messages');
		$this->utilities->checkUnivApr();
	}
	
	function index(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('messages');";
		$extraHead .= "$('#published').datepicker({'dateFormat':'mm-dd-yy'})";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Messages!');
		$this->layouts->set_page_title('Inbox Messages','<i class="glyphicon glyphicon-inbox"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$data['test'] = "";
		$data['inboxMsgs'] = $this->messages->inbox($this->utilities->getSessionUserData('uid'));
		$data['sentMsgs'] = $this->messages->sent($this->utilities->getSessionUserData('uid'));
		$this->layouts->dbview('messages/listmessages',$data);
		
	}
	
	function sent(){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('messages');";
		$extraHead .= "$('#published').datepicker({'dateFormat':'mm-dd-yy'})";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('Messages!');
		$this->layouts->set_page_title('Sent Messages','<i class="glyphicon glyphicon-envelope"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		$data['test'] = "";
		$data['inboxMsgs'] = $this->messages->inbox($this->utilities->getSessionUserData('uid'));
		$data['sentMsgs'] = $this->messages->sent($this->utilities->getSessionUserData('uid'));	
		$this->layouts->dbview('messages/listsentmessages',$data);
		
	}
	
	function showmessages($transId="",$type='inbox'){
		$extraHead = "activateHeadMeanu('topdashboard');";
		$extraHead .= "activateLeftMeanu('');";
		$extraHead .= "setusermenu('messages');";
		$extraHead .= "$('#published').datepicker({'dateFormat':'mm-dd-yy'})";
		$this->layouts->set_extra_head($extraHead);
		$this->layouts->set_title('View Messages!');
		$this->layouts->set_page_title('View Message','<i class="glyphicon glyphicon-pencil"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$getMsgIds = $this->commonModel->getRecord('messages','id',array('transaction_id'=>$transId),array(),null,null,'array',1);
		foreach($getMsgIds as $msgid){
			$this->commonModel->updateRecord('messages_maped',array('is_read'=>'0'),array('message_id'=>$msgid['id'],'to_addr'=>$this->utilities->getSessionUserData('uid')));
		}
		
		if($type=='inbox'){
			$data['typeInbox']='active';
		}else{
			$data['typeInbox']='';
		}
		
		if($type=='sent'){
			$data['typeSent']='active';
		}else{
			$data['typeSent']='';
		}
		
		$data['type']=$type;
		$data['transId']=$transId;
		//$data['inboxMsgs'] = $this->messages->inbox($this->utilities->getSessionUserData('uid'));
		$data['transdetail'] = $this->messages->getTransactionDeatils($transId);
		$data['chats'] = $this->messages->getChatBytransId($transId);
		$this->layouts->dbview('messages/viewmessage',$data);
	}
	
	function replymsg(){
		$msg = $this->input->post('inputmsg');
		$transId = $this->input->post('transId');
		if($msg && $transId){
			$this->db->trans_start();
			$gettransData = $this->commonModel->getRecord('books_transaction','*',array('id'=>$transId,'active_status'=>'1'));
			$getbookData = $this->commonModel->getRecord('books','*',array('id'=>$gettransData['book_id'],'active_status'=>'1'));
			
			if($this->utilities->getSessionUserData('uid')==$gettransData['added_by']){
				$to=$getbookData['added_by'];
			}else{
				$to=$gettransData['added_by'];
			}
			
			$messageInsArr = array(
				'transaction_id'=>$gettransData['id'],
				'subject'=>$getbookData['name'],
				'body'=>$this->input->post('inputmsg'),
				'added_by'=>$this->utilities->getSessionUserData('uid'),
				'date_added'=>date('Y-m-d H:i:s')
			);
			$messageIns = $this->commonModel->insertRecord('messages',$messageInsArr);
			$mapInsArrForSeller = array(
				'message_id'=>$messageIns,
				'to_addr'=>$to,
				'added_by'=>$this->utilities->getSessionUserData('uid'),
				'date_added'=>date('Y-m-d H:i:s')
			);
			$this->commonModel->insertRecord('messages_maped',$mapInsArrForSeller);
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				echo "false";
			}else{
				$this->db->trans_complete();
				$getUserData = $this->commonModel->getRecord('users','*',array('id'=>$to));
				$timeDiff = $this->utilities->getLastActiveTimeDiff($to);
				if($timeDiff > 15){
					$verifyUrl = MSG_CONVER_URL . $transId."/inbox";
					$data['msgurl'] = array('verifyurl'=>$verifyUrl);
					$emailMsg = $this->load->view('messages/emailmsg',$data,true);
					$emailData = array(
						'to'=>$getUserData['email'],
						'from'=>EMAIL_FROM,
						'subject'=>'You have new messages about your Ad',
						'from_name'=>EMAIL_FROM_NAME,
						'message'=>$emailMsg
					);
					$send = $this->sendemail->emailSend($emailData);
				}
				
				
				$data['msgsnipt']=$this->messages->getChatById($messageIns);
				echo $this->load->view('messages/messagesnipts',$data,true);
			}
		}else{
			echo 'false';
		}
	}
	
	function deletemsg(){
		$transId = $this->input->post('transId');
		$types = $this->input->post('types');
		if($transId){
			$msgIds = $this->commonModel->getRecord('messages','id',array('transaction_id'=>$transId),array(),null,null,'array',1);
			if($msgIds){
				foreach($msgIds as $msgId){
					if($types=='inbox'){
						$this->commonModel->updateRecord('messages_maped',array('del_reciver'=>$this->utilities->getSessionUserData('uid')),array('message_id'=>$msgId['id'],'added_by !='=>$this->utilities->getSessionUserData('uid')));
					}
					if($types=='sent'){
						$this->commonModel->updateRecord('messages_maped',array('del_sender'=>$this->utilities->getSessionUserData('uid')),array('message_id'=>$msgId['id'],'added_by'=>$this->utilities->getSessionUserData('uid')));
					}
				}
			}else{
				echo "false";
			}
		}else{
			echo "false";
		}
	}
	
	
}