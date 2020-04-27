<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projec
 *
 * @author sigit
 */
class Project extends CI_Controller {

    //put your code here

    function add_project_proc() {
        $namaProject = $this->input->post('nama-project', true);
        $anggaran = $this->input->post('anggaran', true);
        $idKlien = $this->input->post('id-klien', true);
        $cleanAnggaran = str_replace(".", "", $anggaran);
        $ppn = $cleanAnggaran / 11;
        $pph = $cleanAnggaran * 10 * 0.02;

        $data = [
            'id_project' => $this->generateIdProject(),
            'nama_project' => $namaProject,
            'anggaran' => $cleanAnggaran,
            'pph' => $pph,
            'ppn' => $ppn,
            'id_klien' => $idKlien
        ];

        if ($this->crud->insertData('tbl_project', $data) > 0) {
            echo "0"; //berhasil
        } else {
            echo '1'; //gagal
        }
    }

    function get_project_by_id($idProject) {
        $res = $this->project->getProjectById($idProject);
        if ($res->num_rows() > 0) {
            echo json_encode($res->row());
        } else {
            echo 'tidak ada data';
        }
    }

    function edit_project_proc() {
        $idProject = $this->input->get('id-project');
        $namaProject = $this->input->post('nama-project', true);
        $anggaran = $this->input->post('anggaran', true);
        $idKlien = $this->input->post('id-klien', true);
        $cleanAnggaran = str_replace(".", "", $anggaran);
        $ppn = $cleanAnggaran / 11;
        $pph = $cleanAnggaran * 10 * 0.02;


        $data = [
            'nama_project' => $namaProject,
            'anggaran' => $cleanAnggaran,
            'id_klien' => $idKlien,
            'pph' => $pph,
            'ppn' => $ppn,
        ];

        $where = [
            'id_project' => $idProject
        ];

        if ($this->crud->updateData('tbl_project', $data, $where) > 0) {
            echo '0';
        } else {
            echo '1';
        }
    }

    function delete_project() {
        $tahun = $this->input->get('tahun');
        $where = [
            'tahun' => $tahun
        ];

        if ($this->crud->deleteData('tbl_anggaran', $where) > 0) {
            echo '0';
        } else {
            echo '1';
        }

        redirect('anggaran');
    }

    function generateIdProject($length = 4) {
        $prefix = "PRJCT-";
        $lastId = $this->project->getLastIdProject();
        if ($lastId->num_rows() > 0) {
            $id = $lastId->row()->id_project;
            $explode = explode('-', $id);
            $nextid = $explode[1] + 1;
            return $prefix . str_pad($nextid, $length, "0", 0);
        } else {
            return $prefix . str_pad('1', $length, "0", 0);
        }
    }

}
