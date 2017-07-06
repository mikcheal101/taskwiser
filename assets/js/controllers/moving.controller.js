'use strict';

app.controller('movingController', ["$scope", "$rootScope", "generalService", "tookanService",
function($scope, $rootScope, generalService, tookanService)
{
	$scope.today 		= new Date();
	$scope.payment 		= {};
	$scope.payment.ref	= Date.now();
	$scope.base_url 	= "";

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
		type		: "house",
		details		: "",
		boxes		: "1"
	};

	$scope.total_price	= 0;
	$scope.prices 		= [];
	$scope.quote_gotten	= false;

	$scope.get_quote	= function()
	{
		$scope.total_price = parseInt($scope.prices._items_prices[$scope.order.type]);
		$scope.total_price*= parseInt($scope.order.boxes);
		$scope.total_price+= parseInt($scope.prices._service_charge);
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
	};

	$scope.payment.callback		= function(response)
	{
		// send the data or response to the server
		// send the data or response to the server
		generalService
			.payment_made(response, $scope.order, $scope.total_price, $scope.base_url)
			.then(aResponse => {
				// send data to tookanapp
				return tookanService.create_task(aResponse.order.customer, aResponse.order.order, 'delivery_pickup', $scope.Util.tookanapp_teams.laundry);
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
		$scope.base_url 	= base_url;
		generalService
			.fetch_quote("moving", $scope.base_url)
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
