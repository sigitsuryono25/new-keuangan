<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_bulan extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_bulan' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'nama_bulan' => array(
                'type' => 'varchar',
                'constraint' => '20',
            ),
        ));
        $this->dbforge->add_key('id_bulan', TRUE);
        $this->dbforge->create_table('tbl_bulan');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_bulan');
    }

}
