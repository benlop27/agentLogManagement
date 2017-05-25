<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dashboard_Agente_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');

        $this->load->database();

        $this->load->library('grocery_CRUD');

        $this->load->model('estado');
    }

    /**
     * output 
     * void
     * metodo para settear el arreglo de datos a la vista dashboard_agente
     * * */
    public function output($output = null) {
        $this->load->view('dashboard_Agente.php', (array) $output);
    }

    /**
     * guardarEstado
     * void
     * este metodo es un handler para el formulario de cambio de estado
     * recibe la información del formulario por $this->input->post() de 
     * CodeIgniter, almacenando todo en un objeto sintetico y llamando el 
     * modelo estado y su metodo guardarEstado(), al cual le envia dicho objeto * */
    public function guardarEstado() {

        $data = new stdClass();
        $data->id_empleado = $this->session->userdata('id_empleado');
        $data->id_tipo_estado = $id_tipo_estado = $this->input->post('id_tipo_estado');
        $data->fecha_estado = $this->input->post('horaActual');
        $data->tiempo_estado = $this->input->post('tiempoTranscurrido');
        $this->estado->guardarEstado($data);

        redirect('dashboard_Agente_Controller', 'refresh');
    }

    /**
     * index()
     * void
     * Es el metodo que se carga por defecto al invocar este controlador
     * si la sesion no existe, o no está autentificado, redirige al controlador
     * login_Controller.
     * * */
    public function index() {
        if ($this->session->userdata('loged')) {
            $crud = new grocery_CRUD();
            $crud->set_table('estado');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_export();
            $crud->where('estado.id_empleado', $this->session->userdata('id_empleado'));
            $crud->set_subject('estado');
            $crud->set_relation('id_tipo_estado', 'tipo_estado', 'nombre_tipo_estado');
            $crud->set_relation('id_empleado', 'empleado', 'nombre_empleado');
            $crud->order_by('id_empleado', 'desc');
            $output = $crud->render();

            $this->output($output);
        } else {

            redirect('login_Controller', 'refresh');
        }
    }

}
