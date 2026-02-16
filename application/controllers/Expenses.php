<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expenses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth_middleware();
        $this->load->model('Expense_model');
    }

    public function index()
    {
        $data['title'] = 'Data Pengeluaran';
        $data['expenses'] = $this->Expense_model->get_all();
        $this->_render('backend/expenses/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pengeluaran';
        $this->_render('backend/expenses/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('date', 'Tanggal', 'required');
        $this->form_validation->set_rules('category', 'Kategori', 'required');
        $this->form_validation->set_rules('amount', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('description', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'date' => $this->input->post('date'),
                'category' => $this->input->post('category'),
                'amount' => $this->input->post('amount'),
                'description' => $this->input->post('description'),
                'user_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->Expense_model->insert($data)) {
                $this->session->set_flashdata('success', 'Pengeluaran berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan pengeluaran');
            }
            redirect('expenses');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pengeluaran';
        $data['expense'] = $this->Expense_model->get_by_id($id);

        if (!$data['expense']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('expenses');
        }

        $this->_render('backend/expenses/edit', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('date', 'Tanggal', 'required');
        $this->form_validation->set_rules('category', 'Kategori', 'required');
        $this->form_validation->set_rules('amount', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('description', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'date' => $this->input->post('date'),
                'category' => $this->input->post('category'),
                'amount' => $this->input->post('amount'),
                'description' => $this->input->post('description'),
            ];

            if ($this->Expense_model->update($id, $data)) {
                $this->session->set_flashdata('success', 'Pengeluaran berhasil diperbarui');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui pengeluaran');
            }
            redirect('expenses');
        }
    }

    public function delete($id)
    {
        if ($this->Expense_model->delete($id)) {
            $this->session->set_flashdata('success', 'Pengeluaran berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pengeluaran');
        }
        redirect('expenses');
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
