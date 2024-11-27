<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
    public function sendbioEmail()
    {
        $this->load->library('email');
    
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'st.manishkatoch01@gmail.com',
            'smtp_pass' => 'fofsmohhuqeyxebb',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'smtp_crypto' => 'tls'
        );
    
        $this->email->initialize($config);
    
        $this->email->from('st.manishkatoch01@gmail.com', 'summitRA');
        $this->email->to('vikashchoudhary15616@gmail.com');
        $this->email->subject('Testing');
        $this->email->message('Hello, this is a test email.');
    
        if (!$this->email->send()) {
            echo "Failed to send email. Debug info:";
            echo $this->email->print_debugger(['headers', 'subject', 'body']);
        } else {
            echo "Email sent successfully!";
        }
    }
    
}
