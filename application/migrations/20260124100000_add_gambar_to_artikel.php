<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_gambar_to_artikel extends CI_Migration {

    public function up()
    {
        $fields = array(
            'gambar' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
                'default' => 'default.jpg',
                'after' => 'konten'
            ),
        );
        $this->dbforge->add_column('artikel', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('artikel', 'gambar');
    }
}
