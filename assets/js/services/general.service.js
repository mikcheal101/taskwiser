"use strict";

app.service("generalService", ["$http", "$q", function($http, $q) {

	var svc 			= this;

	svc.fetch_quote		= function(type, base_url)
	{
		var defer 		= $q.defer();
		var url 		= base_url + "/prices/fetch/configuration/" + type;

		$http.get(url)
		.then((aResponse) => {
			defer.resolve(aResponse.data);
		})
		.catch((aError) => {
			defer.reject(aError);
		});

		return defer.promise;
	};

	svc.payment_made 	= function(response, order, total_price, base_url){
		var defer 		= $q.defer();
		var url 		= base_url + "payments/make/payment";

		var post 		= {
			order		: order,
			total_price	: total_price,
			email		: order.email,
			address		: order.address,
			mobile 		: order.mobile
		};

		$http({
			method: 'POST',
			url: url,
			headers:{'Content-Type': 'application/json'},
        	params:post
		})
		.then(aData => {
			defer.resolve(aData.data);
		}, aError => {
			defer.reject(aError)
		});
		return defer.promise;
	};

	/*
		Test cards:

		Successful charge:
		5438898014560229
		cvv 789
		Expiry Month 09
		Expiry Year 19
		Pin 9890

		Fraudulent
		5590131743294314
		cvv 887
		Expiry Month 11
		Expiry Year 20
		Pin 8877

		Insufficient Funds
		5258585922666506
		cvv 883
		Expiry Month 09
		Expiry Year 17
		Pin 9891

		Declined
		5143010522339965
		cvv 276
		Expiry Month 08
		Expiry Year 19
		Pin 4322

		Test Public and Secret Keys:
		Public Key: FLWPUBK-e634d14d9ded04eaf05d5b63a0a06d2f-X
		Secret Key: FLWSECK-bb971402072265fb156e90a3578fe5e6-X
	*/

	return svc;
}]);
