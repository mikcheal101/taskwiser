'use strict';

app.controller('laundry', ["$scope", "$rootScope", function($scope, $rootScope, laundryService) 
{
	$scope.today 		= new Date();

	$scope.order 		= {
		name 		: "",
		hour 		: $scope.today.getHours(),
		minute	 	: $scope.today.getMinutes(),
		year		: $scope.today.getYear(),
		period		: "am",
		day 		: $scope.today.getDate(),
		month		: $scope.today.getMonth(),
		gowns		: 0,
		shirts		: 0,
		troussers	: 0,
		suits		: 0,
		mobile		: "",
		name		: "",
		email		: "",
		address		: "",
		type		: "",
		details		: ""

	};

	$scope.get_quote	= function(form)
	{
		laundryService.get_quote($scope.order).then(aData => {
			console.log(aData);
		}).catch(aError => {
			console.error(aError);
		});
	};
}]);