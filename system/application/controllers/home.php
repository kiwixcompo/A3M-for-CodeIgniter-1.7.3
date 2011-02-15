<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url'));
        $this->load->library(array('account/authentication'));
		$this->load->model(array('account/account_model'));
		$this->lang->load(array('general'));
	}
	
	function index()
	{
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		
		$this->load->view('home', isset($data) ? $data : NULL);
	}
	
}


/* End of file home.php */
/* Location: ./system/application/controllers/home.php */