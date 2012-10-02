<?php
class Inicio extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->_isLogin();
		$this->load->model("inicio_model");
	}

	function index(){
		$this->load->view("inicio_view");
	}

	function _isLogin(){
 		$test = $this->session->userdata('loginTrue');
 		if($test):
 			redirect("panel");
 		endif;
 	}

 	function acceder(){
 		$user = $this->input->post("usuario");
 		$pass = $this->input->post("clave");
 		
 		if(!isset($user) && !isset($pass)):
 			redirect("inicio");
 		endif;
 		
 		$query = $this->inicio_model->validarLogin($user,$pass);
 		if($query):
 			foreach($query as $row){
 				$data_session = array(
 							"loginTrue"=>TRUE,
 							"admin"=>$row->privilegio,
 							"id"=>$row->id_user,
 							"user"=>$row->user
 						);
 			}
 			$this->session->set_userdata($data_session);
 			redirect("panel");
 		else:
 			redirect("inicio");
 		endif;
	}

	

}
?>