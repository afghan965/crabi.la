var app = angular.module('app', ['ngRoute']);

app.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {

	$routeProvider.
	when('/home', {

		templateUrl: '/application/views/home.html',
		controller: 'HomeController'		

	}).when('/:categoria/:slug', {

		templateUrl: '/application/views/noticia.html',
		controller: 'NoticiaController'	

	}).otherwise({

		redirectTo: '/home'

	});

	$locationProvider.html5Mode(true);

}]);

app.controller('HomeController', function($scope, $http) {

	$http.get('/application/scripts/home/destacados.php').success(function(data){
		$scope.destacado1 = data[1];
		$scope.destacado2 = data[2];
		$scope.destacado3 = data[3];
	})
	
})

app.controller('NoticiaController', function($scope) {
	console.log("lala2");
})
