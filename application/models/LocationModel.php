<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocationModel extends CI_Model {

    public function getCountries() {
        $query = $this->db->get('countries');
        return $query->result();
    }
    
    public function getStates($countryId) {
        // Query states where country_id matches
        $this->db->where('country_id', $countryId);
        $query = $this->db->get('states');
        return $query->result(); // return states
    }

    function insert_gurukul() {
        // Get data from POST request
        $gurukul_data = array(
            'gurukul_name'              => $this->input->post('gurukul_name'),
            'address'                   => $this->input->post('address'),
            'mobile_number'             => $this->input->post('mobile_number'),
            'email'                     => $this->input->post('email'),
            'password'                  => sha1($this->input->post('password')), 
            'role'                      => $this->input->post('role') ?? 'principal', 
            'fund_resource'             => $this->input->post('fund_resource'),
            'trust_name'                => $this->input->post('trust_name'),
            'trust_registration_date'   => $this->input->post('trust_registration_date'),
            'trust_president_name'      => $this->input->post('trust_president_name'),
            'secretary_name'            => $this->input->post('secretary_name'),
            'treasurer_name'            => $this->input->post('treasurer_name'),
            'principal_name'            => $this->input->post('principal_name'),
            'setup_type'                => $this->input->post('setup_type'),
            'focus_area'                => $this->input->post('focus_area'),
            'facilities'                => $this->input->post('facilities'),
            'registered_with_education_board' => $this->input->post('registered_with_education_board'),
            'education_board_name'      => $this->input->post('education_board_name'),
            'image'                     => $this->input->post('image'),
            'state'                     => $this->input->post('state'),
            'country'                   => $this->input->post('country'),

        );
    
        // Attempt to insert data into the database
        $data = $this->db->insert('gurukul_registrations', $gurukul_data);
    
        if ($data) {
            echo "Data inserted successfully!";
        } else {
            echo "Data insertion failed. Debugging information below:";
            echo "<br>Last Query: " . $this->db->last_query();
            echo "<br>Database Error: ";
            print_r($this->db->error());
        }
    }
    
}


