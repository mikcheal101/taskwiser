<<<<<<< HEAD
<?php

class Admin_model extends CI_Model {
	
	public function __construct () {
		parent::__construct ();
	}

	public function authenticate () {
		$this->db->select ('*');
		$this->db->where ([
			'username'	=> $this->input->post ('username'),
			'password'	=> md5 ($this->input->post ('password'))
		]);
		$this->db->limit (1);
		$auth = $this->db->get ('users')->row ();
		
		return isset ($auth) ? $auth : null;
	}

	public function getStates () {
		$states = $this->db->get_where('locations', ['_main_cat'=>null])->result_array();
		foreach($states as $key=>$state){
			$states[$key]['cities'] = $this->db->get_where('locations', ['_main_cat'=>$state['_id']])->result_array();
		}
		return $states;
	}

	public function getCity($id) {
		$return = $this->db->get_where('locations', ['_id'=>$id])->row_array();
		return $return;
	}

	public function getTasks() {
		$this->db->where('_parent IS NULL', null, false);
		$tasks = $this->db->get('categories')->result();
		foreach ($tasks as $key =>  $task) {
			$task->children = $this->db->get_where('categories', ['_parent' => $task->_id])->result();
		}
		return $tasks;
	}

	public function deleteState ($id){
		return $this->db->delete('locations', ['_id' => $id]);
	}

	public function editState ($id) {
		$state = [];
		$state['_name'] 	= $this->input->post('name');
		$state['is_state']	= is_null($this->input->post('is_state')) ? false : true;
		$state['_main_cat']	= !is_null($this->input->post('is_state')) ? null : (int)$this->input->post('_main_cat');
		return $this->db->update('locations', $state, ['_id'=>$id]);
	}

	public function saveState () {
		$state = [];
		$state['_name'] 	= $this->input->post('name');
		$state['is_state']	= is_null($this->input->post('is_state')) ? false : true;
		$state['_main_cat']	= !is_null($this->input->post('is_state')) ? null : (int)$this->input->post('_main_cat');
		
		return (boolean)$this->db->insert('locations', $state);
	}

	public function loadOrders() {
		$this->db->order_by('_ts', 'DESC');
		$orders = $this->db->get_where('orders')->result();
		foreach($orders as $order) {
			$order->category 	= $this->getCategory($order->_category);
			$order->status 		= $this->db->get_where('request_status', ['_id'=>$order->_status])->row(); 
		}
		return $orders;
	}

	public function loadOrder($id=0) {
		$order 				= $this->db->get_where('orders', ['_id' => $id])->row();
		var_dump($this->db->last_query());
		if($order !== NULL) {
			$order->category 	= $this->getCategory($order->_category);
			$order->status 		= $this->db->get_where('request_status', ['_id'=>$order->_status])->row();
			$order->customer	= $this->db->get_where('customers', ['_id' => $order->_customer])->row();
			$order->worker 		= $this->db->get_where('users', ['id' => $order->_assigned_staff])->row();
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

	public function requests () {
		$query = $this->db->query (`
			SELECT 
				r.id AS __id, r.name, r.details, r.status, s.name, u.username
			FROM
				request_status as s, 
				requests as r
				request_user as ra 
				left outer join users as u on u.id = ra.user AND ra.request = r.id
			WHERE 
				r.status = s.id
			ORDER BY r.ts DESC
		`);
		
		return $query->result ();
	}

	public function request ($id=0) {
		$query = $this->db->query (`
			SELECT 
				r.id AS __id, r.name, r.details, r.status, s.name, u.username
			FROM
				request_status as s, 
				requests as r
				request_user as ra 
				left outer join users as u on u.id = ra.user AND ra.request = r.id
			WHERE 
				r.status = s.id AND r.id = {$id}
			LIMIT 1
		`);
		
		return $query->row ();
	}

	public function approve_request($id) {
		# check if the data exists
		$this->db->update('orders', [
			'_assigned_staff'=>$this->input->post('staff'), 
			'price'=>$this->input->post('amount'), 
			'_status' => 6], ['_id' => $id]);
	}

	public function workers ($limit = 0) {
		$offset = 10 * $limit;
		$this->db->select ("u.id as _id, u.username, u.profile_image, u.first_name, u.last_name, u.middle_name, u.email, u.address, u.notes,
				(select count(*) from users) as counter");
		$this->db->where ('u.usertype!=', 1);
		$this->db->order_by ('u.username', 'DESC');
		$this->db->limit ($offset, 10);
		
		$workers = $this->db->get ('users as u')->result ();
		return $workers;
	}

	public function worker ($id=0) {
		$this->db->select ("u.id as _id, u.password, u.username, u.profile_image, u.first_name, u.last_name, u.middle_name, u.email, u.address, u.notes");
		$this->db->where (['u.usertype!=' => 1, 'u.id'=>$id]);
		$this->db->limit (1);
		
		$worker = $this->db->get ('users as u')->row ();
		if($worker) {
			$this->db->select('_task');
			$worker->tasks = $this->db->get_where('worker_tasks', ['_worker' => $worker->_id])->result();
		}
		return $worker;
	}

	public function updateWorker ($id=0, $password='', $profile_image) {
		$password = (strlen ($this->input->post ('pwd')) > 0) ? md5 ($this->input->post ('pwd')) : $password;

		$worker = [
			'first_name'		=> $this->input->post ('first_name'),
			'middle_name'		=> $this->input->post ('middle_name'),
			'last_name'			=> $this->input->post ('last_name'),
			'email'				=> $this->input->post ('email'),
			'username'			=> $this->input->post ('username'),
			'password'			=> md5 ($this->input->post ('password')),
			'address'			=> $this->input->post ('address'),
			'notes'				=> $this->input->post ('notes'),
		];
		if($profile_image)
			$worker['profile_image'] = "{$profile_image}";

		$this->db->trans_begin();
		# insert worker
		$this->db->update ('users', $worker, ['id' => $id]);
		$this->db->delete('worker_tasks', ['_worker' => $id]);

		$categories = $this->input->post('categories[]');
		foreach($categories as $category) {
			$this->db->insert('worker_tasks', ['_worker'=>$id, '_task'=>(int)$category]);
		}
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	public function valid_email ($email ='', $id =0) {
		$this->db->limit (1);
		$valid = $this->db->get_where ('users', ['email' => $email, 'id!=' => $id])->row () === NULL;

		#echo $this->db->last_query ();
		return $valid;
	}

	public function valid_username ($username ='', $id =0) {
		$this->db->limit (1);
		$valid = $this->db->get_where ('users', ['username' => $username, 'id!=' => $id])->row () === NULL;
		return $valid;
	}

	public function createWorker ($profile_image) {
		$worker = [
			'first_name'		=> $this->input->post ('first_name'),
			'middle_name'		=> $this->input->post ('middle_name'),
			'last_name'			=> $this->input->post ('last_name'),
			'email'				=> $this->input->post ('email'),
			'username'			=> $this->input->post ('username'),
			'password'			=> md5 ($this->input->post ('password')),
			'address'			=> $this->input->post ('address'),
			'notes'				=> $this->input->post ('notes'),
		];
		if($profile_image)
			$worker['profile_image'] = "{$profile_image}";

		$this->db->trans_begin();
		# insert worker
		$this->db->insert('users', $worker);
		$id = $this->db->insert_id();
		$categories = $this->input->post('categories[]');

		foreach($categories as $category) {
			$this->db->insert('worker_tasks', ['_worker'=>$id, '_task'=>(int)$category]);
		}
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	public function dropWorker ($id=0) {
		return $this->db->delete ('users', ['id' => $id]);
	}

	public function makerequest () {
		$request = [
			'task' 			=> $this->input->post ('task'),
			'sub_cat'		=> $this->input->post ('sub_cat'),
			'description'	=> $this->input->post ('description'),
			'hours'			=> $this->input->post ('hours'),
			'come_date'		=> $this->input->post ('come_date'),
			'come_time'		=> $this->input->post ('come_time'),
			'email'			=> $this->input->post ('email'),
			'zip'			=> $this->input->post ('zip'),
			'funiture_sm'	=> $this->input->post ('funiture_sm'),
			'funiture_md' 	=> $this->input->post ('funiture_md'),
			'funiture_lg'	=> $this->input->post ('funiture_lg'),
			'moving_pro'	=> $this->input->post ('moving_pro'),
			'diesel_qty'	=> $this->input->post ('diesel_qty'),
			'bed_room'		=> $this->input->post ('bed_room'),
			'bath_room'		=> $this->input->post ('bath_room'),
			'mech_car_make'	=> $this->input->post ('car_make'),
			'mech_car_year'	=> $this->input->post ('car_year'),
			'mech_car_model'=> $this->input->post ('car_model'),
			'mech_engine_type'	=> $this->input->post ('engine_type'),
			'mech_issue'	=> $this->input->post ('issue'),
		];
	}

	public function task ($cat=0, $sub=0) {
		$this->order_by ('name', 'DESC');
		return $this->db->get_where ('task', ['category' => $cat, 'sub'=>$sub])->result ();
	}

	public function update_profile ($image = '') {
		$password = strlen ($this->input->post ('pwd')) > 0 ? md5 ($this->input->post ('pwd')) : $this->session->user->password;
		$image    = strlen ($image) > 0 ? $image : $this->session->user->profile_image;

		$profile = [
			'username' 	=> $this->input->post ('username'),
			'password'	=> $password,
			'email'		=> $this->input->post ('email'),
			'profile_image' => $image,
		];
		$done 					= [];
		$done['status'] 		= $this->db->update ('users', $profile, ['id' => $this->session->user->id]);
		$done['profile_image'] 	= $image;
		$done['email']			= $this->input->post ('email');
		$done['username']		= $this->input->post ('username');

		return $done;
	}

	public function profile () {
		$this->db->where (['id'=>$this->session->user->id]);
		$this->db->limit (1);
		$user = $this->db->get('users')->row();
		$user->pwd = '';
		return $user;
	}
}
=======
<?php

class Admin_model extends CI_Model {
	
	public function __construct () {
		parent::__construct ();
	}

	public function authenticate () {
		$this->db->select ('*');
		$this->db->where ([
			'username'	=> $this->input->post ('username'),
			'password'	=> md5 ($this->input->post ('password'))
		]);
		$this->db->limit (1);
		$auth = $this->db->get ('users')->row ();
		
		return isset ($auth) ? $auth : null;
	}

	public function requests () {
		$query = $this->db->query (`
			SELECT 
				r.id AS __id, r.name, r.details, r.status, s.name, u.username
			FROM
				request_status as s, 
				requests as r
				request_user as ra 
				left outer join users as u on u.id = ra.user AND ra.request = r.id
			WHERE 
				r.status = s.id
			ORDER BY r.ts DESC
		`);
		
		return $query->result ();
	}

	public function request ($id=0) {
		$query = $this->db->query (`
			SELECT 
				r.id AS __id, r.name, r.details, r.status, s.name, u.username
			FROM
				request_status as s, 
				requests as r
				request_user as ra 
				left outer join users as u on u.id = ra.user AND ra.request = r.id
			WHERE 
				r.status = s.id AND r.id = {$id}
			LIMIT 1
		`);
		
		return $query->row ();
	}

	public function workers ($limit = 0) {
		$offset = 10 * $limit;
		$this->db->select ("u.id as __id, u.username, u.profile_image, u.first_name, u.last_name, u.middle_name, u.email, u.address, u.notes,
				(select count(*) from users) as counter");
		$this->db->where ('u.usertype!=', 1);
		$this->db->order_by ('u.username', 'DESC');
		$this->db->limit ($offset, 10);
		
		$workers = $this->db->get ('users as u')->result ();
		return $workers;
	}

	public function worker ($id=0) {
		$this->db->select ("u.id as __id, u.username, u.password, u.profile_image, u.first_name, u.last_name, u.middle_name, u.email, u.address, u.notes, u.task");
		$this->db->where (['u.usertype!=' => 1, 'u.id'=>$id]);
		$this->db->limit (1);
		
		$worker = $this->db->get ('users as u')->row ();
		if ($worker) $worker->pwd = null;
		return $worker;
	}

	public function updateWorker ($id=0, $password='', $profile_image) {
		$password = (strlen ($this->input->post ('pwd')) > 0) ? md5 ($this->input->post ('pwd')) : $password;

		$worker = [
			'first_name'		=> $this->input->post ('first_name'),
			'middle_name'		=> $this->input->post ('middle_name'),
			'last_name'			=> $this->input->post ('last_name'),
			'email'				=> $this->input->post ('email'),
			'username'			=> $this->input->post ('username'),
			'password'			=> $password,
			'address'			=> $this->input->post ('address'),
			'notes'				=> $this->input->post ('notes'),
			'profile_image'		=> $profile_image,
			'task'				=> $this->input->post ('activity'),
		];

		return ['status' => $this->db->update ('users', $worker, ['id' => $id])];
	}

	public function valid_email ($email ='', $id =0) {
		$this->db->limit (1);
		$valid = $this->db->get_where ('users', ['email' => $email, 'id!=' => $id])->row () === NULL;

		#echo $this->db->last_query ();
		return $valid;
	}

	public function valid_username ($username ='', $id =0) {
		$this->db->limit (1);
		$valid = $this->db->get_where ('users', ['username' => $username, 'id!=' => $id])->row () === NULL;
		return $valid;
	}

	public function createWorker ($profile_image) {
		$worker = [
			'first_name'		=> $this->input->post ('first_name'),
			'middle_name'		=> $this->input->post ('middle_name'),
			'last_name'			=> $this->input->post ('last_name'),
			'email'				=> $this->input->post ('email'),
			'username'			=> $this->input->post ('username'),
			'password'			=> md5 ($this->input->post ('password')),
			'address'			=> $this->input->post ('address'),
			'notes'				=> $this->input->post ('notes'),
			'profile_image'		=> $profile_image,
			'task'				=> $this->input->post ('activity'),
		];
		return ['status' => $this->db->insert ('users', $worker)];
	}

	public function dropWorker ($id=0) {
		return $this->db->delete ('users', ['id' => $id]);
	}

	public function makerequest () {
		$request = [
			'task' 			=> $this->input->post ('task'),
			'sub_cat'		=> $this->input->post ('sub_cat'),
			'description'	=> $this->input->post ('description'),
			'hours'			=> $this->input->post ('hours'),
			'come_date'		=> $this->input->post ('come_date'),
			'come_time'		=> $this->input->post ('come_time'),
			'email'			=> $this->input->post ('email'),
			'zip'			=> $this->input->post ('zip'),
			'funiture_sm'	=> $this->input->post ('funiture_sm'),
			'funiture_md' 	=> $this->input->post ('funiture_md'),
			'funiture_lg'	=> $this->input->post ('funiture_lg'),
			'moving_pro'	=> $this->input->post ('moving_pro'),
			'diesel_qty'	=> $this->input->post ('diesel_qty'),
			'bed_room'		=> $this->input->post ('bed_room'),
			'bath_room'		=> $this->input->post ('bath_room'),
			'mech_car_make'	=> $this->input->post ('car_make'),
			'mech_car_year'	=> $this->input->post ('car_year'),
			'mech_car_model'=> $this->input->post ('car_model'),
			'mech_engine_type'	=> $this->input->post ('engine_type'),
			'mech_issue'	=> $this->input->post ('issue'),
		];
	}

	public function task ($cat=0, $sub=0) {
		$this->order_by ('name', 'DESC');
		return $this->db->get_where ('task', ['category' => $cat, 'sub'=>$sub])->result ();
	}

	public function update_profile ($image = '') {
		$password = strlen ($this->input->post ('pwd')) > 0 ? md5 ($this->input->post ('pwd')) : $this->session->user->password;
		$image    = strlen ($image) > 0 ? $image : $this->session->user->profile_image;

		$profile = [
			'username' 	=> $this->input->post ('username'),
			'password'	=> $password,
			'email'		=> $this->input->post ('email'),
			'profile_image' => $image,
		];
		$done 					= [];
		$done['status'] 		= $this->db->update ('users', $profile, ['id' => $this->session->user->id]);
		$done['profile_image'] 	= $image;
		$done['email']			= $this->input->post ('email');
		$done['username']		= $this->input->post ('username');

		return $done;
	}

	public function profile () {
		$this->db->where (['id'=>$this->session->user->id]);
		$this->db->limit (1);
		$user = $this->db->get('users')->row();
		$user->pwd = '';
		return $user;
	}
}
>>>>>>> origin/master
?>