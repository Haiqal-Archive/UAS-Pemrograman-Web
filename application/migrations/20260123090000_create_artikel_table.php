<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_artikel_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'judul' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'konten' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'tanggal_dibuat' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('artikel');

        // Optional seed data
        $data = array(
            array(
                'judul' => 'Hello World',
                'slug' => 'hello-world',
                'konten' => 'This is my first article.',
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            ),
            array(
                'judul' => 'Welcome to CodeIgniter',
                'slug' => 'welcome-to-codeigniter',
                'konten' => 'CodeIgniter is a powerful PHP framework.',
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            )
        );
        $this->db->insert_batch('artikel', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('artikel', TRUE);
    }
}
