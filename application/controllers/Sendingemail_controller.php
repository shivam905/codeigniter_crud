<?php
class Sendingemail_Controller extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }
    public function index() 
    {
        $this->load->helper('form');
        $this->load->view('public/contact_email_form');
    }
    public function send_mail() 
    {      
        $to_email = $this->input->post('toemail');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $from_email = 'shivam.kashyap@srmtechsol.com';

        $this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] =  'ssl://smtp.gmail.com';
        $config['smtp_user'] = 'shivam.kashyap@srmtechsol.com';
        $config['smtp_pass'] = 'stpl.biz';
        $config['smtp_port'] = 465;

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($from_email,'Shivam Kashyap');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
            $this->session->set_flashdata("email_sent","Congratulation Email Send Successfully.");
        else
            $this->session->set_flashdata("email_sent","You have encountered an error");
            $this->load->view('public/contact_email_form');
    }
}
?>