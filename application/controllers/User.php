<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/user_header');
        $this->load->view('templates/user_sidebar');
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/index');
        $this->load->view('templates/user_footer');
    }
}

/* End of file User.php */
