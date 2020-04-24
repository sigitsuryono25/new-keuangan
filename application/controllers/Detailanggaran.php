<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Detailanggaran
 *
 * @author sigit
 */
class Detailanggaran extends CI_Controller {

    function form_edit_perbulan() {
        $data['title'] = "Edit Anggaran | Keuangan";
        $data['metadescriptions'] = "Edit Anggaran Perbulan";
        $data['page_title'] = "Edit Anggaran";
        $data['kategori'] = $this->kategori->getKategori()->result();
        $idBulan = $this->input->get('bulan');
        $data['bulan'] = $this->bulan->getBulanById($idBulan)->row();
        $data['pos'] = $this->pos->getPos()->result();
        $this->load->view('headfoot/header', $data);
        $this->load->view('anggaran/anggaran/edit-perbulan');
        $this->load->view('headfoot/footer');
    }

    function detail_semua_bulan() {
        $data['kategori'] = $this->kategori->getKategori()->result();
        $this->load->view('anggaran/anggaran/detail-semua-bulan', $data);
    }

}
