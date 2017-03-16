'use strict';

app.controller("eventsController", ["$scope", "$rootScope", "eventsService", function($scope, $rootScope, eventsService) 
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
		address		: "My Address",
		type		: "disc jockey",
		details		: "my details",
		duration	: "one week"
	};

	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.durations	= [];
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{

		console.log($scope.order.type);
		console.log($scope.prices[$scope.order.type]);

		$scope.total_price 	= parseInt($scope.prices[$scope.order.type]);

		console.log( $scope.total_price, $scope.order.duration, $scope.durations[$scope.order.duration]);

		$scope.total_price	= $scope.total_price * parseInt($scope.durations[$scope.order.duration]);
		console.log( $scope.total_price);

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
		var prices 				= [];
		prices["photographer"]	= 100;
		prices["disc jockey"]	= 30;
		prices["live band"]		= 1430;

		var durations			= [];
		durations["one day"]		= 300;
		durations["one week"]		= 10;
		durations["one month"]		= 21;
		durations["less than a day"]= 310;

		// get the price for a laundry item then base it on price
		$scope.prices 		= prices;
		$scope.durations	= durations;
	}

	$scope.getAmount		= function(item){
		item = parseInt(item);
		return item < 0 ? 0 : item;
	};
}]);