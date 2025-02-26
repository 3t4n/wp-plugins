<?php
//$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
$path = preg_replace('/wp-content.*$/','',__DIR__);
	include($path.'wp-load.php');
if (  !defined( 'ABSPATH' ) ) {exit;} 


if (strpos($_SERVER['HTTP_REFERER'], 'https://' . $_SERVER['HTTP_HOST'] . '/wp-admin/admin.php') === 0) {

$AG_str_json = file_get_contents('php://input');
$AG_str_json1 = json_decode($AG_str_json);
$DataOptOut = $AG_str_json1->DataOptOut;
$DataOptOut1 = str_replace('@', '+', $DataOptOut);	
$DataGA = $AG_str_json1->DataGA;
$DataGA1 = str_replace('@', '+', $DataGA);
$ScriptLoad = $AG_str_json1->ScriptLoad;
$ScriptLoad1 = str_replace('@', '+', $ScriptLoad);
$form7 = $AG_str_json1->form7;
file_put_contents("AGviewpage.js", $DataOptOut1);
file_put_contents("AGviewpage.js", $DataGA1, FILE_APPEND);
file_put_contents("AGviewpage.js", $ScriptLoad1, FILE_APPEND);
if($form7 != undefined){file_put_contents("AGevents.js", $form7);};

	

}
?>

if (strpos($_SERVER['HTTP_REFERER'], 'https://' . $_SERVER['HTTP_HOST'] . '/wp-admin/admin.php') === 0) {

$optout = $_GET['param1'];
$optout1 = str_replace('@', '+', $optout);
$activieren = $_GET['param2'];
$activieren1 = str_replace('@', '+', $activieren);
$scriptL = $_GET['param3'];
$scriptL1 = str_replace('@', '+', $scriptL);
$form7 = $_GET['param4'];
file_put_contents("AGviewpage.js", $optout1);
file_put_contents("AGviewpage.js", $activieren1, FILE_APPEND);
file_put_contents("AGviewpage.js", $scriptL1, FILE_APPEND);
if($form7 != undefined){file_put_contents("AGevents.js", $form7);};
}
?>

