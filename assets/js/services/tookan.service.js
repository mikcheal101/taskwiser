"use strict";
/*
Successful charge:
    card No: 5438898014560229
    cvv: 789
    Expiry Month: 09
    Expiry Year: 19
    Pin: 9890
    OTP: 12345
*/
app.service("tookanService", ["$http", "$q", "Upload", function($http, $q, Upload) {
    var svc                     = this;
    svc.base_url                = {
        v1                      : "",
        v2                      : "https://api.tookanapp.com/v2"
    };
    svc.config                  = {
        api_key_v1              : "18022c16b550fd25beb532ef2db13830",
        api_key_v2              : "734060322418b56b88807d6c6b8f9cd6aef41bb755f34807aed223351eaf7f65",
    };

    svc.configuration           = {
        api_key                 : "",
        order_id                : "",
        job_description         : "",
        customer_phone          : "",
        customer_address        : "",
        auto_assignment         : "1",
        notify                  : "1",
        layout_type             : "0",
        timezone                : "-330",
        fleet_id                : "",
        tags                    : "",
        geofence                : "0"
    };

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

    svc.create_task             = function(customer, order, type, category) {
        var defer               = $q.defer();
        var url                 = svc.base_url.v2 + "/create_task";
        var props               = svc.configuration;
		var test 				= {};
		
        var json                = JSON.parse(order.details);
        props.api_key           = svc.config.api_key_v2.toString();
        props.order_id          = order._id;
        props.job_description   = json.details;
        props.team_id           = category;

        props.customer_phone    = customer._tel;
        props.customer_address  = customer.address;

		if (type == 'appointment'){
			console.log('a');
			// appointment
			props.customer_username     = customer.fullname;
			props.customer_email        = customer._email;
			props.job_pickup_datetime   = order._ts;
			props.job_delivery_datetime = order._ts;
			props.has_pickup            = "0";
			props.has_delivery          = "0";
			props.layout_type           = "1";

			props.customer_username     = customer.fullname;
			props.customer_email        = customer._email;
		} else if (type == 'delivery_pickup') {
			console.log('dp');
			// delivery and pick up
			props.job_pickup_phone      = customer._tel;
			props.job_pickup_address    = customer.address ? customer.address : "";
			props.job_pickup_datetime   = order._ts;
			props.job_delivery_datetime = order._ts;

			props.job_pickup_name       = customer.fullname;
			props.job_pickup_email      = customer._email;
			
			props.has_pickup            = "1";
			props.has_delivery          = "1";

			props.customer_username     = customer.fullname;
			props.customer_email        = customer._email;
		} else if (type == 'delivery') {
			console.log('d');
			props.job_delivery_datetime = order._ts;
			props.has_pickup            = "0";
			props.has_delivery          = "1";

			props.customer_username     = customer.fullname;
			props.customer_email        = customer._email;
		} else if (type == 'pickup') {
			console.log('p');
			props.job_pickup_phone      = customer._tel;
			props.job_pickup_address    = customer.address;
			props.job_pickup_datetime   = order._ts;
			props.has_pickup            = "1";
			props.has_delivery          = "0";
		} else {
			console.log('default!');
        }

		/*
		var post = Upload.json({
			url: url,
			data: props
		})
		*/
		
        $http
		.post(url, JSON.stringify(props))
        .then(aData => {
                console.log(aData);
                defer.resolve({'data' : aData.data, 'customer' : customer, 'order' : order});
            })
            .catch(aError => {
                console.log(aError);
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
    svc.list_agents             = function(agents) {

        var defer               = $q.defer();
        var url                 = svc.base_url.v2 + "/get_available_agents";

        $http
            .post(url, {api_key: svc.config.api_key_v2})
            .then(aData => {
                var re  = {};
                re.data     = aData.data.data;
                re.res      = agents.data;
                re.res.forEach((x, y, arr) => {
                    var agent_    = re.data.filter(agent => agent.email === x.email);
                    if(agent_)
                        if(agent_.length > 0)
                            re.res[y].agent = agent_[0];
                    else
                        re.res[y].agent = false;
                });
                defer.resolve(re);
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
            api_key         : svc.api_key,
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
