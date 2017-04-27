<?php

class Payments extends CI_Controller {


    #   this controller handles Payments
    public function save_payment() {
        $this->toJSON($this->input->post());
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
