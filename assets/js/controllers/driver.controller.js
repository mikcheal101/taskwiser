'use strict';

app.controller('driverController', ["$scope", "$rootScope", "driverService", function($scope, $rootScope, driverService) 
{
	$scope.today 		= new Date();

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
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{

		console.log($scope.order.type);
		console.log($scope.prices[$scope.order.type]);

		$scope.total_price = parseInt($scope.prices[$scope.order.type]);

		console.log($scope.total_price);


		console.log($scope.order.duration);
		console.log($scope.durations[$scope.order.duration]);

		$scope.total_price *= parseInt($scope.durations[$scope.order.duration]);

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
		prices["small car"]			= 100;
		prices["big car"]			= 30;

		var durations					= [];
		durations["one year"]			= 1001;
		durations["one week"]			= 1002;
		durations["one month"]			= 1003;
		durations["less than a day"]	= 1104;

		// get the price for a laundry item then base it on price
		$scope.prices 		= prices;

		$scope.durations	= durations;
	};
}]);