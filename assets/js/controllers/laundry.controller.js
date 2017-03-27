'use strict';

app.controller('laundryController', ["$scope", "$rootScope", "laundryService", "lodash", "generalService",
		function($scope, $rootScope, laundryService, lodash, generalService)
{

	$scope.today 			= new Date();
	$scope.payment 			= {};
	$scope.payment.ref		= Date.now();

	$scope.order 				= {
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

	$scope.payment.callback		= function(response)
	{
		// send the data or response to the server
		console.log(response);
	};

	$scope.payment.close		= function()
	{
		console.log("payment cancelled");
	}

	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.quote_gotten	= false;

	$scope.get_quote		= function()
	{

		var total_quantity 	= $scope.getQuantities($scope.order);
		$scope.total_price	= parseInt(total_quantity) * 1;
		$scope.total_price *= parseInt($scope.prices._items_prices[$scope.order.type]);
		$scope.total_price += parseInt($scope.prices._service_charge);
		$scope.quote_gotten	= true;

		/*
		Card Number: 5061020000000000094
		Expiry details: 07/20
		CVV: 347
		PIN: 123456
		*/
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
	}

	$scope.getPrice			= function(base_url)
	{
		generalService
			.fetch_quote("laundry", base_url)
			.then((aResponse) => {
				angular.copy(aResponse, $scope.prices);
				console.log($scope.prices._items_prices[$scope.order.type]);
			})
			.catch((aErr) => console.error(aErr));
	}

	$scope.getQuantities	= function(order)
	{
		var total 	= 0;
		total 		+= $scope.getAmount(order.gowns);
		total 		+= $scope.getAmount(order.shirts);
		total 		+= $scope.getAmount(order.troussers);
		total 		+= $scope.getAmount(order.suits);
		return total;
	};

	$scope.getAmount		= function(val)
	{
		return parseInt(val);
	};

}]);
