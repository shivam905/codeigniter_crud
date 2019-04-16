<?php

class Registrationmodel extends CI_Model
{
	public function add_user($data)
	{
		return $this->db->insert('login_data',$data);
	}
	
		public function getreq()
	{
		$id = $this->session->userdata('id');

	    $this->db->where('id',$id);

	    $query=$this->db->get('login_data');
	    $result=$query->result();
	    $num_rows=$query->num_rows();
	   	$row = $query->row();
	    return array("all_data"=>$result,"num_rows"=>$num_rows,"row"=>$row);
	}

	public function find_profile($profile_id)
	{
		$q = $this->db
						->select(['id','user_name','email'] )
						->where('id', $profile_id)
						->get('login_data');

			return $q->row();		
	}

	public function update_profile($profile_id, $data)
	{
		return $this->db->where('id', $profile_id)
							->update('login_data', $data);
					
	}

}