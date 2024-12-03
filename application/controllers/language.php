<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load session and URL helpers
        $this->load->library('session');
        $this->load->helper('url');

        // Load the selected language or default to English
        $site_lang = $this->session->userdata('site_lang') ?? 'english';

        // Ensure the language is available
        if (!in_array($site_lang, ['english', 'hindi'])) { // Add other languages here
            $site_lang = 'english'; // Fallback to English if invalid language is stored
        }

        // Load the language file
        $this->lang->load('message', $site_lang);

        // Log the loaded language
        log_message('debug', 'Language loaded: ' . $site_lang);
    }

    // Method to switch the language
    public function switch_language() {
        // Get the 'lang' parameter from the URL
        $lang = $this->input->get('lang');

        // Log the language switch attempt
        log_message('debug', 'Switching language to: ' . $lang);

        // Check if the language is valid (you can expand this array with other supported languages)
        $valid_languages = ['english', 'hindi'];

        if ($lang && in_array($lang, $valid_languages)) {
            // Save the selected language in the session
            $this->session->set_userdata('site_lang', $lang);

            // Log successful language switch
            log_message('debug', 'Language switched successfully to: ' . $lang);
        } else {
            // Log invalid language switch attempt
            log_message('error', 'Invalid language attempted: ' . $lang);
        }

        // Redirect back to the previous page or a default URL
        redirect($this->input->server('HTTP_REFERER') ?? base_url());
    }
}
