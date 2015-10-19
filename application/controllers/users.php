<?php
class Users extends CI_Controller 
{
	function login()
	{
		$email= $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		$this->load->model('user');
		$user = $this->user->get_user($email);
		if ($user && $user['password'] == $password)
		{
			$user_info = array('id' => $user['id'],
								'name' => $user['name'],
								'email' => $user['email'],
								'username' => $user['username']);
			$this->session->set_userdata($user_info);
			redirect('/books');
		}
		else
		{
			$this->session->set_flashdata('login error', "Incorrect email or password");
			redirect('/');
		}
	}

	function register()
	{
		$this->load->model('user');
		$user_details = array('name' => $this->input->post('name', TRUE),
							  'username' => $this->input->post('username', TRUE),
							  'email' => $this->input->post('email', TRUE),
							  'password' => $this->input->post('password', TRUE));
		//--- FORM VALIDATIONS ---------------//
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_pw]|min_length[8]');
		$this->form_validation->set_rules('confirm_pw', 'Confirmation password', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$errors = validation_errors();
			$this->session->set_userdata('errors', $errors);
			redirect('/');
		}
		else
		{
			$this->user->insert_new_user($user_details);
			$user = $this->user->get_user($user_details['email']);
			$this->session->set_userdata($user);
			redirect('/books');
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
?>