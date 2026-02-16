<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('customers')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('customers', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('customers', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('customers', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('customers');
    }
}
