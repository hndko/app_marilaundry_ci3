<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Initial_Schema extends CI_Migration
{

    public function up()
    {
        // 1. Users Table
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'username' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'email' => array('type' => 'VARCHAR', 'constraint' => '100', 'unique' => TRUE),
            'password' => array('type' => 'VARCHAR', 'constraint' => '255'),
            'role' => array('type' => 'ENUM("super_admin","admin","operator","owner")', 'default' => 'operator'),
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        // Seed Users
        $data = array(
            array(
                'username' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role' => 'super_admin'
            ),
            array(
                'username' => 'Admin',
                'email' => 'admin@example.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role' => 'admin'
            ),
            array(
                'username' => 'Operator',
                'email' => 'operator@example.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role' => 'operator'
            ),
            array(
                'username' => 'Owner',
                'email' => 'owner@example.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role' => 'owner'
            ),
        );
        $this->db->insert_batch('users', $data);


        // 2. Customers Table
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'name' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'phone' => array('type' => 'VARCHAR', 'constraint' => '20'),
            'address' => array('type' => 'TEXT', 'null' => TRUE),
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('customers');

        // 3. Services Table
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'name' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'price' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'unit' => array('type' => 'ENUM("kg","pcs")', 'default' => 'kg'),
            'estimation_duration' => array('type' => 'INT', 'comment' => 'Duration in hours'),
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('services');

        // Seed Basic Services
        $services = array(
            array('name' => 'Cuci Kering', 'price' => 5000, 'unit' => 'kg', 'estimation_duration' => 48),
            array('name' => 'Cuci Setrika', 'price' => 8000, 'unit' => 'kg', 'estimation_duration' => 48),
            array('name' => 'Setrika Saja', 'price' => 4000, 'unit' => 'kg', 'estimation_duration' => 24),
            array('name' => 'Express', 'price' => 12000, 'unit' => 'kg', 'estimation_duration' => 6),
        );
        $this->db->insert_batch('services', $services);


        // 4. Orders Table
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'invoice_code' => array('type' => 'VARCHAR', 'constraint' => '50', 'unique' => TRUE),
            'customer_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE),
            'entry_date' => array('type' => 'DATETIME'),
            'estimation_date' => array('type' => 'DATETIME'),
            'status' => array('type' => 'ENUM("diterima","diproses","selesai","diambil")', 'default' => 'diterima'),
            'total_price' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'payment_status' => array('type' => 'ENUM("unpaid","paid")', 'default' => 'unpaid'),
            'payment_method' => array('type' => 'ENUM("cash","transfer","qris","pending")', 'default' => 'pending'),
            'user_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE),
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('orders');

        // 5. Order Details Table
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'order_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE),
            'service_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE),
            'qty' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'price' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'subtotal' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('order_details');

        // 6. Expenses Table
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'date' => array('type' => 'DATE'),
            'category' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'amount' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'description' => array('type' => 'TEXT', 'null' => TRUE),
            'user_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE),
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('expenses');

        // 7. Settings Table
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'key' => array('type' => 'VARCHAR', 'constraint' => '50', 'unique' => TRUE),
            'value' => array('type' => 'TEXT', 'null' => TRUE),
            'description' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('settings');

        // Seed Settings
        $settings = array(
            array('key' => 'app_name', 'value' => 'MariLaundry', 'description' => 'Nama Aplikasi'),
            array('key' => 'wa_api_key', 'value' => '', 'description' => 'API Key WhatsApp Gateway'),
            array('key' => 'wa_template_accepted', 'value' => 'Halo Kak 👋\nLaundry dengan kode {invoice} sedang diproses.\nEstimasi selesai: {estimation}\nTerima kasih 🙏', 'description' => 'Template Pesan Order Diterima'),
            array('key' => 'wa_template_process', 'value' => 'Halo Kak 👋\nLaundry dengan kode {invoice} sedang dikerjakan.', 'description' => 'Template Pesan Order Diproses'),
            array('key' => 'wa_template_ready', 'value' => 'Halo Kak 👋\nLaundry dengan kode {invoice} sudah selesai dan bisa diambil.\nTotal tagihan: {total}\nTerima kasih 🙏', 'description' => 'Template Pesan Order Selesai'),
            array('key' => 'wa_template_taken', 'value' => 'Halo Kak 👋\nLaundry dengan kode {invoice} sudah diambil.\nTerima kasih telah mempercayakan laundry Anda kepada kami 🙏', 'description' => 'Template Pesan Order Diambil'),
        );
        $this->db->insert_batch('settings', $settings);
    }

    public function down()
    {
        $this->dbforge->drop_table('settings');
        $this->dbforge->drop_table('expenses');
        $this->dbforge->drop_table('order_details');
        $this->dbforge->drop_table('orders');
        $this->dbforge->drop_table('services');
        $this->dbforge->drop_table('customers');
        $this->dbforge->drop_table('users');
    }
}
