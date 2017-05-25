<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dashboard_Admin_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    /**
     * output
     * Metodo que settea información a la vista dashboard_Admin
     * @param array $output arreglo de datos a la vista* */
    public function output($output = null) {
        $this->load->view('dashboard_Admin.php', (array) $output);
    }

    public function index() {
        if ($this->session->userdata('loged')) {

            $this->usuarios();
        } else {
            redirect('login_Controller', 'refresh');
        }
    }

    /**
     * usuarios
     * metodo que carga el crud de los usuarios globales del sistema
     * * */
    public function usuarios() {
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('usuario');
            $crud->set_subject('Usuario');
            $crud->required_fields('id_usuario');
            $crud->field_type('password_usuario', 'password', 14);
            $crud->set_relation('id_empleado', 'empleado', 'nombre_empleado')->display_as('id_empleado', 'Empleado');
            $output = $crud->render();

            $this->output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     * departamentos
     * metodo que carga el crud de los departamentos globales del sistema
     * * */
    public function departamentos() {

        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_table('departamento');
        $crud->set_subject('departamento');

        $output = $crud->render();

        $this->output($output);
    }

    /**
     * areas
     * metodo que carga el crud de los areas globales del sistema
     * * */
    public function areas() {

        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_table('area');
        $crud->set_subject('area');
        $crud->set_relation('id_departamento', 'departamento', 'nombre_departamento')->display_as('id_departamento', 'Departamento');
        $output = $crud->render();

        $this->output($output);
    }

    /**
     * cuentas
     * metodo que carga el crud de las cuentas globales del sistema
     * * */
    public function cuentas() {
        $crud = new grocery_CRUD();

        $crud->set_table('cuenta');

        $crud->set_subject('cuenta');
        $crud->set_relation('id_area', 'area', 'nombre_area')->display_as('id_area', 'Area');

        $output = $crud->render();

        $this->output($output);
    }

    /**
     * empleados
     * metodo que carga el crud de los empleados globales del sistema
     * * */
    public function empleados() {
        $crud = new grocery_CRUD();

        $crud->set_table('empleado');

        $crud->set_subject('empleado');

        $crud->set_relation('id_cargo', 'cargo', 'nombre_cargo')->display_as('id_cargo', 'Cargo');
        $crud->set_relation('id_cuenta', 'cuenta', 'nombre_cuenta')->display_as('id_cuenta', 'Cuenta');

        $output = $crud->render();

        $this->output($output);
    }

    /**
     * empleados_estados
     * void
     * metodo que carga el crud de los estados de los empleados globales del sistema
     * * */
    public function empleados_estados() {
        $crud = new grocery_CRUD();

        $crud->set_table('estado');
        $crud->unset_edit();
        $crud->unset_add();

        $crud->set_subject('estado');
        $crud->set_relation('id_tipo_estado', 'tipo_estado', 'nombre_tipo_estado')->display_as('id_tipo_estado', 'Tipo Estado');
        $crud->set_relation('id_empleado', 'empleado', 'nombre_empleado')->display_as('id_empleado', 'Empleado');


        $crud->order_by('id_estado', 'desc');
        $output = $crud->render();

        $this->output($output);
    }

}
