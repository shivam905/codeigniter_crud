<?php

class Login extends MY_Controller
{
	public function index()
	{
		 echo "hii"; exit();
		if( $this->session->userdata('user_id') )
		{
			return redirect('admin/dashboard');
		}
		
		$this->load->helper('form');
		$this->load->view('public/user_login');
      

	}
	
	public function user_login()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','User Name',
			'required|alpha|max_length[26]|trim');

		$this->form_validation->set_rules('password','Password',
			'required|min_length[6]|trim');

		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			/*echo "username : $username". "<br>" ."password : $password";*/

			
if(isset($_POST['rememberme']))
{

$data = array('username'=>$_POST['username'],'password'=>$_POST['password']);

$var=implode(',',$data);
setcookie('data', $var, time() +3600);
echo'<script type="text/javascript">
alert("Your Data Saved successfully");
window.location.href = "index.php";
</script>'; 
}

elseif (($_POST['username'] AND $_POST['password']) == $_COOKIE['data']) 
{
    echo'<script type="text/javascript">
alert("you login successfully");
window.location.href = "index.php";
</script>';
}
else
{
   
    echo'<script type="text/javascript">
alert("your data is not saved");
window.location.href = "index.php";
</script>';
    
}

			$this->load->model('loginmodel');

			$login_id = $this->loginmodel->validate_user_login($username, $password);
			$login_ida = $this->loginmodel->validate_admin_login($username, $password);

			if($login_id)
			{				
				$this->session->set_userdata('user_id',$login_id);
				$this->session->set_userdata('id',$login_id);
				return redirect('user/index');
			}
			else if($login_ida)
				{			
			   					
				$this->session->set_userdata('user_id',$login_ida);
				return redirect('admin/dashboard');
				
				}
				else
				{
					$this->session->set_flashdata('login failed','invalid username/password');
					return redirect('login');
				}				
		}
		else
			{
					$this->load->helper('form');
					$this->load->view('public/user_login');
		
			}				 
	}

	public function user_registration()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('public/user_registration');
	}

	public function forget_password()
	{
		$this->load->library('form_validation');
    	$this->load->helper('form');
		$this->load->view('public/forget_password');
	}

	public function send_mail() 
    {      
    	$this->load->library('form_validation');

		$this->form_validation->set_rules('toemail','Email-id',
			'required');

		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

		if($this->form_validation->run())
		{

    	$email = $this->input->post('toemail');
			$this->load->model('loginmodel');
			$ema = $this->loginmodel->validate_email($email);

		if($ema === $email)
		{
    	$this->load->helper('string');
    	$str = random_string('alnum', 6);
    	$message = 'Your Reset password otp is : '.$str;
    	$this->session->set_userdata('str',$str);

        $toemail = $this->input->post('toemail');
        $this->session->set_userdata('toemail',$toemail);
        $subject = 'Reset Password OTP';
     //   $otp = $this->input->post('otp');
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
        $this->email->to($toemail);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
        {
        	 //   $this->session->set_flashdata("email_sent","Congratulation Email Send Successfully.");
        	echo '<script type="text/javascript">
    			alert("Email Send Successfully.");
				</script>';
       		$this->load->view('public/submit_otp');
       	}

       }
       else
       {
       	$this->session->set_flashdata("email_sent","The Email-ID is not exist in our database");
            $this->load->view('public/forget_password');
       }
   }
        else{
            $this->session->set_flashdata("email_sent","The Field Cannot be blank");
            $this->load->view('public/forget_password');
        }
    }

    public function confirm_otp()
	{
		 $strotp = $this->session->userdata('str');
		 $getotp = $this->input->post('otp');
		if($strotp === $getotp)
		{
			// $this->session->set_flashdata("check_otp","Congratulation your otp submitted Successfully.");
			 echo '<script type="text/javascript">
    			alert("Your otp is verified \n Now you can change your password");
				</script>';
       		$this->load->view('public/reset_password');
		}
		 else
		 {
            $this->session->set_flashdata("check_otp","You entered wrong otp");
            $this->load->view('public/submit_otp');
        }
	}

	public function reset_pass()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('newpass','New Password',
			'required|max_length[26]|trim');

		$this->form_validation->set_rules('cpass','Confirm Password',
			'required|min_length[6]|trim');

		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

		if( $this->form_validation->run() )
		{
			$newpass = $this->input->post('newpass');
			$cpass = $this->input->post('cpass');
			

			$email_id = $this->session->userdata('toemail');

			if($cpass === $newpass && $email_id == TRUE)
			{	
				$this->load->model('loginmodel');
				$newpass = $this->input->post('newpass');
				$this->loginmodel->update_password($email_id,$newpass);
				echo '<script type="text/javascript">
    			alert("your password changed successfully.");
				</script>';
				$this->load->view('public/user_login');
			}
				else{
            $this->session->set_flashdata("check_password","Your password is not same");
					$this->load->view('public/reset_password');	
					}		
		}		 

	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
				return redirect('login');
	}

}
/*
<img src="<?php echo base_url().'images/refresh.png'; ?>"/>*/