<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expense_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('expenses.*, users.username as user_name');
        $this->db->from('expenses');
        $this->db->join('users', 'users.id = expenses.user_id', 'left');
        $this->db->order_by('date', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_date_range($start_date, $end_date)
    {
        $this->db->select('expenses.*, users.username as user_name');
        $this->db->from('expenses');
        $this->db->join('users', 'users.id = expenses.user_id', 'left');
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->order_by('date', 'ASC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('expenses', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('expenses', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('expenses', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('expenses');
    }
}
