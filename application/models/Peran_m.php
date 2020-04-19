<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Peran_m
 *
 * @author sigit
 */
class Peran_m extends CI_Model{
    //put your code here
    
    function getLoginDetail($username, $password) {
        $md5 = md5($password);
        return $this->db->query("SELECT * FROM tbl_admin WHERE username IN ('$username') AND password IN ('$md5')");
    }
}
