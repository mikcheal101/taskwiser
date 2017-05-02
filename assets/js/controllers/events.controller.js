'use strict';

app.controller("eventsController", ["$scope", "$rootScope", "generalService",
	function($scope, $rootScope, generalService)
{
	$scope.today 		= new Date();
	$scope.payment 		= {};
	$scope.payment.ref	= Date.now();
	$scope.base_url 	= "";

	$scope.order 		= {
		hour 		: ($scope.today.getHours() % 12).toString(),
		minute	 	: $scope.today.getMinutes().toString(),
		year		: $scope.today.getFullYear().toString(),
		period		: "am",
		day 		: $scope.today.getDate().toString(),
		month		: ($scope.today.getMonth() + 1).toString(),
		mobile		: "",
		name		: "",
		email		: "",
		address		: "",
		type		: "disc jockey",
		details		: "",
		duration	: "one week"
	};

	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.durations	= [];
	$scope.quote_gotten	= false;

	$scope.get_quote			= function()
	{
		$scope.total_price 	= parseInt($scope.prices[$scope.order.type]);
		$scope.total_price	= $scope.total_price * parseInt($scope.durations[$scope.order.duration]);
		$scope.quote_gotten	= true;
	};

	$scope.make_payment			= function()
	{
		getpaidSetup({
			customer_email:$scope.order.email,
			amount:$scope.total_price,
			txref:"takswiser-checkout-"+$scope.payment.ref,
			PBFPubKey:$rootScope.ravepay.public_key,
			custom_logo: $rootScope.app.logo,
			custom_title: $rootScope.ravepay.custom_title,
			onclose:function()
			{
				$scope.payment.close();
			},
			callback:function(d)
			{
				$scope.payment.callback(d);
			}
		});
	};

	$scope.payment.callback		= function(response)
	{
		// send the data or response to the server
		generalService
			.payment_made(response, $scope.order, $scope.total_price, $scope.base_url)
			.then(aResponse => {
				// send data to tookanapp
				return tookanService.create_task(aResponse.order.customer, aResponse.order.order, 'appointment', Util.tookanapp_teams.events);
			})
			.then(bResponse => {
				// send details to db
				console.log(bResponse);

				// redirect to the index page
				window.location = $scope.base_url;
			})
			.catch(aError => console.error(aError));
	};

	$scope.payment.close		= function()
	{
		console.log("payment cancelled");
	};

	$scope.getPrice				= function(base_url)
	{
		generalService
			.fetch_quote("events", base_url)
			.then((aResponse) => {
				angular.copy(aResponse._items_prices.prices, $scope.prices);
				angular.copy(aResponse._items_prices.durations, $scope.durations);
				angular.copy(aResponse._service_charge, $scope.service_charge);
			})
			.catch((aErr) => console.error(aErr));
	}

	$scope.getAmount			= function(item){
		item = parseInt(item);
		return item < 0 ? 0 : item;
	};
}]);
