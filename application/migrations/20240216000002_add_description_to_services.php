<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_description_to_services extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
                'after' => 'name'
            ),
        );
        $this->dbforge->add_column('services', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('services', 'description');
    }
}
