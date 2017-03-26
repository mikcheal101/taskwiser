<?php

class Payments_model extends CI_Model
{
	public function __constructor()
	{
		parent::__construct ();
	}

	public function send_payment()
	{

	}

	public function get_customer_payments($customer)
	{
		$payments = $this->db->get_where("payments", ["_customer" => $customer])->result();
		return $payments;
	}
}

?>
