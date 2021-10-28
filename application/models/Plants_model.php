<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Plants_model extends CI_Model
{

    private $_table = 'plants';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function get_plants()
    {
        $this->db->select('*');
        $this->db->from('plants');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_plants($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function delete_plants($id)
    {
        return $this->db->delete('plants', array('id_plants' => $id));
    }
}

/* End of file Plants_model.php */
