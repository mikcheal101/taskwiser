var app = angular.module('app', ["ngLodash"]);

app.controller('cntrl', ["$scope", "$rootScope", function ($scope, $rootScope) 
{

	$scope.get_quote		= function(order)
	{
		console.log(order);
	};
	
}]);