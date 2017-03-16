<?php

class Order_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function getQuote($category = "")
	{
		$data = $this->db->get_where('prices', ["_category" => $category])->result();
		return json_decode($data);
	}

	public function get_prices()
	{
		return $this->db->get("prices")->result();
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


}
?>