<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_sessions_table extends CI_Migration {

    public function up()
    {
        // CodeIgniter 3 default sessions table schema
        $this->dbforge->add_field(array(
            'id' => array('type' => 'VARCHAR', 'constraint' => 128, 'null' => FALSE),
            'ip_address' => array('type' => 'VARCHAR', 'constraint' => 45, 'null' => FALSE),
            'timestamp' => array('type' => 'INT', 'constraint' => 10, 'unsigned' => TRUE, 'default' => 0, 'null' => FALSE),
            'data' => array('type' => 'BLOB', 'null' => FALSE),
        ));
        $this->dbforge->add_key('timestamp');
        $this->dbforge->create_table('ci_sessions', TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('ci_sessions', TRUE);
    }
}
