<?php
require_once(dirname(__FILE__)."/EmailTemplates.php");

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
	private $email_templates = null;

	public $data;
	
	public function __construct () {
		parent::__construct ();
		$this->data['categories'] 		= $this->user_model->getCategories ();
		$this->data['all_categories']	= $this->user_model->getAllCategories ();
		$this->data['title'] 			= 'taskwiser';
		$this->data['states'] 			= $this->admin_model->getStates();
		$this->email_templates			= new EmailTemplates($this);
	}
	
	public function index () {
		$this->data['title'] = 'taskwiser';
		$this->load->view ('customers/header', $this->data);
		$this->load->view ('customers/home', $this->data);
		$this->load->view ('customers/footer', $this->data);
	}

	public function set_location_cookie($location = null) {
		$expires 		= (int)(time() + 86500);

		$cookie 		= [
			'name' 		=> 'location_cookie',
			'value' 	=> $location,
			'expire' 	=> 14852,
			'domain' 	=> base_url(),
			'path' 		=> '/',
		];
		set_cookie($cookie);
		
		echo json_encode(['cookie_local' => $cookie, 'cookie_general' => get_cookie('location_cookie'), 'time' => $expires]);
	}

	public function padHex($hex) {
		$count 	= $this->_padHex($hex);
		$str 	= "";
		$final 	= "";

		for($i=0; $i<$count; $i++, $str.="0");
		$str.="{$hex}";

		for($j=0; $j<strlen($str); $j++) {
			if($j % 4 === 0 && $j !== 0) $final.= " {$str[$j]}";
			else $final.= "{$str[$j]}";
		}
		return $final;
	}

	private function _padHex ($hex = 0, $position = 2) {
		$base 	= pow(2, $position);
		
		$div_m 	= (int) floor(strlen($hex) / $base);
		$div 	= $div_m === 0;

		$rem_m 	= (int) floor(strlen($hex) % $base);
		$rem 	= $rem_m === 0;

		$next 	= $div && $rem && (int)$rem > 0;
		$count 	= 0;

		if($next) $count = $this->padHex($hex, ($position + 1));  
		else $count = $rem_m;

		return $count;
	}

	private function getOrderFromArray($_id = 0) {
		$categories 	= $this->data['all_categories'];
		
		if ($_id === 0) 
			return null;

		foreach ($categories as $key => $value)
			if($value['_id'] === $_id) 
				return $value;
		
		return null;
	}

	public function order($category = 0) {
		$categories 	= $this->data['all_categories'];
		$category_		= $this->getOrderFromArray($category);
		
		if ($category == 0 || is_null($category_)) 
			show_404();
		else {

			$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
			$this->form_validation->set_rules('name', 'Full Name', 'required|trim|min_length[2]');
			$this->form_validation->set_rules('tel', 'Mobile #', 'required|trim');

			if($this->form_validation->run()) 
				$this->place_order($category);
			else {
				
				$this->data['location'] = $category;

				$this->data['category']	= $category_;
				$this->data['title'] 	= $this->data['category']['_name'];

				$this->load->view ('customers/header', $this->data);
				$this->load->view ('customers/next', $this->data);
				$this->load->view ('customers/footer', $this->data);
			}
		}
	}

	public function place_order($category) {
		# check if the email already exists then create order
		$result 	= $this->user_model->check_customer();
		$_email 	= $this->input->post('email');
		$_tel 		= $this->input->post('tel');
		$name 		= $this->input->post('name');

		if(!$result->boolean) {
			$result->customer 	= $this->generate_customer();
			$result->boolean 	= !is_null($result->customer);
		}

		if($result->boolean) {
			# create order 
			$cust 		= ['category' => $category, 'customer' => $result->customer->_id];
			$order 		= $this->user_model->place_order($cust);

			if($order) {
				# display confirmation page
					$sent_order = $this->sendOrderMail($result->customer, $order);
				if($sent_order) {

					# display the email sent 
					
					$msg_ = "<h5 class='text-center'>";
						$msg_.= "<table class=\"table\" width=\"100%\">";
							$msg_.= "<tr>";
								$msg_.= "<td width=\"40%\" class=\"text-right\">";
									$msg_.= "Order with reference code:";
								$msg_.= "</td>";
								$msg_.= "<td class=\"text-left\" style=\"padding-left: 20px!important;\">";
									$msg_.= "{$order->_transaction_code} has been created!";
								$msg_.= "</td>";
							$msg_.= "</tr>";
							$msg_.= "<tr>";
								$msg_.= "<td width=\"40%\" class=\"text-right\">";
									$msg_.= "For user with email address";
								$msg_.= "</td>";
								$msg_.= "<td class=\"text-left\" style=\"padding-left: 20px!important;\">";
									$msg_.= "<a href='mailto:{$_email}'>{$_email}</a>";
								$msg_.= "</td>";
							$msg_.= "</tr>";
						$msg_.= "</table>";
					$msg_.= "</h5>";
							
					$this->data['message'] = [
						'header'	=> "Order Created!",
						'message'	=> $msg_,
					];

					$this->load->view ('customers/header', $this->data);
					$this->load->view ('customers/alert', $this->data);
					$this->load->view ('customers/footer', $this->data);
				} else show_404();
			} else show_404();
		} else show_404();
	}

	public function silentAuth($id = null, $verification_code = null) {
		redirect('auth/login','refresh');
	}

	public function verifyCustomer($id = null, $verification_code = null) {

		if (!is_null($id) && !is_null($verification_code)) {
			$verified 	= $this->user_model->verifyCustomer($id, $verification_code);
			$login 		= base_url("silent_auth/{$id}/{$verification_code}");

			if($verified->bool) {
				if($this->user_model->customer_verified($verified->row)){
					# display customer verified
					$this->data['message'] = [
						'header' 	=> 'Verification Confirmed!',
						'message'	=> "<h5 class='text-center'>Email Address (<a href='{$verified->row->_email}'>{$verified->row->_email}</a>) Confirmed!</h5><div class='text-center'><a href='{$login}' class='btn btn-success'>login here</a></div>"
					];
					# send verification email
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
		if(isset($this->session->user->_verification_code)){
			redirect('/backend');
		}
		else {
			# authenticate the user
			$this->data['location'] = 0;
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
			$this->form_validation->set_rules('pwd', 'Password', 'required|trim');

			if ($this->form_validation->run ()) {
				$valid = $this->user_model->authenticate ();

				if (is_null($valid)) {
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

	public function register() {
		$this->data['location'] = 0;
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customers._email]');
		$this->form_validation->set_rules('pwd', 'Password', 'required|trim');
		$this->form_validation->set_rules('tel', 'Mobile Number', 'required|trim|is_unique[customers._tel]');
		$this->form_validation->set_rules('re_password', 'Password Confirmation', 'matches[pwd]|trim|min_length[8]');

		if($this->form_validation->run()) {
			#save customer and get back customer details
			$customer 	= $this->user_model->saveCustomer();

			# send an email with the verification link
			$reg 		= $this->sendRegistrationEmail($customer);

			$email 		= $this->input->post('email');

			if($reg) {
				$this->sendRegistrationSms($customer);

				$this->data['message'] = [
					'header'	=> "Welcome to taskwiser.com",
					'message'	=> "<span class='text-center'>An email with a verification link has been sent to {$email}.</span>",
				];

				$this->load->view ('customers/header', $this->data);
				$this->load->view ('customers/alert', $this->data);
				$this->load->view ('customers/footer', $this->data);
			}

		} else {
			$this->load->view ('admin/header', $this->data);
			$this->load->view ('admin/plain_header', $this->data);
			$this->load->view ("admin/sign_up", $this->data);
			$this->load->view ('admin/footer', $this->data);	
		}
	}


	#---------------------------   private functions --------------------------

	private function generate_customer() {
		$customer = $this->user_model->generate_customer();
		
		if(!is_null($customer)) {
			$this->sendRegistrationEmail($customer);
			$this->sendRegistrationSms($customer);
		}
		return $customer;
	}

	private function sendRegistrationSms($customer = null) {
		if (!is_null($customer)) {
			try {
				$_login_url 	= base_url("verify_customer/{$customer->_id}/{$customer->_verification_code}");
				$data = $this->twilio_api->user_welcome_sms($customer, $_login_url);
				log_message('debug', 'registration sms: '.$data);
				return $data;
			} catch(Exception $expt) {
				log_message('error', $expt->getMessage());
				return false;
			}
		} return false;
	}

	private function sendOrderMail($customer = null, $order = null) {
		if(!is_null($customer) && !is_null($order)) {
			try {
				$message = $this->email_templates->order_email($customer, $order);

				$this->email->from('no-reply@taskwiser.com', "TASKWISER");
				$this->email->to($customer->_email);
				$this->email->subject("Order [{$order->_transaction_code}]");
				$this->email->message($message);
				return $this->email->send();
			} catch(Exception $expt) {
				log_message('error', $expt->getMessage());
				return false;
			}
		}
		return false;
	}

	private function sendOrderSms($customer = null, $order = null) {
		try {
			$data = $this->twilio_api->user_order_placed($customer, $order);
			log_message('debug', 'order sms: '.$data);
			return $data;
		} catch(Exception $expt) {
			log_message('error', $expt->getMessage());
			return false;
		}
	}

	private function sendRegistrationEmail($customer = null) {
		if(!is_null($customer)) {
			# send the customer an email 
			try {
				$_login_url 	= "verify_customer/{$customer->_id}/{$customer->_verification_code}";
				$_message 		= $this->email_templates->registration_email($_login_url, $customer);

				$this->email->from('no-reply@taskwiser.com', 'TASKWISER');
				$this->email->to($customer->_email);
				$this->email->subject("Welcome {$customer->_email} to Taskwiser.com");
				$this->email->message($_message);
				return $this->email->send();
			} catch(Exception $expt) {
				log_message('error', $expt->getMessage());
				return false;
			}
		} else log_message('debug', 'sendRegistrationEmail : customer is null');
		return false;	
	}
}
?>