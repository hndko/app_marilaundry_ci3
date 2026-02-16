<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth_middleware();
        $this->load->model('Customer_model');
    }

    public function index()
    {
        $data['title'] = 'Data Pelanggan';
        $data['customers'] = $this->Customer_model->get_all();
        $this->_render('backend/customers/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pelanggan';
        $this->_render('backend/customers/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'Nama Pelanggan', 'required|trim');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('address', 'Alamat', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
            ];
            $this->Customer_model->insert($data);
            $this->session->set_flashdata('success', 'Pelanggan berhasil ditambahkan!');
            redirect('customers');
        }
    }

    public function show($id)
    {
        $data['title'] = 'Detail Pelanggan';
        $data['customer'] = $this->Customer_model->get_by_id($id);

        if (!$data['customer']) {
            $this->session->set_flashdata('error', 'Pelanggan tidak ditemukan!');
            redirect('customers');
        }

        $this->_render('backend/customers/show', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pelanggan';
        $data['customer'] = $this->Customer_model->get_by_id($id);

        if (!$data['customer']) {
            $this->session->set_flashdata('error', 'Pelanggan tidak ditemukan!');
            redirect('customers');
        }

        $this->_render('backend/customers/edit', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Nama Pelanggan', 'required|trim');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('address', 'Alamat', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
            ];
            $this->Customer_model->update($id, $data);
            $this->session->set_flashdata('success', 'Pelanggan berhasil diperbarui!');
            redirect('customers');
        }
    }

    public function delete($id)
    {
        $this->Customer_model->delete($id);
        $this->session->set_flashdata('success', 'Pelanggan berhasil dihapus!');
        redirect('customers');
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
