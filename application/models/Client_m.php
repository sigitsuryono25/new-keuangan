<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author sigit
 */
class Client_m extends CI_Model {

    //put your code here

    function getClient() {
        return $this->db->query("SELECT *, tbl_klien.email as email_klien FROM `tbl_klien` LEFT JOIN tbl_perusahaan ON tbl_klien.asal_perusahaan=tbl_perusahaan.id_perusahaan");
    }

    function getPerusahaan() {
        return $this->db->query("SELECT * FROM `tbl_perusahaan`");
    }

    function getClientById($idClient) {
        return $this->db->query("SELECT *, tbl_klien.email as email_klien FROM `tbl_klien` LEFT JOIN tbl_perusahaan ON tbl_klien.asal_perusahaan=tbl_perusahaan.id_perusahaan WHERE id_klien IN ('$idClient')");
    }

    function getClientByIdPerusahaan($idPerusahaan) {
        return $this->db->query("SELECT *, tbl_klien.email as email_klien FROM `tbl_klien` LEFT JOIN tbl_perusahaan ON tbl_klien.asal_perusahaan=tbl_perusahaan.id_perusahaan WHERE asal_perusahaan IN ('$idPerusahaan')");
    }

    function getPerusahaanById($idPerusahaan) {
        return $this->db->query("SELECT * FROM `tbl_perusahaan` WHERE id_perusahaan IN ('$idPerusahaan')");
    }

}
