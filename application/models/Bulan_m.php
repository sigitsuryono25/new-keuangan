<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bulan_m
 *
 * @author Sigit Suryono
 */
class Bulan_m extends CI_Model{
    //put your code here
    
    function getBulan() {
        return $this->db->query("SELECT * FROM tbl_bulan");
    }
    
    function getBulanById($idBulan) {
        return $this->db->query("SELECT * FROM tbl_bulan WHERE id_bulan IN ('$idBulan')");
    }
}
