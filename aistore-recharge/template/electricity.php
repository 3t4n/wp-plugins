
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
 <select class="form-control" ng-model="recharge.operator" name="recharge_operator" ng-change="GetAmount(recharge)" autocomplete="on">
                        <option ng-repeat="operators in myData"   ng-selected="goperator === operators.id" value="{{operators.id}}">
                            {{operators.operator}}
                        </option>
                    </select>


 </td></tr>

 <tr><td >

	

Recharge  Amount

</td><td >

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
        "operator": "BSES Yamuna",
        "id": "BSESY",
        "code": "BSESY"
    },
     {
        "operator": "MSEDC Limited",
        "id": "MSEDC",
        "code": "MSEDC"
    },
    {
        "operator": "Southern Power Distribution Company Of Telengana LTD",
        "id": "SPTL",
        "code": "SPTL"
    },

    {
        "operator": "MSEDC Limited",
        "id": "MSEDC",
        "code": "MSEDC"
    },
    {
        "operator": "Rajasthan Vidyt Vitran Nigam Limited",
        "id": "RVVNL",
        "code": "RVVNL"
    },
    {
        "operator": "Souther Power Distribution Comapany LTD Of Andhra Pradesh",
        "id": "SPAP",
        "code": "SPAP"
    },
    {
        "operator": "Torrent Power",
        "id": "TPB",
        "code": "TPB"
    },

    {
        "operator": "MP Madhya Kshetra Vidyut Vitran Company Limited-Bhopal",
        "id": "MPMKVCLB",
        "code": "MPMKVCLB"
    },
    {
        "operator": "Noida Power Company Limited",
        "id": "NPCL",
        "code": "NPCL"
    },
    {
        "operator": "MP Paschim Kshetra Vidyut Vitaran Indore",
        "id": "MPMKVCL",
        "code": "MPMKVCL"
    },
    {
        "operator": "Calcutta Electricity Supply LTD",
        "id": "CESL",
        "code": "CESL"
    },
    {
        "operator": "CHHATTISGARH STATE ELECTRICITY BOARD",
        "id": "CESL",
        "code": "CESL"
    },
    {
        "operator": "INDIA POWER CORPORATION LIMITED-BIHAR",
        "id": "IPCLB",
        "code": "IPCLB"
    },

    {
        "operator": "BANGALORE ELECTRICITY SUPPLY COMPANY",
        "id": "BESC",
        "code": "BESC"
    },
    {
        "operator": "BHARATPUR ELECTRICITY SERVICES LTD",
        "id": "BESL",
        "code": "BESL"
    },
    {
        "operator": "BIKANER ELECTRICITY SUPPLY LIMITED (BKESL)",
        "id": "BESL",
        "code": "BESL"
    },
    {
        "operator": "BRIHAN MUMBAI ELECTRIC SUPPLY AND TRANSPORT UNDERT",
        "id": "BMSTU",
        "code": "BMSTU"
    },
    {
        "operator": "BSES RAJDHANI",
        "id": "BSESR",
        "code": "BSESR"
    },
    {
        "operator": "DAMAN AND DIU ELECTRICITY ARTMENT",
        "id": "DDED",
        "code": "DDED"
    },
    {
        "operator": "DAKSHIN HARYANA BIJLI VITRAN NIGAM",
        "id": "DHBVN",
        "code": "DHBVN"
    },
    {
        "operator": "DNH POWER DISTRIBUTION COMPANY LTD",
        "id": "DNHPD",
        "code": "DNHPD"
    },
    {
        "operator": "EASTERN POWER DISTRIBUTION COMPANY OF ANDHRA PRADE",
        "id": "EPDCA",
        "code": "EPDCA"
    },
    {
        "operator": "GULBARGA ELECTRICITY SUPPLY COMPANY LTD",
        "id": "GESC",
        "code": "GESC"
    },
    {
        "operator": "JAMSHEDPUR UTILITIES AND SERVICES COMPANY LTD",
        "id": "JUSC",
        "code": "JUSC"
    },
    {
        "operator": "JAIPUR AND AJMER VIYUT VITRAN NIGAM",
        "id": "JAVVN",
        "code": "JAVVN"
    },
    {
        "operator": "JODHPUR VIDYUT VITRAN NIGAM LTD",
        "id": "JVVNL",
        "code": "JVVNL"
    },
    {
        "operator": "JHARKHAND BIJLI VITRAN NIGAM LIMITED",
        "id": "JBVNL",
        "code": "JBVNL"
    },
    {
        "operator": "KOTA ELECTRICITY DISTRIBUTION LTD",
        "id": "KEDL",
        "code": "KEDL"
    },
    {
        "operator": "MEGHALAYA POWER DISTRIBUTION CORPORATI ON LTD",
        "id": "MPDC",
        "code": "MPDC"
    },

    {
        "operator": "MUZAFFARPUR VIDYUT VITRAN LTD",
        "id": "MVVL",
        "code": "MVVL"
    },
    {
        "operator": "NORTH DELHI POWER LTD(TATA POWER-DDL)",
        "id": "NDPL",
        "code": "NDPL"
    },
    {
        "operator": "NORTH BIHAR POWER DISTRIBUTION COMPANY LTD",
        "id": "NBPDC",
        "code": "NBPDC"
    },
    {
        "operator": "PUNJAB STATE POWER CORPORATION LTD",
        "id": "PSPCL",
        "code": "PSPCL"
    },
    {
        "operator": "SOUTH BIHAR POWER DISTRIBUTION COMPANY LTD.",
        "id": "SBPDC",
        "code": "SBPDC"
    },
    {
        "operator": "SNDL NAGPUR",
        "id": "SNDLN",
        "code": "SNDLN"
    },
    {
        "operator": "SOUTHERN POWER DISTR OF ANDHRA PRADESH",
        "id": "SPDAP",
        "code": "SPDAP"
    },
    {
        "operator": "TRIPURA STATE ELECTRICITY CORPORATION LTD",
        "id": "TSECL",
        "code": "TSECL"
    },
    {
        "operator": "TAMIL NADU ELECTRICITY BOARD",
        "id": "TNEB",
        "code": "TNEB"
    },
    {
        "operator": "TP AJMER DISTRIBUTION LTD",
        "id": "TPADL",
        "code": "TPADL"
    },
    {
        "operator": "TATA POWER–MUMBA",
        "id": "TPM",
        "code": "TPM"
    },
    {
        "operator": "UTTAR HARYANA BIJLI VITRAN NIGAM",
        "id": "UHBVN",
        "code": "UHBVN"
    },
    {
        "operator": "UTTARAKHAND POWER CORPORATION LTD",
        "id": "UPCL",
        "code": "UPCL"
    },
    {
        "operator": "UP POWER CORP LTD (UPPCL)-URBAN",
        "id": "UPPCL",
        "code": "UPPCL"
    },
    {
        "operator": "UP POWER CORP LTD (UPPCL)-RURAL",
        "id": "UPPCR",
        "code": "UPPCR"
    },

    {
        "operator": "WEST BENGAL STATE ELECTRICITY",
        "id": "WBSE",
        "code": "WBSE"
    },
    {
        "operator": "INDIA POWER CORPORATION -WEST BENGAL",
        "id": "IPCWB",
        "code": "IPCWB"
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
	
      
    };
       
         });
      </script>
