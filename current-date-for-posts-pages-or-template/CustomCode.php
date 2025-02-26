<?php 
global $InputField2;
global $InputField3;

$datez = new DateTime();
$timeZone = $datez->getTimezone();
$currentz= $timeZone->getName();

if (isset($InputField2) && $InputField2  != ''){
	$timezonex=$InputField2;
} 
else{
	$timezonex=$currentz;
}

if (isset($InputField3) && $InputField3  != ''){
	$formatdate=$InputField3;
} 
else{
	$formatdate='m/d/Y h:i:s';
}

date_default_timezone_set($timezonex);

echo date($formatdate, time());


