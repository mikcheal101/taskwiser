<?php

class Api_model extends CI_Model {
	
	public function __construct () {
		parent::__construct ();
	}

	public function loadPrices() {
		$items	= $this->db->get('prices')->result();
		foreach($items as $item)
			$item->_items_prices 	= json_decode($item->_items_prices);
		return $items;
	}

	public function updatePrices($price = null) {
		if($price != null) {
			$this->db->where('_id', $price->_id);
			$this->db->update('prices', ['_items_prices' => json_encode($price->_items_prices), '_service_charge' => $price->_service_charge]);
			return true;
		}
		return false;
	}	

	public function loadWorkers() {
		return $this->db->get_where('users', ['usertype' => 2])->result();
	}

	public function updateWorker($worker = null) {
		if($worker != null) {
			$this
				->db
				->update('users', [
					'address'		=> $worker['address'],
					'email'			=> $worker['email'],
					'first_name'	=> $worker['first_name'],
					'middle_name'	=> $worker['middle_name'],
					'last_name'		=> $worker['last_name'],
					'notes'			=> $worker['notes'],
					'_tel'			=> $worker['_tel']
				])
				->where('id', $worker->id);
		}
	}

}
?>