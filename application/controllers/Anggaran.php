<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anggaran
 *
 * @author sigit
 */
class Anggaran extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('perusahaan')) {
//            echo "<script>alert('Anda Belum memilih klien. Silahkan piilih terlebih dahulu'); "
//            . "location.assign('" . site_url('home') . "');"
//            . "</script>";
        }
    }

    function start_session_anggaran() {
        $idPerusahaan = $this->input->post('perusahaan');
        $res = $this->client->getPerusahaanById($idPerusahaan)->row();
        $sessionData = [
            'perusahaan' => $res->nama_perusahaan,
            'id_perusahaan' => $res->id_perusahaan
        ];

        $this->session->set_userdata($sessionData);
        redirect('anggaran');
    }

    function index() {
        $data['title'] = "Anggaran | Keuangan";
        $data['metadescriptions'] = "Dashboard Anggaran";
        $data['page_title'] = "Dashboard Anggaran";
        $data['client'] = $this->client->getClientByIdPerusahaan($this->session->userdata('id_perusahaan'))->result();
        $this->load->view('headfoot/header', $data);
        $this->load->view('anggaran/home/dashboard');
        $this->load->view('headfoot/footer');
    }

}
