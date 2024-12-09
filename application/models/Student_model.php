<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }



    // The function below insert into student house //
    function createStudentHouse(){

        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'description'      => html_escape($this->input->post('description'))
	    );

        $this->db->insert('house', $page_data);
    }

// The function below update student house //
    function updateStudentHouse($param2){
        $page_data = array(
            'name'         => html_escape($this->input->post('name')),
            'description'  => html_escape($this->input->post('description'))
	    );

        $this->db->where('house_id', $param2);
        $this->db->update('house', $page_data);
    }

    // The function below delete from student house table //
    function deleteStudentHouse($param2){
        $this->db->where('house_id', $param2);
        $this->db->delete('house');
    }

    // The function below insert into student category //
    function createstudentCategory(){

        $page_data = array(
            'name'        => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
	    );
        $this->db->insert('student_category', $page_data);
    }

// The function below update student category //
    function updatestudentCategory($param2){
        $page_data = array(
            'name'        => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
	    );

        $this->db->where('student_category_id', $param2);
        $this->db->update('student_category', $page_data);
    }

    // The function below delete from student category table //
    function deletestudentCategory($param2){
        $this->db->where('student_category_id', $param2);
        $this->db->delete('student_category');
    }

    //  the function below insert into student table
    function createNewStudent(){
        $principal_id = $this->input->post('gurukul_id') ? html_escape($this->input->post('gurukul_id')) : $this->session->userdata('principal_id');
        $teacher_id = $this->input->post('teacherid') ? html_escape($this->input->post('teacherid')) : $this->session->userdata('teacher_id');
        
        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'birthday'      => html_escape($this->input->post('dob')),
            'address'       => html_escape($this->input->post('address')),
            'country'          => html_escape($this->input->post('country')),
            'state'         => html_escape($this->input->post('state')),
            'phone'         => html_escape($this->input->post('phone')),
            'email'         => html_escape($this->input->post('email')),
            'password'   => sha1(html_escape($this->input->post('password'))),
            'aadhaar'   => html_escape($this->input->post('aadhaar')),
            'class' => html_escape($this->input->post('class')),
            'father_name'         => html_escape($this->input->post('father_name')),
            'father_dob'       => html_escape($this->input->post('father_dob')),
            'father_aadhaar'        => html_escape($this->input->post('father_aadhaar')),
            'father_aaddress'        => html_escape($this->input->post('father_aaddress')),
            'father_mobile_number'      => html_escape($this->input->post('father_mobile_number')),
            'father_profession'        => sha1($this->input->post('father_profession')),
            'father_varna'        => html_escape($this->input->post('father_varna')),
            'father_gotra'      => html_escape($this->input->post('father_gotra')),
            'mother_name'       => html_escape($this->input->post('mother_name')),
            'mother_dob'            => html_escape($this->input->post('mother_dob')),
            'mother_aadhaar'    => html_escape($this->input->post('mother_aadhaar')),
            'mother_aaddress'    => html_escape($this->input->post('mother_aaddress')),
            'mother_mobile_number'        => html_escape($this->input->post('mother_mobile_number')),
            'mother_profession' => html_escape($this->input->post('mother_profession')),
            'mother_gotra'             => html_escape($this->input->post('father_varna')),
            'mother_varna'             => html_escape($this->input->post('mother_varna')),
        );
        $page_data['gurukul_id'] = $principal_id;
        $page_data['teacher_id'] = $teacher_id;
        $this->db->insert('student', $page_data);
        $student_id = $this->db->insert_id();
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');			// image with user ID
        $user_array = array(
            'user_email' => $page_data['email'],
            'user_password' => $page_data['password'], // Using hashed password
            'role' => 'student',
        );
        $this->db->insert('user', $user_array);

    }

    // the function below update student
    function updateNewStudent($param2) {
        $page_data = array(
            'name'                  => html_escape($this->input->post('name')),
            'birthday'              => html_escape($this->input->post('birthday')),
            'address'               => html_escape($this->input->post('address')),
            'country'               => html_escape($this->input->post('city')),
            'state'                 => html_escape($this->input->post('state')),
            'phone'                 => html_escape($this->input->post('phone')),
            'email'                 => html_escape($this->input->post('email')),
            'aadhaar'               => html_escape($this->input->post('aadhaar')),
            'class'                 => html_escape($this->input->post('class')),
            'father_name'           => html_escape($this->input->post('father_name')),
            'father_dob'            => html_escape($this->input->post('father_dob')),
            'father_aadhaar'        => html_escape($this->input->post('father_aadhaar')),
            'father_aaddress'       => html_escape($this->input->post('father_aaddress')),
            'father_mobile_number'  => html_escape($this->input->post('father_mobile_number')),
            'father_profession'     => sha1($this->input->post('father_profession')),
            'father_varna'          => html_escape($this->input->post('father_varna')),
            'father_gotra'          => html_escape($this->input->post('father_gotra')),
            'mother_name'           => html_escape($this->input->post('mother_name')),
            'mother_dob'            => html_escape($this->input->post('mother_dob')),
            'mother_aadhaar'        => html_escape($this->input->post('mother_aadhaar')),
            'mother_aaddress'       => html_escape($this->input->post('mother_aaddress')),
            'mother_mobile_number'  => html_escape($this->input->post('mother_mobile_number')),
            'mother_profession'     => html_escape($this->input->post('mother_profession')),
            'mother_gotra'          => html_escape($this->input->post('father_varna')),
            'mother_varna'          => html_escape($this->input->post('mother_varna'))
        );
    
        $this->db->where('student_id', $param2);
        $this->db->update('student', $page_data);
    
        // Update the image file if provided
        if (!empty($_FILES['userfile']['tmp_name'])) {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param2 . '.jpg');
        }
    }   

    // the function below deletes from student table
    function deleteNewStudent($param2){
        $this->db->where('student_id', $param2);
        $this->db->delete('student');
    }

}

