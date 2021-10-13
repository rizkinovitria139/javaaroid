<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

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
}

/* End of file User_model.php */
