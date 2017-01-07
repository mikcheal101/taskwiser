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
	private $email_templates;

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

	public function emailTest() {
		$this->email->from('no-reply@taskwiser.com', 'Taskwiser no-reply');
		$this->email->to('hirekaanmicheal@gmail.com');
		$this->email->subject('Testing webmail');
		$this->email->message('This is a welcome message');
		if($this->email->send()) {
			echo ("Email sent!");
		} else {
			echo $this->email->print_debugger();
		}

	}

	public function emailPage() {
		#$this->email_templates->registration_email("http://url", "sample@email.com", "password", "username");
		$this->email_templates->password_reset_email("sample@email.com", "password", "http://");
		
		#$quote = $this->user_model->sample_quote();
		#$this->email_templates->quote_email("sample@email.com", $quote, "http://", "http://");
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
			$order = $this->user_model->place_order(['category' => $category, 'customer' => $result->customer->_id]);
			if($order) {
				# display confirmation page
				if($this->sendOrderMail($result->customer, $order)) {
					# display the email sent 
					$this->data['message'] = [
						'header'	=> 'Email Sent!',
						'message'	=> "<h5 class='text-center'>Email successfully sent to <a href='mailto:{$_email}'>{$_email}</a></h5>",
					];

					$this->load->view ('customers/header', $this->data);
					$this->load->view ('customers/alert', $this->data);
					$this->load->view ('customers/footer', $this->data);
				} else {
					echo "registration email failed!";
					var_dump($this->email->print_debugger());
				}
			} else {
				echo "place order failed!";
				var_dump($order);
			}
		} else 
			echo "check customer failed!";
	}

	public function silentAuth($id = null, $username = null, $verification_code = null) {
		if (!is_null($id) && !is_null($username) && !is_null($verification_code)) {
			$user = null;
			if(!is_null($user = $this->user_model->silentAuth($username, $verification_code))) {
				$this->session->set_userdata (['user' => $user]);
				redirect('backend/','refresh');
			} else {
				$this->session->set_flashdata ('authenticate_error', 'Username / Password Mismatch!');
				redirect('login','refresh');
			}
		}
	}

	private function sendOrderMail($customer, $order) {
		$_quote 		= $this->user_model->prepQuote($order->_id);
		$_login_url 	= base_url("silentAuth/{$customer->_id}/{$customer->_username}/{$customer->_verification_code}");
		$_payment_url 	= base_url();
		$_message		= $this->email_templates->quote_email($customer->_email, $_quote, $_login_url, $_payment_url);

		# send an email to the user showing the username and password
		# with order details
		#$this->email->from('no-reply@taskwiser.com', 'Taskwiser no-reply');
		$this->email->to($customer->_email);
		$this->email->subject("Taskwiser.com Order {$order->_transaction_code}");
		$this->email->message($_message);
		return $this->email->send();
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