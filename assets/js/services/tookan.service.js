"use strict";

app.service("tookanService", ["$http", "$q", function($http, $q) {
    var svc                     = this;
    svc.api_key                 = "";
    svc.base_url                = "https://api.tookanapp.com/v2";

    // tasks are jobs created by the customer(s)
    svc.get_tasks               = function() {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/get_all_tasks";
        var props               = {
            api_key : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };
    svc.create_task             = function() {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/create_task";
        var props               = {
            api_key : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };
    svc.assign_task             = function() {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/assign_task";
        var props               = {
            api_key : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };
    svc.update_task_status      = function() {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/update_task_status";
        var props               = {
            api_key : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };

    // agents are the staffers ie taskers
    svc.create_agent            = function(params) {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/add_agent";
        var props               = {
            api_key : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };
    svc.list_agents             = function() {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/get_available_agents";
        var props               = {
            api_key         : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };
    svc.delete_agent            = function() {
        var defer               = $q.defer();
        var url                 = svc.base_url + "";
        var props               = {
            api_key : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };

    /***
    *   teams are divided by categories
    *   eg drivers make up a team
    */
    svc.create_team             = function(team_name) {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/v2/create_team";
        var props               = {
            api_key         : svc.api_key
            team_name       : team_name,
            battery_usage   : "0",
            tags            : team_name
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };
    svc.get_team_details        = function() {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/v2/view_teams";
        var props               = {
            api_key : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };

    // a manager is same as aweb admin
    svc.create_manager          = function(params) {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/v2/add_manager";
        var props               = {
            api_key     : svc.api_key,
            email       : params.email,
            password    : params.password,
            first_name  : params.first_name,
            last_name   : params.last_name,
            phone       : params.phone,
            timezone    : params.timezone
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };

    // list customers
    svc.get_customers           = function() {
        var defer               = $q.defer();
        var url                 = svc.base_url + "/v2/get_all_customers";
        var props               = {
            api_key : svc.api_key
        };

        $http.post(url, props)
        .then(aData => {
            defer.resolve(aData.data);
        })
        .catch(aError => {
            defer.reject(aError);
        });
        return defer.promise;
    };

    return svc;
}]);
