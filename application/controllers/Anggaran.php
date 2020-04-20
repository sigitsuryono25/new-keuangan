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
            echo "<script>alert('Anda Belum memilih Perusahaan. Silahkan piilih terlebih dahulu'); "
            . "location.assign('" . site_url('home') . "');"
            . "</script>";
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

    function start_session_client() {
        $idKlien = $this->input->post('id-klien');
        $res = $this->project->getProjectById($idKlien)->row();
        $sessionData = [
            'id_project' => $res->id_project,
            'nama_project' => $res->nama_project,
            'id_klien' => $res->id_klien,
            'nama_klien' => $res->nama_klien,
        ];
        
        $this->session->set_userdata($sessionData);
        redirect('anggaran');
    }

    function end_session_anggaran() {
        $this->session->unset_userdata('perusahaan');
        $this->session->unset_userdata('id_perusahaan');
        $this->session->unset_userdata('id_klien');
        $this->session->unset_userdata('nama_klien');
        $this->session->unset_userdata('id_project');
        $this->session->unset_userdata('nama_project');
        redirect('home');
    }

    function index() {
        $data['title'] = "Anggaran | Keuangan";
        $data['metadescriptions'] = "Dashboard Anggaran";
        $data['page_title'] = "Dashboard Anggaran";
        $data['client'] = $this->project->getProjectByIdKlien()->result();
        $data['kategori'] = $this->kategori->getKategori()->result();
        $data['pos'] = $this->pos->getPos()->result();
        $data['klien'] = $this->client->getClientByIdPerusahaan($this->session->userdata('id_perusahaan'));
        $data['project'] = $this->project->getProjectByIdKlien();
        $this->load->view('headfoot/header', $data);
        $this->load->view('anggaran/home/dashboard');
        $this->load->view('headfoot/footer');
    }

}
