'use strict';

app.controller('laundryController', ["$scope", "$rootScope", "laundryService", "lodash", function($scope, $rootScope, laundryService, lodash)
{
	$scope.today 		= new Date();

	$scope.order 		= {
		hour 		: ($scope.today.getHours() % 12).toString(),
		minute	 	: $scope.today.getMinutes().toString(),
		year		: $scope.today.getFullYear().toString(),
		period		: "am",
		day 		: $scope.today.getDate().toString(),
		month		: ($scope.today.getMonth() + 1).toString(),
		gowns		: 0,
		shirts		: 0,
		troussers	: 0,
		suits		: 0,
		mobile		: "",
		name		: "",
		email		: "",
		address		: "",
		type		: "dry-cleaner",
		details		: ""
	};
	
	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{

		var total_quantity 	= $scope.getQuantities($scope.order);
		
		$scope.total_price	= parseInt(total_quantity) * 1;
		console.log($scope.total_price);

		$scope.total_price *= parseInt($scope.prices[$scope.order.type]);

		console.log(total_quantity, $scope.total_price);

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
		var prices 	= [];
		prices["dry-cleaner"]	= 100;
		prices["washer-man"]	= 210;

		// get the price for a laundry item then base it on price
		$scope.prices = prices;
	}


	$scope.getQuantities	= function(order){
		var total 	= 0;
		total 		+= $scope.getAmount(order.gowns);
		total 		+= $scope.getAmount(order.shirts);
		total 		+= $scope.getAmount(order.troussers);
		total 		+= $scope.getAmount(order.suits);
		return total;
	};

	$scope.getAmount		= function(item){
		item = parseInt(item);
		return item < 0 ? 0 : item;
	};

}]);
