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
class Client extends CI_Controller {

    //put your code here
    function daftar_perusahaan() {
        $data['title'] = "Tambah Perusahaan | Keuangan";
        $data['metadescriptions'] = "Halaman tambah perusahaan";
        $data['page_title'] = "Tambah Perusahaan";
        $data['perusahaan'] = $this->client->getPerusahaan();
        $this->load->view('headfoot/header', $data);
        $this->load->view('client/daftar-perusahaan');
        $this->load->view('headfoot/footer');
    }

    function form_add_perusahaan() {
        $data['title'] = "Tambah Perusahaan | Keuangan";
        $data['metadescriptions'] = "Halaman tambah perusahaan";
        $data['page_title'] = "Tambah Perusahaan";
        $this->load->view('headfoot/header', $data);
        $this->load->view('client/form-add-perusahaan');
        $this->load->view('headfoot/footer');
    }

    function add_perusahaan_proc() {
        $namaPerusahaan = $this->input->post('nama-perusahaan', true);
        $alamatPerusahaan = $this->input->post('alamat-perusahaan', true);
        $teleponPerusahaan = $this->input->post('telepon-perusahaan', true);
        $emailPerusahaan = $this->input->post('email-perusahaan', true);
        $idPerusahaan = $this->input->post('id-perusahaan', true);

        $dataInsert = [
            'id_perusahaan' => $idPerusahaan,
            'nama_perusahaan' => $namaPerusahaan,
            'alamat' => $alamatPerusahaan,
            'nomor_telepon' => $teleponPerusahaan,
            'email' => $emailPerusahaan,
        ];

        $this->crud->insertData('tbl_perusahaan', $dataInsert);
        redirect('client/daftar_perusahaan');
    }

    function daftar_klien() {
        $data['title'] = "Daftar Klien | Keuangan";
        $data['metadescriptions'] = "Halaman Daftar Klien";
        $data['page_title'] = "Daftar Klien";
        $data['klien'] = $this->client->getClient();
        $data['perusahaan'] = $this->client->getPerusahaan();
        $this->load->view('headfoot/header', $data);
        $this->load->view('client/daftar-klien');
        $this->load->view('headfoot/footer');
    }

    function add_klien_proc() {
        $namaKlien = $this->input->post('nama-klien', true);
        $teleponKlien = $this->input->post('telepon-klien', true);
        $emailKlien = $this->input->post('email-klien', true);
        $idPerusahaan = $this->input->post('id-perusahaan', true);

        $dataKlien = [
            'id_klien' => $this->etc->gen_uuid(),
            'nama_klien' => $namaKlien,
            'asal_perusahaan' => $idPerusahaan,
            'email' => $emailKlien,
            'telepon' => $teleponKlien,
        ];

        if ($this->crud->insertData('tbl_klien', $dataKlien) > 0) {
            echo '0';
        } else {
            echo "somenthing wrong, please try again.";
        }
    }

    function get_klien_detail($idKlien) {
        $res = $this->client->getClientById($idKlien)->row();
        if (!empty($res)) {
            echo json_encode($res);
        } else {
            echo '0';
        }
    }

    function form_edit_perusahaan($idPerusahaan) {
        $data['title'] = "Tambah Perusahaan | Keuangan";
        $data['metadescriptions'] = "Halaman tambah perusahaan";
        $data['page_title'] = "Tambah Perusahaan";
        $data['perusahaan'] = $this->client->getPerusahaanById($idPerusahaan)->row();
        $this->load->view('headfoot/header', $data);
        $this->load->view('client/form-add-perusahaan');
        $this->load->view('headfoot/footer');
    }

    function edit_perusahaan_proc() {
        $namaPerusahaan = $this->input->post('nama-perusahaan', true);
        $alamatPerusahaan = $this->input->post('alamat-perusahaan', true);
        $teleponPerusahaan = $this->input->post('telepon-perusahaan', true);
        $emailPerusahaan = $this->input->post('email-perusahaan', true);
        $idPerusahaan = $this->input->post('id-perusahaan', true);

        $dataInsert = [
            'nama_perusahaan' => $namaPerusahaan,
            'alamat' => $alamatPerusahaan,
            'nomor_telepon' => $teleponPerusahaan,
            'email' => $emailPerusahaan,
        ];

        $where = ['id_perusahaan' => $idPerusahaan];

        $this->crud->updateData('tbl_perusahaan', $dataInsert, $where);
        redirect('client/daftar_perusahaan');
    }

    function edit_klien_proc() {
        $namaKlien = $this->input->post_get('nama-klien');
        $teleponKlien = $this->input->post_get('telepon-klien');
        $emailKlien = $this->input->post_get('email-klien');
        $idPerusahaan = $this->input->post_get('id-perusahaan');
        $idKlien = $this->input->post_get('id-klien');

        $dataKlien = [
            'nama_klien' => $namaKlien,
            'asal_perusahaan' => $idPerusahaan,
            'email' => $emailKlien,
            'telepon' => $teleponKlien,
        ];
        $where = ['id_klien' => $idKlien];

        if ($this->crud->updateData('tbl_klien', $dataKlien, $where) > 0) {
            echo '0';
        } else {
            echo "1";
        }
    }

    function delete_perusahaan($idPerusahaan) {
        $where = ['id_perusahaan' => $idPerusahaan];
        if ($this->crud->deleteData('tbl_perusahaan', $where) > 0) {
            redirect('client/daftar_perusahaan');
        } else {
            echo "somenthing wrong, please try again.";
        }
    }

    function delete_klien($idKlien) {
        $idKlien = $this->input->get('id-klien');
        $where = ['id_klien' => $idKlien];
        if ($this->crud->deleteData('tbl_klien', $where) > 0) {
            redirect('anggaran');
        } else {
            echo "somenthing wrong, please try again.";
        }
    }

}
