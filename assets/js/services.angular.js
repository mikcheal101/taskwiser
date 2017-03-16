angular.module('services', [])

.service('svc', ['Upload', '$q', 'http', function (Upload, $q, http) 
{
	var svc 		= this;

	svc.get_quote	= function(order)
	{
		var defer	= $q.defer();
		var url 	= "/";
		
		$http
			.post(url, order)
			.then(aData => 
				{ 
					defer.resolve(aData.data);
				})
			.catch(aError => 
				{
					defer.reject(aError);
				});

		return defer.promise;
	};

	return svc;
}])

.service('inputNumberInstance', () => {
	var instances	= {};
	var lastInstance;

	this.listInstances = function () {
		console.log ('instances: ', instances);
	};

	this.enqueueInstance = function (instanceId, lbl="") {
		if (typeof instances[instanceId] === 'undefined') {
			instances[instanceId] = {
				asyncMode	: false,
				value		: 0,
				text		: lbl,
			};
			lastInstance = instanceId;
		}
	};

	this.dequeueInstance = function (instanceId) {
		delete instances[instanceId];
	};

	this.isRegistered = function (instanceId) {
		return (typeof instances[instanceId] !== 'undefined');
	};

	this.getLastRegisteredInstanceId = function () {
		return lastInstance;
	};

	this.increamentInstanceValue = function (instanceId) {
		return instances[instanceId].value++;
	};

	this.decreamentInstanceValue = function (instanceId) {
		return (instances[instanceId].value < 1) ? 0 : instances[instanceId].value--;
	};	

	this.getInstance = function (instanceId) {
		if (this.isRegistered (instanceId)) {
			return instances[instanceId];
		} else {
			return null;
		}
	};
});