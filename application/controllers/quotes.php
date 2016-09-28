<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler();
		
		$this->load->model('Quote');
		
	}
	public function display($id)
	{	
		$results['quotes']=$this->Quote->getQuotesAddedByPoster($id);
		//$results['count'] = $this->Quote->getQuoteCountByPoster($id);
		
		 //var_dump($results);
		$this->load->view('/quoteDisplay',$results);
		
	}
	public function entry()
	{
		
		$results['allQuotes'] = $this->Quote->getAllQuotes();
		$results['favorites'] = $this->Quote->getAllFavorites();
		// var_dump($results);die();
		$this->load->view('/quoteEntry',$results);
		
	}
	public function add()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("author", "author", "trim|required|min_length[3]");
		$this->form_validation->set_rules("message", "message", "trim|required|min_length[10]");
		
		if($this->form_validation->run() === FALSE)
		{	
		    $this->session->set_flashdata("quote_errors", validation_errors());
		    $this->entry();
			//redirect('quotes');
		}

		else{

			$success = $this->Quote->addQuote($this->input->post());
			$this->entry();
			//redirect('quotes');
		}
	}
	public function addToFavorites()
	{
		$this->Quote->addToFavorites($this->input->post());
		$this->entry();
		
	}
	public function remove()
	{
		$this->Quote->remove($this->input->post());
		$this->entry();
	}


}
?>
