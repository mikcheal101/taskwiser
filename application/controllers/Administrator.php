<?php

require_once(dirname(__FILE__)."/Admin.php");

class Administrator extends Admin{

	# api class for the admin

	public function __construct() {
		parent::__construct();
		$this->data 	= [];
	}

	public function getPrices() {
		$prices = $this->api_model->loadPrices();
		$this->json(['data' => $prices]);
	}

	public function updatePrices() {
		$result 	= json_decode($this->input->post('price'));
		$data 		= $this->api_model->updatePrices($result);
		$this->json(['data' => $data]);
	}

	public function getWorkers() {
		$workers = $this->api_model->loadWorkers();
		$this->json(['data' => $workers]);
	}

	public function updateWorker() {
		$this->api_model->
		$this->json(['data' => $this->input->post()]);
	}

	public function dropWorker($id = null) {

	}

	private function json($array = []) {
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($array));
	}


}

?>