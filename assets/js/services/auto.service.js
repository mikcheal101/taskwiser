"use strict";

app.service("autoService", ["$http", "$q", function($http, $q) {

	var svc 			= this;

	svc.getQuote		= function(order){
		var q			= $q.defer();
		var url 		= "";

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