<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class StateModel extends CI_Model
{
    /**
     * Get all states
     *
     * @return array
     */
    public function get_all_states()
    {
        // Query the states table to fetch all states
        $this->db->select('id, name, country_id');
        $this->db->from('states');
        $query = $this->db->get();
 
        // Return results as an associative array
        return $query->result_array();
    }
 
    /**
     * Get states by country ID
     *
     * @param int $country_id
     * @return array
     */
    public function get_states_by_country($country_id)
    {
        // Query the states table to fetch states based on country ID
        $this->db->select('id, name');
        $this->db->from('states');
        $this->db->where('country_id', $country_id);
        $query = $this->db->get();
 
        // Return results as an associative array
        return $query->result_array();
    }
}