<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Dashboard_Supervisor_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index(){

		// añadir si la sesion no existe. redirigir a inicio
		if ($this->session->userdata('loged') && $this->session->userdata('id_cargo')==2) {
		try{
			$this->empleados_estados();
		}
		catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}	}
	
		else{
			redirect('login_Controller','refresh');
		}
	

	}	

	public function output($output = null)
	{
		$this->load->view('dashboard_Supervisor.php',(array)$output);
	}




public function empleados_estados(){
		$crud = new grocery_CRUD();

		$crud->set_table('estado');
		$crud->unset_add();
		$crud->set_subject('estado');

		$crud->set_relation('id_tipo_estado','tipo_estado','nombre_tipo_estado');
		$crud->set_relation('id_empleado','empleado','nombre_empleado');
		$this->db->order_by('id_estado', 'desc');
		
		
		$output = $crud->render();

		$this->output($output);
}


}

/* End of file dashboard_Supervisor_Controller.php */
/* Location: ./application/controllers/dashboard_Supervisor_Controller.php */