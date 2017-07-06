'use strict';

app.controller('dieselController', ["$scope", "$rootScope", "generalService", "tookanService",
function($scope, $rootScope, generalService, tookanService)
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
		mobile		: "",
		name		: "",
		email		: "",
		address		: "",
		details		: "",
		liters		: "120"
	};

	$scope.total_price			= 0;
	$scope.price 				= {price: 1};
	$scope.quote_gotten			= false;

	$scope.get_quote			= function()
	{
		$scope.order.liters = parseInt($scope.order.liters);
		$scope.order.liters	= $scope.order.liters < 120 ? 120 : $scope.order.liters;

		$scope.total_price = parseInt($scope.order.liters);
		$scope.total_price	*= parseInt($scope.price._items_prices.price);

		$scope.total_price+= parseInt($scope.price._service_charge);
		$scope.quote_gotten	= true;
	};

	$scope.make_payment			= function()
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
	};

	$scope.payment.callback		= function(response)
	{
		// send the data or response to the server
		generalService
			.payment_made(response, $scope.order, $scope.total_price, $scope.base_url)
			.then(aResponse => {
				// send data to tookanapp
				return tookanService.create_task(aResponse.order.customer, aResponse.order.order, 'delivery', $scope.Util.tookanapp_teams.diesel);
			})
			.then(bResponse => {
				// send details to db
				bResponse.data 	= bResponse.data.data;
				return generalService.assign_order_to_task(bResponse, $scope.base_url);
			})
			.then((cResponse) => {
				// redirect to the index page
				window.location = $scope.base_url;
			})
			.catch(aError => console.error(aError));
	};

	$scope.payment.close		= function()
	{
		console.log("payment cancelled");
	};

	$scope.getPrice			= function(base_url)
	{
		generalService
			.fetch_quote("diesel", base_url)
			.then((aResponse) => {
				console.log(aResponse);
				angular.copy(aResponse, $scope.price);
			})
			.catch((aErr) => console.error(aErr));
	}
}]);
