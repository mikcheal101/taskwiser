'use strict';

app.controller('adminController', ["$scope", "$rootScope","AdminApi", "tookanService", "pricesService",  
	function($scope, $rootScope, AdminApi, tookanService, pricesService) {

	$scope.base_url			= "";

	$scope.prices 			= [];
	$scope.items_prices		= [];
	
	$scope.selected_item	= {};
	$scope.selected_price	= {};

	$scope.parse_url			= function(url) {
		return $scope.base_url.concat(url);
	};

	$scope.loadPrices 			= function(base_url) {
		
		angular.copy(base_url, $scope.base_url);
		AdminApi
			.getPrices(base_url)
			.then((aResponse) => { angular.copy(aResponse.data, $scope.prices); })
			.catch((aError) => { console.log(aError); });
	};

	$scope.setSelected 			= function(prt, val, item, i) {
		$scope.selected_item.prt 	= prt;
		$scope.selected_item.val	= val;
		$scope.selected_item.item 	= item;
		$scope.selected_item.i 		= i;

		$scope.selected_item.aRes 	= (i === null) ? item:i;
	};

	$scope.priceChange 			= function() {
		var index = $scope.prices.indexOf($scope.selected_item.prt);
		if($scope.selected_item.i === null) 
			$scope.selected_item.prt['_items_prices'][$scope.selected_item.val] = $scope.selected_item.aRes;
		else 
			$scope.selected_item.prt['_items_prices'][$scope.selected_item.val][$scope.selected_item.item] = $scope.selected_item.aRes;

		$scope.prices[index] 	= $scope.selected_item.prt;
		$scope.selected_price 	= $scope.selected_item.prt;
	};

	$scope.updatescPrice		= function() {
		AdminApi
			.updatePrice($scope.base_url, $scope.selected_price)
			.then( aData => {
				console.log(aData);
				$scope.selected_price = {};
			})
			.catch(aError => {
				console.error(aError); 
				$scope.selected_price = {};
			});
	};

	$scope.upload				= function(file, param) {
		console.log(file);
		angular.copy(param, file);
	};
	

	// workers
	$scope.workers 				= [];
	$scope.selected_staff		= {};

	$scope.loadWorkers 			= function(base_url) {
		angular.copy(base_url, $scope.base_url);
		AdminApi
			.getWorkers(base_url)
			.then((aResponse) => {
				return tookanService.list_agents(aResponse);
			})
			.then((bResponse) => {
				console.log(bResponse);
			})
			.catch((aError) => { console.log(aError); });
	};

	$scope.setWorker 			= function(worker) {
		$scope.selected_staff = worker;
	};

	$scope.dropWorker			= function() {
		$scope.workers.splice(0, $scope.workers.indexOf($scope.selected_staff));
	};	

	$scope.updateWorker			= function(base_url) {
		AdminApi
			.updateWorker(base_url, $scope.selected_staff)
			.then(aRes => { 
				console.log('staff updated');  
				$scope.workers[$scope.workers.indexOf($scope.selected_staff)] = $scope.selected_staff;
				$scope.selected_staff = {}; 
			})
			.catch(aErr => { console.log('staff not updated', aErr);  $scope.selected_staff = {}; });
	};

	$scope.worker 				= {};
	$scope.categories_workers	= [];


	// sales
	$scope.sales 				= {};
	$scope.sales.data 			= [];

	$scope.sales.init 			= function(base_url) {
		pricesService
			.getSales(base_url)
			.then(aResponse => angular.copy(aResponse.data, $scope.sales.data))
			.catch(aError	=> console.log(aError));
	};
}]);