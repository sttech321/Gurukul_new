<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

/**************************** The function below insert into bank and teacher tables   **************************** */
    function insetTeacherFunction (){
        // $principal_id = $this->session->userdata('principal_id');
        if ($this->session->userdata('login_type') == 'admin') {
            // For admin login, fetch from POST data
            $gurukul_id = $this->input->post('principal_id');
        } else if ($this->session->userdata('login_type') == 'principal') {
            // For principal login, fetch from session
            $gurukul_id = $this->session->userdata('principal_id');
        } else {
            // Default case or error handling
            $gurukul_id = null; // Set to null or handle as needed
        }
        $teacher_array = array(
            'name'                  => $this->input->post('name'),
            'role'                  => $this->input->post('role'),
			'teacher_number'        => $this->input->post('teacher_number'),
			'birthday'              => $this->input->post('birthday'),
            'religion'              => $this->input->post('religion'),
            'blood_group'           => $this->input->post('blood_group'),
            'address'               => $this->input->post('address'),
			'phone'                 => $this->input->post('phone'),
			'country'              => $this->input->post('country'),
        	'state'               => $this->input->post('state'),
            'ved_shakha'            => $this->input->post('ved_shakha'),
            'extra_ordinary_skills'              => $this->input->post('extra_ordinary_skills'),
            'exceptional_abilities'         => $this->input->post('exceptional_abilities'),
			'modern_education_qualifications'        => $this->input->post('modern_education_qualifications'),
			'password'              => sha1($this->input->post('password')),
        	'department_id'         => $this->input->post('department_id'),
            'designation_id'        => $this->input->post('designation_id'),
            'date_of_joining'       => $this->input->post('date_of_joining'),
            'joining_salary'        => $this->input->post('joining_salary'),
			'status'                => $this->input->post('status'),
			'date_of_leaving'       => $this->input->post('date_of_leaving'),
            'father_name'       => $this->input->post('father_name'),
            'mother_name'       => $this->input->post('mother_name'),
            'surname'       => $this->input->post('surname'),
            'gotra'       => $this->input->post('gotra'),
            'varna'       => $this->input->post('varna'),
            'aadhaar'       => $this->input->post('aadhaar'),
            'guru_name'       => $this->input->post('guru_name'),
            'gurukul_id'       => $gurukul_id,
            );
            $teacher_array['file_name'] = $_FILES["userfile"]["name"];
            $teacher_array['email'] = $this->input->post('email', true);

            // Check if email exists
            $check_email = $this->db->get_where('teacher', ['email' => $teacher_array['email']])->row();
            if ($check_email) {
                $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
                redirect(base_url() . 'principal/teacher/', 'refresh');
            } else {
                // Insert teacher data into database
                if ($this->db->insert('teacher', $teacher_array)) {
                    $teacher_id = $this->db->insert_id();

                    // Handle file upload
                    $upload_path = "uploads/teacher_image/";
                    $image_path = $upload_path . $teacher_id . '.jpg';
                    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $image_path)) {
                        $this->db->where('teacher_id', $teacher_id);
                        $this->db->update('teacher', ['file_name' => $image_path]); // Update database with file path
                    } else {
                        $this->session->set_flashdata('error_message', 'File upload failed.');
                    }
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                } else {
                    $this->session->set_flashdata('error_message', 'Database insertion failed.');
                }
                // redirect(base_url() . 'principal/teacher/', 'refresh');
            }
    }

    function updateTeacherFunction($param2)
    {
        // Determine the Gurukul ID based on the login type
        if ($this->session->userdata('login_type') == 'admin') {
            $gurukul_id = $this->input->post('principal_id');
        } else if ($this->session->userdata('login_type') == 'principal') {
            $gurukul_id = $this->session->userdata('principal_id');
        } else {
            $gurukul_id = null; // Handle default case
        }
    
        // Prepare teacher data for updating
        $teacher_data = array(
            'name'                         => $this->input->post('name'),
            'role'                         => $this->input->post('role'),
            'teacher_number'               => $this->input->post('teacher_number'),
            'birthday'                     => $this->input->post('birthday'),
            'religion'                     => $this->input->post('religion'),
            'blood_group'                  => $this->input->post('blood_group'),
            'address'                      => $this->input->post('address'),
            'phone'                        => $this->input->post('phone'),
            'country'                      => $this->input->post('country'),
            'state'                        => $this->input->post('state'),
            'ved_shakha'                   => $this->input->post('ved_shakha'),
            'extra_ordinary_skills'        => $this->input->post('extra_ordinary_skills'),
            'exceptional_abilities'        => $this->input->post('exceptional_abilities'),
            'modern_education_qualifications' => $this->input->post('modern_education_qualifications'),
            'password'                     => sha1($this->input->post('password')), // Hash password
            'department_id'                => $this->input->post('department_id'),
            'designation_id'               => $this->input->post('designation_id'),
            'date_of_joining'              => $this->input->post('date_of_joining'),
            'joining_salary'               => $this->input->post('joining_salary'),
            'status'                       => $this->input->post('status'),
            'date_of_leaving'              => $this->input->post('date_of_leaving'),
            'father_name'                  => $this->input->post('father_name'),
            'mother_name'                  => $this->input->post('mother_name'),
            'surname'                      => $this->input->post('surname'),
            'gotra'                        => $this->input->post('gotra'),
            'varna'                        => $this->input->post('varna'),
            'aadhaar'                      => $this->input->post('aadhaar'),
            'guru_name'                    => $this->input->post('guru_name'),
            'gurukul_id'                   => $gurukul_id,
        );
    
        // Update teacher data in the database
        $this->db->where('teacher_id', $param2);
        if ($this->db->update('teacher', $teacher_data)) {
            // Handle file upload if a new file is provided
            if (!empty($_FILES["userfile"]["name"])) {
                $upload_path = "uploads/teacher_image/";
                $file_name = $param2 . '.jpg'; // Save with teacher_id
                $file_path = $upload_path . $file_name;
    
                if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $file_path)) {
                    // Update database with file path
                    $this->db->where('teacher_id', $param2);
                    $this->db->update('teacher', ['file_name' => $file_name]);
                } else {
                    $this->session->set_flashdata('error_message', 'File upload failed.');
                }
            }
    
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully.'));
        } else {
            $this->session->set_flashdata('error_message', 'Database update failed.');
        }
    
    }
    
    function deleteTeacherFunction($param2){
        $this->db->where('teacher_id', $param2);
        $this->db->delete('teacher');
    }

    public function get_teachers_by_gurukul($gurukul_id)
    {
        $this->db->select('id, name'); // Adjust columns as needed
        $this->db->from('teachers');  // Your teacher table name
        $this->db->where('gurukul_id', $gurukul_id);
        $query = $this->db->get();
        return $query->result_array();
    }
	
}
