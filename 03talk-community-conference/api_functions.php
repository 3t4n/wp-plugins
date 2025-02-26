<?php

// main JSON data post function.  

  function json_postdata($URL, $postdata)
  {
    $ch = curl_init();
    $header[] = "Content-type: text/xml";
    curl_setopt($ch, CURLOPT_USERAGENT, 'WORDPRESS / 03TALK API');
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_TIMEOUT, 900);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

    $response = curl_exec($ch);

    if (curl_errno($ch)){
    	print curl_error($ch);
	 return false;
    }

    curl_close($ch);
  
    return($response);
  }
  
  // Generate and return new conferene details.  
  
  function get_conference_details($token)
  {
	$data = array(
	'service'		=> "03talk",
	'action'			=> "fastconfgen",
	'token'			=> $token,
	'appname'		=> "WORDPRESS"
	);
	$data = json_encode($data);
	$result = json_postdata("http://api.zimo.co.uk/03talk/srv.php",$data);
	$result = json_decode($result, true); 
	return array('conference_number'=>$result['confno'], 'conference_pin'=>$result['pin']);	
  }
  
  function conference_changepin($confno, $pin, $token)
  {
	$data = array(
	'service'	=> "03talk",
	'action'		=> "changepin",
	'confno'	=> $confno, 
	'pin'		=> $pin,
	'token'		=> $token
	);
	$data = json_encode($data);
	$result = json_postdata("http://api.zimo.co.uk/03talk/srv.php",$data);
	$result = json_decode($result, true); 
	return $result;
  }
  
  
?>