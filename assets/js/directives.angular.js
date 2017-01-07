angular.module('app.directives', [])
.directive('inputNumber', function(){
	var dir 		= {};
	dir.restrict 	= "EA";
	dir.scope		= { 
		id: '=',
		text: '='
	};
	dir.link		= function(scope, ele, attr) {
		scope.text 			= attr.text;
		scope.number 		= attr.size || 0;
		scope.name 			= attr.name || "number[]";
		scope.min 			= attr.size || 0;

		scope.inputminus 	= function() {
			if(scope.number > scope.min) scope.number--;
		};
		scope.inputplus	= function() {
			scope.number++;
		};
	};
	dir.template	= `
		<div class="input-number input">
			<i class="glyphicon glyphicon-minus left minus" ng-click="inputminus();"></i>
			<div>
				<span id="number" >{{number}}</span> &nbsp;
				<b class="text-lowercase">{{text}}</b>
				<input type="hidden" name="{{name}}" ng-model="number" value="{{number}}" />
			</div>	
			<i class="glyphicon glyphicon-plus right plus" ng-click="inputplus();"></i>
		</div>
		<br>
	`;
	return dir;
})
.directive('inputDate', function() {
	return {
		restrict 	: 'EA',
		scope 		: true,
		link 		: function(s, e, a) {
			s._date 	= new Date();
			s._name 	= a.name || "date[]";
		},
		template	: `
			<div class="input-text input">
				<input type="date" name="{{_name}}" ng-model="_date"/>
			</div>
			<br/>
		`
	};
})
.directive('inputTime', function() {
	return {
		restrict 	: 'EA',
		scope 		: true,
		link 		: function(s, e, a) {
			s._time = new Date();
			s._name = a.name || "time[]";
		},
		template	: `
			<div class="input-text input">
				<input type="time" name="{{_name}}" ng-model="_time"/>
			</div>
			<br/>
		`
	};
});
