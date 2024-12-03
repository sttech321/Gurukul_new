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

    function update_gurukul($principal_id) {
        // Validate that ID is passed
        if (!$principal_id) {
            show_error('Invalid Principal ID');
            return false;
        }
    
        // Gather updated data from POST
        $principal_array = array(
            'name'                        => $this->input->post('gurukul_name'),
            'address'                     => $this->input->post('address'),
            'phone'                       => $this->input->post('mobile_number'),
            'email'                       => $this->input->post('email'),
            'role'                        => $this->input->post('role') ?? 'principal',
            'fund_resource'               => $this->input->post('fund_resource'),
            'trust_name'                  => $this->input->post('trust_name'),
            'trust_registration_date'     => $this->input->post('trust_registration_date'),
            'trust_president_name'        => $this->input->post('trust_president_name'),
            'secretary_name'              => $this->input->post('secretary_name'),
            'treasurer_name'              => $this->input->post('treasurer_name'),
            'principal_name'              => $this->input->post('principal_name'),
            'setup_type'                  => $this->input->post('setup_type'),
            'focus_area'                  => json_encode($this->input->post('focus_area')),
            'facilities'                  => json_encode($this->input->post('facilities')),
            'registered_with_education_board' => $this->input->post('registered_with_education_board'),
            'education_board_name'        => $this->input->post('education_board_name'),
            'state'                       => $this->input->post('state'),
            'country'                     => $this->input->post('country'),
        );
    
        // Update the principal data in the database
        $this->db->where('principal_id', $principal_id);
        $result = $this->db->update('principal', $principal_array);

        if (!empty($_FILES['userfile']['tmp_name'])) {
            // Move the uploaded file to the 'uploads/teacher_image/' directory
            $upload_success = move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $principal_id . '.jpg');
            
            if ($upload_success) {
                // Update the file name in the database
                $principal_array['file_name'] = $principal_id . '.jpg';
            } else {
                $this->session->set_flashdata('error_message', get_phrase('Failed to upload the image.'));
            }
        }
        
    
        // Flash message for success or error
        if ($result) {
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('Failed to update data'));
        }
    }
    
    function delete_gurukul($param2) {
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

    function update_invite_gurukul($principal_id) {
        // Validate that ID is passed
        if (!$principal_id) {
            show_error('Invalid Principal ID');
            return false;
        }
    
        // Gather updated data from POST
        $principal_array = array(
            'name'                        => $this->input->post('gurukul_name'),
            'address'                     => $this->input->post('address'),
            'phone'                       => $this->input->post('mobile_number'),
            'email'                       => $this->input->post('email'),
            'role'                        => $this->input->post('role') ?? 'principal',
            'fund_resource'               => $this->input->post('fund_resource'),
            'trust_name'                  => $this->input->post('trust_name'),
            'trust_registration_date'     => $this->input->post('trust_registration_date'),
            'trust_president_name'        => $this->input->post('trust_president_name'),
            'secretary_name'              => $this->input->post('secretary_name'),
            'treasurer_name'              => $this->input->post('treasurer_name'),
            'principal_name'              => $this->input->post('principal_name'),
            'setup_type'                  => $this->input->post('setup_type'),
            'focus_area'                  => json_encode($this->input->post('focus_area')),
            'facilities'                  => json_encode($this->input->post('facilities')),
            'registered_with_education_board' => $this->input->post('registered_with_education_board'),
            'education_board_name'        => $this->input->post('education_board_name'),
            'state'                       => $this->input->post('state'),
            'country'                     => $this->input->post('country'),
        );
    
        // Update the principal data in the database
        $this->db->where('principal_id', $principal_id);
        $result = $this->db->update('gurukul_form', $principal_array);

        if (!empty($_FILES['userfile']['tmp_name'])) {
            // Move the uploaded file to the 'uploads/teacher_image/' directory
            $upload_success = move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $principal_id . '.jpg');
            
            if ($upload_success) {
                // Update the file name in the database
                $principal_array['file_name'] = $principal_id . '.jpg';
            } else {
                $this->session->set_flashdata('error_message', get_phrase('Failed to upload the image.'));
            }
        }
        
    
        // Flash message for success or error
        if ($result) {
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('Failed to update data'));
        }
    }

}