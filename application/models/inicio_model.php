<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio_model extends CI_Model {

    public function validarLogin($user,$pass) {
		$this->db->select("id_user,user,privilegio");
		$this->db->from("usuarios");
		$this->db->where("user = '$user'");
		$this->db->where("pass = '".sha1($pass)."'");
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->result();
		else:
			return FALSE;
		endif;
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
