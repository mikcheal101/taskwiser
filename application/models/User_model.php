<?php

class User_model extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function getLocations() {
		$loc 			= new stdClass();
		$loc->states 	= $this->db->get_where('locations', ['_main_cat'=>NULL])->result();
		foreach($loc->states as $state) {
			$state->cities = $this->db->get_where('locations', ['_main_cat'=>$state->_id])->result();
		}
		return $loc;
	}

	public function updateProfile($id) {
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

	public function getCategories () {
		$parents = $this->db->get_where ('categories', ['_parent' => null])->result_array ();
		foreach ($parents as $key => $parent) {
			$parents[$key]['_children'] = $this->db->get_where ('categories', ['_parent' => $parent['_id']])->result_array ();
		}
		return $parents;
	}

	public function getAllCategories () {
		$this->db->order_by('_id', 'asc');
		$categories = $this->db->get('categories')->result_array();
		foreach ($categories as $key => $category) {
			$this->db->select('_question');
			$parent = $category['_parent'] == NULL ? $category['_id'] : $category['_parent'];
			$result = $this->db->get_where('category_question', ['_category' => $parent])->result();
			$categories[$key]['questions'] = $result;
		}
		return $categories;
	}

	public function check_customer() {
		$email 			= $this->input->post('email');
		$obj 			= new stdClass();
		$obj->customer 	= $this->db->get_where('customers', ['_email' => $email])->row();
		$obj->boolean 	= $obj->customer !== NULL;

		if (!$obj->boolean) {
			$obj->customer 	= $this->generate_user();
			$obj->boolean 	= ($obj->customer->_id > 0);
		} 
		return $obj;
	}

	public function place_order($params) {
		$order = [
			'_category' => $params['category'],
			'_customer'	=> $params['customer'],
			'rooms'		=> $this->input->post('rooms'),
			'boxes'		=> $this->input->post('boxes'),
			'liters'	=> $this->input->post('liters'),
			'shirts'	=> $this->input->post('shirts'),
			'troussers'	=> $this->input->post('troussers'),
			'suits'		=> $this->input->post('suits'),
			'gowns'		=> $this->input->post('gowns'),
			'others'	=> $this->input->post('others'),
			'hours'		=> $this->input->post('hours'),
			'address'	=> $this->input->post('address'),
			'extra'		=> $this->input->post('extra'),
			'delivery_address'	=> $this->input->post('delivery_address'),
		];

		if($this->db->insert('orders', $order)){

			$id = $this->db->insert_id();
			$_transaction_code = $this->padHex($id);

			$this->db
				->set(['_transaction_code' => $_transaction_code])
				->where(['_id' => $id])
				->update('orders');
			$data =  $this->db->get_where('orders', ['_id' => $id])->row();
			return $data;
		} else return false;
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

	private function generate_user() {
		$code = md5($this->input->post('email')."/".time());
		$user = [
			'_username' => $this->input->post('email'),
			'_email' => $this->input->post('email'), 
			'_pwd'	=> substr($code, 5, 11),
			'_verification_code' => substr($code, 12, 25)
		];
		
		if($this->db->insert('customers', $user)) {
			$id = $this->db->insert_id();	
			return $this->db->get_where('customers', ['_id' => $id])->row();
		}
		return null;
	}

	

	public function verifyCustomer($code) {
		$obj 		= new stdClass();
		$obj->row 	= $this->db->get_where('customers', ['_verification_code' => $code])->row();
		$obj->bool 	= $obj->row !== NULL;
		return $obj;
	}

	public function customer_verified($customer) {
		if($customer->_status) {
			return false;
		} else {
			# verify and send true
			$this->sendUserDetails($customer->_pwd);
			$this->db->update('customers', ['_status' => 1, '_pwd' => md5($customer->_pwd)], 
				['_verification_code' => $customer->_verification_code]);
			return true;
		}
	}

	public function authenticate() {
		# check the customers table
		$this->db->select ('*');
		$this->db->where ([
			'_username'	=> $this->input->post ('username'),
			#'_pwd'		=> md5 ($this->input->post ('password')),
			'_status'	=> 1
		]);
		$this->db->limit (1);
		$auth = $this->db->get ('customers')->row ();
		
		return isset ($auth) ? $auth : null;
	}

	private function sendUserDetails($pwd) {
		return true;
	}

	public function getMyOrders() {
		$this->db->order_by('_ts', 'DESC');
		$orders = $this->db->get_where('orders', ['_customer' => $this->session->user->_id])->result();
		foreach($orders as $order) {
			$order->category 	= $this->getCategory($order->_category);
			$order->status 		= $this->db->get_where('request_status', ['_id'=>$order->_status])->row(); 
		}
		return $orders;
	}

	public function getOrder($id=0, $customer=0) {
		$order 				= $this->db->get_where('orders', ['_id' => $id, '_customer' => $customer])->row();
		if($order !== NULL) {
			$order->category 	= $this->getCategory($order->_category);
			$order->status 		= $this->db->get_where('request_status', ['_id'=>$order->_status])->row();
		}
		return $order;
	}

	private function getCategory($id) {
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

	public function dropOrder($order) {
		return $this->db->delete('orders', ['_id' => $order]);
	}

	public function getMyPayments() {
		$this->db->order_by('_ts', 'DESC');
		$payments = $this->db->get_where('payments', ['_customer' => $this->session->user->_id])->result();
		return $payments;
	}

	public function sample_staff() {
		$this->db->limit(1);
		$data = $this->db->get_where('users', ['id !=' => 1])->row();
		return $data;
	}

	public function prepQuote($order_id) {
		$this->db->limit(1);
		$data = $this->db->get_where('orders', ['_id'=> $order_id])->row();

		if(!is_null($data)) {
			$data->sub_category 	= $this->db->get_where('categories', ['_id' => $data->_category])->row();

			if(!is_null($data->sub_category->_parent)){
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

	public function silentAuth($id = null, $username = null, $verification_code = null) {
		$user = $this->db->get_where('customers', 
			['_id' => $id, 'username' => $username, '_verification_code' => $verification_code])->row();
		return $user;
	}

	public function sample_quote() {
		$this->db->limit(1);
		$data = $this->db->get_where('orders', ['_id'=> 29])->row();

		if(!is_null($data)) {
			$data->sub_category 	= $this->db->get_where('categories', ['_id' => $data->_category])->row();

			if(!is_null($data->sub_category->_parent)){
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
}
?>