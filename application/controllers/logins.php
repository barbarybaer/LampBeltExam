<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller{
	

	public function __construct()
	{
		parent::__construct();
//		$this->output->enable_profiler();
		$this->load->library("form_validation");
		
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function login()
	{
		$this->form_validation->set_rules("email", "email", "trim|required|valid_email");
		$this->form_validation->set_rules("password","password", "trim|required|min_length[8]");
		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("login_errors", validation_errors());
			redirect('/');
		}
		else
		{
			$this->load->model("Login");
			$user = $this->Login->getUser($this->input->post());

			if ($user) {
				$this->session->set_userdata($user);
				redirect('/users/' . $user['id']);
				
			}
			else{
				$this->session->set_flashdata("login_errors", "You are not in the database. Please register.");
				redirect('/');
			}
		    
		}
	}
	public function welcome()
	{
		//redirect('/welcome',$viewData);
		$this->load->view("welcome");	
	}
	public function register()
	{
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("alias", "Alias", "trim|required");
		$this->form_validation->set_rules("email", "email", "trim|required|valid_email");
		$this->form_validation->set_rules("confirmPassword", "password confirmation", "trim|required|matches[password]");
		$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]");
		
		$parts = explode("-",$this->input->post('dob'));
		$year = $parts[0];
		$month = $parts[1];
		$day = $parts[2];
		$this->form_validation->set_rules("dob", "dob", checkdate($month, $day, $year));
		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("register_errors", validation_errors());
			redirect('/');
		}
		else
		{
		    $this->load->model("Login");
			if (!$this->Login->getUser($this->input->post())){
				$this->Login->addUser($this->input->post());

				$user = $this->Login->getUser($this->input->post());

				$this->session->set_userdata($user);
				$this->load->view("quoteDisplay");
			}
			else{
				$this->session->set_flashdata("login_errors", "You are already in the database. Please login.");
				redirect('/');
			}
		}
	}
	function logoff()
	{
		$user_session_data = $this->session->all_userdata();
		
		foreach($user_session_data as $key)
		{
			$this->session->unset_userdata($key);
		}
		
		$this->session->sess_destroy();
		redirect('/');
	}
	
	
}
?>