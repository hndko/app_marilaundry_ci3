<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('settings')->result();
    }

    public function get_by_key($key)
    {
        return $this->db->get_where('settings', ['key' => $key])->row();
    }

    public function update_by_key($key, $value)
    {
        $this->db->where('key', $key);
        return $this->db->update('settings', ['value' => $value]);
    }

    public function get_value($key)
    {
        $setting = $this->get_by_key($key);
        return $setting ? $setting->value : null;
    }
}
