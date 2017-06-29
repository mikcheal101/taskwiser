"use strict";

app.service("AdminApi", ["$http", "$q", "Upload", function($http, $q, Upload) {
    var svc             = this;

    svc.getPrices 		= function(base_url) {
    	var defer       = $q.defer();
        var url         = base_url.concat("api/admin/prices");
        console.log(url);

        $http
        	.get(url)
        	.then((aResponse) => { defer.resolve(aResponse.data); })
        	.catch((aError) => { defer.reject(aError); });

        return defer.promise;
    };

    svc.updatePrice 	= function(base_url, price) {
    	var defer 		= $q.defer();
    	var url 		= base_url.concat("api/admin/update/prices");

    	Upload
    		.upload({
    			url: url, 
    			data: {'price' : JSON.stringify(price)}
    		})
    		.then((aResponse) => {defer.resolve(aResponse.data);  })
    		.catch((aError) => { defer.reject(aError); });

    	return defer.promise;
    };

    svc.getWorkers      = function(base_url) {
        var defer       = $q.defer();
        var url         = base_url.concat("api/admin/workers");
        
        $http
            .get(url)
            .then(aSuc => defer.resolve(aSuc.data))
            .catch(aError => defer.reject(aError));

        return defer.promise;
    };


    svc.updateWorker    = function(base_url, worker) {
        var defer       = $q.defer();
        var url         = base_url.concat("api/admin/update/worker");

        Upload
            .upload({
                url: url,
                data: {'worker' : worker}
            })
            .then(aSuc => defer.resolve(aSuc.data))
            .catch(aError => defer.reject(aError));
        return defer.promise;
    };

    svc.dropWorker      = function(base_url, worker) {
        var defer       = $q.defer();
        var url         = base_url.concat("api/admin/drop/worker");

        Upload
            .upload({
                url: url,
                data: {'_worker' : worker}
            })
            .then(aSuc => defer.resolve(aSuc.data))
            .catch(aError => defer.reject(aError));
        return defer.promise;
    };

	return svc;
}]);
