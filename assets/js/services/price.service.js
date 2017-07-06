"use strict";

app.service("pricesService", ["$http", "$q", function($http, $q) {

	var svc 			= this;

	svc.getPrices		= function(order){
		var q			= $q.defer();
		var url 		= "/get/prices";

		$http
		.get(url)
		.then(aData => {
			q.resolve(aData.data);
		})
		.catch(aError => {
			q.reject(aError);
		});

		return q.promise;
	};

	svc.getSales 		= function(base_url) {
		var defer 		= $q.defer();
		var url 		= base_url.concat("payment/listing");
		$http
			.get(url)
			.then(aData 	=> defer.resolve(aData.data))
			.catch(aError 	=> defer.reject(aError));
		return defer.promise;
	};

	return svc;
}]);