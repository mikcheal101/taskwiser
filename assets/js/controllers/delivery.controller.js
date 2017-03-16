'use strict';

app.controller('deliveryController', ["$scope", "$rootScope", "deliveryService", function($scope, $rootScope, deliveryService) 
{
	$scope.today 		= new Date();

	$scope.order 		= {
		hour 		: ($scope.today.getHours() % 12).toString(),
		minute	 	: $scope.today.getMinutes().toString(),
		year		: $scope.today.getFullYear().toString(),
		period		: "am",
		day 		: $scope.today.getDate().toString(),
		month		: ($scope.today.getMonth() + 1).toString(),
		mobile		: "09020374848",
		name		: "full name",
		email		: "samples@mail.com",
		address		: "my address",
		type		: "food delivery",
		details		: "my details",
		rooms		: "0"
	};

	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{

		console.log($scope.order.type);
		console.log($scope.prices[$scope.order.type]);

		$scope.total_price = parseInt($scope.prices[$scope.order.type]);

		console.log($scope.total_price);

		$scope.quote_gotten	= true;
		/*
		laundryService.getQuote({type: $scope.order.type, quantity: total_quantity}).then(aData => {
			console.log(aData);
		}).catch(aError => {
			console.error(aError);
		});
		*/
	};

	$scope.make_payment		= function()
	{
		$scope.quote_gotten	= false;
	};


	$scope.getPrice			= function()
	{
		var prices 					= [];
		prices["food delivery"]		= 100;
		prices["package delivery"]	= 30;

		// get the price for a laundry item then base it on price
		$scope.prices = prices;
	};
}]);