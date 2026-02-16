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
}
