<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_model extends CI_Model {

	//$this->db->

    function insertCliente($post){
    	$this->db->set("nombre",$post["nombre"]);
    	$this->db->set("apellido",$post["apellido"]);
    	$this->db->set("direccion",$post["dire"]);
    	$this->db->set("dni",$post["dni"]);
    	$this->db->set("cel",$post["cel"]);
    	$this->db->set("provincia",(int)$post["provincia"]);
    	$this->db->set("id_pais",(int)$post["pais"]);
    	$query = $this->db->insert("personas");
      	$id = $this->db->insert_id();
    	if($query):
	        $this->db->set("id_persona",$id);
	        $this->db->set("detalle",$post["detalle"]);
	        $this->db->set("fecha",date("Y-m-d",time()));
	        $this->db->set("hora",date("H:i:s",time()));
	        $query2 = $this->db->insert("clientes");
	        if($query2):
	          return true;
	        else:
	          return false;
	        endif;
    	else:
    		return false;
    	endif;
    }

    public function getClientes($id){
        $this->db->select("p.id, p.nombre, p.apellido, p.dni, p.cel, p.direccion, p.provincia, p.id_pais, c.id_cliente, c.detalle, c.fecha, c.hora");
        $this->db->from("clientes as c, personas as p");

        if($id != null):
            $this->db->where("p.id = ".$id);
        endif;
        
        $this->db->where("c.id_persona = p.id");
        $this->db->order_by("apellido","desc");
        $query = $this->db->get();
        if($query):
            return $query->result();
        else:
            return false;
        endif;
    }

    public function updateCliente($post){
        $this->db->set("nombre",$post["nombre"]);
        $this->db->set("apellido",$post["apellido"]);
        $this->db->set("dni",$post["dni"]);
        $this->db->set("cel",$post["cel"]);
        $this->db->set("direccion",$post["dire"]);
        $this->db->set("provincia",$post["provincia"]);
        $this->db->set("id_pais",$post["pais"]);

        $this->db->where("id",$post["id"]);
        $query = $this->db->update("personas");

        if($query):
            $this->db->set("detalle",$post["detalle"]);
            $this->db->where("id_persona",$post["id"]);
            $query2 = $this->db->update("clientes");
            if($query2):
                return true;
            else:
                return false;
            endif;
        endif;
    }

    public function delCliente($id){
        $query = $this->db->delete("personas",array("id" => $id));
        if($query):
            return true;
        else:
            return false;
        endif;
    }

    public function getPersonas($id=null){
    	$this->db->from("personas");

    	if($id != null):
    		$this->db->where("id = ".$id);
    	endif;
    	
    	$this->db->order_by("apellido","desc");
    	$query = $this->db->get();
    	if($query):
    		return $query->result();
    	else:
    		return false;
    	endif;
    }

    public function getPais(){
    	$query = $this->db->get("pais");
    	if($query):
    		return $query->result();
    	else:
    		return false;
    	endif;
    }

     public function getProvincia(){
    	$query = $this->db->get("provincia");
    	if($query):
    		return $query->result();
    	else:
    		return false;
    	endif;
    }

}

/* End of file panel_model.php */
/* Location: ./application/models/panel_model.php */
