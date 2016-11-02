<?php

class Admin extends CI_Controller {

	public $data = [
		'title' 	=> 'taskwiser admin panel v.1.0.0',
		'location'	=> 1,
		'workers'	=> [],
		'tasks'		=> [],
		'requests'	=> [],
	];

	public function __construct () {
		parent::__construct ();
	}

	private function loggedIn () {
		if ($this->session->user === NULL) 
			redirect('admin/login','refresh');
	}

	public function signout () {
		$this->session->sess_destroy();
		redirect('admin/login','refresh');
	}

	public function index () {
		$this->loggedIn ();
		
		$this->data['location'] = 1;
		$this->page ('home');
	}

	public function login () {
		$this->data['location'] = 0;
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run ()) {
			$valid = $this->admin_model->authenticate ();

			if ($valid === NULL) {
				$this->session->set_flashdata ('authenticate_error', 'Username / Password Mismatch!');
				redirect('admin/login','refresh');
			} else {
				$this->session->set_userdata (['user' => $valid]);
				redirect('admin/','refresh');
			}
		} else {
			$this->load->view ('admin/header', $this->data);
			$this->load->view ("admin/login", $this->data);
			$this->load->view ('admin/footer', $this->data);
		}
	}

	public function workers ($limit = 0) {
		$this->loggedIn ();
		$this->data['location'] = 2;
		$workers = $this->admin_model->workers ($limit);

		if (count($workers) < 1) {

		} else {
			$this->data['workers'] = $workers;
			$this->page ('workers');
		}
		
	}

	public function worker ($id = 0) {
		$this->loggedIn ();
		$this->data['location'] = 2;
		$this->data['worker'] = $this->worker = $this->admin_model->worker ($id);


		if (!$this->data['worker']) show_404 ();
		else {
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
			$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
			$this->form_validation->set_rules('pwd', 'Password', 'trim|min_length[6]');
			$this->form_validation->set_rules('address', 'Address', 'required|trim');
			$this->form_validation->set_rules('notes', 'Extra Notes', 'required|trim');
			$this->form_validation->set_rules('activity', 'Task Designation', 'required|trim');
			$this->form_validation->set_rules('username', 'Username', [
				'required', 'trim', 'min_length[6]', ['check_username', function ($value) {
					return $this->admin_model->valid_username ($value, $this->worker->__id);
				}]
				], [ 'check_username' => 'This %s already exists!']
			);

			$this->form_validation->set_rules('email', 'Email Address', [
				'required', 'trim', 'min_length[6]', 'valid_email', ['check_email', function ($value) {
					return $this->admin_model->valid_email ($value, $this->worker->__id);	
				}]
				], ['check_email' => 'This %s already exists!']
			);
			
			// set the upload config
			$this->config_upload ();

			if ($this->form_validation->run ()) {
				$image 	= $this->worker->profile_image;
				if ($this->upload->do_upload ('passport')) {
					$image = $this->upload->data ();
					$image = $image['file_name'];
				} 

				#var_dump ($this->worker);

				$done 	= $this->admin_model->updateWorker ($this->worker->__id, $this->worker->password, $image);
				
				if ($done['status']) {
					$this->session->set_flashdata ('update_success', 'Worker Updated!');
				} else {
					$this->session->set_flashdata ('update_error', 'Error Updating Worker\'s Profile!');
				}
				redirect("admin/worker/{$this->worker->__id}",'refresh');
			} else {
				$this->page ('worker');
			}
		}
	}

	public function deleteWorker ($id = 0) {
		$this->loggedIn ();
	}

	public function createWorker () {
		$this->loggedIn ();
		$this->config_upload ();

		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('extra', 'Extra Notes', 'required|trim');
		$this->form_validation->set_rules('activity', 'Task Designation', 'required|trim');

		$this->form_validation->set_rules('username', 'Username', [
			'required', 'trim', 'min_length[6]', ['check_username', function ($value) {
				return $this->admin_model->valid_username ($value, 0);
			}]
			], [ 'check_username' => 'This %s already exists!']
		);

		$this->form_validation->set_rules('email', 'Email Address', [
			'required', 'trim', 'min_length[6]', 'valid_email', ['check_email', function ($value) {
				return $this->admin_model->valid_email ($value, 0);	
			}]
			], ['check_email' => 'This %s already exists!']
		);


		if ($this->form_validation->run ()) {
			$image 	= '';
			if ($this->upload->do_upload ('passport')) {
				$image = $this->upload->data ();
				$image = $image['file_name'];
			} 

			$done 	= $this->admin_model->createWorker ($image);

			if ($done['status']) {
				$this->session->set_flashdata ('create_success', 'Worker Created!');
				redirect('admin/workers','refresh');
			} else {
				$this->session->set_flashdata ('create_error', 'Error Creating Worker\'s Profile!');
				redirect('admin/createWorker','refresh');
			}

		} else {
			$this->page ('new_worker');
		}
	}

	public function guests () {
		$this->loggedIn ();
	}

	public function guest ($id = 0) {
		$this->loggedIn ();
		$this->form_validation->set_rules('', '', '');

		if ($this->form_validation->run ()) {

		} else {
			
		}
	}

	public function tasks () {
		$this->loggedIn ();
		$this->data['location'] = 4;
		$this->page ('tasks');
	}

	public function requests () {
		$this->loggedIn ();
		$this->data['location'] = 3;
		$this->page ('requests');
	}

	public function request ($id = 0) {
		$this->loggedIn ();
		$this->data['location'] = 3;
		$this->page ('request');
	}

	public function assignStaff () {
		$this->loggedIn ();
		$this->form_validation->set_rules('', '', '');

		if ($this->form_validation->run ()) {

		} else {
			
		}
	}

	private function config_upload () {
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);
        $this->upload->initialize ($config);
	}

	public function profile () {
		$this->data['location'] = 5;
		$this->data['profile'] = $this->admin_model->profile ();
		$this->config_upload ();

		$this->form_validation->set_rules('username', 'Username', [
			'required', 'trim', 'min_length[6]', ['check_username', function ($value) {
				return $this->admin_model->valid_username ($value, $this->session->user->id);
			}]
			], [ 'check_username' => 'This %s already exists!']
		);

		$this->form_validation->set_rules('email', 'Email Address', [
			'required', 'trim', 'min_length[6]', 'valid_email', ['check_email', function ($value) {
				return $this->admin_model->valid_email ($value, $this->session->user->id);	
			}]
			], ['check_email' => 'This %s already exists!']
		);

		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');

		if ($this->form_validation->run ()) {
			$image 	= '';
			if ($this->upload->do_upload ('passport')) {
				$image = $this->upload->data ();
				$image = $image['file_name'];
			} 

			$done 	= $this->admin_model->update_profile ($image);

			if ($done['status']) {
				$this->session->user->profile_image = $done['profile_image'];
				$this->session->user->username 		= $done['username'];
				$this->session->user->email 		= $done['email'];

				$this->session->set_flashdata ('update_success', 'Profile Updated!');
				redirect('admin/profile','refresh');
			} else {
				$this->session->set_flashdata ('update_error', 'Error Updating Profile!');
				redirect('admin/profile','refresh');
			}
		} else {
			$this->page ('profile');	
		}
	}

	private function page ($page = '') {
		$this->load->view ('admin/header', $this->data);
		$this->load->view ('admin/nav', $this->data);
		$this->load->view ("admin/{$page}", $this->data);
		$this->load->view ('admin/footer', $this->data);
	}
}

?>