<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_pos extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_pos' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'id_kategori' => array(
                'type' => 'INT',
            ),
            'nama_pos' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id_pos', TRUE);
        $this->dbforge->create_table('tbl_pos');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_pos');
    }

}
