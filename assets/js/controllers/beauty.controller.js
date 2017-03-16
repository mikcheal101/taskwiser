'use strict';

app.controller('beautyController', ["$scope", "$rootScope", "beautyService", function($scope, $rootScope, beautyService) 
{
	$scope.today 		= new Date();

	$scope.order 		= {
		hour 		: ($scope.today.getHours() % 12).toString(),
		minute	 	: $scope.today.getMinutes().toString(),
		year		: $scope.today.getFullYear().toString(),
		period		: "am",
		day 		: $scope.today.getDate().toString(),
		month		: ($scope.today.getMonth() + 1).toString(),
		mobile		: "08020374848",
		name		: "full name",
		email		: "learner@mail.com",
		address		: "my address",
		type		: "barber",
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
		prices["hair dresser"]		= 100;
		prices["makeup artist"]		= 30;
		prices["manicure"]			= 180;
		prices["barber"]			= 310;

		// get the price for a laundry item then base it on price
		$scope.prices = prices;
	};
}]);