<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Principal_model extends CI_Model { 
	
    function __construct()
    {
        parent::__construct();
    }

    /**************************** The function below insert into bank and teacher tables   **************************** */
    function insert_gurukul() {
        $principal_array = array(
            'name' => $this->input->post('gurukul_name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('mobile_number'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'role' => $this->input->post('role') ?? 'principal',
            'fund_resource' => $this->input->post('fund_resource'),
            'trust_name' => $this->input->post('trust_name'),
            'trust_registration_date' => $this->input->post('trust_registration_date'),
            'trust_president_name' => $this->input->post('trust_president_name'),
            'secretary_name' => $this->input->post('secretary_name'),
            'treasurer_name' => $this->input->post('treasurer_name'),
            'principal_name' => $this->input->post('principal_name'),
            'setup_type' => $this->input->post('setup_type'),
            'focus_area' => json_encode($this->input->post('focus_area')),
            'facilities' => json_encode($this->input->post('facilities')),
            'registered_with_education_board' => $this->input->post('registered_with_education_board'),
            'education_board_name' => $this->input->post('education_board_name'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
        );
   
        // File handling
        $upload_path = "uploads/principal_image/";
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
   
        if (isset($_FILES["file_name"]) && $_FILES["file_name"]["error"] === UPLOAD_ERR_OK) {
            $principal_array['file_name'] = $_FILES["file_name"]["name"];
        } else {
            $principal_array['file_name'] = null;
        }
   
        // Check email existence
        $check_email = $this->db->get_where('principal', array('email' => $principal_array['email']))->row();
        if ($check_email) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            redirect(base_url() . 'admin/principal/', 'refresh');
        } else {
            $this->db->insert('principal', $principal_array);
            $principal_id = $this->db->insert_id();
   
            if (isset($_FILES["file_name"]) && $_FILES["file_name"]["error"] === UPLOAD_ERR_OK) {
                if (!move_uploaded_file($_FILES["file_name"]["tmp_name"], $upload_path . $_FILES["file_name"]["name"])) {
                    log_message('error', 'Failed to move uploaded file: ' . $_FILES["file_name"]["name"]);
                }
            }
   
            if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
                move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path . $principal_id . '.jpg');
            }
            // Insert into user table
            $user_array = array(
                'user_email' => $principal_array['email'],
                'user_password' => $principal_array['password'], // Using hashed password
                'role' => 'principal',
            );

            $this->db->insert('user', $user_array);
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
            $upload_success = move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/principal_image/' . $principal_id . '.jpg');
            
            if ($upload_success) {
                // Update the file name in the database
                $principal_array['file_name'] = $upload_success;
            } else {
                $this->session->set_flashdata('error_message', get_phrase('Failed to upload the image.'));
            }
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

        // File handling
        $upload_path = "uploads/principal_image/";
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
   
        if (isset($_FILES["file_name"]) && $_FILES["file_name"]["error"] === UPLOAD_ERR_OK) {
            $principal_array['file_name'] = $_FILES["file_name"]["name"];
        } else {
            $principal_array['file_name'] = null;
        }
   
        // Check email existence
        $check_email = $this->db->get_where('gurukul_form', array('email' => $principal_array['email']))->row();
        if ($check_email) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            echo '<script>alert("email_already_exist")</script>';
            redirect(base_url(), 'refresh');
        } else {
            $this->db->insert('gurukul_form', $principal_array);
            $principal_id = $this->db->insert_id();
   
            if (isset($_FILES["file_name"]) && $_FILES["file_name"]["error"] === UPLOAD_ERR_OK) {
                if (!move_uploaded_file($_FILES["file_name"]["tmp_name"], $upload_path . $_FILES["file_name"]["name"])) {
                    log_message('error', 'Failed to move uploaded file: ' . $_FILES["file_name"]["name"]);
                }
            }
   
            if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
                move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path . $principal_id . '.jpg');
            }
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
            $upload_success = move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/principal_image/' . $principal_id . '.jpg');
            
            if ($upload_success) {
                // Update the file name in the database
                $principal_array['file_name'] =  $upload_success;
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