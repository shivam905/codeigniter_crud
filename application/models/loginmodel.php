<?php 

class Loginmodel extends CI_Model
{
	public function validate_user_login( $username, $password )
	{
		$q = $this->db->where(['user_name'=>$username,'password'=>$password])
				 ->get('login_data');

				 if( $q->num_rows() )
				 {
				 	return $q->row()->id;
				 }
				 else
				 {
				 	return FALSE;
				 }
	}
	public function validate_admin_login( $username, $password )
	{
		$qa = $this->db->where(['admin_name'=>$username,'password'=>$password])
				 ->get('user_admin');

				 if( $qa->num_rows() )
				 {
				 	return $qa->row()->id;
				 }
				 else
				 {
				 	return FALSE;
				 }
	}

	public function validate_email($email)
	{
		$q = $this->db->where(['email'=>$email])
				 ->get('login_data');

				 if( $q->num_rows() )
				 {
				 	return $q->row()->email;
				 }
				 else
				 {
				 	return FALSE;
				 }
	}
	
	public function change_password( $email_id )
	{
		$q = $this->db 
					->where(['email'=> $email_id])					
					->get('login_data');

					if ( $q->num_rows() )
					{
						return $q->row()->email;
					}					
	}

	public function update_password($email_id, $newpass)
	{
		return $this->db
					->where('email', $email_id)
					->update('login_data', array('password' => $newpass));
				}

}