<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	
public function validateUser($nickname_usuario,$password_usuario){
		
		$this->db->select('usuario.nickname_usuario, usuario.id_empleado, empleado.id_cargo, empleado.nombre_empleado');
		
		$this->db->from('usuario');
		$this->db->join('empleado', 'usuario.id_empleado = empleado.id_empleado');
		$this->db->where('nickname_usuario', $nickname_usuario);
		$this->db->where('password_usuario', $password_usuario);
		$query = $this->db->get();
		return $query;
			
		
}

}
/* End of file usuario.php */
/* Location: ./application/models/usuario.php */