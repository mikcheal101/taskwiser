'use strict';

app.controller('handymanController', ["$scope", "$rootScope", "handymanService", function($scope, $rootScope, handymanService) 
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
		type		: "carpenter",
		details		: ""
	};


	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{

		console.log($scope.order.type);
		console.log($scope.prices[$scope.order.type]);

		$scope.total_price = parseInt($scope.prices[$scope.order.type]);

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
		var prices 							= [];
		prices["electrician"]				= 100;
		prices["plumber"]					= 30;
		prices["carpenter"]					= 43;
		prices["tailor"]					= 109;
		prices["gen_repairs"]				= 112;
		prices["air_conditioner_repairs"]	= 900;
		prices["oven_repairer"]				= 120;
		prices["painter"]					= 245;

		// get the price for a laundry item then base it on price
		$scope.prices = prices;
		console.log($scope.prices);
	}

	$scope.getAmount		= function(item){
		item = parseInt(item);
		return item < 0 ? 0 : item;
	};
}]);