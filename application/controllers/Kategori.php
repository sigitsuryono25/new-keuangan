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
class Kategori extends CI_Controller {

    //put your code here

    function add_kategori_proc() {
        $namaKategori = $this->input->post('nama-kategori', true);
        $dataInsert = [
            'nama_kategori' => $namaKategori
        ];

        if ($this->crud->insertData('tbl_kategori', $dataInsert) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }

    function get_kategori_by_id($idKategori) {
        $res = $this->kategori->getKategoriById($idKategori);
        if ($res->num_rows() > 0) {
            echo json_encode($res->row());
        } else {
            echo "0";
        }
    }

    function edit_kategori_proc() {
        $namaKategori = $this->input->post('nama-kategori', true);
        $idKategori = $this->input->get('id-kategori', true);
        $dataInsert = [
            'nama_kategori' => $namaKategori
        ];
        $where = [
            'id_kategori' => $idKategori
        ];

        if ($this->crud->updateData('tbl_kategori', $dataInsert, $where) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }

    function delete_kategori() {
        $idKategori = $this->input->get('id-kategori', true);

        $where = [
            'id_kategori' => $idKategori
        ];

        if ($this->crud->deleteData('tbl_kategori', $where) > 0) {
            echo "0";
        } else {
            echo "1";
        }
        redirect('anggaran');
    }

}
