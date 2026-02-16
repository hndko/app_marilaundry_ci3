<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth_middleware();
        $this->load->model('User_model');
    }

    public function index()
    {
        $id = $this->session->userdata('user_id');
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->User_model->get_by_id($id);
        $this->_render('backend/profile/index', $data);
    }

    public function update()
    {
        $id = $this->session->userdata('user_id');

        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password Baru', 'required|min_length[5]');
            $this->form_validation->set_rules('pass_conf', 'Konfirmasi Password', 'required|matches[password]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->input->post('password')) {
                $data['password'] = $this->input->post('password');
            }

            $this->User_model->update($id, $data);

            // Update session if username/fullname changed
            $this->session->set_userdata('fullname', $data['fullname']);
            $this->session->set_userdata('username', $data['username']);

            $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
            redirect('profile');
        }
    }

    private function _render($view, $data)
    {
        $this->load->view('layouts/backend/head', $data);
        $this->load->view('layouts/backend/navbar');
        $this->load->view('layouts/backend/sidebar');
        $this->load->view($view, $data);
        $this->load->view('layouts/backend/footer');
        $this->load->view('layouts/backend/javascript');
    }
}
