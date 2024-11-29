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
    
}


