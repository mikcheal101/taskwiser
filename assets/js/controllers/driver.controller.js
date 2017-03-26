'use strict';

app.controller('driverController', ["$scope", "$rootScope", "driverService", "generalService",
function($scope, $rootScope, driverService, generalService)
{
	$scope.today 			= new Date();
	$scope.payment 			= {};
	$scope.payment.ref		= Date.now();

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
		type		: "big car",
		details		: "",
		duration	: "less than a day"
	};

	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.durations	= [];
	$scope.service_charge=0;
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{
		$scope.total_price = parseInt($scope.prices[$scope.order.type]);
		$scope.total_price *= parseInt($scope.durations[$scope.order.duration]);
		$scope.total_price+= parseInt($scope.service_charge);

		$scope.quote_gotten	= true;
	};

	$scope.make_payment		= function()
	{
		getpaidSetup({
			customer_email:$scope.order.email,
			amount:$scope.total_price,
			txref:"takswiser-checkout-"+$scope.payment.ref,
			PBFPubKey:"FLWPUBK-2f795247c95bf48649774efd60374a88-X",
			custom_logo: "//taskwiser.ravepay.co/files/paybutton-images/ee6ab4cb27007f2312ef62f8d97c88ed.png",
			custom_title: "Taskwiser Checkout",
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
		console.log(response);
	};

	$scope.payment.close		= function()
	{
		console.log("payment cancelled");
	};

	$scope.getPrice			= function(base_url)
	{
		generalService
			.fetch_quote("driver", base_url)
			.then((aResponse) => {
				console.log(aResponse);
				angular.copy(aResponse._items_prices.prices, $scope.prices);
				angular.copy(aResponse._items_prices.durations, $scope.durations);
				angular.copy(aResponse._service_charge, $scope.service_charge);
			})
			.catch((aErr) => console.error(aErr));
	};
}]);
