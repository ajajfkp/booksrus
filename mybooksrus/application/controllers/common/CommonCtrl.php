<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CommonCtrl extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->utilities->validateSession();
		$this->load->library('sendemail');
		$this->load->library('Layouts');
	}
	public function index(){
		echo "SUCCESS!!!";die;
	}
	
	public function getCityByStateIdDd(){
		$stateId = $this->input->post('stateid');
		if($stateId){
			$cityObj = $this->utilities->getAllCity($stateId);
			
			if($cityObj){
				$cityOption = "<option value=''>Select City</option>";
				foreach($cityObj as $city){
					$cityOption .= "<option value='".$city->id."'>".$city->name."</option>";
				}
				echo $cityOption;
			}else{
				echo "false";
			}
		}else{
			echo "false";
		}
	}
	
	public function getUniListByStateId(){
		$stateId = $this->input->post('stateid');
		if($stateId){
			$uniObj = $this->utilities->getListUnivesityByStatteId($stateId);
			
			if($uniObj){
				$uniOption = "<option value=''>Select University</option>";
				foreach($uniObj as $uni){
					$uniOption .= "<option value='".$uni->id."'>".$uni->name."</option>";
				}
				$uniOption .= "<option value='-2'>Other</option>";
				echo $uniOption;
			}else{
				echo "false";
			}
		}else{
			echo "false";
		}
	}
	
	public function adduseruniv() {
		$this->layouts->set_title('Complete profile!');
		$this->layouts->set_page_title('University','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		$data['name']=ucfirst($this->session->userdata('uname'));
		
		$this->layouts->dbview('users/adduserUniv',$data);
	}
	
	public function addusersuniv() {
		$this->layouts->set_title('Add user university!');
		$this->layouts->set_page_title('University','<i class="glyphicon glyphicon-home"></i>');
		$this->layouts->add_include('assets/js/main.js')->add_include('assets/css/coustom.css');
		
		
		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules("university", "University", "trim|required|xss_clean");

		if ($this->form_validation->run() == FALSE) {
			$data['name']=ucfirst($this->session->userdata('uname'));
			$this->layouts->dbview('users/adduserUniv', $data);
		}else{
			$getInpDataArr = $this->input->post();
			if($getInpDataArr){
				$dataArr = array(
					'university'=>$this->session->userdata('uid'),
					'updated_by'=>$getInpDataArr['university'],
					'updated_by'=>date("Y-m-d H:i:s")
				);
				
				$updRec = $this->commonModel->updateRecord('user_profile',$dataArr,array("users_id"=>$this->session->userdata('uid')));
				
				if($updRec){
					$updRec = $this->commonModel->updateRecord('users',array("university_flag"=>'1'),array("id"=>$this->session->userdata('uid')));
					if($updRec){
						redirect('dashboard/index');
					}else{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">ERROR!..Something is wrong!</div>');
					redirect('common/commonctrl/adduseruniv');
					}
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">ERROR!..Something is wrong!</div>');
					redirect('common/commonctrl/adduseruniv');
				}
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">ERROR!..Something is wrong!</div>');
				redirect('common/commonctrl/adduseruniv');
			}
		}
	}
	
	public function openuserunivaddform(){
		echo $this->load->view('users/useradduniv',array(),true);
	}
	
	public function addunivbyuser(){
		$inputData = $this->input->post();
		if($inputData){
			$data = array(
				"name"=>$inputData['name'],
				"nickname"=>$inputData['nickname'],
				"website"=>$inputData['website'],
				"state"=>$inputData['uni_state'],
				"city"=>$inputData['city'],
				"active_flag"=>'1',
				"added_by"=>$this->session->userdata('uid'),
				'date_added'=>date("Y-m-d H:i:s")
			);
			
			$insData = $this->commonModel->insertRecord('universities',$data);
			if($insData){
				$uniObj = $this->utilities->getListUnivesityByStatteId($inputData['uni_state']);
				if($uniObj){
					$uniOption = "<option value=''>Select University</option>";
					foreach($uniObj as $uni){
						$uniOption .= "<option value='".$uni->id."'".(($uni->id==$insData)?'selected':'').">".$uni->name."</option>";
					}
					$uniOption .= "<option value='-2'>Other</option>";
					echo $uniOption;
				}
			}else{
				echo "fail";
			}
		}else{
			echo "fail";
		}
	}
	
	
	
	
	
	
	
	
	
	
}