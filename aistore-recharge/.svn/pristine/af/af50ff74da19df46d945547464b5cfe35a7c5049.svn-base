

      <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

 <div ng-app = "myapp" ng-controller = "HelloController">
 <div class="col-md-6">
 <form method="post" action="<?php echo $url2; ?>">

  <table  class="table">

  



  <tr><td>

Number</td><td>

 <input  length="10" pattern="[789][0-9]{9}"  ng-model="recharge.mobile" type="text" name="recharge_number"  maxlength="10" >
   

</td></tr>



<tr><td>

Operator</td><td>
 <select class="form-control" ng-model="recharge.Operator" name="recharge_operator"  autocomplete="on">
                        <option ng-repeat="operators in myData"   ng-selected="goperator === operators.id" value="{{operators.id}}">
                            {{operators.name}}
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
	    {"name": "Airtel Postpaid", "id1":"AP", "id":"AirtelPostpaid"},
	    {"name": "Bsnl Postpaid", "id1":"BP", "id":"BsnlPostpaid"},
	    {"name": "Idea Postpaid", "id1":"IP", "id":"IdeaPostpaid"},
	   
             {"name": "AIRCLE BILL", "id1":"AIP", "id":"AIRCLE"},
	   {"name": "Jiopostpaid", "id1":"RP", "id":"Reliance"},
	    {"name": "Tata Docomo Postpaid", "id1":"TP", "id":"Docomo"},
	    {"name": "Vodafone Postpaid", "id1":"VP", "id":"Vodafone"}
]

         });
      </script>