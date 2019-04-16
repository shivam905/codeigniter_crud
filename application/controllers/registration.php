<?php

class Registration extends MY_Controller
{
	public function add_new_user()
	{
		$this->load->library('form_validation');

		if( $this->form_validation->run('registration_rule'))
		{
			$uname = $this->input->post('username');	
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			$cpass = $this->input->post('cpassword');

			$data = array('user_name'=>$uname,'password'=>$pass,'email'=>$email);
			
			$this->load->model('registrationmodel','login_data');

			$add_data = $this->login_data->add_user($data);

				$this->session->set_flashdata('register',"You Are Register Successfully.");
				$this->session->set_flashdata('register_class',"alert-success");
			//	$this->load->view('public/user_login');
				return redirect('login/index');
			
		}

		else
		{
			$this->load->helper('form');
			$this->session->set_flashdata('register',"User Failed To Add Please Try Again.");
				$this->session->set_flashdata('register_class',"alert-danger");
			$this->load->view('public/user_registration');
			//return redirect('login/user_registration');
			
		}
	}
}