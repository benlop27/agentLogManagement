<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estado extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * guardarEstado
     * Recibe la información de un estado, y la persiste en BD
     * @param Object $data Objeto con propiedades identicas a la tabla estado* */
    public function guardarEstado($data) {
        return $this->db->insert('estado', $data);
    }

    /**
     * recuperaEstado
     * setea en el userdata de la sesión la fecha del último estado registrado en la DB
     * del empleado cuya id se settea en el inicio de sesión * */
    public function recuperaEstado() {
        $this->db->select('fecha_estado');
        $this->db->from('estado');
        $this->db->where('id_empleado', $this->session->userdata('id_empleado'));
        $this->db->order_by('id_estado', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $this->session->set_userdata('fecha_ultimo_estado', $row->fecha_estado);
        }
    }

}

/* End of file estado.php */
/* Location: ./application/models/estado.php */