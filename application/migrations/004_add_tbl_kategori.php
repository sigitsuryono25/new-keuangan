<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_kategori extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_kategori' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'nama_kategori' => array(
                'type' => 'varchar',
                'constraint' => '20',
            ),
        ));
        $this->dbforge->add_key('id_kategori', TRUE);
        $this->dbforge->create_table('tbl_kategori');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_kategori');
    }

}
