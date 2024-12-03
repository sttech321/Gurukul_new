<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

/**************************** The function below insert into bank and teacher tables   **************************** */
    function insetTeacherFunction (){
        $principal_id = $this->session->userdata('principal_id');
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
            );

            $teacher_array['gurukul_id'] = $principal_id;
            $teacher_array['file_name'] = $_FILES["file_name"]["name"];
            $teacher_array['email'] = $this->input->post('email');
            // $teacher_array['bank_id'] = $bank_id;
            $check_email = $this->db->get_where('teacher', array('email' => $teacher_array['email']))->row()->email;	// checking if email exists in database
            if($check_email != null) 
            {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            redirect(base_url() . 'principal/teacher/', 'refresh');
            }
            else
            {
            $this->db->insert('teacher', $teacher_array);
            $teacher_id = $this->db->insert_id();
            
                move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/teacher_image/" . $_FILES["file_name"]["name"]);	// upload files
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $teacher_id . '.jpg');			// image with user ID
            }

    }

    function updateTeacherFunction($param2){
        $teacher_data['gurukul_id'] = $principal_id;
        $teacher_data = array(
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
            );
            $teacher_data['gurukul_id'] = $principal_id;
            $this->db->where('teacher_id', $param2);
            $this->db->update('teacher', $teacher_data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg'); 			// image with user ID
    }

    function deleteTeacherFunction($param2){
        $this->db->where('teacher_id', $param2);
        $this->db->delete('teacher');
    }
	

}
