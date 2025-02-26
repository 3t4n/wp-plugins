<?php

require_once("sdata-modules.php");
// error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
// print_r($_REQUEST);
// echo "session";
// print_r($_SESSION);
class getAllItemscls
{
public function getAllItems($flag,$categoryId){
$sdata = new Modules();
error_log('=========Sales Curl Started============='.date("Y-m-d H:i:s"));

$count=0;
$getAllItems= $this->getAll($count,$flag,$categoryId);
$empty=0;
$itemRecords=array();
foreach($getAllItems->data as $records){
   $itemRecords[]=$records;
}

// echo '<pre>';print_r($customersRecords);exit;

$total=$getAllItems->countOfRecords;
//error_log('=======Total Apptivo Items Record ========'.$total);
$ss=0;
if($total > 50 ){
for($customeri=2;$customeri<=$total;$customeri++){
    $ss++;
    $customeri=$customeri+49;
    $getAllItems= $this->getAllItemsUrl($customeri,$flag,$categoryId);
    error_log('=======Getting of Items Record========'.$customeri);
    
    $cusurl[]=array('url'=>$getAllItems['url']);
    $cuscustom[]=array('post'=>$getAllItems['data'],'header'=>'Content-Type: application/x-www-form-urlencoded;charset=utf-8');
    
    
    
    
    if($ss == 50){
        
        try {
            error_log('=======Total Curl Request for getting Items ========'.count($cusurl));
            $APIresultscusts = $sdata->sdata($cusurl,$cuscustom);
            
            foreach($APIresultscusts as $APIresult){
                $getAllcustoms=json_decode($APIresult['respons']);
                
                foreach($getAllcustoms->data as $records){
                    $itemRecords[]=$records;
//                     if(empty()){
//                         $empty++;
//                     }
                    
                }
                
            }
            
        }
        catch (Exception $e) {
            error_log('====================== Caught======================'.$e);
        }
        
        
        sleep(2);
        unset($cusurl);
        unset($cuscustom);
        $ss=0;
    }
    
}
}

//echo '<pre>';print_r($cuscustom	);exit;
if($cuscustom){
    
    
    try {
        error_log('=======Total Curl Request for getting items remaining========'.count($cusurl));
        $APIresultscusts = $sdata->sdata($cusurl,$cuscustom);
        
        foreach($APIresultscusts as $APIresult){
            $getAllcustoms=json_decode($APIresult['respons']);
            
            foreach($getAllcustoms->data as $records){
                $itemRecords[]=$records;
//                 if(empty($records->customerNumber)){
//                     $empty++;
//                 }
                
            }
            
        }
        
    }
    catch (Exception $e) {
        error_log('====================== Caught======================'.$e);
    }
    
    
    sleep(2);
    unset($cusurl);
    unset($cuscustom);
    $ss=0;
    
}


 error_log('=======Total items srs recors========'.count($itemRecords));
 
 $itemResponse = new stdClass();
 $itemResponse->countOfRecords = count($itemRecords); 
 $itemResponse->data = $itemRecords;
 
 
 return $itemResponse;
 
}

function getAll($count,$flag,$categoryId) {
	
    
	if($flag == 'getAll'){
    $params = array (
            
    	    "a" => "getAll",
	        "iDisplayLength" =>$count,
	        "iDisplayStart"=>$count,
	        "numRecords"=>50,
	        "objectId"=>13,
	        "objectStatus" =>0,
	        "sSortDir_0"=>"desc",
	        "sortColumn"=>"creationDate",
	        "sortDir"=>"desc",
	        "startIndex"=>$count,
	        "apiKey" => APPTIVO_ECOMMERCE_API_KEY,
	        "accessKey" => APPTIVO_ECOMMERCE_ACCESSKEY
    );
	}else{
		   $params = array (
			"a" => "getAll",
	        "iDisplayLength" =>$count,
	        "iDisplayStart"=>$count,
	        "numRecords"=>50,
	        "objectId"=>13,
	        "sSortDir_0"=>"desc",
     		"selectedTab"=> "by-category",
			"selectedValue"=> $categoryId,
	        "sortColumn"=>"creationDate",
	        "sortDir"=>"desc",
	        "startIndex"=>$count,
	        "apiKey" => APPTIVO_ECOMMERCE_API_KEY,
	        "accessKey" => APPTIVO_ECOMMERCE_ACCESSKEY
		  );
	}

    
    
    $propResponse = getRestAPICall1 ( 'POST', ITEM_v6_API, $params );
    return $propResponse;
}

function getAllItemsUrl($count,$flag,$categoryId) {
	
	if($flag == 'getAll'){
		$params = array (
	     "a" => "getAll",
		        "iDisplayLength" =>$count,
		        "iDisplayStart"=>$count,
		        "numRecords"=>50,
		        "objectId"=>13,
		        "objectStatus" =>0,
		        "sSortDir_0"=>"desc",
		        "sortColumn"=>"creationDate",
		        "sortDir"=>"desc",
		        "startIndex"=>$count,
		        "apiKey" => APPTIVO_ECOMMERCE_API_KEY,
		        "accessKey" => APPTIVO_ECOMMERCE_ACCESSKEY
	    );
	}else{
		
	  $params = array (
			"a" => "getAll",
	        "iDisplayLength" =>$count,
	        "iDisplayStart"=>$count,
	        "numRecords"=>50,
	        "objectId"=>13,
	        "sSortDir_0"=>"desc",
     		"selectedTab"=> "by-category",
			"selectedValue"=> $categoryId,
	        "sortColumn"=>"creationDate",
	        "sortDir"=>"desc",
	        "startIndex"=>$count,
	        "apiKey" => APPTIVO_ECOMMERCE_API_KEY,
	        "accessKey" => APPTIVO_ECOMMERCE_ACCESSKEY
		  );
	}
    $propResponse=array('url'=>ITEM_v6_API,'data'=>$params);
    return $propResponse;
}



}