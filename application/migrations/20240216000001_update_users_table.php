<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Update_users_table extends CI_Migration
{

    public function up()
    {
        // Add fullname column
        $fields = array(
            'fullname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'after' => 'id'
            ),
        );
        $this->dbforge->add_column('users', $fields);

        // Update data
        // 1. Set fullname = username
        $this->db->query("UPDATE users SET fullname = username");

        // 2. Set username = lowercase and remove spaces
        $users = $this->db->get('users')->result();
        foreach ($users as $user) {
            $new_username = strtolower(str_replace(' ', '', $user->username));
            $this->db->where('id', $user->id);
            $this->db->update('users', ['username' => $new_username]);
        }
    }

    public function down()
    {
        // Revert username (best effort, just capitalize first letter maybe? or leave as is)
        // We can't perfectly revert username format if we lost the original casing/spacing logic distinctively
        // But we can drop the fullname column
        $this->dbforge->drop_column('users', 'fullname');
    }
}
