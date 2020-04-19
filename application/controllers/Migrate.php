<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Migrate
 *
 * @author sigit
 */
class Migrate extends CI_Controller {

    function create_db() {
        $this->load->dbforge();
        if ($this->dbforge->create_database("db_new_keuangan")) {
            echo "databases created. Go to config/databases.php and change database with <b>db_new_keuangan</b><br>"
            . "Than go to " . anchor('migrate', 'this') . "do a migration";
        }
    }

    //put your code here
    public function index() {

        $version = 10;
        $this->load->library('migration');

        for ($i = 1; $i <= $version; $i++) {
            if ($this->migration->version($i) === FALSE) {
                show_error($this->migration->error_string());
            }
        }
    }

    public function migrate_to($migrateseq) {
        $this->load->library('migration');
        if ($this->migration->version($migrateseq) === FALSE) {
            show_error($this->migration->error_string());
        }
    }

}
