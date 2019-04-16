<?php 

$config = array(

			
			 'add_article_rules' => array(
							               array(
							                     'field'   => 'title', 
							                     'label'   => 'Article Title', 
							                     'rules'   => 'required'
							                  	),
							         
							               array(
							                     'field'   => 'body', 
							                     'label'   => 'Article Body', 
							                     'rules'   => 'required'
							                  	)
						            	),

			 'update_email_rule' => array(
							               array(
							                     'field'   => 'username', 
							                     'label'   => 'User Name', 
							                     'rules'   => 'required'
							                  	),
							         
							               array(
							                     'field'   => 'email', 
							                     'label'   => 'Email-ID', 
							                     'rules'   => 'required|valid_email|is_unique[login_data.email]'
							                  	)
						            	),


			 'registration_rule' => array(
							               array(
							                     'field'   => 'username', 
							                     'label'   => 'User Name', 
							                     'rules'   => 'required'
							                  	),
							         
							               array(
							                     'field'   => 'email', 
							                     'label'   => 'Email-ID', 
							                     'rules'   => 'required|valid_email|is_unique[login_data.email]'
							                  	),

							                array(
							                     'field'   => 'password', 
							                     'label'   => 'Password', 
							                     'rules'   => 'required'
							                  	),

							                 array(
							                     'field'   => 'cpassword', 
							                     'label'   => 'Confirm Password', 
							                     'rules'   => 'required|matches[password]'
							                  	)
						            	)
			);

?>