<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anggaran_m
 *
 * @author sigit
 */
class Anggaran_m extends CI_Model {

    //put your code here

    function getKategori() {
        return $this->db->query("SELECT * FROM tbl_kategori");
    }

    function getKategoriById($idKategori) {
        return $this->db->query("SELECT * FROM tbl_kategori WHERE id_kategori IN ('$idKategori)");
    }

    function getAnggaran() {
        $idKlien = $this->session->userdata('id_klien');
        return $this->db->query("SELECT * FROM tbl_anggaran WHERE id_klien IN ('$idKlien') GROUP BY tahun");
    }

    function getLastIdAnggaran() {
        return $this->db->query("SELECT * FROM tbl_anggaran ORDER BY id_anggaran DESC LIMIT 1");
    }

    function getSumAnggaranByIdKategori($idKategori, $tahun) {
        return $this->db->query("SELECT SUM(harga_satuan) as total_harga_satuan FROM `tbl_detail_anggaran` 
            INNER JOIN tbl_pos 
            ON tbl_detail_anggaran.id_pos=tbl_pos.id_pos
            INNER JOIN tbl_kategori 
            ON tbl_pos.id_kategori=tbl_kategori.id_kategori 
            INNER JOIN tbl_anggaran 
            ON tbl_detail_anggaran.id_anggaran=tbl_anggaran.id_anggaran 
            WHERE tbl_kategori.id_kategori IN ('$idKategori') AND tbl_anggaran.tahun IN ('$tahun')" 
        );
    }

}
