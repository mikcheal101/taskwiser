<?php

class Backend extends CI_Controller {

	private $data = [
		'title' 	=> 'taskwiser admin panel v.1.0.0',
		'location'	=> 1,
		'workers'	=> [],
		'tasks'		=> [],
		'requests'	=> [],
	];

	public function __construct() {
		parent::__construct();
		$this->data['locations'] = $this->user_model->getLocations();
	}

	public function index() {
		# check if the user is logged in
		$this->loggedIn();
		$this->data['orders']	= $this->user_model->getMyOrders();
		#print_r($this->data['orders']);

		$this->load->view ('admin/header', $this->data);
		$this->load->view ('backend/nav', $this->data);
		$this->load->view ("backend/orders", $this->data);
		$this->load->view ('admin/footer', $this->data);
	}

	public function order($id=0) {
		$order = new stdClass();
		if($id === 0) show_404();
		else{
			if(($order = $this->user_model->getOrder($id, $this->session->user->_id)) !== NULL) {
				# display order
				$this->data['order'] = $order;
				$this->load->view ('admin/header', $this->data);
				$this->load->view ('backend/nav', $this->data);
				$this->load->view ("backend/order", $this->data);
				$this->load->view ('admin/footer', $this->data);
			} else {
				show_404();
			}
		}
	}

	public function payments() {
		$this->loggedIn();
		$this->data['location'] = 2;
		$this->data['payments'] = $this->user_model->getMyPayments();

		$this->load->view ('admin/header', $this->data);
		$this->load->view ('backend/nav', $this->data);
		$this->load->view ("backend/payments", $this->data);
		$this->load->view ('admin/footer', $this->data);
	}

	public function profile() {
		$this->loggedIn();
		$this->data['location'] = 3;
		$this->data['profile']	= $this->session->user;

		$this->form_validation->set_rules("email", "Email Address", "required|trim|valid_email");
		$this->form_validation->set_rules("tel", "Telephone Number", "required|trim");
		$this->form_validation->set_rules("state", "State & Location", "required|numeric");
		$this->form_validation->set_rules("address", "Address", "required");

		if($this->form_validation->run()){
			$this->user_model->updateProfile($this->session->user->_id);
			# refresh page
			$this->data['profile']	= $this->session->user;
			redirect('backend/profile', 'refresh');
		} else {
			$this->load->view ('admin/header', $this->data);
			$this->load->view ('backend/nav', $this->data);
			$this->load->view ("backend/profile", $this->data);
			$this->load->view ('admin/footer', $this->data);
		}
	}

	private function loggedIn () {
		if ($this->session->user === NULL) 
			redirect('login','refresh');
	}

	public function signout () {
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	public function dropOrder($order) {
		# delete the item and return to the home
		if($this->user_model->dropOrder($order)){
			redirect('/backend', 'refresh');
		} else {
			show_404();
		}
	}

	public function signUp() {
		$this->load->view ('admin/header', $this->data);
		$this->load->view ('admin/plain_header', $this->data);
		$this->load->view ("admin/authenticate", $this->data);
		$this->load->view ('admin/footer', $this->data);
	}

	public function enterCreditCard($transaction_code = "") {

		# fetch the order with the reference code
		$this->data['title']	= "Payment [Credit Card]";
		$this->data['amount']	= 200;

		$this->form_validation->set_rules('ccnumb', 'Credit Card Number', 'required|trim|min_length[10]');
		$this->form_validation->set_rules('cvv', 'CVV','required|numeric|trim|max_length[4]|min_length[3]');
		$this->form_validation->set_rules('pin', 'PIN', 'required|numeric|trim|max_length[6]|min_length[4]');
		$this->form_validation->set_rules('expiry', 'Expiry Date','required|trim|max_length[5]|min_length[5]');

		if($this->form_validation->run()) {
			unset($_POST);
			# make payment
			$this->enterOTP();
		} else {
			$this->load->view ('admin/header', $this->data);
			$this->load->view ('admin/plain_header', $this->data);
			$this->load->view ("backend/credit_card", $this->data);
			$this->load->view ('admin/footer', $this->data);
		}
	}

	public function enterOTP() {
		$this->data['title']	= "Payment [One Time Password]";

		$this->form_validation->set_rules('otp', 'OTP','required|trim');

		if($this->form_validation->run()) {
			
			var_dump($_POST);

		} else {
			$this->load->view ('admin/header', $this->data);
			$this->load->view ('admin/plain_header', $this->data);
			$this->load->view ("backend/enter_otp", $this->data);
			$this->load->view ('admin/footer', $this->data);
		}
	}
}

?>