<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kategori_m
 *
 * @author sigit
 */
class Pos_m extends CI_Model {

    //put your code here

    function getPos() {
        return $this->db->query("SELECT * FROM tbl_pos INNER JOIN tbl_kategori ON tbl_pos.id_kategori=tbl_kategori.id_kategori GROUP BY id_pos");
    }

    function getPosById($idPos) {
        return $this->db->query("SELECT * FROM tbl_pos WHERE id_pos IN ('$idPos')");
    }

    function getPosByIdKategori($idKategori) {
        return $this->db->query("SELECT * FROM tbl_pos WHERE id_kategori IN ('$idKategori')");
    }

}
