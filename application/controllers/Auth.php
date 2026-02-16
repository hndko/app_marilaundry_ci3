<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function login()
	{
		$data['title'] = 'Login | MariLaundry';

		$this->load->view('layouts/auth/head', $data);
		$this->load->view('auth/login');
		$this->load->view('layouts/auth/footer');
		$this->load->view('layouts/auth/javascript');
	}

	public function logout()
	{
		// Logout logic
		redirect('auth/login');
	}
}
