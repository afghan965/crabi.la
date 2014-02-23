var app = angular.module('app', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {

	$routeProvider.
	when('/home', {

		templateUrl: 'application/views/home.html',
		controller: 'HomeController'		

	}).when('/:id/:slug', {

		templateUrl: 'application/views/noticia.html',
		controller: 'NoticiaController'	

	}).otherwise({

		redirectTo: '/home'

	});

}]);

app.controller('HomeController', function($scope) {
	console.log("lala1");
})

app.controller('NoticiaController', function($scope) {
	console.log("lala2");
})