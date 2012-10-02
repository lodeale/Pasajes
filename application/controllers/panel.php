<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->_isLogin();
		$this->load->model("panel_model");
	}

	function _isLogin(){
 		$test = $this->session->userdata('loginTrue');
 		if($test != TRUE):
 			redirect("inicio");
 		endif;
 	}

    public function index()
    {
    	$this->load->view("include/header");
    	$this->load->view("include/sidebar");
        $this->load->view("main_view");
    }

    public function clientes(){
    	$data["clientes"] = $this->panel_model->getPersonas();
    	$data["pais"] = $this->panel_model->getPais();
    	$data["provincia"] = $this->panel_model->getProvincia();
    	
    	$this->load->view("include/header");
    	$this->load->view("include/sidebar");
        $this->load->view("clientes/add",$data);	
    }

    public function modClientes($id){
    	$data["clientes"] = $this->panel_model->getClientes($id);
    	$data["pais"] = $this->panel_model->getPais();
    	$data["provincia"] = $this->panel_model->getProvincia();
    	
    	$this->load->view("include/header");
    	$this->load->view("include/sidebar");
        $this->load->view("clientes/mod",$data);
    }

    public function addCliente(){
    	if($this->panel_model->insertCliente($this->input->post())):
 			redirect("panel","refresh");
 		else:
 			exit("Error");
 		endif;
    }

    public function updateCliente(){
        if($this->panel_model->updateCliente($this->input->post())):
            redirect("panel/clientes","refresh");
        else:
            exit("error2");
        endif;
    }

    public function delCliente($id){
        if($this->panel_model->delCliente($id)):
            redirect("panel/clientes","refresh");
        else:
            exit("Error");
        endif;
    }

    function salir(){
 		$this->session->sess_destroy();
 		redirect("inicio");
 	}

}

/* End of file panel.php */
/* Location: ./application/controllers/panel.php */
