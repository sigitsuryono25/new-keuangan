<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_project extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_project' => array(
                'type' => 'varchar',
                'constraint' =>'100',
            ),
            'nama_project' => array(
                'type' => 'varchar',
                'constraint' => '100',
            ),
            'anggaran' => array(
                'type' => 'int',
            ),
            'pph' => array(
                'type' => 'int',
            ),
            'ppn' => array(
                'type' => 'int',
            ),
            'id_klien' => array(
                'type' => 'varchar',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id_project', TRUE);
        $this->dbforge->create_table('tbl_project');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_project');
    }

}
