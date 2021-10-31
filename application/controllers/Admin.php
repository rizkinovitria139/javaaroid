<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['username'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Dashboard User';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/admin_footer');
    }

    public function get_new()
    {
        $data['username'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'New - Input';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/new');
        $this->load->view('templates/admin_footer');
    }

    // Begin of plants
    public function get_plants()
    {
        $data['username'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Plants';

        $this->load->model('plants_model', 'plants');
        $data['plants'] = $this->plants->get_plants();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/plants', $data);
        $this->load->view('templates/admin_footer');
    }

    public function add_plants()
    {
        $this->form_validation->set_rules('nama', 'Name of Plants', 'required');
        $this->form_validation->set_rules('jenis', 'Type of Plants', 'required');

        if ($this->form_validation->run() == true) {
            $data['nama'] = $this->input->post('nama');
            $data['jenis'] = $this->input->post('jenis');

            $this->load->model('plants_model', 'plants');
            $this->plants->add_plants($data);
            $this->session->set_flashdata('plants_message', '<div class="alert alert-success" role="alert">Input plants success!</div>');
            redirect('admin/get_plants');
        } else {
            $this->session->set_flashdata('plants_message', '<div class="alert alert-danger" role="alert">Input plants failed!</div>');
            redirect('admin/get_plants');
        }
    }

    public function edit_plants($id)
    {
        $this->db->update('plants', ['nama' => $this->input->post('nama')], ['id_plants' => $id]);
        $this->db->update('plants', ['jenis' => $this->input->post('jenis')], ['id_plants' => $id]);
        $this->session->set_flashdata('plants_message', '<div class="alert alert-success" role="alert">Plants update success!</div>');
        redirect('admin/get_plants', 'refresh');
    }

    public function delete_plants($id)
    {
        $this->load->model('plants_model', 'plants');
        $this->plants->delete_plants($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('plants_message', '<div class="alert alert-success" role="alert">Delete plant success!</div>');
        redirect('admin/get_plants', 'refresh');
    }
    // End of plants

    // Start of user
    public function get_user()
    {
        $data['username'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'User';

        $this->load->model('user_model', 'user');
        $data['user'] = $this->user->get_user();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/user', $data);
        // $this->load->view('templates/admin_footer');
    }

    public function get_user_admin()
    {
        $data['username'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'User';

        $this->load->model('user_model', 'user');
        $data['user'] = $this->user->get_user_admin();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/user', $data);
        // $this->load->view('templates/admin_footer');
    }

    public function get_user_user()
    {
        $data['username'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'User';

        $this->load->model('user_model', 'user');
        $data['user'] = $this->user->get_user_user();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/user', $data);
        // $this->load->view('templates/admin_footer');
    }

    public function add_user()
    {
        $this->form_validation->set_rules('nama', 'Name of User', 'required');
        $this->form_validation->set_rules('alamat', 'Address of User', 'required');
        $this->form_validation->set_rules('no_telp', 'Telp Number of User', 'required');
        $this->form_validation->set_rules('email', 'Email of User', 'required');
        $this->form_validation->set_rules('username', 'Username of User', 'required');
        $this->form_validation->set_rules('password', 'Password of User', 'required');
        $this->form_validation->set_rules('role', 'Role of user', 'required');
        $this->form_validation->set_rules('is_active', 'User activation', 'required');

        if ($this->form_validation->run() == true) {
            $data['nama'] = $this->input->post('nama');
            $data['alamat'] = $this->input->post('alamat');
            $data['no_telp'] = $this->input->post('no_telp');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['role'] = $this->input->post('role');
            $data['is_active'] = $this->input->post('is_active');

            $this->load->model('user_model', 'user');
            $this->user->add_user($data);
            $this->session->set_flashdata('user_message', '<div class="alert alert-success" role="alert">Input user success!</div>');
            redirect('admin/get_user');
        } else {
            $this->session->set_flashdata('user_message', '<div class="alert alert-danger" role="alert">Input user failed!</div>');
            redirect('admin/get_user');
        }
    }

    public function edit_user($id)
    {
        $this->db->update('user', ['nama' => $this->input->post('nama')], ['id_user' => $id]);
        $this->db->update('user', ['alamat' => $this->input->post('alamat')], ['id_user' => $id]);
        $this->db->update('user', ['no_telp' => $this->input->post('no_telp')], ['id_user' => $id]);
        $this->db->update('user', ['email' => $this->input->post('email')], ['id_user' => $id]);
        $this->db->update('user', ['username' => $this->input->post('username')], ['id_user' => $id]);
        $this->db->update('user', ['password' => $this->input->post('password')], ['id_user' => $id]);
        $this->db->update('user', ['role' => $this->input->post('role')], ['id_user' => $id]);
        $this->db->update('user', ['is_active' => $this->input->post('is_active')], ['id_user' => $id]);
        $this->session->set_flashdata('user_message', '<div class="alert alert-success" role="alert">User update success!</div>');
        redirect('admin/get_user', 'refresh');
    }

    public function delete_user($id)
    {
        $this->load->model('user_model', 'user');
        $this->user->delete_user($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('user_message', '<div class="alert alert-success" role="alert">Delete user success!</div>');
        redirect('admin/get_user', 'refresh');
    }

    // End of user

    // Start of member
    public function get_member()
    {
        $data['username'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Member';

        $this->load->model('member_model', 'member');
        $data['member'] = $this->member->get_member();
        $this->load->model('user_model', 'user');
        $data['user'] = $this->user->get_user_user();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/admin_footer');
    }

    public function add_member()
    {
        $this->form_validation->set_rules('nama_member', 'Name of Plants', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');

        if ($this->form_validation->run() == true) {
            $data['nama_member'] = $this->input->post('nama_member');
            $data['user_id'] = $this->input->post('user_id');

            $this->load->model('member_model', 'member');
            $this->member->add_member($data);
            $this->load->model('user_model', 'user');
            $data['user'] = $this->user->get_user_user();
            $this->session->set_flashdata('member_message', '<div class="alert alert-success" role="alert">Input member success!</div>');
            redirect('admin/get_member');
        } else {
            $this->session->set_flashdata('member_message', '<div class="alert alert-danger" role="alert">Input member failed!</div>');
            redirect('admin/get_member');
        }
    }

    public function edit_member($id)
    {
        $this->db->update('member', ['nama_member' => $this->input->post('nama_member')], ['id_member' => $id]);
        $this->db->update('member', ['user_id' => $this->input->post('user_id')], ['id_member' => $id]);
        $this->session->set_flashdata('member_message', '<div class="alert alert-success" role="alert">Member update success!</div>');
        redirect('admin/get_member', 'refresh');
    }

    public function delete_member($id)
    {
        $this->load->model('member_model', 'member');
        $this->member->delete_member($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('member_message', '<div class="alert alert-success" role="alert">Delete member success!</div>');
        redirect('admin/get_member', 'refresh');
    }
    // End of member

}

/* End of file Admin.php */
