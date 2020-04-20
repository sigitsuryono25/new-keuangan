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

        $data = [
            'id_project' => $this->generateIdProject(),
            'nama_project' => $namaProject,
            'anggaran' => str_replace(".", "", $anggaran),
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

        $data = [
            'nama_project' => $namaProject,
            'anggaran' => str_replace(".", "", $anggaran),
            'id_klien' => $idKlien
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
        $idProject = $this->input->get('id-project');
        $where = [
            'id_project' => $idProject
        ];

        if ($this->crud->deleteData('tbl_project', $where) > 0) {
            echo '0';
        } else {
            echo '1';
        }

        redirect('anggaran');
    }

    private function generateIdProject($length = 10) {
        $prefix = "PRJCT-";
        $lastId = $this->project->getLastIdProject();
        if ($lastId->num_rows() > 0) {
            
        } else {
            return str_pad($prefix, $length, "0") . "1";
        }
    }

}
