<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo 'Migration successfully run!';
        }
    }

    public function check_users()
    {
        $this->load->database();
        $query = $this->db->get('users');
        foreach ($query->result() as $row) {
            echo "User: " . $row->username . " | Email: " . $row->email . " | Role: " . $row->role . "\n";
        }
    }
}
