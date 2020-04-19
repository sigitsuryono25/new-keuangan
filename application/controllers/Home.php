<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author sigit
 */
class Home extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        //check session here
        if(!$this->session->has_userdata('username')){
            redirect('welcome');
        }
    }
    
    function index() {
        $data['title'] = "Dashboard | Keuangan";
        $data['metadescriptions'] = "dashboard page";
        $data['page_title'] = "Dashboard";
        $data['perusahaan'] = $this->client->getPerusahaan();
        $this->load->view('headfoot/header', $data);
        $this->load->view('home/home');
        $this->load->view('home/modal-select-client');
        $this->load->view('headfoot/footer');
    }
}
