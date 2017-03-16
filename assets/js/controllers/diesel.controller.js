'use strict';

app.controller('dieselController', ["$scope", "$rootScope", "dieselService", function($scope, $rootScope, dieselService) 
{
	$scope.today 		= new Date();

	$scope.order 		= {
		hour 		: ($scope.today.getHours() % 12).toString(),
		minute	 	: $scope.today.getMinutes().toString(),
		year		: $scope.today.getFullYear().toString(),
		period		: "am",
		day 		: $scope.today.getDate().toString(),
		month		: ($scope.today.getMonth() + 1).toString(),
		mobile		: "090204647371",
		name		: "Sampel name",
		email		: "email@somebody.com",
		address		: "address",
		details		: "details",
		liters		: "0"
	};

	$scope.total_price	= 0;
	$scope.price 		= 1;
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{

		console.log($scope.order.liters);

		$scope.total_price = parseInt($scope.order.liters);

		console.log($scope.total_price);

		$scope.total_price	*= parseInt($scope.price);

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
	}


	$scope.getPrice			= function()
	{
		// get the price for a laundry item then base it on price
		$scope.price = 410;
	}
}]);