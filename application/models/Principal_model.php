<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Principal_model extends CI_Model { 
	
    function __construct()
    {
        parent::__construct();
    }

    /**************************** The function below insert into bank and teacher tables   **************************** */
    function insert_gurukul(){
        $principal_array = array(
            'name'              => $this->input->post('gurukul_name'),
            'address'                   => $this->input->post('address'),
            'phone'             => $this->input->post('mobile_number'),
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
            'state'                     => $this->input->post('state'),
            'country'                   => $this->input->post('country'),
        );

        $principal_array['file_name'] = $_FILES["file_name"]["name"];
        $principal_array['email'] = $this->input->post('email');
        $check_email = $this->db->get_where('principal', array('email' => $principal_array['email']))->row()->email;	// checking if email exists in database
        if($check_email != null) 
        {
        $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
        redirect(base_url() . 'admin/teacher/', 'refresh');
        }
        else
        {
        $this->db->insert('principal', $principal_array);
        $principal_id = $this->db->insert_id();
        
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/teacher_image/" . $_FILES["file_name"]["name"]);	// upload files
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $principal_id . '.jpg');			// image with user ID
        }

    }

    function update_gurukul($param2){
        // Gather updated data from POST
        $principal_array = array(
            'name'                        => $this->input->post('gurukul_name'),
            'address'                     => $this->input->post('address'),
            'phone'                       => $this->input->post('mobile_number'),
            'email'                       => $this->input->post('email'),
            // 'password'                    => sha1($this->input->post('password')),
            'role'                        => $this->input->post('role') ?? 'principal',
            'fund_resource'               => $this->input->post('fund_resource'),
            'trust_name'                  => $this->input->post('trust_name'),
            'trust_registration_date'     => $this->input->post('trust_registration_date'),
            'trust_president_name'        => $this->input->post('trust_president_name'),
            'secretary_name'              => $this->input->post('secretary_name'),
            'treasurer_name'              => $this->input->post('treasurer_name'),
            'principal_name'              => $this->input->post('principal_name'),
            'setup_type'                  => $this->input->post('setup_type'),
            'focus_area'                  => json_encode($this->input->post('focus_area')), // encode as JSON
            'facilities'                  => json_encode($this->input->post('facilities')),
            'registered_with_education_board' => $this->input->post('registered_with_education_board'),
            'education_board_name'        => $this->input->post('education_board_name'),
            'state'                       => $this->input->post('state'),
            'country'                     => $this->input->post('country'),
        );
    
        // Debugging: log the data before updating
        log_message('debug', 'Principal Data: ' . print_r($principal_array, true));
    
        // Update the principal data in the database
        $this->db->where('principal_id', $param2);
        $this->db->update('principal', $principal_array);
    
        // Upload the image if file is provided
        if (!empty($_FILES['userfile']['tmp_name'])) {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
        }
    
        // Set flash message and redirect
        $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
        redirect(base_url() . 'admin/gurukul_registration', 'refresh');
    }
    
    function delete_gurukul($param3){

        $this->db->where('principal_id', $param2);
        $this->db->delete('principal');
    }

    function insert_invite_gurukul(){
        $principal_array = array(
            'name'              => $this->input->post('gurukul_name'),
            'address'                   => $this->input->post('address'),
            'phone'             => $this->input->post('mobile_number'),
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
            'state'                     => $this->input->post('state'),
            'country'                   => $this->input->post('country'),
        );

        $principal_array['file_name'] = $_FILES["file_name"]["name"];
        $principal_array['email'] = $this->input->post('email');
        $check_email = $this->db->get_where('gurukul_form', array('email' => $principal_array['email']))->row()->email;	// checking if email exists in database
        if($check_email != null) 
        {
        $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
        redirect(base_url() . 'admin/teacher/', 'refresh');
        }
        else
        {
        $this->db->insert('gurukul_form', $principal_array);
        $principal_id = $this->db->insert_id();
        
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/teacher_image/" . $_FILES["file_name"]["name"]);	// upload files
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $principal_id . '.jpg');			// image with user ID
        }

    }

    function update_invite_gurukul($param2){
        $principal_array = array(
            'name'              => $this->input->post('gurukul_name'),
            'address'                   => $this->input->post('address'),
            'phone'             => $this->input->post('mobile_number'),
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
            'state'                     => $this->input->post('state'),
            'country'                   => $this->input->post('country'),
        );
        $this->db->where('principal_id', $param2);
        $this->db->update('gurukul_form', $teacher_data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg'); 
    }

    function delete_invite_gurukul(){

        $this->db->where('principal_id', $param2);
        $this->db->delete('gurukul_form');
    }
}