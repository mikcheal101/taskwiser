var app = angular.module('app', ["ngLodash"]);

app.run(function($rootScope){
    $rootScope.ravepay  = {};
    $rootScope.app      = {};

    $rootScope.app.logo = "//taskwiser.ravepay.co/files/paybutton-images/ee6ab4cb27007f2312ef62f8d97c88ed.png";

    $rootScope.ravepay.public_key   = "FLWPUBK-56baa33e240c072ffe55a8f2cd8deadb-X";
    $rootScope.ravepay.custom_title = "Taskwiser Checkout";
});
