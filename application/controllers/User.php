<?php

class User extends CI_Controller {
	
	private $data = [];
	
	public function __construct () {
		parent::__construct ();
		$this->data['title'] = 'taskwiser';
	}
	
	public function index () {
		$this->data['title'] = 'taskwiser';
		$this->load->view ('customers/home', $this->data);
	}

	public function order ($category = 0) {
		if ($category == 0) {
			show_404();
		} else {
			$this->load->view ('customers/next', $this->data);
		}
	}
}
?>