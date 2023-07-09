<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Xender extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	

	public function index($param1='') {
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

			$key = 'KEY01870E567C71F5BBE3CD7E0605A8C414_h7uNYdQYcHavcQJSCYajpf';
			
			
			foreach ($recipientNumbers as $recipient) {
			
				$url = "https://api.telnyx.com/v2/messages";

				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

				$headers = array(
				"Content-Type: application/json",
				"Authorization: Bearer KEY01870E567C71F5BBE3CD7E0605A8C414_h7uNYdQYcHavcQJSCYajpf",
				);
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

				$datas = <<<DATA
				{
					"from": "+12183189013",
					"to": $recipient,
					"text": "$message"
				}
				DATA;
				echo json_encode($datas).'<br>';
				curl_setopt($curl, CURLOPT_POSTFIELDS, $datas);

				//for debug only!
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

				$resp = curl_exec($curl);
				curl_close($curl);
				var_dump($resp);

			}
		}


		$data['title'] =  'Xender - '.app_name;
		
		$this->load->view('xender', $data);
		
	}

}
