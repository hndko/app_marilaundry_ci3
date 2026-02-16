<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth_middleware();
        $this->load->model('Setting_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaturan Aplikasi';
        $settings = $this->Setting_model->get_all();

        $data['settings'] = [];
        foreach ($settings as $s) {
            $data['settings'][$s->key] = $s->value;
        }

        $this->_render('backend/settings/index', $data);
    }

    public function update()
    {
        $settings = $this->input->post();

        $this->db->trans_start();
        foreach ($settings as $key => $value) {
            $this->Setting_model->update_by_key($key, $value);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal memperbarui pengaturan!');
        } else {
            $this->session->set_flashdata('success', 'Pengaturan berhasil diperbarui!');
        }
        redirect('settings');
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
