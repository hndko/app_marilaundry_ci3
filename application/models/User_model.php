<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_username($username)
    {
        $this->db->where('username', $username);
        $this->db->or_where('email', $username);
        return $this->db->get('users')->row();
    }

    public function verify_password($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public function get_all()
    {
        return $this->db->get('users')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function insert($data)
    {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $this->db->insert('users', $data);
    }

    public function update($id, $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
