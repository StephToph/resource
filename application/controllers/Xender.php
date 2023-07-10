<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Xender extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	

	public function index($param1='') {
		$id = '';
		if($param1 == 'send'){
			// Set your Telnyx API credentials
			$api_key = 'KEY01870E567C71F5BBE3CD7E0605A8C414_h7uNYdQYcHavcQJSCYajpf';
			$from_number = '+12183189013';

			// Get the recipient numbers and message from the form data
			$recipients = $_POST['recipients'];
			$message = $_POST['message'];

			

			// Trim leading and trailing whitespace from the message
			$message = trim($message);

			// Remove consecutive whitespace within the message
			$message = preg_replace('/\s+/', ' ', $message);

			// Split recipient numbers by commas
			$recipientNumbers = explode(',', json_encode($recipients));

			// Remove whitespace from each number
			$recipientNumbers = array_map('trim', $recipientNumbers);
			$a = 0;$b =0;$c=1;

			$count = count($recipientNumbers);
			echo 'Sending Message to '.$count.' Recipients.  ';
			foreach ($recipientNumbers as $recipient) {
			
				$url = "https://api.telnyx.com/v2/messages";

				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

				$headers = array(
				"Content-Type: application/json",
				"Authorization: Bearer ".app_key,
				);
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

				$datas = <<<DATA
				{
					"from": "+12183189013",
					"to": $recipient,
					"text": "$message"
				}
				DATA;
				
				curl_setopt($curl, CURLOPT_POSTFIELDS, $datas);

				//for debug only!
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

				$resp = curl_exec($curl);
				$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

				// Handle the API response
				if ($httpCode === 200) {$a++;
					
				} else {$b++;
					
				}
				curl_close($curl);
				// var_dump($resp);
				$c++;

				
			}echo 'Message Sent Successfully to '.$a.' Recipient and Failed to send to '.$b.' Recipient';
			die;
		}

		if($param1 == 'login'){
			$user = $this->input->post('user');
			$password = $this->input->post('password');
			
			if(app_user == $user && app_pass == $password){
				$id = rand();
				$this->session->set_userdata('log_id', $id);
				echo 'Login Successful';
				echo '<script>$("#login").hide(3000);$("#sender_id").show(500);</script>';
			} else {
				$this->session->set_userdata('log_id', '');
				echo 'Login Failed';
			}
			die;
		}

		$sess_id = $this->session->userdata('log_id');
		$data['sess_id'] = $sess_id;
		$data['title'] =  'Xender - '.app_name;
		
		$this->load->view('xender', $data);
		
	}

}
