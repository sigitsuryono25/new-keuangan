<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Crud_m
 *
 * @author sigit
 */
class Crud_m extends CI_Model{
    //put your code here
    
    function insertData($table, $data){
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    } 
    function updateData($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    } 
    function deleteData($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
}
