<?php

class EmailTemplates {

	private $data = [];
	private $cntl = null;
	public function __construct($controller=null) {
		if(!is_null($controller)){
			$this->cntl = $controller; 
		}
		$this->data['year'] = date('Y');
	}

	public function welcome_mail() {
		$this->data['title'] = 'taskwiser welcome email';
		return $this->loadPages(['emails/welcome_email']);
	}

	public function registration_email($login_url=null, $customer = null) {
		$view = "";

		if(!is_null($login_url) && !is_null($customer)) {
			
			$this->data['email']			= $customer->_email;
			$this->data['password']			= $customer->_pwd;
			$this->data['username']			= $customer->_username;
			$this->data['login_url']		= $login_url;

			$this->data['title'] 			= 'taskwiser welcome email';

			$view = $this->loadPages(['emails/registration']);
		}
		return $view;
	}

	public function quote_email($email=null, $quote=null, $login_url=null, $pay_url=null) {
		$view = "";

		if(!is_null($email) && !is_null($quote) && !is_null($login_url) && !is_null($pay_url)) {
			$this->data['email']		= $email;
			$this->data['quote']		= $quote;
			$this->data['login_url']	= $login_url;
			$this->data['pay_url']		= $pay_url;
			$this->data['title'] 		= 'taskwiser order quote email';
			$view = $this->loadPages(['emails/quote_email']);
		}
		
		return $view;
	}

	public function verification_email($verification_url=null, $email=null) {
		if(!is_null($verification_url) && !is_null($email)) {
			$this->data['email']			= $email;
			$this->data['verification_url']	= $verification_url;
			$this->data['title'] 			= 'taskwiser verification email';
			$this->loadPages(['emails/registration']);
		}
	}

	public function password_reset_email($email=null, $password=null, $login_url=null) {
		$view = "";
		if(!is_null($email) && !is_null($password) && !is_null($login_url)){
			$this->data['email'] 	= $email;
			$this->data['password']	= $password;
			$this->data['login_url']= $login_url;
			$this->data['title'] 	= 'taskwiser password reset email';
			$view = $this->loadPages(['emails/password_reset']);
		}
		return $view;
	}

	public function order_email($customer = null, $order = null) {
		$view			= "";
		if(!is_null($customer) && !is_null($order)) {
			$this->data['email']		= $customer->_email;
			$this->data['order_number']	= $order->_transaction_code;
			$this->data['title']		= "taskwiser - order email";
			$view 						= $this->loadPages(['emails/order_init']);
		} 
		return $view;
	}

	public function updates_email() {}

	public function status_change_email() {}

	private function loadPages($pages = []) {
		$view = "";

		if(!is_null($this->cntl)) {
			$view .= $this->cntl->load->view('emails/header', $this->data, true);
			foreach($pages as $page){
				$view.= $this->cntl->load->view($page, $this->data, true);
			}	
			$view.= $this->cntl->load->view('emails/footer', $this->data, true);
		}
		return $view;
	}
}
?>