<?php

$post_string = "" ;

foreach ($_POST as $key => $value)
{
  	//echo "{$key} = {$value}\r\n";

	$post_string =$post_string . "----------------------------FormBoundary12456789\r\n";
	$post_string =$post_string . "Content-Disposition: form-data; name=\"" . $key . "\"\r\n" ;
	$post_string =$post_string . "\r\n";
	$post_string =$post_string . $value .	"\r\n";
}



$post_string = $post_string .   "----------------------------FormBoundary12456789--\r\n";

 
//create cURL connection http://bizchatbox.org:8088/
//$curl_connection =   curl_init('http://localhost:8280/');

//$curl_connection =   curl_init('http://108.161.137.197:8088/');
$curl_connection =   curl_init('http://bizchatbox.org/');
 
//set options
curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 120);
curl_setopt($curl_connection, CURLOPT_USERAGENT, 
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
 
//set data to be posted
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
 
//perform our request
$result = curl_exec($curl_connection);

//echo $result;

$obj = json_decode($result,true);

echo $obj['Authtoken'];
 
//show information regarding the request
//print_r(curl_getinfo($curl_connection));
//echo curl_errno($curl_connection) . '-' . 
//                curl_error($curl_connection);
 
//close the connection
curl_close($curl_connection);
 
?>
