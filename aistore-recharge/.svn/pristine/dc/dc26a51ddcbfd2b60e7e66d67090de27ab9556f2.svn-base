
      <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>


 <div ng-app = "myapp" ng-controller = "HelloController">
 <div class="col-md-6">
 <form method="post" action="<?php echo $url2; ?>">

  <table  class="table">

  



  
  <tr><td>

Number</td><td >

 <input class="form-control"   ng-model="recharge.mobile"  type="text" name="recharge_number" >
   

</td></tr>



<tr><td >

Operator</td><td >
 <select class="form-control" ng-model="recharge.operator" name="mobile_operator" ng-change="GetAmount(recharge)" autocomplete="on">
                        <option ng-repeat="operators in myData"   ng-selected="goperator === operators.id" value="{{operators.id}}">
                            {{operators.operator}}
                        </option>
                    </select>


 </td></tr>

 <tr><td>

	

Recharge  Amount

</td><td>

<input type="text" ng-model="recharge.amount" name="recharge_amount"  autocomplete="on" maxlength="4" class="rupee" />

	

   </td></tr>

   

   <tr>
        <td><?php wp_nonce_field('process_recharge', 'process_recharge'); ?></td>
       
       <td>

<input type="submit" value="Process Recharge" />

</td></tr>


</table>


</form>

</div>
   <script>
         angular.module("myapp", [])
         
         .controller("HelloController", function($scope,$http,) {
             $scope.myData = [
    {
        "operator": "Adani Gas",
        "id": "AG",
        "code": "AG"
    },
    {
        "operator": "SITI ENERGY",
        "id": "SEG",
        "code": "SEG"
    },

    {
        "operator": "Mahanagar Gas LIMITED",
        "id": "MGL",
        "code": "MGL"
    },
    {
        "operator": "GUJARAT GAS COMPANY LIMITED",
        "id": "GGCL",
        "code": "GGCL"
    },
    {
        "operator": "HARYANA CITY GAS",
        "id": "HCG",
        "code": "HCG"
    },
    {
        "operator": "IGL (INDRAPRASTH GAS LIMITED)",
        "id": "IGL",
        "code": "IGL"
    },
    {
        "operator": "TRIPURA NATURAL GAS COMPANY LTD",
        "id": "TNGCL",
        "code": "TNGCL"
    },
    {
        "operator": "SABARMATI GAS LIMITED (SGL)",
        "id": "SGL",
        "code": "SGL"
    },
    {
        "operator": "UNIQUE CENTRAL PIPED GASES PVT LTD (UCPGPL)",
        "id": "UCPGP",
        "code": "UCPGP"
    },
    {
        "operator": "VADODARA GAS LIMITED",
        "id": "VGL",
        "code": "VGL"
    }
];
$scope.GetAmount = function (recharge) {
   console.log(recharge);
  // console.log(mobile);
   //$scope.Operator = $scope.recharge.Operator;
   // console.log($scope.Operator);
	 $http.post("http://api.sakshamapp.com/Bill_Fetch?recharge_operator="+$scope.recharge.operator+"&recharge_number=" + $scope.recharge.mobile)
                .then(function (response) {
                    console.log(response);
                   // alert(response.data.Status);
               $scope.recharge.amount = response.data.amount;
                   
                });
	
      
    };  });
      </script>
