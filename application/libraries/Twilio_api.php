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

	protected function send_message($msg_to = null, $msg_body = null) {
		
		if(!is_null($this->client)) {
			if(!is_null($msg_to) && !is_null($msg_body)) {
				$msg_to = trim($msg_to);
				$msg_to	= preg_replace('/\s+/', '', $msg_to);

				if(!substr_compare($msg_to, '+234', 0, 4))
					$msg_to = substr_replace($msg_to, '+234', 0, 1);	
				
				# send the message
				$sent = $this->client->messages->create([
					'To'	=> $msg_to, 
					'From' 	=> $this->my_number, 
					'Body' => $msg_body
				]);
				
				log_message('info', 'sms: '. $sent);
			} else log_message('debug', 'twilio_api: msg_to or msg_body is null');
		} else log_message('debug', 'twilio_api: client is null');
	}

	public function user_welcome_sms($customer = null, $auth_link = "") {
		$str = "Welcome {$customer->_email} to taskwiser.\n";
		$str.= "username: {$customer->_email}\n";
		$str.= "password: {$customer->_pwd}\n";
		$str.= "{$auth_link}\n";
	}

	public function user_order_placed($customer = null, $order = null) {
		if(!is_null($customer) && !is_null($order)) {
			$str = "Order with reference code: {$order->_transaction_code}, has been placed!";
			return $this->send_message($customer->_tel, $str);
		}
		return false;
	}

	public function user_order_confirmed_sms($customer = null, $order = null) {
		if(!is_null($customer) && !is_null($order)) {
			$str = "Yourtakswiser order has been confirmed.\n";
			$str.= "task: {$order->task->_name}\n";
			$str.= "quote: {$order->price}\n";
			return $this->send_message($customer->_tel, $str);
		}
		return false;
	}

	public function user_tasker_onroute_sms($customer = null, $staff = null, $order = null) {
		if(!is_null($customer) && !is_null($order) && !is_null($staff)) {
			$name = $staff->first_name;
			$name.= strlen(trim($staff->middle_name)) > 0 ? " ".trim($staff->middle_name)." " : " ";
			$name.= trim($staff->last_name);

			$str = "Tasker on route.\n";
			$str.= "Name: {$name}\n";
			$str.= "Mobile #: {$staff->_tel}\n";	

			return $this->send_message($customer->_tel, $str);
		}
		return false;
	}

	public function staff_job_alert($staff = null, $order = null) {
		if(!is_null($staff) && !is_null($order)){
			$str = "New Order.\n";
			$str.= "Task: {$order->task->_name}\n";
			$str.= "address: {$order->customer->address}\n";
			$str.= "mobile #: {$order->customer->_tel}\n";
			return $this->send_message($staff->_tel, $str);
		}

		return false;
	}

}

?>