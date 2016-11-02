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
?>