

var app = angular.module("automob-plugin", ['angular.filter']); 
app.controller("automob-search-form-controller", function($scope,$http) {

 $http({ 
      method: 'POST', 
      url: amSearchParams.ajaxurl, 
      params: {
          action: 'search_filter_options',
      }
  }).success(function(data, status, headers, config) {
      console.log($scope.filters);
      $scope.raw_cars = data.raw_cars;
      $scope.filtered_cars = data.raw_cars;
      $scope.asking_price_range = data.price_range;
      $scope.update();

  }).error(function(data, status, headers, config) {

  });



  function filter($raw,$filter_key,$filter_value){
    $semi_filtered_cars = [];
    for (var i = 0; i < $raw.length; i++) {
      if (($raw[i][$filter_key] == $filter_value)||($filter_value=="Any")){
        $semi_filtered_cars.push($raw[i]);    
      }
    }
    // console.log($semi_filtered_cars);
    return $semi_filtered_cars;
  }

	$scope.update = function () {
    // alert($scope.raw_cars);
  $semi_filtered_cars = $scope.raw_cars;
      for(var key in $scope.filters) {
          var value = $scope.filters[key];
          $semi_filtered_cars = filter($semi_filtered_cars,key,value);
      }
    
    $scope.filtered_cars=$semi_filtered_cars;
	}

  $scope.reset = function () {
    $scope.filters={condition:"Any",make:"Any",model:"Any"};
    $scope.update();
    // jQuery("select.select2").select2('data', {}); // clear out values selected
    // jQuery("select.select2").select2({ allowClear: true }); // re-init to show default status
    // jQuery("#automob-search-form select").trigger('change');
  }

});
app.controller("automob-inventory-controller", function($scope,$http) {
  $http({ 
      method: 'POST', 
      url: amSearchParams.ajaxurl, 
      params: {
          action: 'async_car_list',
      }
  }).success(function(data, status, headers, config) {
      $scope.cars = data;
  }).error(function(data, status, headers, config) {

  });

});

app.controller("automob-single-controller", function($scope,$http) {
  $http({ 
      method: 'POST', 
      url: amSearchParams.ajaxurl, 
      params: {
          action: 'async_single_car',
      }
  }).success(function(data, status, headers, config) {
      $scope.cars = data;
  }).error(function(data, status, headers, config) {

  });

});



