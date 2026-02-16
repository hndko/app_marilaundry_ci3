<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		auth_middleware();
		$this->load->model('Service_model');
	}

	public function index()
	{
		$data['title'] = 'Layanan';
		$data['services'] = $this->Service_model->get_all();
		$this->_render('backend/services/index', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Layanan';
		$this->_render('backend/services/create', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('name', 'Nama Layanan', 'required|trim');
		$this->form_validation->set_rules('price', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('unit', 'Satuan', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'unit' => $this->input->post('unit'),
			];
			$this->Service_model->insert($data);
			$this->session->set_flashdata('success', 'Layanan berhasil ditambahkan!');
			redirect('services');
		}
	}

	public function show($id)
	{
		$data['title'] = 'Detail Layanan';
		$data['service'] = $this->Service_model->get_by_id($id);

		if (!$data['service']) {
			$this->session->set_flashdata('error', 'Layanan tidak ditemukan!');
			redirect('services');
		}

		$this->_render('backend/services/show', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Layanan';
		$data['service'] = $this->Service_model->get_by_id($id);

		if (!$data['service']) {
			$this->session->set_flashdata('error', 'Layanan tidak ditemukan!');
			redirect('services');
		}

		$this->_render('backend/services/edit', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('name', 'Nama Layanan', 'required|trim');
		$this->form_validation->set_rules('price', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('unit', 'Satuan', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'unit' => $this->input->post('unit'),
			];
			$this->Service_model->update($id, $data);
			$this->session->set_flashdata('success', 'Layanan berhasil diperbarui!');
			redirect('services');
		}
	}

	public function delete($id)
	{
		$this->Service_model->delete($id);
		$this->session->set_flashdata('success', 'Layanan berhasil dihapus!');
		redirect('services');
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
