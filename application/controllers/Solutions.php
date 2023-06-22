<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Solutions extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	

	public function partner() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'Our Partner Program - '.app_name;
		$data['page_active'] = 'partner';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/partners', $data);
		$this->load->view('designs/footer', $data);
		
	}

	public function industries() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'Industries - '.app_name;
		$data['page_active'] = 'industries';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/industries', $data);
		$this->load->view('designs/footer', $data);
		
	}

	public function peo() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'Professional Employer (PEO) Services - '.app_name;
		$data['page_active'] = 'peo';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/peo', $data);
		$this->load->view('designs/footer', $data);
		
	}
	public function recruiting() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'Recruiting - '.app_name;
		$data['page_active'] = 'recruiting';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/recruiting', $data);
		$this->load->view('designs/footer', $data);
		
	}

}
