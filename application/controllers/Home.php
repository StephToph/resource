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

	public function contact() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'Contact Us - '.app_name;
		$data['page_active'] = 'contact';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/contact', $data);
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

	public function covid() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'COVID-19 Resource Center - '.app_name;
		$data['page_active'] = 'covid';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/covid', $data);
		$this->load->view('designs/footer', $data);
		
	}

	public function industry() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'Industry News & Information - '.app_name;
		$data['page_active'] = 'industry';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/industry', $data);
		$this->load->view('designs/footer', $data);
		
	}

	public function about() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'About Us - '.app_name;
		$data['page_active'] = 'about';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/about', $data);
		$this->load->view('designs/footer', $data);
		
	}

	public function accreditation() {
		// check login redirection
		$this->session->set_userdata('nsmx_redirect', uri_string());
		
		$log_id = $this->session->userdata('nsmx_id');

		$data['title'] =  'Our Accreditations - '.app_name;
		$data['page_active'] = 'accreditation';

		$this->load->view('designs/header', $data);
		$this->load->view('pages/accreditation', $data);
		$this->load->view('designs/footer', $data);
		
	}

}
