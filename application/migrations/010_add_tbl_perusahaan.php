<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_perusahaan extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_perusahaan' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'nama_perusahaan' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'alamat' => array(
                'type' => 'TEXT',
            ),
            'nomor_telepon' => array(
                'type' => 'VARCHAR',
                'constraint'=> '20'
            ),
            'email' => array(
               'type' => 'VARCHAR',
                'constraint'=> '20'
            ),
        ));
        $this->dbforge->add_key('id_perusahaan', TRUE);
        $this->dbforge->create_table('tbl_perusahaan');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_perusahaan');
    }

}
