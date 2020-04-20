<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project_m
 *
 * @author sigit
 */
class Project_m extends CI_Model {

    //put your code here
    function getLastIdProject() {
        return $this->db->query("SELECT id_project FROM tbl_project ORDER BY id_project DESC LIMIT 1");
    }

    function getProjectById($idProject) {
        return $this->db->query("SELECT * FROM tbl_project "
                        . "INNER JOIN tbl_klien "
                        . "ON tbl_project.id_klien=tbl_klien.id_klien "
                        . "INNER JOIN tbl_perusahaan "
                        . "ON tbl_klien.asal_perusahaan=tbl_perusahaan.id_perusahaan "
                        . " WHERE id_project IN ('$idProject')");
    }

    function getProjectByIdKlien() {
        $idPerusahaan = $this->session->userdata('id_perusahaan');
        return $this->db->query("SELECT * FROM tbl_project "
                        . "INNER JOIN tbl_klien "
                        . "ON tbl_project.id_klien=tbl_klien.id_klien "
                        . "INNER JOIN tbl_perusahaan "
                        . "ON tbl_klien.asal_perusahaan=tbl_perusahaan.id_perusahaan "
                        . "WHERE tbl_klien.asal_perusahaan "
                        . "IN ('$idPerusahaan')");
    }

}
