<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_admin extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'nama_user' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),
        ));
        $this->dbforge->add_key('username', TRUE);
        $this->dbforge->create_table('tbl_admin');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_admin');
    }

}
