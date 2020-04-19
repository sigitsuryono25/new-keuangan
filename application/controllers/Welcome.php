<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function index() {
        $this->load->view('login');
    }
    
    function login_proc() {
        $username = $this->input->post('username');
        $passwords = $this->input->post('passwords');
        
        $res = $this->peran->getLoginDetail($username, $passwords);
        if($res->num_rows() > 0){
            $data = [
                'username' => $res->row()->username,
                'namaUser' => $res->row()->nama_user,
            ];
            $this->session->set_userdata($data);
            redirect('home');
        }else{
            echo 'login gagal';
        }
    }
    
    function logout() {
        $this->session->sess_destroy();
        redirect('welcome');
    }
    
    

}
