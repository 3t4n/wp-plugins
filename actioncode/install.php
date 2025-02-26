<?php 
//install actioncodes_plugin

require_once("conf.inc.php");


$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$http = "http://";
$db->query('CREATE TABLE wp_actioncodes (actioncodes VARCHAR(30), address VARCHAR(100) )');
$db->query("INSERT INTO wp_actioncodes VALUES('logander4tutorials', '".$http."log4-tutorials.22o.de')");
$db->close();
echo "Datenbank aktualisiert!";
?>