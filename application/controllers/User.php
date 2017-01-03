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
		$this->data['categories'] 		= $this->user_model->getCategories ();
		$this->data['all_categories']	= $this->user_model->getAllCategories ();
		$this->data['title'] 			= 'taskwiser';
		$this->data['states'] 			= $this->admin_model->getStates();
	}
	
	public function index () {
		$this->data['title'] = 'taskwiser';
		$this->load->view ('customers/header', $this->data);
		$this->load->view ('customers/home', $this->data);
		$this->load->view ('customers/footer', $this->data);
	}

	public function order ($category = 0) {
		
		if ($category == 0 || $category > count ($this->data['all_categories'])) {
			show_404();
		} else {

			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');

			if($this->form_validation->run()) {
				$this->place_order($category);
			} else {
				$categories 			= $this->data['all_categories'];
				$this->data['location'] = $category;

				$this->data['category']	= $categories[array_search($category, array_column($categories, '_id'))];
				$this->data['title'] 	= $this->data['category']['_name'];

				$this->load->view ('customers/header', $this->data);
				$this->load->view ('customers/next', $this->data);
				$this->load->view ('customers/footer', $this->data);
			}
		}
	}

	public function place_order($category) {
		# check if the email already exists then create order
		$result = $this->user_model->check_customer();
		$_email = $this->input->post('email');
		if($result->boolean) {
			# create order 
			if($this->user_model->place_order(['category' => $category, 'customer' => $result->customer])) {
				# display confirmation page
				if($this->user_model->sendRegistrationMail($result->customer)) {
					# display the email sent 
					$this->data['message'] = [
						'header'	=> 'Email Sent!',
						'message'	=> "<h5 class='text-center'>Email successfully sent to <a href='mailto:{$_email}'>{$_email}</a></h5>",
					];

					$this->load->view ('customers/header', $this->data);
					$this->load->view ('customers/alert', $this->data);
					$this->load->view ('customers/footer', $this->data);
				} else echo "registration email failed!";
			} else echo "place order failed!";
		} else echo "check customer failed!";
	}

	public function verifyCustomer($verification_code=0){
		if ($verification_code !== 0) {
			$verified 	= $this->user_model->verifyCustomer($verification_code);
			$login 		= base_url('login');
			if($verified->bool) {
				if($this->user_model->customer_verified($verified->row)){
					# display customer verified
					$this->data['message'] = [
						'header' 	=> 'Verification Confirmed!',
						'message'	=> "<h5 class='text-center'>Email Address (<a href='{$verified->row->_email}'>{$verified->row->_email}</a>) Confirmed!</h5><div class='text-center'><a href='{$login}' class='btn btn-success'>login here</a></div>"
					];
				} else {
					$this->data['message'] = [
						'header' 	=> 'Verification Code Expired!',
						'message'	=> "<h5 class='text-center'>This email address (<a href='{$verified->row->_email}'>{$verified->row->_email}</a>) has already been confirmed!</h5><div class='text-center'><a href='{$login}' class='btn btn-success'>login here</a></div>"
					];
				}
			} else {
				# display error in verification code
				$this->data['message'] = [
					'header' 	=> 'Verification Code Error!',
					'message'	=> "<h5 class='text-center'>Please, this is a wrong verification link.<br>Kindly, check your email box for the correct verification link.</h5>"
				];
			}

			$this->load->view ('customers/header', $this->data);
			$this->load->view ('customers/alert', $this->data);
			$this->load->view ('customers/footer', $this->data);
		} else show_404();
	}

	public function cancel_order($id=0) {}

	public function confirm_completion() {}

	public function login() {
		# authenticate the user
		$this->data['location'] = 0;
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run ()) {
			$valid = $this->user_model->authenticate ();

			if ($valid === NULL) {
				$this->session->set_flashdata ('authenticate_error', 'Username / Password Mismatch!');
				redirect('login','refresh');
			} else {
				$this->session->set_userdata (['user' => $valid]);
				redirect('backend/','refresh');
			}
		} else {
			$this->load->view ('admin/header', $this->data);
			$this->load->view ('admin/plain_header', $this->data);
			$this->load->view ("admin/authenticate", $this->data);
			$this->load->view ('admin/footer', $this->data);
		}
	}
}
?>