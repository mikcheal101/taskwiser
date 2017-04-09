'use strict';

app.controller('laundryController', ["$scope", "$rootScope", "laundryService", "lodash", "generalService",
		function($scope, $rootScope, laundryService, lodash, generalService)
{

	$scope.today 			= new Date();
	$scope.payment 			= {};
	$scope.payment.ref		= Date.now();
	$scope.base_url			= "";

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
		// send the data or response to the server
		generalService.payment_made(response, $scope.order, $scope.total_price, $scope.base_url).then(aResponse => {
			// redirect to the login page
		}).catch(aError => console.error(aError));
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
	};

	$scope.make_payment		= function()
	{
		getpaidSetup({
			customer_email:$scope.order.email,
			amount:$scope.total_price,
			txref:"takswiser-checkout-"+$scope.payment.ref,
			PBFPubKey:$rootScope.ravepay.public_key,
			custom_logo: $rootScope.app.logo,
			custom_title: $rootScope.ravepay.custom_title,
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
		$scope.base_url 	= base_url;
		generalService
			.fetch_quote("laundry", $scope.base_url)
			.then((aResponse) => {
				angular.copy(aResponse, $scope.prices);
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
