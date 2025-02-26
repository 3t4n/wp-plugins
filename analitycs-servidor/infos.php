<?php
/*
**Mostra a memoria em Disco
*/
$outputLinux = shell_exec('df -h');
if($outputLinux == NULL){
	//echo 'Não é linux';
}else{
	echo "<pre>$outputLinux</pre>";
}

$outputWind = exec('wmic logicaldisk get size');
if($outputWind == NULL){
	//echo 'Não é Windows';
}else{
	echo "<pre>$outputWind</pre>";
}

/*Free -m*/
$outputLinuxSW = shell_exec('free -m');
if($outputLinuxSW == NULL){
	//echo 'Não é linux';
}else{
	echo "Memoria:<br/><pre>$outputLinuxSW</pre>";
}

/*Swap*/
$outputLinuxSW = shell_exec('cat /proc/sys/vm/swappiness');
if($outputLinuxSW == NULL){
	//echo 'Não é linux';
}else{
	echo "<pre>Swap = $outputLinuxSW</pre>";
}

/*Cache Pressure*/
$outputLinuxPS = shell_exec('cat /proc/sys/vm/vfs_cache_pressure');
if($outputLinuxPS == NULL){
	//echo 'Não é linux';
}else{
	echo "<pre>Cache Pressure = $outputLinuxPS</pre>";
}