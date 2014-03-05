var app = angular.module('app', ['ngRoute']);

app.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {

	$routeProvider.
	when('/home', {

		templateUrl: '/application/views/home.html',
		controller: 'HomeController'		

	}).when('/:id/:slug', {

		templateUrl: '/application/views/noticia.html',
		controller: 'NoticiaController'	

	}).otherwise({

		redirectTo: '/home'

	});

	$locationProvider.html5Mode(true);

}]);

app.controller('HomeController', function($scope) {
	
})

app.controller('NoticiaController', function($scope) {
	console.log("lala2");
})
