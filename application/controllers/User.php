<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $this->load->view('user/index');
    }
}

/* End of file User.php */
