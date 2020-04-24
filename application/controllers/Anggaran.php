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
            'final_anggaran' => $res->final_anggaran,
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
        $data['anggaran'] = $this->anggaran->getAnggaran();
        $data['bulan'] = $this->bulan->getBulan()->result();
        $this->load->view('headfoot/header', $data);
        $this->load->view('anggaran/home/dashboard');
        $this->load->view('headfoot/footer');
    }

    function add_anggaran_proc() {
//        for tbl anggaran
        $idAnggaran = $this->generateIdAnggaran();
        $idBulan = $this->input->post('bulan');
        $idKlien = $this->input->post('id-klien');
        $tahun = $this->input->post('tahun');

//        for tbl detail anggaran
        $pos = $this->input->post('pos-anggaran');
        $uraian = $this->input->post('uraian');
        $volume = $this->input->post('volume');
        $satuan = $this->input->post('satuan');
        $hargaSatuan = $this->input->post('harga-satuan');

        //insert data anggaran
        $dataInsertAnggaran = [
            'id_anggaran' => $idAnggaran,
            'id_klien' => $idKlien,
            'id_bulan' => $idBulan,
            'id_project' => $this->session->userdata('id_project'),
            'tahun' => $tahun,
        ];

        //status insert tbl-detail
        $statusDetail = 0;
        //status insert tbl-anggaran
        if (!empty($uraian)) {
            foreach ($uraian as $key => $value) {
                $dataInsertDetail = [
                    'id_detail_anggaran' => $this->etc->gen_uuid(),
                    'id_anggaran' => $idAnggaran,
                    'id_pos' => $pos,
                    'uraian' => $value,
                    'volume' => $volume[$key],
                    'satuan' => $satuan[$key],
                    'harga_satuan' => str_replace(".", "", $hargaSatuan[$key]),
                ];

                $statusDetail = $this->crud->insertData('tbl_detail_anggaran', $dataInsertDetail);
            }
        } else {
            $statusAnggaran = 0;
        }

        $statusAnggaran = $this->crud->insertData('tbl_anggaran', $dataInsertAnggaran);
        if ($statusAnggaran > 0 && $statusDetail > 0) {
            echo '0';
        } else {
            echo '1';
        }
    }

    function get_pos_by_id_kategori($idKategori) {
        $res = $this->pos->getPosByIdKategori($idKategori);
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $key => $r) {
                echo "<option value='$r->id_pos'>$r->nama_pos</option>";
            }
        }else{
            echo "<option value=''>Belum ada data pos</option>";
        }
    }

    function summary() {
        $data['tahun'] = $this->input->get('tahun');
        $data['anggaran'] = $this->project->getDetailProjectByTahun($data['tahun']);
        $data['administrasi'] = $this->anggaran->getSumAnggaranByIdKategori(1, $data['tahun'])->row();
        $data['produksi'] = $this->anggaran->getSumAnggaranByIdKategori(2, $data['tahun'])->row();
        $data['peralatan'] = $this->anggaran->getSumAnggaranByIdKategori(3, $data['tahun'])->row();
        $data['perawatan'] = $this->anggaran->getSumAnggaranByIdKategori(4, $data['tahun'])->row();
        $this->load->view('anggaran/anggaran/summary', $data);
    }

    private function generateIdAnggaran($length = 4) {
        $prefix = 'ANGGARAN-';
        $lastId = $this->anggaran->getLastIdAnggaran();
        if ($lastId->num_rows() > 0) {
            $id = $lastId->row()->id_anggaran;
            $explode = explode('-', $id);
            $nextid = $explode[1] + 1;
            return $prefix . str_pad($nextid, $length, '0', 0);
        } else {
            return $prefix . str_pad('1', $length, '0', 0);
        }
    }

}
