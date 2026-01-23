<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_user_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '191',
                'unique' => TRUE,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'role' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user', TRUE);

        // Seed an admin user if not exists
        $query = $this->db->get_where('user', ['username' => 'admin@example.com']);
        if (!$query->row_array()) {
            $this->db->insert('user', array(
                'nama' => 'Administrator',
                'username' => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_BCRYPT),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ));
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('user', TRUE);
    }
}
