<?php

use Twilio\Rest\Client;

class Twilio_api {
	
	private $sid		= "";
	private $token		= "";
	private $my_number	= "";
	private $client 	= null;


	public function __construct($params = ['sid' => '', 'token' => '', 'my_number' => '']) {
		$this->sid 		= $params['sid'];
		$this->token 	= $params['token'];
		$this->my_number= $params['my_number'];

		$this->client 	= new Client($this->sid, $this->token); 
	}

	public function send_message($msg_to = null, $msg_body = null) {
		if(!is_nul($this->client)) {
			if(!is_null($msg_to) && !is_null($msg_body)) {
				# send the message
				$this->client->messages->create($msg_to, ['from' => $this->my_number, 'body' => $msg_body]);
			}
		}
	}

	public function user_welcome_sms($customer = null, $auth_link = "") {
		$str = "Welcome {$customer->_email} to taskwiser.\n";
		$str.= "username: {$customer->_email}\n";
		$str.= "password: {$customer->_password}\n";
		$str.= "{$auth_link}\n";
	}

	public function user_order_confirmed_sms($customer = null, $order = null) {
		$str = "Yourtakswiser order has been confirmed.\n";
		$str.= "task: {$order->_task_name}\n";
		$str.= "quote: {$order->price}\n";
	}

	public function user_tasker_onroute_sms($customer = null, $staff = null, $order = null) {
		$str = "Tasker on route.\n";
		$str.= "Name: {}\n";
		$str.= "Id Number: {}\n";
		$str.= "Mobile #: {}\n";
	}

	public function staff_job_alert($staff = null, $order = null) {
		$str = "New Order.\n";
		$str.= "Task: {}\n";
		$str.= "address: {}\n";
		$str.= "mobile #: {}\n";
	}

}

?>