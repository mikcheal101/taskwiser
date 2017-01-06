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
		$this->loadPages(['emails/welcome_email']);
	}

	public function registration_email($login_url=null, $email=null, $password=null, $username=null) {
		if(!is_null($login_url) && !is_null($email) && !is_null($password) && !is_null($username)) {
			
			$this->data['email']			= $email;
			$this->data['password']			= $password;
			$this->data['username']			= $username;
			$this->data['login_url']		= $login_url;

			$this->data['title'] 			= 'taskwiser welcome email';

			$this->loadPages(['emails/registration']);
		}
	}

	public function quote_email($email=null, $quote=null, $login_url=null, $pay_url=null) {
		if(!is_null($email) && !is_null($quote) && !is_null($login_url) && !is_null($pay_url)) {
			$this->data['email']		= $email;
			$this->data['quote']		= $quote;
			$this->data['login_url']	= $login_url;
			$this->data['pay_url']		= $pay_url;
			$this->data['title'] 		= 'taskwiser order quote email';
			$this->loadPages(['emails/quote_email']);
		}
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
		if(!is_null($email) && !is_null($password) && !is_null($login_url)){
			$this->data['email'] 	= $email;
			$this->data['password']	= $password;
			$this->data['login_url']= $login_url;
			$this->data['title'] 	= 'taskwiser password reset email';
			$this->loadPages(['emails/password_reset']);
		}
	}

	public function updates_email() {}

	public function status_change_email() {}

	private function loadPages($pages = []) {

		if(!is_null($this->cntl)) {
			$this->cntl->load->view('emails/header', $this->data);
			foreach($pages as $page){
				$this->cntl->load->view($page, $this->data);
			}	
			$this->cntl->load->view('emails/footer', $this->data);
		}
	}
}
?>