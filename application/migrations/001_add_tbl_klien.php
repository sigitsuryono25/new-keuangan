<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_klien extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_klien' => array(
                'type' => 'varchar',
                'constraint' => '100',
            ),
            'nama_klien' => array(
                'type' => 'varchar',
                'constraint' => '100',
            ),
            'asal_perusahaan' => array(
                'type' => 'varchar',
                'constraint' => '100',
            ),
            'email' => array(
                'type' => 'varchar',
                'constraint' => '100',
            ),
            'telepon' => array(
                'type' => 'varchar',
                'constraint' => '100',
            ),
            'alamat' => array(
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->add_key('id_klien', TRUE);
        $this->dbforge->create_table('tbl_klien');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_klien');
    }

}
