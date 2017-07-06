<?php

class Order_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function assign_payment() {
		$post   = [
            '_amt'              => $_REQUEST['_amt'],
            '_order'            => $_REQUEST['_order'],
            '_tookanapp_job_id' => $_REQUEST['_tookanapp_job_id']
        ];

        $this->db->insert('payments', $post);
        return true;
	}

	public function get_all_payments() {
		return $this->db->get('payments')->result();
	}

	public function getQuote($category = "")
	{
		$data = $this->db->get_where('prices', ["_category" => $category])->result();
		return json_decode($data);
	}

	public function get_prices()
	{
		return $this->db
			->get("prices")
			->result();
	}

	public function save_price($price = [])
	{
		if(count($price) <= 0)
		{
			return false;
		}
		else
		{
			$this->db->insert("prices", $price);
			return true;
		}
	}

	public function update_price($category = "", $price = [])
	{
		if($category === "" || count($price) <= 0)
		{
			return false;
		}
		else
		{
			$this->db->update("prices", $price, ["_category" => $category]);
			return true;
		}
	}

	# eg type = laundry
	public function fetch_configuration($type)
	{
		# get all the configurations in json mode
		$response = $this->db->get_where("prices", ["_category" => $type])->row();
		$response->_items_prices = ($response) ? json_decode($response->_items_prices) : $response->_items_prices;

		# display this as a json data
		return $response;
	}

	public function get_customer_orders($customer)
	{
		$orders = $this->db->get_where("orders", ["_customer" => $customer])->result();
		return $orders;
	}

}
?>
