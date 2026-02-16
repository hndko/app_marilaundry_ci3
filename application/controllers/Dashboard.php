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
		$data['title'] = 'Dashboard Analytics';

		$this->load->model('Order_model');
		$data['stats'] = $this->Order_model->get_stats();
		$data['revenue_trend'] = $this->Order_model->get_revenue_trend();
		$data['service_distribution'] = $this->Order_model->get_service_distribution();
		$data['recent_orders'] = $this->Order_model->get_recent_orders(5);

		$this->_render('backend/dashboard/index', $data);
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
