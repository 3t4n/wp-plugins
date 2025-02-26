var app = angular.module("ajsInstagramFeed", ['ngResource'])
	.controller('AjsInstagramFeedController', function($scope, $http, instagram) {
		//$scope.layout = 'grid';
		$scope.pics = [];
		$scope.user = [];
		$scope.auth = [];
		
		var auth_url = pluginUrl + "/ajs-instagram-feed/includes/ajs-authentication.php";
		var promise = $http.get(auth_url);
		
		// Use the instagram service and fetch a list of the popular pics
		promise.then(function(response) {
			$scope.auth = response;
			
			instagram.fetchPopular($scope.auth, function(data){
				$scope.pics = data;
			});
		
			instagram.fetchUser($scope.auth, function(data){
				$scope.user = data;
			});
		});
    });
	
	app.factory('instagram', function($resource, $http){
		 
		return {
			
			fetchPopular: function(auth, callback){
				
				var api = $resource('https://api.instagram.com/v1/users/:user_id/media/recent/?access_token=:access_token&count=:count&callback=JSON_CALLBACK',{
					user_id: auth.data.user_id,
					access_token: auth.data.access_token,
					count: auth.data.count
				},{
					fetch:{method:'JSONP'}
				});

				api.fetch(function(response){
					callback(response.data);
				});
			},
			
			fetchUser: function(auth, callback){
				var api = $resource('https://api.instagram.com/v1/users/:user_id/?access_token=:access_token&callback=JSON_CALLBACK',{
					user_id: auth.data.user_id,
					access_token: auth.data.access_token
				},{
					fetch:{method:'JSONP'}
				});

				api.fetch(function(response){
					callback(response.data);
				});
			}
		}
	});


