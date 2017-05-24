<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario');
		$this->load->helper('url');
		
	}

	public function index(){
		$this->load->view('login');
	}

	public function validate()
	{
		$this->load->helper('form');

		if (!isset($_POST['nickname_usuario'])) {
			$this->index();
			}
			
		else {
				$nickname_usuario =$this->input->post('nickname_usuario');
				$password_usuario = $this->input->post('password_usuario');
				
				$query = $this->usuario->validateUser($nickname_usuario,$password_usuario);


		if ($query->num_rows()>0) {
			$resultado=  new stdClass();
			foreach ($query->result() as $row){
        	$resultado->nickname_usuario = $row->nickname_usuario;
        	$resultado->id_empleado = $row->id_empleado;
        	$resultado->nombre_empleado = $row->nombre_empleado;
        	$resultado->id_cargo = $row->id_cargo;    
        }

			

			$empleadoData = array(
				'nickname_usuario' => $resultado->nickname_usuario,
				'id_empleado' => $resultado ->id_empleado,
				'nombre_empleado' => $resultado->nombre_empleado,
				'id_cargo' => $resultado->id_cargo,
				'loged' => true
			);
			
			$this->session->set_userdata( $empleadoData );

			switch ($resultado->id_cargo) {
				case 1:
					redirect('dashboard_Agente_Controller/','refresh');
					break;
				case 2:
					redirect('dashboard_Supervisor_Controller','refresh');
					break;
				case 3:
					redirect('dashboard_Admin_Controller','refresh');
					break;
				default:
					redirect('login_Controller','refresh');
					break;
			}

			}
			else{
				redirect('login_Controller','refresh');

			}
		

	}


}
		//remover cache, evitar manipulacion ofensiva de usuarios
	function removeCache()
	{
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
	
	public function cerrarSesion(){
		
		session_destroy();
		$this->removeCache();
		redirect('login_Controller','refresh');
	}

}





/* End of file login_Controller.php */
/* Location: ./application/controllers/login_Controller.php */