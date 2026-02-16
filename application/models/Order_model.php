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
        $this->db->select('orders.*, customers.name as customer_name, customers.phone, customers.address');
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
}
