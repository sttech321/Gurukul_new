<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Principal extends CI_Controller { 

        function __construct() {
            parent::__construct();
                $this->load->database();
                $this->load->library('session');
        }

        /*student dashboard code to redirect to student page if successfull login** */
        function dashboard() {
            if ($this->session->userdata('gurukul_login') != 1) redirect(base_url(), 'refresh');
            $page_data['page_name'] = 'dashboard';
            $page_data['page_title'] = get_phrase('gurukul Dashboard');
            $this->load->view('backend/index', $page_data);
        }
        /******************* / student dashboard code to redirect to student page if successfull login** */

        public function principal($param1 = null, $param2 = null)
        {
            $this->load->library('session');
           
            // Check if the user is logged in as admin
            if ($this->session->userdata('gurukul_login') != 1) {
                redirect(base_url(), 'refresh');
            }
           
            // Handle POST request for student registration
            if ($param1 == 'teacher' && $_POST) {
                redirect(base_url() . 'principal/teacher', 'refresh');
            }
           
            // Check if the user wants to view the 'approved' or 'unapproved' page
            if ($param2 == 'teacher') {
                $page_data['page_name'] = 'teacher'; // Matches the sidebar for unapproved page
                $page_data['page_title'] = "Teacher Page";
            } else {
                $page_data['page_name'] = 'student'; // Matches the sidebar for approved page
                $page_data['page_title'] = "Approved Page";
            }
       
            // Load the view for the respective page
            $this->load->view('backend/index', $page_data);
        }


    }