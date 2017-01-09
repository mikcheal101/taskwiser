<?php
require_once(dirname(__FILE__)."/EmailTemplates.php");

class Admin extends CI_Controller {

    public $data = [
        'title'             => 'taskwiser admin panel v.1.0.0',
        'location'          => 1,
        'workers'           => [],
        'tasks'             => [],
        'requests'          => [],
    ];
    private $email_templates = null;

    public function __construct() {
        parent::__construct();
        $this->data['states']   = $this->admin_model->getStates();
        $this->data['tasks']    = $this->admin_model->getTasks();
        $this->data['workers']  = $this->admin_model->workers();

        $this->email_templates  = new EmailTemplates($this);
    }

    private function loggedIn() {
        if ($this->session->user === NULL)
            redirect('admin/login', 'refresh');
    }

    private function assignWorker($id = 0) {
        $this->admin_model->assignWorker($id);
        redirect('admin/request/' . $id);
    }

    private function assignPrice($id = 0) {
        echo "assignPrice<br>";
    }

    public function signout() {
        $this->session->sess_destroy();
        redirect('admin/login', 'refresh');
    }

    public function index() {
        $this->loggedIn();

        $this->data['location'] = 1;
        $this->page('home');
    }

    public function login() {
        $this->data['location'] = 0;
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()) {
            $valid = $this->admin_model->authenticate();

            if ($valid === NULL) {
                $this->session->set_flashdata('authenticate_error', 'Username / Password Mismatch!');
                redirect('admin/login', 'refresh');
            } else {
                $this->session->set_userdata(['user' => $valid]);
                redirect('admin/', 'refresh');
            }
        } else {
            $this->load->view('admin/header', $this->data);
            $this->load->view('admin/plain_header', $this->data);
            $this->load->view("admin/login", $this->data);
            $this->load->view('admin/footer', $this->data);
        }
    }

    public function signup() {
        $this->form_validation->set_rules("", "", "");

        if ($this->form_validation->run()) {
            
        } else {
            $this->load->view('admin/header', $this->data);
            $this->load->view('admin/plain_header', $this->data);
            $this->load->view("admin/sign_up", $this->data);
            $this->load->view('admin/footer', $this->data);
        }
    }

    public function forgot_password() {
        $this->form_validation->set_rules("", "", "");

        if ($this->form_validation->run()) {
            
        } else {
            
        }
    }

    public function remember_password($key = "") {
        # handle verification of key and all here
    }

    public function reset_password() {
        # page displaying the reset password form
        $this->form_validation->set_rules("", "", "");

        if ($this->form_validation->run()) {
            
        } else {
            
        }
    }

    public function workers($limit = 0) {
        $this->loggedIn();
        $this->data['location'] = 2;
        $workers = $this->admin_model->workers($limit);

        if (count($workers) < 0) {
            show_404();
        } else {
            $this->data['workers'] = $workers;
            $this->page('workers');
        }
    }

    public function delete_photo($photo="") {

    }

    public function worker($id = 0) {
        $this->loggedIn();
        $this->data['location'] = 2;
        $this->data['worker'] = $this->worker = $this->admin_model->worker($id);


        if (!$this->data['worker'])
            show_404();
        else {
            $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
            $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('pwd', 'Password', 'trim|min_length[6]');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            $this->form_validation->set_rules('extra', 'Extra Notes', 'trim');
            $this->form_validation->set_rules('categories[]', 'Task Designation', 'required|trim');
            $this->form_validation->set_rules('username', 'Username', [
                'required', 'trim', 'min_length[6]', ['check_username', function ($value) {
                        return $this->admin_model->valid_username($value, $this->worker->_id);
                    }]
                    ], ['check_username' => 'This %s already exists!']
            );

            $this->form_validation->set_rules('email', 'Email Address', [
                'required', 'trim', 'min_length[6]', 'valid_email', ['check_email', function ($value) {
                        return $this->admin_model->valid_email($value, $this->worker->_id);
                    }]
                    ], ['check_email' => 'This %s already exists!']
            );


            if ($this->form_validation->run()) {
                // set the upload config
                $this->config_upload($this->input->post('email'));

                $image = $this->worker->profile_image;
                if ($this->upload->do_upload('passport')) {
                    $this->delete_photo($image);
                    $image = $this->upload->data();
                    $image = "uploads/{$image['file_name']}";
                } 

                $done = $this->admin_model->updateWorker($this->worker->_id, $this->worker->password, $image);

                if ($done) {
                    $this->session->set_flashdata('update_success', 'Worker Updated!');
                } else {
                    $this->session->set_flashdata('update_error', 'Error Updating Worker\'s Profile!');
                }
                redirect("admin/worker/{$this->worker->_id}", 'refresh');
            } else {
                $this->page('worker');
            }
        }
    }

    public function deleteWorker($id = 0) {
        $this->loggedIn();
    }

    public function createWorker() {
        $this->loggedIn();

        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('extra', 'Extra Notes', 'trim');
        $this->form_validation->set_rules('categories[]', 'Task Designation', 'required');

        $this->form_validation->set_rules('username', 'Username', [
            'required', 'trim', 'min_length[6]', ['check_username', function ($value) {
                    return $this->admin_model->valid_username($value, 0);
                }]
                ], ['check_username' => 'This %s already exists!']
        );

        $this->form_validation->set_rules('email', 'Email Address', [
            'required', 'trim', 'min_length[6]', 'valid_email', ['check_email', function ($value) {
                    return $this->admin_model->valid_email($value, 0);
                }]
                ], ['check_email' => 'This %s already exists!']
        );


        if ($this->form_validation->run()) {
            $this->config_upload($this->input->post('email'));
            $image = '';
            if ($this->upload->do_upload('passport')) {
                $image = $this->upload->data();
                $image = "uploads/".$image['file_name'];
            }

            $done = $this->admin_model->createWorker($image);

            if ($done) {
                $this->session->set_flashdata('create_success', 'Worker Created!');
                redirect('admin/workers', 'refresh');
            } else {
                $this->session->set_flashdata('create_error', 'Error Creating Worker\'s Profile!');
                redirect('admin/createWorker', 'refresh');
            }
        } else {
            $this->page('new_worker');
        }
    }

    public function guests() {
        $this->loggedIn();
    }

    public function guest($id = 0) {
        $this->loggedIn();
        $this->form_validation->set_rules('', '', '');

        if ($this->form_validation->run()) {
            
        } else {
            
        }
    }

    public function tasks() {
        $this->loggedIn();
        $this->data['location'] = 4;
        $this->page('tasks');
    }

    public function requests() {
        $this->loggedIn();
        $this->data['location'] = 3;
        $this->data['requests'] = $this->admin_model->loadOrders();
        $this->page('requests');
    }

    public function request($id = 0) {
        $this->loggedIn();
        $this->data['location'] = 3;
        $request = $this->admin_model->loadOrder($id);
        
        if ($request !== NULL) {
            $this->data['request'] = $request;

            $this->form_validation->set_rules('amount', 'Price', 'required|trim|numeric');
            $this->form_validation->set_rules('staff', 'Staff', 'required|trim|numeric');

            if($this->form_validation->run()) {
                if($this->admin_model->approve_request($id)){
                    # send email with order details
                    $this->sendOrderMail($request->customer, $request);
                }
                redirect('admin/request/'.$id);
            } else {
                $this->page('request');
            }

        } else {
            show_404();
        }
    }

    public function dropRequest($id = null) {
        if(!is_null($id))
            $this->admin_model->dropRequest($id);
        redirect('admin/requests', 'refresh');
    }


    private function config_upload($name="") {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }

    public function profile() {
        $this->data['location'] = 5;
        $this->data['profile'] = $this->admin_model->profile();
        $this->config_upload();

        $this->form_validation->set_rules('username', 'Username', [
            'required', 'trim', 'min_length[6]', ['check_username', function ($value) {
                    return $this->admin_model->valid_username($value, $this->session->user->id);
                }]
                ], ['check_username' => 'This %s already exists!']
        );

        $this->form_validation->set_rules('email', 'Email Address', [
            'required', 'trim', 'min_length[6]', 'valid_email', ['check_email', function ($value) {
                    return $this->admin_model->valid_email($value, $this->session->user->id);
                }]
                ], ['check_email' => 'This %s already exists!']
        );

        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');

        if ($this->form_validation->run()) {
            $image = '';
            if ($this->upload->do_upload('passport')) {
                $image = $this->upload->data();
                $image = $image['file_name'];
            }

            $done = $this->admin_model->update_profile($image);

            if ($done['status']) {
                $this->session->user->profile_image = $done['profile_image'];
                $this->session->user->username = $done['username'];
                $this->session->user->email = $done['email'];

                $this->session->set_flashdata('update_success', 'Profile Updated!');
                redirect('admin/profile', 'refresh');
            } else {
                $this->session->set_flashdata('update_error', 'Error Updating Profile!');
                redirect('admin/profile', 'refresh');
            }
        } else {
            $this->page('profile');
        }
    }

    public function cities() {
        $this->data['checked'] = true;
        $this->form_validation->set_rules("name", "State / City Name", "required|trim");
        $this->form_validation->set_rules("_main_cat", "State", [
            [
                'is_state',
                function($value) {
                    $return = !(is_null($value) && is_null($this->input->post('is_state')));
                    $this->data['checked'] = !is_null($this->input->post('is_state'));
                    return $return;
                }
            ]
        ]);
        $this->form_validation->set_message("is_state", "Select the state the city is in");

        if ($this->form_validation->run()) {
            $this->admin_model->saveState();
            redirect('admin/cities');
        } else {
            $this->page('states');
        }
    }

    public function city(int $id = 0) {
        if ($id === 0)
            show_404();
        else {
            $this->form_validation->set_rules("name", "State / City Name", "required|trim");
            $this->form_validation->set_rules("_main_cat", "State", [
                [
                    'is_state',
                    function($value) {
                        $return = !(is_null($value) && is_null($this->input->post('is_state')));
                        $this->data['checked'] = !is_null($this->input->post('is_state'));
                        return $return;
                    }
                ]
            ]);
            $this->form_validation->set_message("is_state", "Select the state the city is in");

            if ($this->form_validation->run()) {
                $this->admin_model->editState($id);
                redirect('admin/cities');
            } else {

                $this->data['city'] = $this->admin_model->getCity($id);
                $this->data['checked'] = (boolean) $this->data['city']['is_state'] || !(is_null($this->input->post('is_state')));
                $this->page('city');
            }
        }
    }

    public function drop_city(int $id = 0) {
        if ($id == 0)
            show_404();
        else {
            $this->admin_model->deleteState($id);
            redirect('admin/cities');
        }
    }


    #---------------------------   private functions --------------------------

    private function sendOrderMail($customer, $order) {
        $_quote         = $this->user_model->prepQuote($order->_id);
        $_login_url     = base_url("silentAuth/{$customer->_id}/{$customer->_username}/{$customer->_verification_code}");
        $_payment_url   = base_url();
        $_message       = $this->email_templates->quote_email($customer->_email, $_quote, $_login_url, $_payment_url);

        # send an email to the user showing the username and password
        # with order details
        $this->email->from('no-reply@taskwiser.com');
        $this->email->to($customer->_email);
        $this->email->subject("Taskwiser.com Order TW-{$order->_transaction_code}");
        $this->email->message($_message);
        return $this->email->send();
    }

    private function page($page = '') {
        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/nav', $this->data);
        $this->load->view("admin/{$page}", $this->data);
        $this->load->view('admin/footer', $this->data);
    }


    # no idea yet
    public function assignStaff() {
        $this->loggedIn();
        $this->form_validation->set_rules('', '', '');

        if ($this->form_validation->run()) {
            
        } else {
            
        }
    }

}

?>