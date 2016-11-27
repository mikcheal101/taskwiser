<?php

class User extends CI_Controller {
	
	private $_diesel;
	private $_moving;
	private $_handyman;
	private $_cleaner;
	private $_laundry;
	private $_cooking;
	private $_delivery;
	private $_mechanic;
	private $_driver;
	private $_events;
	private $_custom;

	public $data;
	
	public function __construct () {
		parent::__construct ();
		$this->data['categories'] = $this->user_model->getCategories ();
		$this->data['title'] 	= 'taskwiser';
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
			$this->data['location'] = $cat;
			$this->data['title'] 	= $this->data['categories'][$cat]['_name'];
			$this->data['category']	= $this->data['categories'][$cat];

			$this->load->view ('customers/header', $this->data);
			$this->load->view ('customers/next', $this->data);
			$this->load->view ('customers/footer', $this->data);
		}
	}
}
?>