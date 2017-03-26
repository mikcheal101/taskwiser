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
		$this->data['locations'] 	= $this->user_model->getLocations();
		$this->data['title']		= "Taskwiser - Backend";
		$this->data['user']			= $this->session->user;
	}

	public function index() {
		# check if the user is logged in
		$this->loggedIn();
		$this->data['orders']	= $this->user_model->getMyOrders();

		$this->customer_index();
	}

	protected function customer_index()
	{
		$this->data['title']	= "Taskwiser - Payment(s)";
		$this->load->view ('updated/backend/header', $this->data);
		$this->load->view ('updated/backend/user_orders', $this->data);
		$this->load->view ("updated/backend/footer", $this->data);
	}

	protected function admin_index()
	{
		$this->load->view ('admin/header', $this->data);
		$this->load->view ('backend/nav', $this->data);
		$this->load->view ("backend/orders", $this->data);
		$this->load->view ('admin/footer', $this->data);
	}

	public function order($id=0)
	{
		$this->loggedIn();
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

	public function get_payments()
	{
		$customer 	= $this->session->user->_id;
		$payments 	= $this->payments_model->get_customer_payments($customer);
		$this->json_display($payments);
	}

	public function get_orders()
	{
		$customer 	= $this->session->user->_id;
		$orders 	= $this->order_model->get_customer_orders($customer);
		$this->json_display($orders);
	}

	public function get_profile()
	{
		$this->json_display($this->session->user);
	}

	public function update_profile()
	{
		$this->json_display($_POST);
		exit();
		
		$result = $this->user_model->customer_update_profile($customer);
		$this->json_display($result);
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
		if (is_null($this->session->user))
			redirect('auth/login','refresh');
	}

	public function signout () {
		$this->session->sess_destroy();
		redirect('auth/login','refresh');
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

	public function make_payment($transaction_code = null) {
		if(is_null($transaction_code)) {
			show_404();
			exit();
		}

		# check if the transaction exists else return 404
		$exists = $this->user_model->check_if_transaction_exists($transaction_code);
		if(!$exists) {
			show_404();
			exit();
		}

		# fetch the order with the reference code
		$this->data['title']	= "Payment [Credit Card] - {$exists->_transaction_code}";
		$this->data['data']		= $exists;

		$this->load->view ('admin/header', $this->data);
		$this->load->view ('admin/plain_header', $this->data);
		$this->load->view ("backend/payment_page", $this->data);
		$this->load->view ('admin/footer', $this->data);

	}

	public function payment_complete($transaction_code = null) {
		if(is_null($transaction_code)) {
			show_404();
			exit();
		} else {
			$order 	= $this->user_model->confirm_paid($transaction_code);
			if($order && !is_null($order)) {
				$msg_ = "<h5 class='text-center'>";
					$msg_.= "<table class=\"table\" width=\"100%\">";
						$msg_.= "<tr>";
							$msg_.= "<td width=\"40%\" class=\"text-right\">";
								$msg_.= "Order Reference Code:";
							$msg_.= "</td>";
							$msg_.= "<td class=\"text-left\" style=\"padding-left: 20px!important;\">";
								$msg_.= "{$order->_transaction_code}";
							$msg_.= "</td>";
						$msg_.= "</tr>";
						$msg_.= "<tr>";
							$msg_.= "<td width=\"40%\" class=\"text-right\">";
								$msg_.= "For user with email address";
							$msg_.= "</td>";
							$msg_.= "<td class=\"text-left\" style=\"padding-left: 20px!important;\">";
								$msg_.= "<a href='mailto:{$order->customer->_email}'>{$order->customer->_email}</a>";
							$msg_.= "</td>";
						$msg_.= "</tr>";
					$msg_.= "</table>";
				$msg_.= "</h5>";

				$this->data['message'] = [
					'header'	=> "Payment Successfull!",
					'message'	=> $msg_,
				];

				$this->load->view ('customers/header', $this->data);
				$this->load->view ('customers/alert', $this->data);
				$this->load->view ('customers/footer', $this->data);

			} else show_404();
		}
	}


	private function json_display($data = [])
	{
		if(!count($data))
        {
            $this->output
                ->set_status_header(400)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(array()));
        }
        else
        {
            $this->output
                ->set_content_type("application/json", 'utf-8')
                ->set_output(json_encode($data));
        }
	}
}

?>
