<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gurukul_Registration extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    /**************************** The function below insert into gurukul registration tables **************************** */
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
            'focus_area'                => json_encode($this->input->post('focus_area')), // encode as JSON
            'facilities'                => json_encode($this->input->post('facilities')),
            'registered_with_education_board' => $this->input->post('registered_with_education_board'),
            'education_board_name'      => $this->input->post('education_board_name'),
            'image'                     => $this->input->post('image'),
            'state'                     => $this->input->post('state'),
            'country'                   => $this->input->post('country'),
            'created_at'                => date('Y-m-d H:i:s'),
            'updated_at'                => date('Y-m-d H:i:s')
        );
    
        // die;
        // Attempt to insert data into the database
        $data = $this->db->insert('gurukul_registrations', $gurukul_data);
        
        // print_r($gurukul_data);
        if ($data) {
            echo "Data inserted successfully!";
        } else {
            echo "Data insertion failed. Debugging information below:";
            echo "<br>Last Query: " . $this->db->last_query();
            echo "<br>Database Error: ";
            print_r($this->db->error());
        }
    }
    
    

    function updateGurukul($param2) {
        $gurukul_data = array(
            'gurukul_name'              => $this->input->post('gurukul_name'),
            'mobile_number'             => $this->input->post('mobile_number'),
            'email'                     => $this->input->post('email'),
            'country'                   => $this->input->post('country'),
            'state'                     => $this->input->post('state'),
            'address'                   => $this->input->post('address'),
            'role'                      => $this->input->post('role'),
            'trust_name'                => $this->input->post('trust_name'),
            'trust_registration_date'   => $this->input->post('trust_registration_date'),
            'trust_president_name'      => $this->input->post('trust_president_name'),
            'secretary_name'            => $this->input->post('secretary_name'),
            'treasurer_name'            => $this->input->post('treasurer_name'),
            'principal_name'            => $this->input->post('principal_name'),
            'fund_resource'             => $this->input->post('fund_resource'),
            'setup_type'                => $this->input->post('setup_type'),
            'education_board_name'      => $this->input->post('education_board_name')
        );

        $this->db->where('gurukul_id', $param2);
        $this->db->update('gurukul_registrations', $gurukul_data);
    }

    function deleteGurukul($param2) {
        $this->db->where('gurukul_id', $param2);
        $this->db->delete('gurukul_registrations');
    }
}
