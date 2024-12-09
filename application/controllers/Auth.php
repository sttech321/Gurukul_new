<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('User_model'); // Load the User model
        $this->load->library(['form_validation', 'email']); // Load form validation and email libraries
        $this->load->helper(['url', 'form']); // Load URL and form helpers
    }

    public function send_reset_password_link()
    {
        // Load email library
        $this->load->library('email');
    
        // Fetch the email address from POST data
        $email = $this->input->post('email', true); // Sanitize input

        // Check if email is provided
        if (empty($email)) {
            echo "Email address is required.";
            return;
        }

        $user = $this->User_model->get_user_by_email($email);
        if (!$user) {
            $this->session->set_flashdata('error', 'This email is not registered.');
            redirect(base_url(), 'refresh');
        }
    
        $token = bin2hex(random_bytes(32));
        $this->User_model->save_reset_token($user['id'], $token);

        // Load the email template
        $resetLink = base_url('/reset_password'.'/' . $token);
        $message = "Hello,<br><br>You requested to reset your password. Click the link below to reset it:<br><br>";
        $message .= "<a href='" . $resetLink . "'>" . $resetLink . "</a><br><br>If you didn't request this, please ignore this email.";
        if (!$message) {
            echo "Failed to load email template.";
            return;
        }

        // Email configuration
        $config = array(
            'protocol'    => 'smtp',
            'smtp_host'   => 'smtp.gmail.com',
            'smtp_port'   => 587,
            'smtp_user'   => 'st.manishkatoch01@gmail.com', // Your email
            'smtp_pass'   => 'fofsmohhuqeyxebb',           // Your app password
            'mailtype'    => 'html',
            'charset'     => 'utf-8',
            'newline'     => "\r\n",
            'smtp_crypto' => 'tls',
        );
        $this->email->initialize($config);
    
        // Prepare email
        $this->email->from('st.manishkatoch01@gmail.com', 'GURUKUL');
        $this->email->to($email); // Email from form input
        $this->email->subject('RESET PASSWORD');
        $this->email->message($message);
    
        // Send email
        if (!$this->email->send()) {
            echo "Failed to send email. Debug info:";
            echo $this->email->print_debugger(['headers', 'subject', 'body']);
        } else {
            // Redirect to the home page after sending the email
            redirect(base_url(), 'refresh');
        }
    }

    /**
     * Display reset password form.
     * @param string $token
     */
    public function reset_password($token = null)
    {
        $user = $this->User_model->get_user_by_token($token);
        if (!$user) {
            $this->session->set_flashdata('error', 'Invalid or expired token.');
            redirect('auth/recover_form');
        }

        $data['email'] = $user['user_email'];
        $data['token'] = $token;
    
        $this->load->view('backend/reset_password', $data);
    }

    /**
     * Update the user's password.
     */
    public function update_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('reset_password/' . $this->input->post('token'));
        } else {
            $email = $this->input->post('email');
            $newPassword = sha1($this->input->post('new_password'));
    
            // Update password in the correct table based on role
            if ($this->User_model->update_password($email, $newPassword)) {
                $this->session->set_flashdata('success', 'Your password has been updated successfully.');
                redirect('/');
            } else {
                $this->session->set_flashdata('error', 'Failed to update the password. Please try again.');
                redirect('reset_password/' . $this->input->post('token'));
            }
        }
    }
    
}
