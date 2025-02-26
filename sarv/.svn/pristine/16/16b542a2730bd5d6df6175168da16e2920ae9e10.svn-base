<?php

function Sarv_getContactLists($listId){
	
      $dataInfo = Sarv_getUserTokenInfo();
      $apiInfo = json_decode($dataInfo[0]->value);

      $url = "http://app4.in.sarv.email/api/contact/getContactLists/".$listId;
      $data = array();
      $data['user_id'] = $apiInfo->userid;
      $data['token'] = $apiInfo->token;

      $fields = json_encode($data);

      $postdata = http_build_query(
             array(
                 'data' => $fields
             )
         );
      $opts = array('http' =>
          array(
              'method'  => 'POST',
              'header'  => 'Content-type: application/x-www-form-urlencoded',
              'content' => $postdata
          )
      );
      $context  = stream_context_create($opts);
      $result = file_get_contents($url, false, $context);

      $contactList = json_decode($result);
      $formLists = (array)$contactList->DATA;

      return $formLists;

}



function Sarv_viewContactLists() {

  $dataInfo = Sarv_getUserTokenInfo();
  $apiInfo = json_decode($dataInfo[0]->value);

	$url = "http://app4.in.sarv.email/api/contact/viewContactLists/";
	$data = array();
	$data['user_id'] = $apiInfo->userid;
	$data['token'] = $apiInfo->token;

	$fields = json_encode($data);

      $postdata = http_build_query(
             array(
                 'data' => $fields
             )
         );
      $opts = array('http' =>
          array(
              'method'  => 'POST',
              'header'  => 'Content-type: application/x-www-form-urlencoded',
              'content' => $postdata
          )
      );
      $context  = stream_context_create($opts);
      $result = file_get_contents($url, false, $context);

      $contactList = json_decode($result);
      $formLists = (array)$contactList->DATA;

      return $formLists;
	
}


function Sarv_addContacts($listId, $formData)
{

      $dataInfo = Sarv_getUserTokenInfo();
      $apiInfo = json_decode($dataInfo[0]->value);
      $url = "http://app4.in.sarv.email/api/contact/addContacts/".$listId;
      $data = array();
      $data['user_id'] = $apiInfo->userid;
      $data['token'] = $apiInfo->token;

      $checkOpt = Sarv_getDataFromDb($_POST['listid']);
      $checkOpt = json_decode($checkOpt[0]->value);
      $optValue = $checkOpt->opt_in->value;

      if(isset($optValue) && $optValue=="true"): $formData['opt_in']=true; endif;

      foreach ($formData as $key => $value) {
          $data[$key] = $value;
      }

      $fields = json_encode($data);

      $postdata = http_build_query(
             array(
                 'data' => $fields
             )
         );
      $opts = array('http' =>
          array(
              'method'  => 'POST',
              'header'  => 'Content-type: application/x-www-form-urlencoded',
              'content' => $postdata
          )
      );
      $context  = stream_context_create($opts);
      $result = file_get_contents($url, false, $context);
      return $result;
	
}



function Sarv_getUserTokenInfo()
{

    global $wpdb;
     
    $tableName = $wpdb->prefix . 'sarvoptions';
    $getUserToken = $wpdb->get_results("SELECT * FROM $tableName WHERE name='options'");

    return $getUserToken;
  
}


function Sarv_getDataFromDb($nameVal)
{
    global $wpdb;
    $tableName = $wpdb->prefix . 'sarvoptions';
    $checkData = $wpdb->get_results("SELECT * FROM $tableName WHERE name='".$nameVal."'");

    return $checkData;
}

function Sarv_inserDataInDb($nameVal, $formVal)
{
    global $wpdb;
    $tableName = $wpdb->prefix . 'sarvoptions';
    $queryResult = $wpdb->query("INSERT INTO $tableName (name,value) VALUES ('".$nameVal."','".$formVal."')");

    return $queryResult;
}


function Sarv_updateDataInDb($nameVal, $formVal)
{
    global $wpdb;
    $tableName = $wpdb->prefix . 'sarvoptions';
    $queryResult = $wpdb->query("UPDATE $tableName SET value='".$formVal."' WHERE name=".$nameVal);

    return $queryResult;
}


function Sarv_checkApiConnection(){
  
    $dataInfo = Sarv_getUserTokenInfo();
    $apiInfo = json_decode($dataInfo[0]->value);

    $url = "http://app4.in.sarv.email/api/contact/viewContactLists/";
    $data = array();
    $data['user_id'] = $apiInfo->userid;
    $data['token'] = $apiInfo->token;

    $fields = json_encode($data);

        $postdata = http_build_query(
               array(
                   'data' => $fields
               )
           );
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);
        return $result = file_get_contents($url, false, $context);
}
?>