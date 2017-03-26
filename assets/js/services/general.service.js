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
	}

	return svc;
}]);
