<?php
//lade client id php
require_once 'ga-cid.php';

//transparenten pixel laden
header("Content-type: image/png");
$img = imagecreatetruecolor(1, 1);
imagesavealpha($img, true);
$color = imagecolorallocatealpha($img, 255, 255, 255, 127);
imagefill($img, 0, 0, $color);
imagepng($img);
imagedestroy($img);

//extra infos über benutzer
$user_agent = $_SERVER['HTTP_USER_AGENT'];

//Test für Mesurement protokoll
$data1 = array(
 'v' => 1,
 'tid' => 'UA-113154044-1', 
 'aip' => 1,
 'cid' => $cid, //ineinem  bit kreieren
 'ua' => $user_agent,
 't' => 'pageview',
 'dh' => 'https://www.analytics-sem-tutorials.de/', 
 'dp' => '/ga-test/',
 'dt' => 'ga test'
);

//GA Server senden
$url = 'https://www.google-analytics.com/collect';
$content1 = http_build_query($data1);
$content1 = utf8_encode($content1);
$ch1 = curl_init();
curl_setopt($ch1,CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch1, CURLOPT_URL, $url);
curl_setopt($ch1,CURLOPT_HTTPHEADER,array('Content-type: application/x-www-form-urlencoded'));
curl_setopt($ch1,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
curl_setopt($ch1,CURLOPT_POST, TRUE);
curl_setopt($ch1,CURLOPT_POSTFIELDS, $content1);
curl_setopt($ch1,CURLOPT_RETURNTRANSFER, TRUE);
curl_exec($ch1);
curl_close($ch1);
?>