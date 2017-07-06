<?php

/**
 * Orders Class
 * this class handles the placing of orders pages
 */
class Orders extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data     = array();
    }

    public function assign_job() {
        $return = $this->order_model->assign_payment();
        $this->return_json(['data' => $return]);
    }

    public function getPayments() {
        $return = $this->order_model->get_all_payments();
        $this->return_json(['data' => $return]);   
    }

    public function get_price()
    {
        $prices = $this->order_model->get_prices();
        echo json_encode($prices);
    }

    public function laundry()
    {
        $this->data['title']    = "Laundry";

        $this->form_validation->set_rules("type", "Type", "required");
        $this->form_validation->set_rules("name", "Full Name", "trim|required");
        $this->form_validation->set_rules("email", "Email Address", "required|trim|valid_email");
        $this->form_validation->set_rules("tel", "Mobile Number", "trim|required");
        $this->form_validation->set_rules("shirts", "Shirts", "trim|required");
        $this->form_validation->set_rules("trousers", "Trousers", "trim|required");
        $this->form_validation->set_rules("suits", "Suits", "trim|required");
        $this->form_validation->set_rules("gowns", "Gowns", "trim|required");
        $this->form_validation->set_rules("pickup", "Pick Up Date", "trim|required");
        $this->form_validation->set_rules("address", "Address", "trim|required");
        $this->form_validation->set_rules("extras", "extras", "trim|required");

        $this->display("updated/laundry", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function handy_man()
    {
        $this->data['title']    = "Handy Man";

        $this->form_validation->set_rules("", "", "");

        $this->display("updated/handy_man", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function moving()
    {
        $this->data['title']    = "Moving";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/moving", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function cooking()
    {
        $this->data['title']    = "Cooking";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/cooking", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function events()
    {
        $this->data['title']    = "Events";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/events", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function cleaning()
    {
        $this->data['title']    = "Cleaning";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/cleaning", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function delivery()
    {
        $this->data['title']    = "Delivery";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/delivery", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function beauty()
    {
        $this->data['title']    = "Beauty";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/beauty", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }


    public function auto_repairer()
    {
        $this->data['title']    = "Auto Repairs";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/auto_repairer", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function driver()
    {
        $this->data['title']    = "Driver";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/driver", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function diesel()
    {
        $this->data['title']    = "Diesel";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/diesel", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function custom_tasks()
    {
        $this->data['title']    = "Custom Tasks";
        $this->form_validation->set_rules("", "", "");

        $this->display("updated/custom_tasks", function($done)
        {
            if($done)
            {
                echo("We are here!");
            }
        });
    }

    public function get_quote()
    {
        $post           = "";

        $settings       = $this->order_model->getQuote($post);
    }


    public function fetch_configuration($type)
    {
        $configuration = $this->order_model->fetch_configuration($type);
        $this->return_json($configuration);
    }

    /***
    *
    *   function to get an angular call and
    *   request for the payment for the card entered
    */
    public function angular_send_card()
    {
        $data                   = [];
        $data['card_no']        = $this->input->post('card_no');
        $data['cvv']            = $this->input->post('cvv');
        $data['expiry_month']   = $this->input->post('expiry_month');
        $data['expiry_year']    = $this->input->post('expiry_year');

        $amount                 = $this->input->post('amount');

        $charge = $this->flutter_wave->chargeCard($amount, $data);

        $result = [
            'done'  => false,
            'msg'   => ''
        ];

        if(!is_null($charge))
        {
            $responseCode = (int) $charge['responseCode'];

            switch($responseCode)
            {
                case 0:
                    #   transaction successful
                    $result['done'] = true;
                    $result['msg']  = "Transaction Successfull!";
                break;
                case 2:
                    #   transaction declined
                    $result['done'] = false;
                    $result['msg']  = "Transaction Declined!";
                break;
                default:
                    #   transaction failed
                    $result['done'] = false;
                    $result['msg']  = "Transaction Failed!";
                break;
            }
        }
        else
        {
            #   transaction failed
            $result['done'] = false;
            $result['msg']  = "Transaction Failed!";
        }

        $this->return_json($result);
    }

    private function return_json($result)
    {
        if(!count($result))
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
                ->set_output(json_encode($result));
        }
    }

    private function display($view , Callable $cb)
    {

        if($this->form_validation->run())
        {
            $cb(true);
        }
        else
        {
            $this->load->view("customers/header", $this->data);
            $this->load->view($view, $this->data);
            $this->load->view("customers/footer", $this->data);
            $cb(false);
        }
    }
}

?>
