<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kategori
 *
 * @author sigit
 */
class Pos extends CI_Controller {

    //put your code here

    function add_pos_proc() {
        $namaPos = $this->input->post('nama-pos', true);
        $idKategori = $this->input->post('id-kategori', true);
        $dataInsert = [
            'nama_pos' => $namaPos,
            'id_kategori' => $idKategori
        ];

        if ($this->crud->insertData('tbl_pos', $dataInsert) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }

    function get_pos_by_id($idPos) {
        $res = $this->pos->getPosById($idPos);
        if ($res->num_rows() > 0) {
            echo json_encode($res->row());
        } else {
            echo "0";
        }
    }

    function edit_pos_proc() {
        $namapos = $this->input->post('nama-pos', true);
        $idKategori = $this->input->post('id-kategori', true);
        $idPos = $this->input->get('id-pos', true);
        $dataInsert = [
            'nama_pos' => $namapos,
            'id_kategori' => $idKategori
        ];
        $where = [
            'id_pos' => $idPos
        ];

        if ($this->crud->updateData('tbl_pos', $dataInsert, $where) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }

    function delete_pos() {
        $idPos = $this->input->get('id-pos', true);
        $where = [
            'id_pos' => $idPos
        ];

        if ($this->crud->deleteData('tbl_pos', $where) > 0) {
            echo "0";
        } else {
            echo "1";
        }
        redirect('anggaran');
    }

}
