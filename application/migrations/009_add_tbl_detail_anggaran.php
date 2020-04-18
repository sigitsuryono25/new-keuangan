<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_detail_anggaran extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_detail_anggaran' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'id_anggaran' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'id_pos' => array(
                'type' => 'INT',
            ),
            'uraian' => array(
                'type' => 'VARCHAR',
                'constraint'=> '100'
            ),
            'volume' => array(
                'type' => 'INT',
            ),
            'satuan' => array(
                'type' => 'VARCHAR',
                'constraint'=> '100'
            ),
            'harga_satuan' => array(
                'type' => 'DOUBLE',
            ),
        ));
        $this->dbforge->add_key('id_detail_anggaran', TRUE);
        $this->dbforge->create_table('tbl_detail_anggaran');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_detail_anggaran');
    }

}
