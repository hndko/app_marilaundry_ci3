<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		auth_middleware();
		// Only Admin and Super Admin can access user management
		$user = current_user();
		if (!in_array($user->role, ['admin', 'super_admin'])) {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			redirect('dashboard');
		}
		$this->load->model('User_model');
	}

	public function index()
	{
		$data['title'] = 'Manajemen Pengguna';
		$data['users'] = $this->User_model->get_all();
		$this->_render('backend/users/index', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Pengguna';
		$this->_render('backend/users/create', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'fullname' => $this->input->post('fullname'),
				'role' => $this->input->post('role'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			$this->User_model->insert($data);
			$this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan!');
			redirect('users');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Pengguna';
		$data['user'] = $this->User_model->get_by_id($id);
		if (!$data['user'] || $data['user']->role == 'super_admin') {
			$this->session->set_flashdata('error', 'Akses ditolak!');
			redirect('users');
		}
		$this->_render('backend/users/edit', $data);
	}

	public function update($id)
	{
		$user = $this->User_model->get_by_id($id);
		if (!$user || $user->role == 'super_admin') {
			$this->session->set_flashdata('error', 'Akses ditolak!');
			redirect('users');
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'fullname' => $this->input->post('fullname'),
				'role' => $this->input->post('role'),
				'updated_at' => date('Y-m-d H:i:s')
			];

			if ($this->input->post('password')) {
				$data['password'] = $this->input->post('password');
			}

			$this->User_model->update($id, $data);
			$this->session->set_flashdata('success', 'Pengguna berhasil diperbarui!');
			redirect('users');
		}
	}

	public function delete($id)
	{
		$user = $this->User_model->get_by_id($id);
		// Prevent deleting self or super_admin
		if ($id == $this->session->userdata('user_id')) {
			$this->session->set_flashdata('error', 'Tidak dapat menghapus akun sendiri!');
		} elseif ($user && $user->role == 'super_admin') {
			$this->session->set_flashdata('error', 'Akun Sistem tidak dapat dihapus!');
		} else {
			$this->User_model->delete($id);
			$this->session->set_flashdata('success', 'Pengguna berhasil dihapus!');
		}
		redirect('users');
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
