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
			$a = 1;$b =1;$c=1;
			$count = count($recipientNumbers);
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
				if ($httpCode === 200) {
					if($c == $count){
						echo 'Message Sent Successfully to '.$a.' Recipient';
					}
					$a++;
				} else {
					if($c == $count){
						echo 'Message Failed to send to '.$b.' Recipient';
					}
					$b++;
				}
				curl_close($curl);
				// var_dump($resp);
				$c++;
			}
			die;
		}

		if($param1 == 'login'){
			$user = $this->input->post('user');
			$password = $this->input->post('password');
			
			if(app_user == $user && app_pass == $password){
				echo 'Login Successful';
				echo '<script>$("#login").hide(3000);$("#sender_id").show(500);</script>';
			} else {
				echo 'Login Failed';
			}
			die;
		}


		$data['title'] =  'Xender - '.app_name;
		
		$this->load->view('xender', $data);
		
	}

}
