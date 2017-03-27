"use strict";

app.service("CustServ", ["$http", "$q", function($http, $q)
{
    var srv             = this;

    srv.getPayments     = function(base_url)
    {
        var defer       = $q.defer();
        var url         = base_url + "backend/customers/get_payments";

        $http.get(url).then((aResponse) => {
            console.log(aResponse);
            defer.resolve(aResponse.data);
        }).catch((aError) => {
            defer.reject(aError);
        });

        return defer.promise;
    };

    srv.getOrders       = function(base_url)
    {
        var defer       = $q.defer();
        var url         = base_url + "backend/customers/get_orders";

        $http.get(url).then((aResponse) => {
            console.log(aResponse);
            defer.resolve(aResponse.data);
        }).catch((aError) => {
            defer.reject(aError);
        });

        return defer.promise;
    };

    srv.updateProfile   = function(base_url,customer)
    {
        var defer       = $q.defer();
        var url         = base_url + "backend/customers/update_profile";
        console.log(JSON.stringify(customer));

        $http.post(url, {person:customer}, {headers: {'Content-Type': 'application/json'}})
        .then((aResponse) => {
            console.log(aResponse);
            defer.resolve(aResponse.data);
        }).catch((aError) => {
            defer.reject(aError);
        });

        return defer.promise;
    };

    srv.getProfile      = function(base_url)
    {
        var defer       = $q.defer();
        var url         = base_url + "backend/customers/get_profile";

        $http.get(url).then((aResponse) => {
            console.log(aResponse);
            defer.resolve(aResponse.data);
        }).catch((aError) => {
            defer.reject(aError);
        });

        return defer.promise;
    };

    return srv;
}]);
