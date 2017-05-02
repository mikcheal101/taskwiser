var app = angular.module('app', ["ngLodash"]);

app.run(function($rootScope){
    $rootScope.ravepay  = {};
    $rootScope.app      = {};
    $rootScope.tookanapp= {};

    $rootScope.app.logo = "//taskwiser.ravepay.co/files/paybutton-images/ee6ab4cb27007f2312ef62f8d97c88ed.png";
    $rootScope.app.url  = "http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js";

    //$rootScope.app.url  = "http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js";
    //$rootScope.ravepay.public_key   = "FLWPUBK-56baa33e240c072ffe55a8f2cd8deadb-X";
    $rootScope.ravepay.public_key   = "FLWPUBK-e634d14d9ded04eaf05d5b63a0a06d2f-X";
    $rootScope.ravepay.custom_title = "Taskwiser Checkout";

});
