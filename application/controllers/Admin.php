<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Dashboard User';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/admin_footer');
    }

    public function get_new()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

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
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

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
            $this->session->set_flashdata('kelasw_message', '<div class="alert alert-danger" role="alert">Input plants failed!</div>');
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
}

/* End of file Admin.php */
