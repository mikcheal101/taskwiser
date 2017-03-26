'use strict';

app.controller('handymanController', ["$scope", "$rootScope", "handymanService", "generalService",
function($scope, $rootScope, handymanService, generalService)
{
	$scope.today 		= new Date();
	$scope.payment 		= {};
	$scope.payment.ref	= Date.now();

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
		$scope.total_price = parseInt($scope.prices._items_prices[$scope.order.type]);
		$scope.total_price+= parseInt($scope.prices._service_charge);
		$scope.quote_gotten	= true;
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
	};

	$scope.payment.callback		= function(response)
	{
		// send the data or response to the server
		console.log(response);
	};

	$scope.payment.close		= function()
	{
		console.log("payment cancelled");
	};

	$scope.getPrice			= function(base_url)
	{
		generalService
			.fetch_quote("handy_man", base_url)
			.then((aResponse) => {
				angular.copy(aResponse, $scope.prices);
			})
			.catch((aErr) => console.error(aErr));
	}

	$scope.getAmount		= function(item){
		item = parseInt(item);
		return item < 0 ? 0 : item;
	};
}]);
