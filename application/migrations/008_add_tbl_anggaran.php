<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_anggaran extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_anggaran' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'id_klien' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'id_project' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'id_bulan' => array(
                'type' => 'INT',
            ),
            'tahun' => array(
                'type' => 'INT',
            ),
        ));
        $this->dbforge->add_key('id_pos', TRUE);
        $this->dbforge->create_table('tbl_anggaran');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_anggaran');
    }

}
