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

	return svc;
}]);