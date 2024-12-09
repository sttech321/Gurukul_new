<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {
    
    public function index() {
         $page_data['page_name'] = 'example_view';
        // Load the view
        $this->load->view('backend/index', $page_data);
    }
    
    // public function index() {
    //     if ($this->session->userdata('principal_login') != 1) redirect(base_url(), 'refresh');
    //     $page_data['page_name'] = 'example_view';
    //     $page_data['page_title'] = 'Principal Dashboard';
    //     // print_r($page_data);
    //     // die;
    //     $this->load->view('backend/index', $page_data);
    // }
}
