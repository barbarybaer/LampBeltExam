<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
//		$this->output->enable_profiler();
		$this->load->library("form_validation");
		$this->load->model('Quote');
		
	}
	public function display($userid)
	{
		$this->load->view('quoteDisplay',["id" => $userid]);
	}
	public function entry()
	{
		
		$results['quotes'] = $this->Quote->getAllQuotes();
		$this->load->view('/quoteEntry',$results);
		
	}
	public function add()
	{
		$this->form_validation->set_rules("author", "author", "trim|required|min_length[3]");
		$this->form_validation->set_rules("message", "message", "trim|required|min_length[10]");
		
		if($this->form_validation->run() === FALSE)
		{	
		    $this->session->set_flashdata("quote_errors", validation_errors());
		    //var_dump($this->session);die();
			$this->entry();
			//redirect('quotes');
		}

		else{
			$this->Quote->addQuote($this->input->post());
			$this->entry();
		}
	}
}
?>
