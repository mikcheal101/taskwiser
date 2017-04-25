'use strict';

app.controller('customController', ["$scope", "$rootScope", function($scope, $rootScope) 
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
		type		: "local",
		details		: ""
	};

	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{
		$scope.quote_gotten	= true;
		/*
		laundryService.getQuote({type: $scope.order.type, quantity: total_quantity}).then(aData => {
			console.log(aData);
		}).catch(aError => {
			console.error(aError);
		});
		*/
	};

}]);
