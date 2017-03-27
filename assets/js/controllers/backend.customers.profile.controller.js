"use strict";

app.controller("ProfileCntrl", ["$scope","CustServ", function($scope, CustServ)
{
    // person variable
    $scope.person = {};

    // load the session for the profile
    $scope.loadProfile  = function(base_url)
    {
        CustServ.getProfile(base_url).then((aResponse) => {
            angular.copy(aResponse, $scope.person);
        }).catch((aError) => {
            console.error(aError);
        });
    }

    // check form is complete
    $scope.form_complete    = function()
    {
        var valid           = $scope.form.$valid;

        if($scope.person._password === $scope.person._repassword)
        {
            if($scope.form.password.$valid)
            {
                valid &= true;
            }
            else
            {
                valid &= false;
            }
        }
        else
        {
            if($scope.person._password.length < 1)
            {
                valid &= true;
            }
            else
            {
                valid &= false;
            }
        }
        return valid;
    };

    // update the user profile
    $scope.updateProfile    = function(base_url)
    {
        CustServ.updateProfile(base_url, $scope.person)
        .then((aResponse) => {
            console.log(aResponse);
        })
        .catch((aError) => { console.error(aError); });
    }
}]);
