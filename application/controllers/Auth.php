<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function login()
	{
		if ($this->session->userdata('user_id')) {
			redirect('dashboard');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login | MariLaundry';
			$this->load->view('layouts/auth/head', $data);
			$this->load->view('auth/login');
			$this->load->view('layouts/auth/footer');
			$this->load->view('layouts/auth/javascript');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->User_model->get_by_username($username);

		if ($user) {
			if (password_verify($password, $user->password)) {
				$data = [
					'user_id' => $user->id,
					'is_logged_in' => true
				];
				$this->session->set_userdata($data);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Wrong password!');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('error', 'User not found!');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('is_logged_in');

		$this->session->set_flashdata('success', 'You have been logged out!');
		redirect('auth/login');
	}
}
