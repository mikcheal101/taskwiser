<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use Flutterwave\Card;
use Flutterwave\Flutterwave;
use Flutterwave\AuthModel;
use Flutterwave\Countries;
use Flutterwave\FlutterEncrypt;
use Flutterwave\Currencies;
use Flutterwave\AccessAccount;

class Flutter_wave {

	private $merchantkey;
	private $apiKey;
	private $card;
	private $customer_id		= "";
	private $callback_url		= "";
	private $bvn				= "";
	private $otp 				= "";
	private $token 				= "";
	private $env				= "";

	private $authModel 			= AuthModel::PIN;
	private $validateOption 	= Flutterwave::SMS;
	private $currency			= Currencies::NAIRA;
	private $country			= Countries::NIGERIA;
	private $narration			= "taskwiswer customer payment";


	
	/**
	 * Main constructor
	 * @param merchantkey: 		merchant key on flutterwave dev portal
	 * @param apiKey:			merchant api key on flutterwave dev portal
	 * @param env: 				can be staging or production
	 * @param authModel:		this tells flutterwave how to validate the user of the card is the card owner
	 * @param validateOption:	this tells flutterwave to send authentication otp via sms
	 * 
	 **/
	public function __construct($params) {

		$this->merchantKey 		= isset($params['merchantKey']) ? $params['merchantKey']: "";
		$this->apiKey			= isset($params['apiKey']) ? $params['apiKey'] : "";
		$this->env 				= isset($params['env']) ? $params['env'] : "";
		$this->card 			= [
			  	"card_no" 		=> "",
			  	"cvv" 			=> "",
				"expiry_month" 	=> "",
			  	"expiry_year" 	=> "",
			  	"card_type" 	=> "", //optional parameter. only needed if card was issued by diamond card
			  	"pin"			=> "",
			];

		Flutterwave::setMerchantCredentials($this->merchantKey, $this->apiKey, $this->env);
	}

	/**
	 * @param null
	 * @return boolean
	 */ 
	protected function tokenize() {
		$result = Card::tokenize($this->card, $this->authModel, $this->validateOption, $this->bvn);
		$this->dump($result, "tokenize function");
		return $result->isSuccessfulResponse();
	}
	
	/**
	 * @param int|double|float $amount the amount to charge the card
	 * @param customer_id
	 * @param int $bvn the bvn of the customer
	 * @param callback_url
	 * @param boolean
	 */
	public function chargeCard($amount = 0, $card = null, $bvn = "", $customer_id = "", $callback_url="") {

		$this->callback_url 	= $callback_url;
		$this->customer_id 		= $customer_id;
		$this->card 			= is_null($card) ? $this->card : $card;
		$this->bvn 				= $bvn;

		$tokenize 				= $this->tokenize();

		if($tokenize && $amount  >= 0) {
			
			$charge = Card::charge($this->card, $amount, $this->customer_id, $this->currency, 
				$this->country, $this->authModel, $this->narration, $this->callback_url);

			$this->dump($charge, "after charging card");
			return $charge->isSuccessfulResponse();
		}
		return false;
	}

	public function validateTransaction($otp = "") {
		$this->transaction_status = Card::validate($this->token, $otp, $cardType = "");
	}

	public function getTransactionStatus() {
		return $this->transaction_status;
	}
	

	public function dump($value=null, $name = "") {
		$value = is_object($value) ? (array)$value: $value;

		echo ("<h3>{$name}</h3><ul>");
		if(is_array($value) && !is_null($value)) {
			foreach($value as $key=>$val) {
				echo ("<li>{$key} -> <ul>");
				$this->dump($val);
				echo ("</ul></li>");
			}
		} else {
			echo("<li>");
			var_dump($value);
			echo("</li>");
		}
		echo ("</ul>");
	}
}
?>