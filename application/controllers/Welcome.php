<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function test() {
		$mycard = [
			  	"card_no" 		=> "5445842588802006",
			  	"cvv" 			=> "655",
				"expiry_month" 	=> "08",
			  	"expiry_year" 	=> "18",
			  	"pin"			=> "1111",
			  	"card_type" 	=> "" //optional parameter. only needed if card was issued by diamond card
			];
		$bvn 	= "1111";

		$charge = $this->flutter_wave->chargeCard(2000, $mycard, $bvn);

		if ($charge) {
			# card billed
		} else {
			# card not billed
		}
	}
}
