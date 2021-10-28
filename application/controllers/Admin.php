<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/admin_footer');
    }

    public function get_new()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/admin_header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/new');
        $this->load->view('templates/admin_footer');
    }

    public function get_plants()
    {
    }
}

/* End of file Admin.php */
