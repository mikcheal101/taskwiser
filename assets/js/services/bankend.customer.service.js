"use strict";

app.service("CustServ", ["$http", "$q", function($http, $q)
{
    var srv             = this;

    var getPayments     = function(base_url)
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

    var getOrders       = function(base_url)
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

    var updateProfile   = function(base_url,customer)
    {
        var defer       = $q.defer();
        var url         = base_url + "backend/customers/update_profile";

        $http.post(url, {customer:customer}).then((aResponse) => {
            console.log(aResponse);
            defer.resolve(aResponse.data);
        }).catch((aError) => {
            defer.reject(aError);
        });

        return defer.promise;
    };

    var getProfile      = function(base_url)
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
