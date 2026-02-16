<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Seed_Customers extends CI_Migration
{
    public function up()
    {
        $data = array(
            array(
                'name' => 'Budi Santoso',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 10, Jakarta Pusat',
            ),
            array(
                'name' => 'Siti Aminah',
                'phone' => '085678901234',
                'address' => 'Jl. Kebon Jeruk No. 5, Jakarta Barat',
            ),
            array(
                'name' => 'Rudi Hartono',
                'phone' => '087890123456',
                'address' => 'Jl. Diponegoro No. 20, Bandung',
            ),
            array(
                'name' => 'Dewi Lestari',
                'phone' => '081345678901',
                'address' => 'Jl. Malioboro No. 15, Yogyakarta',
            ),
            array(
                'name' => 'Andi Wijaya',
                'phone' => '082156789012',
                'address' => 'Jl. Pahlawan No. 8, Surabaya',
            ),
        );
        $this->db->insert_batch('customers', $data);
    }

    public function down()
    {
        // Ideally we would delete only the seeded rows, but for simplicity in dev we might truncate or delete by these phones
        $phones = array('081234567890', '085678901234', '087890123456', '081345678901', '082156789012');
        $this->db->where_in('phone', $phones);
        $this->db->delete('customers');
    }
}
