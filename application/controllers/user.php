<?php

class User extends MY_Controller
{
	public function _construct()
	{
		parent :: _construct();
		if( ! $this->session->userdata('user_id') )
			return redirect('login');
	}
	
	public function index()
	{
		$this->load->helper('form'); 
		if( ! $this->session->userdata('user_id') )
			return redirect('login');

		$this->load->model('articlesmodel', 'articles');
		$this->load->library('pagination');
		$config = [
			'base_url' 			=> base_url('user/index'),
			'per_page' 			=> 5,
			'total_rows' 		=> $this->articles->count_all_articles(),
			'full_tag_open' 	=> "<ul class='pagination'>",
			'full_tag_close' 	=> "</ul>",
			'first_tag_open' 	=> '<li>',
		/*	'uri_segment'		=> 4,*/
			'first_tag_close' 	=> '</li>',
			'last_tag_open' 	=> '<li>',
			'last_tag_close' 	=> '</li>',
			'next_tag_open' 	=> '<li>',
			'next_tag_close' 	=> '</li>',
			'prev_tag_open' 	=> '<li>',
			'prev_tag_close' 	=> '</li>',
			'num_tag_open' 		=> '<li>',
			'num_tag_close' 	=> '</li>',
			'cur_tag_open' 		=> "<li class='active'><a>",
			'cur_tag_close' 	=> '</a></li>',

		];

		$this->pagination->initialize($config); 
		$articles = $this->articles->articles_list( $config['per_page'], $this->uri->segment(3) );

		$this->load->view('public/home',compact('articles'));		
	}

	public function search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query','Search','required');

		if( $this->form_validation->run() )
		{
		
			$query = $this->input->post('query');
			return redirect("user/search_results/$query");

			/*$this->load->model('articlesmodel', 'articles');
			$articles = $this->articles->search( $query);
			$this->load->view('public/search_results',compact('articles'));*/
		}
		else
		{
			$this->index();
		}
	}
	public function search_results( $query )
	{
		$this->load->helper('form');

		$this->load->model('articlesmodel', 'articles');
		$this->load->library('pagination');
		$config = [
			'base_url' 			=> base_url("user/search_results/$query"),
			'per_page' 			=> 5,
			'total_rows' 		=> $this->articles->count_search_results( $query ),
			'full_tag_open' 	=> "<ul class='pagination'>",
			'full_tag_close' 	=> "</ul>",
			'first_tag_open' 	=> '<li>',
			'first_tag_close' 	=> '</li>',
			'last_tag_open' 	=> '<li>',
			'last_tag_close' 	=> '</li>',
			'next_tag_open' 	=> '<li>',
			'next_tag_close' 	=> '</li>',
			'prev_tag_open' 	=> '<li>',
			'prev_tag_close' 	=> '</li>',
			'num_tag_open' 		=> '<li>',
			'num_tag_close' 	=> '</li>',
			'cur_tag_open' 		=> "<li class='active'><a>",
			'cur_tag_close' 	=> '</a></li>',

		];

		$this->pagination->initialize($config); 
		$articles = $this->articles->search( $query, $config['per_page'], $this->uri->segment(4) );
		$this->load->view('public/search_results',compact('articles'));
	}

	public function article( $id )
	{
		$this->load->helper('form');
		$this->load->model('articlesmodel', 'articles');
		$article = $this->articles->find( $id );
		$this->load->view('public/article_detail', compact('article'));

	}

	public function profile_data()
	{
		$profile_id = $this->session->userdata('user_id');
		$this->load->helper('form');
		$this->load->model('registrationmodel');
	    $result = $this->registrationmodel->getreq();
	    $this->load->view('public/user_profile',$result);
	}

	public function edit_profile($profile_id)
	{
		$profile_id = $this->input->post('p_id');
		$this->load->helper('form');
		$this->load->model('registrationmodel','regmo');
		$profile = $this->regmo->find_profile($profile_id);
		$this->load->view('public/edit_user_detail',['profile'=>$profile]);
	}

	public function update_profile($profile_id)
	{
	//	$profile_id = $this->input->post('p_id');
		$this->load->library('form_validation');

		if( $this->form_validation->run('update_email_rule') )
		{
			$profile_id = $this->input->post('p_id');
			$uname = $this->input->post('username');
			$email = $this->input->post('email');	
			$data = array('user_name'=>$uname,'email'=>$email);

			$this->load->model('registrationmodel','regmo');

			$this->regmo->update_profile($profile_id, $data);
			
				$this->session->set_flashdata('feedback',"Article Updated Successfully.");
				$this->session->set_flashdata('feedback_class',"alert-success");
				return redirect('user/profile_data');
			
		}

		else
		{
			$this->session->set_flashdata('feedback',"Article Failed To Update Please Try Again.");
				$this->session->set_flashdata('feedback_class',"alert-danger");

		$profile_id = $this->input->post('p_id');
		$this->load->helper('form');
		$this->load->model('registrationmodel','regmo');
		$profile = $this->regmo->find_profile($profile_id);
		$this->load->view('public/edit_user_detail',['profile'=>$profile]);
		}
	}


}

