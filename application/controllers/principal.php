<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Principal extends MY_Controller {
    function __construct() {
        parent::__construct();
            $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('student_model');
        $this->load->model('teacher_model');
  
    }

    // public function dashboard() {
    //     // Check session for principal login
    //     if ($this->session->userdata('principal_login') != 1) {
    //         redirect(base_url(''), 'refresh'); // Redirect to login if not logged in
    //     }
        
    //     $page_data['flash_message'] = $this->session->flashdata('flash_message');
    //     $page_data['page_name'] = 'dashboard';
    //     $page_data['page_title'] = 'Principal Dashboard';

    //     // Load the dashboard view
    //     $data['page_title'] = 'Principal Dashboard';
    //     $this->load->view('backend/index', $page_data);
    // }


	/******************* / parent dashboard code to redirect to parent page if successfull login** */

    // function manage_profile($param1 = null, $param2 = null, $param3 = null)
    // {

    //     if ($this->session->userdata('principal_login') != 1) {
    //         redirect(base_url(''), 'refresh'); // Redirect to login if not logged in
    //     }
        
    //     if ($param1 == 'update') {
    
    //         $data['name']   =   $this->input->post('name');
    //         $data['email']  =   $this->input->post('email');
    
    //         $this->db->where('principal_id', $this->session->userdata('principal_id'));
    //         $this->db->update('principal', $data);
    //         move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/principal_image/' . $this->session->userdata('principal_id') . '.jpg');
    //         $this->session->set_flashdata('flash_message', get_phrase('Info Updated'));
    //         redirect(base_url() . 'principal/manage_profile', 'refresh');
    //     }
    
    //     if ($param1 == 'change_password') {
    //         $data['new_password']           =   sha1($this->input->post('new_password'));
    //         $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
    
    //         if ($data['new_password'] == $data['confirm_new_password']) {
               
    //           $this->db->where('principal_id', $this->session->userdata('principal_id'));
    //           $this->db->update('principal', array('password' => $data['new_password']));
    //           $this->session->set_flashdata('flash_message', get_phrase('Password Changed'));
    //         }
    
    //         else{
    //             $this->session->set_flashdata('error_message', get_phrase('Type the same password'));
    //         }
    //         redirect(base_url() . 'principal/manage_profile', 'refresh');
    //     }
    //         $page_data['flash_message'] = $this->session->flashdata('flash_message');
    //         $page_data['page_name']     = 'manage_profile';
    //         $page_data['page_title']    = get_phrase('Manage Profile');
    //         $page_data['edit_profile']  = $this->db->get_where('principal', array('principal_id' => $this->session->userdata('principal_id')))->result_array();
    //         $this->load->view('backend/index', $page_data);
    // }

    function subject (){

        $principal_profile = $this->db->get_where('student', array('principal_id' => $this->session->userdata('principal_id')))->row();
        $select_student_class_id = $principal_profile->class_id;

        $page_data['page_name']     = 'subject';
        $page_data['page_title']    = get_phrase('Class Subjects');
        $page_data['select_subject']  = $this->db->get_where('subject', array('class_id' => $select_student_class_id))->result_array();
        $this->load->view('backend/index', $page_data);
    }


    function class_mate (){

        $parent_student_profile = $this->db->get_where('student', array('principal_id' => $this->session->userdata('principal_id')))->row();
        $page_data['select_student_parent_class_mate']  = $parent_student_profile->class_id;
        $page_data['page_name']     = 'class_mate';
        $page_data['page_title']    = get_phrase('Class Mate');
        $this->load->view('backend/index', $page_data);
    }

    function class_routine()
    {
        $parent_profile = $this->db->get_where('student', array('principal_id' => $this->session->userdata('principal_id')))->row();
        $page_data['class_id']  = $parent_profile->class_id;
        $page_data['page_name']     = 'class_routine';
        $page_data['page_title']    = get_phrase('Class Timetable');
        $this->load->view('backend/index', $page_data);

    }

    function teacher($param1 = null, $param2 = null, $param3 = null)
    {
        $countries = $this->db->get('countries')->result_array(); 
        if ($this->session->userdata('principal_login') != 1) redirect(base_url(), 'refresh');
        if($param1 == 'insert'){
            $this->teacher_model->insetTeacherFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'principal/teacher', 'refresh');
        }

        if($param1 == 'update'){
            $this->teacher_model->updateTeacherFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'principal/teacher', 'refresh');
        }

        if($param1 == 'delete'){
            $this->teacher_model->deleteTeacherFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'principal/teacher', 'refresh');
        }

        $principal_id = $this->session->userdata('principal_id');
        $this->db->select('teacher.*');
        $this->db->from('teacher');
        $this->db->join('principal', 'teacher.gurukul_id = principal.principal_id');
        $this->db->where('principal.principal_id', $principal_id); // Match the principal ID
        $page_data['select_teacher'] = $this->db->get()->result_array();
        $page_data['page_name']     = 'teacher';
        $page_data['page_title']    = get_phrase('Principal Teacher');
        $page_data['countries'] = $countries;
        $this->load->view('backend/index', $page_data);
    }

    function student($param1 = null, $param2 = null, $param3 = null)
    {
        $countries = $this->db->get('countries')->result_array(); // Returns all countries as an array

        if ($this->session->userdata('principal_login') != 1) redirect(base_url(), 'refresh');
        if($param1 == 'insert'){
            $data = $this->student_model->createNewStudent();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'principal/student', 'refresh');
        }

        if($param1 == 'update'){
            $this->student_model->updateNewStudent($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'principal/student', 'refresh');
        }

        if($param1 == 'delete'){
            $this->student_model->deleteNewStudent($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'principal/student', 'refresh');

        }

        $page_data['page_name']     = 'student';
        $page_data['page_title']    = get_phrase('Principal Student');
        $principal_id = $this->session->userdata('principal_id');

        // Fetch all teachers where teacher.gurukul_id matches principal.principal_id
        $this->db->select('teacher.*'); // Select all teacher columns
        $this->db->from('teacher'); // Target the teacher table
        $this->db->where('teacher.gurukul_id', $principal_id); // Match gurukul_id with principal_id
        $page_data['teachers'] = $this->db->get()->result_array();
        $this->db->select('student.*');
        $this->db->from('student');
        $this->db->join('principal', 'student.gurukul_id = principal.principal_id');
        $this->db->where('principal.principal_id', $principal_id); // Match the principal ID
        $page_data['select_student'] = $this->db->get()->result_array();
        $page_data['countries'] = $countries;
        $this->load->view('backend/index', $page_data);
    }

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

    public function get_states($country_id) {
        $this->db->select('id, name');
        $this->db->from('states');
        $this->db->where('country_id', $country_id);
        $query = $this->db->get();
    
        // Check if data exists
        if ($query->num_rows() > 0) {
            $states = $query->result_array();
            echo json_encode(['states' => $states]);
        } else {
            echo json_encode(['states' => []]);
        }
    }

}