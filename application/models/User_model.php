<?php

class User_model extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function getLocations()
	{
		$loc 			= new stdClass();
		$loc->states 	= $this->db->get_where('locations', ['_main_cat'=>NULL])->result();
		foreach($loc->states as $state) {
			$state->cities = $this->db->get_where('locations', ['_main_cat'=>$state->_id])->result();
		}
		return $loc;
	}

	# this should be deprecated
	public function updateProfile($id)
	{
		# save the data

		$city 		= $this->input->post('state');
		$state 		= $this->db->get_where('locations', ['_id'=>$city])->row();
		$profile 	= [
			'_username' 	=> $this->input->post('email'),
			'_email' 		=> $this->input->post('email'),
			'_tel'			=> $this->input->post('tel'),
			'fullname'		=> $this->input->post('fullname'),
			'address'		=> $this->input->post('address'),
			'_city'			=> $state->_id,
			'_state'		=> $state->_main_cat
		];
		if(strlen($this->input->post('pwd')) > 0)
			$profile['_pwd'] = md5($this->input->post('pwd'));

		$this->db->update('customers', $profile, ['_id'=>$id]);
		$valid = $this->db->get_where('customers', ['_id'=>$id])->row();
		$this->session->set_userdata (['user' => $valid]);
	}

	public function customer_update_profile($customer)
	{
		$this->db->where(["_id" => $customer->_id]);
		if($customer->_password)
		{
			$customer->_pwd = md5($customer->_password);
			unset($customer->_password);
			unset($customer->_re_password);
		}
		$updated	= $this->db->update("customers", $customer);
		return $updated;
	}

	public function getCategories () {
		$parents = $this->db->get_where ('categories', ['_parent' => null])->result_array ();
		foreach ($parents as $key => $parent) {
			$parents[$key]['_children'] = $this->db->get_where ('categories', ['_parent' => $parent['_id']])->result_array ();
		}
		return $parents;
	}

	public function getAllCategories ()
	{
		return [];
	}

	public function check_customer()
	{
		$email 			= $this->input->post('email');
		$obj 			= new stdClass();
		$obj->customer 	= $this->db->get_where('customers', ['_email' => $email])->row();
		$obj->boolean 	= $obj->customer !== NULL;

		# if customer does not exist generate user
		return $obj;
	}

	public function generate_customer()
	{
		$code = md5($this->input->post('email')."/".time());
		$user = [
			'_username' 			=> $this->input->post('email'),
			'fullname'				=> $this->input->post('name'),
			'_email' 				=> $this->input->post('email'),
			'_pwd'					=> substr($code, 5, 11),
			'_verification_code' 	=> substr($code, 12, 25)
		];

		if($this->db->insert('customers', $user)) {
			$id = $this->db->insert_id();
			# send email to the customer
			return $this->db->get_where('customers', ['_id' => $id])->row();
		}
		return null;
	}

	public function saveCustomer()
	{
		$pwd 					= $this->input->post('pwd');
		$customer 				= [
				'_username' 	=> $this->input->post('email'),
				'_email'		=> $this->input->post('email'),
				'_tel'			=> $this->input->post('tel'),
				'_pwd'			=> $pwd,
				'fullname'		=> $this->input->post('fullname'),
				'_verification_code' => substr(md5($pwd), 12, 25)
			];

		if($this->db->insert('customers', $customer)) {
			$customer			= $this->db->get_where('customers', ['_id' => $this->db->insert_id()])->row();
			$customer->_pwd		= $this->input->post('pwd');
			return $customer;
		} else return null;
	}

	private function sort_time($date = null, $time = null)
	{
		$date = null;
		$time = null;
		$string_builder 	= "";
		echo $date;
		if (is_null($date))
			$date 	= date('d.m.y');
		if(is_null($time))
			$time 	= date('G:i a');


		$date 	= DateTime::createFromFormat('j.m.y', $date);
		$date 	= $date->format('Y-m-d');

		$time 	= DateTime::createFromFormat('G:i a', $time);
		$time 	= $time->format('H:i:s a');

		$x		= "{$date} {$time}";
		$x		= DateTime::createFromFormat('Y-m-d H:i:s a', $x);
		$string_builder = $x->format('Y-m-d H:i:s');
		return $string_builder;
	}

	public function place_order($params)
	{

		$time_date 	= $this->sort_time($this->input->post('date'), $this->input->post('time'));

		$order = [
			'_category' 		=> $params['category'],
			'_customer'			=> $params['customer'],
			'rooms'				=> (int)$this->input->post('rooms'),
			'boxes'				=> (int)$this->input->post('boxes'),
			'liters'			=> (int)$this->input->post('liters') ?? 0,
			'shirts'			=> (int)$this->input->post('shirts'),
			'troussers'			=> (int)$this->input->post('troussers'),
			'suits'				=> (int)$this->input->post('suits'),
			'gowns'				=> (int)$this->input->post('gowns'),
			'others'			=> (int)$this->input->post('others'),
			'hours'				=> $this->input->post('hours'),
			'address'			=> $this->input->post('address'),
			'extra'				=> $this->input->post('extra'),
			'delivery_address'	=> $this->input->post('delivery_address'),
			'_ts'				=> $time_date,
		];

		if($this->db->insert('orders', $order)){

			$id = $this->db->insert_id();
			$_transaction_code = "TW-".$this->padHex($id);

			$this->db
				->set(['_transaction_code' => $_transaction_code])
				->where(['_id' => $id])
				->update('orders');
			$data =  $this->db->get_where('orders', ['_id' => $id])->row();
			if($data) {
				$data->customer = $this->db->get_where('customers', ['_id' => $data->_customer])->row();
				$data->task 	= $this->db->get_where('categories', ['_id' => $data->_category])->row();

				$data->customer 	= $this->db->get_where('customers', ['_id' => $data->_customer])->row();
				$data->task 		= $this->db->get_where('categories', ['_id' => $data->_category])->row();
			}
			return $data;
		} else return false;
	}

	public function padHex($hex)
	{
		$count 	= $this->_padHex($hex);
		$str 	= "";
		$final 	= "";

		for($i=0; $i<$count; $i++, $str.="0");
		$str.="{$hex}";

		for($j=0; $j<strlen($str); $j++) {
			if($j % 4 === 0 && $j !== 0) $final.= "-";
			$final.= "{$str[$j]}";
		}
		return $final;
	}

	private function _padHex ($hex = 0, $position = 2)
	{
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

	public function verifyCustomer($id = null, $code = null)
	{
		$obj 		= new stdClass();
		$obj->row 	= $this->db->get_where('customers', ['_id' => $id, '_verification_code' => $code])->row();
		$obj->bool 	= $obj->row !== NULL;
		return $obj;
	}

	public function customer_verified($customer)
	{
		if($customer->_status) {
			return false;
		} else {
			# verify and send true
			$this->sendUserDetails($customer->_pwd);
			$this->db->update('customers',
				[
					'_status' => 1,
					'_pwd' => md5($customer->_pwd),
					'_verification_code' => null
				],
				[
					'_verification_code' => $customer->_verification_code
				]
			);
			return true;
		}
	}

	public function authenticate()
	{
		# check the customers table
		$this->db->select ('*');
		$this->db->where ([
			'_username'	=> $this->input->post ('username'),
			'_pwd'		=> md5 ($this->input->post ('pwd')),
			'_status'	=> 1
		]);
		$this->db->limit (1);
		$auth = $this->db->get ('customers')->row ();
		return isset ($auth) ? $auth : null;
	}

	private function sendUserDetails($pwd)
	{
		return true;
	}

	public function getMyOrders()
	{
		$this->db->order_by('_ts', 'DESC');
		$orders = $this->db->get_where('orders', ['_customer' => $this->session->user->_id])->result();
		foreach($orders as $order) {
			$order->category 	= $this->getCategory($order->_category);
			$order->status 		= $this->db->get_where('request_status', ['_id'=>$order->_status])->row();

			$order->customer 	= $this->db->get_where('customers', ['_id' => $order->_customer])->row();
			$order->task 		= $this->db->get_where('categories', ['_id' => $order->_category])->row();

		}
		return $orders;
	}

	public function getOrder($id=0, $customer=0)
	{
		$order 				= $this->db->get_where('orders', ['_id' => $id, '_customer' => $customer])->row();
		if($order !== NULL) {
			$order->category 	= $this->getCategory($order->_category);
			$order->status 		= $this->db->get_where('request_status', ['_id'=>$order->_status])->row();

			$order->customer 	= $this->db->get_where('customers', ['_id' => $order->_customer])->row();
			$order->task 		= $this->db->get_where('categories', ['_id' => $order->_category])->row();
		}
		return $order;
	}

	private function getCategory($id)
	{
		$cat = $this->db->get_where('categories', ['_id' => $id])->row();
		$item = new stdClass();

		if(!isset($cat->_parent)) {
			# is a parent return category
			$item->parent 	= $cat;
			$item->child 	= null;
		} else {
			# return item with parent
			$item = $this->getCategory($cat->_parent);
			$item->child = $cat;
		}
		return $item;
	}

	public function dropOrder($order)
	{
		return $this->db->delete('orders', ['_id' => $order]);
	}

	public function prepQuote($order_id)
	{
		$data = $this->db->get_where('orders', ['_id'=> $order_id])->row();

		if(!is_null($data))
		{
			$data->customer 	= $this->db->get_where('customers', ['_id' => $data->_customer])->row();
			$data->task 		= $this->db->get_where('categories', ['_id' => $data->_category])->row();

			$data->sub_category 	= $this->db->get_where('categories', ['_id' => $data->_category])->row();

			if(!is_null($data->sub_category->_parent))
			{
				$data->parent = $this->db->get_where('categories', ['_id' => $data->sub_category->_parent])->row();
			} else {
				$data->parent = null;
			}

			if(!is_null($data->_assigned_staff)) {
				$data->staff 	= $this->db->get_where('users', ['id' => $data->_assigned_staff])->row();
			} else $data->staff 	= null;

		}
		return $data;
	}

	public function silentAuth($id = null, $verification_code = null)
	{
		$user = $this->db->get_where('customers',
			['_id' => $id, '_verification_code' => $verification_code])->row();
		return $user;
	}

	public function check_if_transaction_exists($transaction_code = null)
	{
		$this->db->where('_transaction_code', $transaction_code);
		$this->db->where('_status', STATUS_PENDING_PAYMENT);
		$data 	= $this->db->get('orders')->row() ?? false;

		if($data && !is_null($data)) {
			$data->customer 		= $this->db->get_where('customers', ['_id' => $data->_customer])->row();
			$data->category 		= $this->db->get_where('categories', ['_id' => $data->_category])->row();
			$data->staff 			= $this->db->get_where('users', ['id' => $data->_assigned_staff])->row();
		}

		return $data;
	}

	public function confirm_paid($transaction_code = null)
	{
		if(!is_null($transaction_code)) {
			$data 	= $this->db->get_where('orders', [
				'_status' => STATUS_PENDING_PAYMENT,
				'_transaction_code' => $transaction_code])->row();
			if(!is_null($data)) {
				$this->db->update('orders', ['_status' => STATUS_DONE], ['_id' => $data->_id]);
				$data->customer 	= $this->db->get_where('customers', ['_id' => $data->_customer])->row();
			}
			return $data;
		}
		return FALSE;
	}

}
?>
