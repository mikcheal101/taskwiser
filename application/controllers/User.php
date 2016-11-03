<?php

class User extends CI_Controller {
	
	private $data = [
		'categories' => ['moving', 'diesel', 'cleaner', 'handyman', 'laundry', 'cooking', 'delivery', 'mechanic', 'driver', 'events']
	];

	
	public function __construct () {
		parent::__construct ();
		$this->data['title'] = 'taskwiser';
	}
	
	public function index () {
		$this->data['title'] = 'taskwiser';
		$this->load->view ('customers/header', $this->data);
		$this->load->view ('customers/home', $this->data);
		$this->load->view ('customers/footer', $this->data);
	}

	public function order ($category = 0) {
		if ($category == 0 || $category > count ($this->data['categories'])) {
			show_404();
		} else {
			$cat = $category-1;
			$this->data['title'] = $this->data['categories'][$cat];
			$this->load->view ('customers/header', $this->data);
			$this->load->view ('customers/next', $this->data);
			$this->load->view ('customers/footer', $this->data);
		}
	}
}
?>