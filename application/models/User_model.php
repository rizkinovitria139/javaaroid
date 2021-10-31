<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_tabel = 'user';

    public function checkAccount()
    {
        $loginAs = $this->session->userdata('loginAs');
        if ($loginAs == null) {
            redirect('auth');
        }
    }
    public function checkAuth()
    {
        $loginAs = $this->session->userdata('loginAs');
        if ($loginAs == 'admin') {
            redirect('admin');
        } else if ($loginAs == 'user') {
            redirect('user');
        } else {
            redirect('auth');
        }
    }

    public function get_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_user_admin()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role', 'admin');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_user_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role', 'user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_user($data)
    {
        return $this->db->insert($this->_tabel, $data);
    }

    public function delete_user($id)
    {
        return $this->db->delete('user', array('id_user' => $id));
    }
}

/* End of file User_model.php */
