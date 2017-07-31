'use strict';app.controller('deliveryController',["$scope","$rootScope","generalService","tookanService",function($scope,$rootScope,generalService,tookanService){$scope.today=new Date();$scope.payment={};$scope.payment.ref=Date.now();$scope.total_price=0;$scope.prices=[];$scope.quote_gotten=false;$scope.order={hour:($scope.today.getHours()%12).toString(),minute:$scope.today.getMinutes().toString(),year:$scope.today.getFullYear().toString(),period:"am",day:$scope.today.getDate().toString(),month:($scope.today.getMonth()+1).toString(),mobile:"",name:"",email:"",address:"",type:"food delivery",details:""};$scope.payment.callback=function(response){generalService.payment_made(response,$scope.order,$scope.total_price,$scope.base_url).then(aResponse=>{return tookanService.create_task(aResponse.order.customer,aResponse.order.order,'delivery',$scope.Util.tookanapp_teams.deliveries);}).then(bResponse=>{bResponse.data=bResponse.data.data;return generalService.assign_order_to_task(bResponse,$scope.base_url);}).then((cResponse)=>{window.location=$scope.base_url;}).catch(aError=>console.error(aError));};$scope.payment.close=function(){console.log("payment cancelled");}
$scope.get_quote=function(){$scope.total_price=parseInt($scope.prices._items_prices[$scope.order.type]);$scope.total_price+=parseInt($scope.prices._service_charge);$scope.quote_gotten=true;};$scope.make_payment=function(){getpaidSetup({customer_email:$scope.order.email,amount:$scope.total_price,txref:"takswiser-checkout-"+$scope.payment.ref,PBFPubKey:$rootScope.ravepay.public_key,custom_logo:$rootScope.app.logo,custom_title:$rootScope.ravepay.custom_title,onclose:function(){$scope.payment.close();},callback:function(d){$scope.payment.callback(d);}});};$scope.getPrice=function(base_url){generalService.fetch_quote("delivery",base_url).then((aResponse)=>{angular.copy(aResponse,$scope.prices);}).catch((aErr)=>console.error(aErr));};}]);