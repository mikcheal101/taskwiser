'use strict';

app.controller('customController', ["$scope", "$rootScope", "customService", function($scope, $rootScope, customService) 
{
	$scope.today 		= new Date();

	$scope.order 		= {
		hour 		: ($scope.today.getHours() % 12).toString(),
		minute	 	: $scope.today.getMinutes(),
		year		: $scope.today.getYear(),
		period		: "am",
		day 		: $scope.today.getDate(),
		month		: $scope.today.getMonth(),
		mobile		: "",
		name		: "",
		email		: "",
		address		: "",
		type		: "",
		details		: ""
	};

	$scope.get_quote	= function(form)
	{
		customService.getQuote($scope.order).then(aData => {
			console.log(aData);
		}).catch(aError => {
			console.error(aError);
		});
	};
}]);