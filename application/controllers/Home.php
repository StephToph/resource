<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	

	public function index() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'Home-page - '.app_name;
		$data['page_active'] = 'home';

		$this->load->view('designs/header', $data);
		$this->load->view('home', $data);
		$this->load->view('designs/footer', $data);
		
	}

}
