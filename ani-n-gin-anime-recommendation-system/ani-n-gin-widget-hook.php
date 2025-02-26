<?php 
// EDIT THIS: the query parameters
$nick = $_REQUEST['nick']; // URL to shrink

// Init the CURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://foolrulez.org/ARengine/AR-api.php");
curl_setopt($ch, CURLOPT_HEADER, 0);            // No header in the result
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
curl_setopt($ch, CURLOPT_POST, 1);              // This is a POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, array(     // Data to POST
		'nick'      => $nick
	));

$data = curl_exec($ch);
curl_close($ch);

echo <<<SHOWTIME
$data
SHOWTIME;
?>

