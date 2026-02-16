<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select('orders.*, customers.name as customer_name');
		$this->db->from('orders');
		$this->db->join('customers', 'customers.id = orders.customer_id');
		$this->db->order_by('orders.created_at', 'DESC');
		return $this->db->get()->result();
	}

	public function get_by_id($id)
	{
		$this->db->select('orders.*, customers.name as customer_name, customers.phone, customers.phone as customer_phone, customers.address');
		$this->db->from('orders');
		$this->db->join('customers', 'customers.id = orders.customer_id');
		$this->db->where('orders.id', $id);
		$order = $this->db->get()->row();

		if ($order) {
			$order->details = $this->get_details($id);
		}

		return $order;
	}

	public function get_details($order_id)
	{
		$this->db->select('order_details.*, services.name as service_name, services.unit');
		$this->db->from('order_details');
		$this->db->join('services', 'services.id = order_details.service_id');
		$this->db->where('order_details.order_id', $order_id);
		return $this->db->get()->result();
	}

	public function insert($data)
	{
		$this->db->insert('orders', $data);
		return $this->db->insert_id();
	}

	public function insert_detail($data)
	{
		$this->db->insert('order_details', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('orders', $data);
	}

	public function delete($id)
	{
		// Delete details first
		$this->db->where('order_id', $id);
		$this->db->delete('order_details');

		// Delete main order
		$this->db->where('id', $id);
		return $this->db->delete('orders');
	}

	public function generate_invoice()
	{
		$prefix = 'INV-' . date('Ymd') . '-';
		$params = [
			'prefix' => $prefix
		];

		// Count orders today to generate sequence
		$this->db->like('invoice_code', $prefix, 'after');
		$count = $this->db->count_all_results('orders');
		$sequence = str_pad($count + 1, 3, '0', STR_PAD_LEFT);

		return $prefix . $sequence;
	}

	public function get_stats()
	{
		$month = date('m');
		$year = date('Y');

		$stats = [];

		// Orders this month
		$this->db->where('MONTH(created_at)', $month);
		$this->db->where('YEAR(created_at)', $year);
		$stats['total_orders'] = $this->db->count_all_results('orders');

		// Revenue this month (paid only)
		$this->db->select_sum('total_price');
		$this->db->where('MONTH(created_at)', $month);
		$this->db->where('YEAR(created_at)', $year);
		$this->db->where('payment_status', 'paid');
		$stats['revenue'] = $this->db->get('orders')->row()->total_price ?? 0;

		// Unpaid orders
		$this->db->where('payment_status', 'unpaid');
		$stats['unpaid_orders'] = $this->db->count_all_results('orders');

		// Completed orders (ready or taken)
		$this->db->where_in('status', ['selesai', 'diambil']);
		$stats['completed_orders'] = $this->db->count_all_results('orders');

		return $stats;
	}

	public function get_revenue_trend()
	{
		// Last 7 days revenue
		$this->db->select('DATE(created_at) as date, SUM(total_price) as total');
		$this->db->from('orders');
		$this->db->where('created_at >=', date('Y-m-d', strtotime('-6 days')));
		$this->db->where('payment_status', 'paid');
		$this->db->group_by('DATE(created_at)');
		$this->db->order_by('DATE(created_at)', 'ASC');
		return $this->db->get()->result();
	}

	public function get_service_distribution()
	{
		$this->db->select('services.name, COUNT(order_details.id) as count');
		$this->db->from('order_details');
		$this->db->join('services', 'services.id = order_details.service_id');
		$this->db->group_by('services.id');
		$this->db->order_by('count', 'DESC');
		$this->db->limit(5);
		return $this->db->get()->result();
	}

	public function get_recent_orders($limit = 5)
	{
		$this->db->select('orders.*, customers.name as customer_name');
		$this->db->from('orders');
		$this->db->join('customers', 'customers.id = orders.customer_id');
		$this->db->order_by('orders.created_at', 'DESC');
		$this->db->limit($limit);
		return $this->db->get()->result();
	}
}
