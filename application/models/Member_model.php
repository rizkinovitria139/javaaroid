<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    private $_tabel = 'member';
    public function get_member()
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('user', 'user.id_user = member.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_member($data)
    {
        return $this->db->insert($this->_tabel, $data);
    }

    public function delete_member($id)
    {
        return $this->db->delete('member', array('id_member' => $id));
    }
}

/* End of file Member_model.php */
