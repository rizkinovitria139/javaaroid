<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model', 'm_user');
        // $this->m_user->checkAuth();
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/loginuser');
            $this->load->view('templates/auth_footer');
        } else {
            //jika validasi berhasil
            $this->loginuser();
        }
    }

    private function loginuser()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika usernya ada
        if ($user) {

            if ($user['is_active'] == 1) {
                // cek password
                if ($password == $user['password']) {

                    if ($user['role'] == 'admin') {
                        $data = [
                            'username' => $user['username'],
                            'role' => $user['role'],
                            'nama' => $user['nama'],
                            // 'tempat_lahir' => $user['tempat_lahir'],
                            // 'tanggal_lahir' => $user['tanggal_lahir'],
                            // 'jenis_kelamin' => $user['jenis_kelamin'],
                            'alamat' => $user['alamat'],
                            'no_telp' => $user['no_telp'],
                            'email' => $user['email'],
                            'password' => $user['password'],
                            'username' => $user['username'],
                            'loginAs' => 'admin'
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');
                    } elseif ($user['role'] == 'user') {
                        $data = [
                            'username' => $user['username'],
                            'role' => $user['role'],
                            'nama' => $user['nama'],
                            // 'tempat_lahir' => $user['tempat_lahir'],
                            // 'tanggal_lahir' => $user['tanggal_lahir'],
                            // 'jenis_kelamin' => $user['jenis_kelamin'],
                            'alamat' => $user['alamat'],
                            'no_telp' => $user['no_telp'],
                            'email' => $user['email'],
                            'password' => $user['password'],
                            'username' => $user['username'],
                            'loginAs' => 'user'
                        ];
                        $this->session->set_userdata($data);
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
                    redirect('auth');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}

/* End of file Auth.php */
