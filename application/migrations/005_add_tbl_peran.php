<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_peran extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_peran' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'nama_peran' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id_peran', TRUE);
        $this->dbforge->create_table('tbl_peran');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_peran');
    }

}
