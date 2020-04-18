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
class Anggaran_m extends CI_Model{
    //put your code here
    
    function getKategori() {
        return $this->db->query("SELECT * FROM tbl_kategori");
    }
    
    function getKategoriById($idKategori) {
        return $this->db->query("SELECT * FROM tbl_kategori WHERE id_kategori IN ('$idKategori)");
    }
    
    
}
