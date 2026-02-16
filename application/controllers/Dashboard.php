<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		auth_middleware();
	}

	public function index()
	{
		$data['page_title'] = 'Dashboard';

		$this->load->view('layouts/backend/head', $data);
		$this->load->view('layouts/backend/navbar');
		$this->load->view('layouts/backend/sidebar');
		$this->load->view('backend/dashboard/index', $data);
		$this->load->view('layouts/backend/footer');
		$this->load->view('layouts/backend/javascript');
	}
}
