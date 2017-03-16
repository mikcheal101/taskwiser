'use strict';

app.controller('autoController', ["$scope", "$rootScope","autoService",  function($scope, $rootScope, autoService) 
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
		autoService.getQuote($scope.order).then(aData => {
			console.log(aData);
		}).catch(aError => {
			console.error(aError);
		});
	};
}]);