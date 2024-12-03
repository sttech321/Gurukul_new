<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load session library
         $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->helper('url');

    // Check if the 'lang' parameter exists in the URL
    $lang = $CI->input->get('lang');
    if ($lang) {
        $CI->session->set_userdata('site_lang', $lang);
        redirect(current_url()); // Refresh to apply new language
    }

    // Load the selected language or default to English
    $site_lang = $CI->session->userdata('site_lang') ?? 'english';
    $CI->lang->load('message', $site_lang);
	
    }
}
