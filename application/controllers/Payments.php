<?php

class Payments extends CI_Controller {


    #   this controller handles Payments
    public function save_payment() {

        $params                     = new stdClass();
        $params->price              = $_REQUEST['total_price'];
        $params->details            = $_REQUEST['order'];

        $array                      = json_decode($params->details);
        $params->customer           = new stdClass();

        $params->customer->email    = $array->email;
        $params->customer->address  = $_REQUEST['address'];
        $params->customer->mobile   = $array->mobile;
        $params->customer->name     = $array->name;

        $order                      = $this->user_model->place_order($params);

        $this->toJSON(['order' => $order, 'params' => $params]);
    }

    private function toJSON($data = [])
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
